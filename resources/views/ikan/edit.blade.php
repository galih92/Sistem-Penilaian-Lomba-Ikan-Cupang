@extends('layouts.master')

@section('content')

			<h1>Edit Data Ikan</h1>

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
				<form action="/ikan/{{$ikan->id}}/update" method="POST">
			        	{{csrf_field()}}
			          
					  <div class="form-group">
					    <label for="exampleInputEmail1">ID Ikan</label>
					    <input name="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ID Ikan" value="{{$ikan->id}}" readonly="">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama Peserta</label>
					    <input name="nama_peserta" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama_peserta" value="{{$ikan->peserta->nama_peserta}}">
					  </div>

					   <div class="form-group">
					    <label for="exampleInputEmail1">Status</label>
					      <select class="form-control" name="status" required="">
	 <option value=""></option>
                                <option value="belum">Belum</option>
                                <option value="ternilai">ternilai</option>
                                </select>
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
					 <button type="submit" class="btn btn-primar btn-warning">Simpan</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
@endsection
