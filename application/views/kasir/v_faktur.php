<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Faktur Penjualan Barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>
<p align="center" style="line-height:2px;">==========================</p>
<h4 align="center" style="line-height:2px;">BATA - 58511</h4>
<h4 align="center" style="line-height:2px;">Pengecer Khusus KETUT SUPARIANI</h4>
<p align="center" style="line-height:2px;">==========================</p>
<h4 align="center" style="line-height:2px;">Bandung Indah Plaza</h4>
<h4 align="center" style="line-height:2px;">Jl. Medan Merdeka Timur No.56</h4>
<h4 align="center" style="line-height:2px;">Bandung</h4>
<h4 align="center" style="line-height:2px;">(022) 4223304</h4>
<br>
<table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    
</tr>
                       
</table>
<?php 
    $b=$data->row_array();
?>
<table border="0" align="center" style="width:700px;border:none;">
        <tr>
            <th style="text-align:left;">No Faktur</th>
            <th style="text-align:left;">: <?php echo $b['jual_nofak'];?></th>
            <th style="text-align:left;">Total</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_total']).',-';?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Tanggal</th>
            <th style="text-align:left;">: <?php echo $b['jual_tanggal'];?></th>
            <th style="text-align:left;">Tunai</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_jml_uang']).',-';?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Kasir</th>
            <th style="text-align:left;">: <?php echo $this->session->userdata('username');?></th>
            <th style="text-align:left;">Kembalian</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_kembalian']).',-';?></th>
        </tr>
</table>
<br>

<table border="1" align="center" style="width:700px;margin-bottom:20px;">
<thead>

    <tr>
        <th style="width:50px;">No</th>
        <th>Nama Barang</th>
        <th>Ukuran</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Diskon</th>
        <th>SubTotal</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        
        $nabar=$i['barang_nama'];
        $ukuran=$i['barang_ukuran'];
        
        $harga=$i['barang_harga'];
        $qty=$i['d_jual_qty'];
        $diskon=$i['d_jual_diskon'];
        $total=$i['d_jual_total'];
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="text-align:left;"><?php echo $nabar;?></td>
        <td style="text-align:center;"><?php echo $ukuran;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
        <td style="text-align:center;"><?php echo $qty;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($diskon);?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($total);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="6" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp '.number_format($b['jual_total']);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="center"></td>
        <h4 align="center" style="line-height:2px;">= Terima Kasih Atas Kunjungan Anda =</h4>
        <h4 align="center" style="line-height:2px;">====================================</h4>
        <h4 align="center" style="line-height:2px;">KEMBALI KE SEKOLAH BERSAMA BATA</h4>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>