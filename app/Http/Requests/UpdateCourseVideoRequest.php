<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseVideoRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'video_path' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Judul video wajib diisi.',
            'name.string'   => 'Judul video harus berupa teks.',
            'name.max'      => 'Judul video tidak boleh lebih dari 255 karakter.',

            'video_path.required' => 'URL video wajib diisi.',
            'video_path.string'   => 'URL video harus berupa teks.',
            'video_path.max'      => 'URL video tidak boleh lebih dari 255 karakter.',
        ];
    }
}
