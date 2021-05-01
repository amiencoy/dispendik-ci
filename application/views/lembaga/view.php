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
                    <a href="<?php echo base_url('index.php/dashboard'); ?>)"><img src="<?php echo base_url() ?>assets/images/icon/dispendik.png" alt="logo"></a>
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
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/koor'); ?>" aria-expanded="true"><i class="ti-id-badge"></i><span>Koor Kecamatan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                                <!--ACCESS MENU UNTUK ADMIN/KOORDINATOR KECAMATAN-->
                            <?php elseif ($this->session->userdata('level') === '2') : ?>
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo base_url('index.php/lembaga'); ?>" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                                <!--ACCESS MENU UNTUK LEMBAGA-->
                            <?php else : ?>
                                <!--<li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/profil'); ?>" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>-->
                                echo "acces denied";
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
                                <li><span>Daftar Lembaga</span></li>
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
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Daftar Lembaga</h4>
                            <div class="single-table data-tables">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped text-center">
                                        <thead class="text-uppercase bg-primary">
                                            <tr class="text-white">
                                                <th class="text-center">Aksi</th>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Lembaga</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Kecamatan</th>
                                                
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
                                                            <a class="btn btn-primary btn-xs" href="<?php echo site_url('lembaga/get_detail') . '/' . $list->kode_lembaga ?> " title="Detail"><span value="" class="glyphicon glyphicon-edit" aria-hidden="true"></span> Detail
                                                            </a>
                                                        </td>
                                                        <td class="text-center"><?php echo ++$no; ?></td>
                                                        <td class="text-center"><?php echo $list->nama_lembaga; ?></td>
                                                        <td class="text-center"><?php echo $list->alamat_kec; ?></td>
                                                        <td class="text-center"><?php echo $list->nama_kec; ?></td>

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
                <!-- accordion style 1 end -->
            </div>
            <!-- accroding end -->
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
                $("#total").val(total);
            });
        });
        $(document).ready(function() {
            $("#hapus").click(function() {
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

                var d = new Date($("#tgl_terima").val());
                var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
                var year = d.getFullYear();

                var gabung = kode_lembaga.concat(".", kk, ".", sumber_dana, month, year, ".", jumlah);
                //var q = sumber_dana.concat(month);
                $("#no_kontrak").val(gabung);
            });
        });
    </script>

</body>

</html>