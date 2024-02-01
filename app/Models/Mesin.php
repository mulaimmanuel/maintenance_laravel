<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Mesin extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_mesin',
        'no_mesin', 'merk', 'type',
        'mfg_date', 'acq_date', 'age', 'preventive_date',
        'foto', 'sparepart'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d | H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d | H:i:s');
    }
}
