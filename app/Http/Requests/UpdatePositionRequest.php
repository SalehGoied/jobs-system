<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_reference' => 'required|string|max:255',
            'description' => 'required|string',
            'responsibilities' => 'required|string',
            'educational_qualifications' => 'required|string',
            'work_experience' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'competencies' => 'nullable|array',
            'competencies.*' => 'string|max:255'
        ];
    }
}
