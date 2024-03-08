<?php

namespace App\Http\Controllers;

use App\Imports\UnitImport;
use App\Models\Unit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function store(Request $request)
    {
        Unit::create([
            'nama_unit' => $request->nama_unit,
        ]);

        return redirect()->route('unit.index');
    }

    public function update(Request $request, string $id)
    {
        Unit::findOrFail($id)->update([
            'nama_unit' => $request->nama_unit
        ]);

        return redirect()->route('unit.index');
    }

    public function destroy(string $id)
    {
        Unit::destroy($id);
        toast('Kategori berhasil di hapus','success');
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
