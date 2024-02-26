<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handling;
use App\Models\Customer;
use App\Models\TypeMaterial;
use App\Models\ScheduleVisit;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class DeptManController extends Controller
{
    //viewSubmission
    public function submission()
    {
        $data = Handling::with('customers', 'type_materials')
            ->where('status', '=', 0) // Filter berdasarkan status '0'
            ->orderByDesc('created_at') // Urutkan secara descending berdasarkan kolom 'created_at' atau sesuaikan dengan kolom yang sesuai
            ->paginate(5);


        $data2 = Handling::with('customers', 'type_materials')
            ->whereIn('status', [1, 2, 3]) // Filter berdasarkan status 1, 2, dan 3
            ->orderByDesc('created_at') // Urutkan secara descending berdasarkan kolom 'created_at' atau sesuaikan dengan kolom yang sesuai
            ->paginate(5);

        return view('deptman.submission', compact('data', 'data2'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function scheduleVisit()
    {
        // Ambil semua data ScheduleVisit dari database
        $scheduleVisits = ScheduleVisit::all();

        return view('deptman.scheduleVisit', compact('scheduleVisits'));
    }


    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function showConfirm(string $id): View
    {
        //get handlings by ID
        $handlings = Handling::findOrFail($id);
        $customers = Customer::all();
        $type_materials = TypeMaterial::all();

        //render view with handlings
        return view('deptman.confirm', compact('handlings', 'customers', 'type_materials'));
    }

    public function showFollowUp(string $id): View
    {
        //get handlings by ID
        $handlings = Handling::findOrFail($id);

        $customers = Customer::all();
        $type_materials = TypeMaterial::all();

        $data = ScheduleVisit::where('handling_id', $id)->get();

        //render view with handlings
        return view('deptman.followup', compact('handlings', 'customers', 'type_materials', 'data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showHistoryProgres(string $id): View
    {
        // Mendapatkan data handling berdasarkan ID
        $handling = Handling::findOrFail($id);

        // Mengambil data customers dan type materials
        $customers = Customer::all();
        $type_materials = TypeMaterial::all();

        // Mengambil data schedule visit yang terkait dengan handling tersebut
        $data = ScheduleVisit::where('handling_id', $id)->get();

        // Mengembalikan view 'deptman.historyProgres' dengan data yang dibutuhkan
        return view('deptman.historyProgres', compact('handling', 'customers', 'type_materials', 'data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function updateConfirm(Request $request, $id): RedirectResponse
    {

        //get post by ID
        $handlings = Handling::findOrFail($id);

        // Update post
        $handlings->update([
            'status'            => 1
        ]);

        //redirect to index
        return redirect()->route('submission')->with(['success' => 'Data Berhasil Diubah!']);
    }

    //followup/tindak lanjut
    public function updateFollowUp(Request $request, $id): RedirectResponse 
    {

        // Lakukan sesuatu untuk aksi "Save"
        // Simpan file ke dalam sistem file dengan nama hash
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->hashName(); // Mendapatkan nama hash untuk file
            $path = $file->storeAs('public/handling', $filename); // Simpan file dengan nama hash di direktori 'files'
        } else {
            $filename = null; // Atur nama file menjadi null jika tidak ada file yang diunggah
        }

        if ($request->action == 'save') {
            
            // Lakukan sesuatu untuk aksi "Save"
            // Simpan data schedule_visit ke dalam tabel schedule_visit
                $scheduleVisit = new ScheduleVisit();
                $scheduleVisit->schedule = Carbon::parse($request->schedule)->format('Y-m-d'); // Mengatur format tanggal
                $scheduleVisit->results = $request->results;
                $scheduleVisit->due_date = Carbon::parse($request->due_date)->format('Y-m-d'); // Mengatur format tanggal
                $scheduleVisit->pic = $request->pic;
                $scheduleVisit->file = $filename;
                $scheduleVisit->status = '1';
                $scheduleVisit->handling_id = $request->handling_id; // Mengambil ID handling
                $scheduleVisit->save();

                return redirect()->route('submission')->with(['success' => 'Data Berhasil Diubah!']);
        } elseif ($request->action == 'finish') {

                $scheduleVisit = new ScheduleVisit();
                $scheduleVisit->schedule = Carbon::parse($request->schedule)->format('Y-m-d'); // Mengatur format tanggal
                $scheduleVisit->results = $request->results;
                $scheduleVisit->due_date = Carbon::parse($request->due_date)->format('Y-m-d'); // Mengatur format tanggal
                $scheduleVisit->pic = $request->pic;
                $scheduleVisit->file = $filename;
                $scheduleVisit->status = '1';
                $scheduleVisit->handling_id = $request->handling_id; // Mengambil ID handling
                $scheduleVisit->save();
                // Temukan entitas Handling berdasarkan ID
                $handlings = Handling::findOrFail($request->handling_id);

                // Update status Handling menjadi 3
                $handlings->update([
                    'status' => 2
                ]);

                // Simpan perubahan
                $handlings->save();

                return redirect()->route('submission')->with(['success' => 'Data Berhasil Diubah!']);
            }elseif ($request->action == 'claim'){

                $scheduleVisit = new ScheduleVisit();
                $scheduleVisit->schedule = Carbon::parse($request->schedule)->format('Y-m-d'); // Mengatur format tanggal
                $scheduleVisit->results = $request->results;
                $scheduleVisit->due_date = Carbon::parse($request->due_date)->format('Y-m-d'); // Mengatur format tanggal
                $scheduleVisit->pic = $request->pic;
                $scheduleVisit->file = $filename;
                $scheduleVisit->status = '1';
                $scheduleVisit->handling_id = $request->handling_id; // Mengambil ID handling
                $scheduleVisit->save();

                 // Temukan entitas Handling berdasarkan ID
                 $handlings = Handling::findOrFail($request->handling_id);

                 // Update status Handling menjadi 3
                 $handlings->update([
                    'type_2' => 'Claim',
                     'status' => 2
                 ]);
 
                 // Simpan perubahan
                 $handlings->save();

                return redirect()->route('submission')->with(['success' => 'Data Berhasil Diubah!']);
            }
        }
        
    
}
