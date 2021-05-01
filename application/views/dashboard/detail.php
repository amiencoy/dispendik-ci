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
                                <li><span>Detail</span></li>
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
                                <h4 class="header-title mb-2">Detail Data Aset</h4>
                                <?php

                                foreach ($all as $list) {
                                ?>
                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Kode lembaga</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label" value="$list->id"><?php echo $list->kode_lembaga; ?></label>

                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">No. Kontrak</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo $list->no_kontrak; ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Sumber Dana</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo sumber_dana($list->sumber_dana); ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label for="get_kb" class="col-form-label">Kategori</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo kb_uraian($list->kb); ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label for="select_kk" class="col-form-label">Jenis barang</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo kk_uraian($list->kk); ?></label>
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
                                            <label class="col-form-label">Merk Barang</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo $list->merk; ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Ukuran/CC</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo $list->ukuran; ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Bahan</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo $list->bahan; ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Nama toko</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo $list->nama_toko; ?></label>
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
                                            <label class="col-form-label">TB/Cawulan</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo $list->tb_cawl; ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Ruang</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo $list->ruang; ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Keterangan</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><?php echo $list->keterangan; ?></label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Foto Kwitansi/Nota</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-form-label"><img src="<?php echo base_url('uploads/' . $list->f_nota) ?>" style="width:50px; height:50px">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Foto Barang</label>
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center">
                                        <div class="col-lg-3 my-1">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="cetak" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">cetak</button>
                                            <div class="dropdown-menu" aria-labelledby="cetak">
                                                <a class="dropdown-item" href="<?php echo site_url("excel/print") . '/' . $list->no_kontrak  ?>">file excel (Spreadsheet)</a>
                                                <a class="dropdown-item" href="<?php echo site_url('dashboard/print') . '/' . $list->no_kontrak ?>">file PDF</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 my-1">
                                            <a class="btn btn-primary" href="<?php echo site_url('pengajuan/perubahan') . '/' . $list->no_kontrak ?> " title="Perubahan">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Perubahan
                                            </a>
                                        </div>

                                    </div>

                                <?php
                                }

                                ?>
                                <div class="form-row align-items-center">
                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('dashboard') ?>" title="Edit">
                                        <span class="hapus_data" name="hapus_data" aria-hidden="true"></span> Kembali
                                    </a>

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