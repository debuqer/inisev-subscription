<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'website_id' => ['required', 'exists:websites,id'],
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }
}
