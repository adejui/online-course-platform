<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'trailer_path' => 'required|string|max:255',
            'about' => 'required|string',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:4096',
            'course_keypoints.*' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'thumbnail.required'     => 'Thumbnail wajib diunggah.',
            'thumbnail.image'        => 'File thumbnail harus berupa gambar.',
            'thumbnail.mimes'        => 'Thumbnail harus berformat JPG, JPEG, atau PNG.',
            'thumbnail.max'          => 'Ukuran thumbnail maksimal 4MB.',
            'name.required'          => 'Nama kelas wajib diisi.',
            'name.string'            => 'Nama kelas harus berupa teks.',
            'name.max'               => 'Nama kelas maksimal 255 karakter.',
            'category_id.required'   => 'Kategori kelas wajib dipilih.',
            'category_id.integer'    => 'Kategori harus berupa angka (ID).',
            'trailer_path.required'  => 'Path trailer wajib diisi.',
            'trailer_path.string'    => 'Link trailer harus berupa teks.',
            'trailer_path.max'       => 'Link trailer maksimal 255 karakter.',
            'about.required'         => 'Bagian tentang kelas wajib diisi.',
            'about.min'              => 'Bagian tentang kelas minimal harus 10 karakter.',
            'price.required'         => 'Harga wajib diisi.',
            'price.numeric'          => 'Harga harus berupa angka.',
            'price.min'              => 'Harga tidak boleh kurang dari 0.',
            'course_keypoints.*.required' => 'Poin penting kelas wajib diisi.',
            'course_keypoints.*.string' => 'Poin penting harus berupa teks.',
            'course_keypoints.*.max' => 'Poin penting maksimal 255 karakter.',
        ];
    }
}
