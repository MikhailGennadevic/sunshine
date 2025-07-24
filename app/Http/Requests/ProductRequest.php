<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|gt:0',
            'category' => 'sometimes|string|max:255',
            'in_stock' => 'sometimes|boolean',
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                $rules = array_map(function ($rule) {
                    return str_replace('sometimes', 'required', $rule);
                }, $rules);
                break;     
        }
        return $rules;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('in_stock')) {
            $this->merge([
                'in_stock' => filter_var($this->in_stock, FILTER_VALIDATE_BOOLEAN),
            ]);
        }
    }
}