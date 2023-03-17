<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Image;
use File;
use Illuminate\Support\Facades\Session;
use App\Models\categoryImage;

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
		$catImage = new categoryImage();
		$category->category_name = $request->category_name;
		$category->category_related = $request->category_related;
		$catImage->category_related = $request->category_related;
		$category->created_at = Carbon::now();
		$catImage->created_at = Carbon::now();
		if($request->category_image){
			$image = $request->File('category_image');
			$imageName = rand(00000,99999).'.'.$image->getClientOriginalExtension();
			$imagePath = public_path('Category/'.$imageName);
			Image::make($image)->resize(800,600)->save($imagePath);
			$category->category_image = $imageName;
			$catImage->category_image = $imageName;
		}
		$category->save();
		$catImage->save();
		session()->flash('message', 'CAtegory SAved!'); 
		return redirect()->route('category.all');
	}//END METHOD

	public function deletecategory($id){
		$categoryd = Category::find($id);
		// $categoryImg = categoryImage::where('category_related',$categoryd->category_related)->get();
		// foreach ($categoryImg as  $catimg) {
		// 	if(File::exists('Category/'.$catimg->category_image)){
		// 		File::delete('Category/'.$catimg->category_image);
		// 	}
		// 	$catiddelete = categoryImage::find($catimg->id);
		// 	$catiddelete->delete(); 
		// }
		$categoryd->delete();
		return redirect()->route('category.all');
	}//END METHOD
}
