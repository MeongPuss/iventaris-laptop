<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PegawaiRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if (Request::isMethod('POST')) $nip = 'required|unique:pegawais,nip|min:5|max:30';
        if (Request::isMethod('PUT')) $nip = 'required|min:5|max:30|unique:pegawais,nip,' . $this->id;

        return [
            'nip' => $nip,
            'nama_pegawai' => 'required|min:5|max:50',
            'unit_id' => 'required|numeric',
            'status_pegawai' => 'required|in:1,2'
        ];
    }

    public function attributes(): array
    {
        return [
            'nip' => 'NIP',
            'nama_pegawai' => 'Nama Pegawai',
            'unit_id' => 'Unit',
            'status_pegawai' => 'Status Pegawai'
        ];
    }
}
