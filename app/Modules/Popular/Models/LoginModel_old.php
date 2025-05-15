<?php

namespace App\Modules\Popular\Models;

use CodeIgniter\I18n\Time;

class LoginMode
{
    

    public function check_login()
    {
        $username = session()->get('user')->username ?? false;
        if (isset($username) && is_string($username)) {
            return true;
        }
        return false;
    }

    public function login($username, $password)
    {
        $db = db_connect();

        $user = $db->table('login')->where(['login' => $username, 'password' => $password])->get()->getRow();
        if(!is_null($user)){
            $lastLogin = $db->table('login')->update(['last_login' => new Time('now')], ['id_usuario' => $user->id]);
            $user = $db->table('usuarios')->where(['id' => $user->id])->get()->getRow();
        }
        
        return $user ?? false;
    }

    }
