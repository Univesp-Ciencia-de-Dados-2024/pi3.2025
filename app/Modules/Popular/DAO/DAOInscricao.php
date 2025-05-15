<?php

namespace App\Modules\Popular\DAO;

use App\Modules\Popular\Models\UsuariosModel;
class DAOUsuarios
{

    public function newRecord($data)
    {
        $usuario = new UsuariosModel(); 
        $array = [
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
                        
        ];
        $result = $usuario->insert($array);
        if ($result) {
            return session()->setFlashData('message', 'Insert successfull');
        } else {
            return session()->setFlashData('message', 'Insert failed');
        }
    }

    public function find($id){
      $usuario = new UsuariosModel(); 
      return   $usuario->find($id);
    }

    public function findAll()
    {
        $usuario = new UsuariosModel(); 
        return $usuario->findAll();
    }

    public function editRecord($id, $data = [])
    {
        $usuario = new UsuariosModel(); 
        if (empty($data)) {
            return $result = $usuario->find($id);
        }
        $array = [
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            
        ];
        $result = $usuario->update(['id' => $id],$array );
        if ($result) {
            session()->setFlashData('message', 'Update success');
        } else {
            session()->setFlashData('message', 'Update failed');
        }
    }

    public function deleteRecord($id)
    {
        $db = db_connect();
        $result = $db->table('usuarios')->delete(['id' => $id]);
        if ($result) {
            session()->setFlashData('message', 'Delete success');
            return true;
        } else {
            session()->setFlashData('message', 'Delete failed');
            return false;
        }
    }

}
