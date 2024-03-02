<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminNewsUpdateRequest extends FormRequest
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
        $newsId = $this->route('news');
        return [
            'description.*.language_id' => 'digits:1,100',
            'description.*.title' => ['required', 'max:255'],
            'description.*.content' => ['required'],
            'description.*.meta_title' => ['max:255'],
            'description.*.meta_description' => ['max:255'],
            'description.*.tags' => ['required'],
            'category_id' => [
                'nullable',
                Rule::exists('categories', 'id')
            ],
            'image' => ['nullable', 'image', 'max:3000'],
            'slug' => [
                'required',
                'alpha_dash',
                'max:255',
                'unique:news,slug,' . $newsId
            ],
            'is_breaking_news' => ['boolean'],
            'show_at_slider' => ['boolean'],
            'show_at_popular' => ['boolean'],
            'status' => ['boolean']
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
            'description.*.title' => 'News Title',
            'description.*.content' => 'News Content',
            'description.*.meta_title' => 'News Meta title',
            'description.*.meta_description' => 'News Meta description',
            'description.*.tags' => 'News Tags',
        ];
    }
}
