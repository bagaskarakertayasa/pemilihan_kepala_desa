<?php  

namespace App\Controllers;

class autentikasi extends BaseController
{
    public function __construct()
    {
        $this->db = db_connect();

        $this->userModel = new \App\Models\akun();                       
        $this->modelDesa = new \App\Models\desa();        
        $this->tpsModel = new \App\Models\tps();        
    }

    public function login_page()
    {
        return view('login');
    }

    public function keluar()
    {
        session()->remove('logged_in');
		session()->setFlashData('icon', 'success');
        session()->setFlashData('title', 'Keluar');
        session()->setFlashData('text', 'Anda berhasil keluar');
		return redirect()->to(base_url('login'));
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
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $post = $this->request->getPost();
        $query = $this->userModel->table('akun')->getWhere(['username' => $post['username']]);        
        $user = $query->getRow();        
        if ($user) {
            $query2 = $this->modelDesa->table('desa')->getWhere(['id_desa' => $user->desa]);
            $user2 = $query2->getRow();
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
                    return redirect()->to(base_url('dashboard'));
                } else {                    
                    $session->setFlashData('icon', 'warning');
                    $session->setFlashData('title', 'Akun nonaktif');
                    $session->setFlashData('text', 'Maaf, akun anda telah di non-aktifkan');                    
                    return redirect()->back()->withInput();
                }
            } else {                
                $session->setFlashData('icon', 'error');
                $session->setFlashData('title', 'Gagal');
                $session->setFlashData('text', 'Password anda salah');                
                return redirect()->back()->withInput();
            }
        } else {            
            $session->setFlashData('icon', 'warning');
            $session->setFlashData('title', 'Warning');
            $session->setFlashData('text', 'Username tidak ditemukan');            
            return redirect()->back()->withInput();
        }
    }
}

?>