@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

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

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
<form method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori ..">

        @if($errors->has('nama_kategori'))
            <div class="text-danger">
                {{ $errors->first('nama_kategori')}}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control" placeholder="Lokasi ..">

        @if($errors->has('lokasi'))
            <div class="text-danger">
                {{ $errors->first('lokasi')}}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi .."></textarea> 

        @if($errors->has('deskripsi'))
            <div class="text-danger">
                {{ $errors->first('deskripsi')}}
            </div>
        @endif
    </div>
    

    <div class="form-group">
        <label >Cover</label>
            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
            <img class="product" width="200" height="200" />
    </div>


    <button type="submit" class="btn btn-primary" id="submit">
                                    Tambah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('kategori.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection
