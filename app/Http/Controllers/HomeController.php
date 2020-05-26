<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\People;
use App\Models\Session;
use App\Services\PeopleService;
//use App\Services\MySession;
//use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function verUsers()
    {
        $data = User::all();
        return $data;
    }

    public function getUserInfo(){
        $user_info = array();
        $user_info['user_name']  = (auth()->check()) ? auth()->user()->username : null;
        $user_info['user_id'] = (auth()->check()) ? auth()->user()->id : null;
        $user_info['user_email'] = (auth()->check()) ? auth()->user()->email : null;
        $user_info['user_password'] = (auth()->check()) ? auth()->user()->password : null;
        $user_info['user_email_verified_at'] = (auth()->check()) ? auth()->user()->email_verified_at : null;
        //$user_info['role_id'] = (auth()->check()) ? auth()->roles()->id : null;
        return response()->json($user_info);
    }

    public function verRoles()
    {
        $data = User::hasRole();
        return $data;
    }

    public function verPeople()
    {
        $data = People::all();
        return $data;
    }

    public function nuevoPeople()
    {
        $data = new People();
        $data->firstname = 'Jhon Rambo';
        $data->lastname = 'Stallone';
        $data->birthdate = '1956-05-15';
        $data->created_by = auth()->user()->id;
        $data->save();
    }

    public function testService()
    {
        $data = new \stdClass();
        $data->firstname = 'Homero';
        $data->lastname = 'Adams';
        $data->birthdate = '1955-06-15';
        PeopleService::create($data);
    }

    public function verSesiones()
    {
        $data = Session::all();
        return $data;
    }
}

