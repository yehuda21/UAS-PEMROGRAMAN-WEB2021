<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Mahasiswa::all();
        return view('mahasiswa.index', compact('rows'));    
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.add');
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
        'mhsw_nim' => 'bail|required|unique:tb_mhsw',
        'mhsw_nama' => 'required'
        ], [
        'mhsw_nim.required' => 'NIM wajib diisi',
        'mhsw_nim.unique' => 'Nama Tahun sudah ada',
        'mhsw_nama.required' => 'Nama wajib diisi'
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->mhsw_nim = $request->mhsw_nim;
        $mahasiswa->mhsw_nama = $request->mhsw_nama;
        $mahasiswa->mhsw_jurusan = $request->mhsw_jurusan;
        $mahasiswa->mhsw_jenkel = $request->gender;
        $mahasiswa->mhsw_lulusan = json_encode($request->lulusan);
        $mahasiswa->mhsw_alamat = $request->mhsw_alamat;
        $mahasiswa->save();
        return redirect('/mahasiswa');
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
     $row = Mahasiswa::findOrFail($id);
     return view('mahasiswa.edit', compact('row'));
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
    $request->validate([
    'mhsw_nim' => 'bail|required',
    'mhsw_nama' => 'required'
    ],
    [
    'mhsw_nim.required' => 'NIM wajib diisi',
    'mhsw_nama.required' => 'Nama wajib diisi'
    ]);
    $mahasiswa = Mahasiswa::where('mhsw_id', '=', $id)->first();
    $mahasiswa->mhsw_nim = $request->mhsw_nim;
    $mahasiswa->mhsw_nama = $request->mhsw_nama;
    $mahasiswa->mhsw_jurusan = $request->mhsw_jurusan;
    $mahasiswa->mhsw_jenkel = $request->gender;
    $mahasiswa->mhsw_lulusan = json_encode($request->lulusan);
    $mahasiswa->mhsw_alamat = $request->mhsw_alamat;
    $mahasiswa->save();
    return redirect('mahasiswa');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
            // mengambil data dari table pegawai sesuai pencarian data
        $mahasiswa = DB::table('tb_mhsw')
        ->where('mhsw_nama','like',"%".$cari."%")
        ->paginate();
 
            // mengirim data pegawai ke view index
        return view('index',['mahasiswa' => $mahasiswa]);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Mahasiswa::findOrFail($id);
     $row->delete();

    return redirect('mahasiswa');
    }
}
