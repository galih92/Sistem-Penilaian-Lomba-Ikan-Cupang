<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ikan;
use App\Nilai;
use App\Kategori;
use App\Peserta;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;


class IkanController extends Controller
{
    public function index(Request $request)
    {    
            if(Auth::user()->level == 'admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }
        
        if($request->has('cari')){
            $data_ikan = \App\Ikan::where('kategori_id','LIKE','%'.$request->cari.'%')->get();
        }else{
                
                $data_ikan = \App\Ikan::all();

            }

        return view('ikan.index',['data_ikan' => $data_ikan]);
    }

    public function cari (Request $request, $id){
        if($request->has('cari')){
            $data_ikan = \App\Ikan::where('kategori_id','LIKE','%'.$request->cari.'%')->get();
        }else{
                $data_ikan = \App\Ikan::all();
            }

        return view('ikan.index',['data_ikan' => $data_ikan]);
    }
    public function create(Request $request)
    {
    	\App\Ikan::create($request->all());
        $a = $request->jumlah;
        for ($i=1; $i < $a; $i++) { 
                $data = new Ikan();
                $data->kategori_id = $request->kategori_id;
                $data->peserta_id = $request->peserta_id;
                $data->status='belum';
                
                $data->save();
            }
             alert()->success('Berhasil.','Data Berhasil Dibuat!');
    	return redirect('/ikan')->with('sukses','Data Berhasil Disimpan');
    }
    public function edit($id)
    {
    	$ikan = \App\Ikan::find($id);
    	return view('ikan/edit',['ikan'=>$ikan]);
    }
    public function update(Request $request, $id)
    {
    	$ikan = \App\Ikan::find($id);
    	$ikan->update($request->all());
         alert()->success('Berhasil.','Data Berhasil Diedit!');
    	return redirect('/ikan');
    }

    public function update2($id)
    {
         Ikan::find($id)->update([
                $data->status='ternilai'
                ]);
    }
    public function delete($id)
    {
    	$ikan = \App\Ikan::find($id);
    	$ikan->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
    	return redirect('/ikan');
    }


        public function store(Request $request)
    {


        $this->validate($request, [
            'peserta_id' => 'required|string|max:255',
            'kategori_id' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',

        ]);

        Peserta::create([
            'peserta_id' => $request->input('peserta_id'),
            'kategori_id' => $request->input('kategori_id'),
            'jumlah'=>$request->input('jumlah'),
            'status'=>$request->input('status'),
        ]);

     alert()->success('Berhasil.','Data Berhasil Dibuat!');
        return redirect()->route('peserta.index');

    }
}
