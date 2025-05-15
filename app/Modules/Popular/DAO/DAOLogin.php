<?php

namespace App\Modules\Popular\DAO;

use CodeIgniter\I18n\Time;
use App\Modules\Popular\Models\InscricaoModel;
use App\Modules\Popular\DAO\DAOUsuarios;

class DAOLogin
{

    public function login($username, $password){
        $login = new InscricaoModel();
        $user = $login->where(['email' => $username, 'senha' => $password])->get()->getRow();
        //if(!is_null($user)){
          //  $lastLogin = $login->update(['id_usuario' => $user->id_usuario],['last_login' => new Time('now')]);
        //    $usuarioDAO = new DAOUsuarios;
        //    $user = InscricaoDAO->find($user->id);
        //}
        return $user ?? false;
    }

    public function check_login(){
        $username = session()->get('user')->username ?? false;
        if (isset($username) && is_string($username)) {
            return true;
        }
        return false;
    }

    public function newRecord($data)
    {
        $login = new LoginModel(); 
        $array = [
            'login' => $data['email'],
            'password' => $data['password'],
        ];
        $result = $usuario->insert($array);
        if ($result) {
            return session()->setFlashData('message', 'Insert successfull');
        } else {
            return session()->setFlashData('message', 'Insert failed');
        }
    }

}
