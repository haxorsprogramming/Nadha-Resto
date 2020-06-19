<div id='divMenu'>
<div style='margin-bottom:15px;'>
<a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPelanggan'><i class="fas fa-plus-circle"></i> Tambah Menu</a>
</div>
<div class="row" id='divTabelMenu' style="padding-left:20px;margin-right:10px;">
<table id='tblMenu' class='table table-hover table-bordered table-stripped'>
<thead>
  <tr>
  <th style="text-align: center;">Menu</th><th>Kategori</th><th>Deks</th><th>Harga</th><th>Total Transaksi</th><th></th>
  </tr>
</thead>
<tbody>
    <tr>
        <td style="text-align: center;">
            <img class="mr-3" width="170" style="border-radius:6px;" src="<?=STYLEBASE; ?>/dasbor/img/menu/nasi_goreng.jpg" alt="avatar">
            <div class="mt-2 font-weight-bold">Nasi Goreng</div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a href='#!' class="btn btn-primary btn-icon icon-left">Detail</a>
        </td>
    </tr>
</tbody>
</table>
</div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/menu.js"></script>