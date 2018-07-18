@extends('layouts/app')

@section('content')

<style>
.table td{
    border: #bce8f1 solid 1px !important;
}

.table th{
    border: #a6c7ce solid 1px !important;
    text-align:center; background:#d9edf7; color:#31708f;
}
</style>

<div class="container">
	@if(Session::has('message'))
		<span class="label label-success">{{ Session::get('message') }}</span>
	@endif

	@if($waktu==0)
		<p><b><font color="#2e2e2e" size="5px">LAPORAN PENCAPAIAN SALES</font></b></p>
	@else
		<p><b><font color="#2e2e2e" size="5px">LAPORAN PENCAPAIAN SALES {{ strtoupper($waktu['bulan']).' '.$waktu['tahun'] }}</font></b></p>
	@endif
	        
	         {{ Form::open(['url'=>'/incentive']) }}
	         <div class="row">
                    <div class="col-lg-3  text-left">
                            <label>Bulan</label>
                            <select name="bulan" class="form-control">
                                 @if($waktu['bulan']=='Januari')
                                	<option value=1 selected>Januari</option>
                                	<option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
                                @elseif($waktu['bulan']=='Februari')
	                                <option value=1>Januari</option>
	                                <option value=2 selected>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='Maret')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3 selected>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='April')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4 selected>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='Mei')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5 selected>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                           	@elseif($waktu['bulan']=='Juni')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6 selected>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='Juli')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7 selected>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='Agustus')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3 selected>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8 selected>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='September')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9 selected>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='Oktober')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10 selected>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='November')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3 selected>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11 selected>November</option>
	                                <option value=12>Desember</option>
	                            @elseif($waktu['bulan']=='Desember')
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12 selected>Desember</option>
	                            @else
	                                <option value=1>Januari</option>
	                                <option value=2>Februari</option>
	                                <option value=3>Maret</option>
	                                <option value=4>April</option>
	                                <option value=5>Mei</option>
	                                <option value=6>Juni</option>
	                                <option value=7>Juli</option>
	                                <option value=8>Agustus</option>
	                                <option value=9>September</option>
	                                <option value=10>Oktober</option>
	                                <option value=11>November</option>
	                                <option value=12>Desember</option>
	                            @endif
                            </select>
                    </div>
                    <div class="col-lg-3  text-left"> 
                            <label>Tahun</label>
                            <div class="form-group">
                            <select name="tahun" class="form-control">
                             @if($waktu['tahun']!='')
                                @for($i=2000;$i<=date("Y");$i++)
                                   @if($i==$waktu['tahun'])
                                   		<option value={{$i}} selected>{{$i}}</option>
                                   @else
                                        <option value={{$i}}>{{$i}}</option>
                                   @endif
                                @endfor
                            @else
                            	@for($i=2000;$i<=date("Y");$i++)
                                   @if($i==date("Y"))
                                   		<option value={{$i}} selected>{{$i}}</option>
                                   @else
                                        <option value={{$i}}>{{$i}}</option>
                                   @endif
                                @endfor
                            @endif
                            </select>
                            </div>                    
                    </div>
                    <div class="col-lg-3  text-left">  
                    	<p></p>
                    	<div class="panel-body">
                        {{ Form::submit('Lihat', ['class' => 'btn btn-primary']) }}  
                        </div>            
                    </div>
                </div>
            {{ Form::close() }}

     <?php if($message==0) {?>
		<span class="label label-danger">Data yang anda cari tidak ada.</span>
	<?php 
	}
	else 
	{
	?>
	<div class="table-responsive">
		<table class="table table-bordered table-hover" >
			<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2">SALES FORCE</th>
				<th colspan="2">COUNTERPAIN</th>
				<th colspan="2">TEMPRA</th>
				<th colspan="2">VITAMIN</th>
				<th colspan="2">ELLGY</th>
				<th rowspan="2">TOTAL</th>
				<th rowspan="2">INCENTIVE</th>
			</tr>
			<tr>
				<th>TOTAL</th>
				<th>%</th>
				<th>TOTAL</th>
				<th>%</th>
				<th>TOTAL</th>
				<th>%</th>
				<th>TOTAL</th>
				<th>%</th>
			</tr>
			<?php $no=1; ?>
			
				<td align="center">{{ $no++ }}</td>
				<td> JOHAN </td>
				<td align="right">{{ number_format($johan['counterpain'],0) }}</td>
				<td align="center">{{ number_format($johan['persencounterpain'],0) }}</td>
				<td align="right">{{ number_format($johan['tempra'],0) }}</td>
				<td align="center">{{ number_format($johan['persentempra'],0) }}</td>
				<td align="right">{{ number_format($johan['vitamin'],0) }}</td>
				<td align="center">{{ number_format($johan['persenvitamin'],0) }}</td>
				<td align="right">{{ number_format($johan['ellgy'],0) }}</td>
				<td align="center">{{ number_format($johan['persenellgy'],0) }}</td>
				<td align="right">{{ number_format($johan['counterpain']+$johan['tempra']+$johan['vitamin']+$johan['ellgy'],0) }}</td>
				<td align="right"><b>{{ number_format($johan['incentive'],0) }}</b></td>
			</tr>
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> JOSE </td>
				<td align="right">{{ number_format($jose['counterpain'],0) }}</td>
				<td align="center">{{ number_format($jose['persencounterpain'],0) }}</td>
				<td align="right">{{ number_format($jose['tempra'],0) }}</td>
				<td align="center">{{ number_format($jose['persentempra'],0) }}</td>
				<td align="right">{{ number_format($jose['vitamin'],0) }}</td>
				<td align="center">{{ number_format($jose['persenvitamin'],0) }}</td>
				<td align="right">{{ number_format($jose['ellgy'],0) }}</td>
				<td align="center">{{ number_format($jose['persenellgy'],0) }}</td>
				<td align="right">{{ number_format($jose['counterpain']+$jose['tempra']+$jose['vitamin']+ $jose['ellgy'],0) }}</td>
				<td align="right"><b>{{ number_format($jose['incentive'],0) }}</b></td>
			</tr>
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> JHONY </td>
				<td align="right">{{ number_format($jhony['counterpain'],0) }}</td>
				<td align="center">{{ number_format($jhony['persencounterpain'],0) }}</td>
				<td align="right">{{ number_format($jhony['tempra'],0) }}</td>
				<td align="center">{{ number_format($jhony['persentempra'],0) }}</td>
				<td align="right">{{ number_format($jhony['vitamin'],0) }}</td>
				<td align="center">{{ number_format($jhony['persenvitamin'],0) }}</td>
				<td align="right">{{ number_format($jhony['ellgy'],0) }}</td>
				<td align="center">{{ number_format($jhony['persenellgy'],0) }}</td>
				<td align="right">{{ number_format($jhony['counterpain']+$jhony['tempra']+$jhony['vitamin']+ $jhony['ellgy'],0) }}</td>				
				<td align="right"><b>{{ number_format($jhony['incentive'],0) }}</b></td>
			</tr>
				<tr>
				<td align="center">{{ $no++ }}</td>
				<td> BESLI </td>
				<td align="right">{{ number_format($besli['counterpain'],0) }}</td>
				<td align="center">{{ number_format($besli['persencounterpain'],0) }}</td>
				<td align="right">{{ number_format($besli['tempra'],0) }}</td>
				<td align="center">{{ number_format($besli['persentempra'],0) }}</td>
				<td align="right">{{ number_format($besli['vitamin'],0) }}</td>
				<td align="center">{{ number_format($besli['persenvitamin'],0) }}</td>
				<td align="right">{{ number_format($besli['ellgy'],0) }}</td>
				<td align="center">{{ number_format($besli['persenellgy'],0) }}</td>
				<td align="right">{{ number_format($besli['counterpain']+$besli['tempra']+$besli['vitamin']+ $besli['ellgy'],0) }}</td>					
				<td align="right"><b>{{ number_format($besli['incentive'],0) }}</b></td>
			</tr>
			</tr>
				<tr>
				<td align="center">{{ $no++ }}</td>
				<td> YUSMAN </td>
				<td align="right">{{ number_format($yusman['counterpain'],0) }}</td>
				<td align="center">{{ number_format($yusman['persencounterpain'],0) }}</td>
				<td align="right">{{ number_format($yusman['tempra'],0) }}</td>
				<td align="center">{{ number_format($yusman['persentempra'],0) }}</td>
				<td align="right">{{ number_format($yusman['vitamin'],0) }}</td>
				<td align="center">{{ number_format($yusman['persenvitamin'],0) }}</td>
				<td align="right">{{ number_format($yusman['ellgy'],0) }}</td>
				<td align="center">{{ number_format($yusman['persenellgy'],0) }}</td>
				<td align="right">{{ number_format($yusman['counterpain']+$yusman['tempra']+$yusman['vitamin']+ $yusman['ellgy'],0) }}</td>	
				<td align="right"><b>{{ number_format($yusman['incentive'],0) }}</b></td>
			</tr>
					</tr>
				<tr>
				<td align="center">{{ $no++ }}</td>
				<td> RIMBA </td>
				<td align="right">{{ number_format($rimba['counterpain'],0) }}</td>
				<td align="center">{{ number_format($rimba['persencounterpain'],0) }}</td>
				<td align="right">{{ number_format($rimba['tempra'],0) }}</td>
				<td align="center">{{ number_format($rimba['persentempra'],0) }}</td>
				<td align="right">{{ number_format($rimba['vitamin'],0) }}</td>
				<td align="center">{{ number_format($rimba['persenvitamin'],0) }}</td>
				<td align="right">{{ number_format($rimba['ellgy'],0) }}</td>
				<td align="center">{{ number_format($rimba['persenellgy'],0) }}</td>
				<td align="right">{{ number_format($rimba['counterpain']+$rimba['tempra']+$rimba['vitamin']+ $rimba['ellgy'],0) }}</td>			
				<td align="right"><b>{{ number_format($rimba['incentive'],0) }}</b></td>
			</tr>
		</table>
	</div>
	<?php } ?>
	<p></p>
	@if(Auth::user()->role=='admin')
	{{ Form::open(['url'=>'/cetaklaporan']) }}
	<div class="col-lg-5" >
	<div class="panel panel-info">
        <div class="panel-heading">
           <span class="glyphicon glyphicon-list-alt"></span>&nbspCetak Laporan
           @if(Session::has('message'))
           <span class="label label-danger">{{Session::get('message')}}</span>
           @endif
        </div>
        <div class="panel-body" >
            <div class="col-xs-8" >
            <label>Nama Sales</label>
			    <div class="form-group">
			        <select name="id_sales" class="form-control">
			            @foreach($sales as $data)
			                <option value="{{$data->id}}">{{$data->nama}}</option>
			            @endforeach
			        </select>
			     </div>
			     {{ Form::submit('Cetak Laporan', ['class' => 'btn btn-success']) }}
                 {{ Form::close() }}
			</div>
		</div>
	</div> 
	</div> 
	@endif
</div>

@stop