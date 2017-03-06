<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Groups;
use DB;
use App\InfoAdditionalUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GroupUser = DB::table('Groups')
        ->join('User_group','Groups.id','=','User_group.Group_id')
        ->where('User_group.user_id','=',Auth::user()->id)
        ->first();
        return view('home',['NameGroup' => $GroupUser->name]);
    }
    public function MyProfile()
    {
        $DataProfile = Auth::user();
        $AdditionalInfo = InfoAdditionalUser::where('user_id',Auth::user()->id)->get();
        return view('profile',['DataProfile'=>$DataProfile,'AdditionalInfo'=>$AdditionalInfo]);
    }
    public function UpdateUserProfile(request $request)
    {
      
        $file = $request->file('url_photo_profile');
        $UpdateUser = User::where('id',Auth::user()->id)->firstOrFail();
        $UpdateUser->name = $request['name'];
        $UpdateUser->lastname = $request['lastname'];
        $UpdateUser->Genre = $request['Genre'];
        $UpdateUser->date_birth = $request['date_birth'];
        $UpdateUser->nickname = $request['nickname'];
        if($file != '')
        {
            
             $nombre = $file->getClientOriginalName();
             \Storage::disk('local')->put($nombre,  \File::get($file));
             $UpdateUser->url_photo_profile = '/storage/'.$nombre;
        }
        
        $UpdateUser->save();
         return back()->with('Success','Datos Actualizados con exito');
    }
    public function AditionalInfo(request $request)
    {
        $title = $this->LimpiarArrays($request['title']);
        $description = $this->LimpiarArrays($request['description']);
        
        foreach ($title as $key => $value) {
            $AdditionalInfo = New InfoAdditionalUser;
            $AdditionalInfo->PersonalRow = $value;
            $AdditionalInfo->Description = $description[$key];
            $AdditionalInfo->user_id = Auth::user()->id;
            $AdditionalInfo->save();
        }
        foreach ($request['idAdditionalInfo'] as $key => $value) {
            $AdditionalInfoUpdate =InfoAdditionalUser::where('id',$value)->firstOrFail();
            $AdditionalInfoUpdate->PersonalRow = $request['title_U'][$key];
            $AdditionalInfoUpdate->Description = $request['description_U'][$key];
            $AdditionalInfoUpdate->save();
        }
       
        return back()->with('Success','Datos Actualizados con exito');


    }
    public function LimpiarArrays($request)
    {
        $Array = $request;
        $CleanArray = array_pop($Array);
        return $Array;
    }
}
