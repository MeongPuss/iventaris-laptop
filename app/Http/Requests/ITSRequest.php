<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ITSRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if (Request::isMethod('POST')) $nip = 'required|unique:itsupports,nip|min:5|max:30';

        if (Request::isMethod('PUT')) $nip = 'required|min:5|max:30|unique:itsupports,nip,' . $this->id;

        return [
            'nip' => $nip,
            'nama_it' => 'required|min:5|max:50',
            'username' => 'required',
            'unit_id' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'nip' => 'NIP',
            'nama_it' => 'Nama IT Support',
            'username' => 'Username',
            'unit_id' => 'Unit',
        ];
    }
}
