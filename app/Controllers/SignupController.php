<?php 
namespace App\Controllers;
use Codeigniter\Controller;
use App\Models\UserModel;

class SingupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[tbl_user.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if($this->validate($rules))
        {
            $userModel = new UserModel();
            $data = [
                'name' => $this->request->getvar('name'),
                'email' => $this->request->getvar('email'),
                'password' => password_hash($this->request->getcar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
    }
}
?>