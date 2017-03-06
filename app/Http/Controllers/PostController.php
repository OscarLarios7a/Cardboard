<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Categories;
use App\Post;
use App\UserPost;
use App\CategoryPost;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AllPosts = DB::table('Post')
        ->join('Category_Post','Post.id','=','post_id')
        ->join('Categories','Categories.id','=','Category_Post.category_id')
        ->join('User_Post','User_post.post_id','=','Post.id')
        ->select('Post.id','Post.TitlePost','Post.InfoPost','Categories.name')
        ->where('User_post.user_id','=', Auth::user()->id)
        ->get();
        //dd($AllPosts);
        return view('PostsUser',['AllPosts'=>$AllPosts]);



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

        

        $Post = New Post;
        $Post->TitlePost = $request['TitlePost'];
        $Post->InfoPost = $request['InfoPost'];
        if($request->file('Imgpost') != "")
        {
            $file = $request->file('Imgpost');
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file)); 
            $Post->Imgpost = '/storage/'.$nombre;
        }
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
        //dd($id);
        $Categories = Categories::all();
        $InfoPost = Post::where('id',$id)->firstOrFail();
        return view('EditPost',['Categories'=>$Categories,'InfoPost'=>$InfoPost]);
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
