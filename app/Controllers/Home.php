<?php

namespace App\Controllers;

use App\Models\akun;
use App\Models\desa;
use App\Models\tps;
use PhpParser\Node\Expr\Print_;

class Home extends BaseController
{

    public function __construct()
    {
        $this->userModel = new \App\Models\akun();                       
        $this->modelDesa = new \App\Models\desa();        
        $this->tpsModel = new \App\Models\tps();        
    }

    public function index()
    {
        return view('welcome_page');
    }

    public function login_page()
    {
        return view('login');
    }

    public function dashboard()
    {
        if (session()->get('logged_in') == true) {
            return view('dashboard');
        } else {
            session()->setFlashData('icon', 'warning');
            session()->setFlashData('title', 'Login');
            session()->setFlashData('text', 'Maaf, anda diharuskan untuk login terlebih dahulu');
            return redirect()->to(base_url('Home/login_page'));
        }
    }

    public function keluar()
    {
        session()->remove('logged_in');
		session()->setFlashData('icon', 'success');
        session()->setFlashData('title', 'Keluar');
        session()->setFlashData('text', 'Anda berhasil keluar');
		return redirect()->to(base_url('Home/login_page'));
    }

    public function tabel_akun()
    {
        if (session()->get('logged_in') == true) {
            $akun = new akun();        
            $data['akun'] = $akun->getAkun();                     
            return view('tabel_akun', $data);
        } else {
            session()->setFlashData('icon', 'warning');
            session()->setFlashData('title', 'Login');
            session()->setFlashData('text', 'Maaf, anda diharuskan untuk login terlebih dahulu');
            return redirect()->to(base_url('Home/login_page'));
        }
    }

    public function tabel_tps($id)
    {
        if (session()->get('logged_in') == true) {
            if ($id != session()->get('desa')) {
                session()->setFlashData('icon', 'warning');
                session()->setFlashData('title', 'Tidak ada akses');
                session()->setFlashData('text', 'Maaf, anda tidak boleh mengakses halaman tersebut');
                return redirect()->back()->withInput();
            }            
            $tps = new tps();        
            $data['tps'] = $tps->getTPS($id);                                           
            return view('tabel_tps', $data);
        } else {
            session()->setFlashData('icon', 'warning');
            session()->setFlashData('title', 'Login');
            session()->setFlashData('text', 'Maaf, anda diharuskan untuk login terlebih dahulu');
            return redirect()->to(base_url('Home/login_page'));
        }
    }

    public function calon($id = null)
    {
        if (session()->get('logged_in') == true) {
            if ($id != session()->get('desa')) {
                session()->setFlashData('icon', 'warning');
                session()->setFlashData('title', 'Tidak ada akses');
                session()->setFlashData('text', 'Maaf, anda tidak boleh mengakses halaman tersebut');
                return redirect()->back()->withInput();
            }
            $desa = new desa();        
            $data['desa'] = $desa->getDesa($id);                     
            return view('calon', $data);
        } else {
            session()->setFlashData('icon', 'warning');
            session()->setFlashData('title', 'Login');
            session()->setFlashData('text', 'Maaf, anda diharuskan untuk login terlebih dahulu');
            return redirect()->to(base_url('Home/login_page'));
        }
    }

    public function login()
    {
        $session = session();

        $validate = $this->validate([
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Username tidak boleh kosong'
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Password tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $post = $this->request->getPost();
        $query = $this->userModel->table('akun')->getWhere(['username' => $post['username']]);        
        $user = $query->getRow();
        $query2 = $this->modelDesa->table('desa')->getWhere(['id_desa' => $user->desa]);
        $user2 = $query2->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                if ($user->status == 'aktif') { 
                    $desa = '';
                    $nama_desa = '';
                    if ($user->desa == null) {
                        $desa;
                        $nama_desa;
                    } else {
                        $desa = $user->desa;
                        $nama_desa = $user2->nama_desa;
                    }                        
                    $params = [
                        'nama_depan' => $user->nama_depan,                        
                        'nama_belakang' => $user->nama_belakang,
                        'desa' => $desa,
                        'nama_desa' => $nama_desa,
                        'logged_in' => true,
                    ];
                    session()->set($params);                    
                    return redirect()->to(base_url('Home/dashboard'));
                } else {                    
                    $session->setFlashData('icon', 'warning');
                    $session->setFlashData('title', 'Akun nonaktif');
                    $session->setFlashData('text', 'Maaf, akun anda telah di non-aktifkan');
                    return redirect()->to(base_url('Home/login_page'));
                }
            } else {                
                $session->setFlashData('icon', 'error');
                $session->setFlashData('title', 'Gagal');
                $session->setFlashData('text', 'Password anda salah');
                return redirect()->to(base_url('Home/login_page'));
            }
        } else {            
            $session->setFlashData('icon', 'warning');
            $session->setFlashData('title', 'Warning');
            $session->setFlashData('text', 'Username tidak ditemukan');
            return redirect()->to(base_url('Home/login_page'));
        }
    }

