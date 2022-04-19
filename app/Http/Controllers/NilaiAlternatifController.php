<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use App\Models\NilaiAlternatif;
use Illuminate\Http\Request;

class NilaiAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_1()
    {
        $alternatif = DataAlternatif::where('kriteria_id', '=', 1)->get();
        $data = [];
        $nilai_alternatif = NilaiAlternatif::where('kriteria_id', '=', 1)->get();
        foreach ($nilai_alternatif as $key => $value) {
            $data[$value->alternatif1_id][$value->alternatif2_id] = $value->nilai;
        }
        //dd(csrf_token());
        return view('penilaian_alternatif_1', compact('data', 'alternatif'));
    }

    public function index_2()
    {
        $alternatif = DataAlternatif::where('kriteria_id', '=', 2)->get();
        $data = [];
        $nilai_alternatif = NilaiAlternatif::where('kriteria_id', '=', 2)->get();
        foreach ($nilai_alternatif as $key => $value) {
            $data[$value->alternatif1_id][$value->alternatif2_id] = $value->nilai;
        }
        // dd($nilai_alternatif);
        return view('penilaian_alternatif_2', compact('data', 'alternatif'));
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
        //
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
            'alternatif1',
            'alternatif2',
            'nilai',
        ]);
        $data_alternatif1 = NilaiAlternatif::where('alternatif1_id', $data['alternatif1'])->where('alternatif2_id', $data['alternatif2'])->first();
        $data_alternatif1->update([
            'nilai' => $data['nilai'],
        ]);
        $data_alternatif2 = NilaiAlternatif::where('alternatif1_id', $data['alternatif2'])->where('alternatif2_id', $data['alternatif1'])->first();
        $data_alternatif2->update([
            'nilai' => 1 / $data['nilai'],
        ]);
        //dd($data);
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
