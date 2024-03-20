<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:10'],
            'email' => ['required', 'email', 'unique:employees'],
            'password' => ['required', 'min:8'],
            'company_id' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nome do Funcionário',
            'email' => 'Email do Funcionário',
            'password' => 'Senha do Funcionário',
            'company_id' => 'ID da Empresa do Funcionário',
        ];
    }

    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'O :attribute é obrigatório',
                'string' => 'O :attribute precisa ser um texto',
                'min' => 'O :attribute precisa ter no minimo 10 caracteres',
            ],
            'email' => [
                'required' => 'O :attribute é obrigatório',
                'unique' => 'O :attribute é único',
                'email' => 'O :attribute precisa ser um email',
                'string' => 'O :attribute precisa ser um texto',
            ],
            'password' => [
                'required' => 'O :attribute é obrigatório',
                'min' => 'O :attribute precisa ter no minimo 8 caracteres',
            ],
            'company_id' => [
                'required' => 'O :attribute é obrigatório',
                'integer' => 'O :attribute precisa ser um NÚMERO',
            ],
        ];
    }
}
