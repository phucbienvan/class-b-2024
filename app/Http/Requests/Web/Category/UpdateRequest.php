<?php

namespace App\Http\Requests\Web\Category;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> ['required', 'max:255'],
            'description' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'Enter name pls!',
            'description.required'=> 'Enter description pls!',
        ];
    }
}
