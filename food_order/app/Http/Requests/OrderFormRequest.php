<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Psy\Exception\ThrowUpException;

class OrderFormRequest extends FormRequest
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
            'user_id' => 'required|string|max:255',
            'order_code' => 'required|string|max:255',
            'total_price' => 'required|decimal:2,4|',
            'status' => 'required|string|max:100'
        ];
    }
}
