<?php $no = 1; ?>
<?php $db = db_connect() ?>
<?php 
// sql query untuk desa Bantiran Kecamatan Pupuan
$query1 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 1');
// sql query untuk desa Jelijih Punggang Kecamatan Pupuan
$query2 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 2');
// sql query untuk desa Angkah Kecamatan Selemadeg Barat
$query3 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 3');
// sql query untuk desa Mundeh Kauh Kecamatan Selemadeg Barat
$query4 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 4');
// sql query untuk desa Megati Kecamatan Selemadeg Timur
$query5 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 5');
// sql query untuk desa Abiantuwung Kecamatan Kediri
$query6 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 6');
// sql query untuk desa Perean Kangin Kecamatan Baturiti
$query7 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 7');
// sql query untuk desa Kukuh Kecamatan Marga
$query8 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 8');
// sql query untuk desa Baru Kecamatan Marga
$query9 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 9');
// sql query untuk desa Marga Dauh Puri Kecamatan Marga
$query10 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 10');
// sql query untuk desa Marga Dajan Puri Kecamatan Marga
$query11 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 11');
// sql query untuk desa Biaung Kecamatan Penebel
$query12 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 12');
// sql query untuk desa Sangketan Kecamatan Penebel
$query13 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 13');
// sql query untuk desa Mengesta Kecamatan Penebel
$query14 = $db->query('SELECT desa.nama_desa, desa.kecamatan, SUM(tps.jml_pml_tetap) as sum1,
    SUM(tps.mgn_hak_suara) as sum2, SUM(tps.tdk_mgn_hak_suara) as sum3, SUM(tps.suara_tdk_sah) as sum4,
    desa.calon_1, desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5,
    SUM(tps.calon1) as sum5, SUM(tps.calon2) as sum6, SUM(tps.calon3) as sum7, SUM(tps.calon4) as sum8, SUM(tps.calon5) as sum9
    FROM desa LEFT JOIN tps ON id_desa = desa 
    WHERE tps.desa = 14');

// rumus hitung persen menang
function percentageOf($number, $everything, $decimals = 2){
    return round($number / $everything * 100, $decimals);
}
?>

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
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/b-2.3.3/b-html5-2.3.3/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/b-2.3.3/b-html5-2.3.3/datatables.min.js"></script>

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

        table {
            overflow-x: auto;
            border: solid 1px #ECECEC;            
        }

        th {
            padding: 0.5em;
            border-top: solid 1px #ECECEC;
            border-left: solid 1px #ECECEC;
            border-right: solid 1px #ECECEC;
            border-bottom: solid 2px black;
        }

        td {
            padding: 0.5em;
            border: solid 1px #ECECEC;
        }

        @media screen and (min-device-width: 350px) and (max-device-width: 700px) and (orientation : portrait){
            .btn_toggle {
                margin-left: 0.5rem;
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
                    <h1 class="mt-4 mb-3">Daftar Desa</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                    Tabel Daftar Desa
                            </div>                        
                            <div class="card-body">
                                <table id="print">
                                    <thead>
                                        <tr>                                        
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Desa</th>
                                            <th class="text-center">Kecamatan</th>
                                            <th class="text-center">Jumlah Pemilih Tetap</th>
                                            <th class="text-center">Jumlah Yang Menggunakan Hak Suara</th>
                                            <th class="text-center">Jumlah Yang Tidak Menggunakan Hak Suara</th>
                                            <th class="text-center">Suara Tidak Sah</th>                                                
                                            <th colspan="5" class="text-center">Nama Calon Perbekel</th>
                                            <th class="text-center">Calon Perbekel Terpilih</th>
                                            <th class="text-center">Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>                                  
                                            <?php foreach ($query1->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query2->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query3->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query4->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr> 
                                        <tr>                                  
                                            <?php foreach ($query5->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>                                       
                                        <tr>                                  
                                            <?php foreach ($query6->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query7->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>  
                                        <tr>                                  
                                            <?php foreach ($query8->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>        
                                        <tr>
                                            <?php foreach ($query9->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query10->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query11->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query12->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query13->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                        <tr>                                  
                                            <?php foreach ($query14->getResult() as $row) : ?>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $row->nama_desa; ?></td>
                                                <td class="text-center"><?= $row->kecamatan; ?></td>
                                                <td class="text-center"><?= $row->sum1 ?></td>
                                                <td class="text-center"><?= $row->sum2 ?></td>
                                                <td class="text-center"><?= $row->sum3 ?></td>
                                                <td class="text-center"><?= $row->sum4 ?></td>                                                    
                                                <td class="text-center"><?= $row->calon_1; ?><br><?= $row->sum5 ?></td>
                                                <td class="text-center"><?= $row->calon_2; ?><br><?= $row->sum6 ?></td>
                                                <td class="text-center"><?= $row->calon_3; ?><br><?= $row->sum7 ?></td>
                                                <td class="text-center"><?= $row->calon_4; ?><br><?= $row->sum8 ?></td>
                                                <td class="text-center"><?= $row->calon_5; ?><br><?= $row->sum9 ?></td>
                                                <td class="text-center">                                                        
                                                    <?php  
                                                        $a = max($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        if ($row->sum5 == $a) {
                                                            echo $row->calon_1;
                                                        } else if ($row->sum6 == $a) {
                                                            echo $row->calon_2;
                                                        } else if ($row->sum7 == $a) {
                                                            echo $row->calon_3;
                                                        } else if ($row->sum8 == $a) {
                                                            echo $row->calon_4;
                                                        } else {
                                                            echo $row->calon_5;
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php  
                                                        $numbers = array($row->sum5, $row->sum6, $row->sum7, $row->sum8, $row->sum9);
                                                        $everything = array_sum($numbers);

                                                        if ($everything == 0) {
                                                            echo '';
                                                        } else {
                                                            $pemenang = percentageOf($a, $everything);
                                                            echo $pemenang.'%';
                                                        }
                                                    ?>
                                                </td>
                                            <?php endforeach ?>                                                
                                        </tr>
                                            
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>        

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

        $(document).ready(function() {
            $('#print').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel'
                ],                
            } );
        } ); 
    </script>
</body>

</html>