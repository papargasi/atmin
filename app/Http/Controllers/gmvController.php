<?php

namespace App\Http\Controllers;
use App\Models\gmv;
use Illuminate\Http\Request;

class gmvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gmv = gmv::all();
        return view('gmv.index',compact('gmv'));
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
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'gmv' => 'required|numeric|min:0',
        ]);

        $existingData = GMV::where('tanggal', $request->tanggal)->first();

        if ($existingData) {
            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'Sudah ada data GMV pada tanggal tersebut.');
        }

        // Simpan data ke database
        $gmv = new GMV();
        $gmv->tanggal = $request->tanggal;
        $gmv->gmv = $request->gmv;
        $gmv->save();

        // Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('gmv.index');
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
        $gmv = gmv::findOrFail($id);
        return view('gmv.update',compact('gmv'));
    }

    public function gmvSekarang($id)
    {
        $gmvSekarang = gmv::findOrFail($id);
        return view('gmv.tambah',compact('gmvSekarang'));
    }
    public function tambahGmv(Request $request, $id)
    {

        $gmv = gmv::findOrFail($id);

        $gmv->gmv += $request->gmv_baru;

        // Simpan hasilnya ke database
        $gmv->save();

        return redirect()->route('gmv.index');
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
        $gmv = gmv::find($id);
        $gmv->tanggal = $request->input('tgl');
        $gmv->gmv = $request->input('gmv');
        $gmv->save();
        return redirect('/GMV');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gmv)
    {
        $gmv = gmv::find($id_gmv);
        $gmv->delete();

    return redirect()->back();
    }
}
