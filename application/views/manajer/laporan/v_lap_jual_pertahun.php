<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>laporan data stok barang</title>
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
?>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PENJUALAN TAHUN <?php echo $b['tahun'];?></h4></center><br/></td>
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
    if($group=='-' || $group!=$d['bulan']){
        $bulan=$d['bulan'];
        $this->db->select("jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,SUM(d_jual_total)AS total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE("DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
        $query = $this->db->get();
        $t=$query->row_array();
        $tots=$t['total'];
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='900px;' border='1'>";
        echo "<tr><td colspan='8'><b>Bulan: $bulan</b></td> <td style='text-align:right;'><b>Total:</b></td><td style='text-align:right;'><b>".'Rp '.number_format($tots)."</b></td></tr>";
echo "<tr style='background-color:#ccc;'>
    <td width='3%' align='center'>No</td>
    <td width='8%' align='center'>No Faktur</td>
    <td width='10%' align='center'>Tanggal</td>
    <td width='10%' align='center'>Kode Barang</td>
    <td width='30%' align='center'>Nama Barang</td>
    <td width='7%' align='center'>Ukuran</td>
    <td width='7%' align='center'>Harga</td>
    <td width='5%' align='center'>Qty</td>
    <td width='7%' align='center'>Diskon</td>
    <td width='10%' align='center'>Subtotal</td>
    
    </tr>";
$nomor=1;
    }
    $group=$d['bulan'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";
            //echo "<center><h2>KALENDER EVENTS PER TAHUN</h2></center>";
            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:top;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['jual_nofak']; ?></td>
                <td style="vertical-align:top;text-align:center;"><?php echo $d['jual_tanggal']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['barang_kode']; ?></td>
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['barang_nama']; ?></td> 
                <td style="vertical-align:top;padding-left:5px;"><?php echo $d['barang_ukuran']; ?></td>
                <td style="vertical-align:top;padding-left:5px;text-align:right;"><?php echo 'Rp '.number_format($d['barang_harga']); ?></td>
                <td style="vertical-align:top;padding-left:5px;text-align:center;"><?php echo $d['d_jual_qty']; ?></td>
                <td style="vertical-align:top;padding-left:5px;text-align:right;"><?php echo 'Rp '.number_format($d['d_jual_diskon']); ?></td>
                <td style="vertical-align:top;padding-left:5px;text-align:right;"><?php echo 'Rp '.number_format($d['d_jual_total']); ?></td> 
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