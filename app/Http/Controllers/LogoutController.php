<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DaftarPengunjung;
use DB;

class LogoutController extends Controller
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
        return view('logout.index', compact('visitor_lists', 'data'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $WaktuKeluar = Carbon::now();
        \DB::enableQueryLog(); 

        // DaftarPengunjung::find($id)->update(['waktu_keluar' => $WaktuKeluar]);

        DB::table('daftar_pengunjungs')->where('id', $id)->update([
            'waktu_keluar' => $WaktuKeluar
            ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
