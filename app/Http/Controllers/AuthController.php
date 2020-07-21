<?php 
namespace App\Http\Controllers;
use Firebase\JWT\JWT;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
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

    //
    public function generate(Request $request){
        $key="example_key";
        $payload = [
            "iss" => "lumen",   
            "sub" => $request->input("name"),
            // "pass" => $request->input("password"),
            "lat"=>time(),
            "exp"=>time()+300,
        ];
        $jwt = JWT::encode($payload, $key);
        $decode = JWT::decode($jwt, $key, array('HS256'));
        return response()->json(['token'=>$jwt]);
    }

    public function auth(Request $request){
        if($request->input("name")=="Abi"){
           return $this->generate($request);
        }
        // return $request->input(("name"));
        return abort(401);
    }
}

?>