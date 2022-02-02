@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Jabatan</h1>
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

<!--Modal create-->
<div class="modal fade" id="modaljabatan" tabindex="-1" aria-labelledby="jabatanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="jabatanLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{url('jabatan/store')}}" method="post" >
        {{-- {{ crsf_field() }} --}}
        @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode_j" class="form-control" id="kode_j" aria-describedby="kode_j" >
                  </div>
                <div class="form-group">
                  <label>Jenis Jabatan</label>
                  <input type="text" name="jenis_jabatan" class="form-control" id="jenis_jabatan" aria-describedby="jenis_jabatan">
                  <small id="jenis_jabatan" class="form-text text-muted"></small>
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

  <!--modal edit-->
  <div class="modal fade" id="editjabatan" tabindex="-1" aria-labelledby="editjabatanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editjabatanLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form id="editFormjabatan" action="" method="post" >
          @csrf
          <input type="hidden" name="_method" value="PATCH">
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode_j" class="form-control" id="e_kode_j" aria-describedby="kode_j">
                  </div>
                <div class="form-group">
                  <label>Jenis Jabatan</label>
                  <input type="text" name="jenis_jabatan" class="form-control" id="e_jenis_jabatan" aria-describedby="jenis_jabatan">
                  <small class="form-text text-muted"></small>
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
        <button class="btn btn-info" data-toggle="modal" data-target="#modaljabatan">Tambah</button>
    </div>
    <form action="{{url('jabatan')}}" method="GET" class="form-inline my-2 my-lg-0">
    {{-- <tr>
        <td width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </td>
        <td width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></td>
    </tr> --}}
        <div width="22%">
            <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">
        </div>
        <div>
            <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button>
        </div>
    </form>
    </div>

{{-- </table> --}}
    
    <table class="table table-bordered table-hover mt-2" width="80%">
        <thead class="table-dark">
        <tr align="center">
            <th width="5%">NO</th>
            <th width="45%">KODE</th>
            <th width="40%">JENIS JABATAN</th>
            <th colspan="3" width="10%">AKSI</th>
        </tr>
        </thead>
        <?php $i=1 ?>
        @foreach ($datas as $value)
            <tr>
                <td align="center" >{{$i++}}</td>
                <td>{{$value->kode_j}}</td>
                <td>{{$value->jenis_jabatan}}</td>
                <td align="right"><a class="btn btn-primary" href="{{url('show')}}">Lihat</a></td>
                <td align="right"><button class="btn btn-success" data-id="{{$value->id}}" data-kode="{{$value->kode_j}}" data-jenis_jabatan="{{$value->jenis_jabatan}}" data-toggle="modal" data-target="#editjabatan">Edit</button></td>
                {{-- <td align="right"><a class="btn btn-success" href="{{url('jabatan/'.$value->id.'/edit')}}">Edit</a></td> --}}
                <td>
                    <form action="{{url('jabatan/'.$value->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            
        @endforeach
    </table>
</div>
    </div>
</div>
    {{ $datas->links() }}

@endsection

@section('script')
<script>
    $('#editjabatan').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget)
        let res = null;
        fetch("{{url('api/next-jabatan')}}").then(res => {
            return res.text();
        }).then(data => {
            $("#kode_j").val(data);
        })

        var id = button.data('id')
        var kode = button.data('kode')
        var jabatan = button.data('jenis_jabatan')
        var url = "{{('jabatan')}}" + id;

        $("#e_kode_j").val(kode)
        $("#e_jenis_jabatan").val(jabatan)
        $("#editFormJabatan").attr("action", url)
    })

    $('#modaljabatan').on('show.bs.modal', function (event){
        fetch("{{url('api/next-jabatan')}}").then(res => {
            return res.text();
        }).then(data => {
            $('#kode_j').val(data);
        })
    })
</script>