@extends('layouts/app')

@section('content')

<div class="container">
<p></p>
    <div class="panel panel-info">
        <div class="panel-heading">
           <span class="glyphicon glyphicon-stats"></span>&nbspTambah Target
           @if(Session::has('message'))
           <span class="label label-danger">{{Session::get('message')}}</span>
           @endif
        </div>
        <div class="panel-body" >
            <div class="col-xs-4" >
                {{ Form::open(['url' => '/prosestarget']) }}
                {!! csrf_field() !!}
                <div class="row">
                        <div class="col-lg-5 text-left">
                                <label>Bulan</label>
                                <select name="bulan" class="form-control">
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
                                </select>
                        </div>
                        <div class="col-lg-5 text-left"> 
                                <label>Tahun</label>
                                <div class="form-group">
                                <select name="tahun" class="form-control">
                                    @for($i=2000;$i<=date("Y");$i++)
                                        @if($i==date("Y"))
                                            <option value={{$i}} selected>{{$i}}</option>
                                        @else
                                            <option value={{$i}}>{{$i}}</option>
                                        @endif
                                    @endfor
                                </select>
                                </div>                    
                        </div>
                    </div>  
                <label>Nama Sales</label>
                <div class="form-group">
                <select name="id_sales" class="form-control">
                    @foreach($sales as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
                </div>
                <p></p>
                   <label>Target Counterpain</label>
                    {{ Form::text('counterpain', '', ['placeholder'=>'Jumlah target counterpain','class' => 'form-control']) }}
                <p></p>
                   <label>Target Tempra</label>
                    {{ Form::text('tempra', '', ['placeholder'=>'Jumlah target tempra','class' => 'form-control']) }}
                <p></p>
                   <label>Target Vitamin</label>
                    {{ Form::text('vitamin', '', ['placeholder'=>'Jumlah target vitamin','class' => 'form-control']) }}
                <p></p>
                     <p></p>
                   <label>Target Ellgy</label>
                    {{ Form::text('ellgy', '', ['placeholder'=>'Jumlah target ellgy','class' => 'form-control']) }}
                <p></p>
                 <a href="{{ url('/readtarget') }}"><u>Lihat Target</u></a>
                 <p></p>
                {{ Form::submit('Tambah', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
              </div>             
        </div>
    </div>
</div>

@stop