<?php

namespace App\Http\Controllers;

use App\Exports\PreventivesExport;

use App\Imports\PreventivesImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Preventive;

use Illuminate\Http\Request;

class ExcelCSVController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExcelCSV(Request $request)
    {
        $validatedData = $request->validate([

            'file' => 'required',

        ]);

        Excel::import(new PreventivesImport, $request->file('file'));


        return redirect('deptmtce.dashpreventive')->with('status', 'File telah diupload ke dalam Database');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportExcelCSV($slug)
    {
        return Excel::download(new PreventivesExport, 'preventives.' . $slug);
    }
}
