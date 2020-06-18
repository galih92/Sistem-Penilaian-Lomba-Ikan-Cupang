

@extends('layouts.master')

@section('content')
@if(session('sukses'))
			<div class="alert alert-success" role="alert">
				{{session('sukses')}}
			</div>
			@endif
			<div><form class="form-inline my-2 my-lg-0 float-right" method="GET" class="/peserta">
    		</form>
			
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-mg-12">
					<div class="right">
						<a href="{{ route('peserta.create') }}" class="btn btn-primary" class="fa fa-plus" >Tambah Peserta</a>
					</div>

					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Peserta</h3>	
						</div>

                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
				<thead>
				<tr>
					<th>No</th>
					<th>Nama Peserta</th>
					<th>Telpon</th>
					<th>Alamat</th>
					<th>Aksi</th>
					
				</tr>
				</thead>
				<tbody>
					
					<?php $no=1;?>
				@foreach($data_peserta as $peserta)
		

				<tr>
					<td>{{$no++}}</td>
					<td> <a href="{{route('peserta.show', $peserta->id)}}"> 
						{{$peserta->nama_peserta}}</td>
					<td>{{$peserta->tlfn}}</td>
					<td>{{$peserta->alamat}}</td>
					<td>
				<!-- 		<button data-toggle="modal" data-target="#tambahikan" class="btn btn-primary btn-sm">Tambah Ikan</button> -->
						<a href="/peserta/{{$peserta->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
						<a href="/peserta/{{$peserta->id}}/delete"  class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin Menghapus')">Hapus</a>
						<a href="/peserta/{{$peserta->id}}/edit2"  class="btn btn-primary btn-sm">Tambah Ikan</a>

					<td>
					
				</tr>
				@endforeach
				</tbody>
			</table>
					</div>
				</div>

<!-- Modal tambah ikan -->
<div class="modal fade" id="tambahikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Katgeori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
        <form action="/ikan/create" method="POST">
        	{{csrf_field()}}


		 <div class="form-group">
		 <label for="exampleInputEmail1">Peserta</label>
                        <select id="peserta_id" type="text" class="form-control" name="peserta_id" readonly="">
                            <?php
                            $query = DB::table('peserta')
                             ->get();
                            ?>
                            @foreach($query as $dat)
                            <option value="{{$dat->id}}"->{{$dat->nama_peserta}}</option>
                            @endforeach
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
         

		 <div class="form-group">
		    <label for="exampleInputEmail1">Jumlah</label>
		    <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jumlah">
		  </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
		</form>
      </div>
    </div>
  </div>


			
@endsection

