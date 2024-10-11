<?php

namespace App\Http\Requests\Api\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required','max:255'],
            'price' => ['required','integer','min:10'],
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Enter name!',
            'name.max' => 'Enter lower than 255 charaters!',
            'price.required' => 'Enter price!',
            'price.min' => 'Enter higher than 10!',
        ];
    }
}
