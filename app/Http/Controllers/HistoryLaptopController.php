<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoryLaptopRequest;
use App\Models\Unit;
use App\Models\Laptop;
use App\Models\Pegawai;
use Illuminate\Support\Str;
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

    public function store(HistoryLaptopRequest $request)
    {
        $pegawai = Pegawai::select('nip', 'id')->where('id', $request->pegawai_id)->get()->last();
        $laptop = Pegawai::select('sn', 'id')->where('id', $request->laptop_id)->get()->last();
        $imageName = $request->status . "-" . $pegawai['nip'] . "-" . $laptop['sn'] . "-" . Str::random(10) . time();

        if($request->status == 'penyerahan') {
            $status = 1;
            HistoryLaptop::create([
                'unit' => $request->unit,
                'laptop_id' => $request->laptop_id,
                'pegawai_id' => $request->pegawai_id,
                'penyerahan' => $request->penyerahan,
                'ba' => $imageName,
                'status' => $status,
            ]);
        }

        if ($request->status == 'rotasi') {
            $status = 2;
            $lastHistoryUser = HistoryLaptop::select('penyerahan')->where('laptop_id', $laptop['id'])->where('pegawai_id', $pegawai['id'])->whereNull('rotasi')->get()->last();
            HistoryLaptop::create([
                'unit' => $request->unit,
                'laptop_id' => $request->laptop_id,
                'pegawai_id' => $request->pegawai_id,
                'penyerahan' => $lastHistoryUser['penyerahan'],
                'rotasi' => $request->rotasi,
                'ba' => $imageName,
                'status' => $status,
            ]);
        }

        if ($request->status == 'kembali') {
            $status = 3;
            $lastHistoryUser = HistoryLaptop::select('penyerahan', 'rotasi')->where('laptop_id', $laptop['id'])->where('pegawai_id', $pegawai['id'])->whereNull('kembali')->get()->last();

                if ($lastHistoryUser['rotasi'] != null) {
                    $rotasi = $lastHistoryUser['rotasi'];
                } else {
                    $rotasi = null;
                }
            HistoryLaptop::create([
                'unit' => $request->unit,
                'laptop_id' => $request->laptop_id,
                'pegawai_id' => $request->pegawai_id,
                'penyerahan' => $lastHistoryUser['penyerahan'],
                'rotasi' => $rotasi,
                'kembali' => $request->kembali,
                'ba' => $imageName,
                'status' => $status,
            ]);
        }

        $request->ba->move(public_path('assets/images/ba'), $imageName);

        Laptop::findOrFail($laptop['id'])->update([
            'status' => $status
        ]);

        return redirect()->route('history-laptop.index')->with('success', 'Data Berhasil Ditambahkan');
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
