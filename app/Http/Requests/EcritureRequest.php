<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EcritureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'uuid' => 'required|string|max:36',
            'compte_uuid' => 'required|string|max:36',
            'label' => 'required|string|max:255',
            'date' => 'required|date',
            'type' => 'required|in:C,D',
            'amount' => 'required|numeric|min:0'
        ];
    }
}
