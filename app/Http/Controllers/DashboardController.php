<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Ikan;
use App\User;
use App\Kategori;
use Auth;

class DashboardController extends Controller
{


      public function index(Request $request)
    {

          $data_peserta = \App\Peserta::all(); 
          $data_ikan = \App\Ikan::all();
          $data_user = \App\User::all();
          $data_kategori = \App\Kategori::all();
        return view('dashboards.index',['data_peserta' => $data_peserta],compact('data_peserta', 'data_kategori', 'data_ikan','data_user'));
    }
}
