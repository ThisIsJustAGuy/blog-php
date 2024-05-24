<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest{

    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'min:3', 'max:500'],
            'blogpost_id' => ['required', 'int', Rule::exists('blogposts', 'id')],
        ];
    }
}
