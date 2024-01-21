<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email_user = $this->request->getVar('email_user');
        $password_user = $this->request->getVar('password_user');
        
        $data = $userModel->where('email_user', $email_user)->first();
        
        if($data){
            $pass = $data['password_user'];
            $authenticatePassword = password_verify($password_user, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id_user' => $data['id_user'],
                    'name_user' => $data['name_user'],
                    'email_user' => $data['email_user'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profile');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }
}