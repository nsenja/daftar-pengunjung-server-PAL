@extends('users.master')
@section('content')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }

        #sign canvas {
            width: 100% !important;
            height: auto;
        }
    </style>




    <div class="content-body">
        <div class="container-fluid">

            <div class="col-xl-8 col-xxl-8 mx-auto">
                <div class="row page-titles ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">PENGUNJUNG SERVER PT PAL
                                INDONESIA</a>
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
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success  alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <form method="POST" action="{{ route('signaturepad.upload') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">                                        
                                        {{--  <div class="col-xl-6 mb-3">
                                            <label class="date-format">Tanggal & Waktu Masuk</label>  --}}
                                            <input id="waktu_masuk" type="datetime" class="form-control" name="waktu_masuk" value="{{ date('d-m-y', strtotime(Carbon\Carbon::today()->toDateString())) }}"
                                              hidden>
                                        {{--  </div>          --}}
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
                                                    <input id="Ya" type="checkbox" name="alat_pendukung"
                                                        class="form-check-input" value="Ya">Ya
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input id="Tidak" type="checkbox" name="alat_pendukung"
                                                        class="form-check-input" value="Tidak">Tidak
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
                                        {{--  <div class="col-xl-6 mb-3">
                                            <label class="" for="">Tanda Tangan</label>
                                            <br />
                                            <div id="sig"></div>
                                            <br><br>
                                            <button id="clear" class="btn btn-danger">Clear Signature</button>
                                            <button class="btn btn-success">Save</button>
                                            <textarea id="tandatangan_pendamping" name="tandatangan_pendamping" style="display: none" required></textarea>
                                        </div>  --}}

                                        <div class="col-xl-6 mb-3">
                                            <label class="" for="">Tanda Tangan Pengunjung</label>
                                            <br />
                                            <div id="sig"></div>
                                            <br><br>
                                            <button id="clear" class="btn btn-danger">Clear Signature</button>
                                            {{--  <button class="btn btn-success">Save</button>  --}}
                                            <textarea id="tandatangan_pengunjung" name="tandatangan_pengunjung" style="display: none" required></textarea>
                                        </div>

                                        <div class="col-xl-6 mb-3">
                                            <label class="" for="">Tanda Tangan Pendamping</label>
                                            <br />
                                            <div id="sign"></div>
                                            <br><br>
                                            <button id="clears" class="btn btn-danger">Clear Signature</button>
                                            {{--  <button class="btn btn-success">Save</button>  --}}
                                            <textarea id="tandatangan_pendamping" name="tandatangan_pendamping" style="display: none" required></textarea>
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

    <script language="javascript">
        function selectOnlyThis(id) {
            for (var i = 1; i <= 2; i++) {
                document.getElementById("Check" + i).checked = false;
            }
            document.getElementById(id).checked = true;
        }
    </script>
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#tandatangan_pengunjung',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#tandatangan_pengunjung").val('');
        });
    </script>
    <script type="text/javascript">
        var sign = $('#sign').signature({
            syncField: '#tandatangan_pendamping',
            syncFormat: 'PNG'
        });
        $('#clears').click(function(e) {
            e.preventDefault();
            sign.signature('clear');
            $("#tandatangan_pendamping").val('');
        });
    </script>
    </script>
    <!--**********************************
                    Content body end
        ***********************************-->
@endsection
