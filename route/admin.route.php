<?php

use Models\Admin;
use Models\Auth;

$app->get('/admin/login/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.admin.login');
});

$app->post('/admin/login/', function ($request,  $response) use ($Views) {
    $parsed = $request->getParsedBody();
    $pass = md5($parsed['password']);
    $admin = Admin::where('username', $parsed['username'])->where('password', $pass)->first();
    if ($admin == null) {
        echo $Views->make('back.admin.login', ['error' => "Invalid ! username and password"]);
    } else {
        $_SESSION['admin'] = $admin->toArray();
        $this->auth = new Auth();
        $this->auth->role = admin;
        $this->auth->session_key = $key;
        $this->auth->refrence_id = $std->id;
        $this->auth->save();
        $_SESSION['auth'] = $this->auth->toArray();
        return $response->withRedirect('/admin/');
    }
});
$app->get('/admin/logout/', function ($request,  $response) use ($Views) {
    unset($_SESSION['admin']);
    unset($_SESSION['auth']);
    return $response->withRedirect('/admin/login/');
});

$app->post('/admin/passchange/', function ($request,  $response) use ($Views) {
    $parsed = $request->getParsedBody();
    if ($_SESSION['admin']) {
        $admin = Admin::where('id', $_SESSION['admin']['id'])->first();
        if (md5($parsed['oldpass']) == $admin->password) {
            $admin->password = md5($parsed['password']);
            $admin->save();
            $_SESSION['success'] = "Password has been successfully changed";
            return $response->withRedirect('/admin/');
        } else {
            $_SESSION['error'] = "Current password does not matched !";
            return $response->withRedirect('/admin/');
        }
    } else {
        return $response->withRedirect('/admin/login/');
    }
});
