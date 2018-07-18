@extends('template/t_index')

@section('content')

<style type="text/css">
            body{
                background-image: url("asset/bg.jpg");
                background-color: #fff;
                background-repeat: no-repeat;
            }

            .content {
                text-align: center;
                padding-left: 150px;
                padding-right: 150px;
            }

            .title {
                text-align: center;
                padding-top: 330px;
                color: #337ab7;
                font-size: 3em;
                font-weight: bold;
                font-family: 'Helvetica', sans-serif;
                text-shadow: 0.5px 0.5px 1px #b3b3b3;
            }
        

            .navbar-default
            {
                background: none;
                border-color: #2e2e2e;
            }  

           .glyphicon.glyphicon-globe {
                font-size: 40px;
                opacity: 0.2;
            }
            .glyphicon.glyphicon-wrench{
                font-size: 40px;
                opacity: 0.2;
            }
            .glyphicon.glyphicon-cog{
                font-size: 40px;
                opacity: 0.2;
            }
              .glyphicon.glyphicon-list-alt{
                font-size: 40px;
                opacity: 0.2;
            }
</style>


<div class="content">
    <div class="title m-b-md">
        Aplikasi Perhitungan Total Insentif
    </div>
    Aplikasi Perhitungan Total Insentif adalah aplikasi yang menghitung total insentif berdasarkan total penjualan  oleh masing-masing sales untuk disesuaikan dengan target yang telah ditentukan perusahaan. Metode pemberian insentif yang diterapkan oleh PT. Taisho Pharmaceutical menggunakan kombinasi insentif pada penjualan individu dari metode berjenjang.
    <p></p>
    <br/>
        <span class="glyphicon glyphicon-list-alt"></span>&nbsp<span class="glyphicon glyphicon-globe"></span>&nbsp<span class="glyphicon glyphicon-wrench"></span>&nbsp<span class="glyphicon glyphicon-cog"></span>
</div>
    

@endsection