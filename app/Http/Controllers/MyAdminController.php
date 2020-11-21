<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Session;
use Cache;

class MyAdminController extends Controller{

	public function __cunstruct(){

	}


    public function index(Request $request){
 
    	return view('admin.login');
    }

    

    public function login(Request $request){

    	$validate = $this->validate($request, [

			'username' => 'required',
			'password' => 'required|min:4',

		]);

		$username 	= $request->input('username');
		$pass 		= md5($request->input('password'));

		$UserLogin 	= DB::table('master_user')->where('username', $username)->where('password', $pass)->get();

		if ($UserLogin->isEmpty()) {


			return back()->with('error', 'Wrong Login Details');

		}else{


			foreach ($UserLogin as $row) {
				
				$username = $row->username;
				$userid = $row->id;
				$userType = $row->user_type;

			}

			$session = array(
				'userid' 	=> $userid,
				'username' 	=> $username,
				'usertype' 	=> $userType,
				'flag' 		=> 1,
				'login'     => TRUE
		    );

			$request->session()->put($session);

			$masterForm = DB::table('master_form')->where('user_id', $userid)->get();

			$FormName = [];
			foreach ($masterForm as $key) {

				$Fid = $key->form_name_id;

				$FormName[] = DB::table('form_name')->where('id', $Fid)->get();

			}

			$countF = count($FormName);


			for ($i=0; $i < $countF ; $i++) { 
				
				foreach ($FormName[$i] as $row1) {

					$form_name = $row1->form_name;

					$request->session()->push('form_name', $form_name);

				
				}
				

			}


			return redirect('/home/check-compny');
		}		


    }

    public function CheckCompny(Request $request){

           return view('admin.check_compny');

    }

    public function CompanySubmit(Request $request){

    	$validate = $this->validate($request, [

			'company_name' 	=> 'required',
			'macc_year' 	=> 'required',

		]);

    	$company_name = $request->input('company_name');
    	$macc_year = $request->input('macc_year');

    	$session = array(
				'company_name' 	=> $company_name,
				'macc_year' 	=> $macc_year,
		    );

		$request->session()->put($session);

    	return redirect('/home/dashboard');
    }

    public function Dashboard(Request $request){

    	$usrID 			= $request->session()->get('username');

    	$login 			= $request->session()->get('login');

    	$company_name 	= $request->session()->get('company_name');

    	$macc_year 		= $request->session()->get('macc_year');

    	if($login == TRUE && $company_name!='' && $macc_year!=''){

    		return view('admin.dashboard');
    	
    	}else{

    		Auth::logout();
			$request->session()->flush();
			$request->session()->regenerate();
			return redirect('/');

    	}
    	
    	
    }

    

    public function Logout(Request $request) {

		Auth::logout();
		
		$request->session()->flush();
		
		$request->session()->regenerate();

		return redirect('/');
	}







}
