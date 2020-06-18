@extends('layouts.master')

@section('content')

<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<form action="/nilai/{{$nilai->id}}/update" method="POST">
			        	{{csrf_field()}}
			         

					  <div class="form-group">
					    <label for="exampleInputEmail1">ID Ikan</label>
					    <input name="id_ikan" type="number" value="{{$nilai->ikan_id}}" readonly=""class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
					  </div>

					 <div class="form-group">
					    <label for="exampleInputEmail1">Warna</label>
					    <input name="warna" type="number" value="{{$nilai->warna}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nilai...">
					  </div>
					 <div class="form-group">
					    <label for="exampleInputEmail1">Gerak</label>
					    <input name="gerak" class="form-control"value="{{$nilai->gerak}}" id="exampleInputEmail1" rows="2" aria-describedby="emailHelp" placeholder="nilai..."></input>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Sirip</label>
					    <input name="sirip" type="number" class="form-control"value="{{$nilai->sirip}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nilai...">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Dasi</label>
					    <input name="dasi" type="number" class="form-control" value="{{$nilai->dasi}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nilai...">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Ekor</label>
					    <input name="ekor" type="number" class="form-control" value="{{$nilai->ekor}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nilai...">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Cacat</label>
					    <input name="cacat" type="number" class="form-control" value="{{$nilai->cacat}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nilai...">
					  </div>
					 <button type="submit" class="btn btn-primar btn-warning">Simpan</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
@endsection
