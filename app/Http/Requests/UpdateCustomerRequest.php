<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'name' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u', 'between:3,65'],
                'paternal_surname' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u', 'between:3,65'],
                'maternal_surname' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u', 'between:3,65'],
                'type_document' => ['required', 'string', Rule::in(['DNI', 'PASAPORTE'])],
                'n_document' => ['required', 'numeric', 'digits_between:6,15'],
                'date_of_birth' => ['nullable', 'date_format:Y-m-d'],
                'email' => ['nullable', 'email:rfc,dns', 'unique:customers,email'],
                'country' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u', 'max:20'],
                'region' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u', 'max:60'],
                'province' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u', 'max:60'],
                'city' => ['required', 'string', 'regex:/^[\p{L}\s]+$/u', 'max:60'],
                'street' => ['required', 'string', 'max:150'],
                'prefix' => ['nullable', 'string', 'between:2,5', 'required_with:phone'],
                'phone' => ['nullable', 'numeric', 'digits_between:2,12', 'required_with:prefix']
            ];
        }else{
            return [
                'name' => ['sometimes', 'required', 'string', 'regex:/^[\p{L}\s]+$/u', 'between:3,65'],
                'paternal_surname' => ['sometimes', 'required', 'string', 'regex:/^[\p{L}\s]+$/u', 'between:3,65'],
                'maternal_surname' => ['sometimes', 'required', 'string', 'regex:/^[\p{L}\s]+$/u', 'between:3,65'],
                'type_document' => ['sometimes', 'required', 'string', Rule::in(['DNI', 'PASAPORTE'])],
                'n_document' => ['sometimes', 'required', 'numeric', 'digits_between:6,15'],
                'date_of_birth' => ['sometimes', 'nullable', 'date_format:Y-m-d'],
                'email' => ['sometimes', 'nullable', 'email:rfc,dns', 'unique:customers,email'],
                'country' => ['sometimes', 'required', 'string', 'regex:/^[\p{L}\s]+$/u', 'max:20'],
                'region' => ['sometimes', 'required', 'string', 'regex:/^[\p{L}\s]+$/u', 'max:60'],
                'province' => ['sometimes', 'required', 'string', 'regex:/^[\p{L}\s]+$/u', 'max:60'],
                'city' => ['sometimes', 'required', 'string', 'regex:/^[\p{L}\s]+$/u', 'max:60'],
                'street' => ['sometimes', 'required', 'string', 'max:150'],
                'prefix' => ['sometimes', 'nullable', 'string', 'between:2,5', 'required_with:phone'],
                'phone' => ['sometimes', 'nullable', 'numeric', 'digits_between:2,12', 'required_with:prefix']
            ];
        }
    }
    protected function prepareForValidation()
    {
        if ($this->has('date_of_birth')) {
            $dateBirth = $this->input('date_of_birth');
            $this->merge([
                'date_of_birth' => Carbon::createFromFormat('d-m-Y', $dateBirth)->format('Y-m-d')
            ]);
        };

        if ($this->has('type_document')) {
            $documentTypes = $this->input('document_types');
            $this->merge(['document_types' => strtoupper($documentTypes)]);
        }
    }
}
