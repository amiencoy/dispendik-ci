<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('_partials/head_login.php'); ?>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 mt-5 mb-5">
                                <div class="card">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-3">Recovery Password</h3></div>
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            </ul>
                                                <div class="card-body">
                                                    <div class="small mb-3 text-muted">untuk melakukan recovery password, silahkan hubungi admin.</div>
                                                </div>
                                            </div>
                                            <a class="small" href="<?php echo base_url('index.php/login') ?>">Kembali</a>
                                            <div class="tab-content mt-3" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                </div>
                                                
                                            </div>
                                        </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer>
                    <?php $this->load->view('_partials/footer.php'); ?>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url('js/jquery-3.4.1.min.js') ?>" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('bootstrap/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('js/scripts.js') ?>"></script>
    </body>
</html>