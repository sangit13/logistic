<?php


namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;

class ItemController extends Controller
{
    //

    public function pdfview(Request $request){

        //return $pdf->download('invoice.pdf/pdfview');

    	$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML($this->getdata());
		return $pdf->stream();
  
    }

    public function getdata() {
    	$depotData = DB::table('master_depot')->orderBy('id','DESC')->get();

    	//return view('admin.view_depot',$depotData);
    	//print_r($depotData[0]->depot_code);exit;
    	$output='<table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                       
                        <th>Code</th>
                        <th>Name</th>
                        <th>Contact NO</th>
                        <th>Contact Email</th>
                        <th>Address 1</th>
                        <th>Address 2</th>
                        <th>Address 3</th>
                        <th>Country</th>
                        <th>State Code</th>
                        <th>City Code</th>
                        <th>Pincode</th>
                       
                      </tr>';
                     foreach ($depotData as $key) 
                     {

                     	$output .='<tr> 
                      	

                       
                        <td>'. $key->depot_code .'</td>
                        <td>'. $key->depot_name .'</td>
                        <td>'. $key->contac_person .'</td>
                        <td>'. $key->contac_email .'</td>
                        <td>'. $key->add1 .'</td>
                        <td>'. $key->add2 .'</td>
                        <td>'. $key->add3 .'</td>
                        <td>'. $key->country .'</td>
                        <td>'. $key->state_code .'</td>
                        <td>'. $key->city .'</td>
                        <td>'. $key->pincode .'</td>
                      
                      </tr>';
                     }

                     $output.='</table>';

                     return $output;

    }

}
