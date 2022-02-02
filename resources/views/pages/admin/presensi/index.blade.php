@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">semester</h1>
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
  <div class="modal fade" id="modalsemester" tabindex="-1" aria-labelledby="modalsemesterLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalsemesterLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{url('semester/store')}}" method="post" >
        {{-- {{ crsf_field() }} --}}
        @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode_s" class="form-control" id="kode_s" aria-describedby="kode_s" readonly>
                  </div>
                <div class="form-group">
                  <label>Rombel</label>
                  <input type="text" name="smtr" class="form-control" id="smtr" aria-describedby="smtr">
                  <small id="smtr" class="form-text text-muted">Isikan dengan angka romawi</small>
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
  <div class="modal fade" id="editsemester" tabindex="-1" aria-labelledby="editsemesterLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editsemesterLabel">Edit Data</h5>
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
                    <input type="text" name="kode_s" class="form-control" id="e_kode_s" aria-describedby="kode_s">
                  </div>
                <div class="form-group">
                  <label>Rombel</label>
                  <input type="text" name="smtr" class="form-control" id="e_smtr" aria-describedby="smtr">
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
    <button class="btn btn-info" data-toggle="modal" data-target="#modalsemester">Tambah</button>
  </div>
    <form action="{{url('semester')}}" method="GET" class="form-inline my-2 my-lg-0">
      {{-- <tr>
        <td width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </td>
        <td width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></td>
      </tr> --}}
        <div width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </div>
        <div width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></div>
    </form>
</div>
{{-- </table> --}}
    
    <table class="table table-bordered table-responsive table-hover mt-2" width="80%">
        <thead class="table-dark">
        <tr align="center" >
            <th width="5%">NO</th>
            <th width="45%">KODE</th>
            <th width="40%">ROMBEL</th>
            <th colspan="3" width="10%">AKSI</th>
        </tr>
        </thead>
        <?php $i=1 ?>
        @foreach ($datas as $value)
            <tr>
                <td align="center" >{{$i++}}</td>
                <td>{{$value->kode_s}}</td>
                <td>{{$value->smtr}}</td>
                <td align="right"><a class="btn btn-primary" href="{{url('show')}}">Lihat</a></td>
                <td align="right"><button class="btn btn-success" data-id="{{$value->id}}" data-kode="{{$value->kode_s}}" data-smtr="{{$value->smtr}}" data-toggle="modal" data-target="#editsemester">Edit</button></td>
                {{-- <td align="right"><a class="btn btn-success" href="{{url('semester/'.$value->id.'/edit')}}">Edit</a></td> --}}
                <td>
                    <form action="{{url('semester/'.$value->id)}}" method="POST">
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
    $('#editsemester').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      let res = null;
      fetch("{{url('api/next-semester')}}").then(res => {
        return res.text();
      }).then(data => {
        $("#kode_s").val(data);
      })

      var id = button.data('id')
      var kode = button.data('kode')
      var semester = button.data('smtr')
      var url = "{{url('semester')}}/" + id;

      $("#e_kode_s").val(kode)
      $("#e_smtr").val(semester)
      $("#editForm").attr("action", url)
    })

    $('#modalsemester').on('show.bs.modal', function (event) {
      fetch("{{url('api/next-semester')}}").then(res => {
        
        console.log(res);
        return res.text();
      }).then(data => {
        $("#kode_s").val(data);
        console.log(data);
      })
      
    })
  </script> 
@endsection