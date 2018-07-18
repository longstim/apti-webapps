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
	<p><b><font color="#2e2e2e" size="5px">DAFTAR TARGET SALES {{ strtoupper($waktu['bulan']).' '.$waktu['tahun'] }}</font></b></p>
	  {{ Form::open(['url'=>'/readtarget']) }}
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
    @if(Session::has('message'))
		<span class="label label-success">{{ Session::get('message') }}</span>
	@endif

	@if($checker==0)
		<span class="label label-success">Silahkan cari data target sales berdasarkan bulan dan tahun!</span>
	@elseif($checker==1)
		<span class="label label-danger">Data yang anda cari tidak ada.</span>
	@else
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<tr>
				<th>NO</th>
				<th>SALES FORCE</th>
				<th>COUNTERPAIN</th>
				<th>TEMPRA</th>
				<th>VITAMIN</th>
				<th>ELLGY</th>
				<th></th>
			</tr>
			<?php $no=1; ?>
			@if($johan['id']!='')
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> JOHAN </td>
				<td align="right">{{ number_format($johan['counterpain'],0) }}</td>
				<td align="right">{{ number_format($johan['tempra'],0) }}</td>
				<td align="right">{{ number_format($johan['vitamin'],0) }}</td>
				<td align="right">{{ number_format($johan['ellgy'],0) }}</td>
				<td align="center"><a href="{{ url('updatetarget/1/'.$waktu['bulanid'].'/'.$waktu['tahun']) }}">Edit</a></td>
			</tr>
			@endif
			@if($jose['id']!='')
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> JOSE </td>
				<td align="right">{{ number_format($jose['counterpain'],0) }}</td>
				<td align="right">{{ number_format($jose['tempra'],0) }}</td>
				<td align="right">{{ number_format($jose['vitamin'],0) }}</td>
				<td align="right">{{ number_format($jose['ellgy'],0) }}</td>
				<td align="center"><a href="{{ url('updatetarget/2/'.$waktu['bulanid'].'/'.$waktu['tahun']) }}">Edit</a></td>
			</tr>
			@endif
			@if($jhony['id']!='')
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> JHONY </td>
				<td align="right">{{ number_format($jhony['counterpain'],0) }}</td>
				<td align="right">{{ number_format($jhony['tempra'],0) }}</td>
				<td align="right">{{ number_format($jhony['vitamin'],0) }}</td>
				<td align="right">{{ number_format($jhony['ellgy'],0) }}</td>
				<td align="center"><a href="{{ url('updatetarget/3/'.$waktu['bulanid'].'/'.$waktu['tahun']) }}">Edit</a></td>
			</tr>
			@endif
			@if($besli['id']!='')
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> BESLI </td>
				<td align="right">{{ number_format($besli['counterpain'],0) }}</td>
				<td align="right">{{ number_format($besli['tempra'],0) }}</td>
				<td align="right">{{ number_format($besli['vitamin'],0) }}</td>
				<td align="right">{{ number_format($besli['ellgy'],0) }}</td>
				<td align="center"><a href="{{ url('updatetarget/4/'.$waktu['bulanid'].'/'.$waktu['tahun']) }}">Edit</a></td>
			</tr>
			@endif
			@if($yusman['id']!='')
			</tr>
				<tr>
				<td align="center">{{ $no++ }}</td>
				<td> YUSMAN </td>
				<td align="right">{{ number_format($yusman['counterpain'],0) }}</td>
				<td align="right">{{ number_format($yusman['tempra'],0) }}</td>
				<td align="right">{{ number_format($yusman['vitamin'],0) }}</td>
				<td align="right">{{ number_format($yusman['ellgy'],0) }}</td>
				<td align="center"><a href="{{ url('updatetarget/5/'.$waktu['bulanid'].'/'.$waktu['tahun']) }}">Edit</a></td>
			</tr>
			@endif
			@if($rimba['id']!='')
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> RIMBA </td>
				<td align="right">{{ number_format($rimba['counterpain'],0) }}</td>
				<td align="right">{{ number_format($rimba['tempra'],0) }}</td>
				<td align="right">{{ number_format($rimba['vitamin'],0) }}</td>
				<td align="right">{{ number_format($rimba['ellgy'],0) }}</td>
			 	<td align="center"><a href="{{ url('updatetarget/6/'.$waktu['bulanid'].'/'.$waktu['tahun']) }}">Edit</a></td>
			</tr>
			@endif
		</table>
	</div>
	@endif
</div>

@stop