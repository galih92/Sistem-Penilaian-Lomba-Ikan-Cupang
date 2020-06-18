@extends('layouts.master')

@section('content')

			<h1>Edit Data Peserta</h1>

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
				<form action="{{ route('peserta.update', $peserta->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Peserta</label>
					    <input name="nama_peserta" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Peserta" value="{{$peserta->nama_peserta}}">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Telfon</label>
					    <input name="tlfn" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telfon" value="{{$peserta->tlfn}}">
					  </div>
					 <div class="form-group">
					    <label for="exampleInputEmail1">Alamat</label>
					    <textarea name="alamat" class="form-control" id="exampleInputEmail1" rows="2" >{{$peserta->alamat}}</textarea>
					  </div>
					 <button type="submit" class="btn btn-primar btn-warning">Simpan</button>
					</form>
					</div>
					</div>
				</div>
			</div>
@endsection
