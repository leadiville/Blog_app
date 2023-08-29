<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $posts =  [
            'title' => 'required|max:200|unique:posts',
            'excerpt' => 'max:3000',
            'body' => 'required',
            'min_to_read' => 'required|min:1|max:50',
            'image' => 'mimes:jpg,jpeg|max:20036',
        ];
        if (in_array($this->method(), ['POST'])) {
             $posts['image'] = 'mimes:jpg,jpeg|max:20036';
        }
        return $posts;
    }
}
