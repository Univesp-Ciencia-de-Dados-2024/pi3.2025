<?php

namespace App\Modules\Popular\DAO;

use App\Modules\Popular\Models\VotacaoModel;
class DAOUsuarios
{

    public function findMaterias($id_pauta,$id_insc){
	$db = \Config\Database::connect();
	$id_inscricao = $id_insc;
        $query = $db->query('SELECT * from materia m where m.id_pauta='.$id_pauta.' and m.id_materia not in ( select id_materia from votacao v where m.id_materia = v.id_materia and v.id_inscricao ='.$id_inscricao.' )');
        $a =  $query->getResult();
        //var_dump($a);
        return $a;
    }

    public function findParticipacoes($id_insc){
	$db = \Config\Database::connect();
	$id_inscricao = $id_insc;
        $query = $db->query('SELECT v.voto, v.id_materia, m.ementa from votacao v left join materia m on (v.id_materia = m.id_materia) where id_inscricao = '.$id_inscricao.' order by v.created_at desc');
        $a =  $query->getResult();
        //var_dump($a);
        return $a;
    }



    public function setVotacao($data)
    {
        $usuario = new VotacaoModel(); 
	$voto = 0;
	if($data['voto']=='aprovar'){
		$voto = 1;
	};

        $array = [
            'id_inscricao' => $data['id_inscricao'],
            'id_materia' => $data['materia_id'],
            'voto' => $voto,
            'justificativa' => $data['justificativa'],
                        
        ];
        $result = $usuario->insert($array);
        if ($result) {
            return session()->setFlashData('message', 'Voto cadastrado com sucesso!');
        } else {
            return session()->setFlashData('message', 'Falha ao cadastrar seu voto!');
        }
    }

	public function getFavoraveis($id_materia){
		$db = \Config\Database::connect();
		//$id_inscricao = $id_insc;
        	$query = $db->query('SELECT COUNT(*) as total FROM votacao v WHERE v.voto=1 and id_materia='.$id_materia);
        	$a =  $query->getResult();
        	//var_dump($a);
        	return $a;
    }

	public function getContrarios($id_materia){
		$db = \Config\Database::connect();
		//$id_inscricao = $id_insc;
        	$query = $db->query('SELECT COUNT(*) as total FROM votacao v WHERE v.voto=0 and id_materia='.$id_materia);
        	$a =  $query->getResult();
        	//var_dump($a);
        	return $a;
    }

	public function getEmenta($id_materia){
		$db = \Config\Database::connect();
		//$id_inscricao = $id_insc;
        	$query = $db->query('SELECT ementa FROM materia m WHERE m.id_materia='.$id_materia);
        	$a =  $query->getResult();
        	//var_dump($a);
        	return $a;
    }



	

}
