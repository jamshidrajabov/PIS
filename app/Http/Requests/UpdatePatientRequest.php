<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
        $patientId = $this->route('id'); 
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'passport' => 'required|string|max:15|unique:patients,passport,'. $patientId,
            'birth' => 'required|date',
            'phone' => 'required',
            'address' => 'required|string|max:255|unique:patients,address,' . $patientId,
            'gender' => 'required|string|max:20',
            'blood_type' => 'nullable|string|max:5',
            'height' => 'nullable|string|max:3',
            'weight' => 'nullable|string|max:3',
        ];
    }
}
