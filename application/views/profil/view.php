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
                                <li>
                                    <a href="<?php echo base_url('index.php/lembaga'); ?>" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/koor    '); ?>" aria-expanded="true"><i class="ti-id-badge"></i><span>Koor Kecamatan</span></a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                                <!--ACCESS MENUS FOR STAFF-->
                            <?php elseif ($this->session->userdata('level') === '2') : ?>
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
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="<?php echo base_url('index.php/dashboard'); ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Aset</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/pengajuan'); ?>" aria-expanded="true"><i class="ti-clipboard"></i><span>Pengajuan</span></a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Profile</span></a>
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
                                <li><span>Profil</span></li>
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
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Profil</h4>

                                <?php if ($this->session->userdata('level') === '1') : ?>
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-primary">
                                            <tr class="text-white">
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">NIP</th>
                                                <th class="text-center">NO. Hp</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center" colspan="2">Aksi</th>
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
                                                        <td class="text-center"><?php echo $list->nama_admin; ?></td>
                                                        <td class="text-center"><?php echo $list->nip; ?></td>
                                                        <td class="text-center"><?php echo $list->no_hp; ?></td>
                                                        <td class="text-center"><?php echo $list->alamat; ?></td>
                                                        <td class="text-center">
                                                            <a class="btn btn-primary btn-xs" href="<?php echo site_url('profil/edit_data/' . $list->nip) ?>" title="Edit">
                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                                            </a>
                                                        </td>
                                                        <!--<td class="text-center">
                                                                    <a class="btn btn-danger btn-xs" href="<?php echo site_url('dashboard/hapus_data/' . $list->nip) ?>" title="Edit">
                                                                        <span class="" aria-hidden="true"></span> Hapus
                                                                    </a>
                                                                </td>-->
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

                                <?php elseif ($this->session->userdata('level') === '2') : ?>
                                    <?php
                                    foreach ($all as $list) {
                                    ?>
                                        <?php

                                        if ($this->session->flashdata('msg')) {
                                            echo "<p class='alert alert-success' role='alert'>" . $this->session->flashdata('msg');
                                            "</p>";
                                        }

                                        ?>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Nama :</label>
                                                <label class="col-form-label"><?php echo $list->nama_admin ?></label>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">NIP :</label>
                                                <label class="col-form-label"><?php echo $list->nip ?>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">No. Hp : </label>
                                                <label class="col-form-label"><?php echo $list->no_hp   ?>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Alamat :</label>
                                                <label class="col-form-label"><?php echo $list->alamat   ?>
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Membawahi :</label>
                                                <?php
                                                if ($c_wil > 0) {
                                                    $no = 0;
                                                    foreach ($wil as $list) {
                                                ?>
                                                        <label class="col-form-label"> <?php echo $list->nama_kec;    ?></label>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <label class="col-form-label">Kosong</label>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary btn-xs" href="<?php echo site_url('profil/edit_data/' . $list->nip) ?>" title="Edit">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                        </a>

                                    <?php
                                    }
                                    ?>



                                <?php else : ?>
                                    <?php

                                    if ($this->session->flashdata('msg')) {
                                        echo "<p class='alert alert-success' role='alert'>" . $this->session->flashdata('msg');
                                        "</p>";
                                    }

                                    ?>
                                    <div id="accordion1" class="according">
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#accordion11">Lembaga</a>
                                            </div>
                                            <div id="accordion11" class="collapse show" data-parent="#accordion1">
                                                <div class="card-body">
                                                    <div class="data-tables">
                                                        <div class="">
                                                            <?php
                                                            foreach ($l as $list) {
                                                            ?>
                                                                <div class="form-row align-items-center">
                                                                    <div class="col-sm-3">
                                                                        <label class="col-form-label">Nama Lembaga</label>
                                                                        <label class="col-form-label"> : <?php echo $list->nama_lembaga ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row align-items-center">
                                                                    <div class="col-sm-3">
                                                                        <label class="col-form-label">Kecamatan</label>
                                                                        <label class="col-form-label"> : <?php echo $list->nama_kec ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row align-items-center">
                                                                    <div class="col-sm-3">
                                                                        <label class="col-form-label">Alamat</label>
                                                                        <label class="col-form-label"> : <?php echo $list->alamat_kec   ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row align-items-center mb-4">
                                                                    <a class="btn btn-primary btn-xs" href="<?php echo site_url('profil/edit_lembaga/' . $list->kode_lembaga) ?>" title="Edit">
                                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                            <div class="data-tables">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped text-center" id="dataTable">
                                                                        <thead class="text-uppercase bg-primary">
                                                                            <tr class="text-white">
                                                                                <th class="text-center"="col">No.</th>
                                                                                <th class="text-center"="col">Nama</th>
                                                                                <th class="text-center"="col">NIP</th>
                                                                                <th class="text-center"="col">Jabatan</th>
                                                                                <th class="text-center"="col">Jenis Kelamin</th>
                                                                                <th class="text-center"="col">NO. Hp</th>
                                                                                <th class="text-center"="col">Alamat</th>
                                                                                <th class="text-center"="col">Tahun Menjabat</th>
                                                                                <th class="text-center" colspan="2">Aksi</th>
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
                                                                                        <td class="text-center"><?php echo $list->nama_lengkap; ?></td>
                                                                                        <td class="text-center"><?php echo $list->nip; ?></td>
                                                                                        <td class="text-center"><?php echo $list->jabatan; ?></td>
                                                                                        <td class="text-center"><?php echo $list->jk; ?></td>
                                                                                        <td class="text-center"><?php echo $list->no_hp; ?></td>
                                                                                        <td class="text-center"><?php echo $list->alamat; ?></td>
                                                                                        <td class="text-center"><?php echo $list->tahun_menjabat; ?></td>
                                                                                        <td class="text-center"><img src="<?php echo base_url('uploads/' . $list->foto) ?>"></td>
                                                                                        <td class="text-center">
                                                                                            <a class="btn btn-primary btn-xs" href="<?php echo site_url('profil/edit_data/' . $list->nip) ?>" title="Edit">
                                                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                                                                            </a>
                                                                                            <a class="btn btn-danger btn-xs" href="<?php echo site_url('profil/hapus_pengurus/' . $list->nip) ?>" title="Edit">
                                                                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Hapus
                                                                                            </a>
                                                                                        </td>

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
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#accordion12">Tambah Pengurus</a>
                                            </div>
                                            <div id="accordion12" class="collapse" data-parent="#accordion1">
                                                <div class="card-body">
                                                    <form action="<?php echo site_url('profil/simpan_data'); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Nama Lengkap</label>
                                                                <input type="text" name="nama_lengkap" class="form-control form-control-sm" id="nama_lengkap">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">NIP</label>
                                                                <input type="text" name="nip" class="form-control form-control-sm" id="nip">
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center ">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Jabatan</label>
                                                                <select name="jabatan" id="jabatan" class="form-control form-control-sm">
                                                                    <option value="">Pilih</option>
                                                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                                    <option value="Bendahara">Bendahara</option>
                                                                    <option value="Pengurus Barang Pembantu">Pengurus barang pembantu</option>
                                                                    <option value="Pengadministrasi Aset">Pengadministrasi aset</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Jenis Kelamin</label><br>
                                                                <label>Laki-laki</label>
                                                                <input type="radio" name="jk" value="laki-laki">
                                                                <label>Perempuan</label>
                                                                <input type="radio" name="jk" value="perempuan">
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Alamat</label>
                                                                <input type="text" name="alamat" class="form-control form-control-sm" id="alamat">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">No. Hp</label>
                                                                <input type="text" name="no_hp" class="form-control form-control-sm" id="no_hp">
                                                            </div>
                                                        </div>

                                                        <div class="form-row align-items-center">
                                                            <div class="col-sm-3">
                                                                <label class="col-form-label">Menjabat</label>
                                                                <input type="date" name="tahun_menjabat" class="form-control form-control-sm" id="tahun_menjabat">
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label class="input-group">Foto Profil</label>
                                                                <div class="custom-file">
                                                                    <input type="file" id="photo" name="photo">
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

                                    </div>
                                <?php endif; ?>

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