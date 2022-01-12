<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>document</title>
</head>
<body>
    <style>
/* Housekeeping */
body{
  font-size:12px;
}
.spreadSheetGroup{
    /*font:0.75em/1.5 sans-serif;
    font-size:14px;
  */
    color:#333;
    background-color:#fff;
    padding:1em;
}

/* Tables */
.spreadSheetGroup table{
    width:80%;
    margin-bottom:1em;
    border-collapse: collapse;
    margin-left: 20px;
}
.spreadSheetGroup .proposedWork th{
    background-color:#eee;
}
.tableBorder th{
  background-color:#eee;
}
.spreadSheetGroup th,
.spreadSheetGroup tbody td{
    padding:0.5em;

}
.spreadSheetGroup tfoot td{
    padding:0.5em;

}
.spreadSheetGroup td:focus { 
  border:1px solid #fff;
  -webkit-box-shadow:inset 0px 0px 0px 2px #5292F7;
  -moz-box-shadow:inset 0px 0px 0px 2px #5292F7;
  box-shadow:inset 0px 0px 0px 2px #5292F7;
  outline: none;
}
.spreadSheetGroup .spreadSheetTitle{ 
  font-weight: bold;
}
.spreadSheetGroup tr td{
  text-align:center;
}
/*
.spreadSheetGroup tr td:nth-child(2){
  text-align:left;
  width:100%;
}
*/

/*
.documentArea.active tr td.calculation{
  background-color:#fafafa;
  text-align:right;
  cursor: not-allowed;
}
*/
.spreadSheetGroup .calculation::before, .spreadSheetGroup .groupTotal::before{
  /*content: "$";*/
}
.spreadSheetGroup .trAdd{
  background-color: #007bff !important;
  color:#fff;
  font-weight:800;
  cursor: pointer;
}
.spreadSheetGroup .tdDelete{
  background-color: #eee;
  color:#888;
  font-weight:800;
  cursor: pointer;
}
.spreadSheetGroup .tdDelete:hover{
  background-color: #df5640;
  color:#fff;
  border-color: #ce3118;
}
.documentControls{
  text-align:right;
}
.spreadSheetTitle span{
  padding-right:10px;
}

.spreadSheetTitle a{
  font-weight: normal;
  padding: 0 12px;
}
.spreadSheetTitle a:hover, .spreadSheetTitle a:focus, .spreadSheetTitle a:active{
  text-decoration:none;
}
.spreadSheetGroup .groupTotal{
  text-align:right;
}



table.style1 tr td:first-child{
  font-weight:bold;
  white-space:nowrap;
  text-align:right;
}
table.style1 tr td:last-child{
  border-bottom:1px solid #000;
}



table.proposedWork td,
table.proposedWork th,
table.exclusions td,
table.exclusions th{
  border:1px solid #000;
}
table.proposedWork thead th, table.exclusions thead th{
  font-weight:bold;
}
table.proposedWork td,
table.proposedWork th:first-child,
table.exclusions th, table.exclusions td{
  text-align:left;
  vertical-align:top;
}
table.proposedWork td.description{
  width:80%;
}

table.proposedWork td.amountColumn, table.proposedWork th.amountColumn,
table.proposedWork td:last-child, table.proposedWork th:last-child{
  text-align:center;
  vertical-align:top;
  white-space:nowrap;
}

.amount:before, .total:before{
  content: "Rp ";
}
table.proposedWork tfoot td:first-child{
  border:none;
  text-align:right;
}
table.proposedWork tfoot tr:last-child td{
  font-size:16px;
  font-weight:bold;
}

table.style1 tr td:last-child{
  width:100%;
}
table.style1 td:last-child{
  text-align:left;
}
td.tdDelete{
  width:1%;
}

table.coResponse td{text-align:left}
table.shipToFrom td, table.shipToFrom th{text-align:left}

.docEdit{border:0 !important}

.tableBorder td, .tableBorder th{
  border:1px solid #000;
}
.tableBorder th, .tableBorder td{text-align:center}

