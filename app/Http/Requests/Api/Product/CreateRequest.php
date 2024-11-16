<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends BaseRequest
{
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
