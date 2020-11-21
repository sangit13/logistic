<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Master_depot;
use App\Exports\DepotExport;
use Auth;
use DB;
use Session;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Str;

class MasterController extends Controller{
    
    public function __cunstruct(){

	}


public function export() 
{

        return Excel::download(new DepotExport, 'depot.xlsx');
}

	public function DepotForm(Request $request){
    	
    	 $data['state_list'] = DB::table('master_state')->get();
    	
    	return view('admin.depot_form',$data);
    }

    public function DepotFormSave(Request $request){

    	$validate = $this->validate($request, [

			'depot_code'    => 'required|max:12',
			'depot_name'    => 'required',
			'contact_no'    => 'required',
			'contact_email' => 'required|email',
			'address_one'   => 'required',
			'address_two'   => 'required',
			'address_three' => 'required',
			'country'       => 'required',
			'state_code'    => 'required',
			'district'      => 'required',
			'city_code'     => 'required|max:6',
			'pincode'       => 'required|max:6',

		]);

    	$createdBy = $request->session()->get('userid');
		$data = array(
			"depot_code"    => $request->input('depot_code'),
			"depot_name"    => $request->input('depot_name'),
			"contac_person" => $request->input('contact_no'),
			"contac_email"  => $request->input('contact_email'),
			"add1"          => $request->input('address_one'),
			"add2"          => $request->input('address_two'),
			"add3"          => $request->input('address_three'),
			"country"       => $request->input('country'),
			"state_code"         => $request->input('state_code'),
			"district"      => $request->input('district'),
			"city"          => $request->input('city_code'),
			"pincode"       => $request->input('pincode'),
			"created_by"    => $createdBy,
			
		);

		$saveData = DB::table('master_depot')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Depot Was Successfully Added...!');
			return redirect('/view-mast-depot');

		} else {

			$request->session()->flash('alert-error', 'Depot Can Not Added...!');
			return redirect('/view-mast-depot');

		}
    	
    	

    }

    public function DepotView(Request $request){

    	$depotData['depot_list'] = DB::table('master_depot')->orderBy('id','DESC')->get();

    	return view('admin.view_depot',$depotData);
    }

    public function EditDepotForm($id){

    	//print_r($id);
    	if($id!=''){
    	    $query = DB::table('master_depot');
			$query->where('id', $id);
			$userData['depot_list'] = $query->get()->first();

			
			$userData['state_list'] = DB::table('master_state')->get();

			return view('admin.depot_list', $userData);
		}else{
			$request->session()->flash('alert-error', 'Depot-Id Not Found...!');
			return redirect('/form-mast-depot');
		}

    }

    public function DepotFormUpdate(Request $request){

    	//print_r($request->post());exit;

    	$validate = $this->validate($request, [

			'depot_code'    => 'required|max:12',
			'depot_name'    => 'required',
			'contact_no'    => 'required',
			'contact_email' => 'required|email',
			'address_one'   => 'required',
			'address_two'   => 'required',
			'address_three' => 'required',
			'country'       => 'required',
			'state_code'    => 'required',
			'district'      => 'required',
			'city_code'     => 'required|max:6',
			'pincode'       => 'required|max:6',

		]);

		$depotId=$request->input('depotId');
		//print_r($request->post());exit;

		date_default_timezone_set('Asia/Kolkata');

		$updatedDate = date("Y-m-d");

		$lastUpdatedBy = $request->session()->get('userid');

		$data = array(
			"depot_code"      => $request->input('depot_code'),
			"depot_name"      => $request->input('depot_name'),
			"contac_person"   => $request->input('contact_no'),
			"contac_email"    => $request->input('contact_email'),
			"add1"            => $request->input('address_one'),
			"add2"            => $request->input('address_two'),
			"add3"            => $request->input('address_three'),
			"country"         => $request->input('country'),
			"state_code"      => $request->input('state_code'),
			"district"        => $request->input('district'),
			"city"            => $request->input('city_code'),
			"pincode"         => $request->input('pincode'),
			"last_updat_by"   => $lastUpdatedBy,
			"last_updat_date" => $updatedDate,
			
		);
		

		$saveData = DB::table('master_depot')->where('id', $depotId)->update($data);
		if ($saveData) {

			$request->session()->flash('alert-success', 'Depot Was Successfully Updated...!');
			return redirect('/view-mast-depot');

		} else {

			$request->session()->flash('alert-error', 'Depot Can Not Updated...!');
			return redirect('/view-mast-depot');

		}
    }


    public function DeleteDepot(Request $request){

    	$depotId = $request->post('DepotID');
    	//print_r($destinationId);exit;

    	if ($depotId!='') {
    		
    		$Delete = DB::table('master_depot')->where('id', $depotId)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Depot Was Deleted Successfully...!');
				return redirect('/view-mast-depot');

			} else {

				$request->session()->flash('alert-error', 'Depot Can Not Deleted...!');
				return redirect('/view-mast-depot');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Depot Not Found...!');
			return redirect('/view-mast-depot');

    	}
    }

    public function DealerForm(Request $request){
    	
    	 $data['state_list'] = DB::table('master_state')->get();
    	 $data['acc_type_list'] = DB::table('master_acctype')->get();
    	
    	return view('admin.dealer_form',$data);
    }


    public function DealerFormSave(Request $request){
    	//print_r($request->post());exit;

    		$validate = $this->validate($request, [

			'account_code'  => 'required|max:12',
			'account_name'  => 'required',
			'acc_type_code' => 'required',
			'address_one'   => 'required',
			'address_two'   => 'required',
			'address_three' => 'required',
			'country'       => 'required',
			'state_code'    => 'required',
			'district'      => 'required',
			'city_code'     => 'required|max:6',
			'pincode'       => 'required|max:6',

		]);

    	$createdBy = $request->session()->get('userid');

		$data = array(
			"acc_code"     => $request->input('account_code'),
			"acc_name"     => $request->input('account_name'),
			"acctype_code" => $request->input('acc_type_code'),
			"add1"         => $request->input('address_one'),
			"add2"         => $request->input('address_two'),
			"add3"         => $request->input('address_three'),
			"country"      => $request->input('country'),
			"state_code"   => $request->input('state_code'),
			"district"     => $request->input('district'),
			"city"         => $request->input('city_code'),
			"pincode"      => $request->input('pincode'),
			"flag"         => '0',
			"created_by"   => $createdBy,
			
			
		);

		$saveData = DB::table('master_acc')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Depot Was Successfully Added...!');
			return redirect('/view-mast-dealer');

		} else {

			$request->session()->flash('alert-error', 'Depot Can Not Added...!');
			return redirect('/view-mast-dealer');

		}
    }

    public function DealerView(Request $request){

    	$dealerData['dealer_list'] = DB::table('master_acc')->orderBy('id','DESC')->get();


    	return view('admin.view_dealer',$dealerData);
    }

    public function EditDealerForm($id){
    	//print_r($id);
    	if($id!=''){
    	    $query = DB::table('master_acc');
			$query->where('id', $id);
			$userData['dealer_list'] = $query->get()->first();

			
			$userData['state_list'] = DB::table('master_state')->get();

			 $userData['acc_type_list'] = DB::table('master_acctype')->get();

			return view('admin.dealer_list', $userData);
		}else{
			$request->session()->flash('alert-error', 'Depot-Id Not Found...!');
			return redirect('/form-mast-depot');
		}

    }

    public function DealerFormUpdate(Request $request){

    	$validate = $this->validate($request, [

			'account_code'  => 'required|max:12',
			'account_name'  => 'required',
			'acc_type_code' => 'required',
			'address_one'   => 'required',
			'address_two'   => 'required',
			'address_three' => 'required',
			'country'       => 'required',
			'state_code'    => 'required',
			'district'      => 'required',
			'city_code'     => 'required|max:6',
			'pincode'       => 'required|max:6',

		]);

		$dealerId = $request->input('dealerId');


		date_default_timezone_set('Asia/Kolkata');

		$updatedDate = date("Y-m-d");

		$lastUpdatedBy = $request->session()->get('userid');


		$data = array(
			"acc_code"        => $request->input('account_code'),
			"acc_name"        => $request->input('account_name'),
			"acctype_code"    => $request->input('acc_type_code'),
			"add1"            => $request->input('address_one'),
			"add2"            => $request->input('address_two'),
			"add3"            => $request->input('address_three'),
			"country"         => $request->input('country'),
			"state_code"      => $request->input('state_code'),
			"district"        => $request->input('district'),
			"city"            => $request->input('city_code'),
			"pincode"         => $request->input('pincode'),
			"flag"            => '0',
			"last_updat_by"   => $lastUpdatedBy,
			"last_updat_date" => $updatedDate,
			
			
		);



		$saveData = DB::table('master_acc')->where('id',$dealerId)->update($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Depot Was Successfully Updated...!');
			return redirect('/view-mast-dealer');

		} else {

			$request->session()->flash('alert-error', 'Depot Can Not Updated...!');
			return redirect('/view-mast-dealer');

		}

    }

     public function DeleteDealer(Request $request){

    	$DealerID = $request->post('DealerID');
    	//print_r($DealerID);exit;

    	if ($DealerID!='') {
    		
    	$Delete = DB::table('master_acc')->where('id',$DealerID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Account Was Deleted Successfully...!');
				return redirect('/view-mast-dealer');

			} else {

				$request->session()->flash('alert-error', 'Account Can Not Deleted...!');
				return redirect('/view-mast-dealer');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Destination Not Found...!');
			return redirect('/view-mast-destination');

    	}
    }


    public function DestinationForm(Request $request){
    
    	return view('admin.destination_form');
    }

    public function DestinationFormSave(Request $request){

    	$validate = $this->validate($request, [

			'destination_code'    => 'required',
			'destination_name'    => 'required',
			
		]);

		$data = array(
			"name"      => $request->input('destination_name'),
			"code"      => $request->input('destination_code'),
			
		);

		$saveData = DB::table('master_area')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Depot Was Successfully Added...!');
			return redirect('/view-mast-destination');

		} else {

			$request->session()->flash('alert-error', 'Depot Can Not Added...!');
			return redirect('/view-mast-destination');

		}

    }

    public function DestinationView(){

    	$destinationData['destination_list'] = DB::table('master_area')->orderBy('id','DESC')->get();

    	return view('admin.view_destination',$destinationData);

    }

    public function EditDestinationForm($id){
    	//print_r($id);
    	if($id!=''){
    	    $query = DB::table('master_area');
			$query->where('id', $id);
			$userData['destination_list'] = $query->get()->first();

			return view('admin.destination_list', $userData);
		}else{
			$request->session()->flash('alert-error', 'Depot-Id Not Found...!');
			return redirect('/form-mast-depot');
		}

    }

    public function DestinationFormUpdate(Request $request){

    	$validate = $this->validate($request, [

			'destination_code'    => 'required',
			'destination_name'    => 'required',
			
		]);

		$destinationId = $request->input('destinationId');

		$data = array(
			"name"      => $request->input('destination_name'),
			"code"      => $request->input('destination_code'),
			
		);

		

		$saveData = DB::table('master_area')->where('id',$destinationId)->update($data);
		if ($saveData) {

			$request->session()->flash('alert-success', 'Destination Was Successfully Updated...!');
			return redirect('/view-mast-destination');

		} else {

			$request->session()->flash('alert-error', 'Destination Can Not Updated...!');
			return redirect('/view-mast-destination');

		}
    }

    public function DeleteDestination(Request $request){

    	$destinationId = $request->post('DestinationID');
    	//print_r($destinationId);exit;

    	if ($destinationId!='') {
    		
    		$Delete = DB::table('master_area')->where('id', $destinationId)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Destination Was Deleted Successfully...!');
				return redirect('/view-mast-destination');

			} else {

				$request->session()->flash('alert-error', 'Destination Can Not Deleted...!');
				return redirect('/view-mast-destination');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Destination Not Found...!');
			return redirect('/view-mast-destination');

    	}
    }

    public function TransporterForm(Request $request){
    	
    
    	return view('admin.transporter_form');
    }

    public function TransportFormSave(Request $request)
    {
    	$validate = $this->validate($request, [

			'transport_code' => 'required|max:12',
			'transport_name' => 'required',
			'contact_no'     => 'required',
			'contact_person' => 'required',
			'address'        => 'required',
			

		]);

		$data = array(
			"code"           => $request->input('transport_code'),
			"name"           => $request->input('transport_name'),
			"contact_no"     => $request->input('contact_no'),
			"contact_person" => $request->input('contact_person'),
			"address"        => $request->input('address'),
			
			
		);

		$saveData = DB::table('master_transporter')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Transpoter Was Successfully Added...!');
			return redirect('/view-mast-transport');

		} else {

			$request->session()->flash('alert-error', 'Transpoter Can Not Added...!');
			return redirect('/view-mast-transport');

		}
    }

    public function TransporterView(){

    	$destinationData['transport_list'] = DB::table('master_transporter')->orderBy('id','DESC')->get();

    	return view('admin.view_transporter',$destinationData);

    }

    public function EditTransporterForm($id){

    	if($id!=''){
    	    $query = DB::table('master_transporter');
			$query->where('id', $id);
			$userData['transporter_list'] = $query->get()->first();

			return view('admin.transporter_list', $userData);
		}else{
			$request->session()->flash('alert-error', 'Depot-Id Not Found...!');
			return redirect('/form-mast-depot');
		}
    }

    public function TransportFormUpdate(Request $request){

    	$validate = $this->validate($request, [

			'transport_code' => 'required|max:12',
			'transport_name' => 'required',
			'contact_no'     => 'required',
			'contact_person' => 'required',
			'address'        => 'required',
			

		]);

    		$transportId = $request->input('transportId');
    		//print_r($transportId);exit;

		$data = array(
			"code"           => $request->input('transport_code'),
			"name"           => $request->input('transport_name'),
			"contact_no"     => $request->input('contact_no'),
			"contact_person" => $request->input('contact_person'),
			"address"        => $request->input('address'),
			
			
		);

		
		$saveData = DB::table('master_transporter')->where('id',$transportId)->update($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Transporter Was Successfully Updated...!');
			return redirect('/view-mast-transport');

		} else {

			$request->session()->flash('alert-error', 'Transporter Can Not Updated...!');
			return redirect('/view-mast-transport');

		}
    }

     public function DeleteTransport(Request $request){

    	$transportID = $request->post('transportID');
    	//print_r($DealerID);exit;

    	if ($transportID!='') {
    		
    	$Delete = DB::table('master_transporter')->where('id',$transportID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Transporter Was Deleted Successfully...!');
				return redirect('/view-mast-transport');

			} else {

				$request->session()->flash('alert-error', 'Transporter Can Not Deleted...!');
				return redirect('/view-mast-transport');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Transporter Not Found...!');
			return redirect('/view-mast-transport');

    	}
    }



    public function FleetForm(Request $request){
    	
    
    	return view('admin.fleet_form');
    }

    public function FleetFormSave(Request $request)
    {
    	$validate = $this->validate($request, [

			'truck_no'      => 'required|max:12',
			'regd_date'     => 'required',
			'make_model'    => 'required',
			'base_location' => 'required',
			'wheel_type'    => 'required',
			'load_capacity' => 'required',
			

		]);
		$createdBy = $request->session()->get('userid');

		$data = array(
			"truck_no"      => $request->input('truck_no'),
			"regd_date"     => $request->input('regd_date'),
			"make_model"    => $request->input('make_model'),
			"base_location" => $request->input('base_location'),
			"wheels_type"   => $request->input('wheel_type'),
			"load_capacity" => $request->input('load_capacity'),
			"created_by"    => $createdBy,
			
			
		);

		$saveData = DB::table('master_fleet')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Fleet Was Successfully Added...!');
			return redirect('/view-mast-fleet');

		} else {

			$request->session()->flash('alert-error', 'Fleet Can Not Added...!');
			return redirect('/view-mast-fleet');

		}
    }

    public function FleetView(){

    	$fleetData['fleet_list'] = DB::table('master_fleet')->orderBy('id','DESC')->get();

    	return view('admin.view_fleet',$fleetData);

    }

    public function EditFleetForm($id){

    	if($id!=''){
    	    $query = DB::table('master_fleet');
			$query->where('id', $id);
			$userData['fleet_list'] = $query->get()->first();

			return view('admin.fleet_list', $userData);
		}else{
			$request->session()->flash('alert-error', 'Depot-Id Not Found...!');
			return redirect('/form-mast-depot');
		}
    }

    public function FleetFormUpdate(Request $request){$validate = $this->validate($request, [

			'truck_no'      => 'required|max:12',
			'regd_date'     => 'required',
			'make_model'    => 'required',
			'base_location' => 'required',
			'wheel_type'    => 'required',
			'load_capacity' => 'required',
			

		]);

        date_default_timezone_set('Asia/Kolkata');

		$updatedDate = date("Y-m-d");

		$lastUpdatedBy = $request->session()->get('userid');


       $fleetId = $request->input('fleetIdId');
		$data = array(
			"truck_no"        => $request->input('truck_no'),
			"regd_date"       => $request->input('regd_date'),
			"make_model"      => $request->input('make_model'),
			"base_location"   => $request->input('base_location'),
			"wheels_type"     => $request->input('wheel_type'),
			"load_capacity"   => $request->input('load_capacity'),
			"last_updat_by"   => $lastUpdatedBy,
			"last_updat_date" => $updatedDate,
			
		);

		
		$saveData = DB::table('master_fleet')->where('id',$fleetId)->update($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Fleet Was Successfully Added...!');
			return redirect('/view-mast-fleet');

		} else {

			$request->session()->flash('alert-error', 'Fleet Can Not Added...!');
			return redirect('/view-mast-fleet');

		}
    }


     public function DeleteFleet(Request $request){

    	$fleetId = $request->post('FleetID');
    	//print_r($destinationId);exit;

    	if ($fleetId!='') {
    		
    		$Delete = DB::table('master_fleet')->where('id', $fleetId)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Fleet Was Deleted Successfully...!');
				return redirect('/view-mast-fleet');

			} else {

				$request->session()->flash('alert-error', 'Fleet Can Not Deleted...!');
				return redirect('/view-mast-fleet');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Fleet Not Found...!');
			return redirect('/view-mast-fleet');

    	}
    }


     public function UserForm(Request $request){
    	
    
    	return view('admin.user_form');
    }

    public function UserFormSave(Request $request)
    {
    	//print_r($request->post());
    	$validate = $this->validate($request, [

			'name'             => 'required',
			'user_name'        => 'required',
			'user_code'        => 'required',
			'password'         => 'required|min:4|same:confirm_password',
			'confirm_password' => 'required|min:4',
			'email_id'         => 'required|email',
			'user_type'        => 'required',
		
		]);

		$createdBy = $request->session()->get('userid');

		$utype = $request->input('user_type');

		if($utype=='Admin'){

		
			$data = array(
				"username"         => $request->input('user_name'),
				"usercode"         => $request->input('user_code'),
				"password"         => md5($request->input('password')),
				"confirm_password" => $request->input('confirm_password'),
				"email_id"         => $request->input('email_id'),
				"user_type"        => $utype,
				"created_by"       => $createdBy,
			
			);

			$saveData = DB::table('master_user')->insert($data);

			if ($saveData) {

				$request->session()->flash('alert-success', 'User Was Successfully Added...!');
				return redirect('/view-mast-user');

			} else {

				$request->session()->flash('alert-error', 'User Can Not Added...!');
				return redirect('/view-mast-user');

			}


		}else if($utype=='Superadmin' || $utype=='User'){

			//seesion = $request->session()->get('usertype');
			

			$data = array(
				"username"         => $request->input('user_name'),
				"usercode"         => $request->input('user_code'),
				"password"         => md5($request->input('password')),
				"confirm_password" => $request->input('confirm_password'),
				"email_id"         => $request->input('email_id'),
				"user_type"        => $utype,
				"created_by"       => $createdBy,
			
			);

			$saveData = DB::table('master_user')->insert($data);
			$MicrodotMasId = DB::getPdo()->lastInsertId(); 

			$newStart='1';
			$newEnd='8';

			$newStart1='9';
			$newEnd1='16';

		$Data['userid'] = $MicrodotMasId;	
	  $Data['form_name_list'] = DB::table('form_name')->whereBetween('id', [$newStart, $newEnd])->get();

	   $Data['form_name_list1'] = DB::table('form_name')->whereBetween('id', [$newStart1, $newEnd1])->get();
	        //print_r($Data['form_name_list']);exit;

			return view('admin.user_access',$Data);

		}



    }

    public function UserView(){

    	$fleetData['user_list'] = DB::table('master_user')->orderBy('id','DESC')->get();

    	return view('admin.view_user',$fleetData);

    }

    public function EditUserForm($id){

    	if($id!=''){
    	    $query = DB::table('master_user');
			$query->where('id', $id);
			$userData['user_list'] = $query->get()->first();

			return view('admin.user_list', $userData);
		}else{
			$request->session()->flash('alert-error', 'User-Id Not Found...!');
			return redirect('/form-mast-user');
		}
    }


    public function UserFormUpdate(Request $request){
    	//print_r($request->post());
    	$validate = $this->validate($request, [

			'user_name' => 'required',
			'user_code' => 'required',
			
		
		]);

		$data = array(
			"username"         => $request->input('user_name'),
			"usercode"         => $request->input('user_code'),
		
		);

		$userId = $request->input('UserID');


		$saveData = DB::table('master_user')->where('id',$userId)->update($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'User Was Successfully Added...!');
			return redirect('/view-mast-user');

		} else {

			$request->session()->flash('alert-error', 'User Can Not Added...!');
			return redirect('/view-mast-user');

		}
    }

    public function DeleteUser(Request $request){

    	$userId = $request->post('UserID');
    	//print_r($destinationId);exit;

    	if ($userId!='') {
    		
    		$Delete = DB::table('master_user')->where('id', $userId)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', 'User Was Deleted Successfully...!');
				return redirect('/view-mast-user');

			} else {

				$request->session()->flash('alert-error', 'User Can Not Deleted...!');
				return redirect('/view-mast-user');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Fleet Not Found...!');
			return redirect('/view-mast-fleet');

    	}
    }


     public function FyForm(Request $request){
    	
    
    	return view('admin.fy_form');
    }

    public function FyFormSave(Request $request)
    {
    	//print_r($request->post());
    	$validate = $this->validate($request, [

			'company_code' => 'required',
			'comapny_name' => 'required',
			'fy_from_date' => 'required',
			'fy_to_date'   => 'required',
			'fy_code'      => 'required',
		
		]);

		$data = array(
			"company_code" => $request->input('company_code'),
			"company_name" => $request->input('comapny_name'),
			"fy_from_date" => $request->input('fy_from_date'),
			"fy_to_date"   => $request->input('fy_to_date'),
			"fy_code"      => $request->input('fy_code'),
			
		);

		$saveData = DB::table('master_fy')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Fy Was Successfully Added...!');
			return redirect('/view-mast-fy');

		} else {

			$request->session()->flash('alert-error', 'Fy Can Not Added...!');
			return redirect('/view-mast-fy');

		}
    }

    public function FyView(){

    	$fleetData['fy_list'] = DB::table('master_fy')->orderBy('id','DESC')->get();

    	return view('admin.view_fy',$fleetData);

    }

    public function EditFyForm($id){

    	if($id!=''){
    	    $query = DB::table('master_fy');
			$query->where('id', $id);
			$userData['fy_list'] = $query->get()->first();

			return view('admin.fy_list', $userData);
		}else{
			$request->session()->flash('alert-error', 'User-Id Not Found...!');
			return redirect('/form-mast-user');
		}
    }


    public function FyFormUpdate(Request $request){
    	//print_r($request->post());
    	$validate = $this->validate($request, [

			'user_name' => 'required',
			'user_code' => 'required',
			
		
		]);

		$data = array(
			"username"         => $request->input('user_name'),
			"usercode"         => $request->input('user_code'),
		
		);

		$userId = $request->input('UserID');

		$saveData = DB::table('master_fy')->where('id',$userId)->update($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Fy Was Successfully Updated...!');
			return redirect('/view-mast-fy');

		} else {

			$request->session()->flash('alert-error', 'Fy Can Not Updated...!');
			return redirect('/view-mast-fy');

		}
    }

    public function DeleteFy(Request $request){

    	$FyID = $request->post('FyID');
    	//print_r($destinationId);exit;

    	if ($FyID!='') {
    		
    		$Delete = DB::table('master_fy')->where('id', $FyID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', 'Fy Was Deleted Successfully...!');
				return redirect('/view-mast-fy');

			} else {

				$request->session()->flash('alert-error', 'Fy Can Not Deleted...!');
				return redirect('/view-mast-fy');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Fy Not Found...!');
			return redirect('/view-mast-fy');

    	}
    }


    public function CompanyForm(Request $request){
    	
    	$data['state_list'] = DB::table('master_state')->get();

    	return view('admin.company_form',$data);
    }

    public function CompanyFormSave(Request $request)
    { 
    	
    	$validate = $this->validate($request, [

			'company_code'  => 'required',
			'company_name'  => 'required',
			'contact_no1'   => 'required',
			'contact_no2'   => 'required',
			'fax_no'        => 'required',
			'emailid'       => 'required',
			'address_one'   => 'required',
			'address_two'   => 'required',
			'address_three' => 'required',
			'pincode'       => 'required',
			'country_name'  => 'required',
			'state_code'    => 'required',
			'district'      => 'required',
			'city_code'     => 'required',
		
		]);

		$data = array(
			"company_code" => $request->input('company_code'),
			"company_name" => $request->input('company_name'),
			"contact_no1"  => $request->input('contact_no1'),
			"contact_no2"  => $request->input('contact_no2'),
			"email_id"     => $request->input('emailid'),
			"adres_one"    => $request->input('address_one'),
			"adres_two"    => $request->input('address_two'),
			"adres_thre"   => $request->input('address_three'),
			"pin_code"     => $request->input('pincode'),
			"country"      => $request->input('country_name'),
			"state"        => $request->input('state_code'),
			"district"     => $request->input('district'),
			"city"         => $request->input('city_code'),
			"fax_no"       => $request->input('fax_no'),
			
		);

		$saveData = DB::table('master_comp')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Company Was Successfully Added...!');
			return redirect('/view-mast-company');

		} else {

			$request->session()->flash('alert-error', 'Company Can Not Added...!');
			return redirect('/view-mast-company');

		}
    }

    public function CompanyView(){

    	$companyData['company_list'] = DB::table('master_comp')->orderBy('id','DESC')->get();

    	return view('admin.view_company',$companyData);

    }

    public function EditCompanyForm($id){

    	if($id!=''){
    	    $query = DB::table('master_comp');
			$query->where('id', $id);
			$compData['comp_list'] = $query->get()->first();
			$compData['state_list'] = DB::table('master_state')->get();

			return view('admin.company_list', $compData);
		}else{
			$request->session()->flash('alert-error', 'Company Not Found...!');
			return redirect('/form-mast-user');
		}
    }


    public function CompanyFormUpdate(Request $request){
    	//print_r($request->post());
    	$validate = $this->validate($request, [

			'company_code'  => 'required',
			'company_name'  => 'required',
			'contact_no1'   => 'required',
			'contact_no2'   => 'required',
			'fax_no'        => 'required',
			'emailid'       => 'required',
			'address_one'   => 'required',
			'address_two'   => 'required',
			'address_three' => 'required',
			'pincode'       => 'required',
			'country_name'  => 'required',
			'state_code'    => 'required',
			'district'      => 'required',
			'city_code'     => 'required',
		
		]);

    	$companyId = $request->input('companyId');

		$data = array(
			"company_code" => $request->input('company_code'),
			"company_name" => $request->input('company_name'),
			"contact_no1"  => $request->input('contact_no1'),
			"contact_no2"  => $request->input('contact_no2'),
			"email_id"     => $request->input('emailid'),
			"adres_one"    => $request->input('address_one'),
			"adres_two"    => $request->input('address_two'),
			"adres_thre"   => $request->input('address_three'),
			"pin_code"     => $request->input('pincode'),
			"country"      => $request->input('country_name'),
			"state"        => $request->input('state_code'),
			"district"     => $request->input('district'),
			"city"         => $request->input('city_code'),
			"fax_no"       => $request->input('fax_no'),
			
		);

      $saveData = DB::table('master_comp')->where('id',$companyId)->update($data);
		if ($saveData) {

			$request->session()->flash('alert-success', 'Company Was Successfully Added...!');
			return redirect('/view-mast-company');

		} else {

			$request->session()->flash('alert-error', 'Company Can Not Added...!');
			return redirect('/view-mast-company');

		}
    }

    public function DeleteCompany(Request $request){

    	$CompanyID = $request->post('CompanyID');
    	//print_r($destinationId);exit;

    	if ($CompanyID!='') {
    		
    		$Delete = DB::table('master_comp')->where('id', $CompanyID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', 'Company Was Deleted Successfully...!');
				return redirect('/view-mast-company');

			} else {

				$request->session()->flash('alert-error', 'Company Can Not Deleted...!');
				return redirect('/view-mast-company');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Company Not Found...!');
			return redirect('/view-mast-company');

    	}
    }


    public function UmForm(Request $request){
    
    	return view('admin.um_form');
    }

    public function UmFormSave(Request $request){

    	$validate = $this->validate($request, [

			'um_code'    => 'required',
			'um_name'    => 'required',
			
		]);

		$data = array(
			"um_code"      => $request->input('um_code'),
			"um_name"      => $request->input('um_name'),
			
			
		);

		$saveData = DB::table('master_um')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Um Was Successfully Added...!');
			return redirect('/view-mast-um');

		} else {

			$request->session()->flash('alert-error', 'Um Can Not Added...!');
			return redirect('/view-mast-um');

		}

    }

    public function UmView(){

    	$umData['um_list'] = DB::table('master_um')->orderBy('id','DESC')->get();

    	return view('admin.view_um',$umData);

    }

    public function EditUmForm($id){
    	//print_r($id);
    	if($id!=''){
    	    $query = DB::table('master_um');
			$query->where('id', $id);
			$umData['um_list'] = $query->get()->first();

			return view('admin.um_list', $umData);
		}else{
			$request->session()->flash('alert-error', 'Um Not Found...!');
			return redirect('/form-mast-um');
		}

    }

    public function UmFormUpdate(Request $request){

    	$validate = $this->validate($request, [

			'um_code'    => 'required',
			'um_name'    => 'required',
			
		]);

    	$umId = $request->input('umId');
		$data = array(
			"um_code"      => $request->input('um_code'),
			"um_name"      => $request->input('um_name'),
			
			
		);

		

		 $saveData = DB::table('master_um')->where('id',$umId)->update($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Um Was Successfully Added...!');
			return redirect('/view-mast-um');

		} else {

			$request->session()->flash('alert-error', 'Um Can Not Added...!');
			return redirect('/view-mast-um');

		}
    }

    public function DeleteUm(Request $request){

    	$UmID = $request->post('UmID');
    	//print_r($destinationId);exit;

    	if ($UmID!='') {
    		
    		$Delete = DB::table('master_um')->where('id', $UmID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Um Was Deleted Successfully...!');
				return redirect('/view-mast-um');

			} else {

				$request->session()->flash('alert-error', 'Um Can Not Deleted...!');
				return redirect('/view-mast-um');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Um Not Found...!');
			return redirect('/view-mast-um');

    	}
    }


    public function ItemForm(Request $request){
    
    	return view('admin.item_form');
    }

    public function ItemFormSave(Request $request){

    	$validate = $this->validate($request, [

			'item_code' => 'required',
			'item_name' => 'required',
			'um'        => 'required',
			'aum'       => 'required',
			
		]);

		$data = array(
			"item_code" => $request->input('item_code'),
			"item_name" => $request->input('item_name'),
			"um"        => $request->input('um'),
			"aum"       => $request->input('aum'),
			
			
		);

		$saveData = DB::table('master_item')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Item Was Successfully Added...!');
			return redirect('/view-mast-item');

		} else {

			$request->session()->flash('alert-error', 'Item Can Not Added...!');
			return redirect('/view-mast-item');

		}

    }

    public function ItemView(){

    	$itemData['item_list'] = DB::table('master_item')->orderBy('id','DESC')->get();

    	return view('admin.view_item',$itemData);

    }

    public function EditItemForm($id){
    	//print_r($id);
    	if($id!=''){
    	    $query = DB::table('master_item');
			$query->where('id', $id);
			$itemData['item_list'] = $query->get()->first();

			return view('admin.item_list', $itemData);
		}else{
			$request->session()->flash('alert-error', 'Item Not Found...!');
			return redirect('/form-mast-item');
		}

    }

    public function ItemFormUpdate(Request $request){

    	$validate = $this->validate($request, [

			'item_code' => 'required',
			'item_name' => 'required',
			'um'        => 'required',
			'aum'       => 'required',
			
		]);
    	
    	$itemId = $request->input('itemId');
		$data = array(
			"item_code" => $request->input('item_code'),
			"item_name" => $request->input('item_name'),
			"um"        => $request->input('um'),
			"aum"       => $request->input('aum'),
			
			
		);


      $saveData = DB::table('master_item')->where('id',$itemId)->update($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Item Was Successfully Updated...!');
			return redirect('/view-mast-item');

		} else {

			$request->session()->flash('alert-error', 'Item Can Not Updated...!');
			return redirect('/view-mast-item');

		}
    }

    public function DeleteItem(Request $request){

    	$ItemID = $request->post('ItemID');
    	//print_r($destinationId);exit;

    	if ($ItemID!='') {
    		
    		$Delete = DB::table('master_item')->where('id', $ItemID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Item Was Deleted Successfully...!');
				return redirect('/view-mast-item');

			} else {

				$request->session()->flash('alert-error', 'Item Can Not Deleted...!');
				return redirect('/view-mast-item');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Item Not Found...!');
			return redirect('/view-mast-item');

    	}
    }


    public function ItemUmForm(Request $request){
    	
    	 $data['item_code'] = DB::table('master_item')->get();
    	 $data['um_code'] = DB::table('master_um')->get();
    	return view('admin.itemum_form',$data);
    }

    public function ItemUmFormSave(Request $request){

    	$validate = $this->validate($request, [

			'item_code'  => 'required',
			'um_code'    => 'required',
			'aum'        => 'required',
			'aum_factor' => 'required',
			
		]);

		$data = array(
			"item_code"  => $request->input('item_code'),
			"um_code"    => $request->input('um_code'),
			"aum"        => $request->input('aum'),
			"aum_factor" => $request->input('aum_factor'),
			
			
		);

		$saveData = DB::table('master_itemum')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Item UM Was Successfully Added...!');
			return redirect('/view-mast-itemum');

		} else {

			$request->session()->flash('alert-error', 'Item UM Can Not Added...!');
			return redirect('/view-mast-itemum');

		}

    }

    public function ItemUmView(){

    	$itemData['itemum_list'] = DB::table('master_itemum')->orderBy('id','DESC')->get();

    	return view('admin.view_itemum',$itemData);

    }

    public function EditItemUmForm($id){
    	//print_r($id);
    	if($id!=''){
    	    $query = DB::table('master_itemum');
			$query->where('id', $id);
			$itemData['itemum_list'] = $query->get()->first();

			$itemData['item_code'] = DB::table('master_item')->get();
    	    $itemData['um_code'] = DB::table('master_um')->get();

			return view('admin.itemum_list', $itemData);
		}else{
			$request->session()->flash('alert-error', 'Item Not Found...!');
			return redirect('/form-mast-itemum');
		}

    }

    public function ItemUmFormUpdate(Request $request){

    	$validate = $this->validate($request, [

			'item_code'  => 'required',
			'um_code'    => 'required',
			'aum'        => 'required',
			'aum_factor' => 'required',
			
		]);

		$itemumId = $request->input('itemumId');

		$data = array(
			"item_code"  => $request->input('item_code'),
			"um_code"    => $request->input('um_code'),
			"aum"        => $request->input('aum'),
			"aum_factor" => $request->input('aum_factor'),
			
			
		);

		
		$saveData = DB::table('master_itemum')->where('id',$itemumId)->update($data);


		if ($saveData) {

			$request->session()->flash('alert-success', 'Item UM Was Successfully Added...!');
			return redirect('/view-mast-itemum');

		} else {

			$request->session()->flash('alert-error', 'Item UM Can Not Added...!');
			return redirect('/view-mast-itemum');

		}
    }

    public function DeleteItemUm(Request $request){

    	$ItemumID = $request->post('ItemumID');
    	//print_r($ItemumID);exit;

    	if ($ItemumID!='') {
    		
    		$Delete = DB::table('master_itemum')->where('id', $ItemumID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Item UM Was Deleted Successfully...!');
				return redirect('/view-mast-itemum');

			} else {

				$request->session()->flash('alert-error', 'Item UM Can Not Deleted...!');
				return redirect('/view-mast-itemum');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Item Not Found...!');
			return redirect('/view-mast-itemum');

    	}
    }


    public function RateForm(Request $request){
    	
    	 $data['depot_code']       = DB::table('master_depot')->get();

    	 $data['destination_code'] = DB::table('master_area')->get();

    	return view('admin.rate_form',$data);
    }

    public function RateFormSave(Request $request){

 	//print_r($request->post());exit;
    	$validate = $this->validate($request, [

			'depot_code'       => 'required',
			'destination_code' => 'required',
			'fy_from_date'     => 'required',
			'fy_to_date'       => 'required',
			'rate'             => 'required',
			'wheel_type'       => 'required',
			'overload'         => 'required',
			
		]);

		
		$createdBy = $request->session()->get('userid');

		$data = array(
			"depot_plant" => $request->input('depot_code'),
			"area_code"   => $request->input('destination_code'),
			"from_date"   => $request->input('fy_from_date'),
			"to_date"     => $request->input('fy_to_date'),
			"rate"        => $request->input('rate'),
			"wheel_type"  => $request->input('wheel_type'),
			"overload"    => $request->input('overload'),
			"created_by"  => $createdBy,
			
		);

		$saveData = DB::table('master_rate')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Rate Was Successfully Added...!');
			return redirect('/view-mast-rate');

		} else {

			$request->session()->flash('alert-error', 'Rate Can Not Added...!');
			return redirect('/view-mast-rate');

		}

    }

    public function RateView(){

    	$rateData['rate_list'] = DB::table('master_rate')->orderBy('id','DESC')->get();

    	return view('admin.view_rate',$rateData);

    }

    public function EditRateForm($id){
    	//print_r($id);
    	if($id!=''){
				$query = DB::table('master_rate');
				$query->where('id', $id);
				$rateData['rate_list']  = $query->get()->first();
				
				$rateData['depot_code']       = DB::table('master_depot')->get();
				
				$rateData['destination_code'] = DB::table('master_area')->get();

			return view('admin.rate_list', $rateData);
		}else{
			$request->session()->flash('alert-error', 'Item Not Found...!');
			return redirect('/form-mast-itemum');
		}

    }

    public function RateFormUpdate(Request $request){

    	$validate = $this->validate($request, [

			'depot_code'       => 'required',
			'destination_code' => 'required',
			'fy_from_date'     => 'required',
			'fy_to_date'       => 'required',
			'rate'             => 'required',
			'wheel_type'       => 'required',
			'overload'         => 'required',
			
		]);

		$rateId = $request->input('rateId');

		

		date_default_timezone_set('Asia/Kolkata');

		$updatedDate = date("Y-m-d");

		$lastUpdatedBy = $request->session()->get('userid');

		$data = array(
			"depot_plant"     => $request->input('depot_code'),
			"area_code"       => $request->input('destination_code'),
			"from_date"       => $request->input('fy_from_date'),
			"to_date"         => $request->input('fy_to_date'),
			"rate"            => $request->input('rate'),
			"wheel_type"      => $request->input('wheel_type'),
			"overload"        => $request->input('overload'),
			"last_updat_by"   => $lastUpdatedBy,
			"last_updat_date" => $updatedDate,
			
		);

		
		$saveData = DB::table('master_rate')->where('id',$rateId)->update($data);


		if ($saveData) {

			$request->session()->flash('alert-success', 'Rate Was Successfully Updated...!');
			return redirect('/view-mast-rate');

		} else {

			$request->session()->flash('alert-error', 'Rate Can Not Updated...!');
			return redirect('/view-mast-rate');

		}
    }

    public function DeleteRate(Request $request){

    	$ItemumID = $request->post('ItemumID');
    	//print_r($ItemumID);exit;

    	if ($ItemumID!='') {
    		
    		$Delete = DB::table('master_rate')->where('id', $ItemumID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Item UM Was Deleted Successfully...!');
				return redirect('/view-mast-itemum');

			} else {

				$request->session()->flash('alert-error', 'Item UM Can Not Deleted...!');
				return redirect('/view-mast-itemum');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Item Not Found...!');
			return redirect('/view-mast-itemum');

    	}
    }




     public function AccountTypeForm(Request $request){
    	

    	return view('admin.account_type_form');
    }

    public function AccountTypeFormSave(Request $request){

 	//print_r($request->post());exit;
    	$validate = $this->validate($request, [

			'acc_type_code' => 'required',
			'acc_type_name' => 'required',	
			
		]);

		$data = array(
			"acctype_code"   => $request->input('acc_type_code'),
			"acctype_name"   => $request->input('acc_type_name'),
			
		);

		$saveData = DB::table('master_acctype')->insert($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Account Type Was Successfully Added...!');
			return redirect('/view-mast-account-type');

		} else {

			$request->session()->flash('alert-error', 'Account Type Can Not Added...!');
			return redirect('/view-mast-account-type');

		}

    }

    public function AccountTypeView(){

    	$acclistData['acc_type_list'] = DB::table('master_acctype')->orderBy('id','DESC')->get();

    	return view('admin.view_account_type',$acclistData);

    }

    public function EditAccountTypeForm($id){
    	//print_r($id);
    	if($id!=''){
				$query = DB::table('master_acctype');
				$query->where('id', $id);
				$acctypeData['acctype_list']  = $query->get()->first();
				
			return view('admin.account_type_list', $acctypeData);
		}else{
			$request->session()->flash('alert-error', 'Item Not Found...!');
			return redirect('/form-mast-itemum');
		}

    }

    public function AccountTypeFormUpdate(Request $request){

    	$validate = $this->validate($request, [

			'acc_type_code' => 'required',
			'acc_type_name' => 'required',	
			
		]);

		$acctypeId = $request->input('acctypeId');

		$data = array(
			"acctype_code"   => $request->input('acc_type_code'),
			"acctype_name"   => $request->input('acc_type_name'),
			
		);

		$saveData = DB::table('master_acctype')->where('id',$acctypeId)->update($data);

		if ($saveData) {

			$request->session()->flash('alert-success', 'Account Type Was Successfully Update...!');
			return redirect('/view-mast-account-type');

		} else {

			$request->session()->flash('alert-error', 'Account Type Can Not Update...!');
			return redirect('/view-mast-account-type');

		}
    }

    public function DeleteAccountType(Request $request){

    	$acctypeID = $request->post('acctypeID');
    	//print_r($ItemumID);exit;

    	if ($acctypeID!='') {
    		
    		$Delete = DB::table('master_acctype')->where('id', $acctypeID)->delete();

			if ($Delete) {

				$request->session()->flash('alert-success', ' Account Type Was Deleted Successfully...!');
				return redirect('/view-mast-account-type');

			} else {

				$request->session()->flash('alert-error', 'Account Type Can Not Deleted...!');
				return redirect('/view-mast-account-type');

			}

    	}else{

    		$request->session()->flash('alert-error', 'Item Not Found...!');
			return redirect('/view-mast-account-type');

    	}
    }

    public function OutwardView(Request $request){



    $Data['depot_list'] = DB::table('master_depot')->get();

    $Data['dealer_list'] = DB::table('master_acc')->get();

    $Data['transporter_list'] = DB::table('master_transporter')->get();


    $Data['Alldata'] = DB::select("SELECT despatch.*, master_depot.depot_name as depot_name,master_acc.acc_name as party_name FROM despatch 
			left JOIN master_depot ON master_depot.depot_code =despatch.depot 
			left JOIN master_acc ON master_acc.acc_code =despatch.party 
			left JOIN master_transporter ON master_transporter.code =despatch.transporter");

  //  print_r($Data['Alldata']);exit;

    	return view('admin.view_outward_dispatch',$Data);

    }

    public function OutwardSerach(Request $request){

    	//print_r($request->input('depot'));exit;
		$depot      = $request->input('depot');
		$party      = $request->input('party');
		$from_date  = $request->input('from_date');
		$to_date    = $request->input('to_date');
		$transporter = $request->input('trans_code');
		$btnsearch  = $request->input('btnsearch');

		//print_r($btnsearch);exit;

		if(isset($btnsearch)!='')
		{
			if(isset($from_date)  && trim($from_date)!="")
	      {
	      $strWhere="  AND `Date` BETWEEN '$from_date' and  '$to_date'";
	      }

    	if(isset($depot)  && trim($depot)!="")
			{
				$strWhere="  AND   `Depot`= '$depot'";
			}

		if(isset($party)  && trim($party)!="")
			{
				$strWhere=" AND   `Party`= '$party'";
			}

		if(isset($transporter)  && trim($transporter)!="")
	      {
	      $strWhere=" AND   transporter='$transporter'";

	      }

		}else
		{
		 $strWhere=" AND   id=''";
		}

            $getdate = DB::select("SELECT despatch.*, master_depot.depot_name as depot_name,master_acc.acc_name as party_name FROM despatch 
			left JOIN master_depot ON master_depot.depot_code =despatch.depot 
			left JOIN master_acc ON master_acc.acc_code =despatch.party 
			left JOIN master_transporter ON master_transporter.code =despatch.transporter where 1=1  $strWhere");

             $sr=1;
			foreach($getdate as $key){

			  $depot_name=$key->depot_name;
			  $party_name=$key->party_name;
			  $date=$key->date;
			  $challan_no=$key->challan_no;
			  $destination=$key->destination;
			  $vehicle_no=$key->vehicle_no;
			  $qty_mt=$key->qty_mt;
			  $qty_bag=$key->qty_bag;
			  $transporter=$key->transporter;


			$nestedData   = array();
          
            $nestedData[] = $sr++;
            $nestedData[] = $depot_name;
            $nestedData[] = $party_name;
            $nestedData[] = $date;
            $nestedData[] = $challan_no;
            $nestedData[] = $destination;
            $nestedData[] = $vehicle_no;
            $nestedData[] = $qty_mt;
            $nestedData[] = $qty_bag;
            $nestedData[] = $transporter;
            $data[]       = $nestedData;
			 
			
			}
	$output = array(
            "data" => $data
        );
			
			echo json_encode($output);
    	
    }

    public function accessControl(Request $request){

    	$name1 = $request->input('name1');
    	$userid = $request->input('userid');
    	
        $count =count($name1);
        //print_r($userid);
        $saveData ='';
        for ($i=0; $i < $count ; $i++) { 

        	$data=array(

        		'user_id'=>$userid,
        		'form_name_id'=>$name1[$i],

    			);
        	
        $saveData = DB::table('master_form')->insert($data);

			
        }


            if ($saveData) {

				$request->session()->flash('alert-success', 'User Was Successfully Added...!');
				return redirect('/view-mast-user');

			} else {

				$request->session()->flash('alert-error', 'User Can Not Added...!');
				return redirect('/view-mast-user');

			}

    }


}
