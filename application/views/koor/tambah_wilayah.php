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
                    <a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/images/icon/dispendik.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <!--ACCESS MENU UNTUK SUPER ADMIN-->
                            <?php if ($this->session->userdata('level') === '1') : ?>
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/lembaga'); ?>" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo base_url('index.php/koor'); ?>" aria-expanded="true"><i class="ti-id-badge"></i><span>Koor Kecamatan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                                <!--ACCESS MENU UNTUK ADMIN/KOORDINATOR KECAMATAN-->
                            <?php elseif ($this->session->userdata('level') === '2') : ?>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/lembaga'); ?>" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                                <!--ACCESS MENU UNTUK LEMBAGA-->
                            <?php else : ?>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                            <?php endif; ?>
                            <!--END ACCESS MENU-->
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
                                <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Koor</a></li>
                                <li><span>Tambah Wilayah</span></li>
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
            <div class="main-content-inner">
                <!-- accroding start -->
                <div class="row">

                    <!-- accordion style 1 start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Daftar Koor Kecamatan</h4>
                                <?php
                                
                                    foreach ($data as $list) {
                                ?>
                                        <form method="post" action="<?php echo site_url('koor/simpan_wilayah'); ?>">
                                            <div class="form-row align-items-center ">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Nama Koor : </label>
                                                    <label class="col-form-label"><?php echo $list->nama_admin; ?></label>
                                                </div>
                                                <div>
                                                    <label class="col-form-label">NIP : </label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="nip" id="nip" class="nip form-control form-control-sm" value="<?php echo $list->nip; ?>">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">No. HP : </label>
                                                    <label class="col-form-label"><?php echo $list->no_hp; ?></label>
                                                </div>

                                            </div>

                                            <div class="form-row align-items-center ">
                                                <label class="col-form-label">Membawahi : </label>
                                                <?php
                                                if ($c_wil > 0) {
                                                    $no = 0;
                                                    foreach ($wil as $list) {
                                                ?>
                                                        <label class="col-form-label"><?php echo $list->nama_kec;   ?></label>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <label class="col-form-label">Kosong</label>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="form-row align-items-center ">
                                                <div class="col-sm-12 mb-5 my-1">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <?php foreach ($kec as $k) { ?>
                                                                        <input type="checkbox" name="pilih[]" id="pilih" value="<?php echo $k->ID; ?>"><?php echo $k->nama_kec;   ?></input>
                                                                    <?php } ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <div class="col-auto">
                                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                                        <a class="btn btn-danger " href="<?php echo site_url('koor/hapus_wilayah') . '/' . $list->nip ?> " title="Detail">
                                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                  
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- accordion style 1 end -->
                </div>
                <!-- accroding end -->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer><?php $this->load->view('_partials/footer.php') ?></footer>
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

    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/responsive.bootstrap.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "<?php echo base_url() ?>https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <script src="<?php echo base_url() ?>assets/js/line-chart.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pie-chart.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>asets/js/sweetalert.js"></script>

    <script src="<?php echo base_url('js/jquery-3.4.1.min.js') ?>" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/scripts.js') ?>"></script>
    <link href="<?php echo base_url() ?>assets/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>

</body>

</html>