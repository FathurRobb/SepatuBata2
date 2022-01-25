<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>laporan data barang</title>
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

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN DATA BARANG</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<?php 
    $urut=0;
    $nomor=0;
    $group='-';
    foreach($data->result_array()as $d){
    $nomor++;
    $urut++;
    if($group=='-' || $group!=$d['barang_jenis']){
        $kat=$d['barang_jenis'];
        
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='900px;' border='1'>";
        echo "<tr><td colspan='6'><b>Kategori: $kat</b></td> </tr>";
echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='10%' align='center'>Kode Barang</td>
    <td width='40%' align='center'>Nama Barang</td>>
    <td width='10%' align='center'>Warna</td>
    <td width='10%' align='center'>Ukuran</td>
    <td width='20%' align='center'>Harga</td>
    <td width='30%' align='center'>Stok</td>
    
    </tr>";
$nomor=1;
    }
    $group=$d['barang_jenis'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";

            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:center;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:center;padding-left:5px;text-align:center;"><?php echo $d['barang_kode']; ?></td>
                <td style="vertical-align:center;padding-left:5px;"><?php echo $d['barang_nama']; ?></td>
                <td style="vertical-align:center;text-align:center;"><?php echo $d['barang_warna']; ?></td>
                <td style="vertical-align:center;text-align:center;"><?php echo $d['barang_ukuran']; ?></td>
                <td style="vertical-align:center;padding-right:5px;text-align:right;"><?php echo 'Rp '.number_format($d['barang_harga']); ?></td>
                <td style="vertical-align:center;text-align:center;text-align:center;"><?php echo $d['barang_stok']; ?></td>  
        </tr>
        

        <?php
        }
        ?>
</table>

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
            $kar_foto=$p['kar_foto'];
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