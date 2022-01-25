<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ilham Fathur Robbani">

  <title>Bagian Gudang</title>

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

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Gudang</a>
          </li>
          <li class="breadcrumb-item active">Barang</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add" style="color: white;font-weight: bold;"><i class="fas fa-plus"></i>
            Tambah Data</a></div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" id="mydata">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Warna</th>
                        <th>Ukuran</th>
                        <th>Jenis</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                        foreach ($data->result_array() as $b):
                            $barang_kode=$b['barang_kode'];
                            $barang_nama=$b['barang_nama'];
                            $barang_warna=$b['barang_warna'];
                            $barang_ukuran=$b['barang_ukuran'];
                            $barang_jenis=$b['barang_jenis'];
                            $barang_stok=$b['barang_stok'];
                            $barang_harga=$b['barang_harga'];
                    ?>
                    <tr>
                        <td><?php echo $barang_kode;?></td>
                        <td><?php echo $barang_nama;?></td>
                        <td><?php echo $barang_warna;?></td>
                        <td><?php echo $barang_ukuran;?></td>
                        <td><?php echo $barang_jenis;?></td>
                        <td><?php echo $barang_stok;?></td>
                        <td><?php echo 'Rp '.number_format($barang_harga);?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $barang_kode;?>" style="color: white;"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $barang_kode;?>" style="color: white;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer"></div>
        </div>
            <!--=======MODAL ADD BARANG=======-->
    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Barang</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('gudang/dashboard/simpan_barang')?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama barang</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_nama" class="form-control" placeholder="Nama Barang" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Warna</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_warna" class="form-control" placeholder="Warna Barang" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Ukuran</label>
                            <div class="col-xs-8">
                                <select class="form-control" name="barang_ukuran" required>
                                   <option value="">--Pilih Ukuran--</option>
                                    <?php                                
                                        for($u=18;$u<=50;$u++){  
                                      echo "<option value='".$u."'>".$u."</option>";
                                      }
                                      echo"</select>";
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-xs-3">Jenis</label>
                          <div class="col-xs-8">
                            <select name="barang_jenis" class="form-control" required>
                              <option value="">-PILIH-</option>
                              <option value="Men">Pria</option>
                              <option value="Women">Wanita</option>
                              <option value="Kids">Anak-Anak</option>
                              <option value="Sneakers">Sneakers</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Stok</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_stok" class="form-control" placeholder="Stok Barang" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_harga" class="harga form-control" placeholder="Harga Barang" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD BARANG-->

    <!--MODAL EDIT BARANG-->
    <?php
        foreach ($data->result_array() as $b):
            $barang_kode=$b['barang_kode'];
            $barang_nama=$b['barang_nama'];
            $barang_warna=$b['barang_warna'];
            $barang_ukuran=$b['barang_ukuran'];
            $barang_jenis=$b['barang_jenis'];
            $barang_stok=$b['barang_stok'];
            $barang_harga=$b['barang_harga'];
            
    ?>
    <div class="modal fade" id="modal_edit<?php echo $barang_kode;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" ari-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit barang</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('gudang/dashboard/edit_barang')?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Kode barang</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_kode" value="<?php echo $barang_kode;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama barang</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_nama" value="<?php echo $barang_nama;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Warna</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_warna" value="<?php echo $barang_warna;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Ukuran</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_ukuran" value="<?php echo $barang_ukuran;?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Stok</label>
                            <div class="col-xs-8">
                                <input type="number" min="0" name="barang_stok" value="<?php echo $barang_stok;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga</label>
                            <div class="col-xs-8">
                                <input type="text" name="barang_harga" value="<?php echo $barang_harga;?>" class="harga form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button class="btn btn-info">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach;?>
    <!--END MODAL EDIT-->

    <!--MODAL DELETE-->
    <?php
        foreach ($data->result_array() as $b):
            $barang_kode=$b['barang_kode'];
            $barang_nama=$b['barang_nama'];
            
    ?>
    <div class="modal fade" id="modal_delete<?php echo $barang_kode?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 100px;">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;">Hapus barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form class="form-horizontal" method="POST" action="<?php echo site_url('gudang/dashboard/hapus_barang')?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus barang <b><?php echo $barang_nama; ?></b> ?</p>
                    </div>
                    <div class="modal-footer" style="margin: 0;border-top: 0;text-align: center;">
                        <input type="hidden" name="barang_kode" value="<?php echo $barang_kode;?>">
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
      <footer style=" position: absolute; bottom: 0;background-color: #e9ecef; height: 100px; width: 100%">
        <div class="container my-auto">
          <div class="text-center my-auto">
            <br>
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
  <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
  <script type="text/javascript">
        $(function(){
            $('.harga').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
</body>

</html>
