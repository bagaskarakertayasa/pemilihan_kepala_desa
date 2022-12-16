<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
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
                        <li><hr class="dropdown-divider" /></li>
                        <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#keluar_modal">Keluar</button></li>
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
                    <?php foreach ($desa as $row) : ?>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Calon Perbekel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Calon Perbekel Desa <?= $row['nama_desa']; ?> Kecamatan <?= $row['kecamatan']; ?></li>
                        </ol>

                        <a href="" class="btn btn-primary mb-5">Tambah Calon Perbekel</a>

                        <div class="row">                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <img src="" class="card-img-top" alt="gambar calon 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['calon_1']; ?></h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <img src="" class="card-img-top" alt="gambar calon 2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['calon_2']; ?></h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>

                            <?php if ($row['calon_3'] != '') : ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <img src="" class="card-img-top" alt="gambar calon 3">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['calon_3']; ?></h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if ($row['calon_4'] != '') : ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <img src="" class="card-img-top" alt="gambar calon 4">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['calon_4']; ?></h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if ($row['calon_5'] != '') : ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <img src="" class="card-img-top" alt="gambar calon 5">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['calon_5']; ?></h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>                            
                        </div>
                    </div>
                    <?php endforeach; ?>
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
                        <a href="<?= base_url('Home/keluar') ?>" class="btn btn-danger">Keluar</a>
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
