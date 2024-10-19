<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => ['required', 'string', 'between:3,65'],
            'paternal_surname' => ['required', 'string', 'between:3,65'],
            'maternal_surname' => ['required', 'string', 'between:3,65'],
            'type_document' => ['required', 'string', Rule::in(['DNI', 'PASAPORTE'])],
            'n_document' => ['required', 'numeric', 'digits_between:3,15'],
            'date_of_birth' => ['nullable', 'date_format:Y-m-d'],
            'email' => ['nullable', 'email:rfc,dns', 'unique:customers,email'],
            'country' => ['required', 'string', 'max:20'],
            'region' => ['required', 'string', 'max:60'],
            'province' => ['required', 'string', 'max:60'],
            'city' => ['required', 'string', 'max:60'],
            'street' => ['required', 'string', 'max:150'],
            'prefix' => ['nullable', 'string', 'between:2,5', 'required_with:phone'],
            'phone' => ['nullable', 'numeric', 'digits_between:2,12', 'required_with:prefix']
        ];
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
