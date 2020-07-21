<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class UserController extends Controller
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
        $data['status'] = "success";

        return response($content=$data, $status = 200)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }

    public function create(Request $request){
        $data['result'] = [
            "name" => $request->input('name'),
            "class" => $request->input("class")
        ];
        // $name = $request->input('name');
        return response($content=$data, $status = 201)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }
    //
}
