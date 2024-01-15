<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->match(['get','post'], 'register','User::register',['filter' => 'noauth']);
// $routes->match(['get','post'],'login','User::login',['filter' =>'login']);
// $routes->get('dashboard','Dashboard::index',['filter'=> 'auth']);
// $routes->get('profile','User:profile',['filter'=> 'auth']);
// $routes->get('logout','User::logout');
// $routes->get('/', 'Home::index');

$routes->get('/','SignupController::index');
$routes->get('/signup','SignupController::index');
$routes->match(['get','post'], 'SignupController/store','SignupController::store');
$routes->match(['get','post'], 'SigninController/loginAuth','SigninController::loginAuth');
$routes->get('/signin','SigninController::index');
$routes->get('/profile','ProfileController::index',['filter' => 'authGuard']);