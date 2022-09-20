@extends('admin.master')
@section('content')
    <div class="event-sidebar dz-scroll active" id="eventSidebar">
        <div class="card shadow-none rounded-0 bg-transparent h-auto mb-0">
            <div class="card-body text-center event-calender pb-2">
                <input type='text' class="form-control d-none" id='datetimepicker1' />
            </div>

            {{-- <div class="card-body text-center event-calender pb-2">
                <p class="mb-1">Date Range Pick</p>
                <input class="form-control input-daterange-datepicker" type="text" name="daterange"
                    value="01/01/2015 - 01/31/2015">
            </div> --}}
        </div>

        <div class="card shadow-none rounded-0 bg-transparent h-auto">
            <div class="card-header border-0 pb-0">
                <h4 class="text-black">Pengunjung Terkini</h4>
            </div>
            @foreach ($data as $g)
                <div class="card-body">
                    <div class="media mb-5 align-items-center event-list">
                        <div class="p-3 text-center rounded me-3 date-bx bgl-primary">
                            <h2 class="flaticon-381-user-7"></h2>
                        </div>
                        <div class="media-body px-0">
                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black">{{ $g->nama_lengkap }}</a></h6>
                            <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                <li>{{ $g->created_at }}</li>
                                {{-- <li>561/650</li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <!--**********************************  EventList END ***********************************-->
    <!--**********************************  Content body start ***********************************-->
    <div class="content-body rightside-event">
        <!-- row -->
        <div class="container-fluid">
            <!--Total Visitor-->
            <div class="row">
                <div class="col-xl-4 col-sm-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="me-4">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Pengunjung Hari Ini</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $current_date->count() }} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="me-4">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Pengunjung Minggu Ini</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $current_week->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-4">
                    <div class="widget-stat card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="me-4">
                                    <i class="flaticon-381-user-7"></i>
                                </span>
                                <div class="media-body ms-1">
                                    <p class="mb-2">Pengunjung Bulan Ini</p>
                                    <h3 class="mb-0 text-black font-w600">{{ $current_month->count() }} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Total Visitor-->

                <!--Chart-->
                {{-- <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Chart Bulan ini</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="lineChart_2"></canvas>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="barChart_1"></canvas>
                        </div>
                    </div>
                </div>
                <!--End Chart-->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pengunjung Server</h4>
                        </div>
                        <div class="col-xl-6 col-lg-12">
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        {{-- <div class="col-span-2 flex-justify-end" style="text-align: right">
                                    </div> --}}
                                        <form method="POST" action="/cetak" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <label class="form-label">Start Date</label>
                                                    <input type="date" class="form-control" name="start_date"
                                                        id="start_date">

                                                </div>
                                                <div class="col-auto">
                                                    <label class="form-label">End Date</label>
                                                    <input type="date" class="form-control" name="end_date"
                                                        id="end_date">
                                                </div>
                                                <div class="col-10">
                                                    <input type="submit" value="Cetak" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Instansi</th>
                                            <th>No HP</th>
                                            <th>Keperluan</th>
                                            <th>Alat Pendukung</th>
                                            <th>Nama Alat</th>
                                            <th>Pendamping</th>
                                            <th>Waktu Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visitor_lists as $u)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $u->nama_lengkap }}</td>
                                                <td>{{ $u->nik }}</td>
                                                <td>{{ $u->instansi }}</td>
                                                <td>{{ $u->no_hp }}</td>
                                                <td>{{ $u->keperluan }}</td>
                                                <td>{{ $u->alat_pendukung }}</td>
                                                <td>{{ $u->nama_alat }}</td>
                                                <td>{{ $u->pendamping }}</td>
                                                <td>{{ $u->waktu_masuk }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary mb-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#bd-example-modal-lg{{ $u->id }}">Details</button>
                                                </td>
                                            </tr>

                                            <div class="modal fade bd-example-modal-lg"
                                                id="bd-example-modal-lg{{ $u->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
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
                                                                    class="form-control"
                                                                    placeholder="{{ $u->nik }}" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Instansi</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control"
                                                                    placeholder="{{ $u->instansi }}" disabled>
                                                            </div>
                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput">No Telp</label>
                                                                    <input type="text" id="disabledTextInput"
                                                                        class="form-control"
                                                                        placeholder="{{ $u->no_hp }}" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput">Keperluan</label>
                                                                    <input type="text" id="disabledTextInput"
                                                                        class="form-control"
                                                                        placeholder="{{ $u->keperluan }}" disabled>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput">Alat Pendukung (Ya/Tidak)</label>
                                                                    <input type="text" id="disabledTextInput"
                                                                        class="form-control" placeholder="{{ $u->alat_pendukung }}" disabled>

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput">Alat Pendukung Yang Dibutuhkan</label>
                                                                    <input type="text" id="disabledTextInput"
                                                                        class="form-control"
                                                                        placeholder="{{ $u->nama_alat }}" disabled>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput"> Pendamping</label>
                                                                    <input type="text" id="disabledTextInput"
                                                                        class="form-control"
                                                                        placeholder="{{ $u->pendamping }}" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput"Waktu Masuk</label>
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
@endsection
