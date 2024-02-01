<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class FormFPP extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'pemohon', 'date',
        'section', 'mesin', 'lokasi',
        'kendala', 'gambar', 'status',
        'tindak_lanjut', 'due_date', 'schedule_pengecekan',
        'attachment_file', 'note'
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
                return 'blue';
            case 'closed':
            case 'Closed':
                return 'black';
            default:
                return 'lightgray';
        }
    }

    public function getNoteBackgroundColorAttribute()
    {
        $status = strtolower($this->attributes['note']);

        switch ($status) {
            case 'form fpp dibuat':
            case 'FORM FPP DIBUAT':
                return 'green';
            case 'draft tindak lanjut':
            case 'DRAFT TINDAK LANJUT':
                return 'orange'; // Mengganti warna menjadi 'darkyellow'
            case 'tindak lanjut submitted':
            case 'TINDAK LANJUT SUBMITTED':
                return 'blue';
            case 'tindak lanjut berhasil dikonfirmasi':
            case 'TINDAK LANJUT BERHASIL DIKONFIRMASI':
                return 'grey';
            case 'form fpp closed':
            case 'Form FPP CLOSED':
                return 'black';
            case '':
                return 'transparent'; //
            default:
                return 'red';
        }
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $latestId = static::latest('id')->value('id');

    //         if (!$latestId) {
    //             $model->id = 'FPP0001';
    //         } else {
    //             $prefix = 'FPP';
    //             $length = 4;
    //             $latestIdNumber = (int)substr($latestId, strlen($prefix));
    //             $newIdNumber = $latestIdNumber + 1;
    //             $newId = $prefix . str_pad($newIdNumber, $length, '0', STR_PAD_LEFT);
    //             $model->id = $newId;
    //         }
    //     });
    // }
}
