<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;



class NilaiKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = DataKriteria::get();
        // foreach ($kriteria as $key => $value) {
        //     $nilai_kriteria = NilaiKriteria::where('kriteria1_id', $kriteria[$key]->id)->get();
        //     $data[$value->nama_kriteria] = [
        //         $kriteria[0]->nama_kriteria  => $nilai_kriteria[$key]->nilai,
        //         $kriteria[1]->nama_kriteria  => $nilai_kriteria[$key]->nilai,
        //         $kriteria[2]->nama_kriteria  => $nilai_kriteria[$key]->nilai,
        //         $kriteria[3]->nama_kriteria  => $nilai_kriteria[$key]->nilai,
        //         $kriteria[4]->nama_kriteria  => $nilai_kriteria[$key]->nilai,
        //     ];
        // }
        $data = [];
        $nilai_kriteria = NilaiKriteria::get();
        foreach ($nilai_kriteria as $key => $value) {
            $data[$value->kriteria1_id][$value->kriteria2_id] = $value->nilai;
        }
        //dd(csrf_token());
        return view('penilaian_kriteria', compact('data', 'kriteria'));
    }


    public function total_kolom()
    {
        $data = [];
        $nilai_kriteria = NilaiKriteria::get();
        foreach ($nilai_kriteria as $key => $value) {
            $data[$value->kriteria1_id][$value->kriteria2_id] = $value->nilai;
        }

        $arr = array();
        foreach ($data as $key => $val) {
            foreach ($val as $k => $v) {
                if (!isset($arr[$k]))
                    $arr[$k] = 0;
                $arr[$k] += $v;
            }
        }

        $matrik = $data;
        foreach ($matrik as $key => $value) {
            foreach ($value as $k => $v) {
                $matrik[$key][$k] = $matrik[$key][$k] / $arr[$k];
            }
        }

        $rata = array();
        foreach ($matrik as $key => $value) {
            $rata[$key] = array_sum($value) / count($value);
        }

        $matriks = [$arr, $rata];
        $max = array();
        foreach ($matriks as $key => $value) {
            foreach ($value as $k => $v) {
                $max[$k] = $arr[$k] * $rata[$k];
            }
        }
        $maximum = array_sum($max);

        $CI = ($maximum - $k) / ($k - 1);

        $nRI = array(
            1 => 0,
            2 => 0,
            3 => 0.58,
            4 => 0.9,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.46,
            10 => 1.49,
            11 => 1.51,
            12 => 1.48,
            13 => 1.56,
            14 => 1.57,
            15 => 1.59
        );

        $RI = $nRI[$k];

        $CR = $CI / $RI;

        // dd($CR);

        return view('perhitungan_kriteria', compact('data', 'arr', 'matrik', 'rata', 'maximum', 'CI', 'nRI', 'CR'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->only([
            'kriteria1',
            'kriteria2',
            'nilai',
        ]);
        $data_kriteria1 = NilaiKriteria::where('kriteria1_id', $data['kriteria1'])->where('kriteria2_id', $data['kriteria2'])->first();
        $data_kriteria1->update([
            'nilai' => $data['nilai'],
        ]);
        $data_kriteria2 = NilaiKriteria::where('kriteria1_id', $data['kriteria2'])->where('kriteria2_id', $data['kriteria1'])->first();
        $data_kriteria2->update([
            'nilai' => 1 / $data['nilai'],
        ]);
        // dd($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
