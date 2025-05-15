<?php

namespace App\Modules\Popular\Models;


class UserModel2
{
       
    public function newRecord($data)
    {
        $db = db_connect();
        $array = [
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
                        
        ];

        ///$array_login = [
        //    'username' => $data['nome'],
        //    'password' => $data['sobrenome'],
        //    'email' => $data['cpf'],
         //   'dt_contratacao' => $data['dt_contratacao'],
        //    'ativo' => $data['ativo'],
        //    'departamento' => $data['departamento'],
            
        //];

        $result = $db->table('usuarios')->insert($array);
        //$result_login = $db->table('adm_login')->insert($array);
        if ($result) {
            return session()->setFlashData('message', 'Insert successfull');
        } else {
            return session()->setFlashData('message', 'Insert failed');
        }
    }

    public function getRecord()
    {
        $db = db_connect();
        return $result = $db->table('adm_funcionarios')->get()->getResult();
    }

    public function editRecord($id, $data = [])
    {
        $db = db_connect();
        if (empty($data)) {
            return $result = $db->table('usuarios')->where('id', $id)->get()->getRow();
        }
        $array = [
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            
        ];
        $result = $db->table('usuarios')->update($array, ['id' => $id]);
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
