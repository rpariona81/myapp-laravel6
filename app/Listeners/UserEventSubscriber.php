<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

//use Illuminate\Support\Facades\Date;

class UserEventSubscriber
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Create the event handler.
     *
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param \Illuminate\Auth\Events\Login $event
     */
    public function onUserLogin(Login $event)
    {
        //$event->user->logged_in_at = Carbon::now();
        /*if (config('database.default') == 'mysql') {
            $event->user->logged_in_at = (Carbon::now())->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $event->user->logged_in_at = (Carbon::now())->format('Ymd H:i:s');
        }else{
            $event->user->logged_in_at = (Carbon::now())->format('Y-m-d H:i:s');
        }

        $event->user->ip_address = $this->request->getClientIp();
        //dd($event->user);//
        $event->user->save();*/
        //dd($event->user);
        $user = User::findOrFail($event->user->id);
        //dd($user);
        //$user->setLoggedInAtAttribute(Date::now());
        //dd(Carbon::now()->toDate()->format('Ymd H:i:s'));
        //$shipDate = Carbon::createFromFormat('d-m-Y H:i',Carbon::parse($this->request->date)->format('d-m-Y') . " " . $this->request->time);
        //dd($shipDate);
        //$fecha = (new Carbon())->format('Ymd H:i:s');
        //$value = Carbon::today();
        //$fecha = (new Carbon($value))->format('Y-m-d H:i:s');
        //$fecha = (Carbon::now())->format('Y-m-d H:i:s').'.000';
        //dd($fecha);
        //$user->logged_in_at = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->toDateTimeString();

        //$user->logged_in_at = date('Y-m-d H:i:s');
        //$user->logged_in_at = $fecha;
        //dd(date('Y-m-d'));
        //dd((new Carbon(time()))->format('Ymd H:i:s'));
        /*if (config('database.default') == 'mysql') {
            $user->logged_in_at = Carbon::now()->toDate()->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $user->logged_in_at = date('Y-d-m H:i:s');
        }else{
            $user->logged_in_at = Carbon::now()->toDate()->format('Y-m-d H:i:s');
        }*/

        $user->ip_address = $this->request->getClientIp();
        //dd($event->user);//
        $user->logged_in_at = Carbon::now();
        //dd($user);
        $user->save();
    }

    /**
     * @param \Illuminate\Auth\Events\Logout $event
     */
    public function onUserLogout(Logout $event)
    {
        /*$event->user->logged_out_at = Carbon::now();
        $event->user->save();*/
        //$user = $event->user;

        //dd($event->user);
        $user = User::find($event->user->id);

        //dd($user);
        $user->logged_out_at = Carbon::now();
        //$user->logged_out_at = date('Y-m-d H:i:s.u');

        //dd($user);
        /*
        if (config('database.default') == 'mysql') {
            $user->logged_out_at = (Carbon::now(Date::now()))->format('Y-m-d H:i:s');
        }elseif(config('database.default') == 'sqlsrv'){
            $user->logged_out_at = (Carbon::now(Date::now()))->format('Ymd H:i:s');
        }else{
            $user->logged_out_at = (Carbon::now(Date::now()))->format('Y-m-d H:i:s');
        }*/
        //$user->logged_out_at = (Carbon::now())->format('Y-m-d H:i:s');
        //dd(Carbon::now());
        //dd($user);
        $user->save();
    }

    /**
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(Login::class, static::class . '@onUserLogin');
        $events->listen(Logout::class, static::class . '@onUserLogout');
    }
}
