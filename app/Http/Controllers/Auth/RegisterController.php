<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Groups;
use App\User_Group;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        $Groups = Groups::all();
        return view('auth.register',['Groups'=>$Groups]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(request $request)
    {
      
       $file = $request->file('url_photo_profile');
       $nombre = $file->getClientOriginalName();


       \Storage::disk('local')->put($nombre,  \File::get($file));

        $User = New User;
        $User->name = $request['name'];
        $User->lastname = $request['lastname'];
        $User->Genre = $request['Genre'];
        $User->date_birth = $request['date_birth'];
        $User->nickname = $request['nickname'];
        $User->email = $request['email'];
        $User->url_photo_profile = '/storage/'.$nombre;
        $User->password = bcrypt($request['password']);
        $User->save();
        
        

        $UserGroup = New User_Group;
        $UserGroup->user_id = $User->id;
        $UserGroup->Group_id = $request['Group'];
        $UserGroup->save();



        return back()->with('Success','Registro Exitoso');

    }
}
