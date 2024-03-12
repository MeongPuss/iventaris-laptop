<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaptopRequest;
use App\Imports\LaptopImport;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaptopController extends Controller
{
    public function index()
    {
        $laptop = Laptop::all();

        $title = 'Hapus Laptop';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('dashboard.laptop.index', compact('laptop'));
    }

    public function create()
    {
        return view('dashboard.laptop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaptopRequest $request)
    {
        $penyimpanan = $request->penyimpanan." ".$request->kapasitas;

        Laptop::create([
            'sn' => strtoupper($request->sn),
            'merek' => strtoupper($request->merek),
            'tipe' => strtoupper($request->tipe),
            'processor' => $request->processor,
            'ram' => $request->ram,
            'penyimpanan' => $penyimpanan,
            'garansi' => $request->garansi,
            'anydesk' => $request->anydesk,
            'status' => $request->status,
        ]);

        return redirect()->route('laptops.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Laptop $laptop)
    {
        //
    }

    public function edit(string $id)
    {
        $laptop = Laptop::findOrFail($id);
        $penyimpanan =  explode(' ', $laptop->penyimpanan);

        return view('dashboard.laptop.update', compact('laptop', 'penyimpanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaptopRequest $request, string $id)
    {
        $penyimpanan = $request->penyimpanan." ".$request->kapasitas;

        Laptop::findOrFail($id)->update([
            'sn' => strtoupper($request->sn),
            'merek' => strtoupper($request->merek),
            'tipe' => strtoupper($request->tipe),
            'processor' => $request->processor,
            'ram' => $request->ram,
            'penyimpanan' => $penyimpanan,
            'garansi' => $request->garansi,
            'anydesk' => $request->anydesk,
            'status' => $request->status,
        ]);

        return redirect()->route('laptops.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(string $id)
    {
        Laptop::destroy($id);
        return redirect()->route('laptops.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new LaptopImport, $file);

        return redirect()->route('laptops.index');
    }
}
