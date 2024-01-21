<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class UserManagementController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['getUser'] = $model->getUser();
        echo view('user_management', $data);
    }

    public function newcomer()
    {
        $model = new UserModel();
        helper(['form']);
        $rules = [
            'name_user'          => 'required|min_length[2]|max_length[50]',
            'email_user'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email_user]',
            'password_user'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'    => 'matches[password_user]'
        ];

        if($this->validate($rules)){
            $data = [
                'name_user' => $this->request->getVar('name_user'),
                'email_user' => $this->request->getVar('email_user'),
                'password_user' => password_hash($this->request->getVar('password_user'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect('/user-manage');
        }else{
            return redirect('/user-manage');
            // return redirect()->to('/user-manage');
            echo '<script> alert("New user: OK"); </script>';
        }
        
    }
    
}