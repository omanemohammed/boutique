<?php

namespace App\Http\Requests\Api\v1;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the order is authorized to make this request.
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

        $order = $this->route('order');
        if ($order instanceof Order) {
            $order = $order->id;
        }
        $rules = [
            'name'     => 'required|string|min:2|max: 50',
            'email'    => 'required|email|'. Rule::unique('order')->ignore($order)->withoutTrashed(),
            'mobile'   => 'required|numeric|' . Rule::unique('order')->ignore($order)->withoutTrashed(),
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
