<?php  

namespace App\Controllers;

use App\Models\akun;
use App\Models\desa;
use App\Models\tps;

class admin_pusat extends BaseController
{
    public function __construct()
    {
        $this->db = db_connect();

        $this->userModel = new \App\Models\akun();                       
        $this->modelDesa = new \App\Models\desa();        
        $this->tpsModel = new \App\Models\tps();        
    }   
    
    // fitur akun admin pusat
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
            return redirect()->to(base_url('login'));
        }
    }

    public function tambah_data_akun()
    {
        $session = session();

        $validate = $this->validate([
            'nama_depan' => [
                'rules'  => 'required|alpha_space',
                'errors' => [
                    'required' => 'Kolom Nama Depan tidak boleh kosong',
                    'alpha_space' => 'Nama Depan tidak boleh menggunakan karakter selain huruf dan spasi',
                ],
            ],
            'nama_belakang' => [
                'rules'  => 'required|alpha_space',
                'errors' => [
                    'required' => 'Kolom Nama Belakang tidak boleh kosong',
                    'alpha_space' => 'Nama Belakang tidak boleh menggunakan karakter selain huruf dan spasi',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Kolom Email tidak boleh kosong',
                    'valid_email' => 'Email anda tidak valid',
                ],
            ],
            'username' => [
                'rules'  => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Kolom Username tidak boleh kosong',                    
                    'min_length' => 'Username minimal memiliki 4 karakter',                    
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Kolom Password tidak boleh kosong',
                    'min_length' => 'Password minimal memiliki 4 karakter',
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
            session()->setFlashdata('error', $this->validator->listErrors());
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
            return redirect()->to(base_url('akun'));
        } else {
            session()->setFlashData('icon', 'error');
            session()->setFlashData('title', 'Kesalahan Sistem');
            session()->setFlashData('text', 'Maaf, terjadi kesalahan pada sistem harap coba beberapa saat lagi');                        
            return redirect()->back()->withInput();
        }
    }

    public function edit_data_akun()
    {
        $session = session();

        $validate = $this->validate([
            'nama_depan' => [
                'rules'  => 'required|alpha_space',
                'errors' => [
                    'required' => 'Kolom Nama Depan tidak boleh kosong',
                    'alpha_space' => 'Nama Depan tidak boleh menggunakan karakter selain huruf dan spasi',
                ],
            ],
            'nama_belakang' => [
                'rules'  => 'required|alpha_space',
                'errors' => [
                    'required' => 'Kolom Nama Belakang tidak boleh kosong',
                    'alpha_space' => 'Nama Belakang tidak boleh menggunakan karakter selain huruf dan spasi',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Kolom Email tidak boleh kosong',
                    'valid_email' => 'Email anda tidak valid',
                ],
            ],
            'username' => [
                'rules'  => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Kolom Username tidak boleh kosong',                    
                    'min_length' => 'Username minimal memiliki 4 karakter',                    
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
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $id_akun = $_POST['id_akun'];        
        $data = [
            'nama_depan'    => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),     
            'email'         => $this->request->getPost('email'),
            'username'      => $this->request->getPost('username'),            
            'desa'          => $this->request->getPost('desa'),            
        ];
          
        try {                
            $model = new akun();
            $model->update($id_akun, $data);        
            $session->setFlashData('title', 'Akun Pengguna berhasil diubah');
            return redirect()->to(base_url('akun')); 
        } catch (\Exception $th) {
            session()->setFlashData('icon', 'error');
            session()->setFlashData('title', 'Kesalahan Sistem');
            session()->setFlashData('text', 'Maaf, terjadi kesalahan pada sistem harap coba beberapa saat lagi');            
            return redirect()->back()->withInput();
        }
    }

    public function ubah_password()
    {
        $session = session();

        $validate = $this->validate([
            'password' => [
                'rules'  => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Kolom Password tidak boleh kosong',
                    'min_length' => 'Password minimal memiliki 4 karakter',
                ],
            ],
        ]);

        if (!$validate) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $id_akun = $_POST['id_akun'];       
        $password = $this->request->getPost('password');
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $data = ['password' => $hash];

        try {
            $model = new akun();
            $model->update($id_akun, $data);        
            $session->setFlashData('title', 'Password berhasil diubah');
            return redirect()->to(base_url('akun')); 
        } catch (\Exception $th) {
            session()->setFlashData('icon', 'error');
            session()->setFlashData('title', 'Kesalahan Sistem');
            session()->setFlashData('text', 'Maaf, terjadi kesalahan pada sistem harap coba beberapa saat lagi');            
            return redirect()->back()->withInput();
        }        
    }

    public function ubah_status($id)
    {
        $data = [
            'status' => "nonaktif"            
        ];

        try {                                    
            $model = new akun();
            $model->update($id, $data);
            session()->setFlashData('title', 'Status akun berhasil diubah');        
            return redirect()->to(base_url('akun'));
        } catch (\Exception $th) {
            session()->setFlashData('icon', 'error');
            session()->setFlashData('title', 'Kesalahan Sistem');
            session()->setFlashData('text', 'Maaf, terjadi kesalahan pada sistem harap coba beberapa saat lagi');            
            return redirect()->back()->withInput();
        }        
    } 

    // fitur data tps admin pusat    
    public function daftar_tps()
    {
        if (session()->get('logged_in') == true) {
            return view('filter_tps');
        } else {
            session()->setFlashData('icon', 'warning');
            session()->setFlashData('title', 'Login');
            session()->setFlashData('text', 'Maaf, anda diharuskan untuk login terlebih dahulu');
            return redirect()->to(base_url('login'));
        }
    }  

    public function filter_tps()
    {       
        if (session()->get('logged_in') == true) {
            $desa = $this->request->getPost('desa');
            $model = new tps();
            if (!empty($desa)) {
                $tps = $model->getTPS($desa);                
                $total = $model->filterTPS($desa);

                foreach ($total as $row) {
                    $total_calon_1 = $row['sum1'];
                    $total_calon_2 = $row['sum2'];
                    $total_calon_3 = $row['sum3'];
                    $total_calon_4 = $row['sum4'];
                    $total_calon_5 = $row['sum5'];
                }

                function percentageOf($number, $everything, $decimals = 2){
                    return round($number / $everything * 100, $decimals);
                }

                $numbers = array($total_calon_1, $total_calon_2, $total_calon_3, $total_calon_4, $total_calon_5);
                $everything = array_sum($numbers);

                $calon_1 = percentageOf($numbers[0], $everything);
                $calon_2 = percentageOf($numbers[1], $everything);
                $calon_3 = percentageOf($numbers[2], $everything);
                $calon_4 = percentageOf($numbers[3], $everything);
                $calon_5 = percentageOf($numbers[4], $everything);
         
                $params = [
                    'sum1' => $total_calon_1,
                    'sum2' => $total_calon_2,
                    'sum3' => $total_calon_3,
                    'sum4' => $total_calon_4,
                    'sum5' => $total_calon_5,
                ];

                $params2 = [
                    'persen_calon_1' => $calon_1,
                    'persen_calon_2' => $calon_2,
                    'persen_calon_3' => $calon_3,
                    'persen_calon_4' => $calon_4,
                    'persen_calon_5' => $calon_5,
                ];

                $res = max($params);
                $params3 = ['res' => $res];
                session()->set($params);
                session()->set($params2);
                session()->set($params3);
                // echo "<pre>";
                // print_r($tps);   
                return view('daftar_tps', compact('tps'));
            } else {
                session()->setFlashData('icon', 'warning');
                session()->setFlashData('title', 'Inputan Kosong');
                session()->setFlashData('text', 'Maaf, inputan tidak boleh kosong');            
                return redirect()->back()->withInput();            
            }
        } else {
            session()->setFlashData('icon', 'warning');
            session()->setFlashData('title', 'Login');
            session()->setFlashData('text', 'Maaf, anda diharuskan untuk login terlebih dahulu');
            return redirect()->to(base_url('login'));
        }        
    }

    public function daftar_desa()
    {
        if (session()->get('logged_in') == true) {
            return view('daftar_desa');
        } else {
            session()->setFlashData('icon', 'warning');
            session()->setFlashData('title', 'Login');
            session()->setFlashData('text', 'Maaf, anda diharuskan untuk login terlebih dahulu');
            return redirect()->to(base_url('login'));
        }        
    }
}

?>