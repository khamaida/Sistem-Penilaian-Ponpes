<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatif extends Model
{
    use HasFactory;
    protected $table = "data_alternatif";
    protected $fillable = [
        'kriteria_id',
        'nama_alternatif',
    ];

    public function data_kriteria()
    {
        return $this->belongsTo(DataKriteria::class);
    }
}
