<?php

namespace App\Http\Controllers;

use App\Models\FormFPP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FormFPPController extends Controller
{

    public function index()
    {
    }

    public function DashboardProduction()
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        return view('fpps.index', compact('formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function DashboardMaintenance()
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        return view('maintenance.index', compact('formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function DashboardDeptMTCE()
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        return view('deptmtce.index', compact('formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function DashboardFPPSales()
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        return view('sales.index', compact('formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('fpps.create');
    }

    public function LihatMaintenance(FormFPP $formperbaikan)
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        // // Assuming $formperbaikan is an instance of the FormFPP model
        $status = $formperbaikan->status;

        return view('maintenance.lihat', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function LihatFPPSales(FormFPP $formperbaikan)
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        // // Assuming $formperbaikan is an instance of the FormFPP model
        $status = $formperbaikan->status;

        return view('sales.lihat', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function EditMaintenance(FormFPP $formperbaikan)
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        // Determine view based on status
        if ($formperbaikan->status === 'Open') {
            return view('maintenance.edit', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
        } elseif ($formperbaikan->status === 'Finish' || $formperbaikan->status === 'Closed') {
            return view('maintenance.lihat', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return view('maintenance.create', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }


    public function LihatFPP(FormFPP $formperbaikan)
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        $status = $formperbaikan->status;

        // Determine view based on status
        if ($formperbaikan->status === 'Open' || $formperbaikan->status === 'Closed' || $formperbaikan->status === 'On Progress') {
            return view('fpps.show', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
        } elseif ($formperbaikan->status === 'Finish') {
            return view('fpps.closed', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return view('fpps.index', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    public function LihatDeptMTCE(FormFPP $formperbaikan)
    {
        $formperbaikans = FormFPP::latest()->paginate(5);
        // // Assuming $formperbaikan is an instance of the FormFPP model
        $status = $formperbaikan->status;

        // Determine view based on status
        if ($formperbaikan->status === 'Open' || $formperbaikan->status === 'Closed' || $formperbaikan->status === 'On Progress') {
            return view('deptmtce.lihatfpp', compact('formperbaikans', 'formperbaikan'))->with('i', (request()->input('page', 1) - 1) * 5);
        } elseif ($formperbaikan->status === 'Finish') {
            return view('deptmtce.show', compact('formperbaikan', 'formperbaikans'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $viewName = 'deptmtce.index';
        }

        return view($viewName, compact('formperbaikan'));
    }

    public function store(Request $request)
    {
        // Simpan gambar ke penyimpanan dan dapatkan pathnya
        $gambarPath = $request->hasFile('gambar') ? $request->file('gambar')->store('gambar', 'public') : null;

        // Add 'status' field with a default value of 'open'
        $request->merge(['status' => 'Open']);
        $request->merge(['note' => 'Form FPP Dibuat']);

        // Simpan data mesin beserta path gambar dan file attachment ke database
        FormFPP::create([
            'pemohon' => $request->pemohon,
            'date' => $request->date,
            'section' => $request->section,
            'mesin' => $request->mesin,
            'lokasi' => $request->lokasi,
            'kendala' => $request->kendala,
            'gambar' => $gambarPath,
            'status' => $request->status,
            'tindak_lanjut' => $request->tindak_lanjut,
            'due_date' => $request->due_date,
            'schedule_pengecekan' => $request->schedule_pengecekan,
            'attachment_file' => $request->attachment_file,
            'note' => $request->note
        ]);

        return redirect()->route('fpps.index')->with('success', 'Form FPP created successfully.');
    }

    public function show(FormFPP $formperbaikan)
    {
        $status = $formperbaikan->status;
        if ($formperbaikan->status === 'Open' || $formperbaikan->status === 'Closed') {
            $viewName = 'deptmtce.lihatfpp';
        } elseif ($formperbaikan->status === 'Finish') {
            $viewName = 'deptmtce.show';
        } else {
            $viewName = 'deptmtce.index';
        }
        return view($viewName, compact('formperbaikan'));
    }

    public function edit(FormFPP $formperbaikan)
    {
        // Determine view based on status
        if ($formperbaikan->status === 'Open') {
            $viewName = 'maintenance.edit';
        } elseif ($formperbaikan->status === 'Finish' || $formperbaikan->status === 'Closed') {
            $viewName = 'maintenance.lihat';
        } else {
            $viewName = 'maintenance.create';
        }

        return view($viewName, compact('formperbaikan'));
    }


    public function update(Request $request, FormFPP $formperbaikan)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'attachment_file' => 'file|mimes:xlsx,xls|max:2048',
        ]);

        // Handle file upload/update
        if ($request->hasFile('attachment_file')) {
            // Delete the existing file if it exists
            if ($formperbaikan->attachment_file) {
                Storage::delete($formperbaikan->attachment_file);
            }

            // Store the new file
            $attachmentFile = $request->file('attachment_file')->store('public');
        } else {
            // If no new file is uploaded, use the existing file path
            $attachmentFile = $formperbaikan->attachment_file;
        }

        // Update other form data
        $formperbaikan->update(array_merge($request->all(), ['note' => $request->input('note'), 'attachment_file' => $attachmentFile]));


        // Update the form data
        $confirmedFinish = $request->input('confirmed_finish'); //Maintenance Finish tindak Lanjut
        $confirmedFinish2 = $request->input('confirmed_finish2'); //Dept.MTCE Konfirmasi
        $confirmedFinish3 = $request->input('confirmed_finish3'); //User Production Closed FPP
        $confirmedFinish4 = $request->input('confirmed_finish4'); //Dept.Mtce Check Again

        // Check if 'confirmed_finish' is submitted
        if ($confirmedFinish === "1") {
            // Update the status to 'Closed'
            $formperbaikan->update(['note' => 'Tindak Lanjut Submitted']);
            $formperbaikan->update(['status' => 'Finish']);
            return redirect()->route('maintenance.index')->with('success', 'Form FPP updated successfully');
        } else if ($confirmedFinish2 === "1") {
            // Update the status to 'On Progress'
            $formperbaikan->update(['note' => 'Tindak Lanjut Berhasil Dikonfirmasi']);
            return redirect()->route('deptmtce.index')->with('success', 'Form FPP updated successfully');
        } else if ($confirmedFinish3 === "1") {
            // Update the status to 'Closed'
            $formperbaikan->update(['note' => 'Form FPP Closed']);
            $formperbaikan->update(['status' => 'Closed']);
            return redirect()->route('deptmtce.index')->with('success', 'Form FPP updated successfully');
        } else if ($confirmedFinish4 === "1") {
            $formperbaikan->update(['status' => 'On Progress']);
            return redirect()->route('deptmtce.index')->with('success', 'Form FPP updated successfully');
        } else {
            // If 'confirmed_finish' is not submitted, update the status to 'On Progress'
            // Draft Tindak Lanjut
            $formperbaikan->update(['note' => 'Draft Tindak Lanjut']);
            $formperbaikan->update(['status' => 'On Progress']);
            return redirect()->route('maintenance.index')->with('success', 'Form FPP updated successfully');
        }
    }

    public function downloadExcelFile(FormFPP $formperbaikan)
    {
        // Pastikan file attachment_file ada sebelum mencoba mengunduh
        if ($formperbaikan->attachment_file) {
            // Format ID dengan lebar 4 digit (0001, 0002, dst.)
            $formattedId = sprintf("%04d", $formperbaikan->id);

            // Buat nama file dengan format yang diinginkan
            $fileName = "Form FPP {$formattedId}.xlsx";

            $filePath = storage_path("app/{$formperbaikan->attachment_file}");

            return response()->download($filePath, $fileName);
        } else {
            // Handle case when no file is attached
            return redirect()->back()->with('error', 'No Excel file attached.');
        }
    }
}
