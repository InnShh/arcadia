<?php

namespace App\Http\Requests;

use App\Rules\EmployeeUser;
use Illuminate\Foundation\Http\FormRequest;

class StoreFeedingReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // temporary
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id', new EmployeeUser()],
            'animal_id' => 'required|exists:animals,id',
            'food' => 'nullable|string',
            'food_vol' => 'nullable|integer',
            'details' => 'nullable|string',
        ];
    }
}
