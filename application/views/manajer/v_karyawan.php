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
            <a class="btn btn-sm btn-success" href="<?php echo site_url('manajer/karyawan/tambah')?>" style="color: white;font-weight: bold;"><i class="fas fa-plus"></i>
            Tambah Data</a></div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Nama Karyawan</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Foto</th>
                        <th>No Handphone</th>
                        <th>No Rekening</th>
                        <th>Tanggal Masuk</th>
                        <th>Jabatan</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                        $no = 0;
                        foreach ($data->result_array() as $k):
                            $no++;
                            $kar_nik=$k['kar_nik'];
                            $kar_nama=$k['kar_nama'];
                            $kar_alamat=$k['kar_alamat'];
                            $kar_tgl_lahir=$k['kar_tgl_lahir'];
                            $kar_agama=$k['kar_agama'];
                            $kar_foto=$k['kar_foto'];
                            $kar_no_hp=$k['kar_no_hp'];
                            $kar_norek=$k['kar_norek'];
                            $kar_tgl_masuk=$k['kar_tgl_masuk'];
                            $jabatan_nama=$k['jabatan_nama'];
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo $kar_nama;?></td>
                        <td><?php echo $kar_alamat;?></td>
                        <td><?php echo $kar_tgl_lahir;?></td>
                        <td><?php echo $kar_agama;?></td>
                        <td><img src="<?php echo base_url('assets/images/upload/'.$kar_foto) ?>" width="64"/></td>
                        <td><?php echo $kar_no_hp;?></td>
                        <td><?php echo $kar_norek;?></td>
                        <td><?php echo $kar_tgl_masuk;?></td>
                        <td><?php echo $jabatan_nama;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-info" href="<?php echo site_url('manajer/karyawan/edit/'.$kar_nik) ?>" style="color: white;"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $kar_nik;?>" style="color: white;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer"></div>
        </div>

                <!--MODAL DELETE-->
    <?php
        foreach ($data->result_array() as $k):
            $kar_nik=$k['kar_nik'];
            $kar_nama=$k['kar_nama'];
            
    ?>
    <div class="modal fade" id="modal_delete<?php echo $kar_nik?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 100px;">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Hapus Karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('manajer/karyawan/delete/'.$kar_nik)?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin mau menghapus data karyawan bernama <b><?php echo $kar_nama; ?></b> ?</p>
                    </div>
                    <div class="modal-footer" style="margin: 0;border-top: 0;text-align: center;">
                        <input type="hidden" name="kar_nik" value="<?php echo $kar_nik;?>">
                        <button class="btn btn-danger">Hapus</button>
                        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach;?>
    <!--END MODAL DELETE-->

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

</body>

</html>
