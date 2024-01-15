<?php
namespace App\Filters;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function befor(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('isLoggedIn'))
        {
            return redirect()
            -> to('/signin');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
?>