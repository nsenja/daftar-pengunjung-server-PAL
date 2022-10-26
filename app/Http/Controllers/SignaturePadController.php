<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengunjung;
use Illuminate\Http\Request;

class SignaturePadController extends Controller
{
    public function index()
    {
        $visitor_lists = DaftarPengunjung::all();
        return view('users.create', compact('visitors_list'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function upload(Request $request)
    {
        //$input = $request->all();
        //$data = Absensi::create($input);
        $data = new DaftarPengunjung();
        $data->nama_lengkap = $request->get('nama_lengkap');
        $data->nik = $request->get('nik');
        $data->instansi = $request->get('instansi');
        $data->no_hp = $request->get('no_hp');
        $data->keperluan = $request->get('keperluan');
        $data->alat_pendukung = $request->get('alat_pendukung');
        $data->nama_alat = $request->get('nama_alat');
        $data->pendamping = $request->get('pendamping');
        $data->waktu_masuk = $request->get('waktu_masuk');

        $image_parts = explode(";base64,", $request->tandatangan_pengunjung);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $image_name = uniqid() . '.' . $image_type;
        $file = 'storage/images/' . $image_name;
        $data->tandatangan_pengunjung = 'images/' . $image_name;
        file_put_contents($file, $image_base64);

        $image_parts = explode(";base64,", $request->tandatangan_pendamping);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $image_name = uniqid() . '.' . $image_type;
        $file = 'storage/pendampingsign/' . $image_name;
        $data->tandatangan_pendamping = 'pendampingsign/' . $image_name;
        file_put_contents($file, $image_base64);

        $data->save();
        //dd($file);
        // Alert::success('Succes','Data Absensi Berhasil Ditambahkan');
        return redirect()->route('users.index');
    }
}
