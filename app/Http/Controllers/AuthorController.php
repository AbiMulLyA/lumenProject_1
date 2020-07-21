<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class AuthorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function index(){
        $data['Data Author']=[
            "id" => 1,
            "username" => "Abi",
            "password" => "Abimulya",
            "salt" => "Encrypted Password",
            "email" => "Abimulya.2001@gmail.com",
            "profile" => "Insya Allah saya akan menjadi Developer Professional"
        ];

        return response($content=$data, $status = 200)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }

    public function create(Request $request){
        $data['Data Author'] = [
            "id" => $request->input('id'),
            "username" => $request->input("username"),
            "password" => $request->input("password"),
            "salt" => $request->input("salt"),
            "email" => $request->input("email"),
            "profile" => $request->input("profile")
        ];
        // $name = $request->input('name');
        return response($content=$data, $status = 201)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }
    //
}
