<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNotebookRequest extends FormRequest
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
            'fio' => ['required', 'string'],
            'company' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'regex:/(7)[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'date_birth' => ['nullable', 'date:Y-m-d'],
            'photo_id' => ['nullable', 'integer', 'exists:storages,id']
        ];
    }
}
