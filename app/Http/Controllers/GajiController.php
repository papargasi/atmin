<?php

namespace App\Http\Controllers;
use App\Models\Host;
use App\Models\Absen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class GajiController extends Controller
{
    public function komisi(Request $request) {
        $komisi = $request->input('komisi');
        $catatan = $request->input('catatan');
    
        return redirect()->back()->with([
            'komisi' => $komisi,
            'catatan' => $catatan
        ]);
    }
    
    public function cetakPDF($id)
    {
        // Ambil data host dan gaji berdasarkan ID
        $host = Host::findOrFail($id);
        $dataGaji = DB::table('tbl_absen')
        ->leftJoin('tbl_host', 'tbl_absen.id_host', '=', 'tbl_host.id_host')
        ->select(
            'tbl_host.id_host',
            'tbl_host.nm_panggilan',
            'tbl_host.nm_host',
            'tbl_host.status',
            DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 1 THEN 1 END), 0) as total_kerja'),
            DB::raw('IFNULL(SUM(tbl_absen.durasi), 0) as total_durasi')
        )
        ->where('tbl_host.id_host', $id) // Filter berdasarkan ID host
        ->groupBy('tbl_host.id_host', 'tbl_host.nm_panggilan', 'tbl_host.nm_host', 'tbl_host.status')
        ->first(); // Ambil satu data karena berdasarkan ID host

        // Hitung gaji per jam
        

        // Render view menjadi PDF
        $pdf = Pdf::loadView('gaji.pdf', compact('host', 'dataGaji'));

        // Simpan PDF ke folder public/pdf_gaji/
        $fileName = 'kwitansi_' . $host->nm_host . '.pdf';
        $filePath = 'pdf_gaji/' . $fileName;

        // Simpan ke public/pdf_gaji/
        file_put_contents(public_path($filePath), $pdf->output());

        // Redirect atau tampilkan PDF
        return response()->file(public_path($filePath));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGaji = DB::table('tbl_absen')
            ->leftJoin('tbl_host', 'tbl_absen.id_host', '=', 'tbl_host.id_host')
            ->select(
                'tbl_host.id_host',
                'tbl_host.nm_panggilan',
                'tbl_host.nm_host',
                'tbl_host.status',
                DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 1 THEN 1 END), 0) as total_kerja'),
                DB::raw('IFNULL(SUM(tbl_absen.durasi), 0) as total_durasi')
            )
            ->groupBy('tbl_host.id_host', 'tbl_host.nm_panggilan', 'tbl_host.status', 'tbl_host.nm_host')
            ->get();
        return view('gaji.index',compact('dataGaji'));
    }
    public function layout()
    {
        $dataGaji = DB::table('tbl_absen')
            ->leftJoin('tbl_host', 'tbl_absen.id_host', '=', 'tbl_host.id_host')
            ->select(
                'tbl_host.id_host',
                DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 1 THEN 1 END), 0) as total_kerja'),
                DB::raw('IFNULL(SUM(tbl_absen.durasi), 0) as total_durasi')
            )
            ->groupBy('tbl_host.id_host')
            ->get();
            return view('layout', compact('dataGaji'));
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
        $host = host::findOrFail($id);
    
        // Ambil data gaji berdasarkan id host
        $dataGaji = DB::table('tbl_absen')
            ->leftJoin('tbl_host', 'tbl_absen.id_host', '=', 'tbl_host.id_host')
            ->select(
                'tbl_host.id_host',
                'tbl_host.nm_panggilan',
                'tbl_host.nm_host',
                DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 1 THEN 1 END), 0) as total_kerja'),
                DB::raw('IFNULL(SUM(tbl_absen.durasi), 0) as total_durasi')
            )
            ->where('tbl_host.id_host', $id) // Filter berdasarkan ID host
            ->groupBy('tbl_host.id_host', 'tbl_host.nm_panggilan', 'tbl_host.nm_host')
            ->first(); // Ambil satu data karena berdasarkan ID host
    
        return view('gaji.halamanBayar', compact('host', 'dataGaji'));
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
