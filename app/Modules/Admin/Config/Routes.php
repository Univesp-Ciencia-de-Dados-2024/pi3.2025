<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function ($subroutes) {



    /*** Route for Login no Administrativo***/
    $subroutes->add('', 'Login::login');
    $subroutes->add('login', 'Login::login');
    $subroutes->add('logout', 'Login::logout');

    /*** Route for Dashboard Administrativo***/
    $subroutes->add('dashboard', 'Dashboard::index');
    
    
    /*** Route for Usuarios ***/
    $subroutes->add('usuarios', 'Usuarios::usuarios');
    $subroutes->add('usuarios/new', 'Usuarios::usuarios/new');
    $subroutes->add('usuarios/new/0', 'Usuarios::usuarios/new');
    $subroutes->add('usuarios/edit/(:segment)', 'Usuarios::usuarios/edit/$1');
    $subroutes->add('usuarios/delete/(:segment)', 'Usuarios::usuarios/delete/$1');

    /*** Route for Departments ***/
    //$subroutes->add('departments', 'Departments::depts');
    //$subroutes->add('users/new', 'Users::users/new');
    //$subroutes->add('users/new/0', 'Users::users/new');
    //$subroutes->add('users/edit/(:segment)', 'Users::users/edit/$1');
    //$subroutes->add('users/delete/(:segment)', 'Users::users/delete/$1');

    
    
    
});
