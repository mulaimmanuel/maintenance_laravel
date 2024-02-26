<?php

namespace App\Http\Controllers;

use App\Models\FormFPP;
use App\Models\TindakLanjut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FormFPPController extends Controller
{

    public function DashboardProduction()
    {
        // Mengambil semua data FormFPP
        $formperbaikans = FormFPP::latest()->get();

        // Mengambil semua data TindakLanjut
        $tindaklanjuts = TindakLanjut::latest()->get();

        return view('fpps.index', compact('formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function DashboardMaintenance()
    {
        // Mengambil semua data FormFPP
        $formperbaikans = FormFPP::latest()->get();

        // Mengambil semua data TindakLanjut
        $tindaklanjuts = TindakLanjut::latest()->get();

        return view('maintenance.index', compact('formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function DashboardDeptMTCE()
    {
        // Mengambil semua data FormFPP
        $formperbaikans = FormFPP::latest()->get();

        // Mengambil semua data TindakLanjut
        $tindaklanjuts = TindakLanjut::latest()->get();

        return view('deptmtce.index', compact('formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function DashboardFPPSales()
    {
        // Mengambil semua data FormFPP
        $formperbaikans = FormFPP::latest()->get();

        // Mengambil semua data TindakLanjut
        $tindaklanjuts = TindakLanjut::latest()->get();

        return view('sales.index', compact('formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('fpps.create');
    }

    public function LihatMaintenance(FormFPP $formperbaikan, TindakLanjut $tindaklanjut)
    {
        $formperbaikans = FormFPP::latest()->get();
        $tindaklanjuts = TindakLanjut::latest()->get();

        $status = $formperbaikan->status;

        return view('maintenance.lihat', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts', 'tindaklanjut'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function LihatFPPSales(FormFPP $formperbaikan)
    {
        // Mengambil semua data FormFPP
        $formperbaikans = FormFPP::latest()->get();

        // Mengambil semua data TindakLanjut
        $tindaklanjuts = TindakLanjut::latest()->get();

        // // Assuming $formperbaikan is an instance of the FormFPP model
        $status = $formperbaikan->status;

        return view('sales.lihat', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function EditMaintenance(FormFPP $formperbaikan, TindakLanjut $tindaklanjut)
    {
        // Determine view based on status
        // Mengambil semua data FormFPP
        $formperbaikans = FormFPP::latest()->get();

        // Mengambil semua data TindakLanjut
        $tindaklanjuts = TindakLanjut::latest()->get();

        $status = $formperbaikan->status;

        if ($status === '0') {
            return view('maintenance.edit', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts', 'tindaklanjut'))->with('i', (request()->input('page', 1) - 1) * 5);
        } elseif ($status === '2' || $status === '3') {
            return view('maintenance.lihat', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts', 'tindaklanjut'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else if ($status === '1') {
            return view('maintenance.create', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts', 'tindaklanjut'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    public function LihatFPP(FormFPP $formperbaikan)
    {
        // Mengambil semua data FormFPP
        $formperbaikans = FormFPP::latest()->get();

        // Mengambil semua data TindakLanjut
        $tindaklanjuts = TindakLanjut::latest()->get();

        $status = $formperbaikan->status;

        // Determine view based on status
        if ($formperbaikan->status === '0' || $formperbaikan->status === '3' || $formperbaikan->status === '1') {
            return view('fpps.show', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
        } elseif ($formperbaikan->status === '2') {
            return view('fpps.closed', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return view('fpps.index', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    public function LihatDeptMTCE(FormFPP $formperbaikan)
    {
        // Mengambil semua data FormFPP
        $formperbaikans = FormFPP::latest()->get();

        // Mengambil semua data TindakLanjut
        $tindaklanjuts = TindakLanjut::latest()->get();

        // // Assuming $formperbaikan is an instance of the FormFPP model
        $status = $formperbaikan->status;

        // Determine view based on status
        if ($formperbaikan->status === '0' || $formperbaikan->status === '3' || $formperbaikan->status === '1') {
            return view('deptmtce.lihatfpp', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
        } elseif ($formperbaikan->status === '2') {
            return view('deptmtce.show', compact('formperbaikan', 'formperbaikans', 'tindaklanjuts'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $viewName = 'deptmtce.index';
        }

        return view($viewName, compact('formperbaikan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:4096', // Hanya menerima format gambar dengan ukuran maksimal 4MB
        ]);

        // Dapatkan ID terakhir dari tabel FormFPP
        $lastFPPId = FormFPP::latest('id')->first()->id ?? 0;

        // Buat nomor FPP dengan format FPXXXX, misalnya FP0001
        $id_fpp = 'FP' . str_pad($lastFPPId + 1, 4, '0', STR_PAD_LEFT);

        // Tambahkan id_fpp ke dalam request
        $request->merge(['id_fpp' => $id_fpp]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/gambar'), $gambarName);
            $gambarPath = 'assets/gambar/' . $gambarName;
        } else {
            $gambarPath = null;
        }

        // Add 'status' field with a default value of 'open'
        $request->merge(['status' => 0]);
        $request->merge(['note' => 'Form FPP Dibuat']);

        // Simpan data mesin beserta path gambar dan file attachment ke database
        $createdFormFPP = FormFPP::create([
            'id_fpp' => $request->id_fpp,
            'pemohon' => $request->pemohon,
            'date' => $request->date,
            'section' => $request->section,
            'mesin' => $request->mesin,
            'lokasi' => $request->lokasi,
            'kendala' => $request->kendala,
            'gambar' => $gambarPath,
            'status' => $request->status,
        ]);

        TindakLanjut::create([
            'id_fpp' => $createdFormFPP->id_fpp,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return redirect()->route('fpps.index')->with('success', 'Form FPP created successfully.');
    }

    public function show(FormFPP $formperbaikan)
    {
        $status = $formperbaikan->status;
        if ($formperbaikan->status === '0' || $formperbaikan->status === '3') {
            $viewName = 'deptmtce.lihatfpp';
        } elseif ($formperbaikan->status === '2') {
            $viewName = 'deptmtce.show';
        } else {
            $viewName = 'deptmtce.index';
        }
        return view($viewName, compact('formperbaikan'));
    }

    public function edit(FormFPP $formperbaikan)
    {
        // Determine view based on status
        if ($formperbaikan->status === '0') {
            $viewName = 'maintenance.edit';
        } elseif ($formperbaikan->status === '2' || $formperbaikan->status === '3') {
            $viewName = 'maintenance.lihat';
        } else {
            $viewName = 'maintenance.create';
        }

        return view($viewName, compact('formperbaikan'));
    }

    public function update(Request $request, FormFPP $formperbaikan, TindakLanjut $tindaklanjut)
    {
        // Handle file upload/update for attachment_file
        if ($request->hasFile('attachment_file')) {
            $attachmentFile = $request->file('attachment_file');
            $attachmentFileName = $attachmentFile->getClientOriginalName();
            $attachmentFile->move(public_path('assets/attachment'), $attachmentFileName);
            $attachmentFilePath = 'assets/attachment/' . $attachmentFileName;
        } else {
            $attachmentFilePath = null;
        }

        // Replicate model TindakLanjut yang ada
        $newTindakLanjut = $tindaklanjut->replicate();

        // Assign fields that need to be updated
        $newTindakLanjut->id_fpp = $formperbaikan->id_fpp;
        $newTindakLanjut->tindak_lanjut = $request->input('tindak_lanjut', $tindaklanjut->tindak_lanjut);
        $newTindakLanjut->due_date = $request->input('due_date', $tindaklanjut->due_date);
        $newTindakLanjut->schedule_pengecekan = $request->input('schedule_pengecekan', $tindaklanjut->schedule_pengecekan);
        $newTindakLanjut->status = $request->input('status', $tindaklanjut->status);
        $newTindakLanjut->note = $request->input('note', $tindaklanjut->note);
        $newTindakLanjut->attachment_file = $attachmentFilePath;

        // Save the updated model
        $newTindakLanjut->save();

        // Update other form data
        $formperbaikan->update($request->all());

        // Update the form data
        $confirmedFinish = $request->input('confirmed_finish'); // Ubah status jadi finish
        $confirmedFinish2 = $request->input('confirmed_finish2'); // Dikonfimasi oleh Dept.MTCE
        $confirmedFinish3 = $request->input('confirmed_finish3'); // Ubah status menjadi Closed
        $confirmedFinish4 = $request->input('confirmed_finish4'); // Ubah status menjadi On Progress ketika Check Again
        $confirmedFinish5 = $request->input('confirmed_finish5'); // Save Tidak mengubah status
        $confirmedFinish6 = $request->input('confirmed_finish6'); // Save Tidak mengubah status

        // Check the confirmed_finish conditions
        if ($confirmedFinish === "1") {
            // Update the status and note accordingly in the original TindakLanjut
            $formperbaikan->update(['status' => 2]);
            $newTindakLanjut->update([
                'note' => 'DISUBMIT MAINTENANCE',
                'status' => '2',
            ]);

            return redirect()->route('maintenance.index')->with('success', 'Form FPP updated successfully');
        } elseif ($confirmedFinish2 === "1") {
            // Update the status and note accordingly in the original TindakLanjut
            $formperbaikan->update(['status' => '2']);
            $newTindakLanjut->update([
                'note' => 'Dikonfirmasi Dept.Maintenance',
                'status' => '2',
            ]);

            return redirect()->route('deptmtce.index')->with('success', 'Form FPP updated successfully');
        } elseif ($confirmedFinish3 === "1") {
            // Update the status and note accordingly in the original TindakLanjut
            $formperbaikan->update(['status' => '3']);
            $newTindakLanjut->update(['note' => 'Diclosed Production', 'status' => '3']);

            return redirect()->route('fpps.index')->with('success', 'Form FPP updated successfully');
        } elseif ($confirmedFinish4 === "1") {
            // Update the status and note accordingly in the original TindakLanjut
            $formperbaikan->update(['status' => '1']);
            $newTindakLanjut->update(['status' => '1']);
            return redirect()->route('deptmtce.index')->with('success', 'Form FPP updated successfully');
        } elseif ($confirmedFinish5 === "1") {
            // Update the status and note accordingly in the original TindakLanjut
            $formperbaikan->update(['status' => '1']);
            $newTindakLanjut->update(['note' => 'Dikonfirmasi Maintenance']);
            return redirect()->route('maintenance.index')->with('success', 'Form FPP updated successfully');
        } elseif ($confirmedFinish6 === "1") {
            // Update the status and note accordingly in the original TindakLanjut
            $formperbaikan->update(['status' => '1']);
            $newTindakLanjut->update(['note' => 'Sedang Ditindaklanjuti', 'status' => '1']);
            return redirect()->route('maintenance.index')->with('success', 'Form FPP updated successfully');
        } else {
            $newTindakLanjut->update(['note' => 'Sedang Ditindaklanjuti', 'status' => '1']);
            $formperbaikan->update(['status' => '1']);
            return redirect()->route('maintenance.index')->with('success', 'Form FPP updated successfully');
        }
    }

    public function downloadAttachment(TindakLanjut $tindaklanjut)
    {
        // Pastikan file attachment_file ada sebelum mencoba mengunduh
        if ($tindaklanjut->attachment_file) {
            $filePath = public_path($tindaklanjut->attachment_file);

            // Pastikan file ada di dalam direktori publik
            if (file_exists($filePath)) {
                // Ambil base filename dari attachment
                $baseFileName = basename($tindaklanjut->attachment_file);

                return response()->download($filePath, $baseFileName);
            } else {
                // File tidak ditemukan, arahkan kembali dengan pesan kesalahan
                return redirect()->back()->with('error', 'File not found.');
            }
        } else {
            // Handle case when no file is attached
            return redirect()->back()->with('error', 'No file attached.');
        }
    }
}
