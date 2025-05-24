<?php

namespace App\Modules\Popular\Controllers;

use App\Modules\Popular\Models\LoginModel;
//use App\Modules\Popular\Models\UserModel;
use App\Modules\Popular\DAO\DAOUsuarios;


class Usuarios extends BaseController
{
    private $loginModel;
    protected $session;
    protected $request;

    /**
     * Constructor.
     */
    public function __construct()
    {
        helper(['form', 'url']);
        $this->loginModel = new LoginModel();
        //$this->userModel = new UserModel();
        $this->session = session();
        $this->request =  \Config\Services::Request();
    }


	

    public function usuarios($action = false, $id = 0)
    {

	$username = $this->session->get('user')->email ?? false;
	$id_inscricao = session()->get('user')->id ?? 0;
//var_dump(session()->get('user')->nome);
//var_dump($username);
        if (!isset($username) && is_string($username)) {
		echo('nao validou funcao');
            return redirect()->to('/popular/login');
        }
        $data = [
            'username' => $this->session->get('user')->email,
	    'id_inscricao' => $this->session->get('user')->id,
            'action' => $action,
            'id' => $id,
        ];
        $usuarioDAO = new DAOUsuarios();
        echo view('popular/render/header', $data);
        echo view('popular/render/sidebar', $data);

        switch ($action) {
            case 'new':
                if ($post = $this->request->getPost()) {
                    $result = $usuarioDAO->newRecord($post);
                    $data['message'] = $this->session->getFlashData('message');
                    return redirect()->to('/popular/usuarios');
                }else{
                    $data['message'] = $this->session->getFlashData('message');
                    echo view('popular/users/new', $data);
                }
                
                break;
            case 'edit':
                if ($record = $usuarioDAO->editRecord($id)) {
                    $data['edit'] = $record;
                }

                if ($record && $post = $this->request->getPost()) {
                   $result =  $usuarioDAO->editRecord($id, $post);
                   return redirect()->to('/popular/usuarios');
                   
                }
                $data['message'] = $this->session->getFlashData('message');
                echo view('popular/users/new', $data);
                break;
            case 'delete':
                if ($record = $usuarioDAO->editRecord($id)) {
                    $data['edit'] = $record;
                }
                if ($record && $post = $this->request->getPost() && $result = $usuarioDAO->deleteRecord($id)) {
                    return redirect()->to('/popular/usuarios');
                } else {

                    $data['message'] = $this->session->getFlashData('message');
                    echo view('popular/users/new', $data);
                }
                break;
            default:
            
                $data['message'] = $this->session->getFlashData('message');
                $data['record'] = $usuarioDAO->findMaterias(2,$id_inscricao);
                echo view('popular/users/list', $data);
                break;
        }
        echo view('popular/render/footer', $data);
            
    }

	public function votacao(){
		$post = $this->request->getPost();
		//var_dump($post);
		$UsuarioDAO = new DAOUsuarios();
		$add = $UsuarioDAO->setVotacao($post);
		return redirect()->to('/popular/usuarios');

	}

	public function resultado($id = 0){
	//echo $id;
		$username = session()->get('user')->nome ?? false;
	//$id_inscricao = session()->get('user')->id ?? 0;
        if (!isset($username) && is_string($username)) {
            return redirect()->to('/popular/login');
        }

	$usuarioDAO = new DAOUsuarios();
	$favor = $usuarioDAO->getFavoraveis($id);
	$contrario = $usuarioDAO->getContrarios($id);
	$ementa = $usuarioDAO->getEmenta($id);
	$data = [
            'username' => $this->session->get('user')->nome,
	    'id_inscricao' => $this->session->get('user')->id,
	    'ementa' => $ementa[0]->ementa,
            'soma_favoravel' =>$favor[0]->total,
	    'soma_contrario' =>$contrario[0]->total,
            'id' => $id,
        ];
        
	

        echo view('popular/render/header', $data);
        echo view('popular/render/sidebar', $data);
        echo view('popular/users/resultado', $data);

	}




}
