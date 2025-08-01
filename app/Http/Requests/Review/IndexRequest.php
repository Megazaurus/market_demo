<?php

namespace App\Http\Requests\Review;


use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'page' => 'integer|min:1',
            'count' => 'integer|min:1',
            'product_id' => 'nullable|integer',            
            'user_id' => 'nullable|integer',
            'description' => 'required|string|max:1000'
        ];
    }
}
