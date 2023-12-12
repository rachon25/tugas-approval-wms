<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatDaftarMaterialRequest extends FormRequest
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
            'part_num' => 'required|string',
            'material_name'=> 'required|string',
            'uom'=> 'required',
        ];
    }
    public function messages(): array
{
    return [
        'part_num.required' => 'Part Number tidak boleh kosong',
        'material_name.required' => 'Material Name tidak boleh kosong',
        'uom.required' => 'uom tidak boleh kosong',
        'part_num.string' => 'Part Number Sudah ada',
        'material_name.string' => 'Material Name Sudah ada',
    ];
}
}
