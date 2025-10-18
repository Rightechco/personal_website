<?php

namespace App\Http\Requests\Admin\Lorestan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLorestannewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:500',
            'summary' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
