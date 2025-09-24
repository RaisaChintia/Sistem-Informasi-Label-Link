<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Carbon\Carbon;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $query = Pasien::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%");
        }

        // ✅ Urutkan berdasarkan no_registrasi terbaru (desc)
        // Jika no_registrasi varchar, gunakan CAST agar urutan angka benar
        $pasien = $query->orderBy('id', 'desc')
                        //->orderByRaw('CAST(no_registrasi AS UNSIGNED) DESC')
                        ->paginate(10)
                        ->withQueryString();

        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_registrasi' => 'required|unique:pasien,no_registrasi',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // ✅ perbaikan validasi unique agar aman saat update
            'no_registrasi' => 'required|unique:pasien,no_registrasi,' . $id,
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }

    // === METHOD LABEL ===
    public function label($id)
    {
        $pasien = Pasien::findOrFail($id);

        // ✅ Hitung usia langsung di controller
        $tglLahir = Carbon::parse($pasien->tanggal_lahir);
        $usiaObj = $tglLahir->diff(Carbon::now());
        $usia = $usiaObj->y . ' Th ' . $usiaObj->m . ' bln ' . $usiaObj->d . ' hr';

        return view('pasien.label', compact('pasien', 'usia'));
    }
}
