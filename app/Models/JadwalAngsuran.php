<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAngsuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kontrak_no',
        'angsuran_ke',
        'angsuran_per_bulan',
        'tanggal_jatuh_tempo'
    ];

    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class, 'kontrak_no', 'kontrak_no');
    }
}
