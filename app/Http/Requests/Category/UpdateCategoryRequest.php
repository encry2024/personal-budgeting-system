<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Auth;

class UpdateCategoryRequest extends FormRequest
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
            'name' => ['required', Rule::unique('categories')->where('id', $this->category->id)->where('user_id', Auth::user()->id)->whereNull('deleted_at')]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a name for the category.',
            'name.unique' => 'This category name already exists.',
        ];
    }
}
