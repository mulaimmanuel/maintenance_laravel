<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Preventive extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'nama_mesin',
        'section', 'lokasi', 'due_date', 'status'
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

    public function getStatusBackgroundColorAttribute()
    {
        $status = strtolower($this->attributes['status']);

        switch ($status) {
            case 'open':
            case 'Open':
                return 'green';
            case 'on progress':
            case 'On Progress':
                return 'orange'; // Mengganti warna menjadi 'darkyellow'
            case 'finish':
            case 'Finish':
                return 'darkblue';
            case 'closed':
            case 'Closed':
                return 'black';
            default:
                return 'lightgray';
        }
    }
}
