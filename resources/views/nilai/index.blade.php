@extends('layouts.master')

<script>
	$(document).ready(function(){
		$('#datatable').Datatable();
	}); 
</script>

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
						 @if(Auth::user()->level == 'juri')
						<button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal" >
						Tambah Penialian
						</button>
						@endif
					</div>

					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Penilaian</h3>	
						</div>
								<div class="panel-body">
			
			<table class="table table-striped table-bordered" id="datatable">
										<thead>
											<tr>
												<th>Id Ikan</th>
												<th>Warna </th>
												<th>gerak</th>
												<th>Sirip</th> 
												<th>Dasi</th>
												<th>Ekor</th>
												<th>Cacat</th>
												<th>Total Nilai</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>							
											@foreach($data_nilai as $ikan)
											<tr>
								<?php
	                            $tnilai = 0;
	                            $warna = $ikan->warna;
	                            $gerak = $ikan->gerak;
	                            $sirip = $ikan->sirip;
	                            $dasi = $ikan->dasi;
	                            $ekor = $ikan->ekor;
	                            $cacat = $ikan->cacat;
	                            $tnilai = ($gerak+$warna+$sirip+$dasi+$ekor-$cacat);
	                            ?>

												<td>{{$ikan->ikan_id}}</td>
												<td>{{$ikan->warna}}</td>
												<td>{{$ikan->gerak}}</td>
												<td>{{$ikan->sirip}}</td>
												<td>{{$ikan->dasi}}</td>
												<td>{{$ikan->ekor}}</td>
												<td>{{$ikan->cacat}}</td>
												<td>{{$tnilai}}</td>
											<td>
												@if(Auth::user()->level == 'juri')
												<a href="/nilai/{{$ikan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
												<a href="/nilai/{{$ikan->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin Menghapus')">Hapus</a>
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

<!-- Modal Nilai ikan -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Nilai</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form action="/nilai/create" method="POST">
			        	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">ID Ikan</label>
					    <input  name="ikan_id" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan ID Ikan">
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Warna</label>
					    <input name="warna" only type="number"min="1" max="5"  onkeydown="return false" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
					 <div class="form-group">
					    <label for="exampleInputEmail1">Gerak</label>
					    <input name="gerak" only type="number"min="1" max="5"  onkeydown="return false" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Sirip</label>
					    <input name="sirip" only type="number"min="1" max="5"  onkeydown="return false" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Dasi</label>
					    <input name="dasi" only type="number"min="1" max="5"  onkeydown="return false" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Ekor</label>
					    <input name="ekor" only type="number"min="1" max="5"  onkeydown="return false" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Cacat</label>
					    <input name="cacat" only type="number"min="1" max="5"  onkeydown="return false" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
 
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
					</form>
			      </div>
			    </div>
			  </div>

@endsection



