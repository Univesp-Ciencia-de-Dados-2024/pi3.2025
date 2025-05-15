<?php 
namespace App\Modules\Land\Controllers;
use App\Modules\Land\DAO\DAOInscricao;

class Home extends BaseController
{
	public function index()
	{
		//teste();
		//echo "Sistema de Participação Popular";
		$data = ['title' => 'Home Page', 'view' => 'land/home'];
		return view('template/layout', $data);
	}

	//--------------------------------------------------------------------

	public function cadastrar()
	{
		$inscricao = new DAOInscricao();
		$post = $this->request->getPost();
		$result = $inscricao->newRecord($post);
		#var_dump($post);
		if($result){
			$data = ['title' => 'Home Page', 'view' => 'land/sucesso'];
			return view('land/sucesso', $data);
		}else{
			$data = ['title' => 'Home Page', 'view' => 'land/erro'];
			return view('land/erro', $data);
		}

		#$data = ['title' => 'Home Page', 'view' => 'land/home'];
		#return view('template/layout', $data);
	}

	//--------------------------------------------------------------------
	
}
