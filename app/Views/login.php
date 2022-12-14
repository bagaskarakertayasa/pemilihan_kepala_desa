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
        <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <?php $validation = \Config\Services::validation(); ?>
                                        <form action="<?= base_url('Home/login') ?>" method="POST"> 
                                            <div class="form-floating mb-3">
                                                <input class="form-control <?= $validation->hasError('username') ? 'is-invalid' : null ?>" name="username" id="inputEmail" type="username" placeholder="Username" />
                                                <label for="inputEmail">Username</label>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('username'); ?>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control <?= $validation->hasError('password') ? 'is-invalid' : null ?>" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('password'); ?>
                                                </div>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-grid mt-4 mb-0">
                                                <button class="btn btn-primary" name="submit" type="submit">Login</button>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-2 mb-0">
                                                <a class="small" href="#">Lupa Password?</a>
                                            </div>                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="text-white">Copyright &copy; Bagaskara Kertayasa <?= date("Y") ?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('js/scripts.js') ?>"></script>
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
