<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'title'=>'required|unique:posts',
             'description'=>'required',
             'content'=>'required',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'published_at'=>'required',
             'category'=>'required'
        ];
    }
}
