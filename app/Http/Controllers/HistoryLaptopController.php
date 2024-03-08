<?php

namespace App\Http\Controllers;

use App\Imports\HistoryLaptopImport;
use App\Models\Laptop;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\HistoryLaptop;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class HistoryLaptopController extends Controller
{

    public function index()
    {
        $historys = HistoryLaptop::with(['laptops', 'pegawais'])->groupBy('pegawai_id')->orderByDesc('pegawai_id')->get();

        return view('dashboard.history_laptop.index', compact('historys'));
    }

    public function create()
    {
        $laptop = Laptop::all();
        $pegawai = Pegawai::all();

        return view('dashboard.history_laptop.create', compact('laptop', 'pegawai'));
    }

    public function store(Request $request)
    {
        $path = 'file:///D:/php/mas-dhifa/data/1.png';
        header("Content-type: image/png");
        dd(readfile($path));
        //move image
        $imageName = time()."_".$request->ba;
        $request->ba->move(public_path('assets/images/ba'), $imageName);

        $pegawai = Pegawai::findOrFail($request->pegawai_id);
        $unit = $pegawai->unit->nama_unit;

        HistoryLaptop::create([
            'unit' => $unit,
            'laptop_id' => $request->laptop_id,
            'pegawai_id' => $request->pegawai_id,
            'penyerahan' => $request->penyerahan,
            'kembali' => null,
            'ba' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('history-laptop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HistoryLaptop $historyLaptop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoryLaptop $historyLaptop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistoryLaptop $historyLaptop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoryLaptop $historyLaptop)
    {
        //
    }

    public function import(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls',
        // ]);

        $file = $request->file('file');

        // $import = new HistoryLaptopImport;
        Excel::import(new HistoryLaptopImport, $file);

        return redirect()->route('history-laptop.index');
    }
}
