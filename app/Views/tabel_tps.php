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

        .tbl_aksi {
            border-right-style: hidden;
            border-bottom-style: hidden;
        }

        @media screen and (min-device-width: 320px) and (max-device-width: 480px) {
            .btn_toggle {
                margin-left: 0.5rem;
            }            
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            .btn_toggle {
                margin-left: -1rem;
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
        <a class="navbar-brand ps-2" href="<?= base_url('Home/dashboard') ?>">Itung Cepat</a>
        <!-- Sidebar Toggle-->
        <button class="btn_toggle btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
            <button class="btn btn-danger" type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#keluar_modal">Keluar<i class="ms-2 fas fa-sign-out"></i></button>
        </div>
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
                <div class="container-fluid px-4">
                    <h1 class="mt-4 mb-3">TPS Desa <?= session()->get('nama_desa') ?></h1>
                    <?php $validation = \Config\Services::validation(); ?>
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">                        
                            <h4>Harap perhatikan ketentuan di bawah</h4>
                            <?php echo session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                                Tabel daftar TPS Desa <?= session()->get('nama_desa') ?>                                                      
                            <button type="button" class="tbh_tps btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_tps">
                                Tambah Data
                            </button>  
                        </div>                        
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th class="text-center">TPS</th>
                                        <th class="text-center">Jumlah Pemilih Tetap</th>
                                        <th class="text-center">Jumlah Pemilih Yang Menggunakan Hak Suara</th>
                                        <th class="text-center">Jumlah Pemilih Yang Tidak Menggunakan Hak Suara</th>
                                        <th class="text-center">Suara Tidak Sah</th>
                                        <?php foreach ($tps as $row) : ?>
                                            <th class="text-center">(1) <br> <?= $row['calon_1']; ?></th>                                                                                 
                                            <th class="text-center">(2) <br> <?= $row['calon_2']; ?></th>
                                            <?php if ($row['calon_3'] != '') : ?>
                                                <th class="text-center">(3) <br> <?= $row['calon_3']; ?></th>
                                            <?php endif; ?>
                                            <?php if ($row['calon_4'] != '') : ?>
                                                <th class="text-center">(4) <br> <?= $row['calon_4']; ?></th>
                                            <?php endif; ?>
                                            <?php if ($row['calon_5'] != '') : ?>
                                                <th class="text-center">(5) <br> <?= $row['calon_5']; ?></th>
                                            <?php endif; ?>
                                        <?php break; ?>
                                        <?php endforeach; ?>                                                                                                                    
                                        <th class="text-center">Persentase Suara Masuk</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tps as $row) : ?>
                                        <?php if ($row['id_tps'] != '') : ?>
                                        <tr>                                            
                                            <td>TPS <?= $row['no_tps'] ?> BR. <?= $row['banjar_tps']; ?></td>
                                            <td class="text-center"><?= $row['jml_pml_tetap'] ?></td>
                                            <td class="text-center"><?= $row['mgn_hak_suara'] ?></td>
                                            <td class="text-center"><?= $row['tdk_mgn_hak_suara'] ?></td>
                                            <td class="text-center"><?= $row['suara_tdk_sah'] ?></td>    
                                            <td class="text-center"><?= $row['calon1'] ?></td>    
                                            <td class="text-center"><?= $row['calon2'] ?></td>
                                            <?php if ($row['calon_3'] != '') : ?>
                                                <td class="text-center"><?= $row['calon3']; ?></td>
                                            <?php endif; ?>         
                                            <?php if ($row['calon_4'] != '') : ?>
                                                <td class="text-center"><?= $row['calon4']; ?></td>
                                            <?php endif; ?>         
                                            <?php if ($row['calon_5'] != '') : ?>
                                                <td class="text-center"><?= $row['calon5']; ?></td>
                                            <?php endif; ?>       
                                            <td class="text-center">
                                                <?php 
                                                    $array = array($row['calon1'], $row['calon2'], $row['calon3'], $row['calon4'], $row['calon5']);
                                                    $sum = array_sum($array);
                                                    if ($sum == 0) {
                                                        echo '';
                                                    } else {
                                                        $total = $sum / $row['mgn_hak_suara'] * 100;
                                                        echo round($total, 2)."%";
                                                    }                                                    
                                                ?>
                                            </td>                                     
                                            <td>
                                                <button type="button" class="m-1 btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_modal<?= $row['id_tps']; ?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="m-1 btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus_modal<?= $row['id_tps']; ?>">
                                                    Hapus
                                                </button>                                                
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>                                    
                                    <?php 
                                        $db = db_connect();
                                        $ses = session()->get('desa');
                                        $query = $db->query('SELECT SUM(tps.jml_pml_tetap) as sum1,
                                            SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,                                            
                                            SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
                                            FROM desa LEFT JOIN tps ON id_desa = desa 
                                            WHERE tps.desa = '.$ses);
                                    ?>                                    
                                    <?php foreach ($query->getResult() as $value) : ?>
                                        <?php if (!empty($value->sum1)) : ?>
                                            <tr class="fw-bold">
                                                <td class="text-center">Jumlah</td>
                                                <td class="text-center"><?php echo $value->sum1; ?></td>
                                                <td class="text-center"><?php echo $value->sum2; ?></td>
                                                <td class="text-center"><?php echo $value->sum3; ?></td>
                                                <td class="text-center"><?php echo $value->sum4; ?></td>
                                                <td class="text-center"><?php echo $value->sum5; ?></td>
                                                <td class="text-center"><?php echo $value->sum6; ?></td>
                                                <td class="text-center <?php echo ($value->sum7 == null) ? 'd-none' : null; ?>"><?php echo $value->sum7 ?></td>
                                                <td class="text-center <?php echo ($value->sum8 == null) ? 'd-none' : null; ?>"><?php echo $value->sum8 ?></td>
                                                <td class="text-center <?php echo ($value->sum9 == null) ? 'd-none' : null; ?>"><?php echo $value->sum9 ?></td>
                                                <td class="text-center">
                                                    <?php 
                                                        $array = array($value->sum5, $value->sum6, $value->sum7, $value->sum8, $value->sum9);
                                                        $sum = array_sum($array);
                                                        if ($sum == 0) {
                                                            echo '';
                                                        } else {
                                                            $total = $sum / $value->sum2 * 100;
                                                            echo round($total, 2)."%";
                                                        }                                                    
                                                    ?>
                                                </td>
                                                <td class="tbl_aksi"></td>
                                            </tr>
                                            <?php break ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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

    <!-- modal untuk hapus tps -->
    <?php foreach ($tps as $row) : ?>
    <div class="modal fade" id="hapus_modal<?= $row['id_tps']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                    
                Apakah anda yakin ingin menghapus data ini?
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('hapus_tps') ?>/<?= $row['id_tps'] ?>" class="btn btn-danger">Benar</a>
                </div>                    
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- modal untuk tambah tps -->
    <div class="modal fade" id="tambah_tps" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah TPS</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                    
                <form action="<?= base_url('proses_tambah_tps') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="no_tps" class="col-form-label">Nomer TPS</label>
                        <input type="number" name="no_tps" value="<?= old('no_tps') ?>" class="form-control" placeholder="Masukan Nomer TPS">
                    </div>
                    <div class="mb-3">
                        <label for="banjar_tps" class="col-form-label">Banjar TPS</label>
                        <input type="text" name="banjar_tps" value="<?= old('banjar_tps') ?>" class="form-control" placeholder="Masukan Banjar TPS">
                    </div>                    
                    <div class="mb-3">
                        <label for="jml_pml_tetap" class="col-form-label">Jumlah Pemilih Tetap</label>
                        <input type="number" name="jml_pml_tetap" value="<?= old('jml_pml_tetap') ?>" class="form-control" placeholder="Masukan Jumlah Pemilih Tetap">
                    </div>
                    <div class="mb-3">
                        <label for="mgn_hak_suara" class="col-form-label">Jumlah Pemilih Yang Menggunakan Hak Suara</label>
                        <input type="number" name="mgn_hak_suara" value="<?= old('mgn_hak_suara') ?>" class="form-control" placeholder="Masukan jumlah pemilih yang menggunakan hak suara">
                    </div>
                    <div class="mb-3">
                        <label for="tdk_mgn_hak_suara" class="col-form-label">Jumlah Pemilih Yang Tidak Menggunakan Hak Suara</label>
                        <input type="number" name="tdk_mgn_hak_suara" value="<?= old('tdk_mgn_hak_suara') ?>" class="form-control" placeholder="Masukan jumlah pemilih yang tidak menggunakan hak suara">
                    </div>
                    <div class="mb-3">
                        <label for="suara_tdk_sah" class="col-form-label">Jumlah Suara Tidak Sah</label>
                        <input type="number" name="suara_tdk_sah" value="<?= old('suara_tdk_sah') ?>" class="form-control" placeholder="Masukan jumlah suara tidak sah">
                    </div> 
                    <?php foreach ($tps as $row) : ?>                        
                    <div class="mb-3">
                        <label for="calon_1" class="col-form-label">Suara (1) <?= $row['calon_1']; ?></label>
                        <input type="number" name="calon1" value="<?= old('calon1') ?>" class="form-control" placeholder="Masukan jumlah suara (1) <?= $row['calon_1']; ?>">
                    </div>                                
                    <div class="mb-3">
                        <label for="calon_2" class="col-form-label">Suara (2) <?= $row['calon_2']; ?></label>
                        <input type="number" name="calon2" value="<?= old('calon2') ?>" class="form-control" placeholder="Masukan jumlah suara (2) <?= $row['calon_2']; ?>">
                    </div>                                             
                        <?php if ($row['calon_3'] != '') : ?>
                            <div class="mb-3">
                                <label for="calon_3" class="col-form-label">Suara (3) <?= $row['calon_3']; ?></label>
                                <input type="number" name="calon3" value="<?= old('calon3') ?>" class="form-control" placeholder="Masukan jumlah suara (3) <?= $row['calon_3']; ?>">
                            </div> 
                    <?php endif; ?>
                        <?php if ($row['calon_4'] != '') : ?>
                            <div class="mb-3">
                                <label for="calon_4" class="col-form-label">Suara (4) <?= $row['calon_4']; ?></label>
                                <input type="number" name="calon4" value="<?= old('calon4') ?>" class="form-control" placeholder="Masukan jumlah suara (4) <?= $row['calon_4']; ?>">                                
                            </div> 
                    <?php endif; ?>
                    <?php if ($row['calon_5'] != '') : ?>
                    <div class="mb-3">
                        <label for="calon_5" class="col-form-label">Suara (5) <?= $row['calon_5']; ?></label>
                        <input type="number" name="calon5" value="<?= old('calon5') ?>" class="form-control" placeholder="Masukan jumlah suara (5) <?= $row['calon_5']; ?>">                        
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
                    <form action="<?= base_url('edit_data_tps') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="text" value="<?= $row['id_tps']; ?>" name="id_tps" hidden>
                        <div class="mb-3">
                            <label for="no_tps" class="col-form-label">Nomer TPS</label>
                            <input type="number" name="no_tps" class="form-control" placeholder="Masukan Nomer TPS"
                                value="<?= old('no_tps', $row['no_tps']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="banjar_tps" class="col-form-label">Banjar TPS</label>
                            <input type="text" name="banjar_tps" class="form-control" placeholder="Masukan Banjar TPS"
                                value="<?= old('banjar_tps', $row['banjar_tps']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jml_pml_tetap" class="col-form-label">Jumlah Pemilih Tetap</label>
                            <input type="number" name="jml_pml_tetap" class="form-control" placeholder="Masukan jumlah suara pemilih tetap"
                                value="<?= old('jml_pml_tetap', $row['jml_pml_tetap']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mgn_hak_suara" class="col-form-label">Jumah Pemilih Yang Menggunakan Hak Suara</label>
                            <input type="number" name="mgn_hak_suara" class="form-control" placeholder="Masukan jumlah pemilih yang menggunakan hak suara"
                                value="<?= old('mgn_hak_suara', $row['mgn_hak_suara']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tdk_mgn_hak_suara" class="col-form-label">Jumlah Pemilih Yang Tidak Menggunakan Hak Suara</label>
                            <input type="number" name="tdk_mgn_hak_suara" class="form-control" placeholder="Masukan jumlah pemilih yang tidak menggunakan hak suara"
                                value="<?= old('tdk_mgn_hak_suara', $row['tdk_mgn_hak_suara']); ?>">
                        </div> 
                        <div class="mb-3">
                            <label for="suara_tdk_sah" class="col-form-label">Jumlah Suara Tidak Sah</label>
                            <input type="number" name="suara_tdk_sah" class="form-control" placeholder="Masukan jumlah suara tidak sah"
                                value="<?= old('suara_tdk_sah', $row['suara_tdk_sah']); ?>">
                        </div> 
                        <div class="mb-3">
                            <label for="calon1" class="col-form-label">Suara (1) <?= $row['calon_1']; ?></label>
                            <input type="number" name="calon1" class="form-control" placeholder="Masukan jumlah suara (1) <?= $row['calon_1']; ?>"
                                value="<?= old('calon1', $row['calon1']); ?>">
                        </div> 
                        <div class="mb-3">
                            <label for="calon2" class="col-form-label">Suara (2) <?= $row['calon_2']; ?></label>
                            <input type="number" name="calon2" class="form-control" placeholder="Masukan jumlah suara (2) <?= $row['calon_2']; ?>"
                                value="<?= old('calon2', $row['calon2']); ?>">
                        </div> 
                        <?php if ($row['calon_3'] != '') : ?>
                            <div class="mb-3">
                                <label for="calon3" class="col-form-label">Suara (3) <?= $row['calon_3']; ?></label>
                                <input type="number" name="calon3" class="form-control" placeholder="Masukan jumlah suara (3) <?= $row['calon_3']; ?>"
                                    value="<?= old('calon3', $row['calon3']); ?>">                                
                            </div> 
                        <?php endif; ?>
                        <?php if ($row['calon_4'] != '') : ?>
                            <div class="mb-3">
                                <label for="calon4" class="col-form-label">Suara (4) <?= $row['calon_4']; ?></label>
                                <input type="number" name="calon4" class="form-control" placeholder="Masukan jumlah suara (4) <?= $row['calon_4']; ?>"
                                    value="<?= old('calon4', $row['calon4']); ?>">                            
                            </div> 
                        <?php endif; ?>
                        <?php if ($row['calon_5'] != '') : ?>
                            <div class="mb-3">
                                <label for="calon5" class="col-form-label">Suara (5) <?= $row['calon_5']; ?></label>
                                <input type="number" name="calon5" class="form-control" placeholder="Masukan jumlah suara (5) <?= $row['calon_5']; ?>"
                                    value="<?= old('calon5', $row['calon5']); ?>">                            
                            </div>                    
                        <?php endif; ?>                        
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