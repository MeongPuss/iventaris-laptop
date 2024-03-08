<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Itsupport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ItsupportController extends Controller
{
    public function index()
    {
        $itSupport = Itsupport::orderBy('created_at', 'desc')->get();

        $title = 'Hapus Laptop';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('dashboard.it.index', compact('itSupport'));
    }

    public function create()
    {
        $units = Unit::all();
        return view('dashboard.it.create', compact('units'));
    }

    public function store(Request $request)
    {
        $itSupport = Itsupport::create([
            'nip' => $request->nip,
            'nama_it' => $request->nama_it,
            'username' => Str::lower($request->username),
            'password' => $request->password,
            'role' => 2,
        ]);

        $itSupport->units()->attach($request->unit_id);

        return redirect()->route('it.index')->with('success', 'IT Support berhasil ditambah');
    }

    public function show(string $id)
    {
        $itSupport = Itsupport::with('units')->find($id);
        return view('dashboard.it.show', compact('itSupport'));
    }

    public function edit(string $id)
    {
        $itSupport = Itsupport::with('units')->find($id);
        $units = Unit::all();
        $itUnit = array_column($itSupport->units->toArray(), 'id');
        return view('dashboard.it.update', compact('itSupport', 'units', 'itUnit'));
    }

    public function update(Request $request, string $id)
    {
        $itSupport = Itsupport::find($id);
        $itSupport->update([
            'nip' => $request->nip,
            'nama_it' => $request->nama_it,
            'username' => Str::lower($request->username),
        ]);

        $itSupport->units()->sync($request->unit_id);

        return redirect()->route('it.index')->with('success', 'IT Support berhasil diubah');
    }

    public function destroy(string $id)
    {
        Itsupport::destroy($id);
        return redirect()->route('it.index')->with('success', 'Data berhasil dihapus');
    }

    public function resetPassword(string $id)
    {
        $itSupport = Itsupport::find($id);
        $newPassword = "p@ssw0rd123";

        $itSupport->update([
            'password' => $newPassword
        ]);

        return redirect()->route('it.show', ['id' => $itSupport->id])->with('success', 'Password berhasil direset');
    }
}
