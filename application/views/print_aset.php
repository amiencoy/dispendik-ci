<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html class="no-js" lang="en">

<body>


    <h4 class="header-title mb-2">Detail Data Aset</h4>
    <?php

    foreach ($all as $list) {
    ?>
        <label>Kode lembaga :</label>
        <label value="$list->id"><?php echo $list->kode_lembaga; ?></label> <br>
        <label>No. Kontrak :</label>
        <label><?php echo $list->no_kontrak; ?></label><br>
        <label>Sumber Dana :</label>
        <label><?php echo sumber_dana($list->sumber_dana); ?></label><br>
        <label>Kategori :</label>
        <label><?php echo kb_uraian($list->kb); ?></label><br>
        <label>Jenis barang :</label>
        <label><?php echo kk_uraian($list->kk); ?></label><br>      
        <label>Nama Barang :</label>
        <label><?php echo $list->jenis_nama; ?></label><br>
        <label>Merk Barang :</label>
        <label><?php echo $list->merk; ?></label><br>
        <label>Ukuran/CC :</label>
        <label><?php echo $list->ukuran; ?></label><br>
        <label>Bahan :</label>
        <label><?php echo $list->bahan; ?></label><br>
        <label>Nama toko :</label>
        <label><?php echo $list->nama_toko; ?></label><br>
        <label>Tanggal Beli :</label>
        <label><?php echo mediumdate_indo($list->tgl_terima); ?></label><br>
        <label>Harga Satuan :</label>
        <label><?php echo $list->harga_satuan; ?></label><br>
        <label>Banyak Barang :</label>
        <label><?php echo $list->jumlah; ?></label><br>
        <label>Total :</label>
        <label><?php echo $list->harga_total; ?></label><br>
        <label>TB/Cawulan :</label>
        <label><?php echo $list->tb_cawl; ?></label><br>
        <label>Ruang :</label>
        <label><?php echo $list->ruang; ?></label><br>
        <label>Keterangan :</label>
        <label><?php echo $list->keterangan; ?></label><br>
       





    <?php
    }

    ?>

    <script type="text/javascript">window.print();</script>
</body>

</html>