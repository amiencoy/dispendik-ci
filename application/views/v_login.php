<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('_partials/head_login.php'); ?>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 mt-5 mb-5">
                                <div class="card">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-3">Login</h3></div>
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lembaga</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Admin</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content mt-3" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <form  method="post" action="<?php echo site_url('login/auth_lembaga') ?>">
                                                    <?php if ($this->session->flashdata('msg')){
                                                     echo "<p class='alert alert-danger' role='alert'>"  . $this->session->flashdata('msg');
                                                     "</p>";
                                                    }
                                                    ?>
                                                        <div class="col-sm-13 form-group">
                                                            <label for="select_kec" class="small">Kecamatan</label>
                                                            <select id="kecamatan" name="kecamatan" class="form-control form-control-sm" >
                                                                <option value="0">Pilih</option>
                                                                    <?php foreach($data->result() as $row_kecamatan) {?>
                                                                    <option value="<?php echo $row_kecamatan->ID?>"> 
                                                                    <?php echo $row_kecamatan->nama_kec ?>
                                                                     </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-13 form-group">
                                                            <label for="select_lembaga" class="small">Nama Lembaga</label>
                                                            <select id="select_lembaga" class="lembaga form-control form-control-sm js-example-basic-single" name="lembaga">
                                                                <option value="0">Pilih</option>             
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputPassword">Kata Sandi</label>
                                                            <input class="form-control" id="inputPassword" type="password" placeholder="Masukkan Kata Sandi" name="password"/></div>
                                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                            <a class="small" href="<?php echo base_url('index.php/login/lupa_password') ?>">Lupa Kata Sandi?</a>
                                                            <input class="btn btn-primary" type="submit" value="Login"></td>
                                                            <!--<a class="btn btn-primary" href="index.php">Login</a>-->
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <form action="<?php echo site_url('login/auth_admin') ?>" method="POST">
                                                    <?php if ($this->session->flashdata('msg')){
                                                     echo "<p class='alert alert-danger' role='alert'>"  . $this->session->flashdata('msg');
                                                     "</p>";
                                                    }
                                                    ?>
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputEmailAddress">Nama Pengguna</label>
                                                            <input class="form-control py-4"  type="text" placeholder="Masukkan Nama Pengguna" name="username"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputPassword">Kata Sandi</label>
                                                            <input class="form-control py-4" id="inputPassword" type="password" placeholder="Masukkan Kata Sandi" name="password" />
                                                        </div>
                                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                            <a class="small" href="<?php echo base_url('index.php/login/lupa_password') ?>">Lupa Kata Sandi?</a>
                                                            <input type="submit" name="login" value="login" class="btn btn-primary" >
                                                            <!--
                                                            <a type="submit" name="login" value="login" class="btn btn-primary" >Masuk</a>
                                                        -->
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer>
                    <?php $this->load->view('_partials/footer.php'); ?>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url('js/jquery-3.4.1.min.js') ?>" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('bootstrap/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('js/scripts.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                
                $('#kecamatan').change(function(){
                    $('.js-example-basic-single').select2();
                    var id=$(this).val();
                    $.ajax({
                        url : "<?php echo base_url();?>index.php/login/get_lembaga",
                        method : "post",
                        data : {id: id},
                        async : false,
                        dataType : 'json',
                        success: function(data){
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value="' +data[i].nama_lembaga +'" >'+data[i].nama_lembaga+'</option>';
                            }
                            $('.lembaga').html(html);

                        }
                    });
                    
                });
            });
        </script> 
        <link href="<?php echo base_url() ?>assets/css/select2.min.css" rel="stylesheet" />
        <script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
    </body>
</html>