<?php

namespace App\Modules\Land\DAO;

use App\Modules\Land\Models\InscricaoModel;
class DAOInscricao
{

    public function newRecord($data)
    {
        $inscricao = new InscricaoModel(); 
        $array = [
            //'nome' => $data['nome'],
            //'documento' => $data['documento'],
            'email' => $data['email'],
            'senha' => $data['password'],
                        
        ];
        $result = $inscricao->insert($array);
        if ($result) {
            #return session()->setFlashData('message', 'Insert successfull');
            return TRUE;
        } else {
            #return session()->setFlashData('message', 'Insert failed');
            return FALSE;
        }
    }

    public function find($id){
      $inscricao = new InscricaoModel(); 
      return   $inscricao->find($id);
    }

    public function findAll()
    {
        $inscricao = new UsuariosModel(); 
        return $inscricao->findAll();
    }

    public function confirmacao($id)
    {
        $inscricao = new InscricaoModel(); 
        
        $array = [
            'confirmacao' => 1
        ];
        $result = $inscricao->update(['id' => $id],$array );
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function cancelar($id)
    {
        $inscricao = new InscricaoModel(); 
        
        $array = [
            'confirmacao' => 0
        ];
        $result = $inscricao->update(['id' => $id],$array );
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    

}
