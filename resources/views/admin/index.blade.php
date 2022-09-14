<!DOCTYPE html>
<html lang="en">
<link href="{{ asset('/assets/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"
    type="text/css" />

<link href="{{ asset('/assets/vendor/pickadate/themes/default.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('/assets/vendor/pickadate/themes/default.date.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('/assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
    rel="stylesheet" type="text/css" />

@extends('users.master')
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
                <h4 class="text-black">Tamu Terkini</h4>
            </div>
            @foreach ($data as $g)
                <div class="card-body">
                    <div class="media mb-5 align-items-center event-list">
                        <div class="p-3 text-center rounded me-3 date-bx bgl-primary">
                            <h2 class="flaticon-381-user-7"></h2>
                        </div>
                        <div class="media-body px-0">
                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black">{{ $g->nama }}</a></h6>
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
                                    <p class="mb-2">Tamu Hari Ini</p>
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
                                    <p class="mb-2">Tamu Minggu Ini</p>
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
                                    <p class="mb-2">Tamu Bulan Ini</p>
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
                            <h4 class="card-title">Daftar Tamu</h4>
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
                                            <th>No.Telepon</th>
                                            <th>Tujuan</th>
                                            <th>Kategori</th>
                                            <th>Nama Instansi</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guests as $u)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $u->nama }}</td>
                                                <td>{{ $u->telp }}</td>
                                                <td>{{ $u->tujuan }}</td>
                                                @foreach ($category as $cat)
                                                    @if ($cat->id == $u->kategori_id)
                                                        <td>{{ $cat->nama_kategori }}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $u->instansi }}</td>
                                                <td>{{ $u->keterangan }}</td>
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
                                                            <h5 class="modal-title">Detail Tamu</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Nama</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control"
                                                                    placeholder="{{ $u->nama }}" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">No Telp.</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control"
                                                                    placeholder="{{ $u->telp }}" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Tujuan</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control"
                                                                    placeholder="{{ $u->tujuan }}" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput">Kategori</label>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control"
                                                                    @foreach ($category as $cat) @if ($cat->id == $u->kategori_id)
                                                                        placeholder="{{ $cat->nama_kategori }}" disabled>
                                                                        @endif @endforeach
                                                                    </div>
                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput">Nama
                                                                        Instansi</label>
                                                                    <input type="text" id="disabledTextInput"
                                                                        class="form-control"
                                                                        placeholder="{{ $u->instansi }}" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="disabledTextInput">Keterangan</label>
                                                                    <input type="text" id="disabledTextInput"
                                                                        class="form-control"
                                                                        placeholder="{{ $u->keterangan }}" disabled>
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
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('/assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('assets/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/bs-daterange-picker-init.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/clock-picker-init.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/material-date-picker-init.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/pickadate-init.js') }}"></script>


    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>

    <script type="text/javascript">
        (function($) {

            var labels = {{ Js::from($labels) }};
            var guests = {{ Js::from($datacharts) }};

            var dzSparkLine = function() {
                let draw = Chart.controllers.line.__super__.draw; //draw shadow
                var screenWidth = $(window).width();
                var barChart1 = function() {
                    if (jQuery('#barChart_1').length > 0) {
                        const barChart_1 = document.getElementById("barChart_1").getContext('2d');

                        barChart_1.height = 100;

                        new Chart(barChart_1, {
                            type: 'bar',
                            data: {
                                defaultFontFamily: 'Poppins',
                                labels: @json($labels),
                                datasets: [{
                                    label: "My First dataset",
                                    data: @json($datacharts),
                                    borderColor: 'rgba(34, 47, 185, 1)',
                                    borderWidth: "0",
                                    backgroundColor: 'rgba(34, 47, 185, 1)'
                                }]
                            },
                            options: {
                                legend: false,
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            stepSize: 5,
                                            max: 50,
                                            min: 0
                                        }
                                    }],
                                    xAxes: [{
                                        // Change here
                                        barPercentage: 1
                                    }]
                                }
                            }
                        });
                    }
                }
                return {
                    init: function() {},


                    load: function() {

                        barChart1();

                    },

                    resize: function() {

                        barChart1();

                    }
                }

            }();

            jQuery(document).ready(function() {});

            jQuery(window).on('load', function() {
                dzSparkLine.load();
            });

            jQuery(window).on('resize', function() {
                dzSparkLine.resize();
                setTimeout(function() {
                    dzSparkLine.resize();
                }, 1000);
            });

        })(jQuery);
    </script>

    </html>
@endsection
