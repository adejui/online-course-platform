<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CoursePurchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function checkout($courseId)
    {
        // dd($courseId);
        $course = Course::findOrFail($courseId);
        // dd($course);
        return view('front.checkout', compact('course'));
    }

    public function createTransaction(Request $request)
    {
        try {
            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $course = Course::findOrFail($request->course_id);
            $user = auth()->user();

            if (!$user) {
                return response()->json(['error' => 'User belum login'], 401);
            }

            $orderId = 'INV' . date('y') . strtoupper(Str::random(5));

            CoursePurchase::create([
                'purchase_code' => $orderId,
                'purchase_date' => now(),
                'total_paid' => $course->price,
                'mentor_commission' => (int)($course->price * 0.7),
                'admin_commission' => (int)($course->price * 0.3),
                'status' => 'verified',
                'user_id' => $user->id,
                'course_id' => $course->id,
                'mentor_id' => $course->mentor_id, // <-- tambahkan ini
            ]);


            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $course->price,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                ],
                'item_details' => [
                    [
                        'id' => $course->id,
                        'price' => (int) $course->price,
                        'quantity' => 1,
                        'name' => $course->title ?? 'Kursus Online',
                    ]
                ],
                'callbacks' => [
                    'finish' => url('/midtrans/thanks'), // <--- Ganti ini
                ],
            ];

            // Debug ke log
            Log::info('Request Midtrans Params:', $params);

            // Ambil Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Log token
            Log::info('Snap Token:', [$snapToken]);

            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Midtrans GAGAL:', [$e->getMessage()]);
            return response()->json(['error' => 'Gagal: ' . $e->getMessage()], 500);
        }
    }

    // MIDTRANS CALLBACK
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $signatureKey = $request->signature_key;
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;

        $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        if ($signatureKey !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $transactionStatus = $request->transaction_status;

        if (in_array($transactionStatus, ['settlement', 'capture'])) {
            CoursePurchase::where('purchase_code', $orderId)
                ->update(['status' => 'verified']);
        }

        return response()->json(['message' => 'OK']);
    }

    public function thanks(Request $request)
    {
        return view('front.payment.thankyou', [
            'order_id' => $request->order_id,
            'status' => $request->transaction_status,
        ]);
    }

    public function showInvoice($purchaseCode)
    {
        // dd($purchaseCode);
        $purchase = CoursePurchase::with(['user', 'course'])->where('purchase_code', $purchaseCode)->firstOrFail();

        // dd($purchase);
        return view('front.payment.invoice', [
            'purchase' => $purchase
        ]);
    }
}
