<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Ikan;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class PesertaController extends Controller
{
    public function index(Request $request)
    {
         if(Auth::user()->level == 'admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }
                 if(Auth::user()->level == 'juri') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }
    

        $data_peserta = \App\Peserta::all();  
    	return view('peserta.index',['data_peserta' => $data_peserta]);
    }

     public function create()
    {    
        return view('peserta.create');
    }


    public function store(Request $request)
    {    $this->validate($request, [
            'nama_peserta' => 'required|string|max:255|unique:peserta',
            
        ]);
        

        \App\Peserta::create($request->all());  
        return redirect('/peserta');

    }

  public function edit2($id)
    {
        $peserta = \App\Peserta::find($id);
        return view('peserta/tmbhikan',['peserta'=>$peserta]);
    }

    public function edit($id)
    {
    	$peserta = \App\Peserta::find($id);
    	return view('peserta/edit',['peserta'=>$peserta]);
    }

    public function update(Request $request, $id)
    {
        $peserta_data = Peserta::findOrFail($id);
        $peserta_data->nama_peserta = $request->input('nama_peserta');
        $peserta_data->tlfn = $request->input('tlfn');
        $peserta_data->alamat = $request->input('alamat');
        $peserta_data->update();

     alert()->success('Berhasil.','Data Berhasil Diedit!');
             return redirect()->to('peserta');
    }

    public function delete($id)
    {
    	$peserta = \App\Peserta::find($id);
    	$peserta->delete();
    alert()->success('Berhasil.','Data telah dihapus!');
    	return redirect('/peserta');
    }   

    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        $ikan = Ikan::get();
        return view('peserta.show', compact('peserta','ikan'));
    }

     public function tmbhikan (Request $request)
    {
        \App\Ikan::create($request->all());
        $a = $request->jumlah;
        for ($i=1; $i < $a; $i++) { 
                $data = new Ikan();
                $data->kategori_id = $request->kategori_id;
                $data->peserta_id = $request->peserta_id;
                
                $data->save();
            }
             alert()->success('Berhasil.','Data Berhasil Dibuat!');
        return redirect('/ikan')->with('sukses','Data Berhasil Disimpan');
    }

}