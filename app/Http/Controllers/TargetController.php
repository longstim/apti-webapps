<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;
Use Redirect;
use View;

class TargetController extends Controller
{
   public function __construct()
   {
        $this->middleware('authenticate');
        $this->middleware('sales');
   }

   public function index()
   {
   		return view('target');
   }

   public function tambahtarget()
   {
   		$sales = DB::table('sales')->get();
   		return view('target', ['sales'=>$sales]);
   }

   public function prosestarget()
   {
         $checkdata = DB::table('targets')->where([
            ['id_sales','=',Input::get('id_sales')],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->get();

         if(!empty(!$checkdata) || count($checkdata)!=0)
         {
            if(empty(Input::get('counterpain')) || empty(Input::get('tempra')) || empty(Input::get('vitamin')) || empty(Input::get('ellgy')))  
            { 
               return Redirect::to('/target')->with('message','Isi target!');
            }
            else
            {
               $sales = DB::table('sales')->where('id','=',Input::get('id_sales'))->first();
               return Redirect::to('/target')->with('message','Target '.$sales->nama.' pada bulan '.date("M",mktime(0, 0, 0, Input::get('bulan'), 10)).' '.'tahun '.Input::get('tahun').' sudah ada.');
            }
         }
         else
         {
            if(empty(Input::get('counterpain')) || empty(Input::get('tempra')) || empty(Input::get('vitamin')) || empty(Input::get('ellgy')))  
            { 
               return Redirect::to('/target')->with('message','Isi target!');
            }
            else
            {
      	   	$data = array(
      	    		'id_sales' => Input::get('id_sales'),
      	    		'id_grup_produk' => 1,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
      	    		'total_target' => trim(Input::get('counterpain')),
      	    	);
      	    	DB::table('targets')->insert($data);

               $data = array(
                  'id_sales' => Input::get('id_sales'),
                  'id_grup_produk' => 2,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_target' => trim(Input::get('tempra')),
               );
               DB::table('targets')->insert($data);

               $data = array(
                  'id_sales' => Input::get('id_sales'),
                  'id_grup_produk' => 3,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_target' => trim(Input::get('vitamin')),
               );
               DB::table('targets')->insert($data);

               $data = array(
                  'id_sales' => Input::get('id_sales'),
                  'id_grup_produk' => 4,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_target' => trim(Input::get('ellgy')),
               );
               DB::table('targets')->insert($data);
               return Redirect::to('/target')->with('message','Berhasil menambah data.');
            }
         }
   }

   public function lihattarget()
   {
      $johan = array('id'=>'','counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $jose = array('id'=>'','counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $jhony = array('id'=>'','counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $besli = array('id'=>'','counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $yusman = array('id'=>'','counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $rimba = array('id'=>'','counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);

      $waktu = array('bulanid'=>'','bulan'=>'', 'tahun'=>'');

      if(Input::get('bulan')=='' && Input::get('tahun')=='')
      {
         $checker=0;
         return view('lihattarget',compact('johan','jose','jhony','besli','yusman','rimba','waktu','checker'));
      }
   	else
      {
   		$target = DB::table('targets')->where([
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
            ])->get();

            $waktu['bulanid'] = Input::get('bulan');
            $waktu['bulan'] = Input::get('bulan');
            $waktu['tahun'] = Input::get('tahun');

               if($waktu['bulan'] == '1')
               {
                  $waktu['bulan']='Januari';
               }
               else if( $waktu['bulan'] == '2') 
               {
                  $waktu['bulan']='Februari';
               }
               else if($waktu['bulan'] == '3') 
               {
                  $waktu['bulan']='Maret';
               }
               else if($waktu['bulan'] == '4') 
               {
                  $waktu['bulan']='April';
               }
               else if($waktu['bulan'] == '5') 
               {
                  $waktu['bulan']='Mei';
               }
               else if($waktu['bulan'] == '6') 
               {
                  $waktu['bulan']='Juni';
               }
               else if($waktu['bulan']== '7') 
               {
                  $waktu['bulan']='Juli';
               }
               else if($waktu['bulan'] == '8') 
               {
                  $waktu['bulan']='Agustus';
               }
               else if($waktu['bulan'] == '9') 
               {
                  $waktu['bulan']='September';
               }
               else if($waktu['bulan'] == '10') 
               {
                  $waktu['bulan']='Oktober';
               }
               else if($waktu['bulan'] == '11') 
               {
                  $waktu['bulan']='November';
               }
               else if($waktu['bulan'] == '12') 
               {
                  $waktu['bulan']='Desember';
               }

          if(empty($target) || count($target)==0)
          {
            $checker=1;
            return view('lihattarget',compact('johan','jose','jhony','besli','yusman','rimba','waktu','checker'));
          }
          else
          {
               $checker=2;
         		foreach ($target as $key => $arr)
         		{
         			foreach ($arr as $i => $val) 
         			{
         				if(!empty($arr->id_sales) && $arr->id_sales == '1')
         				{
                        $johan['id']=$arr->id_sales;
         					if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
         					{
         						$johan['counterpain'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
         					{
         						$johan['tempra'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
         					{
         						$johan['vitamin'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
         					{
         						$johan['ellgy'] = $arr->total_target;
         					}
         				}
         				else if(!empty($arr->id_sales) && $arr->id_sales == '2')
         				{
                         $jose['id']=$arr->id_sales;
         					if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
         					{
         						$jose['counterpain'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
         					{
         						$jose['tempra'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
         					{
         						$jose['vitamin'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
         					{
         						$jose['ellgy'] = $arr->total_target;
         					}
         				}
         				else if(!empty($arr->id_sales) && $arr->id_sales == '3')
         				{
                         $jhony['id']=$arr->id_sales;
         					if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
         					{
         						$jhony['counterpain'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
         					{
         						$jhony['tempra'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
         					{
         						$jhony['vitamin'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
         					{
         						$jhony['ellgy'] = $arr->total_target;
         					}
         				}
         				else if(!empty($arr->id_sales) && $arr->id_sales == '4')
         				{ 
                        $besli['id']=$arr->id_sales;
         					if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
         					{
         						$besli['counterpain'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
         					{
         						$besli['tempra'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
         					{
         						$besli['vitamin'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
         					{
         						$besli['ellgy'] = $arr->total_target;
         					}
         				}
         				else if(!empty($arr->id_sales) && $arr->id_sales == '5')
         				{
                         $yusman['id']=$arr->id_sales;
         					if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
         					{
         						$yusman['counterpain'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
         					{
         						$yusman['tempra'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
         					{
         						$yusman['vitamin'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
         					{
         						$yusman['ellgy'] = $arr->total_target;
         					}
         				}
         				else if(!empty($arr->id_sales) && $arr->id_sales == '6')
         				{
                         $rimba['id']=$arr->id_sales;
         					if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
         					{
         						$rimba['counterpain'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
         					{
         						$rimba['tempra'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
         					{
         						$rimba['vitamin'] = $arr->total_target;
         					}
         					else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
         					{
         						$rimba['ellgy'] = $arr->total_target;
         					}
         				}
         			}
         		}
         }
   		return view('lihattarget',compact('johan','jose','jhony','besli','yusman','rimba','waktu','checker'));
      }

   }

   public function updatetarget($id_sales, $bulan, $tahun)
   {
      $sales = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);

      $waktu = array('bulanid'=>'','bulan'=>'', 'tahun'=>'');

      $daftarsales = DB::table('sales')->get();
      
      $target = DB::table('targets')->where([
            ['id_sales','=',$id_sales],
            ['bulan','=',$bulan],
            ['tahun','=',$tahun],
         ])->get();

      $dataid_sales=$id_sales;
          
         $waktu['bulanid'] = $bulan;
         $waktu['bulan'] = $bulan;
         $waktu['tahun'] = $tahun;

               if($waktu['bulan'] == '1')
               {
                  $waktu['bulan']='Januari';
               }
               else if( $waktu['bulan'] == '2') 
               {
                  $waktu['bulan']='Februari';
               }
               else if($waktu['bulan'] == '3') 
               {
                  $waktu['bulan']='Maret';
               }
               else if($waktu['bulan'] == '4') 
               {
                  $waktu['bulan']='April';
               }
               else if($waktu['bulan'] == '5') 
               {
                  $waktu['bulan']='Mei';
               }
               else if($waktu['bulan'] == '6') 
               {
                  $waktu['bulan']='Juni';
               }
               else if($waktu['bulan']== '7') 
               {
                  $waktu['bulan']='Juli';
               }
               else if($waktu['bulan'] == '8') 
               {
                  $waktu['bulan']='Agustus';
               }
               else if($waktu['bulan'] == '9') 
               {
                  $waktu['bulan']='September';
               }
               else if($waktu['bulan'] == '10') 
               {
                  $waktu['bulan']='Oktober';
               }
               else if($waktu['bulan'] == '11') 
               {
                  $waktu['bulan']='November';
               }
               else if($waktu['bulan'] == '12') 
               {
                  $waktu['bulan']='Desember';
               }


         foreach ($target as $key => $arr)
         {
            foreach ($arr as $i => $val) 
            {
               if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
               {
                  $sales['counterpain'] = $arr->total_target;
               }
               else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
               {
                  $sales['tempra'] = $arr->total_target;
               }
               else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
               {
                  $sales['vitamin'] = $arr->total_target;
               }
               else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
               {
                  $sales['ellgy'] = $arr->total_target;
               }
            }
         }

      return view('updatetarget',compact('sales','daftarsales','dataid_sales','waktu'));
   }

   public function prosesupdatetarget()
   {        
            if(empty(Input::get('counterpain')) || empty(Input::get('tempra')) || empty(Input::get('vitamin')) || empty(Input::get('ellgy')))  
            { 
               return Redirect::to('/target')->with('message','Isi target!');
            }
            else
            {

               $data = array(
                  'total_target' => trim(Input::get('counterpain')),
               );
               DB::table('targets')->where([
                     ['id_sales','=',Input::get('id_sales')],
                     ['id_grup_produk','=',1],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($data);

               $data = array(
                  'total_target' => trim(Input::get('tempra')),
               );
               DB::table('targets')->where([
                     ['id_sales','=',Input::get('id_sales')],
                     ['id_grup_produk','=',2],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($data);

               $data = array(
                  'total_target' => trim(Input::get('vitamin')),
               );
              DB::table('targets')->where([
                     ['id_sales','=',Input::get('id_sales')],
                     ['id_grup_produk','=',3],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($data);

               $data = array(
                  'total_target' => trim(Input::get('ellgy')),
               );
              DB::table('targets')->where([
                     ['id_sales','=',Input::get('id_sales')],
                     ['id_grup_produk','=',4],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($data);

               return Redirect::to('/target')->with('message','Berhasil mengedit data.');
            }
   }
}
