<?php

namespace App\Http\Controllers;
use App\Models\gmv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gmvHarian = DB::table('tbl_gmv')
            ->whereBetween('tanggal', ['2025-03-18', '2025-04-16'])
            ->orderBy('tanggal', 'asc')
            ->pluck('gmv')
            ->toArray();
        $komisiHarian = DB::table('tbl_gmv')
            ->whereBetween('tanggal', ['2025-03-18', '2025-04-16'])
            ->orderBy('tanggal', 'asc')
            ->selectRaw('(gmv * 5) / 100 as komisi')
            ->pluck('komisi')
            ->toArray();
        $capaianAbsen = DB::table('tbl_host')
        ->leftJoin('tbl_absen', 'tbl_host.id_host', '=', 'tbl_absen.id_host')
        ->select(
            'tbl_host.id_host',
            'tbl_host.nm_panggilan',
            DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 1 THEN 1 END), 0) as total_kerja'),
        )
        ->groupBy('tbl_host.id_host', 'tbl_host.nm_panggilan',)
        ->get();
        


        // Ambil GMV mingguan
        $gmvMingguPertama = DB::table('tbl_gmv')->whereBetween('tanggal', ["2025-03-18", "2025-03-24"])->sum('gmv');
    
        $gmvMingguKedua = DB::table('tbl_gmv')
            ->whereBetween('tanggal', ["2025-03-25", "2025-03-31"])
            ->sum('gmv');
    
        $gmvMingguKetiga = DB::table('tbl_gmv')
            ->whereBetween('tanggal', ["2025-04-01", "2025-04-07"])
            ->sum('gmv');
    
        $gmvMingguKeempat = DB::table('tbl_gmv')
            ->whereBetween('tanggal', ["2025-04-08", "2025-04-16"])
            ->sum('gmv');
            
        $dataGmv = gmv::all();
        $totalGmv = $dataGmv->sum('gmv');
        $dataAbsen = DB::table('tbl_absen')
            ->join('tbl_host', 'tbl_absen.id_host', '=', 'tbl_host.id_host')
            ->select('tbl_host.foto','tbl_host.nm_panggilan', DB::raw('SUM(tbl_absen.durasi) as total_durasi'),DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 1 THEN 1 END), 0) as total_kerja'))
            ->groupBy('tbl_host.id_host', 'tbl_host.nm_panggilan','tbl_host.foto')
            ->get();
        return view('statistik.index',compact('gmvHarian','komisiHarian','totalGmv','gmvMingguPertama','gmvMingguKedua','gmvMingguKetiga','gmvMingguKeempat','dataAbsen','capaianAbsen'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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
