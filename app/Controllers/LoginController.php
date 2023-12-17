<?php
namespace App\Controllers;
use App\Models\Login;
class LoginController extends BaseController{
    public function index()
    {
        return view('login');
    }
    public function login_action()
    {
        
        $model = model(Login::class);
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $result = $model->findUserInApi($email, $password);
        if ($result['found']){
            session()->set('num_user', $result['location']);
            return redirect()->to('pages/dashboard');
        } else {
            return redirect()->to('pages/login');
        }
    }
    public function logout() {
        session()->destroy();
        return redirect()->to('pages/login');
    }
}