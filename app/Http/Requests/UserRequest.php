<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'npk' => ['required', Rule::unique('users')->ignore($this->data_user)],
            'name' => 'required',
            'unit_kerja' => 'required',
            'email' =>  Rule::unique('users')->ignore($this->data_user),
            'password' => [
                 'required',
                 'confirmed',
                 'string',
                 'min:8' ,
                 'regex:/[a-z]/',
                 'regex:/[0-9]/']
            
         ];
    }

    
}
