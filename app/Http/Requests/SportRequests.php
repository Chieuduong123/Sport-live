<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SportRequests extends FormRequest
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
            'name' => 'required',
            'image_path' => 'required',
            'describe' => 'required',
            'price_id' => 'required',
            'category_id' => 'required',
        ];
    }

    /**
     * Determine message.
     *
     * @return array
     */
    public function messages()
    {
        return [
			'name.required' => 'Name Sport is required',
			'image_path.required' => 'Image is required',
			'describe.required' => 'Describe is required',
			'price_id.min' => 'Price is required',
            'category_id.regex' => 'Category is required',
          		
        ];
    }
}