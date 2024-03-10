<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSeoSettingUpdateRequest extends FormRequest
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
            'settings.*.language_id' => 'digits:1,100',
            'settings.*.site_seo_title' => ['required', 'max:60'],
            'settings.*.site_seo_description' => ['required', 'max:160'],
            'settings.*.site_seo_keywords' => ['required']
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
            'settings.*.language_id' => 'Settings Language ID',
            'settings.*.site_seo_title' => 'Settings Site Seo Title',
            'settings.*.site_seo_description' => 'Settings Site Seo Description',
            'settings.*.site_seo_keywords' => 'Settings Site Keywords'
        ];
    }
}
