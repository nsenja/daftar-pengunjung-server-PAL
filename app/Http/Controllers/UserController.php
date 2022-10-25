<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DaftarPengunjung;

class UserController extends Controller
{
    public function index()
    {
        $visitor_lists = DaftarPengunjung::orderBy('created_at', 'DESC')->get();
        $data = DaftarPengunjung::latest()->paginate(10);

        $datetime = Carbon::now();
        $current_date = DaftarPengunjung::whereDate('created_at', Carbon::today())->get(['nama_lengkap', 'created_at']);
        $current_week = DaftarPengunjung::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $current_month = DaftarPengunjung::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['nama_lengkap', 'created_at']);

        return view('users.index', compact('visitor_lists', 'data', 'current_date', 'current_week', 'current_month', 'datetime'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', ['visitor_lists' => DaftarPengunjung::index()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'nama_lengkap' => 'required',
                'tandatangan_pengunjung'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nik' => 'required',
                'instansi' => 'required',
                'no_hp' => 'required',
                'keperluan' => 'required',
                'alat_pendukung' => 'required',
                'nama_alat' => 'required',
                'pendamping' => 'required',
                // 'tandatangan_pendamping'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'waktu_masuk' => 'required',
                'tandatangan_pendamping'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($request->hasFile('tandatangan_pengunjung')) {
                $image_name = $request->file('tandatangan_pengunjung')->store('images', 'public');
            }

            if ($request->hasFile('tandatangan_pendamping')) {
                $image_name = $request->file('tandatangan_pendamping')->store('images', 'public');
            }

            $pengunjungs = new DaftarPengunjung();
            $pengunjungs->nama_lengkap = $request->get('nama_lengkap');

            $pengunjungs->nik = $request->get('nik');
            $pengunjungs->instansi = $request->get('instansi');
            $pengunjungs->no_hp = $request->get('no_hp');
            $pengunjungs->keperluan = $request->get('keperluan');
            $pengunjungs->alat_pendukung = $request->get('alat_pendukung');
            $pengunjungs->nama_alat = $request->get('nama_alat');
            $pengunjungs->pendamping = $request->get('pendamping');
            $pengunjungs->waktu_masuk = $request->get('waktu_masuk');
            // $pengunjungs->tandatangan_pendamping = $image_name;
            $pengunjungs->tandatangan_pengunjung = $image_name;
            $pengunjungs->tandatangan_pendamping = $image_name;

            $input = $request->save();
            DaftarPengunjung::create($input);
            return redirect()->route('users.index')
                ->with('success', 'Data Berhasil Ditambahkan');
    }
}
