@extends('app.master')

@section('konten')

<div class="content-body">

  <div class="row page-titles mx-0 mt-2">
    <h3 class="col p-md-0">Transaksi</h3>
    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Transaksi</a></li>
      </ol>
    </div>
  </div>

  <div class="container-fluid">

    <div class="card">

      <div class="card-header pt-4">

        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus"></i> &nbsp TAMBAH TRANSAKSI
        </button>
        <h4>Data Transaksi</h4>

      </div>
      <div class="card-body pt-0">

        <!-- Modal -->
        <form action="{{ route('transaksi.aksi') }}" method="post" enctype="multipart/form-data" >
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  @csrf

                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" class="form-control datepicker2" required="required" name="tanggal"  autocomplete="off" placeholder="Masukkan tanggal .." value="{{old('tanggal')}}">
                  </div>

                  <div class="form-group">
                    <label>Jenis</label>
                    <select class="form-control" required="required" name="jenis">
                      <option value="">Pilih</option>
                      <option value="Pemasukan">Pemasukan</option>
                      <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" required="required" name="kategori" id="kategori">
                      <option value="">Pilih</option>
                      @foreach($kategori as $k)
                      <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" id="select_kode_po" hidden>
                    <label>Kode Po</label>
                    <select class="form-control"  name="kode_po" id="kode_po" >
                  
                     
                     
                    </select>
                  </div>
                  
                    <input type="text" required="required" name="nominal" id="nominal" hidden>

                  <div class="form-group">
                    <label>Nominal</label>

                    <input type="text" class="form-control"  name="nominal_val"  id="nominal_val" autocomplete="off" placeholder="Masukkan nominal ..">
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" autocomplete="off" placeholder="Masukkan keterangan (Opsional) .."></textarea>
                  </div>
                
                    
                  {{-- <div class="form-group">
                    <div class="form-group has-feedback">
                      <label class="text-dark">Bukti PO</label>
                      <br>
                      <input id="bukti_po"  type="file" placeholder="bukti_po" class="@error('bukti_po') is-invalid @enderror" name="bukti_po" value="{{ old('bukti_po') }}" autocomplete="off">
                      <br>
                      <small class="text-muted"><i>Boleh dikosongkan</i></small>
                      @error('bukti_po')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div> --}}
                  <div class="form-group">
                    <div class="form-group has-feedback">
                      <label class="text-dark">Bukti Invoice</label>
                      <br>
                      <input id="bukti_invoice" type="file" placeholder="bukti_invoice" class="@error('bukti_invoice') is-invalid @enderror" name="bukti_invoice" value="{{ old('bukti_invoive') }}" autocomplete="off">
                      <br>
                   
                      @error('bukti_invoice')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div> 
             
                  </div>
                  <div class="form-group">
                    <div class="form-group has-feedback">
                      <label class="text-dark">Bukti Transfer</label>
                      <br>
                      <input id="bukti_transfer" type="file" placeholder="bukti_transfer" class="@error('bukti_transfer') is-invalid @enderror" name="bukti_transfer" value="{{ old('bukti_transfer') }}" autocomplete="off">
                      <br>
                    
                      @error('bukti_transfer')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
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
          <table class="table table-bordered" id="table-datatable" style="width: 100%">
            <thead>
              <tr>
                <th rowspan="2" class="text-center" width="1%">NO</th>
                <th rowspan="2" class="text-center" width="11%">TANGGAL</th>
                <th rowspan="2" class="text-center">KATEGORI</th>
                <th rowspan="2" class="text-center">KETERANGAN</th>
                <th colspan="2" class="text-center">JENIS</th>
                <th rowspan="2" class="text-center" width="15%">OPSI</th>
              </tr>
              <tr>
                <th class="text-center">PEMASUKAN</th>
                <th class="text-center">PENGELUARAN</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
              @endphp
              @foreach($transaksi as $t)
              <tr>
                <td class="text-center">{{ $no++ }}</td>
                <td class="text-center">{{ date('d-m-Y', strtotime($t->tanggal )) }}</td>
                <td>{{ $t->kategori->kategori }}</td>
                <td>{{ $t->keterangan }}</td>
                <td class="text-center">
                  @if($t->jenis == "Pemasukan")
                  {{ "Rp.".number_format($t->nominal).",-" }}
                  @else
                  {{ "-" }}
                  @endif
                </td>
                <td class="text-center">
                  @if($t->jenis == "Pengeluaran")
                  {{ "Rp.".number_format($t->nominal).",-" }}
                  @else
                  {{ "-" }}
                  @endif
                </td>
                <td>

                  <div class="text-center">
                    <a href="{{ route('transaksi.detail', ['id' => $t->id]) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-eye"  ></i></a>
                    {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit_{{ $t->id }}" data-toggle="tooltip" data-placement="top" title="Edit"><i  data-toggle="tooltip" data-placement="top" title="edit" class="fa fa-pencil-square-o"></i></button> --}}
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $t->id }}" data-toggle="tooltip" data-placement="top" title="delete"><i  data-toggle="tooltip" data-placement="top" title="delete" class="fa fa-trash"></i></button>
                  </div>

                  <!-- Modal -->
                  <form method="POST" action="{{ route('transaksi.update',['id' => $t->id]) }}">
                    <div class="modal fade" id="modalEdit_{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">


                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Tanggal</label>
                              <input type="text" class="form-control datepicker2 py-0" required="required" name="tanggal" value="{{ $t->tanggal }}" style="width: 100%">
                            </div>

                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Jenis</label>
                              <select class="form-control py-0" required="required" name="jenis" style="width: 100%">
                                <option value="">Pilih</option>
                                <option {{ ($t->jenis == "Pemasukan" ? "selected='selected'" : "") }} value="Pemasukan">Pemasukan</option>
                                <option {{ ($t->jenis == "Pengeluaran" ? "selected='selected'" : "") }} value="Pengeluaran">Pengeluaran</option>
                              </select>
                            </div>

                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Kategori</label>
                              <select class="form-control py-0" required="required" name="kategori" style="width: 100%" >
                                <option value="">Pilih</option>
                                @foreach($kategori as $k)
                                <option {{ ($t->kategori->id == $k->id ? "selected='selected'" : "") }}  value="{{ $k->id }}">{{ $k->kategori }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group" id="select_kode_po" hidden>
                              <label>Kode Po</label>
                              <select class="form-control" required="required" name="kode_po" id="kode_po" >
                            
                               
                               
                              </select>
                            </div>
                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Nominal</label>
                              <input type="number" class="form-control py-0" required="required" name="nominal" value="{{ $t->nominal }}" style="width: 100%">
                            </div>

                            <div class="form-group" style="width: 100%;margin-bottom:20px">
                              <label>Keterangan</label>
                              <textarea class="form-control py-0" name="keterangan"  autocomplete="off" placeholder="Masukkan keterangan (Opsional) .." style="width: 100%">{{ $t->keterangan }}</textarea>
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


                  <!-- Modal -->
                  <form method="POST" action="{{ route('transaksi.delete',['id' => $t->id]) }}">
                    <div class="modal fade" id="modalDelete_{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">


                            @csrf
                            {{ method_field('DELETE') }}

                            <p>Apakah anda yakin ingin menghapus data ini?</p>

                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Hapus</button>
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
<script src="{{ asset('asset_admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

<script type="text/javascript">
 $(document).ready(function(){

$(document).on('change','#kategori',function(){
  var kategori_id=$(this).val
  var value=$(this).find(':selected').attr("value");
  console.log(value)
  var kode=$('#kode_po')
  var container=$('#select_kode_po')
  var opt='<option ></option>'
  var b=$(this).parent();
  console.log('databerubah');

  if(value==46){
  container.removeAttr('hidden');
  $.ajax({
    type:'get',
    url:'{!!URL::to('get_code_po')!!}',
    dataType:'json',
    success:function(data){
      for(var i=0;i<data.length;i++){
        var option=$(`<option>${data[i].kode_po}</option>`).attr("value",`${data[i].kode_po}`);
        kode.append(option).html();
      }
    }
  })

}else{
  container.attr('hidden',true)
  kode.children().remove()
}


})
$(document).on('change','#kode_po',function(){
var kode=$(this).val
var kode_po=$(this).find(':selected').attr("value")
var nominal_val=$('#nominal_val')
var nominal=$('#nominal')
console.log(kode_po)

$.ajax({
  type:'get',
  url:'{!!URL::to('get_total_harga')!!}',
  data:{'kode_po':kode_po},
  dataType:'json',
  success:function(data){
    var harga=new Intl.NumberFormat('id-ID',{style:'currency',currency:'IDR'}).format(data.total_harga);
    nominal.val(data.total_harga)
    nominal_val.val(harga)
    console.log(data.total_harga)
    console.log(harga)

  }
})
})
})
</script>
@endsection