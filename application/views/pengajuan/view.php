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
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
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
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/lembaga'); ?>" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
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
                                <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Halaman Utama</a></li>
                                <li><span>Daftar Pengajuan</span></li>
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
                <div class="row mt-5 mb-2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-2">Data Aset</h4>
                                <?php

                                if ($this->session->flashdata('msg')) {
                                    echo "<p class='alert alert-success' role='alert'>" . $this->session->flashdata('msg');
                                    "</p>";
                                }

                                ?>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table text-center">
                                            <?php if ($this->session->userdata('level') === '1' || $this->session->userdata('level') === '2') : ?>
                                                <thead class="text-uppercase bg-primary">
                                                    <tr class="text-white">
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Aksi</th>
                                                        <th class="text-center">Pengajuan</th>
                                                        <th class="text-center">Keterangan</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">No. Kontrak</th>
                                                        <th class="text-center">Jenis Barang/ Nama Barang</th>
                                                        <th class="text-center">Merk / Tipe</th>
                                                        <th class="text-center">Ukuran / CC</th>
                                                        <th class="text-center">Bahan</th>
                                                        <th class="text-center">Banyak Barang</th>
                                                        <th class="text-center">Harga Satuan</th>
                                                        <th class="text-center">Terima Barang Tanggal</th>
                                                        <th class="text-center">Dari CV / Toko Penyedia</th>
                                                        <th class="text-center">Kategori</th>
                                                        <th class="text-center">Jenis Barang</th>
                                                        <th class="text-center">TB/ CAWU</th>
                                                        <th class="text-center">Sumber Dana Belanja</th>
                                                        <th class="text-center">Jumlah Harga Keseluruhan</th>
                                                        <th class="text-center">Ruang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($c_all > 0) {
                                                        $no = 0;
                                                        foreach ($all as $list) {
                                                    ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo ++$no; ?></td>
                                                                <td>
                                                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('pengajuan/aksi') . '/' . $list->no_kontrak ?>" title="Edit">
                                                                        <span class="hapus_data" name="hapus_data" aria-hidden="true"></span> Aksi
                                                                    </a>
                                                                </td>
                                                                <td class="text-center"><?php echo perubahan($list->keterangan_perubahan); ?></td>
                                                                <td class="text-center"><?php echo $list->uraian; ?></td>
                                                                <td class="text-center"><?php echo status_uraian($list->status_perubahan); ?></td>
                                                                <td class="text-center"><?php echo $list->no_kontrak; ?></td>
                                                                <td class="text-center"><?php echo $list->jenis_nama; ?></td>
                                                                <td class="text-center"><?php echo $list->merk; ?></td>
                                                                <td class="text-center"><?php echo $list->ukuran; ?></td>
                                                                <td class="text-center"><?php echo $list->bahan; ?></td>
                                                                <td class="text-center"><?php echo $list->jumlah; ?></td>
                                                                <td class="text-center"><?php echo $list->harga_satuan; ?></td>
                                                                <td class="text-center"><?php echo mediumdate_indo($list->tgl_terima); ?></td>
                                                                <td class="text-center"><?php echo $list->nama_toko; ?></td>
                                                                <td class="text-center"><?php echo kb_uraian($list->kb); ?></td>
                                                                <td class="text-center"><?php echo kk_uraian($list->kk); ?></td>
                                                                <td class="text-center"><?php echo $list->tb_cawl; ?></td>
                                                                <td class="text-center"><?php echo sumber_dana($list->sumber_dana); ?></td>
                                                                <td class="text-center"><?php echo $list->harga_total; ?></td>
                                                                <td class="text-center"><?php echo $list->ruang; ?></td>
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
                                            <?php else : ?>
                                                <thead class="text-uppercase bg-primary">
                                                    <tr class="text-white">
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Aksi</th>
                                                        <th class="text-center">Keterangan</th>
                                                        <th class="text-center">Uraian</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">No. Kontrak</th>
                                                        <th class="text-center">Jenis Barang/ Nama Barang</th>
                                                        <th class="text-center">Merk / Tipe</th>
                                                        <th class="text-center">Ukuran / CC</th>
                                                        <th class="text-center">Bahan</th>
                                                        <th class="text-center">Banyak Barang</th>
                                                        <th class="text-center">Harga Satuan</th>
                                                        <th class="text-center">Terima Barang Tanggal</th>
                                                        <th class="text-center">Dari CV / Toko Penyedia</th>
                                                        <th class="text-center">Kategori</th>
                                                        <th class="text-center">Jenis Barang</th>
                                                        <th class="text-center">TB/ CAWU</th>
                                                        <th class="text-center">Sumber Dana Belanja</th>
                                                        <th class="text-center">Jumlah Harga Keseluruhan</th>
                                                        <th class="text-center">Ruang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($c_all > 0) {
                                                        $no = 0;
                                                        foreach ($all as $list) {
                                                    ?>
                                                            <tr>

                                                                <td class="text-center"><?php echo ++$no; ?></td>
                                                                <?php if ($list->status_perubahan == '2'): ?>
                                                                <td>
                                                                    <a class="btn btn-primary btn-xs" href="" title="Detail">
                                                                        <span class="batal" name="batal" aria-hidden="true"></span> Detail
                                                                    </a>
                                                                </td>
                                                                <?php elseif($list->status_perubahan == '1') :?>
                                                                <td>
                                                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('pengajuan/batal') . '/' . $list->no_kontrak ?>" title="Batal">
                                                                        <span class="batal" name="batal" aria-hidden="true"></span> Batal
                                                                    </a>
                                                                </td>
                                                                <?php endif; ?>
                                                                <td class="text-center"><?php echo perubahan($list->keterangan_perubahan); ?></td>
                                                                <td class="text-center"><?php echo $list->uraian; ?></td>
                                                                <td class="text-center"><?php echo status_uraian($list->status_perubahan); ?></td>
                                                                <td class="text-center"><?php echo $list->no_kontrak; ?></td>
                                                                <td class="text-center"><?php echo $list->jenis_nama; ?></td>
                                                                <td class="text-center"><?php echo $list->merk; ?></td>
                                                                <td class="text-center"><?php echo $list->ukuran; ?></td>
                                                                <td class="text-center"><?php echo $list->bahan; ?></td>
                                                                <td class="text-center"><?php echo $list->jumlah; ?></td>
                                                                <td class="text-center"><?php echo $list->harga_satuan; ?></td>
                                                                <td class="text-center"><?php echo mediumdate_indo($list->tgl_terima); ?></td>
                                                                <td class="text-center"><?php echo $list->nama_toko; ?></td>
                                                                <td class="text-center"><?php echo $list->kb; ?></td>
                                                                <td class="text-center"><?php echo $list->kk; ?></td>
                                                                <td class="text-center"><?php echo $list->tb_cawl; ?></td>
                                                                <td class="text-center"><?php echo $list->sumber_dana; ?></td>
                                                                <td class="text-center"><?php echo $list->harga_total; ?></td>
                                                                <td class="text-center"><?php echo $list->ruang; ?></td>
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
                                            <?php endif; ?>
                                        </table>
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

    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.responsive.min.js"></script>
</body>

</html>