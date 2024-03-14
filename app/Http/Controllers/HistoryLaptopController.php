<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Laptop;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\HistoryLaptop;
use App\Imports\HistoryLaptopImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class HistoryLaptopController extends Controller
{

    public function index()
    {
        $historys = HistoryLaptop::with(['laptops', 'pegawais'])->groupBy('pegawai_id')->orderByDesc('pegawai_id')->get();

        return view('dashboard.history_laptop.index', compact('historys'));
    }

    public function create()
    {
        $laptop = Laptop::all('id', 'sn');
        $pegawai = Pegawai::select('id', 'nama_pegawai')->get();
        $unit = Unit::select('nama_unit')->get();

        return view('dashboard.history_laptop.create', compact('laptop', 'pegawai', 'unit'));
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
            'ba' => $imageName,
            'status' => 1,
        ]);

        return redirect()->route('history-laptop.index');
    }

    /**
     * Display the specified resource.
     */
    public function showPegawai(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $type = 'pegawai';
        $detail = HistoryLaptop::with(['laptops', 'pegawais'])->where('pegawai_id', $id)->orderByDesc('created_at')->get();

        return view('dashboard.history_laptop.detail', compact('detail', 'type', 'pegawai'));
    }

    public function showLaptop(string $id)
    {
        $laptop = Laptop::findOrFail($id);
        $type = 'laptop';
        $detail = HistoryLaptop::with(['laptops', 'pegawais'])->where('laptop_id', $id)->orderByDesc('created_at')->get();

        return view('dashboard.history_laptop.detail', compact('detail', 'type', 'laptop'));
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
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        // $import = new HistoryLaptopImport;
        Excel::import(new HistoryLaptopImport, $file);

        return redirect()->route('history-laptop.index');
    }
}
