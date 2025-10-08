<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreExpenseRequest extends FormRequest
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
            'name' => ['required', Rule::unique('expenses')->whereNull('deleted_at')],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a name for the expense.',
            'name.unique' => 'This expense name already exists.',
        ];
    }
}
