<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;

    protected $primaryKey = 'kontrak_no';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kontrak_no',
        'client_name',
        'otr',
        'dp',
        'tenor',
        'bunga'
    ];

    public function jadwalAngsuran()
    {
        return $this->hasMany(JadwalAngsuran::class, 'kontrak_no', 'kontrak_no');
    }
}
