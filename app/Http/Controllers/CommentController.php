<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class CommentController extends Controller
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
        $data['Data Comment'] = [
            "id"=> 3,
            "content"=> "Corona Naik Terus.. Mudah-mudahan cepet selesai... Amiinn",
            "status"=> "Published",
            "crete_time"=> "20/07/2020",
            "author_id"=> "1",
            "email"=> "abimulya.2001@gmail.com",
            "url"=> "https://kompas.com/corona",
            "post_id"=> "2"
        ];

        return response($content=$data, $status = 200)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }

    public function create(Request $request){
        $data['Data Comment'] = [
            "id "=> $request->input("id"),
            "content" => $request->input("content"),
            "status" => $request->input("status"),
            "create_time" => $request->input("create_time"),
            "author_id" => $request->input("author_id"),
            "email" => $request->input("email"),
            "url" => $request->input("url"),
            "post_id" => $request->input("post_id")
        ];
        // $name = $request->input('name');
        return response($content=$data, $status = 201)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }
    public function patch(Request $request){
        $id = $request->route('id');
        $data['Data Comment'] = [
            "id "=> $id,
            "content" => $request->input("content"),
            "status" => $request->input("status"),
            "create_time" => $request->input("create_time"),
            "author_id" => $request->input("author_id"),
            "email" => $request->input("email"),
            "url" => $request->input("url"),
            "post_id" => $request->input("post_id")
        ];
        // $name = $request->input('name');
        return response($content=$data, $status = 201)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }
    public function Delete(Request $request){
        $id = $request->route('id');
        return "id = ".$id." Deleted";
    }
    //
}
