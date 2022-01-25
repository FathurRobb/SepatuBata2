<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ilham Fathur Robbani">

  <title>Manajer - Laporan</title>

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
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('manajer/dashboard')?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Laporan</span>
        </a>
      </li>
      <li class="nav-item dropdown">
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
          <li class="breadcrumb-item active">Laporan</li>
        </ol>
        
        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Grafik Penjualan</div>
          <div class="card-body">
<div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Grafik</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                        <td style="text-align:center;vertical-align:middle">1</td>
                        <td style="vertical-align:middle;">Grafik Penjualan PerBulan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-secondary" href="#graf_jual_perbulan" data-toggle="modal"><span class="fa fa-eye"></span> Lihat</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">2</td>
                        <td style="vertical-align:middle;">Grafik Penjualan PerTahun</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-secondary" href="#graf_jual_pertahun" data-toggle="modal"><span class="fa fa-eye"></span> Lihat</a>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>

        <!--=======MODAL ADD BARANG=======-->
    <div class="modal fade" id="graf_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('manajer/dashboard/graf_penjualan_perbulan');?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-xs-8">
                              <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required/>
                              <?php foreach ($jual_bln->result_array() as $k) {
                                    $bln=$k['bulan'];
                                ?>
                                    <option><?php echo $bln;?></option>
                                <?php }?>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-info"><span class="fa fa-eye"></span> Lihat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD BARANG-->
    <!--=======MODAL ADD BARANG=======-->
    <div class="modal fade" id="graf_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('manajer/dashboard/graf_penjualan_pertahun');?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-xs-8">
                              <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required/>
                                <?php foreach ($jual_thn->result_array() as $t) {
                                    $thn=$t['tahun'];
                                ?>
                                    <option><?php echo $thn;?></option>
                                <?php }?>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-info"><span class="fa fa-eye"></span> Lihat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD BARANG-->    

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Pilih Laporan</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Laporan</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Laporan</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                  <tr>
                        <td style="text-align:center;vertical-align:middle">1</td>
                        <td style="vertical-align:middle;">Laporan Data Barang</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-secondary" href="<?php echo site_url('manajer/dashboard/lap_data_barang')?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">2</td>
                        <td style="vertical-align:middle;">Laporan Penjualan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-secondary" href="<?php echo site_url('manajer/dashboard/lap_data_penjualan')?>" target="_blank"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">3</td>
                        <td style="vertical-align:middle;">Laporan Penjualan PerTanggal</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-secondary" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">4</td>
                        <td style="vertical-align:middle;">Laporan Penjualan PerBulan</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-secondary" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;vertical-align:middle">5</td>
                        <td style="vertical-align:middle;">Laporan Penjualan PerTahun</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-secondary" href="#lap_jual_pertahun" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>

                     <tr>
                        <td style="text-align:center;vertical-align:middle">6</td>
                        <td style="vertical-align:middle;">Laporan Arus Kas</td>
                        <td style="text-align:center;">
                            <a class="btn btn-sm btn-secondary" href="#lap_arus_kas" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>
        
                    <!--=======MODAL ADD BARANG=======-->
    <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('manajer/dashboard/lap_penjualan_pertanggal');?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-xs-8">
                                <input type="text" name="tgl" class="form-control date" placeholder="Tanggal...." required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD BARANG-->
    <!--=======MODAL ADD BARANG=======-->
    <div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('manajer/dashboard/lap_penjualan_perbulan');?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-xs-8">
                              <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required/>
                              <?php foreach ($jual_bln->result_array() as $k) {
                                    $bln=$k['bulan'];
                                ?>
                                    <option><?php echo $bln;?></option>
                                <?php }?>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD BARANG-->
    <!--=======MODAL ADD BARANG=======-->
    <div class="modal fade" id="lap_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('manajer/dashboard/lap_penjualan_pertahun');?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-xs-8">
                              <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required/>
                                <?php foreach ($jual_thn->result_array() as $t) {
                                    $thn=$t['tahun'];
                                ?>
                                    <option><?php echo $thn;?></option>
                                <?php }?>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD BARANG-->
    <!--=======MODAL ADD BARANG=======-->
    <div class="modal fade" id="lap_arus_kas" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('manajer/dashboard/lap_arus_kas');?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-xs-8">
                              <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required/>
                              <?php foreach ($jual_bln->result_array() as $k) {
                                    $bln=$k['bulan'];
                                ?>
                                    <option><?php echo $bln;?></option>
                                <?php }?>
                                </select> 
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD BARANG-->

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
    $(".date").datepicker().datepicker("setDate", new Date());
  } );
  </script>
</body>

</html>
