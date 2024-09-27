<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $loginModel;
    protected $session;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->session = session();
    }

    // Login Admin dan Chef
    public function loginAdminChef()
    {
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $this->loginModel->validateAdminChef($username, $password);
            if ($user) {
                $this->session->set([
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'isLoggedIn' => true
                ]);
                if ($user['role'] == 'admin') {
                    return redirect()->to('admin/dashboard');
                } else if ($user['role'] == 'chef') {
                    return redirect()->to('chef/dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid login credentials.');
            }
        }

        return view('admin/login_admin');
    }

    // Login Customer menggunakan nomor WhatsApp
    public function loginCustomer()
    {
        if ($this->request->getMethod() === 'post') {
            $whatsapp_number = $this->request->getPost('whatsapp_number');

            if ($this->loginModel->createOrValidateCustomer($whatsapp_number)) {
                $this->session->set([
                    'whatsapp_number' => $whatsapp_number,
                    'role' => 'customer',
                    'isLoggedIn' => true
                ]);
                return redirect()->to('customer/dashboard');
            }
        }

        return view('customer/login');
    }

    // Fungsi logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
