<?php

namespace App\Http\Controllers;

use App\Models\FormFPP;
use Illuminate\Support\Facades\Storage;
use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function index()
    {
        $mesins = Mesin::latest()->get();

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
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:4096', // Hanya menerima format gambar dengan ukuran maksimal 4MB
            'sparepart' => 'image|mimes:jpeg,png,jpg,gif|max:4096', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Pindahkan foto ke direktori public/assets/foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = $foto->getClientOriginalName();
            $foto->move(public_path('assets/foto'), $fotoName);
            $fotoPath = 'assets/foto/' . $fotoName;
        } else {
            $fotoPath = null;
        }

        // Pindahkan sparepart ke direktori public/assets/sparepart
        if ($request->hasFile('sparepart')) {
            $sparepart = $request->file('sparepart');
            $sparepartName = $sparepart->getClientOriginalName();
            $sparepart->move(public_path('assets/sparepart'), $sparepartName);
            $sparepartPath = 'assets/sparepart/' . $sparepartName;
        } else {
            $sparepartPath = null;
        }

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

    public function show(Mesin $mesin, FormFPP $formperbaikan)
    {
        // Mengambil formperbaikans berdasarkan status 3 dan nomor_mesin dari mesin yang sama dengan mesin di formperbaikan
        $formperbaikans = FormFPP::where('status', '3')
            ->where('mesin', $mesin->no_mesin)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('mesins.show', compact('mesin', 'formperbaikan', 'formperbaikans'));
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

        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($mesin->foto) {
                $oldFotoPath = public_path('assets/' . $mesin->foto);
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }

            // Simpan foto baru
            $foto = $request->file('foto');
            $fotoName = $foto->getClientOriginalName();
            $fotoPath = $foto->move(public_path('assets/foto'), $fotoName);

            // Perbarui path foto di database
            $mesin->foto = 'foto/' . $fotoName;
            $mesin->save();
        }

        return redirect()->route('mesins.index')->with('success', 'Mesin updated successfully');
    }


    public function destroy(Mesin $mesin)

    {
        $mesin->delete();
        return redirect()->route('mesins.index')->with('success', 'Mesin deleted successfully');
    }
}
