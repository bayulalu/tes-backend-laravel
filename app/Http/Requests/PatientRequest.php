<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\Validator;

class PatientRequest extends FormRequest
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
            'name' => 'required',
            'idType' => 'required',
            'idNo' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'mediumAcquisition' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = 'provided input invalid';
        if ($validator->errors()->count() == 1) {
            $message = $validator->errors()->first();
        }
        throw new HttpResponseException(response()->json([
            'error' => true,
            'data' => $validator->errors(),
            'message' => $message
        ], Response::HTTP_BAD_REQUEST));
    }
}
