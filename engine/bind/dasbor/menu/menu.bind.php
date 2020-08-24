<div id='divMenuResto'>
    <div style='margin-bottom:15px;'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahMenuAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Menu
        </a>
    </div>
    <div class="row" id='divTabelMenu' style="padding-left:20px;margin-right:10px;">
        <table id='tblMenu' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th style="text-align: center;">Menu</th>
                    <th>Kategori / Satuan</th>
                    <th>Deks</th>
                    <th>Harga</th>
                    <th>Total Transaksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['menu'] as $menu) : 
                   $kategori = $this -> state('utilityData') -> getNamaKategori($menu['kategori']); 
                ?>
                <tr>
                    <td style="text-align: center;">
                        <img class="mr-3" width="170" style="border-radius:6px;" src="<?=STYLEBASE; ?>/dasbor/img/menu/<?=$menu['pic']; ?>" alt="avatar">
                        <div class="mt-2 font-weight-bold"><?=$menu['nama']; ?></div>
                    </td>
                    <td><?=$kategori; ?> / <?=$menu['satuan']; ?></td>
                    <td><?=$menu['deks']; ?></td>
                    <td>Rp. <?=number_format($menu['harga']); ?></td>
                    <td><?=$menu['total_dipesan']; ?></td>
                    <td>
                        <a href='#!' class="btn btn-primary btn-icon icon-left btn-sm" @click='detailAtc("<?=$menu['kd_menu']; ?>", "<?=$menu['nama']; ?>")'>
                            <i class='fas fa-info-circle'></i> Detail
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/menu.js"></script>