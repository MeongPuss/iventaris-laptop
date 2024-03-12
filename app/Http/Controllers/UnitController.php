<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Imports\UnitImport;
use App\Models\Unit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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

        return redirect()->route('unit.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function update(UnitRequest $request, string $id)
    {
        Unit::findOrFail($id)->update([
            'nama_unit' => Str::upper($request->nama_unit),
        ]);

        return redirect()->route('unit.index')->with('success','Data Berhasil Diubah');
    }

    public function destroy(string $id)
    {
        Unit::destroy($id);
        return redirect()->route('unit.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new UnitImport, $file);

        return redirect()->route('unit.index')->with('success', 'Import data unit berhasil');
    }
}
