<?php

namespace App\Modules\Popular\DAO;

use App\Modules\Popular\Models\PautaModel;
class DAOPauta
{

    public function newRecord($data){
        $pauta = new PautaModel(); 
        $array = [
            'titulo' => $data['titulo'],
            'data' => $data['data'],
                                    
        ];
        $result = $pauta->insert($array);
        if ($result) {
            return session()->setFlashData('message', 'Insert successfull');
        } else {
            return session()->setFlashData('message', 'Insert failed');
        }
    }

    public function find($id){
      $pauta = new PautaModel(); 
      return   $pauta->find($id);
    }

    public function findAll() {
        $pauta = new UsuariosModel(); 
        return $usuario->findAll();
    }

    //funcao que busca tickets que sou responsavel
    public function findLastPauta(){
        $data = array();
        $i =0;
        $pautaModel = new PautaModel();
        $query = 'Select * from pauta order by data desc' ;
        $pauta = $pautaModel->query($query);
        $pauta = $pauta->getRow(0);
        //var_dump($pauta);
        //echo($pauta->titulo);
        
        $data[$i] = [
                'titulo'=> $pauta->titulo,
                'data' => $pauta->data
            ];
        
        return $data;
    }

//funcao que busca tickets que sou responsavel
    public function getLast(){
        $pautaModel = new PautaModel();
        $query = 'Select * from pauta order by data desc' ;
        $pauta = $pautaModel->query($query);
        $pauta = $pauta->getRow(0);
        //var_dump($pauta);
        //echo($pauta->titulo);
        
        //$data[$i] = [
        //        'titulo'=> $pauta->titulo,
        //        'data' => $pauta->data
        //    ];
        
        return $pauta->id_pauta;
    }


    

}
