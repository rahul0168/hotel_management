<?php
namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->UserModel = new UserModel();
        //$this->session = session();
        helper(['form', 'url']);
    }

    public function index()
    {
        echo view('header');
        echo view('footer');
        session()->setFlashdata("success", "This is success message");

        session()->setFlashdata("warning", "This is warning message");

        session()->setFlashdata("info", "This is information message");

        session()->setFlashdata("error", "This is error message");
        echo view('hotelcheckin');

    }

    //--------------------------------------------------------------------

    public function room($id = null)
    {

        echo view('header');

        $data = [

            'checkindate' => $this->request->getVar('checkindate'),
            'checkoutdate' => $this->request->getVar('checkoutdate'),
            'price' => $this->request->getVar('price'),
            'days' => $this->request->getVar('days'),
            'adult' => $this->request->getVar('adult'),
            'children' => $this->request->getVar('children'),

        ];
        $data['user'] = $this->UserModel->roominfo();
        //var_dump($data['user']);
        //exit();
        //$data['detail'] = $this->UserModel->getOne('rooms', array('id'));
        //var_dump($data['detail']);
        //exit();

        return view('rooms', $data);
        echo view('footer');

    }

    public function cart($id = null)
    { echo view('header');
        $data = [
            'days' => $this->request->getVar('days'),
        ];
        $id = $this->request->getVar('id');
        $data['room'] = $this->UserModel->roomcart($id);
        // var_dump($data['room']);

        return view('cart', $data);
    }

    public function savebookinfo()
    {
        $data = [

            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'paymentmethod' => $this->request->getVar('payment'),
            'address' => $this->request->getVar('address'),
            'room_type' => $this->request->getVar('room_type'),
            'room_no' => $this->request->getVar('room_no'),
            'realprice' => $this->request->getVar('realprice'),

        ];
        // var_dump($data);
        // exit();
        $room_id = $this->request->getVar('room_id');
        $username= $this->request->getVar('firstname')
        if ($this->UserModel->createuser($data)) {
           
            if ( $this->UserModel->updatestatus($room_id)) {

                    $to = $this->request->getVar('email');

                    $sub = 'RNM Company';

                    $message = 'Dear ".$username."' ;
                    // $message = 'hi';
                    $email = \Config\Services::email();
                    $email->setFrom('sahilnaikmule@gmail.com', 'Room Booking Info');
                    $email->setTo($to);

                    $email->setSubject($sub);
                    $email->setMessage($message);

                    if ($email->send()) {

                        $this->session->setTempdata('success', 'Mail has been sent on form email', 3);
                       return redirect()->to('hotelcheckin');
                    } else {
                        $this->session->setTempdata('error', 'sorry to create account', 3);
                        //return redirect()->to(current_url());

                        /*$er = $email->printDebugger(['headers']);
                        print_r($er);*/
                    }

                } else {

                    $this->session->setTempdata('error', 'sorry uable to create account', 3);
                    return redirect()->to(current_url());
                }
        

        } else {
            return view('cart');

        }
    }

    public function add($id = null)
    {   $data['session'] = session();
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
    {  $data['session'] = session();
        $data['admin'] = $this->UserModel->getOne('login', array('id' => 1));

        echo view('dasheader');
        $data['details'] = $this->UserModel->roominfo();

        echo view('rooms/list', $data);
        echo view('dashfooter');

    }

    public function save($id = null)
    {

        $error = 0;
        $roomimg = $this->request->getFile('roomimg');
        // var_dump($roomimg);
        // exit();

        // $file_roomimg = $roomimg->getClientName();
        $file_roomimg = $roomimg->getClientName();
        // var_dump($file_roomimg);
        // exit();

        if ($id != '') {

            //edit and new file is uoploaded
            // check if valid
            if ($roomimg->getClientName() != '') {

                if (!$roomimg->isValid()) {
                    $error = 1;
                } else {

                    $roomimg->move(ROOTPATH . "public/assets/img/$id");

                }

            } else {
                // retain old file name in table
                $file_roomimg = $this->UserModel->getoneroom(array('id' => $id))->img;
            }
        } else {

            // add part
            // file will always be uploaded as its mandatory

            if (!$roomimg->isValid()) {
                $error = 1;
            }
        }

        $data = [

            'room_type' => $this->request->getVar('room_type'),
            'room_no' => $this->request->getVar('room_no'),
            'price' => $this->request->getVar('price'),
            'img' => $file_roomimg,

        ];

        if ($id != '') {
            $data['updated_datetime'] = date('Y-m-d H:i:s');

            $this->UserModel->updateroom($data, $id);

        } else {

            $data['created_datetime'] = date('Y-m-d H:i:s');
            $id = $this->UserModel->addData('rooms', $data);

            $roomimg->move(ROOTPATH . "public/assets/img/$id");

        }
        return redirect()->to(base_url('dashboard/roomlist'));
    }

    public function delete($id = null)
    {
        $data['session'] = session();
        //$data['details'] = $this->UserModel->deleteroom($id);
        $data['item'] = $this->UserModel->deleteroom(array('id' => $id));

        echo view('rooms/list', $data);
        return redirect()->to(base_url('home/roomlist'));

    }

}
