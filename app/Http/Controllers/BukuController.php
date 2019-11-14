<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = DB::table('table_tahun')->get();
        $kategori = DB::table('table_kategori')->get();
        $buku = DB::table('table_buku')
            ->join('table_kategori','table_buku.id_kategori','table_kategori.id')
            ->join('table_tahun','table_buku.id_tahun','table_tahun.id')
            ->select('table_buku.*','table_kategori.nama_kategori','table_tahun.tahun')
            ->get();
        return view('manage-buku',['buku'=>$buku,'tahun'=>$tahun,'kategori'=>$kategori]);
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
        //dd($request->all());
        $request->validate([
            'isbn' => 'required|size:9',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'jml_halaman' => 'required',
            'tahun' => 'required',
            'stok' => 'required',
            'no_rak' => 'required',
            'id_kategori' => 'required',
        ]);

        Buku::create([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'jml_halaman' => $request->jml_halaman,
            'id_tahun' => $request->tahun,
            'stok' => $request->stok,
            'no_rak' => $request->no_rak,
            'id_kategori' => $request->id_kategori
        ]);
        return redirect('/manage-buku')->with('status','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        //dd($request->id);
        $request->validate([
            'isbn' => 'required|size:9',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'jml_halaman' => 'required',
            'tahun' => 'required',
            'stok' => 'required',
            'no_rak' => 'required',
            'id_kategori' => 'required',
        ]);
        Buku::where('id', $request->id )
            ->update([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'jml_halaman' => $request->jml_halaman,
            'id_tahun' => $request->tahun,
            'stok' => $request->stok,
            'no_rak' => $request->no_rak,
            'id_kategori' => $request->id_kategori
        ]);
        return redirect('/manage-buku')->with('status','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::where('id',$id)->delete();
        return redirect('/manage-buku')->with('status','Data Berhasil Dihapus');
    }
}
