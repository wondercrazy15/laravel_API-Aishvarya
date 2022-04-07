<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\mynewAPI;
use App\Models\employee;
use Validator;
class mynewAPI extends Controller
{
    
   function get_Data(){

       return ["name"=>"Aishvarya","email"=>"aishvarya@gmail.com","address"=>"surat"];
   }
   function mylist(){
        return employee::all();
   }
   function mydatalist($id){
    return employee::find($id);
   }
   function add(Request $req){
       $employee = new employee;
       $employee->name=$req->name;
       $employee->email=$req->email;
       $employee->address=$req->address;
       $employee->image=$req->image;
        // $employee->image=$req->file('photo')->store('Documents');
       $result=$employee->save();
       if($result){
           return ["result"=>"Data has been saved successfully."];
        }else{
            return ["result"=>"Data has NOT been saved."];
        }
   }
   public function update_data(Request $req){
    $employee = employee::find($req->id);
    $employee->name=$req->name;
    $employee->email=$req->email;
    $employee->address=$req->address;

    $result=$employee->save();
    if($result){
        return ["result"=>"Data has been updated successfully."];
     }else{
         return ["result"=>"Data has NOT been updated."];
     }
   }
   public function search_data($name){
    // $employee= employee::where("name",$name)->get();
    if($name){
        return employee::where('name','like','%'.$name.'%')->get();
    }else{
        return ["result"=>"Data is NOT Found."];
    }
   }
   public function delete_rec($id){
    $employee = employee::find($id);
    $result=$employee->delete();
    if($result){
        return ["result"=>"Record is deleted successfully."];
     }else{
         return ["result"=>"Record is Not deleted."];
     }
      
   }
   public function upload_image(){
    return view('upload');
}
   public function uploadimg(Request $req){
      $result=$req->file('photo')->store('Documents');
       return ["result"=>$result];
    
   }
   public function validate_data(Request $req){
    $rules=array(
        "address"=>"required|min:2|max:5"
    );
    $validator=Validator::make($req->all(),$rules);
    if($validator->fails()){
        return response()->json($validator->errors(),401);
        // return $validator->errors();
    }else{
        $employee=new employee;
        $employee->name=$req->name;
        $employee->email=$req->email;
        $employee->address=$req->address;
        $employee->image=$req->image;
        $result=$employee->save();
    if($result){
        return ["result"=>"Data has been updated successfully."];
     }else{
         return ["result"=>"Data has NOT been updated."];
     }
    }   
    
   }
  
}
