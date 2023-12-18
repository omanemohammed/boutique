<?php

namespace App\Http\Requests\Api\v1;

use App\Models\OrderDetail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderDetailRequest extends FormRequest
{
    /**
     * Determine if the orderDetail is authorized to make this request.
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

        $orderDetail = $this->route('orderDetail');
        if ($orderDetail instanceof OrderDetail) {
            $orderDetail = $orderDetail->id;
        }
        $rules = [
            'name'     => 'required|string|min:2|max: 50',
            'email'    => 'required|email|'. Rule::unique('orderDetail')->ignore($orderDetail)->withoutTrashed(),
            'mobile'   => 'required|numeric|' . Rule::unique('orderDetail')->ignore($orderDetail)->withoutTrashed(),
            'password' => 'required|confirmed|min:8',
            'gender'   => 'required|string|in:male,female',
            'address'  => 'required|string|min:5',
        ];
        if ($this->isMethod(static::METHOD_PUT)) {
            $rules['password'] .= '|nullable';
        }else {
            $rules['password'] .= '|required';
        }
        return $rules;
    }  
    


    /**
     * Get custom message for validator errors.
     * 
     * @return array
     */
    // public function messages()
    // {
    //     return [
            

    //     ];
    // }
}
