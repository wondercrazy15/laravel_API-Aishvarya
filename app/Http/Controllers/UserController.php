<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
class UserController extends Controller
{
    //Aurhentication
    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

    //passport authentication Register and Login
    public function reg_auth(Request $req){
        $validator=Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $input=$req->all();
        $input['password']=bcrypt($input['password']);

        $user = User::create($input);

        $responseArray=[];
        $responseArray['token'] =$user->createToken('myApp')->accessToken;
        $responseArray['name'] =$user->name;

        return response()->json($responseArray,200);
    }
    public function login_auth(Request $req){
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
            $user=Auth::user();
            $responseArray=[];
            $responseArray['token'] =$user->createToken('myApp')->accessToken;
            $responseArray['name'] =$user->name;

        }else{
            return response()->json(['error'=>'Unauthorized Access'],203);
        }
     
    }
    //ToArray
        // $user = User::first();
        // return $user->attributesToArray();

        //ToJSON
        // return $user->toJson();
// return $user->toJson(JSON_PRETTY_PRINT);

    public function userlist(){


        $data=USer::all();
        // return $data->toJson();
        $responseArray=[
            "status"=>"ok",
            "data"=>$data
        ];
        return response()->json($responseArray,200);
    }
}
