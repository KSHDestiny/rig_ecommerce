<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponCodeRequest extends FormRequest
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
            "coupon_code" => "required|unique:coupon_codes|min:5",
            "discount" => "required|integer",
            "type" => "required",
            "exp_date" => "required|date"
        ];
    }
}
