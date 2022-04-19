<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use Illuminate\Http\Request;

class DataAlternatifController extends Controller
{
    public function index()
    {
        $data_kriteria = DataKriteria::get();
        // $data_alternatif = DataAlternatif::get();
        $data_alternatif = DataAlternatif::join('data_kriteria', 'data_alternatif.kriteria_id', '=', 'data_kriteria.id')->get();
        // $data = [
        //     'data_kriteria' => $data_kriteria,
        //     'data_alternatif' => $data_alternatif
        // ];
        // dd($data_alternatif);
        return view('data_alternatif', compact('data_kriteria', 'data_alternatif'))->with('i');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'kriteria_id' => 'required',
            'nama_alternatif' => 'required',
        ]);

        $data_alternatif =  new DataAlternatif;
        $data_alternatif->kriteria_id = $request->input('kriteria_id');
        $data_alternatif->nama_alternatif = $request->input('nama_alternatif');
        $data_alternatif->save();

        return redirect('/data_alternatif')->with('success', 'Data Berhasil Disimpan!');
    }
}
