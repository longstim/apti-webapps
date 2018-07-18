@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info" style="margin-top: 10px;">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-home"></span> &nbspDashboard
                </div>

                <div class="panel-body">
                    <h3 align="center"><b>Selamat datang di Aplikasi Perhitungan Total Insentif</b></h3>
                    <br>
                    @if(Session::has('message'))
                        <span class="label label-danger">{{ Session::get('message')}}</span><a href="{{ url('/target') }}"><font size="2px"> Tambah Target</font></a>
                    @endif
                    <p></p>
                    {{ Form::open(['url'=>'/uploadfile', 'files'=>'true']) }}
                    <div class="row">
                        <div class="col-lg-4 text-left">
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
                        <div class="col-lg-4 text-left"> 
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
                    <label>File</label>
                    {{ Form::file('_file', ['class'=>'filestyle', 'data-placeholder' => 'No file', 'data-buttonName' => 'btn-primary']) }}
                    <p></p>
                    {{ Form::submit('Upload', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
