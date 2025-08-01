<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexImageRequest extends FormRequest
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
            'image' => 'required|image|max:5120',
            'product_id' => 'nullable|integer',
            'src_img' => 'nullable|string',
            'is_main' => 'nullable|integer',
            'weight' => 'nullable|integer',
        ];
    }
}
