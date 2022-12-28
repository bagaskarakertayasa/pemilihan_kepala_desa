<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Itung Cepat Perbekel Kabupaten Tabanan." />
    <meta name="author" content="Bagaskara Kertayasa" />
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

        .logo {
            padding: 0.5rem 0 0.5rem 1rem;            
            width: 50px;
            height: 50px;
        }
        
        @media screen and (min-device-width: 350px) and (max-device-width: 700px) and (orientation : portrait){
            .btn_toggle {
                margin-left: 0.5rem;
            }

            .tengah {
                text-align: center;
            }
        }

        @media screen and (min-device-width: 768px) and (max-device-width: 912px) {
            .btn_toggle {
                margin-left: 0.5rem;
            }
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

                    <div class="d-flex align-items-center justify-content-center">
                        <h1 class="mt-4 mb-3">Daftar TPS Tabanan</h1>                        
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <p class="tengah">Daftar TPS yang ada di Kabupaten Tabanan</p>    
                    </div>
                    
                    <?php $validation = \Config\Services::validation(); ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="card col-md-3 mb-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 fw-normal">Filter TPS Berdasarkan Desa</h6>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('filter_tps'); ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="mb-3">
                                        <label for="desa" class="col-form-label">Desa</label>
                                        <select name="desa" class="form-select" id="inputGroupSelect01">
                                            <option selected disabled>Silahkan pilih desa</option>                                                                
                                            <option value="1" <?php if(old('desa') == '1'){ echo 'selected'; } ?>>Bantiran</option>
                                            <option value="2" <?php if(old('desa') == '2'){ echo 'selected'; } ?>>Jelijih Punggang</option>
                                            <option value="3" <?php if(old('desa') == '3'){ echo 'selected'; } ?>>Angkah</option>
                                            <option value="4" <?php if(old('desa') == '4'){ echo 'selected'; } ?>>Mundeh Kauh</option>
                                            <option value="5" <?php if(old('desa') == '5'){ echo 'selected'; } ?>>Megati</option>
                                            <option value="6" <?php if(old('desa') == '6'){ echo 'selected'; } ?>>Abiantuwung</option>
                                            <option value="7" <?php if(old('desa') == '7'){ echo 'selected'; } ?>>Perean Kangin</option>
                                            <option value="8" <?php if(old('desa') == '8'){ echo 'selected'; } ?>>Kukuh</option>
                                            <option value="9" <?php if(old('desa') == '9'){ echo 'selected'; } ?>>Baru</option>
                                            <option value="10" <?php if(old('desa') == '10'){ echo 'selected'; } ?>>Marga Dauh Puri</option>
                                            <option value="11" <?php if(old('desa') == '11'){ echo 'selected'; } ?>>Marga Dajan Puri</option>
                                            <option value="12" <?php if(old('desa') == '12'){ echo 'selected'; } ?>>Biaung</option>
                                            <option value="13" <?php if(old('desa') == '13'){ echo 'selected'; } ?>>Sangketan</option>
                                            <option value="14" <?php if(old('desa') == '14'){ echo 'selected'; } ?>>Mengesta</option>                               
                                        </select>
                                    </div>
                                    <input type="submit" value="Ambil" class="btn btn-primary float-end">
                                </form>
                            </div>
                        </div>
                    </div>                    
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; Bagaskara Kertayasa <?= date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

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
                    <a href="<?= base_url('keluar') ?>" class="btn btn-danger">Keluar</a>
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

            <?php if (session()->getFlashdata('icon')) { ?>
                Swal.fire({
                    icon: '<?php echo session()->getFlashdata('icon') ?>',
                    title: '<?php echo session()->getFlashdata('title') ?>',
                    text: '<?php echo session()->getFlashdata('text') ?>'
                })
            <?php } ?>
        </script>
</body>

</html>