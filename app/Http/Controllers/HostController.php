<?php

namespace App\Http\Controllers;
use App\Models\Host;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\file;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataHost = Host::all();
        return view('host.index',compact('dataHost'));
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
         // Validasi form
         $request->validate([
             'nm_host' => 'required|string|max:255',
             'nm_panggilan' => 'required|string|max:255',
             'alamat' => 'required|string',
             'bank' => 'required|string',
             'norek' => 'required|string',
             'nohp' => 'required|string',
             'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
     
         $foto = $request->file('foto');
         $nama_baru = time() . rand(1000, 9999) . '.' . $foto->getClientOriginalExtension();
         $foto->move(public_path('img/host'), $nama_baru);
         $status = 'Training';
     
         Host::create([
             'nm_host' => $request->nm_host,
             'nm_panggilan' => $request->nm_panggilan,
             'alamat' => $request->alamat,
             'bank' => $request->bank,
             'norek' => $request->norek,
             'nohp' => $request->nohp,
             'foto' => $nama_baru,
             'status' => $status,
         ]);
     
         return redirect()->route('host.index')->with('success', 'Data host berhasil ditambahkan!');
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
        $host = Host::findOrFail($id);
        return view('host.update',compact('host'));
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
        $host = Host::findOrFail($id);
        $host->update($request->except(['_token', '_method']));
        return redirect('/Host');
    }
    public function updatePhoto(Request $request, $id)
    {
        $host = Host::findOrFail($id);

        // Validasi foto
        $request->validate([
            'foto' => 'required|image|max:2048',
        ]);

        // Hapus foto lama jika ada
        if ($host->foto && file_exists(public_path('img/host/' . $host->foto))) {
            unlink(public_path('img/host/' . $host->foto));
        }

        // Simpan foto baru
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('img/host'), $fileName);

        $host->update(['foto' => $fileName]);

        return redirect()->back()->with('success', 'Foto berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $host = Host::find($id);
        $host->delete();
        file::delete('img/host/'.$host->foto);
        return redirect()->route('host.index');
    }
    public function deletePhoto($id)
    {
        $host = Host::findOrFail($id);

        // Hapus foto dari penyimpanan
        if ($host->foto && file_exists(public_path('img/host/' . $host->foto))) {
            unlink(public_path('img/host/' . $host->foto));
        }

        // Set kolom foto menjadi null
        $host->update(['foto' => null]);

        return redirect()->route('host.index');
    }
}
