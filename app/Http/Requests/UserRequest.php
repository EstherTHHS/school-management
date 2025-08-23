<?php

namespace App\Http\Requests;
use App\Http\Requests\APIRequest;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends APIRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'nullable|string|unique:users,phone',
            'password' => 'required|string|min:3',
            'confirm_password' => 'required|string|same:password',
            'is_active' => 'nullable|in:0,1',
            'role' => 'nullable|string|in:admin,teacher,student',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
        if ($this->input('role') === "student") {
            $rules['year_id']        = 'required|exists:years,id';
            $rules['enrollment_id']  = 'required';
        } else {
            $rules['year_id']        = 'nullable|exists:years,id';
            $rules['enrollment_id']  = 'nullable';
        }

        if ($this->input('role') === "teacher") {
            $rules['qualification']  = 'required|string|max:255';
        } else {
            $rules['qualification']  = 'nullable|string|max:255';
        }

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        parent::failedValidation($validator);
    }
}
