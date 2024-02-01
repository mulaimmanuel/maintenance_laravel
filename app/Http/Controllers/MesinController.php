<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function index()
    {
        $mesins = Mesin::latest()->paginate(5);
        return view('mesins.index', compact('mesins'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('mesins.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Hanya menerima format gambar dengan ukuran maksimal 2MB
            'sparepart' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Simpan foto dan sparepart ke penyimpanan dan dapatkan pathnya
        $fotoPath = $request->file('foto') ? $request->file('foto')->store('foto', 'public') : null;
        $sparepartPath = $request->file('sparepart') ? $request->file('sparepart')->store('sparepart', 'public') : null;

        // Simpan data mesin beserta path foto dan sparepart ke database
        Mesin::create([
            'nama_mesin' => $request->nama_mesin,
            'no_mesin' => $request->no_mesin,
            'merk' => $request->merk,
            'type' => $request->type,
            'mfg_date' => $request->mfg_date,
            'acq_date' => $request->acq_date,
            'age' => $request->age,
            'preventive_date' => $request->preventive_date,
            'foto' => $fotoPath,
            'sparepart' => $sparepartPath
        ]);

        return redirect()->route('mesins.index')->with('success', 'Mesin created successfully');
    }


    public function show(Mesin $mesin)
    {
        return view('mesins.show', compact('mesin'));
    }

    public function edit(Mesin $mesin)
    {
        return view('mesins.edit', compact('mesin'));
    }

    public function update(Request $request, Mesin $mesin)
    {
        // Update data mesin
        $mesin->update([
            'nama_mesin' => $request->nama_mesin,
            'no_mesin' => $request->no_mesin,
            'merk' => $request->merk,
            'type' => $request->type,
            'mfg_date' => $request->mfg_date,
            'acq_date' => $request->acq_date,
            'age' => $request->age,
            'preventive_date' => $request->preventive_date
        ]);

        // Jika ada foto baru, simpan ke penyimpanan dan update pathnya
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika tidak null
            if ($mesin->foto) {
                Storage::disk('public')->delete($mesin->foto);
            }

            $fotoPath = $request->file('foto')->store('foto', 'public');
            $mesin->update(['foto' => $fotoPath]);
        }

        // Jika ada sparepart baru, simpan ke penyimpanan dan update pathnya
        if ($request->hasFile('sparepart')) {
            // Hapus sparepart lama jika tidak null
            if ($mesin->sparepart) {
                Storage::disk('public')->delete($mesin->sparepart);
            }

            $sparepartPath = $request->file('sparepart')->store('sparepart', 'public');
            $mesin->update(['sparepart' => $sparepartPath]);
        }

        return redirect()->route('mesins.index')->with('success', 'Mesin updated successfully');
    }


    public function destroy(Mesin $mesin)

    {
        $mesin->delete();
        return redirect()->route('mesins.index')->with('success', 'Mesin deleted successfully');
    }
}
