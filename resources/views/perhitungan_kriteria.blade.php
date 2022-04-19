@extends('layouts.master')
@section('title')
    Penilaian Kriteria
@endsection
@section('content')
    <div class="main-content-inner">
        <!-- page title area start -->
        <br>
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area">
                    <h4 class="page-title pull-left">Penilaian Kriteria </h4>
                </div>
            </div>
        </div>
        <!-- page title area end -->
        <!-- Blockquotes area start -->
        <div class="mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="pull left">Tabel Matriks Perbandingan Berpasangan</h4>
                    <br>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        {{-- <th width="50px">No.</th> --}}
                                        <th>Nama Kriteria</th>
                                        @php
                                            $kriteria = DB::table('data_kriteria')->get();
                                        @endphp
                                        @foreach ($kriteria as $item)
                                            <th>{{ $item->nama_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $a = 1;
                                    @endphp
                                    @foreach ($data as $key => $items)
                                        <tr>
                                            {{-- <td>{{ $key }}</td> --}}
                                            @php
                                                $kriteria = DB::table('data_kriteria')
                                                    ->where('id', $key)
                                                    ->select('nama_kriteria')
                                                    ->first();
                                            @endphp
                                            <td>{{ $kriteria->nama_kriteria }}</td>
                                            @php
                                                $b = 1;
                                                foreach ($items as $k => $v) {
                                                    if ($key == $k) {
                                                        $class = 'success';
                                                    } elseif ($b > $a) {
                                                        $class = 'danger';
                                                    } else {
                                                        $class = '';
                                                    }

                                                    echo "<td class='$class'>" . round($v, 3) . '</td>';
                                                    $b++;
                                                }
                                                // $no++;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>Total</td>
                                        @foreach ($arr as $item)
                                            <td>{{ $item }}</td>
                                        @endforeach
                                    </tr>
                                    @php
                                        $a++;
                                    @endphp
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="pull left">Tabel Normalisasi Matriks Perbandingan Berpasangan</h4>
                    <br>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        {{-- <th width="50px">No.</th> --}}
                                        <th>Nama Kriteria</th>
                                        @php
                                            $kriteria = DB::table('data_kriteria')->get();
                                        @endphp
                                        @foreach ($kriteria as $item)
                                            <th>{{ $item->nama_kriteria }}</th>
                                        @endforeach
                                        <th>Bobot Prioritas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $a = 1;
                                    @endphp
                                    @foreach ($matrik as $key => $items)
                                        <tr>
                                            {{-- <td>{{ $key }}</td> --}}
                                            @php
                                                $kriteria = DB::table('data_kriteria')
                                                    ->where('id', $key)
                                                    ->select('nama_kriteria')
                                                    ->first();
                                            @endphp
                                            <td>{{ $kriteria->nama_kriteria }}</td>
                                            @foreach ($items as $key => $item)
                                                <td>{{ $item }}</td>
                                            @endforeach
                                            <td>{{ $rata[$key] }}</td>
                                        </tr>
                                    @endforeach
                                    @php
                                        $a++;
                                    @endphp
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="pull left">Uji Konsistensi</h4>
                    <br>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th width="300px"> Principe Eigen Vector (λ maks)</th>
                                        <th> {{ $maximum }}</th>
                                        <th width="300px"> Consistency Index</th>
                                        <th> {{ $CI }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blockquotes area end -->
    </div>
@endsection
