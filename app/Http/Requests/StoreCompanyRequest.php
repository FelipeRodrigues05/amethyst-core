<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'min:10', 'max:255'],
            'company_document' => ['required', 'string', 'min:11', 'max:14', 'unique:companies'],
            'company_email' => ['required', 'email', 'unique:companies'],
            'company_phone' => ['required', 'integer'],
            'company_type' => ['required', 'max:2'],
        ];
    }

    public function attributes(): array
    {
        return [
            'company_name' => 'Nome da Empresa',
            'company_document' => 'Documento da Empresa',
            'company_email' => 'Email da Empresa',
            'company_phone' => 'Telefone da Empresa',
            'company_type' => 'Tipo da Empresa',
        ];
    }

    public function messages(): array
    {
        return [
            'company_name' => [
                'required' => 'O :attribute é obrigatório',
                'string' => 'O :attribute precisa ser um texto',
                'min' => 'O :attribute precisa ter no minimo 10 caracteres',
                'max' => 'O :attribute precisa ter no máximo 255 caracteres',
            ],
            'company_document' => [
                'required' => 'O :attribute é obrigatório',
                'unique' => 'O :attribute é único',
                'string' => 'O :attribute precisa ser um texto',
                'min' => 'O :attribute precisa ter no minimo 11 caracteres',
                'max' => 'O :attribute precisa ter no máximo 14 caracteres',
            ],
            'company_email' => [
                'required' => 'O :attribute é obrigatório',
                'unique' => 'O :attribute é único',
                'email' => 'O :attribute precisa ser um email',
            ],
            'company_phone' => [
                'required' => 'O :attribute é obrigatório',
                'integer' => 'O :attribute precisa ser um NÚMERO',
            ],
            'company_type' => [
                'required' => 'O :attribute é obrigatório',
                'max' => 'O :attribute precisa ter no máximo 2 caracteres (PF, PJ)',
            ],
        ];
    }
}
