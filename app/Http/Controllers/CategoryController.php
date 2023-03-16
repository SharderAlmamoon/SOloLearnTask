<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Image;
use File;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
	// FOR FRONTEND
	public function ForFrontendAll(){
		$categorirs = Category::orderBy('id','ASC')->limit(5)->get();
		return view('frontenddashboard',compact('categorirs'));
	} //End Method

	public function SerachPic($value){
		$allpic = Category::select('category_image')->whereIn('category_related',[$value])->get();
		return [
			'allpic'=>$allpic
		];
	} //End Method









	public function AllCategory(){
		$categories = Category::orderBy('id','DESC')->get();
		return view('category.categoryAll',compact('categories'));
	}//END METHOD

	public function AddCategory(){
		return view('category.categoryadd');
	}//END METHOD

	public function StoreCategory(Request $request){
		$request->validate([
			'category_name'=> 'required|unique:categories|max:62',
			'category_related'=> 'required',
		]);
		$category = new Category();
		$category->category_name = $request->category_name;
		$category->category_related = $request->category_related;
		$category->created_at = Carbon::now();
		if($request->category_image){
			$image = $request->File('category_image');
			$imageName = rand(00000,99999).'.'.$image->getClientOriginalExtension();
			$imagePath = public_path('Category/'.$imageName);
			Image::make($image)->resize(800,600)->save($imagePath);
			$category->category_image = $imageName;
		}
		$category->save();
		Session::flash('message', 'CAtegory SAved!'); 
		return redirect()->route('category.all');
	}//END METHOD
}
