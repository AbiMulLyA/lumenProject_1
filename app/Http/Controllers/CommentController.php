<?php

namespace App\Http\Controllers;
use App\Comment;
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
    
    public function getDataComment(){
        $data = Comment::all();
        if(!$data){
            return response()->json([
                "Status" => "Data Not Found"
            ]);
        }
        return response()->json([
            "datas" => $data
        ]);
    }
    public function getAll(){
        $data = Comment::with(array('author'=>function($query){
            $query->select();
        }))->with(array('post'=>function($query){
            $query->select();
        }))->get();
        if(!$data){
            return response()->json([
                "Status" => "Data Not Found"
            ]);
        }
        return response()->json([
            "datas" => $data
        ]);
    }
    public function getDataByCommentId($id){
        $id = Comment::find($id);
        if(!$id){
            return response()->json([
                "Status" => "ID Not Found"
        ]);
        }
        $data = Comment::where('id',$id)->with(array('Author'=>function($query){
            $query->select();
        }))->with(array('comment'=>function($query){
            $query->select();
        }))->get();

        return response()->json([
            "datas" => $data
        ]);
    }
    public function create(Request $request){
        $data = new Comment();
        $data->content = $request->input("content");
        $data->status = $request->input("status");
        $data->author_id = $request->input("author_id");
        $data->email = $request->input("email");
        $data->url = $request->input("url");
        $data->post_id = $request->input("post_id");
        $data->save();

        return response()->json([
            "status"=> "Success",
            "datas"=> $data
        ]);
    }
    
    public function patch(Request $request, $id){
        $data = Comment::find($id);
        if($data){
            $data->content = $request->input("content");
            $data->status = $request->input("status");
            $data->author_id = $request->input("author_id");
            $data->email = $request->input("email");
            $data->url = $request->input("url");
            $data->post_id = $request->input("post_id");
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
        $data = Comment::find($id);
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
