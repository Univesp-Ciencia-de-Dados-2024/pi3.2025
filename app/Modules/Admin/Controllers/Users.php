<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\LoginModel;
use App\Modules\Admin\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
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
        $this->userModel = new UserModel();
        $this->session = session();
        $this->request =  \Config\Services::Request();
    }


    public function users($action = false, $id = 0)
    {
        ///if (!isLogged()) {
        //    return redirect()->to('/admin/login');
       // }
        $data = [
            'username' => $this->session->get('user')->nome,
            'action' => $action,
            'id' => $id,
        ];
        //var_dump($data);
        echo view('admin/render/header', $data);
        echo view('admin/render/sidebar', $data);

        switch ($action) {
            case 'new':
                if ($post = $this->request->getPost()) {
                    $result = $this->userModel->newRecord($post);
                }
                $data['message'] = $this->session->getFlashData('message');
                echo view('admin/users/new', $data);
                break;
            case 'edit':
                if ($record = $this->userModel->editRecord($id)) {
                    $data['edit'] = $record;
                }

                if ($record && $post = $this->request->getPost()) {
                    $this->userModel->editRecord($id, $post);
                }
                $data['message'] = $this->session->getFlashData('message');
                echo view('admin/users/new', $data);
                break;
            case 'delete':
                if ($record = $this->userModel->editRecord($id)) {
                    $data['edit'] = $record;
                }
                if ($record && $post = $this->request->getPost() && $result = $this->userModel->deleteRecord($id)) {
                    return redirect()->to('/admin/users');
                } else {

                    $data['message'] = $this->session->getFlashData('message');
                    echo view('admin/users/new', $data);
                }
                break;
            default:
            
                $data['message'] = $this->session->getFlashData('message');
                $data['record'] = $this->userModel->getRecord();
                //var_dump($data);
                echo view('admin/users/list', $data);
                break;
        }
        echo view('admin/render/footer', $data);
    }
}
