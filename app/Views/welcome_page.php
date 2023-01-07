<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Itung Cepat Perbekel Kabupaten Tabanan." />
    <meta name="author" content="Bagaskara Kertayasa" />
    <title>Itung Cepat Pemilihan Perbekel Tabanan</title>
    <link rel="icon" type="image/x-icon"
        href="<?= base_url('img/logo_tbn.png') ?>" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('<?= base_url('img/bg.png') ?>');
            background-position: bottom;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
        }

        .judul_apk {
            font-size: 35px;
        }

        .bagian_footer {
            opacity: 0.3;
        }

        .img_logo {
            width: 100px;
            height: 100px;
        }

        .img_bupati {
            width: 350px;
            height: 250px;
        }

        @media (max-width: 600px) {
            body {
                background-image: url('<?= base_url('img/bg2.png') ?>');                
            }

            .container {
                padding: 2em;
            }

            .img_logo {
                width: 50px;
                height: 50px;
            }

            .img_bupati {
                width: 300px;
                height: 200px;
            }

            .judul_apk {
                font-size: 25px;
                margin-top: -0.5em;
            }
        }            
    </style>

</head>

<body>        
    <div class="tengah">
        <div class="container px-4 px-lg-5 h-100 pb-5">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <img src="<?= base_url('img/logo_tbn.png') ?>"
                        class="img_logo mb-3"><br>
                    <img class="img_bupati mb-3" src="<?= base_url('img/bupati_tabanan.png') ?>" alt="gambar bupati tabanan">
                    <h3 class="text-white fw-semibold">TABANAN ERA BARU (AUM)</h3>
                </div>
                <div class="col-lg-10 align-self-baseline">
                    <p class="text-dpmd">DPMD Kabupaten Tabanan</p>
                    <h1 class="judul_apk text-white fw-bold mb-3">ITUNG CEPAT PEMILIHAN PERBEKEL <br>
                        KABUPATEN TABANAN</h1>
                    <a class="btn text-white" href="<?= base_url('login') ?>">Masuk</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bagian_footer fixed-bottom">        
        <div class="mb-2 small text-center text-light">Copyright &copy; <?= date('Y') ?> - Bagaskara Kertayasa</div>        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>