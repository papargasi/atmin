<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Host;
use App\Models\Absen;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request, $id_host)
    {
        
        // Validasi input tanggal
        $request->validate([
            'tanggal' => 'required|date|after_or_equal:2025-03-18|before_or_equal:2025-04-16',
        ]);
    
        // Ambil data host berdasarkan ID
        $host = Host::with(['absens' => function ($query) use ($request) {
            $query->whereDate('tanggal', $request->tanggal);
        }])->findOrFail($id_host);
    
        return view('absen.edit', [
            'dataAbsen' => [$host] // Kirim hanya data host yang difilter
        ]);
    }
    
    public function halamanEdit(){
        $dataAbsen  = Host::with(['absens' => function ($query) {
            $query->orderBy('tanggal', 'desc');
        }])->get();
        return view('absen.halamanEdit',compact('dataAbsen'));
    } 
    public function index()
    {
        $dataTarget = DB::table('tbl_host')
            ->leftJoin('tbl_absen', 'tbl_host.id_host', '=', 'tbl_absen.id_host')
            ->select(
                'tbl_host.id_host',
                'tbl_host.nm_panggilan',
                'tbl_host.foto',
                DB::raw('IFNULL(SUM(tbl_absen.durasi), 0) as total_durasi'),
                DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 3 THEN 1 END), 0) as total_alfa'),
                DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 1 THEN 1 END), 0) as total_kerja'),
                DB::raw('IFNULL(COUNT(CASE WHEN tbl_absen.status = 2 THEN 1 END), 0) as total_libur')
            )
            ->groupBy('tbl_host.id_host', 'tbl_host.nm_panggilan', 'tbl_host.foto')
            ->get();


        $dataHost = host::all(); // Pastikan tabel hosts sesuai dengan nama tabel sebenarnya
        $dataAbsen = DB::table('tbl_absen')
            ->whereBetween('tanggal', ['2025-03-18', '2025-04-16'])
            ->get();

        // Format tanggal
        $dates = [];
        for ($i = 18; $i <= 31; $i++) $dates[] = "2025-03-$i";
        for ($i = 1; $i <= 16; $i++) $dates[] = "2025-04-" . str_pad($i, 2, '0', STR_PAD_LEFT);

        // Siapkan data tabel
        $tableData = [];
        foreach ($dataHost as $row) {
            $tableData[] = [
                "nama" => $row->nm_panggilan,
                "present" => [],
            ];
            for ($i = 0;$i < count($dates);$i++) {
                $date = $dates[$i];
                $absen = Absen::where("id_host", $row->id_host)->whereDate("tanggal", $date)->first();
                $tableData[count($tableData) - 1]["present"][] = $absen->status ?? "-";
            }
        }

        // Kirim data ke view
        return view('absen.index', compact('dataHost', 'dates', 'tableData','dataTarget'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDataHadir(Request $request)
{
    $existingData = Absen::where('id_host', $request->input('nm_host'))
                         ->where('tanggal', $request->input('tanggal'))
                         ->first();

    if ($existingData) {
        return redirect()->back()->with('error', 'Host telah melakukan absen untuk tanggal tersebut');
    }

    $absen = new Absen();
    $absen->id_host = $request->input('nm_host');
    $absen->tanggal = $request->input('tanggal');
    $absen->durasi = $request->input('gmv');
    $absen->status = 1;
    $absen->save();

    return redirect()->back()->with('success', 'Data hadir berhasil ditambahkan!');
}

public function createDataAlfa(Request $request)
{
    $existingData = Absen::where('id_host', $request->input('id'))
                         ->where('tanggal', now()->format('Y-m-d'))
                         ->first();

    if ($existingData) {
        return redirect()->back()->with('error', 'Host telah melakukan absen untuk tanggal tersebut');
    }

    $absen = new Absen();
    $absen->id_host = $request->input('id');
    $absen->tanggal = now();
    $absen->status = 3;
    $absen->durasi = $request->input('durasi');
    $absen->save();

    return redirect()->back()->with('success', 'Data tidak hadir berhasil ditambahkan!');
}
public function createDataLibur(Request $request)
{
    $existingData = Absen::where('id_host', $request->input('id'))
                         ->where('tanggal', now()->format('Y-m-d'))
                         ->first();

    if ($existingData) {
        return redirect()->back()->with('error', 'Host telah melakukan absen untuk tanggal tersebut');
    }

    $absen = new Absen();
    $absen->id_host = $request->input('id');
    $absen->tanggal = now();
    $absen->status = 2;
    $absen->durasi = $request->input('durasi');
    $absen->save();

    return redirect()->back()->with('success', 'Data libur berhasil ditambahkan!');
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
        $dataUpdate = Absen::findOrFail($id);
        return view('absen.edit',compact('dataUpdate'));
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
        $absen = Absen::find($id);
        $absen->delete();

    return redirect()->back();
    }
}
