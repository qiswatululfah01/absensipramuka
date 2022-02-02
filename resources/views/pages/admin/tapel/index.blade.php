@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Tahun ajaran</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<div class="row container bg-white md-5">

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>            
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('success'))
<p class="alert alert-success">{{ Session::get('success')}}</p><br/>
@endif

  <!-- Modal Create -->
  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{url('kelas/store')}}" method="post" >
        {{-- {{ crsf_field() }} --}}
        @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode_k" class="form-control" id="kode_k" aria-describedby="kode_k" readonly>
                  </div>
                <div class="form-group">
                  <label>Rombel</label>
                  <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" aria-describedby="nama_kelas">
                  <small id="nama_kelas" class="form-text text-muted">Isikan dengan angka romawi</small>
                </div>
        </div>

        <div class="modal-footer">
          <button align="right" type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form id="editForm" action="" method="post" >
          @csrf
          <input type="hidden" name="_method" value="PATCH">
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode_k" class="form-control" id="e_kode_k" aria-describedby="kode_k">
                  </div>
                <div class="form-group">
                  <label>Rombel</label>
                  <input type="text" name="nama_kelas" class="form-control" id="e_nama_kelas" aria-describedby="nama_kelas">
                  <small class="form-text text-muted">Isikan dengan angka romawi</small>
                </div>
        </div>
        <div class="modal-footer">
          <button align="right" type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>


  {{-- <table class="mt-5" border="0" width="100%" > --}}
<div class="d-flex justify-content-between">
  <div width="70%">
    <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah</button>
  </div>
    <form action="{{url('tapel')}}" method="GET" class="form-inline my-2 my-lg-0">
      {{-- <tr>
        <td width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </td>
        <td width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Search</button></td>
      </tr> --}}
        <div width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </div>
        <div width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Search</button></div>
    </form>
</div>
{{-- </table> --}}


<!--   
{{-- <table class="mt-5" border="0" width="100%" > --}}
<form action="{{url('tapel')}}" method="GET" class="form-inline my-2 my-lg-0">
<tr>
    <td width="70%"> <a class="btn btn-info" href="{{url('tapel/create')}}" method="POST">Tambah</a></td>
    <td width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </td>
    <td width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Search</button></td>
</tr>
</form> -->
</table>
    
    <table class="table table-bordered table-hover mt-2"  width="80%">
        <thead class="table-dark">
            <tr align="center">
                <th width="5%">NO</th>
                <th width="45%">KODE</th>
                <th width="40%">TAHUN AJARAN</th>
                <th colspan="3" width="10%">AKSI</th>
            </tr>

        </thead>
        
        <?php $i=1 ?>
        @foreach ($datas as $value)
            <tr>
                <td align="center" >{{$i++}}</td>
                <td>{{$value->kode_tp}}</td>
                <td>{{$value->tp}}</td>
                <td align="right"><a class="btn btn-primary" href="{{url('show')}}">Show</a></td>
                <td align="right"><a class="btn btn-success" href="{{url('tapel/'.$value->id.'/edit')}}">Edit</a></td>
                <td>
                    <form action="{{url('tapel/'.$value->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            
        @endforeach
    </table>

</div>

</div>
    {{ $datas->links() }}

@endsection