<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'customer_address' => ['required', 'string'],
            'order_status' => ['required'],
            'product_id' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'customer_address' => 'Endereço do Cliente',
            'order_status' => "Status do Pedido",
            'product_id' => 'ID do Produto',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_address' => [
                'required' => 'O :attribute é obrigatório',
                'string' => 'O :attribute precisa ser um texto',
                'min' => 'O :attribute precisa ter no minimo 50 caracteres',
                'max' => 'O :attribute precisa ter no máximo 255 caracteres',
            ],
            'order_status' => [
                'required' => 'O :attribute é obrigatório',
            ],
            'product_id' => [
                'required' => 'O :attribute é obrigatório',
                'integer' => 'O :attribute precisa ser um número',
            ],
        ];
    }
}
