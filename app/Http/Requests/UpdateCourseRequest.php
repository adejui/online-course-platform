<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'about' => 'required|string|min:10',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:4096',
            'course_keypoints.*' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'thumbnail.image'        => 'File thumbnail harus berupa gambar.',
            'thumbnail.mimes'        => 'Thumbnail harus berformat JPG, JPEG, atau PNG.',
            'thumbnail.max'          => 'Ukuran thumbnail maksimal 4MB.',
            'name.required'          => 'Nama kelas wajib diisi.',
            'trailer_path.required'  => 'Trailer path wajib diisi.',
            'trailer_path.url'       => 'Trailer path harus berupa URL yang valid.',
            'about.required'         => 'Bagian tentang kelas wajib diisi.',
            'about.min'              => 'Bagian tentang kelas minimal harus 10 karakter.',
            'price.required'         => 'Harga wajib diisi.',
            'price.numeric'          => 'Harga harus berupa angka.',
            'price.min'              => 'Harga tidak boleh kurang dari 0.',
            'course_keypoints.*.required' => 'Setiap poin materi wajib diisi.',
        ];
    }
}
