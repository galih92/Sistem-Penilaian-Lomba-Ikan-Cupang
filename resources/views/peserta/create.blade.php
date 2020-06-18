@extends('layouts.master')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
<form method="POST" action="{{ route('peserta.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

					    <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="nama_peserta" class="form-control" placeholder="Nama Peserta ..">
                            @if($errors->has('nama_peserta'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_peserta')}}
                                </div>
                            @endif
                        </div>

					  <div class="form-group">
					    <label>No Telfon</label>
					    <input name="tlfn" type="number" class="form-control" placeholder="No Telfon">
					    @if($errors->has('tlfn'))
                                <div class="text-danger">
                                    {{ $errors->first('tfln')}}
                                </div>
                            @endif
					  </div>

					 <div class="form-group">
					    <label>Alamat</label>
					    <textarea name="alamat" class="form-control"  rows="2"></textarea>
					     @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
					  </div>
					  </div>

				<button type="submit" class="btn btn-primary" id="submit">Register</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="{{route('peserta.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection