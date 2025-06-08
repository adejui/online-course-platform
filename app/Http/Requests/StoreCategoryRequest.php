<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        $categoryId = $this->route('category') ? $this->route('category')->id : null;

        return [
            'name' => 'required|string|max:255|unique:categories,name' . ($categoryId ? ',' . $categoryId : ''),
            'icon' => 'required|image|mimes:png,jpg,jpeg|max:4096',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori maksimal 255 karakter.',
            'name.unique' => 'Nama kategori sudah digunakan, silakan gunakan nama lain.',

            'icon.required' => 'Ikon kategori wajib diunggah.',
            'icon.image' => 'File ikon harus berupa gambar.',
            'icon.mimes' => 'Format ikon harus png, jpg, atau jpeg.',
            'icon.max' => 'Ukuran ikon maksimal 4MB.',
        ];
    }
}
