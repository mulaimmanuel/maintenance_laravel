<?php

namespace App\Imports;

use App\Models\Preventive;
use Maatwebsite\Excel\Concerns\ToModel;

class PreventivesImport implements ToModel
{
    public function model(array $row)
    {
        return new Preventive([
            'nama_mesin' => $row[0],
            'type' => $row[1],
            'no_mesin' => $row[2],
            'mulai_ops' => $row[3],
            'issue' => $row[4],
            'rencana_perbaikan' => $row[5],
            'status' => 'Open',
        ]);
    }
}
