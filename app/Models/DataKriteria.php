<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;
    protected $table = "data_kriteria";
    protected $fillable = [
        'nama_kriteria',
    ];

    protected function data_alternatif()
    {
        return $this->hashMany(DataAlternatif::class);
    }
}
