<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogpostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', Rule::unique('blogposts', 'title')->ignore($this->route('blogpost')?->id)],
            'user_id' => ['nullable', 'max:255'],
            'intro' => ['required', 'max:150'],
            'content' => ['required', 'max:500'],
//            'image' => ['nullable', 'image', 'max:1024'],
//            'delete-image' => ['nullable', 'boolean'],
        ];
    }
}