    public function tambah_data_akun()
    {
        $session = session();

        $validate = $this->validate([
            'nama_depan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Depan tidak boleh kosong'
                ],
            ],
            'nama_belakang' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Belakang tidak boleh kosong'
                ],
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Email tidak boleh kosong'
                ],
            ],
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Username tidak boleh kosong'
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Password tidak boleh kosong'
                ],
            ],
            'desa' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Desa tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $pass = $this->request->getPost('password');
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $data = [            
            'nama_depan'    => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),     
            'email'         => $this->request->getPost('email'),
            'username'      => $this->request->getPost('username'),
            'password'      => $hash,
            'desa'          => $this->request->getPost('desa'),
            'status'        => "aktif"
        ];

        $success = $this->userModel->tambah_akun($data);

        if ($success) {            
            $session->setFlashData('title', 'Akun Pengguna berhasil ditambahkan');            
            return redirect()->to(base_url('Home/tabel_akun'));
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function edit_data_akun()
    {
        $session = session();

        $validate = $this->validate([
            'nama_depan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Depan tidak boleh kosong'
                ],
            ],
            'nama_belakang' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Belakang tidak boleh kosong'
                ],
            ],
            'email' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Email tidak boleh kosong'
                ],
            ],
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Username tidak boleh kosong'
                ],
            ],
            'desa' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Desa tidak boleh kosong'
                ],
            ],
        ]);

        // if (!$validate) {
        //     return redirect()->back()->withInput();
        // }

        $id_akun = $_POST['id_akun'];        
        $data = [
            'nama_depan'    => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),     
            'email'         => $this->request->getPost('email'),
            'username'      => $this->request->getPost('username'),            
            'desa'          => $this->request->getPost('desa'),            
        ];
                
        $model = new akun();
        $model->update($id_akun, $data);        
        $session->setFlashData('title', 'Akun Pengguna berhasil diubah');
        return redirect()->to(base_url('Home/tabel_akun')); 
    }

    public function ubah_password()
    {
        $session = session();

        $validate = $this->validate([
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Password tidak boleh kosong'
                ],
            ],
        ]);

        // if (!$validate) {
        //     return redirect()->back()->withInput();
        // }

        $id_akun = $_POST['id_akun'];       
        $password = $this->request->getPost('password');
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $data = ['password' => $hash];
        $model = new akun();
        $model->update($id_akun, $data);        
        $session->setFlashData('title', 'Password berhasil diubah');
        return redirect()->to(base_url('Home/tabel_akun')); 
    }

    public function ubah_status($id = null)
    {
        $data = [
            'status' => "nonaktif"            
        ];

        $model = new akun();
        $model->update($id, $data);
        session()->setFlashData('title', 'Status akun berhasil diubah');        
        return redirect()->to(base_url('Home/tabel_akun'));
    } 

    public function proses_tambah_tps()
    {
        $session = session();

        $validate = $this->validate([
            'banjar_tps' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Banjar TPS tidak boleh kosong'
                ],
            ],
            'jml_pml_tetap' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Jumlah Pemilih Tetap tidak boleh kosong'
                ],
            ],
            'mgn_hak_suara' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Jumlah yang menggunakan hak suara tidak boleh kosong'
                ],
            ],
            'tdk_mgn_hak_suara' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Jumlah yang tidak menggunakan hak suara tidak boleh kosong'
                ],
            ],
            'suara_tdk_sah' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Suara Tidak Sah tidak boleh kosong'
                ],
            ],
            'calon1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Suara Calon 1 tidak boleh kosong'
                ],
            ],
            'calon2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Suara Calon 2 tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }
        
        $data = [
            'banjar_tps'        => $this->request->getPost('banjar_tps'),
            'jml_pml_tetap'     => $this->request->getPost('jml_pml_tetap'),
            'mgn_hak_suara'     => $this->request->getPost('mgn_hak_suara'),
            'tdk_mgn_hak_suara' => $this->request->getPost('tdk_mgn_hak_suara'),
            'suara_tdk_sah'     => $this->request->getPost('suara_tdk_sah'),
            'calon1'            => $this->request->getPost('calon1'),
            'calon2'            => $this->request->getPost('calon2'),
            'calon3'            => $this->request->getPost('calon3'),
            'calon4'            => $this->request->getPost('calon4'),
            'calon5'            => $this->request->getPost('calon5'),
            'desa'              => $session->get('desa'),
        ];

        $success = $this->tpsModel->tambah_tps($data);

        if ($success) {            
            $session->setFlashData('title', 'Data berhasil ditambahkan');            
            return redirect()->to(base_url('Home/tabel_tps/'.$session->get('desa')));
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function edit_data_tps()
    {
        $session = session();

        $validate = $this->validate([
            'banjar_tps' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Banjar TPS tidak boleh kosong'
                ],
            ],
            'jml_pml_tetap' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Jumlah Pemilih Tetap tidak boleh kosong'
                ],
            ],
            'mgn_hak_suara' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Jumlah yang menggunakan hak suara tidak boleh kosong'
                ],
            ],
            'tdk_mgn_hak_suara' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Jumlah yang tidak menggunakan hak suara tidak boleh kosong'
                ],
            ],
            'suara_tdk_sah' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Suara Tidak Sah tidak boleh kosong'
                ],
            ],
            'calon1' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Suara Calon 1 tidak boleh kosong'
                ],
            ],
            'calon2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kolom Suara Calon 2 tidak boleh kosong'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $id = $this->request->getPost('id_tps');

        $data = [
            'banjar_tps'        => $this->request->getPost('banjar_tps'),
            'jml_pml_tetap'     => $this->request->getPost('jml_pml_tetap'),
            'mgn_hak_suara'     => $this->request->getPost('mgn_hak_suara'),
            'tdk_mgn_hak_suara' => $this->request->getPost('tdk_mgn_hak_suara'),
            'suara_tdk_sah'     => $this->request->getPost('suara_tdk_sah'),
            'calon1'            => $this->request->getPost('calon1'),
            'calon2'            => $this->request->getPost('calon2'),
            'calon3'            => $this->request->getPost('calon3'),
            'calon4'            => $this->request->getPost('calon4'),
            'calon5'            => $this->request->getPost('calon5'),
            'desa'              => $session->get('desa'),
        ];

        $model = new tps();
        $model->update($id, $data);        
        $session->setFlashData('title', 'Data TPS berhasil diubah');
        return redirect()->to(base_url('Home/tabel_tps/'.$session->get('desa'))); 
    }
}
