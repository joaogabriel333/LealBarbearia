<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaFormRequest extends FormRequest
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
            'id' => 'required|max:120|min:5',
            'profissional' => 'required|max:120|min:5',
            'serviço' => 'required|max:120|min:5',
            'data' => 'required|max:10|min:10',
            'hora' => 'required|max:5|min:5',
            'pagamento' => 'required|max:120|min:5',
            
        ];
    }
}
