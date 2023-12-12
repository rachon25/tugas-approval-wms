<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatDaftarPoRequest extends FormRequest
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
            'id_mr' => 'required',
            "no_po"=> 'required',
            "po_name" => 'required',
            "total_material" => 'required',
            'assignment' => 'required',
            'date_assign' => 'required|date',
            'status_approval' => 'required',
            'status_mr' => 'required',
        ];
    
    }
    public function messages(): array
{
    return [
        'no_po.required' => 'No PO Tidak boleh kosong tidak boleh kosong',
        'po_name.required' => 'Nama PO tidak boleh kosong',
    ];
}
}
