@extends('users.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="col-xl-8 col-xxl-8 mx-auto">
                <div class="row page-titles ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">PENGUNJUNG SERVER PT PAL INDONESIA</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-8 col-xxl-8 pb-5 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pengunjung Server</h4>
                        </div>
                        <?php
                        $alat_pendukung = 0;
                        ?>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">Nama Pengunjung</label>
                                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">NIK</label>
                                            <input type="text" class="form-control" name="nik" id="nik"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">Instansi</label>
                                            <input type="text" class="form-control" name="instansi" id="instansi"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">No Telp.</label>
                                            <input type="text" class="form-control" name="no_hp" id="no_hp"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">Keperluan</label>
                                            <input type="text" class="form-control" name="keperluan" id="keperluan"
                                                required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-label">Alat Pendukung</label><br>                                        
                                            <div class="form-check form-check-inline mt-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value=""
                                                        checked>Ya
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Tidak
                                                </label>
                                            </div>                                           
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">Nama Alat</label>
                                            <input type="text" class="form-control" name="nama_alat" id="nama_alat"
                                                required>
                                        </div>


                                        <div class="col-xl-6 mb-3">
                                            <label class="text-label">Pendamping</label>
                                            <input type="text-label" class="form-control" name="pendamping" id="pendamping"
                                                required>
                                        </div>

                                        <div class="col-xl-6 mb-3">
                                            <label class="date-format">Tanggal & Jam Masuk</label>
                                            <input type="date" class="form-control" name="waktu_masuk" id="waktu_masuk"
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
