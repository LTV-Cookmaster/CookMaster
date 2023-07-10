<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoomFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','min:4'],
            'description' => ['required','string','min:8'],
            'max_capacity' => ['required','integer','max:10'],
            'price' => ['required','integer','min:100'],
            'office_id' => ['required','string','exists:offices,id'],
        ];
    }
}
