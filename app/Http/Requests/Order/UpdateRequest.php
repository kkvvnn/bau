<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
//            'customer' => 'string',
//            'customer_phone' => 'string',
//            'customer_address' => 'string',
//            'shipping' => 'string',
            'order_code' => 'required|string',
//            'status' => 'string',
//            'note' => 'string',
        ];
    }
}
