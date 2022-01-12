@extends('app.master')

@section('konten')

<div class="content-body">

  <div class="row page-titles mx-0 mt-2">

    <h3 class="col p-md-0">Purchase Order</h3>

    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Order</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah</a></li>
      </ol>
    </div>

  </div>

  <div class="container">

    <div class="card">

      <div class="card-header pt-4">
        <a href="{{ route('purchase_order') }}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> &nbsp KEMBALI</a>
        <h4>Tambah Purchase Order</h4>

      </div>
      <div class="card-body">

        <div class="row">

          <div class="col-lg-5">
        

            <form  action="{{ route('purchase_order.result') }}" method="post">
              @csrf
             
              <div class="form-group">
                <div class="form-group has-feedback">
                  <label class="text-dark">Kode PO</label>
                  <input id="kode_po" type="number" class="form-control" name="kode_po" value="{{$po_number}}" placeholder="{{$po_number}}" readonly>
                  @error('total_beli')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
                 
              <div class="form-group">
                <div class="form-group has-feedback">
                  <label class="text-dark">Nama Suplier</label>
                  <select class="form-control"  name="id_suplier">
                    <option <?php if(old("") == ""){echo "selected='selected'";} ?> value=""></option>
                    @foreach ($suplier as $sup)
                    <option <?php if(old("{{$sup->nama_suplier}}") == "{{$sup->nama_suplier}}"){echo "selected='selected'";} ?> value="{{$sup->id_suplier}}">{{$sup->nama_suplier}}</option>
             
                    @endforeach
                    {{-- <option <?php if(old("level") == "admin"){echo "selected='selected'";} ?> value="admin">Admin</option>
                    <option <?php if(old("level") == "admin finance"){echo "selected='selected'";} ?> value="finance">Admin Finance</option> --}}
                  </select>
                  
                  @error('level')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="form-group has-feedback">
                  <label class="text-dark">Nama Barang</label>
                  <select class="form-control" name="id_barang" id="id_barang" >
                    <option value="">Pilih Barang</option>
                    @foreach ($barang as $item)
                    <option  value="{{$item->id_barang}}">{{$item->nama_barang}}</option>
                  
                    {{-- <option <?php if(old("level") == "admin"){echo "selected='selected'";} ?> value="admin">Admin</option>
                    {{-- <option <?php if(old("level") == "admin finance"){echo "selected='selected'";} ?> value="finance">Admin Finance</option> --}}
                    {{-- @if ($item->id_barang==""){
                        
                        <input type="number" id="harga" value="{{$item->harga}}">  
                      }
                      <input type="number" id="harga" value=""  >    
                          
                      @endif --}}
                    @endforeach
                  </select>
            
                 
                  
                  @error('nama_barang')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              
 
              <div class="form-group">
                <div class="form-group has-feedback">
                  <label class="text-dark">Harga Barang</label>
                  <input id="harga_barang" type="number" placeholder="Harga Barang" class="form-control @error('harga_barang') is-invalid @enderror" name="harga"  autocomplete="off" readonly >
                  @error('harga_bayar')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="form-group has-feedback">
                  <label class="text-dark">Jumlah Beli</label>
                  <input id="total_beli" type="number" placeholder="jumlah beli" class="form-control @error('total_beli') is-invalid @enderror" name="total_beli"  value="{{ old('total_beli') }}" autocomplete="off">
                  @error('total_beli')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              
              
              
              <div class="form-group">
                <div class="form-group has-feedback">
                  <label class="text-dark">Total Bayar</label>
                  <input id="total_bayar" type="number" placeholder="Total bayar" class="form-control @error('total_bayar') is-invalid @enderror" name="total_bayar" value="" autocomplete="off">
                  @error('total_bayar')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
      
              </div>
     


           

              {{-- <div class="form-group">
                <div class="form-group has-feedback">
                  <label class="text-dark">Foto Profil</label>
                  <br>
                  <input id="foto" type="file" placeholder="foto" class="@error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" autocomplete="off">
                  <br>
                  <small class="text-muted"><i>Boleh dikosongkan</i></small>
                  @error('foto')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div> --}}

              
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>


        </div>
        <!-- <div class="row">
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
                <tr>
                  <td>1</td>
                  <td>halo</td>
                  <td>halo</td>
                  <td>halo</td>
                  <td>halo</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> -->

      </div>

    </div>

  </div>
  <!-- #/ container -->
</div>
<script src="{{ asset('asset_admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript">

  $(document).ready(function(){
   
    $(document).on('change','#id_barang',function(){
      console.log('data berubah');
      const id_barang=$(this).val();
      var a=$(this).parent();
      

      $.ajax({
        type:'get',
        url:'{!!URL::to('nama_barang')!!}',
        data:{'id_barang':id_barang},
        dataType:'json',
        success:function(data){
       //show data on input value with id 'harga_cabe'

        $('#harga_barang').val(data.harga);
        }
      })
    })
    $(document).on('keyup','#total_beli',function(){
      var total_beli=$(this).val()
      var harga_barang=$('#harga_barang').val();
      var total=total_beli*harga_barang;

      $('#total_bayar').val(total);
    })
  
  });

  
</script>
@endsection