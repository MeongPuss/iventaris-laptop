<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryLaptopRequest extends FormRequest
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
        $status = request()->input('status');

        $penyerahan = ($status == 'penyerahan') ? 'required|date' : null;
        $rotasi = ($status == 'rotasi') ? 'required|date' : null;
        $kembali = ($status == 'kembali') ? 'required|date' : null;

        return [
            'pegawai_id' => 'required|number',
            'laptop_id' => 'required|number',
            'unit' => 'required|string',
            'penyerahan' => $penyerahan,
            'rotasi' => $rotasi,
            'kembali' => $kembali,
            'ba' =>'required|file',
        ];
    }
}
