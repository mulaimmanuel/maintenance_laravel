<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPreventive extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'id_mesin', 'issue', 'rencana_perbaikan'
    ];

    public function preventives()
    {
        return $this->belongsTo(Preventive::class)->select('issue', 'rencana_perbaikan'); // Contoh, hanya mengambil kolom id, name, dan description dari tabel Preventive
    }
}
