@extends('app.master')

@section('konten')

<div class="content-body">

  <div class="row page-titles mx-0 mt-2">

    <h3 class="col p-md-0">Purchase Order Review</h3>

    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah</a></li>
      </ol>
    </div>

  </div>

  <div class="container">

    <div class="card">

      <div class="card-header pt-4">
        <a href="{{ route('purchase_order') }}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> &nbsp KEMBALI</a>
        <h4>Preview Purchase Order</h4>

      </div>
      <div class="card-body">

        <div class="row">

          <div class="col-lg-10">
        

            <form  action="{{ route('purchase_order.add_aksi') }}" method="post">
              @csrf
             <div class="row">
              
                <div class="col-md-4">
                    <h4>Data Barang</h4>
                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Nama Barang</label>
                                <input type="hidden" value="{{$id_barang}}" name='id_barang'>
                                <input type="hidden" value="{{$id_suplier}}" name='id_suplier'>
                           
                               
                                 <input id="kode_po" type="number" class="form-control" name="nama_barang" value="{{$nama_barang}}" placeholder="{{$nama_barang}}" disabled>
                                @error('total_beli')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Data Suplier</h4>
                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Nama Suplier</label>
                                 <input id="kode_po" type="number" class="form-control" name="kode_po" value="{{$nama_suplier}}" placeholder="{{$nama_suplier}}" disabled>
                                @error('total_beli')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Data Pembayaran</h4>
                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Kode PO</label>
                                 <input id="kode_po" type="number" class="form-control" name="kode_po" value="" placeholder="{{$po_number}}" disabled>
                                @error('total_beli')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                        </div>
                    </div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Harga</label>
                                 <input id="kode_po" type="number" class="form-control" name="kode_po" value="harga" placeholder="Rp. {{number_format($harga)}}" disabled>
                                @error('total_beli')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Alamat Suplier</label>
                                 <input id="alamat" type="text" class="form-control" name="alamat" value="" 
                                 placeholder="{{$alamat}}" disabled>
                        </div>
                    </div>
                </div>
          
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Total Beli</label>
                                 <input id="total_beli" type="number" class="form-control"  name="jumlah_beli" value="{{$total_beli}}"  readonly
                               >
                        </div>
                    </div>
                </div>
             </div>
             <div class="row">
              
                <div class="col-md-4">
                 
                    {{-- <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Nama Barang</label>
                                <input type="hidden" value="{{$id_barang}}" name='id_barang'>
                                 <input id="kode_po" type="number" class="form-control" name="kode_po" value="{{$nama_barang}}" placeholder="{{$nama_barang}}" disabled>
                                @error('total_beli')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                        </div>
                    </div> --}}
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Email</label>
                                 <input id="kode_po" type="number" class="form-control disable" name="kode_po" value="{{$email}}" placeholder="{{$email}}" disabled>
                                @error('total_beli')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
  
                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">Total Bayar</label>
                                 <input id="total_harga" type="number" class="form-control" name="total_harga" value="
                                 {{$total}}" placeholder="{{$total}}" readonly>
                                @error('total_beli')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                        </div>
                    </div>
                </div>
             </div>

             <div class="row">
              
                <div class="col-md-4">
                 
                </div>
                <div class="col-md-4">
                 
                    <div class="form-group">
                        <div class="form-group has-feedback">
                             <label class="text-dark">No Rekening</label>
                                 <input id="no_rekening" type="number" class="form-control" name="no_rekening" value="{{$no_rekening}}" placeholder="{{$no_rekening}}" disabled>
                                @error('total_beli')
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
    
                </div>
             </div>
           
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>


        </div>

      </div>

    </div>

  </div>
  <!-- #/ container -->
</div>
<script>

</script>
@endsection