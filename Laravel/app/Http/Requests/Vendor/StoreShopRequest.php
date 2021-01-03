<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
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
            'delivery_charge'=>'numeric|min:50'
        ];
    }

    public function messages()
    {
        return [
            'delivery_charge.min'  => 'Please Set Delivery Charge above 50.',
        ];
    }
}
