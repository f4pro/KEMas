<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserManagementModel;

class UserManagementController extends Controller
{
    public function index()
    {
        $UserManagementModel = new UserManagementModel();

        $pager = \Config\Services::pager();
        
        echo view('user_management');
    }
    
}