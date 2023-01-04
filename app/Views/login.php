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
        <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .tengah {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 500px;
                height: 50%;
            }

            .alert {
                margin-top: -1em;
            }

            @media all and (max-width: 450px) and (orientation : portrait) {
                .tengah {
                    width: 350px;
                    padding: 1em;                                        
                }

                .alert {
                    margin-top: -8em;
                }
            }
        </style>
    </head>    
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">                        
                            <div class="col-lg-5">          
                                <div class="tengah">    
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <h4>Harap perhatikan ketentuan di bawah</h4>
                                        <?php echo session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>                  
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">                                        
                                        <form action="<?= base_url('proses_login') ?>" method="POST"> 
                                            <?= csrf_field() ?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" value="<?= old('username') ?>" id="inputEmail" type="username" placeholder="Username" />
                                                <label for="inputEmail">Username</label>                                            
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" value="<?= old('passsword') ?>" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>                                                
                                            </div>                                            
                                            <div class="d-grid mt-4 mb-0">
                                                <button class="btn btn-primary btn-lg" name="submit" type="submit">Login</button>
                                            </div>                                                                                        
                                        </form>
                                    </div>
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
                                
        <div class="modal" id="modalError" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Show a second modal and hide this one with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                </div>
                </div>
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
