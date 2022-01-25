<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ilham Fathur Robbani">

  <title>Manajer - Karyawan</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin.css');?>" rel="stylesheet">

</head>

<body id="page-top">
<?php
        foreach ($profil->result_array() as $p){
            $kar_nama=$p['kar_nama'];
            $kar_foto=$p['kar_foto'];
    ?>  
  <nav class="navbar navbar-expand static-top" style="background-color: #e41e31;">
    <button class="btn btn-link btn-sm text-white" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <a class="logo navbar-brand mx-auto d-block text-center order-0 order-md-1 w-25" href="index.html"><img src="<?php echo base_url('');?>assets/images/Webp.net-resizeimage(2).png" alt=""></a>
      <style type="text/css">
        .logo
        {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
    }
    </style>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="dropdown-avatar" src="<?php echo base_url('assets/images/upload/'.$kar_foto) ?>"
          data-holder-rendered="true" style="height: 2rem;width: 2rem;border-radius: 50%;">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Hai , <?php echo $kar_nama; ?></a>
          <a class="dropdown-item" href="#"><i class="fas fa-fw fa-sliders-h"></i> Pengaturan</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-power-off"></i> Keluar</a>
        </div>
      </li>
    </ul>

  </nav>
<?php } ?>
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('manajer/dashboard')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Laporan</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('manajer/karyawan')?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Karyawan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('manajer/jabatan')?>">
          <i class="fas fa-fw fa-code-branch"></i>
          <span>Jabatan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('manajer/user')?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Manajer</a>
          </li>
          <li class="breadcrumb-item active">Karyawan</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a class="btn btn-sm btn-success" href="<?php echo site_url('manajer/karyawan')?>" style="color: white;font-weight: bold;"><i class="fas fa-arrow-left"></i> Kembali</a></div>
          <div class="card-body">
              <?php echo form_open('manajer/karyawan/edit', array('enctype'=>'multipart/form-data')); ?>
              <div class="form-group">
                  <label><b>NIK Karyawan</label>
                  <!--<input class="form-control" type="text" pattern="[0-9]" name="kar_nik" placeholder="NIK Karyawan" maxlength="20" oninvalid="setCustomValidity('Hanya Masukan Angka')" onchange="try{setCustomValidity('')}catch(e){}"  required/>-->
                  <input class="form-control" type="text" name="kar_nik" value="<?php echo $karyawan->kar_nik ?>" readonly/>
              </div>

              <div class="form-group">
                  <label>Nama Karyawan</label>
                  <input class="form-control" type="text" name="kar_nama" value="<?php echo $karyawan->kar_nama ?>" required/>
              </div>

              <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input class="form-control date" type="text" name="kar_tgl_lahir" value="<?php echo $karyawan->kar_tgl_lahir ?>" readonly/>
              </div>

              <div class="form-group">
                  <label>Jenis Kelamin</label></b><br>
                  <input type="radio" name="kar_jenkel" value="Laki-Laki" <?php echo ($karyawan->kar_jenkel=='Laki-Laki')?'checked':'' ?>> Laki-Laki
                  <input type="radio" name="kar_jenkel" value="Perempuan" <?php echo ($karyawan->kar_jenkel=='Perempuan')?'checked':'' ?>> Perempuan
              </div>

              <div class="form-group">
                  <label><b>Alamat</label>
                  <textarea class="form-control" type="text" name="kar_alamat" required><?php echo $karyawan->kar_alamat ?></textarea> 
              </div>

              <div class="form-group">
                <label>Agama</label>
                  <select name="kar_agama" class="form-control" required>
                    <option value="">-PILIH-</option>
                    <option value="Islam" <?php if($karyawan->kar_agama=="Islam") echo 'selected="selected"'; ?>>Islam</option>
                    <option value="Kristen Protestan" <?php if($karyawan->kar_agama=="Kristen Protestan") echo 'selected="selected"'; ?>>Kristen Protestan</option>
                    <option value="Katolik" <?php if($karyawan->kar_agama=="Katolik") echo 'selected="selected"'; ?>>Katolik</option>
                    <option value="Buddha" <?php if($karyawan->kar_agama=="Buddha") echo 'selected="selected"'; ?>>Buddha</option>
                    <option value="Kong Hu Cu" <?php if($karyawan->kar_agama=="Kong Hu Cu") echo 'selected="selected"'; ?>>Kong Hu Cu</option>
                  </select>
              </div>

              <div class="form-group">
                  <label>Status Kawin</label></b><br>
                  <input type="radio" name="kar_status_kawin" value="Kawin" <?php echo ($karyawan->kar_status_kawin=='Kawin')?'checked':'' ?>> Kawin
                  <input type="radio" name="kar_status_kawin" value="Belum Kawin" <?php echo ($karyawan->kar_status_kawin=='Belum Kawin')?'checked':'' ?>> Belum Kawin
              </div>

              <div class="form-group">
                  <label><b>Foto</label>
                  <img id="image-preview" width="100" /><br/>
                  <input class="form-control-file" type="file" name="kar_foto" id="image-source" onchange="previewImage();"/>
                  <input type="hidden" name="old_kar_foto" value="<?php echo $karyawan->kar_foto ?>" />
              </div>

              <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input class="form-control" type="text" name="kar_no_hp" value="<?php echo $karyawan->kar_no_hp ?>" maxlength="15" onkeypress="return hanyaAngka(event)" required/>
              </div>

              <div class="form-group">
                  <label>Nomor Rekening</label>
                  <input class="form-control" type="text" name="kar_norek" value="<?php echo $karyawan->kar_norek ?>" maxlength="20" onkeypress="return hanyaAngka(event)" required/>
              </div>              

              <div class="form-group">
                  <label>Tanggal Masuk</label>
                  <input class="form-control date" type="text" name="kar_tgl_masuk" value="<?php echo $karyawan->kar_tgl_masuk ?>" readonly/>
              </div>

                        <div class="form-group">
                            <label>Jabatan</label> </b>
                            <select class="form-control" name="jabatan" required>
                            <option value="">Pilih Jabatan</option>
                              <?php                                
                                  foreach ($jabatan as $row) {
                                  $id_jab=$row->jabatan_id;  
                                  $nm_jab=$row->jabatan_nama;
                                  if($karyawan->jabatan_id==$id_jab)
                                        echo "<option value='$id_jab' selected>$nm_jab</option>";
                                    else
                                        echo "<option value='$id_jab'>$nm_jab</option>";
                                }
             
                              ?>
                            </select>
                        </div>             
              <input class="btn btn-success" type="submit" name="submit" value="Update" />
            
            <?php echo form_close(); ?>      
            </div>
          </div>
          <div class="card-footer"></div>
        </div>
    
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Robbani Corporation 2021</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin ingin keluar dari program ini ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo site_url('manajer/dashboard/logout')?>">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js');?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js');?>"></script>
  <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin.min.js');?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('assets/js/demo/datatables-demo.js');?>"></script>
  <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js');?>"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( ".date" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );
  </script>

  <script type="text/javascript">
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
        return true;
      }
  </script>

  <script type="text/javascript">
      function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("image-source").files[0]);
     
        oFReader.onload = function(oFREvent) {
          document.getElementById("image-preview").src = oFREvent.target.result;
        };
      };
  </script>

</body>

</html>