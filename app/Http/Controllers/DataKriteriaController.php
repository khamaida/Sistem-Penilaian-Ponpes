<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use App\Models\DataKriteria;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataKriteriaController extends Controller
{
    public function index()
    {
        $data_kriteria = DataKriteria::all();
        return view('data_kriteria')->with('data_kriteria', $data_kriteria);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required',
        ]);

        $data_kriteria =  new DataKriteria;
        $data_kriteria->nama_kriteria = $request->input('nama_kriteria');
        $data_kriteria->save();

        return redirect('/data_kriteria')->with('success', 'Data Berhasil Disimpan!');
    }

    public function edit(Request $request)
    {
        $data = DataKriteria::findOrFail($request->get('id'));
        echo json_encode($data);
    }

    public function update(Request $request)
    {
        $data = array(
            'nama_kriteria' => $request->post('nama_kriteria')
        );
        $simpan = DB::table('data_kriteria')->where('id', '=', $request->post('id'))->update($data);
        if ($simpan) {
            $request->flash('status', 'Data berhasil diupdate.');
        } else {
            $request->flash('status', 'Data gagal diupdate.');
        }
        return redirect('data_kriteria');
    }
}
