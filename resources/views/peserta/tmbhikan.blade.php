@extends('layouts.master')

@section('content')

			<h1>Tambah Ikan </h1>

			@if(session('sukses'))
			<div class="alert alert-success" role="alert">
				{{session('sukses')}}
			</div>
			@endif

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<form action="/ikan/create" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        {{ method_field('put') }}

         			  <div class="form-group">
					    <label for="exampleInputEmail1">ID Peserta</label>
					    <input name="peserta_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Peserta" value="{{$peserta->id}}">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Peserta</label>
					    <input name="nama_peserta" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Peserta" value="{{$peserta->nama_peserta}}">
					  </div>


					   <div class="form-group">
					<label for="exampleInputEmail1">Kategori</label>
                        <select id="kategori_id"ype="text" class="form-control" name="kategori_id">
                            <?php
                            $query = DB::table('kategori')
                             ->get();
                            ?>
                            @foreach($query as $dat)
                            <option value="{{$dat->id}}"->{{$dat->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
         
		 <div class="form-group">
		    <label for="exampleInputEmail1">Jumlah</label>
		    <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jumlah">
		  </div>
					 <button type="submit" class="btn btn-primar btn-warning">Simpan</button>
					</form>
					</div>
					</div>
				</div>
			</div>
@endsection
