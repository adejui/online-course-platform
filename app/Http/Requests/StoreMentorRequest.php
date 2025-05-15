<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMentorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'occupation' => 'required|string|max:100',
            'cv_file' => 'required|file|mimes:pdf|max:4096',
            'bank_account_number' => 'required|string|max:100',
            'bank_name' => 'required|string|max:100',
            'account_holder_name' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'occupation.required' => 'Pekerjaan wajib diisi.',
            'occupation.string' => 'Pekerjaan harus berupa teks.',
            'occupation.max' => 'Pekerjaan maksimal 100 karakter.',

            'cv_file.required' => 'File CV wajib diunggah.',
            'cv_file.file' => 'File CV harus berupa file yang valid.',
            'cv_file.mimes' => 'File CV harus berformat PDF.',
            'cv_file.max' => 'Ukuran file CV maksimal 2MB.',

            'bank_account_number.required' => 'Nomor rekening wajib diisi.',
            'bank_account_number.string' => 'Nomor rekening harus berupa teks.',
            'bank_account_number.max' => 'Nomor rekening maksimal 100 karakter.',

            'bank_name.required' => 'Nama bank wajib diisi.',
            'bank_name.string' => 'Nama bank harus berupa teks.',
            'bank_name.max' => 'Nama bank maksimal 100 karakter.',

            'account_holder_name.required' => 'Nama pemilik rekening wajib diisi.',
            'account_holder_name.string' => 'Nama pemilik rekening harus berupa teks.',
            'account_holder_name.max' => 'Nama pemilik rekening maksimal 100 karakter.',
        ];
    }
}
