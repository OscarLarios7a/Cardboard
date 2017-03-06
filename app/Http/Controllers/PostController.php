<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Categories;
use App\Post;
use App\UserPost;
use App\GroupPost;
use DB;
use App\Comments;
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
        ->join('User_Post','User_post.post_id','=','Post.id')
        ->join('Categories','Categories.id','=','Post.Category_id')
        ->select('Post.id as idPost','Post.TitlePost','Post.InfoPost','Categories.name')
        ->where('User_post.user_id','=', Auth::user()->id)
        ->get();
        
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
        $Post->Category_id = $request['Categories'];
        $Post->save();

        $GroupUser = DB::table('Groups')
        ->join('User_group','Groups.id','=','User_group.Group_id')
        ->select('Groups.id')
        ->where('User_group.user_id','=',Auth::user()->id)
        ->first();

        $GroupPost = New GroupPost;
        $GroupPost->post_id = $Post->id;
        $GroupPost->group_id = $GroupUser->id;
        $GroupPost->save();

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
        $Post = DB::table('Post')
        ->join('User_Post','User_post.post_id','=','Post.id')
        ->join('users','users.id','=','User_Post.user_id')
        ->join('Categories','Categories.id','=','Post.Category_id')
        ->select('Post.id as idPost','Post.TitlePost','Post.InfoPost','Post.Imgpost','Post.created_at','users.url_photo_profile','users.nickname','Categories.name')
        ->where('Post.id','=', $id)
        ->first();
        $Comments = DB::table('Comments')
        ->join('users','users.id','=','Comments.user_id')
        ->select('Comments.Comment','Comments.created_at','users.nickname')
        ->where('Comments.post_id','=',$id)
        ->get();
       
        return view('SinglePost',['InfoPost' => $Post,'Comments' => $Comments]);
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
    public function SaveComments(request $request)
    {
        //dd($request->all());
        $Comments = New Comments;
        $Comments->user_id = Auth::user()->id;
        $Comments->post_Id = $request['idPost'];
        $Comments->Comment = $request['Comments'];
        $Comments->save();

        return back()->with('Success','Comentario añadido con exito');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $Post = Post::where('id',$request['idPost'])->firstOrFail();
        $Post->TitlePost = $request['TitlePost'];
        $Post->InfoPost = $request['InfoPost'];
        $Post->Category_id =$request['Categories'];
        if($request->file('Imgpost') != "")
        {
            $file = $request->file('Imgpost');
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file)); 
            $Post->Imgpost = '/storage/'.$nombre;
        }
        $Post->save();
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
