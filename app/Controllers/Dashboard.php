<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 use App\Models\UserModel;
class Dashboard extends Controller
{
	public function __construct()
    {

        $this->UserModel = new UserModel();
        //$this->session = session();
        helper(['form', 'url']);
    }
    public function index()
    {
        $data['session'] = session();
        echo view('dash',$data);
        echo view('dashfooter');
    }
   

     public function add($id = null)
    {    $data['session'] = session();
        $data['admin'] = $this->UserModel->getOne('login', array('id' => 1));
        //var_dump($data['admin']);
        //exit();
        echo view('dasheader');
        $data['detail'] = $this->UserModel->getoneroom(array('id' => $id));
        // var_dump($data['detail']);
        // exit();
        echo view('rooms/add', $data);
        echo view('dashfooter');

    }
    public function roomlist()
    {   $data['session'] = session();
        $data['admin'] = $this->UserModel->getOne('login', array('id' => 1));

        echo view('dasheader');
        $data['details'] = $this->UserModel->roominfo();

        echo view('rooms/list', $data);
        echo view('dashfooter');

    }
}