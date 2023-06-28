<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
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
     */public function rules(): array
{
    $userId = $this->route('user'); // Obtenez l'ID de l'utilisateur à partir de la route

    $rules = [
        'name' => ['required', 'string', 'min:3', 'max:255'],
        'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
        'address' => ['required', 'string'],
        'postal_code' => ['required', 'string'],
        'city' => ['required', 'string'],
        'country' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'referral_code' => ['nullable', 'string'],
        'is_admin' => ['boolean'],
    ];

    // Conditionnellement exclure la validation du champ "password" lors d'une mise à jour
    if ($this->getMethod() == 'POST') {
        $rules['password'] = ['required', 'string', 'min:8'];
    }

    return $rules;
}
}
