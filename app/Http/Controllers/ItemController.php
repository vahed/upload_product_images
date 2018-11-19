<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Validator;
use Session;
use App\User;
use App\Photos;
use App\Product;

class ItemController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	/* display actionItems view with form including action items and uploaded photos */
    public function actionItems(){
	    $photos = Photos::all();
		$images = Product::all();

		//var_dump($photos);
		//return View::make('actionItems')->with('photos',$photos);
		return View::make('actionItems')->with(['photos'=>$photos,'images'=>$images]);
	}
	/* validate form and store new record */
	public function store(Request $request){
        $product = new Product;
		
		
		
		$validator = Validator::make($request->all(), [
            'product_name' => 'required',
			'comment' => 'required',
			'image_category' => 'required',
            'upload_image' => 'required|image',
        ]);
        //check if validation failed to redirect to the user with errors
		if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
		//check if the checkbox is clicked or show error to the user
		if($request->input('checked')==NULL){
			Session::flash('checkBox', 'Check box need to be checked!');
            return Redirect::to('actionItems');
		}
		//check if the user chosen the duplicate image and display error
		if($this->is_duplicate($request->upload_image->getClientOriginalName()) == false ){
					return back()->with('duplicate_image','This image has already been saved!');
		}
		//if all ok then save the image to upload directory and datbase table with success message
		else{

			$filename = $request->upload_image->getClientOriginalName();	
			//Store the image in the upload directory 
			$request->upload_image->storeAs('public/upload',$filename);
			
			//store in the database table
			$product->photo_id = $request->input('image_category');
			$product->image_name = $filename;
			$product->product_name = $request->input('product_name');
			$product->comment = $request->input('comment');
			$product->save();
		    //redirect
			Session::flash('success', 'New image added to the database table!');
			return Redirect::to('actionItems');
		}
		
	}
	
	/* check if duplicate image exists*/
	public function is_duplicate($image_name){
	    $image = new Product;
	    $result = $image::where(['image_name'=>$image_name])->get();
		
		if($result->count()>0)
			return false;
		else
			return true;
	}
}
