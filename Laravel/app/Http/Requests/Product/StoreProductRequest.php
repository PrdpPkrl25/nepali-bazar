<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_image_name'=> 'image|mimes:jpeg,png,jpg,gif,svg|',
            'category_id'=>'required',
            'product_name'=>'required',
            'price'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please Select One Category',
            'product_name.required'  => 'Please Enter Product Name',
            'price.required'  => 'Please Enter Price Of The Product',
        ];
    }
}
