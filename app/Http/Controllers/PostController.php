<?php

namespace App\Http\Controllers;
use App\Post;
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
    
    public function getAll(){
        $data = Post::all();
        if(!$data){
            return response()->json([
                "Status" => "Data Not Found"
            ]);
        }
        return response()->json([
            "datas" => $data
        ]);
    }
    public function getById($id){
        $data = Post::find($id);
        if(!$data){
            return response()->json([
                "Status" => "ID Not Found"
        ]);
        }
        return response()->json([
            "datas" => $data
        ]);
    }

    public function create(Request $request){
        $data = new Post();
        $data->id = $request->input('id');
        $data->title = $request->input("title");
        $data->content = $request->input("content");
        $data->tags = $request->input("tags");
        $data->status = $request->input("status");
        $data->author_id = $request->input("author_id");
        $data->save();

        return response()->json([
            "status"=> "Success"
        ]);
    }

    public function patch(Request $request, $id){
        $data = Post::find($id);
        if ($data) {
            $data->id = $request->input('id');
            $data->title = $request->input("title");
            $data->content = $request->input("content");
            $data->tags = $request->input("tags");
            $data->status = $request->input("status");
            $data->author_id = $request->input("author_id");
            $data->save();

            return response()->json([
                "status" => "Update Success",
                "datas" => $data
            ]);        
        }else {
            return response()->json([
                "status" => "ID Not Found"
            ]);
        }
    }
    public function Delete(Request $request, $id){
        $data = Post::find($id);
        if($data) {
            $data->delete();
            return response()->json([
                "status" => "Success Deleted",
                "datas" => $data
            ]);   
        }else {
            return response()->json([
                "status" => "ID Not Found"
            ]);
        }
    }
}
