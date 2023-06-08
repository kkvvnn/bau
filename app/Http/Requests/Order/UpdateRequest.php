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
            'vendor_code' => 'string',
            'count' => 'required|string',
            'unit' => 'required|string',
            'price' => 'required|string',
            'customer' => 'required|string',
            'customer_phone' => 'string',
            'customer_address' => 'string',
            'shipping' => 'string',
            'order_code' => 'string',
            'status' => 'string',
            'note' => 'string',
        ];
    }
}
