<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use DB;
Use Redirect;
use View;

class IncentiveController extends Controller
{

    public function __construct()
    {
        $this->middleware('authenticate');
    }

   public function index()
   {
   		return view('incentive');
   }

   public function incentivereport()
   {

   	 	$johan = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
      	$jose = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
      	$jhony = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
      	$besli = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
      	$yusman = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);
      	$rimba = array('counterpain'=>0.0, 'tempra'=>0.0, 'vitamin'=>0.0, 'ellgy'=>0.0, 'persencounterpain'=>0.0,'persentempra'=>0.0,'persenvitamin'=>0.0,'persenellgy'=>0.0,'incentive'=>0.0);

               $waktu = array('bulan'=>'', 'tahun'=>'');

            $sales = DB::table('sales')->get();

   		$pencapaian = DB::table('pencapaians')->get();
   		foreach ($pencapaian->toArray() as $row)
	    {
	         $temp[] = $row;
	    }

	    	//dd($pencapaian);

   		foreach ($temp as $key => $arr) 
      	{
       		foreach ($arr as $ind => $val) 
         	      {
                        $waktu['bulan'] = $arr->bulan;
                        $waktu['tahun'] = $arr->tahun;

	   		if(!empty($arr->id_sales) && $arr->id_sales =='1')
            	{
            		if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
            		{
            			$johan['counterpain']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',1],
			               ['id_grup_produk','=',1],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$johan['persencounterpain']=number_format(doubleval($johan['counterpain'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
            		{
            			$johan['tempra']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',1],
			               ['id_grup_produk','=',2],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$johan['persentempra']=number_format(doubleval($johan['tempra'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
            		{
            			$johan['vitamin']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',1],
			               ['id_grup_produk','=',3],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$johan['persenvitamin']=number_format(doubleval($johan['vitamin'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
            		{
            			$johan['ellgy']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',1],
			               ['id_grup_produk','=',4],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$johan['persenellgy']=number_format(doubleval($johan['ellgy'])/doubleval($target->total_target)*100,0);
            		}

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

            	}


            	if(!empty($arr->id_sales) && $arr->id_sales=='2')
            	{
            		if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
            		{
            			$jose['counterpain']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',2],
			               ['id_grup_produk','=',1],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$jose['persencounterpain']=number_format(doubleval($jose['counterpain'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
            		{
            			$jose['tempra']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',2],
			               ['id_grup_produk','=',2],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$jose['persentempra']=number_format(doubleval($jose['tempra'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
            		{
            			$jose['vitamin']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',2],
			               ['id_grup_produk','=',3],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$jose['persenvitamin']=number_format(doubleval($jose['vitamin'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
            		{
            			$jose['ellgy']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',2],
			               ['id_grup_produk','=',4],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$jose['persenellgy']=number_format(doubleval($jose['ellgy'])/doubleval($target->total_target)*100,0);
            		}
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

            	}

            	if(!empty($arr->id_sales) && $arr->id_sales=='3')
            	{
            		if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
            		{
            			$jhony['counterpain']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',3],
			               ['id_grup_produk','=',1],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$jhony['persencounterpain']=number_format(doubleval($jhony['counterpain'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
            		{
            			$jhony['tempra']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',3],
			               ['id_grup_produk','=',2],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$jhony['persentempra']=number_format(doubleval($jhony['tempra'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
            		{
            			$jhony['vitamin']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',3],
			               ['id_grup_produk','=',3],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$jhony['persenvitamin']=number_format(doubleval($jhony['vitamin'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
            		{
            			$jhony['ellgy']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',3],
			               ['id_grup_produk','=',4],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$jhony['persenellgy']=number_format(doubleval($jhony['ellgy'])/doubleval($target->total_target)*100,0);
            		}
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
            		
            	}


            	if(!empty($arr->id_sales) && $arr->id_sales=='4')
            	{
            		if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
            		{
            			$besli['counterpain']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',4],
			               ['id_grup_produk','=',1],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$besli['persencounterpain']=number_format(doubleval($besli['counterpain'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
            		{
            			$besli['tempra']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',4],
			               ['id_grup_produk','=',2],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$besli['persentempra']=number_format(doubleval($besli['tempra'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
            		{
            			$besli['vitamin']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',4],
			               ['id_grup_produk','=',3],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$besli['persenvitamin']=number_format(doubleval($besli['vitamin'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
            		{
            			$besli['ellgy']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',4],
			               ['id_grup_produk','=',4],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$besli['persenellgy']=number_format(doubleval($besli['ellgy'])/doubleval($target->total_target)*100,0);
            		}
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
            		
            	}

            	if(!empty($arr->id_sales) && $arr->id_sales=='5')
            	{
            		if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
            		{
            			$yusman['counterpain']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',5],
			               ['id_grup_produk','=',1],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$yusman['persencounterpain']=number_format(doubleval($yusman['counterpain'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
            		{
            			$yusman['tempra']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',5],
			               ['id_grup_produk','=',2],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$yusman['persentempra']=number_format(doubleval($yusman['tempra'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
            		{
            			$yusman['vitamin']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',5],
			               ['id_grup_produk','=',3],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$yusman['persenvitamin']=number_format(doubleval($yusman['vitamin'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
            		{
            			$yusman['ellgy']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',5],
			               ['id_grup_produk','=',4],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$yusman['persenellgy']=number_format(doubleval($yusman['ellgy'])/doubleval($target->total_target)*100,0);
            		}
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

            	}

            	if(!empty($arr->id_sales) && $arr->id_sales=='6')
            	{
            		if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
            		{
            			$rimba['counterpain']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',6],
			               ['id_grup_produk','=',1],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$rimba['persencounterpain']=number_format(doubleval($rimba['counterpain'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
            		{
            			$rimba['tempra']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',6],
			               ['id_grup_produk','=',2],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$rimba['persentempra']=number_format(doubleval($rimba['tempra'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
            		{
            			$rimba['vitamin']=$arr->total_pencapaian;

            			$target = DB::table('targets')->where([
			               ['id_sales','=',6],
			               ['id_grup_produk','=',3],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$rimba['persenvitamin']=number_format(doubleval($rimba['vitamin'])/doubleval($target->total_target)*100,0);
            		}
            		else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
            		{
            			$rimba['ellgy']=$arr->total_pencapaian;

            			$target= DB::table('targets')->where([
			               ['id_sales','=',6],
			               ['id_grup_produk','=',4],
                                 ['bulan','=',$arr->bulan],
                                 ['tahun','=',$arr->tahun],
            			])->first();

            			$rimba['persenellgy']=number_format(doubleval($rimba['ellgy'])/doubleval($target->total_target)*100,0);
            		}
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

            	}
	   	}
   	}
      $message=1;

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
  		
   	return view('incentive', compact('johan','jose','jhony','besli','yusman','rimba','sales','message','waktu'));
   }

      public function incentivereportsearch()
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

            $sales = DB::table('sales')->get();

            $pencapaian = DB::table('pencapaians')->where([
               ['bulan','=',Input::get('bulan')],
               ['tahun','=',Input::get('tahun')],
            ])->get();

            if(empty($pencapaian) || $pencapaian == NULL || count($pencapaian) == 0)
            {
                  $message=0;
                  return view('incentive', compact('message','sales','waktu'));
            } 
            else
            {
                  $message=1;

                  foreach ($pencapaian->toArray() as $row)
                {
                     $temp[] = $row;
                }

                  //dd($pencapaian);

                  foreach ($temp as $key => $arr) 
                  {
                        foreach ($arr as $ind => $val) 
                  {
                              if(!empty($arr->id_sales) && $arr->id_sales =='1')
                        {
                              if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
                              {
                                    $johan['counterpain']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',1],
                                       ['id_grup_produk','=',1],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $johan['persencounterpain']=number_format(doubleval($johan['counterpain'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
                              {
                                    $johan['tempra']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',1],
                                       ['id_grup_produk','=',2],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $johan['persentempra']=number_format(doubleval($johan['tempra'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
                              {
                                    $johan['vitamin']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',1],
                                       ['id_grup_produk','=',3],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $johan['persenvitamin']=number_format(doubleval($johan['vitamin'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
                              {
                                    $johan['ellgy']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',1],
                                       ['id_grup_produk','=',4],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $johan['persenellgy']=number_format(doubleval($johan['ellgy'])/doubleval($target->total_target)*100,0);
                              }

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

                        }


                        if(!empty($arr->id_sales) && $arr->id_sales=='2')
                        {
                              if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
                              {
                                    $jose['counterpain']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',2],
                                       ['id_grup_produk','=',1],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $jose['persencounterpain']=number_format(doubleval($jose['counterpain'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
                              {
                                    $jose['tempra']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',2],
                                       ['id_grup_produk','=',2],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $jose['persentempra']=number_format(doubleval($jose['tempra'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
                              {
                                    $jose['vitamin']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',2],
                                       ['id_grup_produk','=',3],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $jose['persenvitamin']=number_format(doubleval($jose['vitamin'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
                              {
                                    $jose['ellgy']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',2],
                                       ['id_grup_produk','=',4],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $jose['persenellgy']=number_format(doubleval($jose['ellgy'])/doubleval($target->total_target)*100,0);
                              }
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

                        }

                        if(!empty($arr->id_sales) && $arr->id_sales=='3')
                        {
                              if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
                              {
                                    $jhony['counterpain']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',3],
                                       ['id_grup_produk','=',1],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $jhony['persencounterpain']=number_format(doubleval($jhony['counterpain'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
                              {
                                    $jhony['tempra']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',3],
                                       ['id_grup_produk','=',2],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $jhony['persentempra']=number_format(doubleval($jhony['tempra'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
                              {
                                    $jhony['vitamin']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',3],
                                       ['id_grup_produk','=',3],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $jhony['persenvitamin']=number_format(doubleval($jhony['vitamin'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
                              {
                                    $jhony['ellgy']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',3],
                                       ['id_grup_produk','=',4],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $jhony['persenellgy']=number_format(doubleval($jhony['ellgy'])/doubleval($target->total_target)*100,0);
                              }
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
                              
                        }


                        if(!empty($arr->id_sales) && $arr->id_sales=='4')
                        {
                              if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
                              {
                                    $besli['counterpain']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',4],
                                       ['id_grup_produk','=',1],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $besli['persencounterpain']=number_format(doubleval($besli['counterpain'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
                              {
                                    $besli['tempra']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',4],
                                       ['id_grup_produk','=',2],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $besli['persentempra']=number_format(doubleval($besli['tempra'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
                              {
                                    $besli['vitamin']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',4],
                                       ['id_grup_produk','=',3],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $besli['persenvitamin']=number_format(doubleval($besli['vitamin'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
                              {
                                    $besli['ellgy']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',4],
                                       ['id_grup_produk','=',4],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $besli['persenellgy']=number_format(doubleval($besli['ellgy'])/doubleval($target->total_target)*100,0);
                              }
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
                              
                        }

                        if(!empty($arr->id_sales) && $arr->id_sales=='5')
                        {
                              if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
                              {
                                    $yusman['counterpain']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',5],
                                       ['id_grup_produk','=',1],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $yusman['persencounterpain']=number_format(doubleval($yusman['counterpain'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
                              {
                                    $yusman['tempra']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',5],
                                       ['id_grup_produk','=',2],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $yusman['persentempra']=number_format(doubleval($yusman['tempra'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
                              {
                                    $yusman['vitamin']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',5],
                                       ['id_grup_produk','=',3],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $yusman['persenvitamin']=number_format(doubleval($yusman['vitamin'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
                              {
                                    $yusman['ellgy']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',5],
                                       ['id_grup_produk','=',4],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $yusman['persenellgy']=number_format(doubleval($yusman['ellgy'])/doubleval($target->total_target)*100,0);
                              }
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

                        }

                        if(!empty($arr->id_sales) && $arr->id_sales=='6')
                        {
                              if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '1')
                              {
                                    $rimba['counterpain']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',6],
                                       ['id_grup_produk','=',1],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $rimba['persencounterpain']=number_format(doubleval($rimba['counterpain'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '2')
                              {
                                    $rimba['tempra']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',6],
                                       ['id_grup_produk','=',2],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $rimba['persentempra']=number_format(doubleval($rimba['tempra'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '3')
                              {
                                    $rimba['vitamin']=$arr->total_pencapaian;

                                    $target = DB::table('targets')->where([
                                       ['id_sales','=',6],
                                       ['id_grup_produk','=',3],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $rimba['persenvitamin']=number_format(doubleval($rimba['vitamin'])/doubleval($target->total_target)*100,0);
                              }
                              else if(!empty($arr->id_grup_produk) && $arr->id_grup_produk == '4')
                              {
                                    $rimba['ellgy']=$arr->total_pencapaian;

                                    $target= DB::table('targets')->where([
                                       ['id_sales','=',6],
                                       ['id_grup_produk','=',4],
                                       ['bulan','=',Input::get('bulan')],
                                       ['tahun','=',Input::get('tahun')],
                                    ])->first();

                                    $rimba['persenellgy']=number_format(doubleval($rimba['ellgy'])/doubleval($target->total_target)*100,0);
                              }
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

                        }
                  }
            }
            
             return view('incentive', compact('johan','jose','jhony','besli','yusman','rimba','sales','message','waktu'));
      }
   }

   public function cetaklaporan()
   {
      $pencapaian = DB::table('pencapaians')->select('bulan','tahun')
                                            ->where('id_sales','=',Input::get('id_sales'))
                                            ->orderBy('tahun','asc')
                                            ->orderBy('bulan','asc')
                                            ->distinct()
                                            ->get();
      $datasales = DB::table('sales')->where('id','=',Input::get('id_sales'))->first();
      $namasales = $datasales->nama;

      $datalaporan = array(array('bulan'=>'','tahun'=>'',array('totalpencapaian'=>0.0,'target'=>0.0,'ach'=>0,'incentive'=>0.0)));
      $totalpencapaianperbulan=0;

      foreach ($pencapaian->toArray() as $row)
      {
            $temp[] = $row;
      }
      
      $index=0;
      foreach ($temp as $key => $arr) 
      {
            $datalaporan[$index]['bulan']=$arr->bulan;

         if($datalaporan[$index]['bulan'] == '1')
         {
            $datalaporan[$index]['bulan']='Januari';
         }
         else if( $datalaporan[$index]['bulan'] == '2') 
         {
            $datalaporan[$index]['bulan']='Februari';
         }
         else if($datalaporan[$index]['bulan'] == '3') 
         {
            $datalaporan[$index]['bulan']='Maret';
         }
         else if($datalaporan[$index]['bulan'] == '4') 
         {
            $datalaporan[$index]['bulan']='April';
         }
         else if($datalaporan[$index]['bulan'] == '5') 
         {
            $datalaporan[$index]['bulan']='Mei';
         }
         else if($datalaporan[$index]['bulan'] == '6') 
         {
            $datalaporan[$index]['bulan']='Juni';
         }
         else if($datalaporan[$index]['bulan']== '7') 
         {
            $datalaporan[$index]['bulan']='Juli';
         }
         else if($datalaporan[$index]['bulan'] == '8') 
         {
            $datalaporan[$index]['bulan']='Agustus';
         }
         else if($datalaporan[$index]['bulan'] == '9') 
         {
            $datalaporan[$index]['bulan']='September';
         }
         else if($datalaporan[$index]['bulan'] == '10') 
         {
            $datalaporan[$index]['bulan']='Oktober';
         }
         else if($datalaporan[$index]['bulan'] == '11') 
         {
            $datalaporan[$index]['bulan']='November';
         }
         else if($datalaporan[$index]['bulan'] == '12') 
         {
            $datalaporan[$index]['bulan']='Desember';
         }


            $datalaporan[$index]['tahun']=$arr->tahun;

            $datalaporan[$index][0]['totalpencapaian'] = DB::table('pencapaians')->where([
                  ['id_sales','=',Input::get('id_sales')],
                  ['bulan','=',$arr->bulan],
                  ['tahun','=',$arr->tahun],
                  ])->sum('total_pencapaian');

            $datalaporan[$index][0]['target'] = DB::table('targets')->where([
                  ['id_sales','=',Input::get('id_sales')],
                  ['bulan','=',$arr->bulan],
                  ['tahun','=',$arr->tahun],
                  ])->sum('total_target');

            $datapencapaianperbulan = DB::table('pencapaians')->where([
                  ['id_sales','=',Input::get('id_sales')],
                  ['bulan','=',$arr->bulan],
                  ['tahun','=',$arr->tahun],
                  ])->get();

            $persencounterpain=0;
            $persentempra=0;
            $persenvitamin=0;
            $persenellgy=0;
            $totalpersen=0;
            $incounterpain=0.0;
            $inctempra=0.0;
            $incvitamin=0.0;
            $incellgy=0.0;
            $totalincentive=0.0;
            $totinc105=3800000;
            $totinc95=3000000;



            foreach ($datapencapaianperbulan as $ind => $val) 
            {
                  if(!empty($val->id_grup_produk) && $val->id_grup_produk==1)
                  {
                        $datatargetperbulan = DB::table('targets')->where([
                              ['id_sales','=',Input::get('id_sales')],
                              ['id_grup_produk','=',1],
                              ['bulan','=',$arr->bulan],
                              ['tahun','=',$arr->tahun],
                              ])->first();

                        $persencounterpain = number_format((doubleval($val->total_pencapaian)/doubleval($datatargetperbulan->total_target))*100,0);

                        if($persencounterpain>105)
                        {
                              $incounterpain = (35/100)*$totinc105;
                        }
                        else if($persencounterpain>95 && $persencounterpain<=104 )
                        {
                              $incounterpain = (35/100)*$totinc95;
                        }
                  }
                  else if(!empty($val->id_grup_produk) && $val->id_grup_produk==2)
                  {
                        $datatargetperbulan = DB::table('targets')->where([
                              ['id_sales','=',Input::get('id_sales')],
                              ['id_grup_produk','=',2],
                              ['bulan','=',$arr->bulan],
                              ['tahun','=',$arr->tahun],
                              ])->first();

                        $persentempra = number_format((doubleval($val->total_pencapaian)/doubleval($datatargetperbulan->total_target))*100,0);

                        if($persentempra>105)
                        {
                              $inctempra = (25/100)*$totinc105;
                        }
                        else if($persentempra>95 && $persentempra<=104 )
                        {
                              $inctempra = (25/100)*$totinc95;
                        }                      
                  }
                  else if(!empty($val->id_grup_produk) && $val->id_grup_produk==3)
                  {
                        $datatargetperbulan = DB::table('targets')->where([
                              ['id_sales','=',Input::get('id_sales')],
                              ['id_grup_produk','=',3],
                              ['bulan','=',$arr->bulan],
                              ['tahun','=',$arr->tahun],
                              ])->first();

                        $persenvitamin = number_format((doubleval($val->total_pencapaian)/doubleval($datatargetperbulan->total_target))*100,0);

                        if($persenvitamin>105)
                        {
                              $incvitamin = (20/100)*$totinc105;
                        }
                        else if($persenvitamin>95 && $persenvitamin<=104 )
                        {
                              $incvitamin = (20/100)*$totinc95;
                        }
                  }
                  elseif(!empty($val->id_grup_produk) && $val->id_grup_produk==4)
                  {
                        $datatargetperbulan = DB::table('targets')->where([
                              ['id_sales','=',Input::get('id_sales')],
                              ['id_grup_produk','=',4],
                              ['bulan','=',$arr->bulan],
                              ['tahun','=',$arr->tahun],
                              ])->first();

                        $persenellgy = number_format((doubleval($val->total_pencapaian)/doubleval($datatargetperbulan->total_target))*100,0);

                        if($persenellgy>105)
                        {
                              $incellgy = (20/100)*$totinc105;
                        }
                        else if($persenellgy>95 && $persenellgy<=104 )
                        {
                              $incellgy = (20/100)*$totinc95;
                        }
                  }         
                  
                  $totalpersen = number_format((doubleval($datalaporan[$index][0]['totalpencapaian'])/doubleval($datalaporan[$index][0]['target']))*100,0);
                  $datalaporan[$index][0]['ach']=$totalpersen;
                  $datalaporan[$index][0]['incentive']=$incounterpain + $inctempra + $incvitamin + $incellgy;
            }  
            $index++;   
      }    

      //dd($datalaporan);     

      //return view('cetaklaporan',compact('datalaporan','namasales'));
      $pdf = PDF::loadView('cetaklaporan', compact('datalaporan','namasales'));
      return $pdf->download('Laporan Sales Marketing '.$namasales.'.pdf');
   }
}
