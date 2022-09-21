<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Daftar Tamu</title>

    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            height: 29.7cm;
            width: 100%;
            margin: auto;
            color: #001028;
            background: #FFFFFF;
            font-size: 13px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        header {
            /* width: 100%;
            padding: 10px 0;
            margin-bottom: 30px; */
            border-color: #f3f3f3;
            position: relative;
            background: transparent;
            padding: 1.5rem 1.875rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer {
            font-family: "Times New Roman", Times, serif;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 11px;
        }

        h2 {

            font-weight: 400;
            line-height: 1.5;
            color: #000;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-top: 6%;
            /* font-size: 2.4em; */
            line-height: 1.4em;
            font-weight: bold;
            text-align: center;

            /* margin: 0 0 20px 0; */
            background: url(dimension.png);
        }

        h3 {
            /* border-bottom: 1px solid #5D6975; */
            color: #001028;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            /* font-size: 2.4em; */
            /* line-height: 1.4em; */
            font-weight: normal;
            text-align: center;
            margin-top: -15px;
            margin-bottom: 5%;
            /*margin: 0 0 20px 0;*/
            background: url(dimension.png);
        }

        table {
            width: 85%;
            margin-top: 5%;
            border-collapse: collapse;
            border-spacing: 0;
            margin: auto;
        }

        table1 {
            width: 100%;
            border: none;
        }



        tr {
            text-align: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }


        table th {
            padding: 5px 12px;
            width: 100%;
            color: #000;
            white-space: nowrap;
            font-weight: bold;
            border-collapse: collapse;
            background-color: #abcdef;
        }

        tr {
            border-bottom: 0.5px #000 solid;
        }

        table {
            border: 1px #000 solid
        }

        table td {
            padding: 2px;
            text-align: center;
        }

        p {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 10px;
            margin: 0px;
        }

        .topright {
            position: absolute;
            top: 10px;
            right: 16px;
            font-size: 18px;
            width: 17%;
        }

        .topleft {
            position: absolute;
            top: 10px;
            left: 16px;
            font-size: 18px;
            width: 20%;
        }
    </style>
</head>

<body>
    <header>
        <img src="assets/images/logo-bumn1.png" class="topleft">
        <img src="assets/images/logo-4.png" class="topright">
    </header>
    <h2 style="text-decoration: underline;">DAFTAR PENGUNJUNG SERVER</h2>
    <h3>{{ $tanggal1 }} s/d {{ $tanggal2 }}</h3>
    <main>
        <div class="table-responsive" style="overflow-x:auto">
            <table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;">
                <thead>
                    <tr>
                        <th style="width: 10px;">No.</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Instansi</th>
                        <th>No HP</th>
                        <th>Keperluan</th>
                        <th style="width: 5px">Alat Pendukung</th>
                        <th>Nama Alat</th>
                        <th>Pendamping</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <div class="footer">
        <p style="font-weight: bold">PT. PAL INDONESIA</p>
        <p>Kantor Pusat : UJUNG, SURABAYA 60155, PO BOX 1134 INDONESIA</p>
        <p>Telp : +62-31-3292275 (HUNTING) FAX : +62-31-3292530, 3292493, 3292516 Email : headoffice@pal.co.id Web Site
            : http//www.pal.co.id</p>
        <p>Kantor Perwakilan : JL. TANAH ABANG IV27, JAKARTA 10100, PHONE : +62-21-3846833, FAX : +62-21-3643717 E-mail
            : jakartabranch@pal.co.id</p>
    </div>

</body>

</html>
