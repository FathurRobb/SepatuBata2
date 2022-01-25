<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ilham Fathur Robbani">

  <title>Kasir</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
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

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Transaksi
                    <small>Penjualan</small>
                    <ul style="float: right;"><a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a></ul>
                    <style type="text/css">
                      small{
                        font-size: 65%;
                        font-weight: 400;
                        line-height: 1;
                        color: #777;
                      }
                    </style>
                </h1> 
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
        </div>
          <div class="col-lg-12">
            <form action="<?php echo site_url('kasir/dashboard/add_to_cart');?>" method="post">
            <table>
                <tr>
                    <th>Kode Barang</th>
                </tr>
                <tr>
                    <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>                     
                </tr>
                    <div id="detail_barang" style="position:absolute;">
                    </div>
            </table>
             </form>
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Warna</th>
                        <th style="text-align:center;">Ukuran</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Diskon(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:center;"><?=$items['color'];?></td>
                         <td style="text-align:center;"><?=$items['size'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                        
                         <td style="text-align:center;"><a href="<?php echo site_url('kasir/dashboard/remove/').$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fas fa-times"></span> Batal</a></td>
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?php echo site_url('kasir/dashboard/simpan_penjualan');?>" method="post">
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                    <th style="width:140px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>

            </table>
            </form>

        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Warna</th>
                            <th>Ukuran</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no=0;
                        foreach ($data->result_array() as $b):
                            $no++;
                            $barang_kode=$b['barang_kode'];
                            $barang_nama=$b['barang_nama'];
                            $barang_warna=$b['barang_warna'];
                            $barang_ukuran=$b['barang_ukuran'];
                            $barang_jenis=$b['barang_jenis'];
                            $barang_stok=$b['barang_stok'];
                            $barang_harga=$b['barang_harga'];
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $barang_kode;?></td>
                            <td><?php echo $barang_nama;?></td>
                            <td><?php echo $barang_warna;?></td>
                            <td><?php echo $barang_ukuran;?></td>
                            <td><?php echo $barang_jenis;?></td>
                            <td><?php echo $barang_stok;?></td>
                            <td><?php echo 'Rp '.number_format($barang_harga);?></td>
                            <td style="text-align:center;">
                            <form action="<?php echo site_url('kasir/dashboard/add_to_cart');?>" method="post">
                            <input type="hidden" name="kode_brg" value="<?php echo $barang_kode?>">
                            <input type="hidden" name="nabar" value="<?php echo $barang_nama;?>">
                            <input type="hidden" name="warna" value="<?php echo $barang_warna;?>">
                            <input type="hidden" name="ukuran" value="<?php echo $barang_ukuran;?>">
                            <input type="hidden" name="stok" value="<?php echo $barang_stok;?>">
                            <input type="hidden" name="harjul" value="<?php echo number_format($barang_harga);?>">
                            <input type="hidden" name="diskon" value="0">
                            <input type="hidden" name="qty" value="1" required>
                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>          

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </div>
            </div>
        </div>
        <hr>
</div>
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
  <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap-select.min.js'?>"></script>

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
  <script src="<?php echo base_url('assets/js/jquery.price_format.min.js');?>"></script>
  <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>
  <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
  <script type="text/javascript">
        $(function(){
            $('.harga').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").on("input",function(){
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo site_url('kasir/dashboard/get_barang');?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            }); 

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>
    <style type="text/css">
      .page-header {
          padding-bottom: 9px;
          margin: 40px 0 20px;
          border-bottom: 1px solid #eee;
      }
      .input-sm{
        height: 30px;
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px
      }
      .btn-xs {
          color: #fff;
          padding: 1px 5px;
          font-size: 12px;
          line-height: 1.5;
          border-radius: 3px;
      }
    </style>
</body>

</html>
