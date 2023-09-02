<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login Page',
        ];
        return view('login', $data);
    }

    public function auth()
    {
        $builderUser = new \App\Models\UserModels();

        $inputEmail = $this->request->getVar('email');
        $inputPassword = $this->request->getVar('password');

        $dataUser = $builderUser->where('email', $inputEmail)->first();

        if ($dataUser) {
            if (password_verify($inputPassword, $dataUser['password'])) {
                $ses_data = [
                    'user_id'   => $dataUser['user_id'],
                    'isLogin'   => true,
                ];
                session()->set($ses_data);
                if ($dataUser['role'] === '1') {
                    log_message('info', "User with ID {$dataUser['user_id']} successfully logged in");
                    return redirect()->to(base_url('admin'));
                } elseif ($dataUser['role'] === '2' || $dataUser['role'] === '3') {
                    log_message('info', "User with ID {$dataUser['user_id']} successfully logged in");
                    return redirect()->to(base_url('agreement'));
                }
            }
        } else {
            log_message('error', 'Email or Password incorrect');
            session()->setFlashdata('error', 'Masukkan Email dan Password dengan Benar!!!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        log_message('info', "User with ID " . session()->get('user_id') . " successfully logged out");
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}
