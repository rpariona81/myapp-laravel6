<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\People;
use App\Models\Session;
use App\Models\Instituto;
use App\Models\Equipamiento;
use App\Models\ProgramaEstudio;
use App\Services\PeopleService;
use App\Services\InstitutoService;
use App\Services\RegionService;
use Illuminate\Support\Facades\DB;

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

    public function verRoles()
    {
        //$data = Role::all();
        $data = Role::all();
        return $data;
    }

    public function getUserInfo(Request $request){
        $user_info = array();
        $user_info['user_name'] = (auth()->check()) ? auth()->user()->username : null;
        $user_info['user_id'] = (auth()->check()) ? auth()->user()->id : null;
        $user_info['user_email'] = (auth()->check()) ? auth()->user()->email : null;
        //$user_info['user_password'] = (auth()->check()) ? auth()->user()->password : null;
        //$user_info['user_email_verified_at'] = (auth()->check()) ? auth()->user()->email_verified_at : null;
        //$user_info['user_rolename'] = (auth()->check()) ? auth()->user()->rolename : null;
        //$user_info['user_rolename'] = (auth()->check()) ? auth()->user()->roles->first()->rolename : null;
        //$query = User::with('roles')->find(auth()->user()->id);
        $query = User::with('roles')->find(auth()->user()->id);
        //$request->session()->push('teams', 'developers');
        //session(['user_rol' => $query->roles->first()->rolename]);
        $user_info['user_rolename'] = (auth()->check()) ? $query->roles->first()->rolename : null;
        $user_info['user_roleid'] = (auth()->check()) ? $query->roles->first()->id : null;
        
        //printf($query."-".auth()->user()->id);
        printf("<br/>");

        $data = $request->session()->all();
        //return response()->json(auth()->user());
        return response()->json($user_info);
        //return response()->json($data);
    }

    public function verPeople()
    {
        $data = People::all();
        return $data;
    }

    public function nuevoPeople()
    {
        $data = new People();
        $data->firstname = 'Ítalo';
        $data->lastname = 'Ramonés';
        $data->birthdate = '1956-05-15';
        $data->created_by = auth()->user()->id;
        $data->save();
    }

    public function testService()
    {
        $data = new \stdClass();
        $data->firstname = 'Toby';
        $data->lastname = "McGuire";
        $data->birthdate = '1965-06-15';
        //PeopleService::create($data);
        PeopleService::execInsert($data);
    }

    public function updPeople()
    {
        $data = new \stdClass();
        //$data->id = 1;
        $data->id = 2;
        //$data->id = 3;
        $data->firstname = 'Jhon';
        $data->firstname = 'Teófilo';
        //$data->firstname = 'Juanes';
        //$data->firstname = 'Julio';
        //$data->lastname = 'Doe';
        //$data->lastname = 'Ribeyro';
        $data->lastname = 'Bonachon';
        //$data->lastname = 'Cubillas';
        //$data->birthdate = '1955-06-15';
        $data->birthdate = '2000-09-15';
        //$data->birthdate = '1989-06-15';
        //PeopleService::create($data);
        /*$people = People::findOrFail($data->id);
            $people->firstname = $data->firstname;
            $people->lastname = $data->lastname;
            $people->birthdate = $data->birthdate;
            $people->updated_by = auth()->user()->id;
            //dd($people);
            $people->save();
            /*DB::table('t_people')
            ->where('id', $data->id)
            ->update(['firstname' => $data->firstname,
                     'lastname' => $data->lastname]);*/
            //dd($people);
            //$people = People::update($people);
        //return $data;
            //dd($people);
        PeopleService::updatePeople($data);
    }


    public function verSesiones()
    {
        $data = Session::all();
        return $data;
    }

    public function verInstitutos()
    {
        $data = InstitutoService::getList();
        return $data;
    }

    public function verInstituto()
    {
        $data = new \stdClass();
        //$data->id = 1;
        $data->id = 2;
        $lista = InstitutoService::select($data);
        return $lista;
    }

    public function updInstituto(){
        //DB::table('t_institutos')->whereNull('ES_LICENCIADO')->update(array('ES_LICENCIADO' => 'NO'));
        $data = Instituto::whereNull('ES_LICENCIADO')->update(array('ES_LICENCIADO' => 'NO'));
        return $data;
    }

    public function verRegiones()
    {
        $data = RegionService::getList();
        return $data;
    }

    public function verRegion()
    {
        $data = new \stdClass();
        //$data->id = 1;
        $data->id = 2;
        $lista = RegionService::select($data);
        return $lista;
    }

    public function verEquipamiento()
    {
        //$data = Equipamiento::all();
        $data = ProgramaEstudio::all();
        return $data;
    }

}

