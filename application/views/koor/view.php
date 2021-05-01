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
                                    <a href="javascript:void(0) " aria-expanded="true"><i class="ti-id-badge"></i><span>Koor Kecamatan</span></a>
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
                                <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Halaman Utama</a></li>
                                <li><span>Daftar Koor</span></li>
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
                                <div id="accordion1" class="according">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#accordion11">Tambah Koor</a>
                                        </div>
                                        <div id="accordion11" class="collapse" data-parent="#accordion1">
                                            <div class="card-body">
                                                <form action="<?php echo site_url('koor/simpan_data'); ?>" method="post">
                                                    <div class="form-row align-items-center">
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label">Username</label>
                                                            <input type="text" name="username" class="form-control form-control-sm" id="username">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label">Password</label>
                                                            <input type="text" name="password" class="form-control form-control-sm" id="password">
                                                        </div>
                                                    </div>

                                                    <div class="form-row align-items-center">
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label">Nama Lengkap</label>
                                                            <input type="text" name="nama_admin" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label">NIP</label>
                                                            <input type="text" name="nip" class="form-control form-control-sm" id="nip">
                                                        </div>
                                                    </div>

                                                    <div class="form-row align-items-center">
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label">Jenis Kelamin</label><br>
                                                            <label>Laki-laki</label>
                                                            <input type="radio" name="jk" value="laki-laki">
                                                            <br><label>Perempuan</label>
                                                            <input type="radio" name="jk" value="perempuan">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="col-form-label">No. Hp</label>
                                                            <input type="text" name="no_hp" class="form-control form-control-sm" id="no_hp">
                                                        </div>
                                                    </div>

                                                    <div class="form-row align-items-center">
                                                        <div class="col-sm-6">
                                                            <label class="col-form-label">Alamat </label>
                                                            <input type="text" name="alamat" class=" form-control form-control-sm" id="alamat">
                                                        </div>
                                                    </div>

                                                    <div class="form-row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion12">Daftar Koor</a>
                                        </div>
                                        <div id="accordion12" class="collapse show" data-parent="#accordion1">
                                            <div class="card-body">
                                                <div class="data-tables">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center" id="dataTable">
                                                            <thead class="text-uppercase bg-primary">
                                                                <tr class="text-white">
                                                                    <th class="text-center">Aksi</th>
                                                                    <th class="text-center">No</th>
                                                                    <th class="text-center">Nama Koor</th>
                                                                    <th class="text-center">NIP</th>
                                                                    <th class="text-center">No. Hp</th>
                                                                    <th class="text-center"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if ($c_all > 0) {
                                                                    $no = 0;
                                                                    foreach ($all as $list) {
                                                                ?>
                                                                        <tr>
                                                                            <td class="text-center">
                                                                                <a class="btn btn-primary btn-xs" href="<?php echo site_url('koor/tambah_wilayah') . '/' . $list->nip ?> " title="Tambah Wilayah">
                                                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Tambah Wilaya
                                                                                </a>
                                                                                <a class="btn btn-primary btn-xs" href="<?php echo site_url('koor/edit_data') . '/' . $list->nip ?> " title="Edit">
                                                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                                                                </a>
                                                                                <a class="btn btn-primary btn-xs" href="<?php echo site_url('koor/get_detail') . '/' . $list->nip ?> " title="Detail">
                                                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Detail
                                                                                </a>
                                                                                <!--<a class="btn btn-warning btn-xs" href="#" title="Detail"><span value="" class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                                                                </a>
                                                                                <a class="btn btn-danger btn-xs" href="#" title="Detail"><span value="" class="glyphicon glyphicon-edit" aria-hidden="true"></span> Hapus
                                                                                </a>-->
                                                                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('koor/hapus_data/' . $list->nip) ?>" title="Hapus">
                                                                                    <span class="" aria-hidden="true"></span> Hapus
                                                                                </a>
                                                                            </td>
                                                                            <td class="text-center"><?php echo ++$no; ?></td>
                                                                            <td class="text-center"><?php echo $list->nama_admin; ?></td>
                                                                            <td class="text-center"><?php echo $list->nip; ?></td>
                                                                            <td class="text-center"><?php echo $list->no_hp; ?></td>

                                                                        <?php
                                                                    }
                                                                } else {
                                                                        ?>
                                                                        <tr>
                                                                            <td colspan="5">
                                                                                <center>Kosong</center>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                }
                                                                    ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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