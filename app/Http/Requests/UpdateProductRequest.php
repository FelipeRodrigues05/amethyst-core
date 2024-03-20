<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => ['required', 'string', 'min:10', 'max:255'],
            'product_description' => ['required', 'string', 'min:50', 'max:255'],
            'product_price' => ['required', 'numeric'],
            'image_url' => ['required', 'array'],
            'total_available' => ['required', 'integer'],
            'total_selled' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'product_name' => 'Nome do Produto',
            'product_description' => 'Descrição do Produto',
            'product_price' => 'Preço do Produto',
            'image_url' => 'URL das Imagens',
            'total_available' => 'Total disponivel',
            'total_selled' => 'Total vendido',
        ];
    }

    public function messages(): array
    {
        return [
            'product_name' => [
                'required' => 'O :attribute é obrigatório',
                'string' => 'O :attribute precisa ser um texto',
                'min' => 'O :attribute precisa ter no minimo 10 caracteres',
                'max' => 'O :attribute precisa ter no máximo 255 caracteres',
            ],
            'product_description' => [
                'required' => 'O :attribute é obrigatório',
                'string' => 'O :attribute precisa ser um texto',
                'min' => 'O :attribute precisa ter no minimo 50 caracteres',
                'max' => 'O :attribute precisa ter no máximo 255 caracteres',
            ],
            'product_price' => [
                'required' => 'O :attribute é obrigatório',
                'numeric' => 'O :attribute precisa ser um número',
            ],
            'image_url' => [
                'required' => 'O :attribute é obrigatório',
                'array' => 'O :attribute precisa ser uma lista',
            ],
            'total_available' => [
                'required' => 'O :attribute é obrigatório',
                'integer' => 'O :attribute precisa ser um número',
            ],
            'total_selled' => [
                'required' => 'O :attribute é obrigatório',
                'integer' => 'O :attribute precisa ser um número',
            ],
        ];
    }
}
