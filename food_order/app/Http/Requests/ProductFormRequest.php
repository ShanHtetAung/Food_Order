<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => $this->status == 'create' ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048' : 'mimes:jpeg,png,jpg,webp|max:2048',
            'price' => 'required|string|max:100'
        ];
    }
}
