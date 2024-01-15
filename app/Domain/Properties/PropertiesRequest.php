<?php

namespace App\Domain\Properties;

use Illuminate\Foundation\Http\FormRequest;

class PropertiesRequest extends FormRequest
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
            'filters' => 'array:name,price_min,price_max,bedrooms,bathrooms,storeys,garages|filled',
            'filters.name' => 'string|filled',
            'filters.price_min' => 'int|filled',
            'filters.price_max' => 'int|filled',
            'filters.bedrooms' => 'int|filled',
            'filters.bathrooms' => 'int|filled',
            'filters.storeys' => 'int|filled',
            'filters.garages' => 'int|filled',
        ];
    }
}
