<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Itung Cepat Perbekel Kabupaten Tabanan</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('img/logo_tbn.png') ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .btn_toggle {
            margin-left: -3rem;
        }

        .logo {
            padding: 0.5rem 0 0.5rem 1rem;            
            width: 50px;
            height: 50px;
        }                

        .tbh_akun {
            float: right;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img class="logo" src="<?= base_url('img/logo_tbn.png') ?>" alt="logo tabanan">
        <a class="navbar-brand ps-2" href="<?= base_url('Home/dashboard') ?>">Itung Cepat</a>
        <!-- Sidebar Toggle-->
        <button class="btn_toggle btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#keluar_modal">Keluar</button></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                <?= $this->include('layout/sidebar') ?>

            </nav>
        </div>
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 mb-3">Akun Pengguna</h1>

                    <?php $validation = \Config\Services::validation(); ?>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                                Tabel Akun Pengguna
                            <button type="button" class="tbh_akun btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_akun">
                                Tambah Akun
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Desa</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($akun as $row) : ?>
                                        <?php if ($row['desa'] != null) :  ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['nama_depan'] ?></td>
                                                <td><?= $row['nama_belakang'] ?></td>
                                                <td><?= $row['username'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['nama_desa'] == null ? "Tidak ada" : $row['nama_desa'] ?></td>
                                                <td
                                                    class="<?= $row['status'] == 'aktif' ? 'text-success' : 'text-danger' ?>"><?= $row['status'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_modal<?= $row['id_akun']; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pass_modal<?= $row['id_akun']; ?>">
                                                        Ubah Password
                                                    </button>
                                                    <button type="button" <?= $row['status'] == 'nonaktif' ? 'disabled' : null ?> class="btn btn-warning"
                                                        data-bs-toggle="modal" data-bs-target="#status_modal<?= $row['id_akun']; ?>">Ubah Status</button>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; Your Website <?= date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal tambah akun -->
    <div class="modal fade" id="tambah_akun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Home/tambah_data_akun') ?>" method="post">
                        <div class="mb-3">
                            <label for="nama_depan" class="col-form-label">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Masukan Nama Depan">
                        </div>
                        <div class="mb-3">
                            <label for="nama_belakang" class="col-form-label">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Masukan Nama Belakang">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="contoh@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="col-form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
                        </div>                            
                        <div class="mb-3">
                            <label for="desa" class="col-form-label">Desa</label>
                            <select name="desa" class="form-select" id="inputGroupSelect01">
                                <option selected disabled>Silahkan pilih desa</option>                                                                
                                <option value="1">Bantiran</option>
                                <option value="2">Jelijih Punggang</option>
                                <option value="3">Angkah</option>
                                <option value="4">Mundeh Kauh</option>
                                <option value="5">Megati</option>
                                <option value="6">Abiantuwung</option>
                                <option value="7">Perean Kangin</option>
                                <option value="8">Kukuh</option>
                                <option value="9">Baru</option>
                                <option value="10">Marga Dauh Puri</option>
                                <option value="11">Marga Dajan Puri</option>
                                <option value="12">Biaung</option>
                                <option value="13">Sangketan</option>
                                <option value="14">Mengesta</option>                               
                            </select>
                        </div>                            
                </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Modal edit akun -->
    <?php $no = 0;
    foreach ($akun as $row) : $no++ ?>
        <div class="modal fade" id="edit_modal<?= $row['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Home/edit_data_akun') ?>" method="post">
                        <input type="text" value="<?= $row['id_akun']; ?>" name="id_akun" hidden>
                        <div class="mb-3">
                            <label for="nama_depan" class="col-form-label">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Masukan Nama Depan"
                                value="<?= $row['nama_depan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_belakang" class="col-form-label">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" placeholder="Masukan Nama Belakang"
                                value="<?= $row['nama_belakang']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="contoh@gmail.com"
                                value="<?= $row['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="col-form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username"
                                value="<?= $row['username']; ?>">
                        </div>  
                        <div class="mb-3">
                            <label for="desa" class="col-form-label">Desa</label>
                            <select name="desa" class="form-select" id="inputGroupSelect01">
                                <option selected disabled>Silahkan pilih desa</option>   
                                <option value="1" <?php if(old('desa', $row['desa']) == '1'){ echo 'selected'; } ?>>Bantiran</option>
                                <option value="2" <?php if(old('desa', $row['desa']) == '2'){ echo 'selected'; } ?>>Jelijih Punggang</option>
                                <option value="3" <?php if(old('desa', $row['desa']) == '3'){ echo 'selected'; } ?>>Angkah</option>
                                <option value="4" <?php if(old('desa', $row['desa']) == '4'){ echo 'selected'; } ?>>Mundeh Kauh</option>
                                <option value="5" <?php if(old('desa', $row['desa']) == '5'){ echo 'selected'; } ?>>Megati</option>
                                <option value="6" <?php if(old('desa', $row['desa']) == '6'){ echo 'selected'; } ?>>Abiantuwung</option>
                                <option value="7" <?php if(old('desa', $row['desa']) == '7'){ echo 'selected'; } ?>>Perean Kangin</option>
                                <option value="8" <?php if(old('desa', $row['desa']) == '8'){ echo 'selected'; } ?>>Kukuh</option>
                                <option value="9" <?php if(old('desa', $row['desa']) == '9'){ echo 'selected'; } ?>>Baru</option>
                                <option value="10" <?php if(old('desa', $row['desa']) == '10'){ echo 'selected'; } ?>>Marga Dauh Puri</option>
                                <option value="11" <?php if(old('desa', $row['desa']) == '11'){ echo 'selected'; } ?>>Marga Dajan Puri</option>
                                <option value="12" <?php if(old('desa', $row['desa']) == '12'){ echo 'selected'; } ?>>Biaung</option>
                                <option value="13" <?php if(old('desa', $row['desa']) == '13'){ echo 'selected'; } ?>>Sangketan</option>
                                <option value="14" <?php if(old('desa', $row['desa']) == '14'){ echo 'selected'; } ?>>Mengesta</option>
                            </select>                            
                        </div>                       
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- Modal ubah password -->
    <?php $no = 0;
    foreach ($akun as $row) : $no++ ?>
        <div class="modal fade" id="pass_modal<?= $row['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Home/ubah_password') ?>" method="post">
                        <input type="text" value="<?= $row['id_akun']; ?>" name="id_akun" hidden>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
                        </div>                                             
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- Modal ubah status -->
    <?php $no = 0;
    foreach ($akun as $row) : $no++ ?>
        <div class="modal fade" id="status_modal<?= $row['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                    
                    Apakah anda yakin ingin mengubah status akun ini?
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="<?= base_url('Home/ubah_status') ?>/<?= $row['id_akun']; ?>" class="btn btn-danger">Benar</a>
                    </div>                    
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- modal untuk logout -->
    <div class="modal fade" id="keluar_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                    
                Apakah anda yakin ingin keluar?
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('Home/keluar') ?>" class="btn btn-danger">Keluar</a>
                </div>                    
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('js/scripts.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/datatables-simple-demo.js') ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            <?php if (session()->getFlashdata('title')) { ?>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '<?php echo session()->getFlashdata('title') ?>',
                    showConfirmButton: false,
                    timer: 2000
                })
            <?php } ?>
        </script>
</body>

</html>