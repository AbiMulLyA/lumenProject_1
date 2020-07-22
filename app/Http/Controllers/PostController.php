<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class PostController extends Controller
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
        $data['Data Post'] = [
            "id"=> 2,
            "tittle"=> "Hari Ini Positif Corona meningkat 1693 Kasus",
            "content"=>"Corona Naik Terus.. Mudah-mudahan cepet selesai... Amiinn",
            "tags"=> "#corona",
            "status"=> "published",
            "create_time"=> "20/07/2020",
            "update_time"=> "20/07/2020",
            "author_id"=> "1"
        ];

        return response($content=$data, $status = 200)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }

    public function create(Request $request){
        $data['Data Author'] = [
            "id" => $request->input("id"),
            "title" => $request->input("title"),
            "content" => $request->input("content"),
            "tags" => $request->input("tags"),
            "status" => $request->input("status"),
            "create_time" => $request->input("create_time"),
            "update_time" => $request->input("update_time"),
            "author_id" => $request->input("author_time")
        ];
        // $name = $request->input('name');
        return response($content=$data, $status = 201)
            ->header("content-type","application/json")
            ->header('Author','Abi');
    }
    public function patch(Request $request){
        $id = $request->route('id');
        $data['Data Author'] = [
            "id" => $id,
            "title" => $request->input("title"),
            "content" => $request->input("content"),
            "tags" => $request->input("tags"),
            "status" => $request->input("status"),
            "create_time" => $request->input("create_time"),
            "update_time" => $request->input("update_time"),
            "author_id" => $request->input("author_time")
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
