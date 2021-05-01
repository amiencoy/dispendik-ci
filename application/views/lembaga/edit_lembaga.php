<!doctype html>
<html class="no-js" lang="en">
<?php $this->load->view('_partials/head.php') ?>

<body>

    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?php echo base_url('index.php/dashboard'); ?>"><img src="<?php echo base_url() ?>assets/images/icon/dispendik.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <?php if ($this->session->userdata('level') === '1') : ?>
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/koor'); ?>" aria-expanded="true"><i class="ti-id-badge"></i><span>Koor Kecamatan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                                <!--ACCESS MENUS FOR STAFF-->
                            <?php elseif ($this->session->userdata('level') === '2') : ?>
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->

            <div class="header-area">
                <div class="row align-items-center">
                    <div class="col-sm-6 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">SimAset Sidoarjo</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Halaman Utama</a></li>
                                <li><span>Pengajuan</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('nama'); ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo base_url('index.php/profil'); ?>">Profile</a>
                                <a class="dropdown-item" href="<?php echo site_url('login/logout'); ?>">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->


            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Detail Lembaga</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <?php if ($this->session->userdata('level') === '1' || $this->session->userdata('level') === '2') : ?>

                                            <div id="accordion1" class="according">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#accordion11">Edit Lembaga</a>
                                                    </div>
                                                    <div id="accordion11" class="collapse show" data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <form action="<?php echo site_url('lembaga/eksekusi_edit_lembaga'); ?>" method="post">
                                                                <?php foreach ($data as $a) : ?>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Nama Lembaga</label>
                                                                            <input type="hidden" name="kode_lembaga" id="kode_lembaga" value="<?php echo $a->kode_lembaga; ?>">
                                                                            <input type="text" name="lembaga" value="<?php echo ($a->nama_lembaga); ?>" class="form-control form-control-sm" id="lembaga" required>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Kecamatan</label>
                                                                            <input type="text" name="kecamatan" value="<?php echo ($a->nama_kec); ?>" class="form-control form-control-sm" id="kecamatan" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-6">
                                                                            <label class="col-form-label">Alamat</label>
                                                                            <input type="text" name="alamat" value="<?php echo ($a->alamat_kec); ?>" class="form-control form-control-sm" id="alamat" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-auto my-1">
                                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#accordion12">Rubah Password</a>
                                                    </div>
                                                    <div id="accordion12" class="collapse" data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <form action="<?php echo site_url('lembaga/eksekusi_edit_lembaga_password'); ?>" method="post">
                                                                <?php foreach ($data as $a) : ?>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <input type="hidden" name="kode_lembaga" id="kode_lembaga" value="<?php echo $a->kode_lembaga; ?>">
                                                                            <label class="col-form-label">Username</label>
                                                                            <input type="text" name="lembaga" value="<?php echo ($a->nama_lembaga); ?>" class="form-control form-control-sm" id="lembaga">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Password</label>
                                                                            <input type="text" name="password" value="" class="form-control form-control-sm" id="password" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-auto my-1">
                                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer><?php $this->load->view("_partials/footer.php"); ?></footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="<?php echo base_url() ?>https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="<?php echo base_url() ?>https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="<?php echo base_url() ?>https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "<?php echo base_url() ?>https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="<?php echo base_url() ?>assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="<?php echo base_url() ?>assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
</body>

</html>