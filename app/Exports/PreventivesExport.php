<?php

namespace App\Exports;

use App\Models\Preventive;
use Maatwebsite\Excel\Concerns\FromCollection;

class PreventivesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Preventive::all();
    }
}
