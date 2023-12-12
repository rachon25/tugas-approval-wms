<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatDaftarMrRequest extends FormRequest
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
            'part_num' => 'required',
            'no_po' => 'required',
            'qty_plan' => 'required|numeric',
            'assignment' => 'required',
            'date_assign' => 'required|date',
            'status_approval' => 'required',
            'status_mr' => 'required',
        ];
    
    }
    public function messages(): array
{
    return [
        'part_num.required' => 'Serial Number tidak boleh kosong',
        'no_po.required' => 'PO Number tidak boleh kosong',
        'qty_plan.required' => 'jumlah plan tidak boleh kosong',
        'assignment.required' => 'assignment tidak boleh kosong',
    ];
}
}
