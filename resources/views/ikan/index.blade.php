
@extends('layouts.master')
@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@stop

@section('content')
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
       <!--  <form class="navbar-form navbar-left">
          <div class="input-group" methot="GET" action="ikan">
            <select id="kategori_id"ype="text" class="form-control" name="kategori_id">
                            <?php
                            $query = DB::table('kategori')
                             ->get();
                            ?>
                            @foreach($query as $dat)
                            <option value="{{$dat->id}}"->{{$dat->nama_kategori}}</option>
                            @endforeach
                        </select>
            <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
          </div>
        </form> -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Data Ikan</h3>
				
						
						</div>
								<div class="panel-body">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>Id Ikan</th>
												<th>Nama Peserta</th>
												<th>Nama Kategori</th>
												<th>Aksi</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach($data_ikan as $ikan)
											<tr>
												<td>{{$ikan->id}}</td>
												<td>{{$ikan->peserta->nama_peserta}}</td>
												<td>{{$ikan->kategori->nama_kategori}}</td>
											<td>@if(Auth::user()->level=='juri')
										<!-- 		<button data-toggle="modal"  data-target="#exampleModal" class="btn btn-primary btn-sm">Nilai Ikan</button> -->
							<!-- 		@php
									$nilai = DB::table('nilai')->where('ikan_id','=',$ikan->id)->get();
									@endphp
									@foreach($nilai as $nilai)
										@if($ikan->id!=$nilai->ikan_id)
								
								<a href="/nilai/{{$ikan->id}}/nilai" class="btn btn-primary btn-sm">Nilai</a>
				
												@elseif($ikan->id==$nilai->ikan_id)
												<a class="btn btn-primary btn-sm" disabled>Nilai</a>
										
												@endif
												@endforeach -->
												<a href="/nilai/{{$ikan->id}}/nilai" class="btn btn-primary btn-sm">Nilai</a>
														@endif
												 @if(Auth::user()->level == 'panitia')
												<a href="/ikan/{{$ikan->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
												<a href="/ikan/{{$ikan->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin Menghapus')">Hapus</a></td>
												@endif
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
					    <select id="ikan_id" type="text" class="form-control" name="ikan_id">
                                        <?php
                                        $query = DB::table('ikan')
                                         ->get();
                                        ?>
                                        @foreach($query as $dat)
                                        <option value="{{$dat->id}}"->{{$dat->id}}</option>
                                        @endforeach
                                    </select>
					  </div>
					  
					  <div class="form-group">
					    <label for="exampleInputEmail1">Warna</label>
					    <input name="warna" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
					 <div class="form-group">
					    <label for="exampleInputEmail1">Gerak</label>
					    <input name="gerak" class="form-control" id="exampleInputEmail1" rows="2" value="5"></input>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Sirip</label>
					    <input name="sirip" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Dasi</label>
					    <input name="dasi" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Ekor</label>
					    <input name="ekor" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Cacat</label>
					    <input name="cacat" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="5">
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

