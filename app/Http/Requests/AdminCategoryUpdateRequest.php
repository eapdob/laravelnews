<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminCategoryUpdateRequest extends FormRequest
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
        $categoryId = $this->route('category');
        return [
            'description.*.language_id' => 'digits:1,100',
            'description.*.name' => ['required', 'max:255'],
            'parent_id' => [
                'nullable',
                Rule::exists('categories', 'id')
            ],
            'slug' => [
                'required',
                'alpha_dash',
                'max:255',
                'unique:categories,slug,' . $categoryId
            ],
            'show_at_nav' => ['required', 'boolean'],
            'status' => ['required', 'boolean']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'description.*.language_id' => 'Language ID',
            'description.*.name' => 'Categories Name',
        ];
    }
}
