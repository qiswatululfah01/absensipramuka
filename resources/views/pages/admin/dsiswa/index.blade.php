@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">Data Siswa</h1>
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
          <div class="modal fade" id="modalsiswa" tabindex="-1" aria-labelledby="modalsiswaLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalsiswaLabel">Tambah Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="{{url('dsiswa/store')}}" method="post" >
                {{-- {{ crsf_field() }} --}}
                @csrf
                    <div class="modal-body">
                    <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="kode_siswa" class="form-control" id="e_kode_siswa" aria-describedby="kode_siswa">
                          </div>
                          <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                        </div>
                          <p class="form-group"> Foto </p>
                        <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                          <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
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
          <div class="modal fade" id="editsiswa" tabindex="-1" aria-labelledby="editsiswaLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editsiswaLabel">Edit Data</h5>
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
                            <input type="text" name="kode_siswa" class="form-control" id="e_kode_siswa" aria-describedby="kode_siswa">
                          </div>
                          <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                        </div>
                          <p class="form-group"> Foto </p>
                        <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                          <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
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

          <!-- Modal View -->
          <div class="modal fade" id="viewsiswa" tabindex="-1" aria-labelledby="viewsiswaLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewsiswaLabel">Tambah Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <div class="modal-body">
                    <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="kode_siswa" class="form-control" id="e_kode_siswa" aria-describedby="kode_siswa">
                          </div>
                          <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama">
                        </div>
                          <p class="form-group"> Foto </p>
                        <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                          <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                </div>

                <div class="modal-footer">
                  <button align="right" class="btn btn-primary">OK</button>
                </div>
                </form>
              </div>
              </div>
            </div>
          </div>

        <div class="d-flex justify-content-between">
          <div width="70%">
            <button class="btn btn-info" data-toggle="modal" data-target="#modalsiswa">Tambah</button>
          </div>
            <form action="{{url('dsiswa')}}" method="GET" class="form-inline my-2 my-lg-0">
            
                <div width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </div>
                <div width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></div>
            </form>
        </div>
        
            <table class="table table-bordered table-responsive table-hover mt-2" width="80%">
                <thead class="table-dark">
                <tr align="center" >
                    <th width="5%">NO</th>
                    <th width="15%">KODE</th>
                    <th width="45%">NAMA</th>
                    <th width="40%">FOTO</th>
                    <th colspan="3" width="10%">AKSI</th>
                </tr>
                </thead>
                <?php $i=1 ?>
                @foreach ($datas as $value)
                <tr>
                        <td align="center" >{{$i++}}</td>
                        <td>{{$value->kode_siswa}}</td>
                        <td>{{$value->nama_siswa}}</td>
                        <td>{{$value->foto}}</td>
                        <td align="right"> <button class="btn btn-info" data-toggle="modal" data-target="#viewsiswa">Lihat</button></td>
                        <td align="right"><button class="btn btn-success" data-id="{{$value->id}}" data-kode="{{$value->kode_siswa}}" data-nama="{{$value->nama_siswa}}" data-foto="{{$value->foto}}" data-toggle="modal" data-target="#editsiswa">Edit</button></td>
                        
                        <td>
                            <form action="{{url('dadmin/'.$value->id)}}" method="POST">
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
    $('#editsiswa').on('show.bs.modal', function (event) {
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