<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $id = $this->route('category');

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('categories', 'name')->ignore($id),
                /*function ($attribute, $value, $fails) {
                    if (strtolower($value) === 'laravel') {
                        $fails('This name is forbidden.');
                    }
                },
                */
                new Filter(),
            ],
            'parent_id' => [
                'nullable',
                'int',
                'exists:App\Models\Category'
            ],
            'image' => [
                'image',
                'mimes:png,jpg,jpeg',
                'max:2048'
            ],
            'status' => [
                'required',
                'in:active,archived'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'This field is required.',
            'name.unique' => 'This name already exists.',
            'image.image' => 'This field must be an image.',
        ];
    }
}
