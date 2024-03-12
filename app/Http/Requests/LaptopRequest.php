<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LaptopRequest extends FormRequest
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
        if (Request::isMethod('POST')) $sn = 'required|unique:laptops,sn|min:5|max:30';
        if (Request::isMethod('PUT')) $sn = 'required|min:5|max:30|unique:laptops,sn,' . $this->id;

        return [
            'sn' => $sn,
            'merek' => 'required|in:hp,lenovo,acer,dell,asus',
            'tipe' => 'required|min:5|max:30',
            'processor' => 'required',
            'ram' => 'required|numeric',
            'penyimpanan' => 'required|numeric',
            'kapasitas' => 'required|in:GB,TB',
            'garansi' => 'required|date',
            'remote' => 'required',
            'status' => 'required|in:1,2'
        ];
    }

    public function attributes(): array
    {
        return [
            'sn' => 'SN',
            'merek' => 'Merek Laptop',
            'tipe' => 'Tipe Laptop',
            'processor' => 'Processor Laptop',
            'ram' => 'RAM Laptop',
            'penyimpanan' => 'Penyimpanan Laptop',
            'kapasitas' => 'Kapasitas Laptop',
            'garansi' => 'Garansi Laptop',
            'remote' => 'ID Remote Laptop',
            'status' => 'Status'
        ];
    }
}
