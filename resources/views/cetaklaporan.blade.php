<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Aplikasi Perhitungan Total Insentif</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
  
            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Laporan Trend Sales Marketing</h2></center>  
            </div>
            <br>
            <P style="font-family:Arial; font-size:14px;"><b>Nama Sales:</b> {{ $namasales }}</P>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">No<br></th>
                <th class="tg-3wr7">Tahun<br></th>
                <th class="tg-3wr7">Bulan<br></th>
                <th class="tg-3wr7">Total Pencapaian<br></th>
                <th class="tg-3wr7">Target<br></th>
                <th class="tg-3wr7">% Ach<br></th>
                <th class="tg-3wr7">Insentif<br></th>
              </tr>
              <?php $no=1;?>
              @foreach ($datalaporan as $data)
              <tr>
              <td class="tg-rv4w" style="text-align: center;">{{ $no++ }}</td>
              <td class="tg-rv4w" style="text-align: center;">{{ $data['tahun'] }}</td>
              <td class="tg-rv4w" style="text-align: center;">{{ $data['bulan'] }}</td>
              <td class="tg-rv4w" style="text-align: right;">{{ number_format($data[0]['totalpencapaian'],0) }}</td>
              <td class="tg-rv4w" style="text-align: right;">{{ number_format($data[0]['target'],0) }}</td>
              <td class="tg-rv4w" style="text-align: center;">{{ $data[0]['ach'] }}</td>
              <td class="tg-rv4w" style="text-align: right;">{{ number_format($data[0]['incentive'],0) }}</td>            
              </tr>
              @endforeach
            </table>
            <br>
            <p>
            Diketahui Oleh
            </p>
            <br>
            <p>
            Area Manager
            </p>
        </body>
    </head>
</html>