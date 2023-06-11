<?php

namespace App\Services;

use Illuminate\Session\DatabaseSessionHandler;

class MySession extends DatabaseSessionHandler
{
    //protected $user_info;
    /*public function getUserInfo(){
        $$user_info = array(); 
        $user_info['user_id'] = (auth()->check()) ? auth()->user()->id : null;
        return $user_info;
    }*/

    public function write($sessionId, $data)
    {
        $user_id = (auth()->check()) ? auth()->user()->id : null;

        if ($this->exists) {
            $this->getQuery()->where('id', $sessionId)->update([
                'payload' => base64_encode($data), 
                'last_activity' => time(), 
                'user_id' => $user_id,
            ]);
        } else {
            $this->getQuery()->insert([
                'id' => $sessionId, 
                'payload' => base64_encode($data), 
                'last_activity' => time(), 
                'user_id' => $user_id,
            ]);
        }

        $this->exists = true;
    }
    
}