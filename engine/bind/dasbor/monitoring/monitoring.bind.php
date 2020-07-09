<div style="text-align: center;">
        <h4>Meja</h4>
    </div>
<div class="row" id='divMonitoring'>

    <?php foreach($data['meja'] as $dm) : 
        $status = $dm['status'];
        //cari jumlah tamu per meja 
        $jlhTamu = $dm['jlh_tamu'];
        if($status === 'active'){
            $ic = 'fas fa-utensils';
            $wm = '#00cec9';
            $cm = 'Terisi';
        }else{
            $ic = 'fas fa-door-open';
            $wm = '#636e72';
            $cm = 'Kosong';
        }
    ?>
  
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon"  style="background-color: <?=$wm;?>;">
                <i class="<?=$ic; ?>"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Meja <?=$dm['nama']; ?> (<?=$cm; ?>)</h4>
                </div>
                <div class="card-body" style="margin-bottom: 15px;">
                    <span style="font-size: 14px;">Jumlah tamu : <?=$jlhTamu; ?></span> <br/>
                    <?php if($status === 'active'){ ?> 
                        <a href='#!' class="btn btn-sm btn-info btn-icon icon-left" v-on:click='setLeaveAtc("<?=$dm['kd_meja'];?>")'><i class='fas fa-sign-in-alt'></i> Set Leave</a>
                    <?php }else{ ?> 
                        <a href='#!' class="btn btn-sm btn-warning btn-icon <?=$dm['kd_meja'];?> icon-left" @click='setActiveAtc("<?=$dm['kd_meja'];?>")'><i class='fas fa-check-circle'></i> Set Active</a>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/monitoring.js"></script> 