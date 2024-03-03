<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminHomeSectionSettingUpdateRequest extends FormRequest
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
            'homeSectionSetting.*.language_id' => 'digits:1,100',
            'homeSectionSetting.*.category_section_one' => ['required', 'string'],
            'homeSectionSetting.*.category_section_two' => ['required', 'string'],
            'homeSectionSetting.*.category_section_three' => ['required', 'string'],
            'homeSectionSetting.*.category_section_four' => ['required', 'string'],
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
            'homeSectionSetting.*.language_id' => 'Home Section Setting Language ID',
            'homeSectionSetting.*.category_section_one' => 'Home Section Setting One',
            'homeSectionSetting.*.category_section_two' => 'Home Section Setting Two',
            'homeSectionSetting.*.category_section_three' => 'Home Section Setting Three',
            'homeSectionSetting.*.category_section_four' => 'Home Section Setting Four'
        ];
    }
}
