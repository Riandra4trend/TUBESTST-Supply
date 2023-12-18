<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login_action()
    {
        $model = model(Login::class);
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        
        $user = $model->findUserInApi($email, $password);

        if ($user) {
            // Login berhasil, simpan informasi pengguna dalam sesi
            session()->set('num_user', $user);

            // Redirect ke dashboard atau halaman lainnya
            return redirect()->to('pages/dashboard');
        } else {
            // Login gagal, redirect ke halaman login
            return redirect()->to('pages/login');
        }
    }

    public function logout()
    {
        // Hapus sesi dan redirect ke halaman login
        session()->destroy();
        return redirect()->to('pages/login');
    }
}
