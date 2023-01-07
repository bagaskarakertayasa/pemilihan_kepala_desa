<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Itung Cepat Perbekel Kabupaten Tabanan." />
        <meta name="author" content="Bagaskara Kertayasa" />
        <title>Itung Cepat Perbekel Kabupaten Tabanan</title>
        <link rel="icon" type="image/x-icon"
            href="<?= base_url('img/logo_tbn.png') ?>" />
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
            
            .btn_toggle {
                margin-left: -3rem;
            }  

            main {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                display: table;
            }

            .container {
                display: table-cell;
                text-align: center;
                vertical-align: middle;
            }

            .tbl_aksi {
                border-right-style: hidden;
                border-bottom-style: hidden;
            }

            @media screen and (min-device-width: 320px) and (max-device-width: 480px) {
                .btn_toggle {
                    margin-left: 0.5rem;
                }            
            }

            @media screen and (min-device-width: 768px) and (max-device-width: 1024px) {
                .btn_toggle {
                    margin-left: 0.5rem;
                }

                .btn-hide {
                    display: none;
                }
            }

            @media only screen and (min-width : 1224px) {
                .btn-hide {                
                    display: none;
                }
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <img class="logo" src="<?= base_url('img/logo_tbn.png') ?>" alt="logo tabanan">
            <a class="navbar-brand ps-2" href="<?= base_url('dashboard') ?>">Itung Cepat</a>
            <!-- Sidebar Toggle-->
            <button class="btn_toggle btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
                <button class="btn btn-danger" type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#keluar_modal">Keluar<i class="ms-2 fas fa-sign-out"></i></button>
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4"></ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <?= $this->include('layout/sidebar') ?>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <h1>Selamat Datang, <br> <?= session()->get('nama_depan') ?> <?= session()->get('nama_belakang') ?></h1>
                        <?php if (session()->get('desa') != null) : ?>
                            <h5 class="mt-3">Admin Desa <?= session()->get('nama_desa') ?></h5>
                        <?php endif; ?>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/scripts.js') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/demo/chart-area-demo.js') ?>"></script>
        <script src="<?= base_url('assets/demo/chart-bar-demo.js') ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/datatables-simple-demo.js') ?>"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
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
