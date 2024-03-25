<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UnitRequest extends FormRequest
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
        if (Request::isMethod('POST')) $namaUnit = 'required|unique:units,nama_unit|min:5|max:30';

        if (Request::isMethod('PUT')) $namaUnit = 'required|min:5|max:30|unique:units,nama_unit,' . $this->id;

        return [
            'unit_induk' => "required",
            'unit_pelaksana' => "required",
            'nama_unit' => $namaUnit,
        ];
    }

    public function attributes(): array
    {
        return [
            'unit_induk' => "Unit Induk",
            'unit_pelaksana' => "Unit Pelaksana",
            'nama_unit' => 'Nama Unit',
        ];
    }
}