table.proposedWork td, table.proposedWork th{text-align:center}
table.proposedWork td.description{text-align:left}
    </style>
    <div class="document active">
      <span> <img src="{{ asset('gambar/sistem/logo-pt.png')}}" alt="" style=" width:50px; height:50px;margin-left:100px;position:absolute;margin-top: 20px;"></span>
        <div class="spreadSheetGroup">
        
          <h2 style="text-align: center">  PURCHASE ORDER</h2>
         <p style="text-align: center"> PO NUMBER : {{$data->kode_po}}</p>
         <hr>
          
          <table class="shipToFrom">
            <thead style="font-weight:bold">
              <tr>
                <th>FROM</th>
                <th>SHIP TO</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width:50%">
                  {{$data->suplier->nama_suplier}} <br/>
      Alamat: <br/>
      {{$data->suplier->alamat_suplier}}<br/>
      {{$data->suplier->email}} <br/>
      {{$data->suplier->no_rekening}}
                </td>
                <td style="width:50%">
       PT TESSO TETRA CHEMIKA<br/>
      Alamat: <br/>
      Jl. Industri Selatan 2 blok JJ kav, 4<br/>
      Jababeka Industrial estate, <br>
       cikarang Bekasi 17550, Indonesia<br/>
      Phone (62-21)89830665 Fax: (62-21) 89830686
                </td>
              </tr>
            </tbody>
          </table>
      
          <hr style="visibility:hidden"/>
          
          
          {{-- <table class="tableBorder">
            <thead style="font-weight:bold">
              <tr>
                <th>SHIPPING METHOD{</th>
                <th>SPECIFIED BY</th>
                <th>SIDEMARK</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td contenteditable="true" style="width:33.3%"></td>
                <td contenteditable="true" style="width:33.3%"></td>
                <td contenteditable="true" style="width:33.3%"></td>
              </tr>
            </tbody>
          </table> --}}
          
          
     
          <table class="proposedWork" width="100%" style="margin-top:20px">
            <thead>
             
              <th>Nama Barang</th>
              <th>Harga Satuan</th>
              <th>Total Beli</th>
              <th>Total Harga</th>
      
              
            </thead>
            <tbody>
              <tr>
              
                <td class="unit" >{{$data->barang->nama_barang}}</td>
                <td class="amount">{{number_format($data->barang->harga)}}</td>
                <td >{{$data->total_beli}}</td>
                <td class="amount">{{number_format($data->total_harga)}} </td>
               
               
              </tr>
            </tbody>
            {{-- <tfoot>
              <tr>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
              <td style="border:none;text-align:right">SUBTOTAL:</td>
              <td class="amount subtotal">0.00</td>
              <td class="docEdit"></td>
              </tr>
              <tr>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
              <td style="border:none;text-align:right">SALES TAX:</td>
              <td class="amount" contenteditable="true">0.00</td>
              <td class="docEdit"></td>
              </tr>
              <tr>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
              <td style="border:none;text-align:right;white-space:nowrap">SHIPPING & HANDLING:</td>
              <td class="amount" contenteditable="true">0.00</td>
              <td class="docEdit"></td>
              </tr>
              <tr>
                <td style="border:none"></td>
                <td style="border:none"></td>
                <td style="border:none"></td>
              <td style="border:none;text-align:right">TOTAL:</td>
              <td class="total amount" contenteditable="true"">0.00</td>
              <td class="docEdit"></td>
              </tr>
            </tfoot> --}}
          </table>
      
          
          
          <table width="100%" >
            <tbody>
              <tr>
                <td style="" style="vertical-align:top">
                  <table style="width:100%">
                    <tbody>
                      <tr>
                        <td style="text-align:left">
                        <p>1. Tolong kirim salinan invoice</p>
      
                          <p>2. Tolong Hubungi kami jika pesanan akan dikirim</p>

 
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:10px;text-align:left;padding-left:60px; ">
                          <h3><b>Direktur</b></h3>
                          <br>
                        
                        </td>
                      </tr>
                
                    <tr >
                      <td style="padding-top:60px;text-align:left;">
                       _____________________________
                       <br>
                       <p style="padding-left: 50px;"> Iskandar S.E</p>
                      
                      </td>
                      
                    </tr>
                    </tbody>
                  </table>
                </td>
                <td style=" width:50%; vertical-align:top">
                  <table style="width:100%">
                    <tbody>
                      
                      <tr>
                        <td style="text-align:left">
                          <strong>COMMENTS:</strong>
                        </td>
                      </tr>
                      <tr>
                        <td  style="text-align:left;">Tolong kirim semua barang ke perusahaan kami dalam keadaan baik</td>
                      </tr>
                      <tr>
                      
                        <td style="padding-top:20px;text-align:left; ">
                        ___________, __________________
                        <br>
                          <h3 style="padding-left:40px;"><b> Manajer Finance</b></h3>
                          <br>
                       
                        </td>
                      </tr>
                
                    <tr >
                      <td style="padding-top:60px;text-align:left;">
                       _____________________________
                       <br>
                       <p style="padding-left: 50px;"> Antonio M.Psi</p>
                      
                      </td>
                      
                    </tr>
                    
                  </tr>
                 
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
      
        
      
        </div>
      </div>
</body>
</html>