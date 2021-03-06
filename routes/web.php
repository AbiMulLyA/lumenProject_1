<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get($uri, $callback);
// $router->post($uri, $callback);
// $router->put($uri, $callback);
// $router->patch($uri, $callback);
// $router->delete($uri, $callback);
// $router->options($uri, $callback);

// use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

// $router->post('/author', function (Request $request, Response $response)use($router) {
//     $id = $request->input("id");
//     $username = $request->input("username");
//     $password = $request->input("password");
//     $salt = $request->input("salt");
//     $email = $request->input("email");
//     $profile = $request->input("profile");

//     return response()->json([
//         "id"=> $id,
//         "username"=> $username,
//         "password"=>$password,
//         "salt"=> $salt,
//         "email"=> $email,
//         "profile"=> $profile
//     ]);
// });

// $router->get('/author', function () {
//     $Data_Table = [
//         "id" => 1,
//         "username" => "Abi",
//         "password" => "Abimulya",
//         "salt" => "Encrypted Password",
//         "email" => "Abimulya.2001@gmail.com",
//         "profile" => "Insya Allah saya akan menjadi Developer Professional"
//     ];
//     return $Data_Table;
// });

// $router->get('/author/{id}', function ($id) use ($router) {
//     return "id = $id";
// });

// $router->patch('/author/{id}', function ($id) use ($router) {
//     return "id = $id";
// });

// $router->delete('/author/{id}', function ($id) use ($router) {
//     return "id = $id";
// });

$router->post('/post', function (Request $request, Response $response)use($router) {
    $id = $request->input("id");
    $title = $request->input("title");
    $content = $request->input("content");
    $tags = $request->input("tags");
    $status = $request->input("status");
    $create_time = $request->input("create_time");
    $update_time = $request->input("update_time");
    $author_id = $request->input("author_time");
    
    return response()->json([
        "id"=> $id,
        "tittle"=> $title,
        "content"=>$content,
        "tags"=> $tags,
        "status"=> $status,
        "create_time"=> $create_time,
        "update_time"=> $update_time,
        "author_id"=> $author_id
    ]);
});

$router->get('/post', function () {
    $Data_Table = [
        "id"=> 2,
        "tittle"=> "Hari Ini Positif Corona meningkat 1693 Kasus",
        "content"=>"Corona Naik Terus.. Mudah-mudahan cepet selesai... Amiinn",
        "tags"=> "#corona",
        "status"=> "published",
        "create_time"=> "20/07/2020",
        "update_time"=> "20/07/2020",
        "author_id"=> "1"
    ];
    return $Data_Table;
});

// $router->get('/post/{id}', function ($id) use ($router) {
//     return "id = $id";
// });

// $router->patch('/post/{id}', function ($id) use ($router) {
//     return "id = $id";
// });

// $router->delete('/post/{id}', function ($id) use ($router) {
//     return "id = $id";
// });

// $router->post('/comment', function (Request $request, Response $response)use($router) {
//     $id = $request->input("id");
//     $content = $request->input("content");
//     $status = $request->input("status");
//     $create_time = $request->input("create_time");
//     $author_id = $request->input("author_id");
//     $email = $request->input("email");
//     $url = $request->input("url");
//     $post_id = $request->input("post_id");
    
//     return response()->json([
//         "id"=> $id,
//         "content"=> $content,
//         "status"=> $status,
//         "crete_time"=>$create_time,
//         "author_id"=> $author_id,
//         "email"=> $email,
//         "url"=> $url,
//         "post_id"=> $post_id
//     ]);
// });

// $router->get('/comment', function () {
//     $Data_Table = [
//         "id"=> 3,
//         "content"=> "Corona Naik Terus.. Mudah-mudahan cepet selesai... Amiinn",
//         "status"=> "Published",
//         "crete_time"=> "20/07/2020",
//         "author_id"=> "1",
//         "email"=> "abimulya.2001@gmail.com",
//         "url"=> "https://kompas.com/corona",
//         "post_id"=> "2"
//     ];
//     return $Data_Table;
// });

// $router->get('/comment/{id}', function ($id) use ($router) {
//     return "id = $id";
// });

// $router->patch('/comment/{id}', function ($id) use ($router) {
//     return "id = $id";
// });

// $router->delete('/comment/{id}', function ($id) use ($router) {
//     return "id = $id";
// });
$router->post('auth', 'AuthController@auth');
$router->get('/', function () use ($router) {
    return "Welcome to My Open API.. Please Visit this API Documentation URL to Request Data <br> <a href='https://documenter.getpostman.com/view/11494339/T1DpAwyK'>https://documenter.getpostman.com/view/11494339/T1DpAwyK</a>";
});
$router->group(['middleware'=>'jwt'], function() use ($router){
    $router->group(['prefix'=> 'get'], function() use ($router){
        $router->get('author','AuthorController@getDataAuthor');
        $router->get('author/all','AuthorController@getAll');
        $router->get('author/{id}','AuthorController@getDataByAuthorId');
        $router->post('author', 'AuthorController@create');
        $router->patch('author/{id}', 'AuthorController@patch'); 
        $router->delete('author/{id}', 'AuthorController@delete'); 
    
        $router->get('post','PostController@getDataPost');
        $router->get('post/all','PostController@getAll');
        $router->get('post/{id}','PostController@getDataByPostId');
        $router->post('post', 'PostController@create');
        $router->patch('post/{id}', 'PostController@patch');
        $router->delete('post/{id}', 'PostController@delete');
    
        $router->get('comment','CommentController@getDataComment');
        $router->get('comment/all','CommentController@getAll');
        $router->get('comment/{id}','CommentController@getDataByCommentId');
        $router->post('comment', 'CommentController@create');
        $router->patch('comment/{id}', 'CommentController@patch');
        $router->delete('comment/{id}', 'CommentController@delete');
    });
    
});

