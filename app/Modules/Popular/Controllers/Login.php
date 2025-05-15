<?php

namespace App\Modules\Popular\Controllers;

use App\Modules\Popular\DAO\DAOLogin;
use CodeIgniter\Controller;

class Login extends BaseController
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
        $this->DAOLogin = new DAOLogin();
        $this->session = session();
        $this->request =  \Config\Services::Request();
   
    }
    //funcao que realiza a busca para login e retorna os dados do Usuário
     public function login()
    {
        if ($this->request->getPost()) {
            if ($user = $this->DAOLogin->login($login = $this->request->getPost('username'), $password = $this->request->getPost('password'))) {
                $this->session->set('user', $user);
                $this->session->setFlashData('message', 'Welcome back');
                return redirect()->to('/popular/dashboard')->withCookies();
                #echo "controller do popular";
            } else {
                $this->session->setFlashData('message', 'Falha de Login, usuário ou senha incorretos!
                ');
                
            }
        }
        $data['message'] = $this->session->getFlashData('message');
        $data['username'] = form_input('username', $username ?? '', 'class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..."');
        $data['password'] = form_input('password', $password ?? '', 'class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"', 'password');
        return view('popular/login', $data);
    }
    //funcao que destroi a sessão
    public function logout()
    {
        session_destroy();
        return self::login();
    }

    public function cadastro(){
        echo "Hello cadastro";
    }
}
