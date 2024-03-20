<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'customer_name' => ['required', 'string', 'min:10', 'max:255'],
            'customer_address' => ['required', 'string'],
            'customer_phone' => ['required', 'numeric'],
            'product_id' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'customer_name' => 'Nome do Cliente',
            'customer_address' => 'Endereço do Cliente',
            'customer_phone' => 'Telefone do Cliente',
            'product_id' => 'ID do Produto',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name' => [
                'required' => 'O :attribute é obrigatório',
                'string' => 'O :attribute precisa ser um texto',
                'min' => 'O :attribute precisa ter no minimo 10 caracteres',
                'max' => 'O :attribute precisa ter no máximo 255 caracteres',
            ],
            'customer_address' => [
                'required' => 'O :attribute é obrigatório',
                'string' => 'O :attribute precisa ser um texto',
                'min' => 'O :attribute precisa ter no minimo 50 caracteres',
                'max' => 'O :attribute precisa ter no máximo 255 caracteres',
            ],
            'customer_phone' => [
                'required' => 'O :attribute é obrigatório',
                'numeric' => 'O :attribute precisa ser um número',
            ],
            'product_id' => [
                'required' => 'O :attribute é obrigatório',
                'integer' => 'O :attribute precisa ser um número',
            ],
        ];
    }
}
