@extends('app.master')

@section('konten')

<div class="content-body">

  <div class="row page-titles mx-0 mt-2">

    <h3 class="col p-md-0">Barang</h3>

    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Barang</a></li>
      </ol>
    </div>

  </div>

  <div class="container-fluid">

    <div class="card">

      <div class="card-header pt-4">
      @if(Auth::user()->level == "finance")
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
    
        <i class="fa fa-plus"></i> &nbsp TAMBAH BARANG
        </button>
        @endif
        <h4>Data Barang</h4>

      </div>
      <div class="card-body pt-0">

        <!-- Modal -->
        <form action="{{ route('barang.add') }}" method="post">
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                @if(Auth::user()->level == "finance")
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                  @endif
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  @csrf
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" required="required" class="form-control"  placeholder="nama barang" style="width:100%">
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" required="required" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" required="required" class="form-control">
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
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
               
                <th class="text-center" width="10%">OPSI</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach($barang as $k)
              <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $k->nama_barang }}</td>
                <td>{{ $k->stok }}</td>
                <td>Rp. {{ number_format($k->harga )}} </td>
                <td>    

                 
                  <div class="text-center">
                  @if(Auth::user()->level == "finance")
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#edit_barang_{{ $k->id_barang }}">
                      <i class="fa fa-cog"></i>
                    </button>
                  @endif
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_barang_{{ $k->id_barang }}">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                
                  
                  <form action="{{ route('barang.update',['id' => $k->id_barang]) }}" method="post">
                    <div class="modal fade" id="edit_barang_{{$k->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                             <div class="modal-body">

                            @csrf
                            {{method_field('PUT')}}
                        
                            <div class="form-group">
                              <label>Nama Barang</label>
                              <input id=''type="text" name="nama" required="required" class="form-control" value="{{$k->nama_barang}}" style="width:100%;height:content;">
                            </div>

                            <div class="form-group">
                              <label>stok</label>
                              <input type="number" name="stok" required="required" class="form-control" value="{{$k->stok}}" style="width:100%">
                            </div>

                            <div class="form-group">
                              <label>harga (Rp)</label>
                              <input type="number" name="harga" required="required" class="form-control" value="{{$k->harga}}" style="width:100%">
                            </div>


                          </div>
                        

                            {{-- @csrf
                            {{ method_field('PUT') }} --}}

                            {{-- <div class="form-group">
                              <label>Nama Kategori</label>
                              <input type="hidden" name="id" value="{{ $k->id_barang }}">
                              <input type="text" name="nama" required="required" class="form-control" placeholder="Nama Kategori .." value="{{ $k->nama_barang }}" >
                            </div> --}}

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Batal</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Simpan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <!-- modal hapus -->
                  <form action="{{ route('barang.delete',['id' => $k->id_barang]) }}" method="post" >
                    <div class="modal fade" id="hapus_barang_{{$k->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <p>Yakin ingin menghapus data ini ?</p>

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