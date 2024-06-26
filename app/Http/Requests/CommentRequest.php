<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'max:255'],
            'post_id' => ['required', Rule::exists('posts', 'id')],
        ];
    }
}
