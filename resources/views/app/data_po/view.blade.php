@extends('app.master')

@section('konten')

<div class="content-body">

  <div class="row page-titles mx-0 mt-2">

    <h3 class="col p-md-0">Purchase Order</h3>

    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Purchase Order</a></li>
      </ol>
    </div>

  </div>

  <div class="container-fluid">

    <div class="card">

      <div class="card-header pt-4">
        <a href="{{route('purchase_order.add')}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> &nbsp TAMBAH PO</a>
        <h4>Data Purchase Order</h4>

      </div>
      <div class="card-body pt-0">

    
        <div class="table-responsive">

          <table class="table table-bordered" id="table-datatable">
            <thead>
              <tr>
                <th width="1%">NO</th>
                <th class="text-center">Kode PO</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Total Beli</th>
                <th class="text-center">Harga Satuan</th>
                <th class="text-center">Total Harga</th>
                <th class="text-center">Nama Suplier</th>
                
                <th class="text-center" width="15%">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach($suplier as $u)
              <tr>
                <td class="text-center">{{ $no++ }}</td>
                {{-- <td>
                  @if($u->foto == "")
                  <img src="{{ asset('gambar/sistem/user.png') }}" style="width: 30px" class="mr-2">
                  @else
                  <img src="{{ asset('gambar/user/'.$u->foto) }}" style="width: 30px" class="mr-2">
                  @endif


                  {{ $u->name }}
                  @if(Auth::id() == $u->id)
                  <span class="badge badge-primary">Saya</span>
                  @endif
                </td> --}}
                <td class="text-center">{{ $u->kode_po }}</td>
                <td class="text-center">{{ $u->barang->nama_barang }}</td>
                <td class="text-center">{{ $u->total_beli }}</td>
                <td class="text-center">Rp. {{number_format($u->barang->harga)}}</td>
                    
                
                <td class="text-center">{{$u->total_harga}}</td>
                    
                
              
                <td class="text-center">{{$u->suplier->nama_suplier}}</td>
              
               
                <td>    

                  <div class="text-center">
                
                    <a href="{{ route('purchase_order.view_detail', ['id' => $u->id_po]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip"
                      data-placement="top" title="detail">
                      <i class="fa fa-eye fa-lg"></i>
                    </a>
                    <a href="{{ route('purchase_order.print', ['id' => $u->id_po]) }}" class="btn btn-success btn-sm" data-toggle="tooltip"
                      data-placement="top" title="print">
                      <i class="fa fa-print fa-lg"></i>
                    </a>
                   

                  {{-- @if($u->id_po != 1)
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_user_{{ $u->id }}">
                      <i class="fa fa-trash"></i>
                    </button>
                  @endif --}}
                  </div>

                  <!-- modal hapus -->
                  <form method="POST" action="{{ route('user.delete',['id' => $u->id_po]) }}">
                    <div class="modal fade" id="hapus_user_{{$u->id_po}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
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