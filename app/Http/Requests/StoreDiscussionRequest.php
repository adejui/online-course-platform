<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscussionRequest extends FormRequest
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
            'content'    => 'required|string|max:1000',
            'user_id'    => 'required|exists:users,id',
            'course_id'  => 'required|exists:courses,id',
            'parent_id'  => 'nullable|exists:reviews,id',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required'    => 'Isi ulasan tidak boleh kosong.',
            'content.string'      => 'Isi ulasan harus berupa teks.',
            'content.max'         => 'Isi ulasan maksimal 1000 karakter.',
            'user_id.required'    => 'User harus diisi.',
            'user_id.exists'      => 'User tidak ditemukan.',
            'course_id.required'  => 'Course harus diisi.',
            'course_id.exists'    => 'Course tidak ditemukan.',
            'parent_id.exists'    => 'Komentar induk tidak valid.',
        ];
    }
}
