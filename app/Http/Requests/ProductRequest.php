<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * php artisan make:request ProductRequest
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
            'name'=>'required|max:255|unique:products',
            // because in show we show description instead of detail so we make it description for user convinient
            'description'=>'required',
            'price'=>'required|max:10',
            'stock'=>'required|max:6',
            'discount'=>'required|max:30'
        ];
    }
}
