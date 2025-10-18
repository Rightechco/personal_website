<?php

namespace App\Http\Requests\Admin\Relatedlink;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRelatedlinkRequest extends FormRequest
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
        return [
            'external_link' => 'required|string|max:1000',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
