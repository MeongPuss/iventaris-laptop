<?php

namespace App\Http\Controllers;

use App\Models\HistoryLaptop;
use App\Models\Unit;
use App\Models\Laptop;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $unit = count(Unit::select('id')->get());
        $laptop = count(Laptop::select('id')->get());
        $pegawai = count(Pegawai::select('id')->get());

        return view('dashboard.home.index', compact('unit', 'laptop', 'pegawai'));

    }
}
