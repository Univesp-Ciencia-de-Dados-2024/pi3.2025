<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\LoginModel;
//use App\Modules\Admin\Models\UserModel;
use App\Modules\Admin\DAO\DAOUsuarios;


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
        if (!isLogged()) {
            return redirect()->to('/admin/login');
        }
        $data = [
            'username' => $this->session->get('user')->nome,
            'action' => $action,
            'id' => $id,
        ];
        $usuarioDAO = new DAOUsuarios();
        echo view('admin/render/header', $data);
        echo view('admin/render/sidebar', $data);

        switch ($action) {
            case 'new':
                if ($post = $this->request->getPost()) {
                    $result = $usuarioDAO->newRecord($post);
                    $data['message'] = $this->session->getFlashData('message');
                    return redirect()->to('/admin/usuarios');
                }else{
                    $data['message'] = $this->session->getFlashData('message');
                    echo view('admin/users/new', $data);
                }
                
                break;
            case 'edit':
                if ($record = $usuarioDAO->editRecord($id)) {
                    $data['edit'] = $record;
                }

                if ($record && $post = $this->request->getPost()) {
                   $result =  $usuarioDAO->editRecord($id, $post);
                   return redirect()->to('/admin/usuarios');
                   
                }
                $data['message'] = $this->session->getFlashData('message');
                echo view('admin/users/new', $data);
                break;
            case 'delete':
                if ($record = $usuarioDAO->editRecord($id)) {
                    $data['edit'] = $record;
                }
                if ($record && $post = $this->request->getPost() && $result = $usuarioDAO->deleteRecord($id)) {
                    return redirect()->to('/admin/usuarios');
                } else {

                    $data['message'] = $this->session->getFlashData('message');
                    echo view('admin/users/new', $data);
                }
                break;
            default:
            
                $data['message'] = $this->session->getFlashData('message');
                $data['record'] = $usuarioDAO->findAll();
                echo view('admin/users/list', $data);
                break;
        }
        echo view('admin/render/footer', $data);
    }
}
