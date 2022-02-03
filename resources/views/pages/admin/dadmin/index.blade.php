@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Data Admin</h1>
            
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
  <div class="modal fade" id="modaladmin" tabindex="-1" aria-labelledby="modaladminLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaladminLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{url('dadmin/store')}}" method="post" >
        {{-- {{ crsf_field() }} --}}
        @csrf
            <div class="modal-body">
                <div class="form-group">
                <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_admin" class="form-control" id="kode_admin" aria-describedby="kode_admin" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="70%" colspan="4"><input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" required></td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>NTA</label></td>
                              <td width="70%"><input type="text" name="nta" class="form-control" id="nta" aria-describedby="nta" required></td>
                            </tr>
                            <td width="30%"><label>Tempat Lahir</label></td>
                              <td width="70%"><input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" required></td>
                            </tr>
                            <tr>
                            <td width="30%"><label>Tanggal Lahir</label></td>
                              <td width="70%"><input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" required></td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Alamat</label></td>
                              <td width="70%" colspan="4"><textarea class="form-control" id="message-text" required></textarea></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jenis Kelamin</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="1">Laki-laki</option>
                                  <option value="2">Perempuan</option>
                                  <option value="3">Laninya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>No Telp</label></td>
                              <td width="70%" colspan="4"><input type="text" name="tlp" class="form-control" id="tlp" aria-describedby="tlp" required></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="3">Kamabigus</option>
                                  <option value="1">Pembina Utama</option>
                                  <option value="2">Pelatih Lapangan</option>
                                  <option value="3">Sekretaris</option>
                                  <option value="3">Bendahara</option>
                                  <option value="3">Operator</option>
                                  <option value="3">Anggota</option>
                                  <option value="3">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="20%"><label>Golongan</label></td>
                              <td width="80%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="3">Pembina</option>
                                  <option value="1">Pembantu Pembina</option>
                                  <option value="2">Penggalang Ramu</option>
                                  <option value="2">Penggalang Rakit</option>
                                  <option value="2">Penggalang Terap</option>
                                  <option value="2">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="20%"><label>Foto</label></td>
                              <td width="80%" colspan="4">
                              <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>
                            </tr>
                            <tr>
                            <td width="30%"><label>Pangkalan</label></td>
                            <td width="70%"><input type="text" name="pangkalan" class="form-control" id="pangkalan" aria-describedby="pangkalan" value="SMPN 43 Semarang" readonly></td>
                            </tr>

                      </table>
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
  <div class="modal fade" id="editadmin" tabindex="-1" aria-labelledby="editadminLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editadminLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            <form id="editForm" action="" method="post" >
              @csrf
              <input type="hidden" name="_method" value="PATCH">
                <div class="modal-body">
                    <div class="form-group">
                    <table border="0">
                            <tr>
                            <td width="30%"><label>Kode</label></td>
                            <td width="70%"><input type="text" name="kode_admin" class="form-control" id="kode_admin" aria-describedby="kode_admin" readonly></td>
                            </tr>
                            <tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="70%" colspan="4"><input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" required></td> 
                            </tr>
                            <tr>
                            <td width="30%"><label>NTA</label></td>
                              <td width="70%"><input type="text" name="nta" class="form-control" id="nta" aria-describedby="nta" required></td>
                            </tr>
                            <td width="30%"><label>Tempat Lahir</label></td>
                              <td width="70%"><input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" required></td>
                            </tr>
                            <tr>
                            <td width="30%"><label>Tanggal Lahir</label></td>
                              <td width="70%"><input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" required></td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Alamat</label></td>
                              <td width="70%" colspan="4"><textarea class="form-control" id="message-text" required></textarea></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jenis Kelamin</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="1">Laki-laki</option>
                                  <option value="2">Perempuan</option>
                                  <option value="3">Laninya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>No Telp</label></td>
                              <td width="70%" colspan="4"><input type="text" name="tlp" class="form-control" id="tlp" aria-describedby="tlp" required></td> 
                            </tr>
                            <tr>
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="70%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="3">Kamabigus</option>
                                  <option value="1">Pembina Utama</option>
                                  <option value="2">Pelatih Lapangan</option>
                                  <option value="3">Sekretaris</option>
                                  <option value="3">Bendahara</option>
                                  <option value="3">Operator</option>
                                  <option value="3">Anggota</option>
                                  <option value="3">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="20%"><label>Golongan</label></td>
                              <td width="80%" colspan="4">
                                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                  <option selected>Pilih...</option>
                                  <option value="3">Pembina</option>
                                  <option value="1">Pembantu Pembina</option>
                                  <option value="2">Penggalang Ramu</option>
                                  <option value="2">Penggalang Rakit</option>
                                  <option value="2">Penggalang Terap</option>
                                  <option value="2">Lainnya</option>
                                </select>
                                </div>  
                              </td> 
                            </tr>
                            <tr>
                              <td width="20%"><label>Foto</label></td>
                              <td width="80%" colspan="4">
                              <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                              </div>
                            </tr>
                            <tr>
                            <td width="30%"><label>Pangkalan</label></td>
                            <td width="70%"><input type="text" name="pangkalan" class="form-control" id="pangkalan" aria-describedby="pangkalan" value="SMPN 43 Semarang" readonly></td>
                            </tr>

                      </table>
                    </div>
                </div>
            <div class="modal-footer">
              <button align="right" type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
      </div>
      </div>
    </div>
  </div>

   <!-- Modal View -->
   <div class="modal fade" id="viewadmin" tabindex="-1" aria-labelledby="viewadminLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewadminLabel">Data Admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <table border="0">
                          @foreach ($datas as $value)
                            <tr>
                              <td width="30%"><label>Kode</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->kode_admin}}</td>
                              <td width="7%" rowspan="5"></td>
                              <td width=>Foto</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>NTA</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->nta}}</td>
                              <td width="20%" rowspan="3"><img src="assets/images/latihanrutin.jpeg" alt="First One" width="100%"></img></td>
                              
                            </tr>
                            <tr>
                              <td width="30%"><label>Nama</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->nama_admin}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Tempat Lahir</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->tempat_lahir}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Tanggal Lahir</label></td>
                              <td width="2%">:</td>
                              <td width="30%">{{$value->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Alamat</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->alamat}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Jenis Kelamin</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->jenis_kelamin}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Agama</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->agama}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Jabatan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->jabatan}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Golongan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->golongan}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>No Telp</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->tlp}}</td>
                            </tr>
                            <tr>
                              <td width="30%"><label>Pangkalan</label></td>
                              <td width="2%">:</td>
                              <td width="30%" colspan="3">{{$value->pangkalan}}</td>
                            </tr>

                      </table>
                          @endforeach

                        </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">OK</span>
                  </button> 
                  
                </div>
                </form>
              </div>
              </div>
            </div>
          </div>

