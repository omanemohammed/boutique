<?php

namespace App\Http\Requests\Api\v1;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the product is authorized to make this request.
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

        $product = $this->route('product');
        if ($product instanceof Product) {
            $product = $product->id;
        }
        $rules = [
            'name'        => 'required|string|min:2|max:50',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'discount'    => 'required|numeric|min:0',
            'quantity'    => 'required|numeric|min:1',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active'   => 'required|string',
        ];
   
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
