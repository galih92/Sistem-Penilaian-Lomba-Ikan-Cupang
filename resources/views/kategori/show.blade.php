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

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <h4 class="card-title">Detail <b>{{$kategori->nama_kategori}}</b></h4>

                      <div class="form-group">
                 
                                <img width="200" height="200" @if($kategori->cover) src="{{ asset('images/kategori/'.$kategori->cover) }}" @endif />
                       
                        </div>
              
                      <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input class="form-control" value="{{$kategori->id}}" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama </label>
                        <input class="form-control" value="{{$kategori->nama_kategori}}" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Lokasi</label>
                        <input class="form-control" value="{{$kategori->lokasi}}" readonly="">
                      </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <textarea class="form-control" readonly="" >{{$kategori->deskripsi}}</textarea>
                      </div>

                     <button  href="{{route('peserta.index')}}" class="btn btn-primar btn-warning">Back</button>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
@endsection
