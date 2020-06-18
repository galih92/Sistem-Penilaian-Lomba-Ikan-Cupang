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
				<div class="col-md-12">

					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Kategori</h3>	
						</div>

			<div class="panel-body">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Nama Peserta</th>
					<th>Telpon</th>
					<th>Alamat</th>
					<th>Aksi</th>
					
				</tr>
				</thead>
				<tbody>
				@foreach($data_peserta as $peserta)
				<tr>
					<td>{{$peserta->nama_peserta}}</td>
					<td>{{$peserta->tlfn}}</td>
					<td>{{$peserta->alamat}}</td>
					<td></td>
				
					<td></td>
					
				</tr>
				@endforeach
				</tbody>
			</table>
					</div>
				</div>

@endsection


