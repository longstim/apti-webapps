@extends('layouts/app')

@section('content')

<div class="container">
<p></p>
    <div class="panel panel-info">
        <div class="panel-heading">
           <span class="glyphicon glyphicon-stats"></span>&nbspUbah Target
           @if(Session::has('message'))
           <span class="label label-danger">{{Session::get('message')}}</span>
           @endif
        </div>
        <div class="panel-body" >
            <div class="col-xs-4" >
                {{ Form::open(['url' => '/prosesupdatetarget']) }}
                {!! csrf_field() !!}
                <div class="row">
                        <div class="col-lg-5 text-left">
                            <label>Bulan</label>
                            {{ Form::text('namabulan', $waktu['bulan'], ['placeholder'=>'Jumlah target counterpain','class' => 'form-control','readonly']) }}

                            {{ Form::hidden('bulan', $waktu['bulanid'], ['placeholder'=>'Jumlah target counterpain','class' => 'form-control','readonly']) }}
                              
                        </div>
                        <div class="col-lg-5 text-left"> 
                            <label>Tahun</label>
                            {{ Form::text('tahun', $waktu['tahun'], ['placeholder'=>'Jumlah target counterpain','class' => 'form-control','readonly']) }}
                                               
                        </div>
                    </div>  
                <label>Nama Sales</label>
                    @foreach($daftarsales as $data)
                        @if($data->id==$dataid_sales)
                            {{ Form::text('namasales', $data->nama, ['placeholder'=>'Jumlah target counterpain','class' => 'form-control','readonly']) }}
                        @endif
                    @endforeach

                     {{ Form::hidden('id_sales', $dataid_sales, ['placeholder'=>'Jumlah target counterpain','class' => 'form-control','readonly']) }}
                <p></p>
                   <label>Target Counterpain</label>
                    {{ Form::text('counterpain', $sales['counterpain'], ['placeholder'=>'Jumlah target counterpain','class' => 'form-control']) }}
                <p></p>
                     <p></p>
                   <label>Target Tempra</label>
                    {{ Form::text('tempra', $sales['tempra'], ['placeholder'=>'Jumlah target tempra','class' => 'form-control']) }}
                <p></p>
                     <p></p>
                   <label>Target Vitamin</label>
                    {{ Form::text('vitamin', $sales['vitamin'], ['placeholder'=>'Jumlah target vitamin','class' => 'form-control']) }}
                <p></p>
                     <p></p>
                   <label>Target Ellgy</label>
                    {{ Form::text('ellgy', $sales['ellgy'], ['placeholder'=>'Jumlah target ellgy','class' => 'form-control']) }}
                <p></p>
                 <a href="{{ url('/readtarget') }}"><u>Lihat Target</u></a>
                 <p></p>
                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
              </div>             
        </div>
    </div>
</div>

@stop