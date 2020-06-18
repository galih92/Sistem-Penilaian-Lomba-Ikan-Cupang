@extends('layouts.master')

@section('content')
@if(session('sukses'))
			<div class="alert alert-success" role="alert">
				{{session('sukses')}}
			</div>
			@endif
			<div><form class="form-inline my-2 my-lg-0 float-right" method="GET" class="/kategori">
    		</form>

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="right">
						<a href="{{ route('kategori.create') }}" class="btn btn-primary" class="fa fa-plus" >Tambah Kategori</a>
					</div>


<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Data Kategori</h3>	
	</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>
							<th>Lokasi</th>
							<th>Keterangan</th>
							<th>Aksi</th>
							
						</tr>
					</thead>
				<tbody>
					<?php $no = 0;?>
						@foreach($data_kategori as $kategori)
						<?php $no++ ;?>
						<tr>

							<td>{{$no}}</td>
							<td class="py-1">
								@if($kategori->cover)
							        <img src="{{url('images/kategori/'. $kategori->cover)}}" alt="image" style="margin-right: 10px; width: 50px; height: 50px" />
							     @else
							        <img src="{{url('images/kategori/default.png')}}" alt="image" style="margin-right: 10px; width: 50px; height: 50px" />
							     @endif

							     <a href="{{route('kategori.show', $kategori->id)}}">
							     {{$kategori->nama_kategori}}    
							</td>
							<td>{{$kategori->lokasi}}</td>
							<td>{{$kategori->deskripsi}}</td>
								 @if(Auth::user()->level == 'panitia')
							<td><a href="/kategori/{{$kategori->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
							<a href="/kategori/{{$kategori->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin Menghapus')">Hapus</a>
							@else
									<td><a href="#" class="btn btn-warning btn-sm" disabled>Edit</a>
							<a href="#" class="btn btn-danger btn-sm" disabled>Hapus</a>
						@endif</td>

							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection



