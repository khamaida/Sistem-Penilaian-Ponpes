@extends('layouts.master')
@section('title')
    Data kriteria
@endsection
@section('content')
    <div class="main-content-inner">
        <!-- page title area start -->
        <br>
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area">
                    <h4 class="page-title pull-left">Data Alternatif</h4>
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
                    <div class="mb-3 ">
                        <h3> <button type="button" class="btn btn-rounded btn-primary pull-right" data-toggle="modal"
                                data-target="#tambahDataAlternatif"> <i class="ti-plus"></i>
                                &nbsp; Tambah Data</button></h3>
                    </div>
                    <h4 class="pull left">Tabel Data Alternatif</h4>
                    <br />
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th width="50px">No.</th>
                                        <th>Nama Kriteria</th>
                                        <th>Nama Alternatif</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_alternatif as $data)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>{{ $data->nama_kriteria }}</td>
                                            <td>{{ $data->nama_alternatif }}</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a class="text-secondary"
                                                            data-id="{{ $data->id }}" data-toggle="modal"
                                                            data-target="#updateDataAlternatif"><i
                                                                class="fa fa-edit"></i></a></li>
                                                    <li><a data-id="{{ $data->id }}" class=" text-danger"><i
                                                                class="ti-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- modal tambah alternatif --}}
                    <div class="modal fade" id="tambahDataAlternatif">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Data Alternatif</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form action="{{ route('simpan_alternatif') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <select name="kriteria_id"
                                                class="form-control @error('kriteria_id') is-invalid @enderror">
                                                @foreach ($data_kriteria as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ old('kriteria_id') == $data->id ? 'selected' : null }}>
                                                        {{ $data->nama_kriteria }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <label>Nama Alternatif</label>
                                            <input type="text"
                                                class="form-control @error('nama_alternatif') is-invalid @enderror"
                                                id="nama_alternatif" name="nama_alternatif"
                                                value="{{ old('nama_alternatif') }}" autocomplete="nama_alternatif"
                                                autofocus required>
                                            <div class="text-danger">
                                                @error('nama_alternatif')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button button id="form_submit" type="submit"
                                            class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- modal update alternatif --}}
                    <div class="modal fade" id="updateDataAlternatif">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Alternatif</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form action="{{ route('simpan_alternatif') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <select name="kriteria_id"
                                                class="form-control @error('kriteria_id') is-invalid @enderror">
                                                @foreach ($data_kriteria as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ old('kriteria_id') == $data->id ? 'selected' : null }}>
                                                        {{ $data->nama_kriteria }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <label>Nama Alternatif</label>
                                            <input type="text"
                                                class="form-control @error('nama_alternatif') is-invalid @enderror"
                                                id="nama_alternatif" name="nama_alternatif"
                                                value="{{ old('nama_alternatif') }}" autocomplete="nama_alternatif"
                                                autofocus required>
                                            <div class="text-danger">
                                                @error('nama_alternatif')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button button id="form_submit" type="submit"
                                            class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blockquotes area end -->
    </div>
@endsection
