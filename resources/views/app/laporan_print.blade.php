<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Pengeluaran </title>
  <link rel="stylesheet" href="{{ asset('asset_admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }} ">
</head>
<body>
  <img src="{{asset('/gambar/sistem/logo-pt.png')}} " alt="logo-png" style="widht:70px;height:70px;
  position:absolute;margin-top:5px;margin-left:20px;">
  <center>
  <h3>PT.TESSO TETRA CHEMIKA</h3>
  <p>Jl. Industri Selatan 2 blok JJ kav, 4
      Jababeka Industrial estate, 
       cikarang Bekasi 17550,<br> Indonesia
      Phone (62-21)89830665 Fax: (62-21) 89830686</p>
  </center>
  <hr>
  <center>
    <h4>LAPORAN PENGELUARAN KAS</h4>
  </center>

  <table style="width: 40%">
    <tr>
      <td width="30%">DARI TANGGAL</td>
      <td width="5%" class="text-center">:</td>
      <td>{{ date('d-m-Y',strtotime($_GET['dari'])) }}</td>
    </tr>
    <tr>
      <td width="30%">SAMPAI TANGGAL</td>
      <td width="5%" class="text-center">:</td>
      <td>{{ date('d-m-Y',strtotime($_GET['sampai'])) }}</td>
    </tr>
    <tr>
      <td width="30%">KATEGORI</td>
      <td width="5%" class="text-center">:</td>
      <td>
        @php
        $id_kategori = $_GET['kategori'];
        @endphp

        @if($id_kategori == "")
        @php
        $kat = "SEMUA KATEGORI";
        @endphp
        @else
        @php
        $katt = DB::table('kategori')->where('id',$id_kategori)->first();
        $kat = $katt->kategori
        @endphp
        @endif

        {{$kat}}
      </td>
    </tr>
  </table>

  <br>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th rowspan="2" class="text-center" width="1%">NO</th>
        <th rowspan="2" class="text-center" width="9%">TANGGAL</th>
        <th rowspan="2" class="text-center">KATEGORI</th>
        <th rowspan="2" class="text-center">KETERANGAN</th>
        <th colspan="2" class="text-center">JENIS</th>
      </tr>
      <tr>
        <th class="text-center">PEMASUKAN</th>
        <th class="text-center">PENGELUARAN</th>
      </tr>
    </thead>
    <tbody>
      @php
      $no = 1;
      $total_pemasukan = 0;
      $total_pengeluaran = 0;
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
          @php $total_pemasukan += $t->nominal; @endphp
          @else
          {{ "-" }}
          @endif
        </td>
        <td class="text-center">
          @if($t->jenis == "Pengeluaran")
          {{ "Rp.".number_format($t->nominal).",-" }}
          @php $total_pengeluaran += $t->nominal; @endphp
          @else
          {{ "-" }}
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4" class="text-bold text-right">TOTAL</td>
        <td class="text-center">{{ "Rp.".number_format($total_pemasukan).",-" }}</td>
        <td class="text-center">{{ "Rp.".number_format($total_pengeluaran).",-" }}</td>
      </tr>
    </tfoot>
  </table>

  <script type="text/javascript">
    window.print();
  </script>

</body>
</html>
