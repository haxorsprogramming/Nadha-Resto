<div id='divArusKas' class="row">
<table id='tblArusKas' class='table table-hover'>
        <thead>
            <tr>
                <th>#</th>
                <th>Kd Transaksi</th>
                <th>Waktu</th>
                <th>Asal</th>
                <th>Arus</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1; 
            $saldo = $data['saldoAwal']; 
            
            foreach($data['arusKas'] as $ak) : 
                if($ak['arus'] === 'masuk'){
                    $saldo = $saldo + $ak['total'];
                }else{
                    $saldo = $saldo - $ak['total'];
                }
            ?>
            <tr>
                <td></td>
                <td><?=$ak['kd_transaksi']; ?></td>
                <td><?=$ak['waktu']; ?></td>
                <td><?=$ak['tipe']; ?></td>
                <td style="background-color:<?php echo ($ak['arus'] === 'masuk' ? '#55efc4' : '#ffeaa7'); ?>;"><?=$ak['arus']; ?></td>
                <td>Rp. <?=number_format($ak['total']); ?></td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/arusKas.js"></script>