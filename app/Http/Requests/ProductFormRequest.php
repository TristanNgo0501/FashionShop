<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer'
            ],
            'size_id' => [
                'required',
                'integer'
            ],
            'brand_id' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string',
                'max:255'
            ],
            'small_description' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'integer'
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'status' => [
                'required',
                'integer'
            ],

        ];
    }
}
