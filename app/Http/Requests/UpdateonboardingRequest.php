<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateonboardingRequest extends FormRequest
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
            'judul' => ['required'],
            'status' =>  ['string'],
            'start' => 'required',
            'end' => 'required',
            'onboarding_image' =>  ['image', 'max:1000'],
            'created_by' => 'required',
            'description' =>  ['string'],
            'user_id'=>'required',
            'content_id'=>'required'

         ];
    }
}
