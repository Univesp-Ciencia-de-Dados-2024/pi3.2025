<?php

namespace App\Modules\Popular\Controllers;

use App\Modules\Popular\Models\LoginModel;
use CodeIgniter\Controller;
use App\Modules\Popular\DAO\DAOPauta;
use App\Modules\Popular\DAO\DAOUsuarios;

class Dashboard extends BaseController
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

        $this->session = session();
        $this->request =  \Config\Services::Request();

   
    }
    
    public function index()
    {
        $pauta = new DAOPauta();
	$usuarioDAO = new DAOUsuarios();

        $pauta_dia = $pauta->findLastPauta();
	$participacoes = $usuarioDAO->findParticipacoes($this->session->get('user')->id);
        // if (!isLogged()) {
        //    return self::login();
        //    }
        $data = [
            'username' => $this->session->get('user')->email,
            'titulo'=> $pauta_dia[0]['titulo'],
            'data' => $pauta_dia[0]['data']
	    
        ];
	$data['record'] = $participacoes;
	

        //var_dump($data);
        //var_dump($pauta_dia);
        echo view('popular/render/header', $data);
        echo view('popular/render/sidebar', $data);
        echo view('popular/index', $data);
        echo view('popular/render/footer', $data); 
        //echo("teste");   
    }
}
