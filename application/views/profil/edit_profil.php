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
                                    <a href="<?php echo base_url('index.php/koor'); ?>" aria-expanded="true"><i class="ti-id-badge"></i><span>Koor Kecamatan</span></a>
                                </li>
                                <li class="active">
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
                                <li>
                                    <a href="<?php echo base_url('index.php/lembaga'); ?>" aria-expanded="true"><i class="ti-home"></i><span>Lembaga</span></a>
                                </li>
                                <li class="active">
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
                                <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Profil</a></li>
                                <li><span>Edit</span></li>
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

                                <h4 class="header-title">Profil</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <?php if ($this->session->userdata('level') === '1') : ?>
                                            <div id="accordion1" class="according">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion11">Admin</a>
                                                    </div>
                                                    <div id="accordion11" class="collapse show" data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <form action="<?php echo site_url('profil/eksekusi_edit_admin'); ?>" method="post" enctype="multipart/form-data">
                                                                <?php foreach ($data as $a) : ?>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Nama Lengkap</label>
                                                                            <input type="text" name="nama_admin" value="<?php echo ($a->nama_admin); ?>" class="form-control form-control-sm" id="nama_admin" required>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">NIP</label>
                                                                            <input type="text" name="nip" value="<?php echo ($a->nip); ?>" class="form-control form-control-sm" id="nip" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row align-items-center ">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Jenis Kelamin</label><br>
                                                                            <label>Laki-laki</label>
                                                                            <input type="radio" name="jk" value="laki-laki" required>
                                                                            <label>Perempuan</label>
                                                                            <input type="radio" name="jk" value="perempuan" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Alamat</label>
                                                                            <input type="text" name="alamat" value="<?php echo ($a->alamat); ?>" class="form-control form-control-sm" id="alamat" required>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">No. Hp</label>
                                                                            <input type="text" name="no_hp" value="<?php echo ($a->no_hp); ?>" class="form-control form-control-sm" id="no_hp" required>
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
                                                        <a class="card-link" data-toggle="collapse" href="#accordion12">Ganti Password</a>
                                                    </div>
                                                    <div id="accordion12" class="collapse" data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <form action="<?php echo site_url('profil/eksekusi_edit_admin_password'); ?>" method="post" enctype="multipart/form-data">
                                                                <?php foreach ($data as $a) : ?>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Username</label>
                                                                            <input type="text" name="username" value="<?php echo ($a->username); ?>" class="form-control form-control-sm" id="username">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Password</label>
                                                                            <input type="text" name="password" class="form-control form-control-sm" id="password">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-auto my-1">
                                                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php elseif ($this->session->userdata('level') === '2') : ?>
                                            <div id="accordion1" class="according">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#accordion11">Koor</a>
                                                    </div>
                                                    <div id="accordion11" class="collapse show" data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <form action="<?php echo site_url('profil/eksekusi_edit_koor'); ?>" method="post" enctype="multipart/form-data">
                                                                <?php foreach ($data as $a) : ?>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Nama Lengkap</label>
                                                                            <input type="text" name="nama_admin" value="<?php echo ($a->nama_admin); ?>" class="form-control form-control-sm" id="nama_admin" required>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">NIP</label>
                                                                            <input type="text" name="nip" value="<?php echo ($a->nip); ?>" class="form-control form-control-sm" id="nip" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row align-items-center ">
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
                                                                            <input type="text" name="alamat" value="<?php echo ($a->alamat); ?>" class="form-control form-control-sm" id="alamat" required>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">No. Hp</label>
                                                                            <input type="text" name="no_hp" value="<?php echo ($a->no_hp); ?>" class="form-control form-control-sm" id="no_hp" required>
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
                                                        <a class="card-link" data-toggle="collapse" href="#accordion12">Ganti Password</a>
                                                    </div>
                                                    <div id="accordion12" class="collapse" data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <form action="<?php echo site_url('profil/eksekusi_edit_koor_password'); ?>" method="post" enctype="multipart/form-data">
                                                                <?php foreach ($data as $a) : ?>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Username</label>
                                                                            <input type="text" name="username" value="<?php echo ($a->username); ?>" class="form-control form-control-sm" id="username" required>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Password</label>
                                                                            <input type="text" name="password" class="form-control form-control-sm" id="password" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-auto my-1">
                                                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php else : ?>

                                            <div id="accordion1" class="according">

                                                <div class="card">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#accordion12">Edit Pengurus</a>
                                                    </div>
                                                    <div id="accordion12" class="collapse show" data-parent="#accordion1">
                                                        <div class="card-body">
                                                            <form action="<?php echo site_url('profil/eksekusi_edit'); ?>" method="post" enctype="multipart/form-data">
                                                                <?php foreach ($data as $a) : ?>
                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Nama Lengkap</label>
                                                                            <input type="text" name="nama_lengkap" value="<?php echo ($a->nama_lengkap); ?>" class="form-control form-control-sm" id="nama_lengkap" required>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">NIP</label>
                                                                            <input type="text" name="nip" value="<?php echo ($a->nip); ?>" class="form-control form-control-sm" id="nip" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row align-items-center ">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Jabatan</label>
                                                                            <select name="jabatan" id="jabatan" class="form-control form-control-sm" required>
                                                                                <option value="">Pilih</option>
                                                                                <option value="Kepala Sekolah" <?php if ($a->jabatan == "Kepala Sekolah") : ?> selected <?php endif; ?>> Kepala Sekolah
                                                                                </option>
                                                                                <option value="Bendahara" <?php if ($a->jabatan == "Bendahara") : ?> selected <?php endif; ?>> Bendahara
                                                                                </option>
                                                                                <option value="Pengurus Barang Pembantu" <?php if ($a->jabatan == "Pengurus Barang Pembantu") : ?> selected <?php endif; ?>> Pengurus Barang Pembantu
                                                                                </option>
                                                                                <option value="Pengadministrasi Aset" <?php if ($a->jabatan == "Pengadministrasi Aset") : ?> selected <?php endif; ?>> Pengadministrasi Aset
                                                                                </option>
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
                                                                            <input type="text" name="alamat" value="<?php echo ($a->alamat); ?>" class="form-control form-control-sm" id="alamat" required>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">No. Hp</label>
                                                                            <input type="text" name="no_hp" value="<?php echo ($a->no_hp); ?>" class="form-control form-control-sm" id="no_hp" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row align-items-center">
                                                                        <div class="col-sm-3">
                                                                            <label class="col-form-label">Menjabat</label>
                                                                            <input type="date" name="tahun_menjabat" class="form-control form-control-sm" id="tahun_menjabat" value="<?php echo ($a->tahun_menjabat) ?>" required>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <label class="input-group">Foto Profil</label>
                                                                            <div class="custom-file">
                                                                                <label class="col"><img src="<?php echo base_url('uploads/' . $a->foto) ?>" style="width:50px; height:50px">
                                                                                </label>
                                                                                <input type="file" id="foto" name="foto" value="<?php echo $a->foto; ?>">
                                                                                <input type="hidden" name="old_image" value="<?php echo $a->foto; ?>">
                                                                            </div>
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