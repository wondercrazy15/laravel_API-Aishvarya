<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
class loginController extends Controller
{
    //use RefreshDatabase;
    public function get_Data(Request $req){
        $req->validate([
            "username"=>"required",
            "userpwd"=>"required"
        ]);
        return  $req->input();
        // $data= $req->input();
        // $req->session()->put('username',$data['username']);
        // echo session('username');
    }
    public function index(){
        return "Code will be here....";
    }

    // public function setFirstNameAttribute($value)
    // {
    //     $this->attributes['first_name'] = strtolower($value);
    // }
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
