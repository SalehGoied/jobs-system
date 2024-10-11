<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,employee',
            'job_number' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'phone_number' => 'required|string|max:20',
            'qualification' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ];
    }
}
