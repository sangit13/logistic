<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use DB;

use App\Image;
class ImageController extends Controller
{
    //
    public function index()
    {
    	return view('admin.image');
    }

     public function store(Request $request)
    {
    	$image = $request->file('file');
    	//print_r($image);exit;
        $avatarName = $image->getClientOriginalName();
        $filename = pathinfo($avatarName, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $filenamestore = $filename.'.'.$extension;
    //print_r($filenamestore);exit;
        $image->move(public_path('/dist/img'),$filenamestore);

  
        $imageUpload = new Image();
        $imageUpload->image_name = $filenamestore;
       //print_r($imageUpload->image_name);exit;
        $imageUpload->save();
        echo '1';exit();
    }

    public function delete(Request $request){

    	$image = $request->post('filename');
		
		$Delete = DB::table('images')->where('image_name',$image)->delete();

		 echo '1';exit();


    }

}
