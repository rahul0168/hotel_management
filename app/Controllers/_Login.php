<?php
namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{

    public function __construct()
    {

        $this->LoginModel = new LoginModel();
        //$this->session = session();
        helper(['form', 'url']);
    }

    public function index()
    {

        echo view('header');

        echo view('login');

    }

    public function savelogin($id = null)
    {
        $data = [

            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        // var_dump($data);
        // exit();

        if ($this->LoginModel->getadmindata($data)) {

            $data['admin'] = $this->LoginModel->getOne('login', $data);
            // var_dump($data['admin']);
            // exit();
            echo view('dasheader');

            return view('success', $data);
            echo view('dashfooter');
            //redirect()->to('success');
            //echo view('rooms/add', $data);

        } else {
            echo view('dashboard');

        }
    }
}
