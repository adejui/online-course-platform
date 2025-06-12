<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => 'Course tidak ditemukan.',
            'course_id.exists' => 'Course yang dimaksud tidak valid.',
            'rating.required' => 'Rating harus diisi.',
            'rating.numeric' => 'Rating harus berupa angka.',
            'rating.min' => 'Rating minimal adalah 1.',
            'rating.max' => 'Rating maksimal adalah 5.',
            'review.required' => 'Review harus diisi.',
            'review.string' => 'Review harus berupa teks.',
            'review.max' => 'Review tidak boleh lebih dari 1000 karakter.',
        ];
    }
}
