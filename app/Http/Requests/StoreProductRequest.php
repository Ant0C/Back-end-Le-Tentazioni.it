<?php

namespace App\Http\Requests;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:products,name',
            'description'=>'nullable|string',
            'price'=>['required', 'regex:/^\d{1,4}(\.\d{1,2})?$/'],
            'visible'=>'nullable|boolean',
            'size'=>'nullable|string',
            'color'=>'nullable|string',
        ];
    }
}
