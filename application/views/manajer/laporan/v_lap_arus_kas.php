<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Laba/rugi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>
<?php 
    $b=$jml->row_array();
    $non=6000000;
    $totgaji=$gaji->row_array();
    $pemasok=3000000;
    $sewa=1000000;
    $total= ($b['total'] + $non) - ($totgaji['total_gaji'] + $pemasok - $sewa);
?>
<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN ARUS KAS </h4></center></td>
</tr>
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>Bulan :  <?php echo $b['bulan'];?> </h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:700px;border:none;">
        <tr>
            <th style="text-align:left">ARUS KAS DARI AKTIVASI OPERASI</th>
        </tr>
</table>
<br>

<table border="0" align="center" style="width:700px;border:none;">
        <tr>
            <th style="text-align:left;">Penerimaan Kas Pelanggan</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['total']);?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Penerimaan Kas dari Non Pelanggan</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($non);?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Pembayaran Kas kepada Pemasok</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($pemasok);?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Pembayaran Kas kepada Karyawan</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($totgaji['total_gaji']);?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Pembayaran Sewa</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($sewa);?></th>
        </tr>
</table>
<hr width="60%" />
<table border="0" align="center" style="width:700px;border:none;">
        <tr>
            <th style="text-align:left">Kas yang Dihasilkan dari Operasi</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($total);?></th>
        </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Bandung, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <?php
        foreach ($profil->result_array() as $p){
            $kar_nama=$p['kar_nama'];
    ?>   
        <td align="right">( <?php echo $kar_nama;?> )</td>
    <?php }; ?>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
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