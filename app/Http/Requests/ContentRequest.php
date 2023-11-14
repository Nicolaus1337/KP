<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContentRequest extends FormRequest
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
            'title' => ['required', Rule::unique('contents')->ignore($this->content)],
            'type' => 'required',
        ];

        return $rules;
    }

    /**
     * Customize the validation rules.
     */
    public function withValidator($validator)
    {
        // Get the value of the 'type' field from the request
        $type = $this->input('type');

        // Add conditional validation rules based on the 'type' value
        $validator->sometimes('pdf', 'required|mimes:pdf', function ($input) use ($type) {
            return $type === 'pdf';
        });

        $validator->sometimes('video', 'required|mimes:mp4', function ($input) use ($type) {
            return $type === 'video';
        });

        $validator->sometimes('description', 'required', function ($input) use ($type) {
            return $type === 'text';
        });
    }
}

