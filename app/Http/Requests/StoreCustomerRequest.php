<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StoreCustomerRequest extends FormRequest
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
            'name' => ['required'],
            'type' => ['required', Rule::in(['I', 'i', 'B', 'b'])],
            'email' => ['required', 'email'],
            'city' => ['required'],
        ];
    }

    // protected function prepareForValidation()
    // {
    //     $this->merge([

    //     ]);
    // }
}
