@extends('layouts.master')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <h4 class="card-title">Detail <b>{{$peserta->nama_peserta}}</b></h4>
              
                      <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input class="form-control" value="{{$peserta->id}}" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Peserta</label>
                        <input class="form-control" value="{{$peserta->nama_peserta}}" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Telfon</label>
                        <input class="form-control" value="{{$peserta->tlfn}}" readonly="">
                      </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea class="form-control"rows="2" readonly="" >{{$peserta->alamat}}</textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Ikan</label>
                        <textarea class="form-control"  readonly="" rows="2" value="{{$peserta->id}}"->{{$peserta->ikan->count()}}</textarea>
                      </div>

                      <div class="container-fluid">
                        <div class="card mt-5">
                          <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th width="1%"> No</th>
                                  <th width="45%">ID Ikan</th>
                                  <th width="50%">Nama Kategori</th>
                                </tr>
                              </thead>
                              <tbody>

                            <?php $no=0;?>
                                  @foreach($peserta->ikan as $ps)
                            <?php $no++ ;?>

                                <tr>
                                  <td>{{$no}}</td>
                                  <td>{{$ps->id}}</td>
                                  <td>{{$ps->kategori->nama_kategori}}</td>
                                </tr>

                                @endforeach
                   
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                     <a  href="/peserta" class="btn btn-primar btn-warning">Back</a>

                    </form>
                    </div>
                    </div>
                </div>
            </div>
@endsection
