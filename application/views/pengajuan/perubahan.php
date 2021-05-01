<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html class="no-js" lang="en">
<?php $this->load->view('_partials/head.php') ?>

<body>
    <!-- preloader area start -->
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
                                <li class="active">
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/lembaga'); ?>" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/koor'); ?>" aria-expanded="true"><i class="ti-id-badge"></i><span>Koor Kecamatan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                                <!--ACCESS MENUS FOR STAFF-->
                            <?php elseif ($this->session->userdata('level') === '2') : ?>
                                <li class="active">
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
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
                            <?php else : ?>
                                <li class="active">
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li>
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
                                <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Aset</a></li>
                                <li><span>Pengajuan Perubahan</span></li>
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

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row mt-5 mb-2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-2">Perubahan Data Aset</h4>
                                <?php
                                foreach ($all as $list) {
                                ?>
                                    <form action="<?php echo site_url('pengajuan/simpan_perubahan'); ?>" method="post">
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">No. Kontrak</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="no_kontrak" value="<?php echo $list->no_kontrak; ?>" class="form-control form-control-sm" id="no_kontrak" required>
                                            </div>
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Nama Barang</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="col-form-label"><?php echo $list->jenis_nama; ?></label>
                                            </div>
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Tanggal Beli</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="col-form-label"><?php echo mediumdate_indo($list->tgl_terima); ?></label>
                                            </div>
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Harga Satuan</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="col-form-label"><?php echo $list->harga_satuan; ?></label>
                                            </div>
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Banyak Barang</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="col-form-label"><?php echo $list->jumlah; ?></label>
                                            </div>
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Total </label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="col-form-label"><?php echo $list->harga_total; ?></label>
                                            </div>
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Keterangan</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select id="keterangan" name="keterangan" class="form-control form-control-sm" required>
                                                    <?php if ($list->stat_perubahan == '1') : ?>
                                                        <option value="">--PILIH--</option>
                                                        <option value="1">Barang Rusak/Hilang</option>
                                                        <option value="2">Rubah Data</option>
                                                    <?php elseif ($list->stat_perubahan == '2') : ?>
                                                        <?php
                                                        foreach ($x as $list) {
                                                        ?>
                                                            <?php if ($list->keterangan_perubahan == '1') : ?>
                                                                <option value="">--PILIH--</option>
                                                                <option value="2">Rubah Data</option>
                                                            <?php elseif ($list->keterangan_perubahan == '2') : ?>
                                                                <option value="">--PILIH--</option>
                                                                <option value="1">Barang Rusak/Hilang</option>
                                                            <?php endif ?>
                                                        <?php } ?>
                                                    <?php endif; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Uraian</label>
                                            </div>

                                            <div class="col-sm-3">
                                                <input type="text" name="uraian" class="form-control form-control-sm" id="uraian" required>
                                            </div>
                                        </div>

                                        <div class="form-row align-items-center">
                                            <div class="col-lg-3 my-1">
                                                <a class="btn btn-danger" href="<?php echo site_url('dashboard') ?>" title="Edit">
                                                    <span class="hapus_data" name="hapus_data" aria-hidden="true"></span> Kembali
                                                </a>
                                            </div>
                                            <div class="col-lg-3 my-1">
                                                <button type="submit" class="btn btn-primary">Ajukan Perubahan</button>
                                            </div>

                                        </div>
                                    </form>
                                <?php
                                }
                                ?>

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
    <script src="<?php echo base_url() ?>assets/js/chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="<?php echo base_url() ?>assets/js/zingchart.min.js"></script>
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