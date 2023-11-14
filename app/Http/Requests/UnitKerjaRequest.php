<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnitKerjaRequest extends FormRequest
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
            'kode_unit_kerja' => ['required', Rule::unique('unit_kerja')->ignore($this->unit_kerja)],
            'nama_unit_kerja' => ['required', Rule::unique('unit_kerja')->ignore($this->unit_kerja)]
         ];
    }
}
