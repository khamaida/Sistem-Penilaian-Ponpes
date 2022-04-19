@extends('layouts.master')
@section('title')
    Penilaian Alternatif
@endsection
@section('content')
    <div class="main-content-inner">
        <!-- page title area start -->
        <br>
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area">
                    <h4 class="page-title pull-left">Penilaian Alternatif </h4>
                </div>
            </div>
        </div>
        <!-- page title area end -->
        <!-- Blockquotes area start -->
        <div class="mt-3 mb-3">
            @if (session()->has('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close fa fa-times" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('nilai_alternatif.update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-gp">
                                    <select name="alternatif1" class="form-control">
                                        @foreach ($alternatif as $a)
                                            <option value="{{ $a->id }}"
                                                {{ old('alternatif1') == $a->id ? 'selected' : null }}>
                                                {{ $a->nama_alternatif }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-gp">
                                    <select name="nilai" class="form-control @error('nilai') is-invalid @enderror">
                                        <option value="1"> 1 => Sama penting dengan</option>
                                        <option value="2">2 => Mendekati sedikit lebih penting dari</option>
                                        <option value="3">3 => Sedikit lebih penting dari</option>
                                        <option value="4">4 => Mendekati lebih penting dari</option>
                                        <option value="5">5 => Lebih penting dari</option>
                                        <option value="6">6 => Mendekati sangat penting dari</option>
                                        <option value="7">7 => Sangat penting dari</option>
                                        <option value="8">8 => Mendekati mutlak dari</option>
                                        <option value="9">9 => Mutlak sangat penting dari</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-gp">
                                    <select name="alternatif2" class="form-control">
                                        @foreach ($alternatif as $a)
                                            <option value="{{ $a->id }}"
                                                {{ old('alternatif') == $a->id ? 'selected' : null }}>
                                                {{ $a->nama_alternatif }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <h3> <button type="submit" class="btn btn-rounded btn-primary pull-center">
                                        Ubah Data</button></h3>
                            </div>
                        </div>
                    </form>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        {{-- <th width="50px">No.</th> --}}
                                        <th>Nama Alternatif</th>
                                        @php
                                            $alternatif = DB::table('data_alternatif')
                                                ->where('kriteria_id', '=', 1)
                                                ->get();
                                        @endphp
                                        @foreach ($alternatif as $item)
                                            <th>{{ $item->nama_alternatif }}</th>
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
                                                $alternatif = DB::table('data_alternatif')
                                                    ->where('id', $key)
                                                    ->select('nama_alternatif')
                                                    ->first();
                                            @endphp
                                            <td>{{ $alternatif->nama_alternatif }}</td>
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
        <!-- Blockquotes area end -->
    </div>
@endsection
