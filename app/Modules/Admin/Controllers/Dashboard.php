<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\LoginModel;
use CodeIgniter\Controller;

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
        // if (!isLogged()) {
        //    return self::login();
        //    }
        $data = [
            'username' => $this->session->get('user')->nome,
        ];
        echo view('admin/render/header', $data);
        echo view('admin/render/sidebar', $data);
        echo view('admin/index', $data);
        echo view('admin/render/footer', $data);    
    }
}
