<?php

namespace App\Http\Controllers;

use App\Models\Host;
use App\Models\gmv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataDashboard()
    {
    
        
        $gmvMingguPertama = DB::table('tbl_gmv')->whereBetween('tanggal', ["2025-03-18", "2025-04-24"])->sum('gmv');
        $gmvMingguKedua = DB::table('tbl_gmv')
        ->whereBetween('tanggal', ["2025-03-25", "2025-03-31"])
        ->sum('gmv');
        
        $gmvMingguKetiga = DB::table('tbl_gmv')
        ->whereBetween('tanggal', ["2025-04-01", "2025-04-07"])
        ->sum('gmv');
        
        $gmvMingguKeempat = DB::table('tbl_gmv')
        ->whereBetween('tanggal', ["2025-04-08", "2025-04-16"])
        ->sum('gmv');
        
        
        // Ambil data 7 hari terakhir untuk GMV seminggu
        $gmvSeminggu = DB::table('tbl_gmv')
            ->where('tanggal', '>=', \Carbon\Carbon::now()->subDays(7))
            ->orderBy('tanggal', 'desc')
            ->take(7)
            ->get();
    
        // Data absen dengan host
        $dataAbsen = DB::table('tbl_absen')
            ->join('tbl_host', 'tbl_absen.id_host', '=', 'tbl_host.id_host')
            ->select('tbl_host.foto','tbl_host.nm_panggilan', DB::raw('SUM(tbl_absen.durasi) as total_durasi'))
            ->groupBy('tbl_host.id_host', 'tbl_host.nm_panggilan','tbl_host.foto')
            ->get();
    
        // Data GMV untuk chart
        $chartGmv = DB::table('tbl_gmv')
            ->whereBetween('tanggal', ['2025-03-18', '2025-04-16'])
            ->get();
    
        // Semua data GMV
        $dataGmv = gmv::all();
        $totalGmv = $dataGmv->sum('gmv');
    
        return view('welcome', compact(
            'dataAbsen',
            'dataGmv',
            'totalGmv',
            'chartGmv',
            'gmvSeminggu',
            'gmvMingguPertama',
            'gmvMingguKedua',
            'gmvMingguKetiga',
            'gmvMingguKeempat'
        ));
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
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function show(Host $host)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function edit(Host $host)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Host $host)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $host)
    {
        //
    }
}
