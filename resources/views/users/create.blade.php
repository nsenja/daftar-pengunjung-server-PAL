@extends('users.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="col-xl-8 col-xxl-8 mx-auto">
                <div class="row page-titles ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">BUKU TAMU PT PAL INDONESIA</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-8 col-xxl-8 pb-5 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Tamu</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">Nama Tamu</label>
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">No. Telpon</label>
                                            <input type="text" class="form-control" name="telp" id="telp"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">Tujuan</label>
                                            <input type="text" class="form-control" name="tujuan" id="tujuan"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-label">Kategori</label>
                                            <select class="default-select  form-control wide" name="kategori_id"
                                                id="kategori_id" placeholder="Masukkan Kategori">
                                                <option value="" disabled hidden selected>Masukkan Kategori</option>
                                                @foreach ($categories as $g)
                                                    <option value="{{ $g->id }}">{{ $g->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">Nama Instansi, Universitas, dsb</label>
                                            <input type="text" class="form-control" name="instansi" id="instansi"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-area">Keterangan</label>
                                            <input type="text-area" class="form-control" name="keterangan" id="keterangan"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn light btn-primary">Submit</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
                                 Content body end
                                ***********************************-->
@endsection
