<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization logic if needed
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
        ];
    }

    // Optionally define custom error messages
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
           
            // Define custom messages for other rules...
        ];
    }
}
