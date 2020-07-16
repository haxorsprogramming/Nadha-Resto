<div id='divArusKas' class="row">
<table id='tblArusKas' class='table table-hover'>
        <thead>
            <tr>
                <th>Kd Transaksi</th>
                <th>Waktu</th>
                <th>Asal</th>
                <th>Arus</th>
                <th>Total</th>
                <th>Saldo</th>
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
                <td><?=$ak['kd_transaksi']; ?></td>
                <td><?=$ak['waktu']; ?></td>
                <td><?=$ak['tipe']; ?></td>
                <td style="background-color:<?php echo ($ak['arus'] === 'masuk' ? '#55efc4' : '#ffeaa7'); ?>;"><?=$ak['arus']; ?></td>
                <td>Rp. <?=number_format($ak['total']); ?></td>
                <th>Rp. <?=number_format($saldo); ?></th>
            </tr>
            <?php $no++; endforeach; ?>
            
        </tbody>
        <table>
        <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Saldo Awal</td>
                <td><?=number_format($saldo);?></td>
            </tr>
        </table>
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/arusKas.js"></script>