<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'name_user'          => 'required|min_length[2]|max_length[50]',
            'email_user'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email_user]',
            'password_user'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password_user]'
        ];

        if($this->validate($rules)){
            $userModel = new UserModel;
            $data = [
                'name_user' => $this->request->getVar('name_user'),
                'email_user' => $this->request->getVar('email_user'),
                'password_user' => password_hash($this->request->getVar('password_user'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
    }
}
