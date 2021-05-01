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
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li class="active">
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
           

            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row mt-5 mb-2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-2">Aksi Pengajuan</h4>
                                <?php
                                foreach ($all as $list) {
                                ?>

                                    <?php if ($list->keterangan_perubahan === '1') : ?>
                                        <form action="<?php echo site_url('pengajuan/edit_1'); ?>" method="post">
                                            <h5 class="header-title mb-2"><?php echo perubahan($list->keterangan_perubahan); ?></h5>
                                            </h5>
                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Kode lembaga</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"><?php echo $list->kode_lembaga; ?></label>
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">No. Kontrak</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" value="<?php echo $list->no_kontrak; ?>" name="no_kontrak" class="form-control form-control-sm" id="no_kontrak">
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
                                                    <input type="text" value="<?php echo $list->keterangan; ?>" name="keterangan" class="form-control form-control-sm" id="keterangan">
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
                                                    <label class="col-form-label">Pengajuan Perubahan</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"><?php echo perubahan($list->keterangan_perubahan); ?></label>
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Uraian</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label"><?php echo $list->uraian; ?></label>
                                                </div>
                                            </div>

                                            

                                            <div class="form-row align-items-center">
                                                <div class="col-auto my-1">
                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php elseif ($list->keterangan_perubahan === '2') : ?>
                                        <form action="<?php echo site_url('pengajuan/edit_2'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="select_lembaga" class="small">Nama Lembaga</label>
                                                    <input type="text" name="kode_lembaga" value="<?php echo $list->kode_lembaga; ?>" class="kode_lembaga form-control form-control-sm" id="kode_lembaga">
                                                </div>
                                            </div>
                                            <div class="form-row align-items-center">

                                                <div class="col-sm-3">
                                                    <label class="col-form-label">No kontrak</label>
                                                    <input type="text" name="no_kontrak" value="<?php echo $list->no_kontrak; ?>" class="no_kontrak form-control form-control-sm" id="no_kontrak">
                                                </div>

                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Sumber Dana</label>
                                                    <select name="sumber_dana" id="sumber_dana" class="form-control form-control-sm" required>

                                                        <?php foreach ($sumber_dana->result() as $no) { ?>
                                                            <option value="<?php echo $no->kode_sd ?>" <?php if ($list->sumber_dana == $no->nama_sd) : ?> selected <?php endif; ?>> <?php echo $no->nama_sd ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="get_kb" class="col-form-label">Kategori</label>
                                                    <select id="kb" name="kb" class="kb form-control form-control-sm" required>
                                                        <?php foreach ($kb->result() as $no) { ?>
                                                            <option value="<?php echo $no->no_kategori ?>" <?php if ($list->kb == $no->no_kategori) : ?> selected <?php endif; ?>> <?php echo $no->nama_kategori ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="select_kk" class="col-form-label">Jenis barang</label>
                                                    <select name="kk" id="kk" class="kk form-control form-control-sm">
                                                        <?php foreach ($kk->result() as $no) { ?>
                                                            <option value="<?php echo $no->kode_kat ?>" <?php if ($list->kk == $no->kode_kat) : ?> selected <?php endif; ?>> <?php echo $no->uraian ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Nama Barang</label>
                                                    <input type="text" name="jenis_nama" value="<?php echo $list->jenis_nama; ?>" class="form-control form-control-sm" id="jenis_nama">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Merk Barang</label>
                                                    <input type="text" name="merk" value="<?php echo $list->merk; ?>" class="form-control form-control-sm" id="merk">
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Ukuran/CC</label>
                                                    <input type="text" name="ukuran" value="<?php echo $list->ukuran; ?>" class="form-control form-control-sm" id="ukuran">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Bahan</label>
                                                    <input type="text" name="bahan" value="<?php echo $list->bahan; ?>" class="form-control form-control-sm" id="bahan">
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Nama toko</label>
                                                    <input type="text" name="nama_toko" value="<?php echo $list->nama_toko; ?>" class="form-control form-control-sm" id="nama_toko">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Tanggal Beli</label>
                                                    <input type="date" name="tgl_terima" value="<?php echo $list->tgl_terima; ?>" class="form-control form-control-sm" id="tgl_terima">
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Harga Satuan</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend-sm">
                                                            <div class="input-group-text">Rp.</div>
                                                        </div>
                                                        <input type="text" name="harga" value="<?php echo $list->harga_satuan; ?>" class=" harga form-control form-control-sm" id="harga">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Banyak Barang</label>
                                                    <input type="text" name="jumlah" value="<?php echo $list->jumlah; ?>" class="jumlah form-control form-control-sm" id="jumlah">
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Total </label>
                                                    <input type="text" name="total" value="<?php echo $list->harga_total; ?>" class="total form-control form-control-sm" id="total" disabled>
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">TB/Cawulan</label>
                                                    <input type="text" name="tb_cawl" value="<?php echo $list->tb_cawl; ?>" class="form-control form-control-sm" id="tb_cawl">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-form-label">Keterangan</label>
                                                    <input type="text" name="keterangan" value="<?php echo $list->keterangan; ?>" class="keterangan form-control form-control-sm" id="keterangan" >
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-sm-3">
                                                    <label for="ruang" class="col-form-label">Ruang</label>
                                                    <select name="ruang" id="ruang" class="form-control form-control-sm">
                                                        <option value="">Pilih</option>
                                                        <?php foreach ($ruang->result() as $no) { ?>
                                                            <option value="<?php echo $no->uraian_ruang ?>" <?php if ($list->ruang == $no->uraian_ruang) : ?> selected <?php endif; ?>> <?php echo $no->uraian_ruang ?>
                                                            </option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="input-group col-sm-6">
                                                    <label class="input-group">Foto Barang</label>
                                                    <label class="col-form-label"><img src="<?php echo base_url('uploads/' . $list->f_nota) ?>" style="width:50px; height:50px">
                                                    </label>
                                                    <div class="custom-file">
                                                        <input type="file" id="f_nota" name="f_nota" value="<?php echo $list->f_nota; ?>">
                                                        <input type="hidden" name="old_image"  value="<?php echo $list->f_nota; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row align-items-center">
                                                <div class="col-auto my-1">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endif; ?>

                                <?php
                                }
                                ?>
                                <div class="form-row align-items-center">
                                    <a class="btn btn-danger" href="<?php echo site_url('dashboard') ?>" title="Edit">
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

    <script src="<?php echo base_url('js/jquery-3.4.1.min.js') ?>" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('js/scripts.js') ?>"></script>
    <link href="<?php echo base_url() ?>assets/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#kecamatan').change(function() {
                $('.js-example-basic-single').select2();
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/pengajuan/get_lembaga",
                    method: "post",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].kode_lembaga + '" >' + data[i].nama_lembaga + '</option>';
                        }
                        $('.kode_lembaga').html(html);

                    }
                });

            });
        });

        $(document).ready(function() {
            $('#kb').change(function() {
                //$('.js-example-basic-single').select2();
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/pengajuan/get_kk",
                    method: "post",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {

                            html += '<option value="' + data[i].kode_kat + '" >' + data[i].uraian + '</option>';

                        }
                        $('.kk').html(html);

                    }
                });

            });
        });

        $(document).ready(function() {
            $("#jumlah").keyup(function() {
                var harga = parseInt($("#harga").val());
                var jumlah = parseInt($("#jumlah").val());
                var total = harga * jumlah;

                /*$.ajax({
                    url: "<?php echo base_url(); ?>index.php/dashboard",
                    method: "post",
                    data: {
                        total: total
                    },
                    dataType: 'json',
                    success: function(data) {

                        var total = harga * jumlah;
                        $("#total").val(total);
                        console.log(total);

                    }
                })*/
                $("#total").val(total);
            });
        });

        $(document).ready(function() {
            $("#jumlah").keyup(function() {
                var kode_lembaga = $("#kode_lembaga").val();
                var kk = $("#kk").val();
                var sumber_dana = $("#sumber_dana").val();
                //  var tgl_terima = $("#tgl_terima".getMonth).val();
                var jumlah = $("#jumlah").val();

                var tanggal = $("#tgl_terima").val();

                var gabung = kode_lembaga.concat(".", kk, ".", sumber_dana, tanggal, ".", jumlah);
                //var q = sumber_dana.concat(month);
                $("#no_kontrak").val(gabung);
                console.log(gabung);
            });
        });
    </script>
</body>

</html>