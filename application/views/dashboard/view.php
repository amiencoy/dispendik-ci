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
                                <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Halaman Utama</a></li>
                                <li><span>Aset</span></li>
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
                                <h4 class="header-title">Aset</h4>
                                <div id="accordion1" class="according">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#accordion11">Form Aset</a>
                                        </div>

                                        <div id="accordion11" class="collapse" data-parent="#accordion1">
                                            <div class="card-body">
                                                <!--<form action="<?php echo site_url('dashboard/simpan_data'); ?>" method="post" enctype="multipart/form-data">-->
                                                <?php if ($this->session->userdata('level') === '1' || $this->session->userdata('level') === '2') : ?>
                                                    <form action="<?php echo site_url('dashboard/simpan_data_admin'); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label for="select_kec" class="small">Kecamatan</label>
                                                                <select id="kecamatan" name="kecamatan" class="form-control form-control-sm">
                                                                    <option value="0">Pilih</option>
                                                                    <?php foreach ($kcmt->result() as $row_kecamatan) { ?>
                                                                        <option value="<?php echo $row_kecamatan->ID ?>">
                                                                            <?php echo $row_kecamatan->nama_kec ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="select_lembaga" class="small">Nama Lembaga</label>
                                                                <select id="kode_lembaga" class="kode_lembaga form-control form-control-sm js-example-basic-single" name="kode_lembaga">
                                                                    <option value="0">Pilih</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row align-items-center">

                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">No kontrak</label>
                                                                <input type="text" name="no_kontrak" class="no_kontrak form-control form-control-sm" id="no_kontrak" disabled required>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Sumber Dana</label>
                                                                <select name="sumber_dana" id="sumber_dana" class="form-control form-control-sm">
                                                                    <option value="0">Pilih</option>
                                                                    <?php foreach ($sumber_dana->result() as $sd) { ?>
                                                                        <option value="<?php echo $sd->kode_sd; ?>"><?php echo $sd->nama_sd; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    <?php else : ?>
                                                        <form action="<?php echo site_url('dashboard/simpan_data'); ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-row align-items-center">
                                                                <div class="col-sm-3">
                                                                    <label class="col-form-label">Kode lembaga</label>
                                                                    <input type="text" name="kode_lembaga" id="kode_lembaga" value="<?php echo $this->session->userdata('kode'); ?>" class="form-control form-control-sm" disabled required>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="col-form-label">No kontrak</label>
                                                                    <input type="text" name="no_kontrak" class="no_kontrak form-control form-control-sm" id="no_kontrak" disabled required>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <label class="col-form-label">Sumber Dana</label>
                                                                    <select name="sumber_dana" id="sumber_dana" class="form-control form-control-sm">
                                                                        <option value="0">Pilih</option>
                                                                        <?php foreach ($sumber_dana->result() as $sd) { ?>
                                                                            <option value="<?php echo $sd->kode_sd; ?>"><?php echo $sd->nama_sd; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label for="get_kb" class="col-form-label">Kategori</label>
                                                                <select id="kb" name="kb" class="form-control form-control-sm">
                                                                    <option value="0">Pilih</option>
                                                                    <?php foreach ($data->result() as $no) { ?>
                                                                        <option value="<?php echo $no->no_kategori ?>"> <?php echo $no->nama_kategori ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="select_kk" class="col-form-label">Jenis barang</label>
                                                                <select name="kk" id="kk" class="kk form-control form-control-sm" required>
                                                                    <option value="">Pilih</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Nama Barang</label>
                                                                <input type="text" name="jenis_nama" class="form-control form-control-sm" id="jenis_barang" required>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Merk Barang</label>
                                                                <input type="text" name="merk" class="form-control form-control-sm" id="merk" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Ukuran/CC</label>
                                                                <input type="text" name="ukuran" class="form-control form-control-sm" id="ukuran" required>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Bahan</label>
                                                                <input type="text" name="bahan" class="form-control form-control-sm" id="bahan" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Nama toko</label>
                                                                <input type="text" name="nama_toko" class="form-control form-control-sm" id="nama_toko" required>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Tanggal Beli</label>
                                                                <input type="date" name="tgl_terima" class="form-control form-control-sm" id="tgl_terima" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Harga Satuan</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend-sm">
                                                                        <div class="input-group-text">Rp.</div>
                                                                    </div>
                                                                    <input type="text" name="harga" class=" harga form-control form-control-sm" id="harga" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Banyak Barang</label>
                                                                <input type="text" name="jumlah" class="jumlah form-control form-control-sm" id="jumlah" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label">Total </label>
                                                                <input type="text" name="total" class="total form-control form-control-sm" id="total" disabled required>
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">TB/Cawulan</label>
                                                                <input type="text" name="tb_cawl" class="form-control form-control-sm" id="tb_cawl" required>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Keterangan</label>
                                                                <input type="text" name="keterangan" value="Baik" class="keterangan form-control form-control-sm" id="keterangan" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Ruang</label>
                                                                <select name="ruang" class="form-control form-control-sm">
                                                                    <option value="0">Pilih</option>
                                                                    <?php foreach ($ruang->result() as $no) { ?>
                                                                        <option value="<?php echo $no->uraian_ruang ?>"> <?php echo $no->uraian_ruang ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="input-group col-sm-6">

                                                                <label class="input-group">Foto Kwitansi/Nota</label>
                                                                <div class="custom-file">
                                                                    <input type="file" id="f_nota" name="f_nota" required>
                                                                </div>

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
                                            <a class="collapsed card-link" data-toggle="collapse" href="#accordion12">Data Aset</a>
                                        </div>
                                        <?php

                                        if ($this->session->flashdata('msg')) {
                                            echo "<p class='alert alert-success' role='alert'>" . $this->session->flashdata('msg');
                                            "</p>";
                                        }

                                        ?>
                                        <div id="accordion12" class="collapse show" data-parent="#accordion1">
                                            <div class="card-body">
                                                <div class="col-auto my-1">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="cetak" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cetak semua</button>
                                                    <div class="dropdown-menu" aria-labelledby="cetak">
                                                        <a class="dropdown-item" href="<?php echo site_url("excel/print_semua") ?>">file excel (Spreadsheet)</a>
                                                        <a class="dropdown-item" href="<?php echo site_url('dashboard/print_semua') ?>">file PDF</a>
                                                    </div>
                                                </div>
                                                <div class="single-table data-tables">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped text-center" id="dataTable">
                                                            <thead class="text-capitalize bg-primary">
                                                                <tr class="text-white">
                                                                    <th class="text-center">Aksi</th>
                                                                    <th class="text-center">No</th>
                                                                    <th class="text-center">No. Kontrak</th>
                                                                    <th class="text-center">Jenis Barang/ Nama Barang</th>

                                                                    <th class="text-center">Banyak Barang</th>
                                                                    <th class="text-center">Harga Satuan</th>
                                                                    <th class="text-center">Jumlah Harga Keseluruhan</th>
                                                                    <th class="text-center"></th>
                                                                    <!--
                                                                    <th class="text-center">Merk / Tipe</th>
                                                                    <th class="text-center">Ukuran / CC</th>
                                                                    <th class="text-center">Bahan</th>
                                                                    
                                                                    
                                                                    <th class="text-center">Terima Barang Tanggal</th>
                                                                    <th class="text-center">Dari CV / Toko Penyedia</th>
                                                                    <th class="text-center">Kategori</th>
                                                                    <th class="text-center">Jenis Barang</th>
                                                                    <th class="text-center">TB/ CAWU</th>
                                                                    <th class="text-center">Sumber Dana Belanja</th>
                                                                    
                                                                    <th class="text-center">Ruang</th>
                                                                    -->
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
                                                                                <?php if ($this->session->userdata('level') === '1' || $this->session->userdata('level') === '2') : ?>
                                                                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('dashboard/hapus') . '/' . $list->no_kontrak ?>" title="Edit">
                                                                                        <span class="hapus_data" name="hapus_data" aria-hidden="true"></span> Hapus
                                                                                    </a>
                                                                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('dashboard/get_detail') . '/' . $list->no_kontrak ?> " title="Detail">
                                                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Detail
                                                                                    </a>
                                                                                <?php else : ?>
                                                                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('dashboard/get_detail') . '/' . $list->no_kontrak ?> " title="Detail">
                                                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Detail
                                                                                    </a>
                                                                                <?php endif; ?>
                                                                            </td>

                                                                            <td><?php echo ++$no; ?></td>
                                                                            <td value="<?php echo $list->no_kontrak; ?>"><?php echo $list->no_kontrak; ?></td>
                                                                            <td><?php echo $list->jenis_nama; ?></td>
                                                                            <td><?php echo $list->jumlah; ?></td>
                                                                            <td><?php echo $list->harga_satuan; ?></td>
                                                                            <td><?php echo $list->harga_satuan; ?></td>
                                                                            <!--
                                                                            <td><?php echo $list->harga_total; ?></td>
                                                                            <td><?php echo $list->merk; ?></td>
                                                                            <td><?php echo $list->ukuran; ?></td>
                                                                            <td><?php echo $list->bahan; ?></td>
                                                                            
                                                                            
                                                                            <td><?php echo mediumdate_indo($list->tgl_terima); ?></td>
                                                                            <td><?php echo $list->nama_toko; ?></td>
                                                                            <td><?php echo kb_uraian($list->kb); ?></td>
                                                                            <td><?php echo kk_uraian($list->kk); ?></td>
                                                                            <td><?php echo $list->tb_cawl; ?></td>
                                                                            <td><?php echo sumber_dana($list->sumber_dana); ?></td>
                                                    
                                                                            <td><?php echo $list->ruang; ?></td>
                                                                            -->
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
                                                                    <!--</form>-->
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#kecamatan').change(function() {
                $('.js-example-basic-single').select2();
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/dashboard/get_lembaga",
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
                    url: "<?php echo base_url(); ?>index.php/dashboard/get_kk",
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


        $(".hapus").click(function() {
            var id = $(this).parents("tr").attr("id");

            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '/item-list/' + id,
                            type: 'DELETE',
                            error: function() {
                                alert('Something is wrong');
                            },
                            success: function(data) {
                                $("#" + id).remove();
                                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                            }
                        });
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });

        });

        $(document).ready(function() {
            $("#hapus_data").click(function() {
                $("#delete_item_id").val($('p').get());
                $('#delete_confirmation_modal').modal('show');
            });
        });
    </script>



    <script type="text/javascript">
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