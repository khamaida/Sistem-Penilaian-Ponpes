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
                    <h4 class="page-title pull-left">Data Kriteria</h4>
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
                                data-target="#tambahDataKriteria"> <i class="ti-plus"></i>
                                &nbsp; Tambah Data</button></h3>
                    </div>
                    <h4 class="pull left">Tabel Data Kriteria</h4>
                    <br />
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th width="50px">No.</th>
                                        <th>Nama Kriteria</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 0; ?>
                                    @foreach ($data_kriteria as $data)
                                        <?php $nomor++; ?>
                                        <tr>
                                            <th scope="row"><?php echo $nomor; ?></th>
                                            <td>{{ $data->nama_kriteria }}</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a class="text-secondary"
                                                            data-id="{{ $data->id }}" data-toggle="modal"
                                                            data-target="#updateDataKriteria"><i
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

                    {{-- modal tambah kriteria --}}
                    <div class="modal fade" id="tambahDataKriteria">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Data Kriteria</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form action="{{ route('data_kriteria.create') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <input type="text"
                                                class="form-control @error('nama_kriteria') is-invalid @enderror"
                                                id="nama_kriteria" name="nama_kriteria" value="{{ old('nama_kriteria') }}"
                                                autocomplete="nama_kriteria" autofocus required>
                                            <div class="text-danger">
                                                @error('nama_kriteria')
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

                    {{-- modal update kriteria --}}
                    <div class="modal fade" id="updateDataKriteria">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Kriteria</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <input type="text" class="form-control" id="nama_kriteria"
                                                name="nama_kriteria">
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
    {{-- <script src="{{ asset('public/assets/js/jquery-3.1.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            //edit data
            $('.edit').on("click", function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ route('data_kriteria.edit') }}?id=" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#nama_kriteria').val(data.nama_kriteria);
                        $('#updateDataKriteria').modal('show');
                    }
                });
            });

        });
    </script> --}}
@endsection
