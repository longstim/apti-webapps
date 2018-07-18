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
	<p><b><font color="#2e2e2e" size="5px">TOTAL PENJUALAN SALES {{ $waktu['bulan'].' '.$waktu['tahun'] }}</font></b></p>
	<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th>NO</th>
				<th>SALES FORCE</th>
				<th>COUNTERPAIN</th>
				<th>TEMPRA</th>
				<th>VITAMIN</th>
				<th>ELLGY</th>
				<th>TOTAL</th>
			</tr>
			<?php $no=1; ?>
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> JOHAN </td>
				<td align="right">{{ number_format($johan['counterpain'],0) }}</td>
				<td align="right">{{ number_format($johan['tempra'],0) }}</td>
				<td align="right">{{ number_format($johan['vitamin'],0) }}</td>
				<td align="right">{{ number_format($johan['ellgy'],0) }}</td>
				<td align="right">{{ number_format($johan['counterpain']+$johan['tempra']+$johan['vitamin']+$johan['ellgy'],0) }}</td>
			</tr>
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> JOSE </td>
				<td align="right">{{ number_format($jose['counterpain'],0) }}</td>
				<td align="right">{{ number_format($jose['tempra'],0) }}</td>
				<td align="right">{{ number_format($jose['vitamin'],0) }}</td>
				<td align="right">{{ number_format($jose['ellgy'],0) }}</td>
				<td align="right">{{ number_format($jose['counterpain']+$jose['tempra']+$jose['vitamin']+ $jose['ellgy'],0) }}</td>
			</tr>
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> JHONY </td>
				<td align="right">{{ number_format($jhony['counterpain'],0) }}</td>
				<td align="right">{{ number_format($jhony['tempra'],0) }}</td>
				<td align="right">{{ number_format($jhony['vitamin'],0) }}</td>
				<td align="right">{{ number_format($jhony['ellgy'],0) }}</td>
				<td align="right">{{ number_format($jhony['counterpain']+$jhony['tempra']+$jhony['vitamin']+ $jhony['ellgy'],0) }}</td>	
			</tr>
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> BESLI </td>
				<td align="right">{{ number_format($besli['counterpain'],0) }}</td>
				<td align="right">{{ number_format($besli['tempra'],0) }}</td>
				<td align="right">{{ number_format($besli['vitamin'],0) }}</td>
				<td align="right">{{ number_format($besli['ellgy'],0) }}</td>
				<td align="right">{{ number_format($besli['counterpain']+$besli['tempra']+$besli['vitamin']+ $besli['ellgy'],0) }}</td>	
			</tr>
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> YUSMAN </td>
				<td align="right">{{ number_format($yusman['counterpain'],0) }}</td>
				<td align="right">{{ number_format($yusman['tempra'],0) }}</td>
				<td align="right">{{ number_format($yusman['vitamin'],0) }}</td>
				<td align="right">{{ number_format($yusman['ellgy'],0) }}</td>
				<td align="right">{{ number_format($yusman['counterpain']+$yusman['tempra']+$yusman['vitamin']+ $yusman['ellgy'],0) }}</td>	
			</tr>
			<tr>
				<td align="center">{{ $no++ }}</td>
				<td> RIMBA </td>
				<td align="right">{{ number_format($rimba['counterpain'],0) }}</td>
				<td align="right">{{ number_format($rimba['tempra'],0) }}</td>
				<td align="right">{{ number_format($rimba['vitamin'],0) }}</td>
				<td align="right">{{ number_format($rimba['ellgy'],0) }}</td>
				<td align="right">{{ number_format($rimba['counterpain']+$rimba['tempra']+$rimba['vitamin']+ $rimba['ellgy'],0) }}</td>	
			</tr>
		</table>
	</div>
</div>

@stop