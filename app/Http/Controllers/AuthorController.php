<?php

namespace App\Http\Controllers;
use App\Author;
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
    
    public function getAll(){
        $data = Author::with(array('post'=>function($query){
            $query->select();
        }))->with(array('comment'=>function($query){
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
    public function getDataAuthor(){
        $data = Author::all();
        if(!$data){
            return response()->json([
                "Status" => "Data Not Found"
            ]);
        }
        return response()->json([
            "datas" => $data
        ]);
    }
    public function getDataByAuthorId($id){
        $id = Author::find($id);
        if(!$id){
            return response()->json([
                "Status" => "ID Not Found"
        ]);
        }
        $data = Author::where('id',$id)->with(array('post'=>function($query){
            $query->select();
        }))->with(array('comment'=>function($query){
            $query->select();
        }))->get();

        return response()->json([
            "datas" => $data
        ]);
    }


    public function create(Request $request){
        $data = new Author();
        $data->username = $request->input("username");
        $data->password = $request->input("password");
        $data->salt = $request->input("salt");
        $data->email = $request->input("email");
        $data->profile = $request->input("profile");
        $data->save();

        return response()->json([
            "status"=> "Success",
            "datas"=> $data
        ]);
    }

    public function patch(Request $request, $id){
        $data = Author::find($id);
        if ($data) {
            $data->username = $request->input('username');
            $data->password = $request->input('password');
            $data->salt = $request->input('salt');
            $data->email = $request->input('email');
            $data->profile = $request->input('profile');
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
        $data = Author::find($id);
        if($data) {
            $data->delete();
            return response()->json([
                "message" => "Success Deleted",
                "results" => $data
            ]);   
        }else {
            return response()->json([
                "message" => "Parameter Not Found"
            ]);
        }
    }
}
