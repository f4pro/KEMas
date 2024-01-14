<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function login()
    {
        $data = [];

        if($this->request->getMethod()=='post'){
            $rules = [
                'email'=> 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => "Email or password don't match",
                ],
            ];

            if(!$this->validate($rules,$errors)){
                return view('login',[
                    "validation" => $this->validator,
                ]);

            }else{
                $model = new UserModel();

                $user = $model->where('email', $this-> request->getVar('email'))->first();

                $this->setUserSession($user);
                return redirect()->to(base_url('dashboard'));
            }
        }
        return view('login');
    }

    private function setUserSession($user)
    {
        $data = [
            'us_id' => $user['us_id'],
            'us_name' => $user['us_name'],
            'us_mail' => $user['us_mail'],
            'us_pass' => $user['us_pass'],
            'us_photo' => $user['us_photo'],
            
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [];

        if($this->request->getMethod()=='post'){
            $rules = [
                'us_name' => 'required|min_length[3]|max_length[20]',
                'us_mail' => 'required|min_length[9]|max_length[50]|valid_email|is_unique[us_kemas.us_mail]',
                'us_pass' => 'required|min_length[9]',
                'us_pass_confirm' =>'matches[us_pass]',
            ];

            if(!$this->validate($rules)){
                return view('register', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $newData = [
                    'us_name' => $this->request->getVar('us_name'),
                    'us_mail' => $this->request->getVar('us_mail'),
                    'us_pass' => $this->request->getVar('us_pass'),
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success','Successful Registration');
                return redirect()->to(base_url('login'));
            }
        }
        return view('register');
    }

    public function profile()
    {
        $data = [];
        $model = new UserModel();

        $data['user'] = $model->where('id',session()->get('id'))->first();
        return view('profile',$data);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
