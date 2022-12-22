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

            $session =session();
            $tps = new tps();        
            $data['tps'] = $tps->getTPS($id);
            $data2 = $tps->getTPS($id);
        
            foreach ($data2 as $key) {
                if (empty($key['calon_1'] && $key['calon_2'])) {
                    $session->setFlashData('icon', 'warning');
                    $session->setFlashData('title', 'Data Calon Perbekel Kosong');
                    $session->setFlashData('text', 'Maaf, diharapkan untuk mengisi data calon perbekel terlebih dahulu');
                    return redirect()->back()->withInput();
                } else {
                    return view('tabel_tps', $data);
                }
            }            
            
            // echo "<pre>";
            // print_r($data);
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
                'rules'  => 'required|alpha_space',
                'errors' => [
                    'required' => 'Kolom Banjar TPS tidak boleh kosong',
                    'required' => 'Nama Banjar TPS tidak boleh menggunakan karakter selain huruf dan spasi',
                ],
            ],
            'jml_pml_tetap' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Jumlah Pemilih Tetap tidak boleh kosong',
                    'is_natural' => 'Jumlah Pemilih Tetap tidak boleh menggunakan angka minus',
                ],
            ],
            'mgn_hak_suara' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Jumlah yang menggunakan hak suara tidak boleh kosong',
                    'is_natural' => 'Jumlah yang menggunakan hak suara tidak boleh menggunakan angka minus',
                ],
            ],
            'tdk_mgn_hak_suara' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Jumlah yang tidak menggunakan hak suara tidak boleh kosong',
                    'is_natural' => 'Jumlah yang tidak menggunakan hak suara tidak boleh menggunakan angka minus',
                ],
            ],
            'suara_tdk_sah' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Suara Tidak Sah tidak boleh kosong',
                    'is_natural' => 'Jumlah Suara Tidak Sah tidak boleh menggunakan angka minus',
                ],
            ],
            'calon1' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Suara Calon 1 tidak boleh kosong',
                    'is_natural' => 'Jumlah Suara Calon 1 tidak boleh menggunakan angka minus',
                ],
            ],
            'calon2' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Suara Calon 2 tidak boleh kosong',
                    'is_natural' => 'Jumlah Suara Calon 2 tidak boleh menggunakan angka minus',
                ],
            ],
            'calon3' => [
                'rules'  => 'is_natural|permit_empty',
                'errors' => [                    
                    'is_natural' => 'Jumlah Suara Calon 2 tidak boleh menggunakan angka minus',
                ],
            ],
            'calon4' => [
                'rules'  => 'is_natural|permit_empty',
                'errors' => [                    
                    'is_natural' => 'Jumlah Suara Calon 2 tidak boleh menggunakan angka minus',
                ],
            ],
            'calon5' => [
                'rules'  => 'is_natural|permit_empty',
                'errors' => [                    
                    'is_natural' => 'Jumlah Suara Calon 5 tidak boleh menggunakan angka minus',
                ],
            ],
        ]);

        if (!$validate) {
            session()->setFlashdata('error', $this->validator->listErrors());
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
                'rules'  => 'required|alpha_space',
                'errors' => [
                    'required' => 'Kolom Banjar TPS tidak boleh kosong',
                    'required' => 'Nama Banjar TPS tidak boleh menggunakan karakter selain huruf dan spasi',
                ],
            ],
            'jml_pml_tetap' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Jumlah Pemilih Tetap tidak boleh kosong',
                    'is_natural' => 'Jumlah Pemilih Tetap tidak boleh menggunakan angka minus',
                ],
            ],
            'mgn_hak_suara' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Jumlah yang menggunakan hak suara tidak boleh kosong',
                    'is_natural' => 'Jumlah yang menggunakan hak suara tidak boleh menggunakan angka minus',
                ],
            ],
            'tdk_mgn_hak_suara' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Jumlah yang tidak menggunakan hak suara tidak boleh kosong',
                    'is_natural' => 'Jumlah yang tidak menggunakan hak suara tidak boleh menggunakan angka minus',
                ],
            ],
            'suara_tdk_sah' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Suara Tidak Sah tidak boleh kosong',
                    'is_natural' => 'Jumlah Suara Tidak Sah tidak boleh menggunakan angka minus',
                ],
            ],
            'calon1' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Suara Calon 1 tidak boleh kosong',
                    'is_natural' => 'Jumlah Suara Calon 1 tidak boleh menggunakan angka minus',
                ],
            ],
            'calon2' => [
                'rules'  => 'required|is_natural',
                'errors' => [
                    'required' => 'Kolom Suara Calon 2 tidak boleh kosong',
                    'is_natural' => 'Jumlah Suara Calon 2 tidak boleh menggunakan angka minus',
                ],
            ],
            'calon3' => [
                'rules'  => 'is_natural|permit_empty',
                'errors' => [                    
                    'is_natural' => 'Jumlah Suara Calon 2 tidak boleh menggunakan angka minus',
                ],
            ],
            'calon4' => [
                'rules'  => 'is_natural|permit_empty',
                'errors' => [                    
                    'is_natural' => 'Jumlah Suara Calon 2 tidak boleh menggunakan angka minus',
                ],
            ],
            'calon5' => [
                'rules'  => 'is_natural|permit_empty',
                'errors' => [                    
                    'is_natural' => 'Jumlah Suara Calon 5 tidak boleh menggunakan angka minus',
                ],
            ],
        ]);

        if (!$validate) {
            session()->setFlashdata('error', $this->validator->listErrors());
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

    public function proses_tambah_calon()
    {
        $session = session();

        $validate = $this->validate([
            'calon_1' => [
                'rules'  => 'required|alpha_space',
                'errors' => [
                    'required' => 'Kolom Calon Pertama tidak boleh kosong',
                    'alpha_space' => 'Nama Calon Pertama tidak boleh menggunakan karakter selain huruf dan spasi',
                ],
            ],
            'calon_2' => [
                'rules'  => 'required|alpha_space',
                'errors' => [
                    'required' => 'Kolom Calon Kedua tidak boleh kosong',
                    'alpha_space' => 'Nama Calon Kedua tidak boleh menggunakan karakter selain huruf dan spasi',
                ],
            ],
            'calon_3' => [
                'rules'  => 'alpha_space|permit_empty',
                'errors' => [
                    'required' => 'Kolom Calon Ketiga tidak boleh kosong'        
                ],
            ],
            'calon_4' => [
                'rules'  => 'alpha_space|permit_empty',
                'errors' => [
                    'required' => 'Kolom Calon Keempat tidak boleh kosong',        
                ],
            ],
            'calon_5' => [
                'rules'  => 'alpha_space|permit_empty',
                'errors' => [
                    'required' => 'Kolom Calon Kelima tidak boleh kosong',        
                ],
            ],
        ]);

        if (!$validate) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $validated = $this->validate([
			'gambar_calon_1' => 'mime_in[gambar_calon_1,image/jpg,image/jpeg,image/png]|max_size[gambar_calon_1,2048]',
			'gambar_calon_2' => 'mime_in[gambar_calon_2,image/jpg,image/jpeg,image/png]|max_size[gambar_calon_2,2048]',
		]);

		if ($validated == FALSE) {			
			$session->setFlashData('error', 'Pastikan format gambar sesuai dengan ketentuan');
			return redirect()->back()->withInput();
		} else {
            $id = $session->get('desa');     
            $calon3 = '';        
            $calon4 = '';        
            $calon5 = '';                  

            //foto calon 1
            $gambar_calon_1 = $this->request->getFile('gambar_calon_1');
            $gambar_1 = $gambar_calon_1->getRandomName();
            $foto_calon_1 = "IMG_" . $gambar_1;
            $gambar_calon_1->move(ROOTPATH . 'public/upload', $foto_calon_1);        
            
            //foto calon 2
            $gambar_calon_2 = $this->request->getFile('gambar_calon_2');
            $gambar_2 = $gambar_calon_2->getRandomName();
            $foto_calon_2 = "IMG_" . $gambar_2;
            $gambar_calon_2->move(ROOTPATH . 'public/upload', $foto_calon_2);        
            
            //foto calon 3
            $gambar_calon_3 = $this->request->getFile('gambar_calon_3');
            if ($gambar_calon_3 == '') {
                $calon3;
            } else {
                $gambar_3 = $gambar_calon_3->getRandomName();
                $foto_calon_3 = "IMG_" . $gambar_3;
                $gambar_calon_3->move(ROOTPATH . 'public/upload', $foto_calon_3);
                $calon3 = $foto_calon_3;
            }        

            //foto calon 4
            $gambar_calon_4 = $this->request->getFile('gambar_calon_4');            
            if ($gambar_calon_4 == '') {                
                $calon4;
            } else {                
                $gambar_4 = $gambar_calon_4->getRandomName();
			    $foto_calon_4 = "IMG_" . $gambar_4;
			    $gambar_calon_4->move(ROOTPATH . 'public/upload', $foto_calon_4);
                $calon4 = $foto_calon_4;
            };       

            //foto calon 5
            $gambar_calon_5 = $this->request->getFile('gambar_calon_5');
            if ($gambar_calon_5 == '') {
                $calon5;
            } else {
                $gambar_5 = $gambar_calon_5->getRandomName();
                $foto_calon_5 = "IMG_" . $gambar_5;
                $gambar_calon_5->move(ROOTPATH . 'public/upload', $foto_calon_5);
                $calon5 = $foto_calon_5;
            };
            
            $data = [
                'calon_1' => $this->request->getPost('calon_1'),
                'calon_2' => $this->request->getPost('calon_2'),
                'calon_3' => $this->request->getPost('calon_3'),
                'calon_4' => $this->request->getPost('calon_4'),
                'calon_5' => $this->request->getPost('calon_5'),
                'gambar_calon_1' => $foto_calon_1,                                
                'gambar_calon_2' => $foto_calon_2,                                
                'gambar_calon_3' => $calon3,                                
                'gambar_calon_4' => $calon4,                                
                'gambar_calon_5' => $calon5,                                
            ];

            $model = new desa();
            $model->update($id, $data);        
            $session->setFlashData('title', 'Data Calon Perbekel berhasil ditambahkan');
            return redirect()->to(base_url('Home/calon/'.$id));
        }                
    }

    public function input_ulang($id = null)
    {
        $data = [
            'calon_1'        => '',
            'calon_2'        => '',
            'calon_3'        => '',
            'calon_4'        => '',
            'calon_5'        => '',
            'gambar_calon_1' => '',
            'gambar_calon_2' => '',
            'gambar_calon_3' => '',
            'gambar_calon_4' => '',
            'gambar_calon_5' => '',
        ];

        $model = new desa();
        $model->update($id, $data);        
        session()->setFlashData('title', 'Data Calon Perbekel berhasil dihapus');
        return redirect()->to(base_url('Home/calon/'.$id));
    }
}
