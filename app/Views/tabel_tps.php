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

        .tbh_tps {
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
                    <h1 class="mt-4 mb-3">TPS Desa <?php foreach ($tps as $row) : ?>
                        <?= $row['nama_desa'] ?><?php break; ?><?php endforeach; ?></h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                                Tabel daftar TPS Desa <?php foreach ($tps as $row) : ?>
                                    <?= $row['nama_desa'] ?><?php break; ?><?php endforeach; ?>
                            <button type="button" class="tbh_tps btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_tps">
                                Tambah Data
                            </button>
                        </div>                        
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>TPS</th>
                                        <th>Jumlah Pemilih Tetap</th>
                                        <th>Menggunakan Hak Suara</th>
                                        <th>Tidak Menggunakan Hak Suara</th>
                                        <th>Suara Tidak Sah</th>
                                        <?php foreach ($tps as $row) : ?>
                                            <th>(1) <?= $row['calon_1']; ?></th>                                                                                 
                                            <th>(2) <?= $row['calon_2']; ?></th>
                                            <?php if ($row['calon_3'] != '') : ?>
                                                <th>(3) <?= $row['calon_3']; ?></th>
                                            <?php endif; ?>
                                            <?php if ($row['calon_4'] != '') : ?>
                                                <th>(4) <?= $row['calon_4']; ?></th>
                                            <?php endif; ?>
                                            <?php if ($row['calon_5'] != '') : ?>
                                                <th>(4) <?= $row['calon_5']; ?></th>
                                            <?php endif; ?>
                                        <?php break; ?>
                                        <?php endforeach; ?>                                                                                                                    
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tps as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?> TPS BR. <?= $row['banjar_tps']; ?></td>                                            
                                            <td><?= $row['jml_pml_tetap'] ?></td>
                                            <td><?= $row['mgn_hak_suara'] ?></td>
                                            <td><?= $row['tdk_mgn_hak_suara'] ?></td>
                                            <td><?= $row['suara_tdk_sah'] ?></td>    
                                            <td><?= $row['calon1'] ?></td>    
                                            <td><?= $row['calon2'] ?></td>
                                            <?php if ($row['calon_3'] != '') : ?>
                                                <td><?= $row['calon3']; ?></td>
                                            <?php endif; ?>         
                                            <?php if ($row['calon_4'] != '') : ?>
                                                <td><?= $row['calon4']; ?></td>
                                            <?php endif; ?>         
                                            <?php if ($row['calon_5'] != '') : ?>
                                                <td><?= $row['calon5']; ?></td>
                                            <?php endif; ?>                                            
                                            <td>
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_modal<?= $row['id_tps']; ?>">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
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

    <!-- modal untuk tambah tps -->
    <div class="modal fade" id="tambah_tps" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah TPS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                    
                <form action="<?= base_url('Home/proses_tambah_tps') ?>" method="post">
                    <div class="mb-3">
                        <label for="banjar_tps" class="col-form-label">Banjar TPS</label>
                        <input type="text" name="banjar_tps" class="form-control" placeholder="Masukan Banjar TPS">
                    </div>
                    <div class="mb-3">
                        <label for="jml_pml_tetap" class="col-form-label">Jumlah Pemilih Tetap</label>
                        <input type="number" name="jml_pml_tetap" class="form-control" placeholder="Masukan Jumlah Pemilih Tetap">
                    </div>
                    <div class="mb-3">
                        <label for="mgn_hak_suara" class="col-form-label">Jumlah Yang Menggunakan Hak Suara</label>
                        <input type="number" name="mgn_hak_suara" class="form-control" placeholder="Masukan jumlah yang menggunakan hak suara">
                    </div>
                    <div class="mb-3">
                        <label for="tdk_mgn_hak_suara" class="col-form-label">Jumlah Yang Tidak Menggunakan Hak Suara</label>
                        <input type="number" name="tdk_mgn_hak_suara" class="form-control" placeholder="Masukan jumlah yang tidak menggunakan hak suara">
                    </div>
                    <div class="mb-3">
                        <label for="suara_tdk_sah" class="col-form-label">Suara Tidak Sah</label>
                        <input type="number" name="suara_tdk_sah" class="form-control" placeholder="Masukan jumlah suara tidak sah">
                    </div> 
                    <?php foreach ($tps as $row) : ?>
                    <div class="mb-3">
                        <label for="calon_1" class="col-form-label">Suara (1) <?= $row['calon_1']; ?></label>
                        <input type="number" name="calon1" class="form-control" placeholder="Masukan jumlah suara (1) <?= $row['calon_1']; ?>">
                    </div>                                
                    <div class="mb-3">
                        <label for="calon_2" class="col-form-label">Suara (2) <?= $row['calon_2']; ?></label>
                        <input type="number" name="calon2" class="form-control" placeholder="Masukan jumlah suara (2) <?= $row['calon_2']; ?>">
                    </div>                         
                        <?php if ($row['calon_3'] != '') : ?>
                            <div class="mb-3">
                                <label for="calon_3" class="col-form-label">Suara (3) <?= $row['calon_3']; ?></label>
                                <input type="number" name="calon3" class="form-control" placeholder="Masukan jumlah suara <?= $row['calon_3']; ?>">
                            </div> 
                    <?php endif; ?>
                        <?php if ($row['calon_4'] != '') : ?>
                            <div class="mb-3">
                                <label for="calon_4" class="col-form-label">Calon 4</label>
                                <input type="number" name="calon4" class="form-control" placeholder="Masukan jumlah suara calon 4">                                
                            </div> 
                    <?php endif; ?>
                    <?php if ($row['calon_5'] != '') : ?>
                    <div class="mb-3">
                        <label for="calon_5" class="col-form-label">Calon 5</label>
                        <input type="number" name="calon5" class="form-control" placeholder="Masukan jumlah suara calon 5">                        
                    </div> 
                    <?php endif; ?>
                    <?php break; ?>
                    <?php endforeach; ?>
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
    foreach ($tps as $row) : $no++ ?>
        <div class="modal fade" id="edit_modal<?= $row['id_tps']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Home/edit_data_tps') ?>" method="post">
                        <input type="text" value="<?= $row['id_tps']; ?>" name="id_tps" hidden>
                        <div class="mb-3">
                            <label for="banjar_tps" class="col-form-label">Banjar TPS</label>
                            <input type="text" name="banjar_tps" class="form-control" placeholder="Masukan Banjar TPS"
                                value="<?= $row['banjar_tps']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jml_pml_tetap" class="col-form-label">Jumlah Pemilih Tetap</label>
                            <input type="number" name="jml_pml_tetap" class="form-control" placeholder="Masukan jumlah suara pemilih tetap"
                                value="<?= $row['jml_pml_tetap']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mgn_hak_suara" class="col-form-label">mgn_hak_suara</label>
                            <input type="number" name="mgn_hak_suara" class="form-control" placeholder="Masukan jumlah yang menggunakan hak suara"
                                value="<?= $row['mgn_hak_suara']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tdk_mgn_hak_suara" class="col-form-label">Tidak Menggunakan Hak Suara</label>
                            <input type="number" name="tdk_mgn_hak_suara" class="form-control" placeholder="Masukan jumlah yang tidak menggunakan hak suara"
                                value="<?= $row['tdk_mgn_hak_suara']; ?>">
                        </div> 
                        <div class="mb-3">
                            <label for="suara_tdk_sah" class="col-form-label">Suara Tidak Sah</label>
                            <input type="number" name="suara_tdk_sah" class="form-control" placeholder="Masukan jumlah suara tidak sah"
                                value="<?= $row['suara_tdk_sah']; ?>">
                        </div> 
                        <div class="mb-3">
                            <label for="calon1" class="col-form-label">Calon 1</label>
                            <input type="number" name="calon1" class="form-control" placeholder="Masukan jumlah suara calon 1"
                                value="<?= $row['calon1']; ?>">
                        </div> 
                        <div class="mb-3">
                            <label for="calon2" class="col-form-label">Calon 2</label>
                            <input type="number" name="calon2" class="form-control" placeholder="Masukan jumlah suara calon 2"
                                value="<?= $row['calon2']; ?>">
                        </div> 
                        <div class="mb-3">
                            <label for="calon3" class="col-form-label">Calon 3</label>
                            <input type="number" name="calon3" class="form-control" placeholder="Masukan jumlah suara calon 3"
                                value="<?= $row['calon3']; ?>">
                                <p class="text-danger">*Harap di kosongkan apabila TPS ini tidak mempunyai calon Ketiga</p>
                        </div> 
                        <div class="mb-3">
                            <label for="calon4" class="col-form-label">Calon 4</label>
                            <input type="number" name="calon4" class="form-control" placeholder="Masukan jumlah suara calon 4"
                                value="<?= $row['calon4']; ?>">
                            <p class="text-danger">*Harap di kosongkan apabila TPS ini tidak mempunyai calon Keempat</p>
                        </div> 
                        <div class="mb-3">
                            <label for="calon5" class="col-form-label">Calon 5</label>
                            <input type="number" name="calon5" class="form-control" placeholder="Masukan jumlah suara calon 5"
                                value="<?= $row['calon5']; ?>">
                            <p class="text-danger">*Harap di kosongkan apabila TPS ini tidak mempunyai calon Kelima</p>
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