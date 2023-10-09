<?php

namespace App\Modules\Category\Requests;

use App\Modules\Category\DTOs\CategoryDTO;
use App\Modules\Category\Models\Category;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'active' => 'nullable|boolean',           
            'description' => 'required|string',
        ];
    }

    /**
     * @return CategoryDTO
     */
    public function toDto(): CategoryDTO
    {
        return new CategoryDTO(...$this->validated());
    }
}
