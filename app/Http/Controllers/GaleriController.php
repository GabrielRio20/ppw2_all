<?php

namespace App\Http\Controllers;

use File;
use App\Models\Buku;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class GaleriController extends Controller
{
    //
    public function index(){
        $batas = 4;
        $buku = Buku::all();
        $galeri = Galeri::orderBy('id')->paginate($batas);
        $no = $batas * ($galeri->currentPage() - 1);
        return view ('galeri.index', compact('galeri', 'no', 'buku'));
    }
    
    public function create(){
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $galeri = New Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;
        
        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('pesan', 'Data berhasil disimpan');
    }

        public function destroy($id) {
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect('/galeri')->with('hapus', 'Data berhasil dihapus');
    }
    
    public function edit($id){
        $buku= Buku::all();
        $galeri = Galeri::find($id);
        return view('galeri.update', compact('galeri', 'buku'));
    }
    
    public function update(Request $request, $id){
        
        $galeri = Galeri::find($id);
        $this->validate($request,[
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $galeri-> update([
            'nama_galeri'=>$request->nama_galeri,
            'id_buku'=>$request->id_buku,
            'foto'=>$request->foto
        ]);

        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto) -> resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        
        return redirect('/galeri')->with('pesan', 'Data galeri berhasil diedit');
    }


    
}
