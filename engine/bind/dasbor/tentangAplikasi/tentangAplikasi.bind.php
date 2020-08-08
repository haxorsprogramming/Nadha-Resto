<div class="row" id="divTentangAplikasi">

    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Tim pengembang</h4></div>
            <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                    <li class="media" v-for='tp in timPengembang'>
                      <img :src="'<?=STYLEBASE; ?>/dasbor/img/devTeam/'+tp.pic" class="mr-3 rounded-circle" width="50" src="" :alt="tp.nama">
                      <div class="media-body">
                        <div class="float-right text-primary">{{tp.pos}}</div>
                        <div class="media-title">{{tp.nama}}</div>
                        <span class="text-small text-muted">{{tp.email}}</span>
                      </div>
                    </li>
                  </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Daftar Kontributor</h4></div>
            <div class="card-body">

            </div>
        </div>
    </div>

</div>

<script src="<?=STYLEBASE; ?>/dasbor/tentangAplikasi.js"></script> 