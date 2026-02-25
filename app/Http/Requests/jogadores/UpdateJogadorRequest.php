<?php

namespace App\Http\Requests\jogadores;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJogadorRequest extends FormRequest
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
            'nome'    => 'required|string|max:255',
            'time'    => 'required|string|max:255',
            'posicao' => 'required|string|in:GOLEIRO,LATERAL,ZAGUEIRO,VOLANTE,MEIA,PONTA,ATACANTE',
            'numero'  => 'required|integer|min:1|max:99',
        ];
    }
}
