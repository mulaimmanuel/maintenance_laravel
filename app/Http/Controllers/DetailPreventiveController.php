<?php

namespace App\Http\Controllers;

use App\Models\DetailPreventive;
use App\Models\Mesin;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Http\Request;

class DetailPreventiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Mendapatkan id_mesin berdasarkan id terkait di tabel Mesin
        $mesin = Mesin::find($request->id_mesin);

        // Jika tidak ditemukan mesin dengan id yang diberikan
        if (!$mesin) {
            return redirect()->back()->with('error', 'Mesin not found.');
        }

        // Simpan data mesin beserta path foto dan sparepart ke database
        DetailPreventive::create([
            'id_mesin' => $mesin->id,
            'issue' => $request->issue,
            'rencana_perbaikan' => $request->rencana_perbaikan
        ]);

        return redirect()->route('maintenance.dashpreventive')->with('success', 'Detail preventive added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailPreventive $detailPreventive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailPreventive $detailPreventive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailPreventive $detailPreventive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPreventive $detailPreventive)
    {
        //
    }
}
