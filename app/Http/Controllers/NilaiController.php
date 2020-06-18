<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\Ikan;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
class NilaiController extends Controller
{
    public function index()
    {
         if(Auth::user()->level == 'admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }


    	$data_nilai = \App\Nilai::orderBy('total_nilai', 'DESC')->get();

    	return view('nilai.index',['data_nilai' => $data_nilai]);
    }

     public function create(Request $request)
    {

        $this->validate($request, [
            'ikan_id' => 'required|string|max:255|unique:nilai',

        ]);


        Nilai::create([
                'ikan_id' => $request->get('ikan_id'),
                'gerak' => $request->get('gerak'),
                'warna' => $request->get('warna'),
                'sirip' => $request->get('sirip'),
                'dasi' => $request->get('dasi'),
                'ekor' => $request->get('ekor'),
                'cacat' => $request->get('cacat'),
                'total_nilai' => (($request->get('gerak')+$request->get('warna')+$request->get('sirip')+$request->get('dasi')+$request->get('ekor'))-$request->get('cacat'))
                
            ]);
    
        return redirect('/nilai');

    }
   
      public function nilai($id)
    {
        $nilai = \App\Ikan::find($id);
        return view('nilai/create',['nilai'=>$nilai]);
    }

    public function edit($id)
    {
    	$nilai = \App\Nilai::find($id);
    	return view('nilai/edit',['nilai'=>$nilai]);
    }
    public function update(Request $request, $id)
    {
    	 Nilai::find($id)->update([
       
                'gerak' => $request->get('gerak'),
                'warna' => $request->get('warna'),
                'sirip' => $request->get('sirip'),
                'dasi' => $request->get('dasi'),
                'ekor' => $request->get('ekor'),
                'cacat' => $request->get('cacat'),
                'total_nilai' => (($request->get('gerak')+$request->get('warna')+$request->get('sirip')+$request->get('dasi')+$request->get('ekor'))-$request->get('cacat'))
                
                ]);

                alert()->success('Berhasil.','Data Berhasil Diupdate!');
    	return redirect('/nilai');
    }
    public function delete($id)
    {
    	$nilai = \App\Nilai::find($id);
    	$nilai->delete();
                alert()->success('Berhasil.','Data Berhasil Dihapus!');
    	return redirect('/nilai');
    }


        public function store(Request $request)
    {


        $this->validate($request, [
            'ikan_id' => 'required|string|max:255|unique:nilai',

        ]);

        Nilai::create([
                'id' => $request->get('id'),
                'ikan_id' => $request->get('ikan_id'),
                'gerak' => $request->get('gerak'),
                'warna' => $request->get('warna'),
                'sirip' => $request->get('sirip'),
                'dasi' => $request->get('dasi'),
                'ekor' => $request->get('ekor'),
                'cacat' => $request->get('cacat'),
                'total_nilai' => ($request->get('gerak')+$request->get('warna')+$request->get('sirip')+$request->get('dasi')+$request->get('ekor'))-$request->get('cacat')
                
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('nilai.index');
    }
}
