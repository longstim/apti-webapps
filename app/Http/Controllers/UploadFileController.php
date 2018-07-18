<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Cell;
use DB;
Use Redirect;
use View;

class UploadFileController extends Controller
{
   public function __construct()
    {
        $this->middleware('authenticate');
        $this->middleware('sales');
    }

   public function index()
   {
      return view('uploadfile');
   }

   public function postUploadCsv(Request $request)
   {
      $target = DB::table('targets')->where([
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->get();

   if(empty($target) || count($target)!=24)
   {
      return Redirect::to('/home')->with('message','Tambah data target sales pada bulan '.date("M",mktime(0, 0, 0, Input::get('bulan'), 10)).' '.Input::get('tahun').' terlebih dahulu dengan lengkap.');
   }
   else
   {
      $file = $request->file('_file');
      $path = $file->getRealPath();
      $data = Excel::load($path, function($reader) {
         })->get();

      $worksheet = Excel::selectSheetsByIndex(0)->load($path, function($reader){
         })->get();

      foreach ($worksheet->toArray() as $row)
      {
         $temp[] = $row;
      }
      
      $johan = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $jose = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $jhony = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $besli = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $yusman = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);
      $rimba = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0);

      foreach ($temp as $key => $arr) 
      {
        
         foreach ($arr as $ind => $val) 
         {
            //echo 'ind1 = '.$key.' ';
            //echo 'ind2 = '.$ind.' ';
            if(!empty($val) && $ind == 'me_name' && trim($val) =='JOHAN')
            {
               if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'COUNTERPAIN')
               {
                  $johan['counterpain'] = $johan['counterpain']  + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'TEMPRA')
               {
                  $johan['tempra'] = $johan['tempra'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'VITAMIN')
               {
                  $johan['vitamin'] = $johan['vitamin'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'ELLGY')
               {
                  $johan['ellgy'] = $johan['ellgy'] + doubleval($temp[$key]['sales']);
               }
            }
            else if(!empty($val) && $ind == 'me_name' && trim($val) =='JOSE')
            {
               if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'COUNTERPAIN')
               {
                  $jose['counterpain'] = $jose['counterpain']  + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'TEMPRA')
               {
                  $jose['tempra'] = $jose['tempra'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'VITAMIN')
               {
                  $jose['vitamin'] = $jose['vitamin'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'ELLGY')
               {
                  $jose['ellgy'] = $jose['ellgy'] + doubleval($temp[$key]['sales']);
               }
            }
            else if(!empty($val) && $ind == 'me_name' && trim($val) =='JHONY')
            {
               if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'COUNTERPAIN')
               {
                  $jhony['counterpain'] = $jhony['counterpain']  + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'TEMPRA')
               {
                  $jhony['tempra'] = $jhony['tempra'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'VITAMIN')
               {
                  $jhony['vitamin'] = $jhony['vitamin'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'ELLGY')
               {
                  $jhony['ellgy'] = $jhony['ellgy'] + doubleval($temp[$key]['sales']);
               }
            }
            else if(!empty($val) && $ind == 'me_name' && trim($val) =='BESLI')
            {
               if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'COUNTERPAIN')
               {
                  $besli['counterpain'] = $besli['counterpain']  + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'TEMPRA')
               {
                  $besli['tempra'] = $besli['tempra'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'VITAMIN')
               {
                  $besli['vitamin'] = $besli['vitamin'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'ELLGY')
               {
                  $besli['ellgy'] = $besli['ellgy'] + doubleval($temp[$key]['sales']);
               }
            }
            else if(!empty($val) && $ind == 'me_name' && trim($val) =='YUSMAN')
            {
               if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'COUNTERPAIN')
               {
                  $yusman['counterpain'] = $yusman['counterpain']  + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'TEMPRA')
               {
                  $yusman['tempra'] = $yusman['tempra'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'VITAMIN')
               {
                  $yusman['vitamin'] = $yusman['vitamin'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'ELLGY')
               {
                  $yusman['ellgy'] = $yusman['ellgy'] + doubleval($temp[$key]['sales']);
               }
            }
            else if(!empty($val) && $ind == 'me_name' && trim($val) =='RIMBA')
            {
               if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'COUNTERPAIN')
               {
                  $rimba['counterpain'] = $rimba['counterpain']  + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'TEMPRA')
               {
                  $rimba['tempra'] = $rimba['tempra'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'VITAMIN')
               {
                  $rimba['vitamin'] = $rimba['vitamin'] + doubleval($temp[$key]['sales']);
               }
               else if(!empty($temp[$key]['product_group']) && $temp[$key]['product_group'] == 'ELLGY')
               {
                  $rimba['ellgy'] = $rimba['ellgy'] + doubleval($temp[$key]['sales']);
               }
            }
         }

      }


      foreach ($johan as $i => $val) 
      {
         if($i=='counterpain')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',1],
               ['id_grup_produk','=',1],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 1,
                  'id_grup_produk' => 1,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $johan['counterpain'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $johan['counterpain'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',1],
                  ['id_grup_produk','=',1],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='tempra')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',1],
               ['id_grup_produk','=',2],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 1,
                  'id_grup_produk' => 2,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $johan['tempra'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $johan['tempra'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',1],
                  ['id_grup_produk','=',2],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='vitamin')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',1],
               ['id_grup_produk','=',3],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 1,
                  'id_grup_produk' => 3,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $johan['vitamin'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $johan['vitamin'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',1],
                  ['id_grup_produk','=',3],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='ellgy')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',1],
               ['id_grup_produk','=',4],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 1,
                  'id_grup_produk' => 4,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $johan['ellgy'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $johan['ellgy'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',1],
                  ['id_grup_produk','=',4],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
      }

      foreach ($jose as $i => $val) 
      {
         if($i=='counterpain')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',2],
               ['id_grup_produk','=',1],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 2,
                  'id_grup_produk' => 1,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $jose['counterpain'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $jose['counterpain'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',2],
                  ['id_grup_produk','=',1],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='tempra')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',2],
               ['id_grup_produk','=',2],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 2,
                  'id_grup_produk' => 2,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $jose['tempra'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $jose['tempra'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',2],
                  ['id_grup_produk','=',2],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='vitamin')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',2],
               ['id_grup_produk','=',3],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 2,
                  'id_grup_produk' => 3,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $jose['vitamin'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $jose['vitamin'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',2],
                  ['id_grup_produk','=',3],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='ellgy')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',2],
               ['id_grup_produk','=',4],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 2,
                  'id_grup_produk' => 4,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $jose['ellgy'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $jose['ellgy'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',2],
                  ['id_grup_produk','=',4],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
      }


      foreach ($jhony as $i => $val) 
      {
         if($i=='counterpain')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',3],
               ['id_grup_produk','=',1],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 3,
                  'id_grup_produk' => 1,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $jhony['counterpain'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $jhony['counterpain'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',3],
                  ['id_grup_produk','=',1],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='tempra')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',3],
               ['id_grup_produk','=',2],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 3,
                  'id_grup_produk' => 2,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $jhony['tempra'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $jhony['tempra'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',3],
                  ['id_grup_produk','=',2],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='vitamin')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',3],
               ['id_grup_produk','=',3],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 3,
                  'id_grup_produk' => 3,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $jhony['vitamin'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $jhony['vitamin'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',3],
                  ['id_grup_produk','=',3],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='ellgy')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',3],
               ['id_grup_produk','=',4],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 3,
                  'id_grup_produk' => 4,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $jhony['ellgy'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $jhony['ellgy'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',3],
                  ['id_grup_produk','=',4],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
      }


      foreach ($besli as $i => $val) 
      {
         if($i=='counterpain')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',4],
               ['id_grup_produk','=',1],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 4,
                  'id_grup_produk' => 1,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $besli['counterpain'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $besli['counterpain'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',4],
                  ['id_grup_produk','=',1],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='tempra')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',4],
               ['id_grup_produk','=',2],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 4,
                  'id_grup_produk' => 2,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $besli['tempra'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $besli['tempra'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',4],
                  ['id_grup_produk','=',2],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='vitamin')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',4],
               ['id_grup_produk','=',3],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 4,
                  'id_grup_produk' => 3,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $besli['vitamin'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $besli['vitamin'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',4],
                  ['id_grup_produk','=',3],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='ellgy')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',4],
               ['id_grup_produk','=',4],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 4,
                  'id_grup_produk' => 4,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $besli['ellgy'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $besli['ellgy'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',4],
                  ['id_grup_produk','=',4],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
      }


      foreach ($yusman as $i => $val) 
      {
         if($i=='counterpain')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',5],
               ['id_grup_produk','=',1],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 5,
                  'id_grup_produk' => 1,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $yusman['counterpain'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $yusman['counterpain'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',5],
                  ['id_grup_produk','=',1],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='tempra')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',5],
               ['id_grup_produk','=',2],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 5,
                  'id_grup_produk' => 2,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $yusman['tempra'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $yusman['tempra'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',5],
                  ['id_grup_produk','=',2],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='vitamin')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',5],
               ['id_grup_produk','=',3],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 5,
                  'id_grup_produk' => 3,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $yusman['vitamin'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $yusman['vitamin'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',5],
                  ['id_grup_produk','=',3],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='ellgy')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',5],
               ['id_grup_produk','=',4],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 5,
                  'id_grup_produk' => 4,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $yusman['ellgy'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $yusman['ellgy'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',5],
                  ['id_grup_produk','=',4],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
      }


      foreach ($rimba as $i => $val) 
      {
         if($i=='counterpain')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',6],
               ['id_grup_produk','=',1],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 6,
                  'id_grup_produk' => 1,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $rimba['counterpain'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $rimba['counterpain'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',6],
                  ['id_grup_produk','=',1],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='tempra')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',6],
               ['id_grup_produk','=',2],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 6,
                  'id_grup_produk' => 2,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $rimba['tempra'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $rimba['tempra'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',6],
                  ['id_grup_produk','=',2],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='vitamin')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',6],
               ['id_grup_produk','=',3],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 6,
                  'id_grup_produk' => 3,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $rimba['vitamin'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $rimba['vitamin'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',6],
                  ['id_grup_produk','=',3],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
         else if($i=='ellgy')
         {
            $checkdata = DB::table('pencapaians')->where([
               ['id_sales','=',6],
               ['id_grup_produk','=',4],
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($checkdata) || $checkdata == NULL || count($checkdata) == 0)
            {
               $data = array(
                  'id_sales' => 6,
                  'id_grup_produk' => 4,
                  'bulan' => Input::get('bulan'),
                  'tahun' => Input::get('tahun'),
                  'total_pencapaian' => $rimba['ellgy'],
               );
       
               DB::table('pencapaians')->insert($data);
            }
            else
            {
                $valuedata = array(
                  'total_pencapaian' => $rimba['ellgy'],
               );
       
               DB::table('pencapaians')->where([
                  ['id_sales','=',6],
                  ['id_grup_produk','=',4],
                  ['bulan','=',Input::get('bulan')],
                  ['tahun','=',Input::get('tahun')],
               ])->update($valuedata);
            }
         }
      }

      return $this->hitungincentive($johan,$jose,$jhony,$besli,$yusman,$rimba);
   }
      
   }

   public function hitungincentive($johan_par,$jose_par,$jhony_par,$besli_par,$yusman_par,$rimba_par)
   {

         $johan = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
         $jose = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
         $jhony = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
         $besli = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
         $yusman = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
         $rimba = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);

         $waktu = array('bulan'=>'', 'tahun'=>Input::get('tahun'));

         if(Input::get('bulan') == '1')
         {
            $waktu['bulan']='Januari';
         }
         else if(Input::get('bulan') == '2') 
         {
            $waktu['bulan']='Februari';
         }
         else if(Input::get('bulan') == '3') 
         {
            $waktu['bulan']='Maret';
         }
         else if(Input::get('bulan') == '4') 
         {
            $waktu['bulan']='April';
         }
         else if(Input::get('bulan') == '5') 
         {
            $waktu['bulan']='Mei';
         }
         else if(Input::get('bulan') == '6') 
         {
            $waktu['bulan']='Juni';
         }
         else if(Input::get('bulan') == '7') 
         {
            $waktu['bulan']='Juli';
         }
         else if(Input::get('bulan') == '8') 
         {
            $waktu['bulan']='Agustus';
         }
         else if(Input::get('bulan') == '9') 
         {
            $waktu['bulan']='September';
         }
         else if(Input::get('bulan') == '10') 
         {
            $waktu['bulan']='Oktober';
         }
         else if(Input::get('bulan') == '11') 
         {
            $waktu['bulan']='November';
         }
         else if(Input::get('bulan') == '12') 
         {
            $waktu['bulan']='Desember';
         }

    
         $johan['counterpain']=$johan_par['counterpain'];
         $target = DB::table('targets')->where([
            ['id_sales','=',1],
            ['id_grup_produk','=',1],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $johan['persencounterpain']=number_format(doubleval($johan['counterpain'])/doubleval($target->total_target)*100,0);
               
         $johan['tempra']=$johan_par['tempra'];
         $target = DB::table('targets')->where([
            ['id_sales','=',1],
            ['id_grup_produk','=',2],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $johan['persentempra']=number_format(doubleval($johan['tempra'])/doubleval($target->total_target)*100,0);
                  
         $johan['vitamin']=$johan_par['vitamin'];
         $target = DB::table('targets')->where([
            ['id_sales','=',1],
            ['id_grup_produk','=',3],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $johan['persenvitamin']=number_format(doubleval($johan['vitamin'])/doubleval($target->total_target)*100,0);
               
         $johan['ellgy']=$johan_par['ellgy'];
         $target = DB::table('targets')->where([
            ['id_sales','=',1],
            ['id_grup_produk','=',4],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $johan['persenellgy']=number_format(doubleval($johan['ellgy'])/doubleval($target->total_target)*100,0);
            
               $totalperseninc = $johan['persencounterpain']+$johan['tempra'] +$johan['vitamin']+$johan['ellgy'];

               $incounterpain = 0.0;
               $inctempra = 0.0;
               $incvitamin = 0.0;
               $incellgy = 0.0;
               $totinc105 = 3800000;
               $totinc95 = 3000000;

                  if($johan['persencounterpain']>105)
                  {
                     $incounterpain = (35/100)*$totinc105;
                  }
                  else if($johan['persencounterpain']>95 && $johan['persencounterpain']<=104 )
                  {
                     $incounterpain = (35/100)*$totinc95;
                  }

                  if($johan['persentempra']>105)
                  {
                     $inctempra = (25/100)*$totinc105;
                  }
                  else if($johan['persentempra']>95 && $johan['persentempra']<=104 )
                  {
                     $inctempra = (25/100)*$totinc95;
                  }

                  if($johan['persenvitamin']>105)
                  {
                     $incvitamin = (20/100)*$totinc105;
                  }
                  else if($johan['persenvitamin']>95 && $johan['persenvitamin']<=104 )
                  {
                     $incvitamin = (20/100)*$totinc95;
                  }

                  if($johan['persenellgy']>105)
                  {
                     $incellgy = (20/100)*$totinc105;
                  }
                  else if($johan['persenellgy']>95 && $johan['persenellgy']<=104 )
                  {
                     $incellgy = (20/100)*$totinc95;
                  }

                  $johan['incentive']=$incounterpain + $inctempra + $incvitamin + $incellgy;

               $val = array(
                  'incentive' => $incounterpain,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',1],
                     ['id_grup_produk','=',1],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $inctempra,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',1],
                     ['id_grup_produk','=',2],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incvitamin,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',1],
                     ['id_grup_produk','=',3],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incellgy,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',1],
                     ['id_grup_produk','=',4],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

                     
         //JOSE TOTAL INCENTIVE

         $jose['counterpain']=$jose_par['counterpain'];
            $target= DB::table('targets')->where([
            ['id_sales','=',2],
            ['id_grup_produk','=',1],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();   
         $jose['persencounterpain']=number_format(doubleval($jose['counterpain'])/doubleval($target->total_target)*100,0);
                  
         $jose['tempra']=$jose_par['tempra'];
         $target= DB::table('targets')->where([
            ['id_sales','=',2],
            ['id_grup_produk','=',2],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $jose['persentempra']=number_format(doubleval($jose['tempra'])/doubleval($target->total_target)*100,0);
            
         $jose['vitamin']=$jose_par['vitamin'];
         $target = DB::table('targets')->where([
            ['id_sales','=',2],
            ['id_grup_produk','=',3],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $jose['persenvitamin']=number_format(doubleval($jose['vitamin'])/doubleval($target->total_target)*100,0);
                  
         $jose['ellgy']=$jose_par['ellgy'];
         $target= DB::table('targets')->where([
            ['id_sales','=',2],
            ['id_grup_produk','=',4],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $jose['persenellgy']=number_format(doubleval($jose['ellgy'])/doubleval($target->total_target)*100,0);
                  
               $incounterpain=0.0;
               $inctempra=0.0;
               $incvitamin=0.0;
               $incellgy=0.0;
               $totinc105=3800000;
               $totinc95=3000000;

                  if($jose['persencounterpain']>105)
                  {
                     $incounterpain = (35/100)*$totinc105;
                  }
                  else if($jose['persencounterpain']>95 && $jose['persencounterpain']<=104)
                  {
                     $incounterpain = (35/100)*$totinc95;
                  }

                  if($jose['persentempra']>105)
                  {
                     $inctempra = (25/100)*$totinc105;
                  }
                  else if($jose['persentempra']>95 && $jose['persentempra']<=104 )
                  {
                     $inctempra = (25/100)*$totinc95;
                  }

                  if($jose['persenvitamin']>105)
                  {
                     $incvitamin = (20/100)*$totinc105;
                  }
                  else if($jose['persenvitamin']>95 && $jose['persenvitamin']<=104 )
                  {
                     $incvitamin = (20/100)*$totinc95;
                  }

                  if($jose['persenellgy']>105)
                  {
                     $incellgy = (20/100)*$totinc105;
                  }
                  else if($jose['persenellgy']>95 && $jose['persenellgy']<=104)
                  {
                     $incellgy = (20/100)*$totinc95;
                  }

                  $jose['incentive']=$incounterpain + $inctempra + $incvitamin + $incellgy;

               $val = array(
                  'incentive' => $incounterpain,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',2],
                     ['id_grup_produk','=',1],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $inctempra,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',2],
                     ['id_grup_produk','=',2],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incvitamin,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',2],
                     ['id_grup_produk','=',3],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incellgy,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',2],
                     ['id_grup_produk','=',4],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);


         //JHONY TOTAL INCENTIVE

         $jhony['counterpain']=$jhony_par['counterpain'];
         $target= DB::table('targets')->where([
            ['id_sales','=',3],
            ['id_grup_produk','=',1],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $jhony['persencounterpain']=number_format(doubleval($jhony['counterpain'])/doubleval($target->total_target)*100,0);
                  
         $jhony['tempra']=$jhony_par['tempra'];
         $target= DB::table('targets')->where([
            ['id_sales','=',3],
            ['id_grup_produk','=',2],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $jhony['persentempra']=number_format(doubleval($jhony['tempra'])/doubleval($target->total_target)*100,0);
                  
         $jhony['vitamin']=$jhony_par['vitamin'];
         $target = DB::table('targets')->where([
            ['id_sales','=',3],
            ['id_grup_produk','=',3],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $jhony['persenvitamin']=number_format(doubleval($jhony['vitamin'])/doubleval($target->total_target)*100,0);

         $jhony['ellgy']=$jhony_par['ellgy'];
         $target= DB::table('targets')->where([
            ['id_sales','=',3],
            ['id_grup_produk','=',4],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $jhony['persenellgy']=number_format(doubleval($jhony['ellgy'])/doubleval($target->total_target)*100,0);
                  
               $incounterpain=0.0;
               $inctempra=0.0;
               $incvitamin=0.0;
               $incellgy=0.0;
               $totinc105=3800000;
               $totinc95=3000000;

                  if($jhony['persencounterpain']>105)
                  {
                     $incounterpain = (35/100)*$totinc105;
                  }
                  else if($jhony['persencounterpain']>95 && $jhony['persencounterpain']<=104 )
                  {
                     $incounterpain = (35/100)*$totinc95;
                  }

                  if($jhony['persentempra']>105)
                  {
                     $inctempra = (25/100)*$totinc105;
                  }
                  else if($jhony['persentempra']>95 && $jhony['persentempra']<=104 )
                  {
                     $inctempra = (25/100)*$totinc95;
                  }

                  if($jhony['persenvitamin']>105)
                  {
                     $incvitamin = (20/100)*$totinc105;
                  }
                  else if($jhony['persenvitamin']>95 && $jhony['persenvitamin']<=104 )
                  {
                     $incvitamin = (20/100)*$totinc95;
                  }

                  if($jhony['persenellgy']>105)
                  {
                     $incellgy = (20/100)*$totinc105;
                  }
                  else if($jhony['persenellgy']>95 && $jhony['persenellgy']<=104 )
                  {
                     $incellgy = (20/100)*$totinc95;
                  }

                  $jhony['incentive']=$incounterpain + $inctempra + $incvitamin + $incellgy;
                  
               $val = array(
                  'incentive' => $incounterpain,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',3],
                     ['id_grup_produk','=',1],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $inctempra,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',3],
                     ['id_grup_produk','=',2],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incvitamin,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',3],
                     ['id_grup_produk','=',3],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incellgy,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',3],
                     ['id_grup_produk','=',4],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

         //BESLI TOTAL INCENTIVE

         $besli['counterpain']=$besli_par['counterpain'];
         $target= DB::table('targets')->where([
            ['id_sales','=',4],
            ['id_grup_produk','=',1],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $besli['persencounterpain']=number_format(doubleval($besli['counterpain'])/doubleval($target->total_target)*100,0);
                  
         $besli['tempra']=$besli_par['tempra'];
         $target= DB::table('targets')->where([
            ['id_sales','=',4],
            ['id_grup_produk','=',2],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $besli['persentempra']=number_format(doubleval($besli['tempra'])/doubleval($target->total_target)*100,0);

         $besli['vitamin']=$besli_par['vitamin'];
         $target = DB::table('targets')->where([
            ['id_sales','=',4],
            ['id_grup_produk','=',3],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $besli['persenvitamin']=number_format(doubleval($besli['vitamin'])/doubleval($target->total_target)*100,0);
                  
         $besli['ellgy']=$besli_par['ellgy'];
         $target= DB::table('targets')->where([
            ['id_sales','=',4],
            ['id_grup_produk','=',4],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $besli['persenellgy']=number_format(doubleval($besli['ellgy'])/doubleval($target->total_target)*100,0);
                  
               $incounterpain=0.0;
               $inctempra=0.0;
               $incvitamin=0.0;
               $incellgy=0.0;
               $totinc105=3800000;
               $totinc95=3000000;

                  if($besli['persencounterpain']>105)
                  {
                     $incounterpain = (35/100)*$totinc105;
                  }
                  else if($besli['persencounterpain']>95 && $besli['persencounterpain']<=104 )
                  {
                     $incounterpain = (35/100)*$totinc95;
                  }

                  if($besli['persentempra']>105)
                  {
                     $inctempra = (25/100)*$totinc105;
                  }
                  else if($besli['persentempra']>95 && $besli['persentempra']<=104 )
                  {
                     $inctempra = (25/100)*$totinc95;
                  }

                  if($besli['persenvitamin']>105)
                  {
                     $incvitamin = (20/100)*$totinc105;
                  }
                  else if($besli['persenvitamin']>95 && $besli['persenvitamin']<=104 )
                  {
                     $incvitamin = (20/100)*$totinc95;
                  }

                  if($besli['persenellgy']>105)
                  {
                     $incellgy = (20/100)*$totinc105;
                  }
                  else if($besli['persenellgy']>95 && $besli['persenellgy']<=104 )
                  {
                     $incellgy = (20/100)*$totinc95;
                  }

                  $besli['incentive']=$incounterpain + $inctempra + $incvitamin + $incellgy;
                  
               $val = array(
                  'incentive' => $incounterpain,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',4],
                     ['id_grup_produk','=',1],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $inctempra,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',4],
                     ['id_grup_produk','=',2],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incvitamin,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',4],
                     ['id_grup_produk','=',3],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incellgy,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',4],
                     ['id_grup_produk','=',4],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
               ])->update($val);
               
         // YUSMAN TOTAL INCENTIVE

         $yusman['counterpain']=$yusman_par['counterpain'];
         $target= DB::table('targets')->where([
            ['id_sales','=',5],
            ['id_grup_produk','=',1],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $yusman['persencounterpain']=number_format(doubleval($yusman['counterpain'])/doubleval($target->total_target)*100,0);
                  

         $yusman['tempra']=$yusman_par['tempra'];
         $target= DB::table('targets')->where([
            ['id_sales','=',5],
            ['id_grup_produk','=',2],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $yusman['persentempra']=number_format(doubleval($yusman['tempra'])/doubleval($target->total_target)*100,0);
               
         $yusman['vitamin']=$yusman_par['vitamin'];
         $target = DB::table('targets')->where([
            ['id_sales','=',5],
            ['id_grup_produk','=',3],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $yusman['persenvitamin']=number_format(doubleval($yusman['vitamin'])/doubleval($target->total_target)*100,0);

         $yusman['ellgy']=$yusman_par['ellgy'];
         $target= DB::table('targets')->where([
            ['id_sales','=',5],
            ['id_grup_produk','=',4],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $yusman['persenellgy']=number_format(doubleval($yusman['ellgy'])/doubleval($target->total_target)*100,0);
                  
               $incounterpain=0.0;
               $inctempra=0.0;
               $incvitamin=0.0;
               $incellgy=0.0;
               $totinc105=3800000;
               $totinc95=3000000;

                  if($yusman['persencounterpain']>105)
                  {
                     $incounterpain = (35/100)*$totinc105;
                  }
                  else if($yusman['persencounterpain']>95 && $yusman['persencounterpain']<=104 )
                  {
                     $incounterpain = (35/100)*$totinc95;
                  }

                  if($yusman['persentempra']>105)
                  {
                     $inctempra = (25/100)*$totinc105;
                  }
                  else if($yusman['persentempra']>95 && $yusman['persentempra']<=104 )
                  {
                     $inctempra = (25/100)*$totinc95;
                  }

                  if($yusman['persenvitamin']>105)
                  {
                     $incvitamin = (20/100)*$totinc105;
                  }
                  else if($yusman['persenvitamin']>95 && $yusman['persenvitamin']<=104 )
                  {
                     $incvitamin = (20/100)*$totinc95;
                  }

                  if($yusman['persenellgy']>105)
                  {
                     $incellgy = (20/100)*$totinc105;
                  }
                  else if($yusman['persenellgy']>95 && $yusman['persenellgy']<=104 )
                  {
                     $incellgy = (20/100)*$totinc95;
                  }

                  $yusman['incentive']=$incounterpain + $inctempra + $incvitamin + $incellgy;

               $val = array(
                  'incentive' => $incounterpain,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',5],
                     ['id_grup_produk','=',1],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $inctempra,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',5],
                     ['id_grup_produk','=',2],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incvitamin,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',5],
                     ['id_grup_produk','=',3],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incellgy,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',5],
                     ['id_grup_produk','=',4],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
               ])->update($val);

         //RIMBA TOTAL INCENTIVE
                     
         $rimba['counterpain']=$rimba_par['counterpain'];
         $target= DB::table('targets')->where([
            ['id_sales','=',6],
            ['id_grup_produk','=',1],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $rimba['persencounterpain']=number_format(doubleval($rimba['counterpain'])/doubleval($target->total_target)*100,0);

         $rimba['tempra']=$rimba_par['tempra'];
         $target= DB::table('targets')->where([
            ['id_sales','=',6],
            ['id_grup_produk','=',2],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $rimba['persentempra']=number_format(doubleval($rimba['tempra'])/doubleval($target->total_target)*100,0);

         $rimba['vitamin']=$rimba_par['vitamin'];
         $target = DB::table('targets')->where([
            ['id_sales','=',6],
            ['id_grup_produk','=',3],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $rimba['persenvitamin']=number_format(doubleval($rimba['vitamin'])/doubleval($target->total_target)*100,0);

         $rimba['ellgy']=$rimba_par['ellgy'];
         $target= DB::table('targets')->where([
            ['id_sales','=',6],
            ['id_grup_produk','=',4],
            ['bulan','=',Input::get('bulan')],
            ['tahun','=',Input::get('tahun')],
         ])->first();
         $rimba['persenellgy']=number_format(doubleval($rimba['ellgy'])/doubleval($target->total_target)*100,0);
                  
               $incounterpain=0.0;
               $inctempra=0.0;
               $incvitamin=0.0;
               $incellgy=0.0;
               $totinc105=3800000;
               $totinc95=3000000;

                  if($rimba['persencounterpain']>105)
                  {
                     $incounterpain = (35/100)*$totinc105;
                  }
                  else if($rimba['persencounterpain']>95 && $rimba['persencounterpain']<=104 )
                  {
                     $incounterpain = (35/100)*$totinc95;
                  }

                  if($rimba['persentempra']>105)
                  {
                     $inctempra = (25/100)*$totinc105;
                  }
                  else if($rimba['persentempra']>95 && $rimba['persentempra']<=104 )
                  {
                     $inctempra = (25/100)*$totinc95;
                  }

                  if($rimba['persenvitamin']>105)
                  {
                     $incvitamin = (20/100)*$totinc105;
                  }
                  else if($rimba['persenvitamin']>95 && $rimba['persenvitamin']<=104 )
                  {
                     $incvitamin = (20/100)*$totinc95;
                  }

                  if($rimba['persenellgy']>105)
                  {
                     $incellgy = (20/100)*$totinc105;
                  }
                  else if($rimba['persenellgy']>95 && $rimba['persenellgy']<=104 )
                  {
                     $incellgy = (20/100)*$totinc95;
                  }

                  $rimba['incentive']=$incounterpain + $inctempra + $incvitamin + $incellgy;

               $val = array(
                  'incentive' => $incounterpain,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',6],
                     ['id_grup_produk','=',1],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $inctempra,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',6],
                     ['id_grup_produk','=',2],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incvitamin,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',6],
                     ['id_grup_produk','=',3],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

               $val = array(
                  'incentive' => $incellgy,
               );
               DB::table('pencapaians')->where([
                     ['id_sales','=',6],
                     ['id_grup_produk','=',4],
                     ['bulan','=',Input::get('bulan')],
                     ['tahun','=',Input::get('tahun')],
                  ])->update($val);

       return view('/report', compact('johan','jose','jhony','besli','yusman','rimba','waktu'));
      //dd($johan);
   }
}