<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiRequest;
use App\Models\Unit;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('unit')->get();

        $title = 'Hapus Pegawai';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('dashboard.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        $unit = Unit::all();

        return view('dashboard.pegawai.create', compact('unit'));
    }

    public function store(PegawaiRequest $request)
    {
        Pegawai::create([
            'nip' => $request->nip,
            'nama_pegawai' => $request->nama_pegawai,
            'status_pegawai' => $request->status_pegawai,
            'unit_id' => $request->unit_id,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Pegawai $pegawai)
    {

    }

    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $unit = Unit::all();

        return view('dashboard.pegawai.update', compact('pegawai', 'unit'));
    }

    public function update(PegawaiRequest $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update([
            'nip' => $request->nip,
            'nama_pegawai' => $request->nama_pegawai,
            'status_pegawai' => $request->status_pegawai,
            'unit_id' => $request->unit_id,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(string $id)
    {
        Pegawai::destroy($id);
        return redirect()->route('pegawai.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        $import = new PegawaiImport;
        Excel::import($import, $file);
        $faileds = $import->data;
        Session::put('faileds', $faileds);

        return redirect()->route('pegawai.index')->with('error', 'Terdapat data duplikat atau data salah');
    }
}
