<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
public function index()
    {
          $data_kategori = \App\Kategori::all(); 
        return view('kategori.index',['data_kategori' => $data_kategori]);
    }
public function create()
    {
    	return view('kategori.create');
    }

public function edit($id)
    {
    	$kategori = \App\Kategori::find($id);
    	return view('kategori/edit',['kategori'=>$kategori]);
    }
public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        if($request->file('cover')) 
        {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/kategori", $fileName);
            $kategori->cover = $fileName;
            
        }

        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->lokasi = $request->input('lokasi');
        $kategori->deskripsi = $request->input('deskripsi');

        

        $kategori->update();

 alert()->success('Berhasil.','Data Berhasil Dibuat!');
        return redirect()->to('kategori');
    }
public function delete($id)
    {
    	$kategori = \App\Kategori::find($id);
    	$kategori->delete();
         alert()->success('Berhasil.','Data Berhasil Dibuat!');
    	return redirect('/kategori');
    }
public function show($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.show', compact('kategori'));
    }
    public function store(Request $request)
    {
        $count = Kategori::where('nama_kategori',$request->input('nama_kategori'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('kategori');
        }

        $this->validate($request, [
            'nama_kategori' => 'required|string|max:20|unique:kategori',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'required|string|min:6',
        ]);


        if($request->file('cover') == '') {
            $cover = NULL;
        } else {
            $file = $request->file('cover');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('cover')->move("images/kategori", $fileName);
            $cover = $fileName;
        }

        Kategori::create([
            'nama_kategori' => $request->input('nama_kategori'),
            'lokasi'=>$request->input('lokasi'),
            'deskripsi' => $request->input('deskripsi'),
            'cover' => $cover
        ]);
        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('kategori.index');

    }
}
