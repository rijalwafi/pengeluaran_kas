@extends('app.master')

@section('konten')

<div class="content-body">

  <div class="row page-titles mx-0 mt-2">

    <h3 class="col p-md-0">Suplier</h3>

    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Suplier</a></li>
      </ol>
    </div>

  </div>

  <div class="container-fluid">

    <div class="card">

      <div class="card-header pt-4">
      @if(Auth::user()->level == "finance")
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus"></i> &nbsp TAMBAH SUPLIER
        </button>
        @endif
        <h4>Data Suplier</h4>

      </div>
      <div class="card-body pt-0">

        <!-- Modal -->
        <form action="{{ route('suplier.add') }}" method="post">
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Suplier</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  @csrf
                  <div class="form-group">
                    <label>Nama Suplier</label>
                    <input type="text" name="nama" required="required" class="form-control" placeholder="ex : PT MAJU LANCAR">
                  </div>
                  <div class="form-group">
                    <label>Alamat </label>
                    <input type="text" name="alamat" required="required" class="form-control" placeholder="ex :jl. anugrah no 11  bekasi">
                  </div>
                  <div class="form-group">
                    <label>E-Mail </label>
                    <input type="email" name="email" required="required" class="form-control" placeholder="ex : antono@gmail.com">
                  </div>
                  <div class="form-group">
                    <label>No Telp</label>
                    <input type="number" name="no_hp" required="required" class="form-control" placeholder="ex : 021121212">
                  </div>
                  <div class="form-group">
                    <label>No Rekening</label>
                    <input type="number" name="no_rekening" required="required" class="form-control" placeholder="ex : 8387473829">
                  </div>
                  </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </form>


        <div class="table-responsive">


          <table class="table table-bordered" id="table-datatable">
            <thead>
              <tr>
                <th width="1%">NO</th>
                <th>nama suplier</th>
                <th>alamat</th>
                <th>email</th>
                {{-- <th>no hp</th>
                <th>no rekening</th> --}}
                <th class="text-center" width="10%">OPSI</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach($suplier as $k)
              <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $k->nama_suplier }}</td>
                <td>{{ $k->alamat_suplier }}</td>
                <td>{{ $k->email }}</td>
                {{-- <td>{{ $k->no_hp }}</td>
                <td>{{ $k->no_rekening }}</td> --}}
                <td>    

                 
                  <div class="text-center">
                  @if(Auth::user()->level == "finance")
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#edit_suplier_{{ $k->id_suplier }}">
                      <i class="fa fa-cog"></i>
                    </button>
                    @endif
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_suplier_{{ $k->id_suplier }}">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                 
                  <form action="{{ route('suplier.update',['id' => $k->id_suplier]) }}" method="post">
                    <div class="modal fade" id="edit_suplier_{{$k->id_suplier}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $k->id_suplier }}">
                                <label>Nama Suplier</label>
                                <input type="text" name="nama" required="required" class="form-control" value="{{ $k->nama_suplier }}" style="width:100%">
                            </div>
                            <div class="form-group">
                                <label>Alamat </label>
                              <input type="text" name="alamat" required="required" class="form-control" placeholder="Nama Kategori .." value="{{ $k->alamat_suplier }}" style="width:100%">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                              <input type="email" name="email" required="required" class="form-control" placeholder="Nama Kategori .." value="{{ $k->email }}" style="width:100%">
                            </div>
                            <div class="form-group" >
                                <label>No Handphone/Telp</label>
                              <input type="text" name="no_hp" required="required" class="form-control"  value="{{ $k->no_hp }}" style="width:100%">
                            </div>

                            <div class="form-group">
                                <label>No Rekening</label>
                              <input type="text" name="no_rekening" required="required" class="form-control" placeholder="Nama Kategori .." value="{{ $k->no_rekening }}" style="width:100%">
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Simpan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <!-- modal hapus -->
                  <form method="POST" action="{{ route('suplier.delete',['id' => $k->id_suplier]) }}">
                    <div class="modal fade" id="hapus_suplier_{{$k->id_suplier}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <p>Yakin ingin menghapus data Suplier <b> {{$k->nama_suplier}}</b> ?</p>

                            @csrf
                            {{ method_field('DELETE') }}


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Ya, Hapus</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>


                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>





  </div>
  <!-- #/ container -->
</div>

@endsection