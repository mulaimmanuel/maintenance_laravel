<?php

namespace App\Http\Controllers;

use App\Models\Preventive;
use Illuminate\Http\Request;

class PreventiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function maintenanceDashPreventive()
    {
        $preventives = Preventive::latest()->paginate(5);
        return view('maintenance.dashpreventive', compact('preventives'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function deptmtceDashPreventive()
    {
        $preventives = Preventive::latest()->paginate(5);
        return view('deptmtce.dashpreventive', compact('preventives'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
    }

    public function EditMTCEPreventive(Preventive $preventive)
    {
        $status = $preventive->status;
        // Determine view based on status
        if ($preventive->status === 'Open') {
            $viewName = 'maintenance.editpreventive';
        } else if ($preventive->status === 'Finish') {
            $viewName = 'maintenance.lihatpreventive';
        } else {
            return view('maintenance.index');
        }

        return view($viewName, compact('preventive'));
    }

    public function EditDeptMTCEPreventive(Preventive $preventive)
    {
        $status = $preventive->status;
        // Determine view based on status
        if ($preventive->status === 'Finish') {
            $viewName = 'deptmtce.editpreventive';
        } else if ($preventive->status === 'Open') {
            $viewName = 'deptmtce.lihatpreventive';
        } else {
            return view('deptmtce.index');
        }

        return view($viewName, compact('preventive'));
    }

    public function update(Request $request, Preventive $preventive)
    {
        // Update the form data
        $preventive->update($request->all());
        $confirmedFinish = $request->input('confirmed_finish');
        $confirmedFinish2 = $request->input('confirmed_finish2');
        // Check if 'confirmed_finish' is submitted
        if ($confirmedFinish === "1") {
            // Update the status to 'Closed'
            $preventive->update(['status' => 'Finish']);
            return redirect()->route('maintenance.dashpreventive')->with('success', 'Form FPP updated successfully');
        } else if ($confirmedFinish2 === "1") {
            // Update the status to 'Closed'
            $preventive->update(['status' => 'Finish']);
            return redirect()->route('deptmtce.dashpreventive')->with('success', 'Form FPP updated successfully');
        }
    }

    public function destroy(Preventive $preventive)
    {
    }
}
