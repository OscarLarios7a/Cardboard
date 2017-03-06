<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Categories;
use App\Post;
use App\UserPost;
use App\CategoryPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(Auth::user()->id);
        $Categories = Categories::all();
        return view('CreatePost',['Categories'=>$Categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $file = $request->file('Imgpost');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));

        $Post = New Post;
        $Post->TitlePost = $request['TitlePost'];
        $Post->InfoPost = $request['InfoPost'];
        $Post->Imgpost = '/storage/'.$nombre;
        $Post->save();

        $CategoryPost = New CategoryPost;
        $CategoryPost->category_id = $request['Categories'];
        $CategoryPost->post_id = $Post->id;
        $CategoryPost->save();

        $UserPost = New UserPost;
        $UserPost->user_id = Auth::user()->id;
        $UserPost->post_id = $Post->id;
        $UserPost->save();

        return back()->with('Success','Post creado con exito');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
