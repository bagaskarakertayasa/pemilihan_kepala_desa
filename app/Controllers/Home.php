<?php

namespace App\Controllers;

use App\Models\akun;
use App\Models\desa;
use App\Models\tps;

class Home extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = db_connect();

        $this->userModel = new \App\Models\akun();                       
        $this->modelDesa = new \App\Models\desa();        
        $this->tpsModel = new \App\Models\tps();        
    }

    public function index()
    {
        return view('welcome_page');
    }

    public function dashboard()
    {
        if (session()->get('logged_in') == true) {
            return view('dashboard');
        } else {
            session()->setFlashData('icon', 'warning');
            session()->setFlashData('title', 'Login');
            session()->setFlashData('text', 'Maaf, anda diharuskan untuk login terlebih dahulu');
            return redirect()->to(base_url('login'));
        }
    }  
}
