
@extends('layouts.master')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
				<form action="/nilai/create" method="POST" enctype="multipart/form-data">
				

        {{ csrf_field() }}
        {{ method_field('put') }}

        			  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					    <label for="exampleInputEmail1">ID Ikan</label>
					    <input name="ikan_id" type="number" value="{{$nilai->id}}" readonly=""class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					         @if ($errors->has('ikan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ikan_id') }}</strong>
                                    </span>
                                @endif
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
 
    <button type="submit" class="btn btn-primary" id="submit">
                                    Tambah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('ikan.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection
