<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Imports\UnitImport;
use App\Models\Unit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all();

        $title = 'Hapus Unit';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('dashboard/unit/index', compact('unit'));
    }

    public function store(UnitRequest $request)
    {
        Unit::create([
            'nama_unit' => Str::upper($request->nama_unit),
        ]);

        Session::flash('success','Simpan data unit berhasil');
        return redirect()->route('unit.index');
    }

    public function update(UnitRequest $request, string $id)
    {
        Unit::findOrFail($id)->update([
            'nama_unit' => Str::upper($request->nama_unit),
        ]);

        Session::flash('success','Ubah data unit berhasil');
        return redirect()->route('unit.index');
    }

    public function destroy(string $id)
    {
        Unit::destroy($id);
        Session::flash('success', 'Hapus data unit berhasil');
        return redirect()->route('unit.index');
    }

    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new UnitImport, $file);

        return redirect()->route('unit.index');
    }
}
