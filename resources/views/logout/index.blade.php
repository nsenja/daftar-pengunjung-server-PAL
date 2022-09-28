@extends('logout.master')
@section('content')
    <!--**********************************  Content body start ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pengunjung</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Instansi</th>
                                            <th>No HP</th>
                                            <th>Keperluan</th>
                                            <th>Alat Pendukung</th>
                                            <th>Nama Alat</th>
                                            <th>Pendamping</th>
                                            <th>Waktu Masuk</th>
                                            <th>Waktu Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visitor_lists as $u)
                                            <tr>


                                                @if ($u->waktu_keluar == null)
                                                    <td>
                                                        <form action="{{ route('logout.update', $u->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            {{-- @method('PUT') --}}
                                                            <button type="submit"
                                                                class="btn btn-primary mb-2">Keluar</button>
                                                    </td>
                                                    <td>{{ $u->nama_lengkap }}</td>
                                                    <td>{{ $u->nik }}</td>
                                                    <td>{{ $u->instansi }}</td>
                                                    <td>{{ $u->no_hp }}</td>
                                                    <td>{{ $u->keperluan }}</td>
                                                    <td>{{ $u->alat_pendukung }}</td>
                                                    <td>{{ $u->nama_alat }}</td>
                                                    <td>{{ $u->pendamping }}</td>
                                                    <td>{{ $u->waktu_masuk }}</td>
                                                @endif

                                            </tr>

                                            <div class="modal fade bd-example-modal-lg"
                                                id="bd-example-modal-lg{{ $u->id }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Pengunjung</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Nama</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control"
                                                                    placeholder="{{ $u->nama_lengkap }}" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">NIK</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control" placeholder="{{ $u->nik }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Instansi</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control" placeholder="{{ $u->instansi }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">No Telp</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control" placeholder="{{ $u->no_hp }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Keperluan</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control" placeholder="{{ $u->keperluan }}"
                                                                    disabled>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Alat Pendukung
                                                                    (Ya/Tidak)
                                                                </label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control"
                                                                    placeholder="{{ $u->alat_pendukung }}" disabled>

                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Alat Pendukung Yang
                                                                    Dibutuhkan</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control" placeholder="{{ $u->nama_alat }}"
                                                                    disabled>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="disabledTextInput"> Pendamping</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control" placeholder="{{ $u->pendamping }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Waktu Masuk</label>
                                                                <input type="date-format" id="disabledTextInput"
                                                                    class="form-control"
                                                                    placeholder="{{ $u->waktu_masuk }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
