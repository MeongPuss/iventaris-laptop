<?php

namespace App\Http\Controllers;

use App\Models\HistoryLaptop;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $laporan = HistoryLaptop::with(['laptops', 'pegawais'])->get();
        dd($laporan);
        if($request->sort == 0) {
        }
        return view('dashboard.report.index');
    }
}
