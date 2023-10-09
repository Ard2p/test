<?php

namespace App\Modules\Category\Requests;

use App\Modules\Category\DTOs\CategoryFilterDTO;
use App\Modules\Category\Enums\FillableKey;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Str;

class CategoryFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        $this->merge([
            'name' =>  trim($this->name),
            'page' =>  trim($this->page),
            'perPage' =>  trim($this->perPage),
            'active' =>  trim($this->active),
            'sort' =>  trim($this->sort),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'page' => 'nullable|int',
            'perPage' => 'nullable|int',
            'active' => 'nullable|bool',
            'sort' => ['nullable', 'string', new Enum(FillableKey::class)],
        ];
    }

    /**
     * @return CategoryFilterDTO
     */
    public function toDto(): CategoryFilterDTO
    {
        return new CategoryFilterDTO(...$this->validated());
    }
}
