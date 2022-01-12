@extends('app.master')

@section('konten')

<div class="content-body">

  <div class="row page-titles mx-0 mt-2">

    <h3 class="col p-md-0">Data Pengeluaran</h3>

    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pengeluaran</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Pengeluaran</a></li>
      </ol>
    </div>

  </div>

  <div class="container">

    <div class="card">

      <div class="card-header pt-4">
        <a href="{{ route('transaksi') }}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> &nbsp KEMBALI</a>
        <h4>View Detail </h4>

      </div>
      <div class="card-body">

        <div class="row">

          <div class="col-lg-12">
        

            <form  action="" method="post">
              @csrf
              <div class="row">
             <div class="col-md-6">
              
                <div class="col-md-12">
                  
                    <p><span>Tanggal    : </span>{{$data->tanggal}}</p> 
                    
                    <p><span>Jenis      : </span>{{$data->jenis}}</p> 
                    <p><span>Kode PO      : </span>{{ $data->kode_po?$data->kode_po:'-'}}</p> 
                    
                    <p><span>Kategori   : </span>{{$data->kategori->kategori}}</p>   
                    
                    <p><span>Nominal    : </span>Rp.{{number_format($data->nominal)}}-,</p> 
                    
                  
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Keterangan </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" cols="5" readonly>{{$data->keterangan}}</textarea>
                          </div>
                </div>
             
              
             </div>
             <div class="col-md-6">
              
                <div class="col-md-12">
                    <h4>Bukti Purchase Order</h4>
                    <img src="{{ asset('gambar/bukti_po/'.$data->bukti_po) }}" class="img-fluid" alt="Responsive image">
                         
               
               
                </div>
                <div class="col-md-4">
                    
                    
                </div>
                <div class="col-md-4">
                   
                
                </div>
             </div>
            <div class="row mt-10">
             <div class="col-md-6">
              
                <div class="col-md-12">
                    <h4>Bukti Invoice</h4>
                    <img src="{{ asset('gambar/bukti_invoice/'.$data->bukti_invoice) }}" class="img-fluid" alt="Responsive image">
                         
               
               
                </div>
               
             </div>
             <div class="col-md-6">
              
                <div class="col-md-12">
                    <h4>Bukti Transfer</h4>
                    <img src="{{ asset('gambar/bukti_transfer/'.$data->bukti_transfer) }}" class="img-responsive img-rounded" alt="Responsive image">
                         
               
               
                </div>
               
             </div>
            </div>


            </div>
 
        
               
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