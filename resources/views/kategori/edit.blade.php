@section('js')
    <script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
    </script>
@stop

@extends('layouts.master')

@section('content')

			<h1>Edit Data Kategori</h1>

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
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
			          
					<div class="form-group">
					    <label for="exampleInputEmail1">Nama Kategori</label>
					    <input name="nama_kategori" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kategori" value="{{$kategori->nama_kategori}}">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Lokasi</label>
					    <input name="lokasi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="lokasi" value="{{$kategori->lokasi}}">
					  </div>

					<div class="form-group">
					    <label for="exampleInputEmail1">Deskripsi</label>
					    <textarea name="deskripsi" class="form-control" id="exampleInputEmail1" rows="2" >{{$kategori->deskripsi}}</textarea>
					</div>

				  	<div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <input type="file" class="uploads form-control" style="margin-top: 20px; width: 50%;" name="cover">
                         <img class="product" width="200" height="200" @if($kategori->cover) src="{{ asset('images/kategori/'.$kategori->cover) }}" @endif />
                    </div>

					 <button type="submit" class="btn btn-primar btn-warning">Simpan</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
@endsection
