<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        echo view('user_management');
    }
}