<div class="d-flex justify-content-between">
  <div width="70%">
    <button class="btn btn-info" data-toggle="modal" data-target="#modaladmin">Tambah</button>
  </div>
    <form action="{{url('dadmin')}}" method="GET" class="form-inline my-2 my-lg-0">
        <div width="22%"> <input class="form-control mr-sm-2 ml-2" type="text" name="keyword" value="{{ $keyword }}">  </div>
        <div width="8%"> <button class="btn btn-outline-success my-1 my-sm-0 ml-4" type="submit">Cari</button></div>
    </form>
</div>


    <table class="table table-bordered table-responsive table-hover mt-2" width="50%">
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
                <td>{{$value->kode_admin}}</td>
                <td>{{$value->nama_admin}}</td>
                <td>{{$value->foto}}</td>
                <td align="right"><button class="btn btn-info" data-toggle="modal" data-target="#viewadmin">Lihat</button></td>
                <td align="right"><button class="btn btn-success" data-id="{{$value->id}}" data-kode="{{$value->kode_admin}}" data-foto="{{$value->foto}}" data-toggle="modal" data-target="#editadmin">Edit</button></td>
                
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
    $('#editadmin').on('show.bs.modal', function (event) {
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

    $('#modaladmin').on('show.bs.modal', function (event) {
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