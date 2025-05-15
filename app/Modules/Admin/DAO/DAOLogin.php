<?php

namespace App\Modules\Admin\DAO;

use CodeIgniter\I18n\Time;
use App\Modules\Admin\Models\LoginModel;
use App\Modules\Admin\DAO\DAOUsuarios;

class DAOLogin
{

    public function login($username, $password){
        $login = new LoginModel();
        $user = $login->where(['login' => $username, 'password' => $password])->get()->getRow();
        if(!is_null($user)){
            $lastLogin = $login->update(['id_usuario' => $user->id_usuario],['last_login' => new Time('now')]);
            $usuarioDAO = new DAOUsuarios;
            $user = $usuarioDAO->find($user->id_usuario);
        }
        return $user ?? false;
    }

    public function check_login(){
        $username = session()->get('user')->username ?? false;
        if (isset($username) && is_string($username)) {
            return true;
        }
        return false;
    }
}
