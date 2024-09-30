<?php

namespace App\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDiscountRequest extends FormRequest
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
            'account' => 'required|string',
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('discounts')
                    ->where(fn (Builder $query) => $query->where('account', $this->account)),
            ],
            'discount' => 'required|integer|min:0|max:100',
            'price_not_specified' => 'required|boolean',
        ];
    }
}
