<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multinational;

class MultinationalController extends Controller
{
    public function MultinationalManage(){
        $multinationals =Multinational::orderBy('id','DESC')->limit('30')->get(); 
        return view('multinational.manage',compact('multinationals'));
    }//End method
    public function MultinationalCreate(){
        return view('multinational.create');
    }//End method
    public function MultinationalStore(Request $request){
       $request->validate([
         'customer_id'=>'required|regex:/^[a-zA-Z-_0-9 ]+$/u|max:30|unique:multinationals',
         'company_name'=>'required|regex:/^[a-zA-Z-_ ]+$/u|max:60',
         'person_name'=>'required|regex:/^[a-zA-Z ]+$/u||max:60',
         'date_of_birth'=>'required',
         'address'=>'required',
         'official_email'=>'required|regex:/^[a-zA-Z-_0-9@.]+$/u|max:70',
         'phone_number'=>'required|regex:/^[-0-9+() ]+$/u|min:11',
         'web_address'=>'required',
       ]);

       $multinational = new Multinational();
       $multinational->customer_id = $request->customer_id;
       $multinational->company_name = $request->company_name;
       $multinational->person_name = $request->person_name;
       $multinational->date_of_birth = $request->date_of_birth;
       $multinational->address = $request->address;
       $multinational->official_email = $request->official_email;
       $multinational->phone_number = $request->phone_number;
       $multinational->web_address = $request->web_address;
       session()->flash('message','SUCCESSFULLY CREATED DONE COMPANY INFORMATION');
       $multinational->save();
       return redirect()->route('manage.multinational');

    }//End method

    public function MultinationalEdit($id){
        $multinational = Multinational::find($id);
        return view('multinational.edit',compact('multinational'));
    }//end method
   
    public function MultinationalUpdate(Request $request,$id){
        $request->validate([
            'customer_id'=>'required|regex:/^[a-zA-Z-_0-9 ]+$/u|max:30|unique:multinationals',
            'company_name'=>'required|regex:/^[a-zA-Z-_ ]+$/u|max:60',
            'person_name'=>'required|regex:/^[a-zA-Z ]+$/u||max:60',
            'date_of_birth'=>'required',
            'address'=>'required',
            'official_email'=>'required|regex:/^[a-zA-Z-_0-9@.]+$/u|max:70',
            'phone_number'=>'required|regex:/^[-0-9+() ]+$/u|min:11',
            'web_address'=>'required',
          ]);
   
          $multinational = Multinational::find($id);
          $multinational->customer_id = $request->customer_id;
          $multinational->company_name = $request->company_name;
          $multinational->person_name = $request->person_name;
          $multinational->date_of_birth = $request->date_of_birth;
          $multinational->address = $request->address;
          $multinational->official_email = $request->official_email;
          $multinational->phone_number = $request->phone_number;
          $multinational->web_address = $request->web_address;
          session()->flash('message','SUCCESSFULLY UPDATED DONE COMPANY INFORMATION');
          $multinational->update();
          return redirect()->route('manage.multinational');
    }//end method
    public function MultinationalDelete($id){
        $multinational = Multinational::find($id);
        session()->flash('delete','SUCCESSFULLY DELETED DONE COMPANY INFORMATION');
        $multinational->delete();
        return back();

    }//end method
}
