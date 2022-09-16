<?php

namespace App\Http\Controllers;

use App\Models\DaftarPengunjung;
use App\Models\Supporttools;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use PDF;

class DaftarPengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitor_lists = DaftarPengunjung::orderBy('created_at', 'DESC')->get();
        $data = DaftarPengunjung::latest()->paginate(10);
        $supporttools = Supporttools::all();

        $current_date = DaftarPengunjung::whereDate('created_at', Carbon::today())->get(['nama_lengkap', 'created_at']);
        $current_week = DaftarPengunjung::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $current_month = DaftarPengunjung::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['nama_lengkap', 'created_at']);

        $record = DaftarPengunjung::select(DB::raw("COUNT(*) as total"), DB::raw("DATE(created_at) as day_name"))
                    ->whereMonth('created_at', date('m'))
                    ->groupBy(DB::raw('Date(created_at)'))
                    ->get();

        $labels = $record->pluck('day_name');
        $datacharts = $record->pluck('total');

        return view('admin.index', compact('visitor_lists', 'data', 'current_date', 'current_week', 'current_month', 'record', 'labels', 'datacharts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDaftarPengunjungRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarPengunjung  $daftarPengunjung
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarPengunjung  $daftarPengunjung
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDaftarPengunjungRequest  $request
     * @param  \App\Models\DaftarPengunjung  $daftarPengunjung
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarPengunjung  $daftarPengunjung
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function cetak(Request $request)
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date)->toDateString();
        $tanggal1 = Carbon::parse($start_date)->format('d F Y');
        $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date)->toDateString();
        $tanggal2 = Carbon::parse($end_date)->format('d F Y');
        $visitor_lists = DaftarPengunjung::select('*')
            ->whereRaw('DATE_FORMAT(created_at, "%Y-%m-%d") between "' . $request->start_date . '" and "' . $end_date . '"')
            ->get();

        $pdf = PDF::loadview('admin.daftar', compact('visitor_lists', 'start_date', 'end_date', 'tanggal1', 'tanggal2'));
        return $pdf->stream();
    }
}
