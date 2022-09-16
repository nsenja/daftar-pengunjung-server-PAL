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
        // $visits=new DaftarPengunjung;
        // $visits->status=0
        $validate = $request->alat_pendukung;
        if ($validate == 'Ya') {
            $request->validate([
                'nama_alat' => 'required',
            ]);
        } else {
            $request->validate([
                'nama_lengkap' => 'required',
                'nik' => 'required',
                'instansi' => 'required',
                'no_hp' => 'required',
                'keperluan' => 'required',
                'alat_pendukung' => 'required',
                'nama_alat' => 'required',
                'pendamping' => 'required',
                'waktu_masuk' => 'required',
            ]);
        }

        $input = $request->all();
        DaftarPengunjung::create($input);
        return redirect()->route('users.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }
}
