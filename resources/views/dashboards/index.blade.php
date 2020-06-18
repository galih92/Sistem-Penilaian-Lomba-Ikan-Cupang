@extends('layouts.master')

@section('content')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
						
					<div class="panel"></div>	
					<div class="panel-body">
						<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="lnr lnr-user"></i></span>
										<p>
											<span class="number">{{$data_peserta->count()}}</span>
											<span class="title">Peserta</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">{{$data_ikan->count()}}</span>
											<span class="title">Ikan</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">{{$data_user->count()}}</span>
											<span class="title">Panitia</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">{{$data_kategori->count()}}</span>
											<span class="title">Kategori</span>
										</p>
									</div>
								</div>
							</div>
						</div>
						</div>


					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Peserta</h3>	
						</div>
			<div class="panel-body">
			<table class="table table-striped table-bordered" style="width:100%" id="table_id">
				<thead>
				<tr>
					<th>No</th>
					<th>Nama Peserta</th>
					<th>Telpon</th>
					<th>Alamat</th>
		
				</tr>
				</thead>
				<tbody>

					<?php $no = 0;?>  
				@foreach($data_peserta as $peserta)
					<?php $no++ ;?>
				<tr>
					<td>{{$no}}</td>
				<td> <a href="{{route('peserta.show', $peserta->id)}}"> 
						{{$peserta->nama_peserta}}</td>
					<td>{{$peserta->tlfn}}</td>
					<td>{{$peserta->alamat}}</td>

				</tr>
				@endforeach
				</tbody>
			</table>
					</div>
				</div>
					
				</div>
			</div>
		</div>


			
@endsection


<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
