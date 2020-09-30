
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
        
        <?php
                foreach($query->result() as $row) {
                    if($row->mulaiPulang==null) {
                        $mulaiPulang = null;
                    } else {
                        $mulaiPulang = $row->mulaiPulang;
                    }

                    if($row->selesaiPulang==null) {
                        $selesaiPulang = null;
                    } else {
                        $selesaiPulang = $row->selesaiPulang;
                    }

                    if($row->formatPulang==null) {
                        $formatPulang = null;
                    } else {
                        $formatPulang = $row->formatPulang;
                    }
                }
            ?>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>Pengaturan Pulang</strong></div>
                    <div class="card-body card-block">
                    <form action="<?php echo base_url('Pengelola/Pulang/add'); ?>" method="post" class="form-horizontal" role="form">
                            <div class="row form-group">
                                <label for="nama" class="col-md-3 form-control-label" style="text-align: right;">Jam Mulai</label>
                                <div class="col-md-8">
                                    <input type="text" id="mulaiPulang" name="mulaiPulang" placeholder="Contoh : 06:00:00" <?php if($mulaiPulang!=null) {echo "value='" .$mulaiPulang. "'";} ?> class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="alamat" class="col-md-3 form-control-label" style="text-align: right;">Jam Selesai</label>
                                <div class="col-md-8">
                                    <input type="text" id="selesaiPulang" name="selesaiPulang" placeholder="Contoh : 06:00:00" <?php if($selesaiPulang!=null) {echo "value='" .$selesaiPulang. "'";} ?> class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="noTlp" class="col-md-3 form-control-label" style="text-align: right;">Format Pesan</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="formatPulang" name="formatPulang" placeholder="Format Pesan"><?php if($formatPulang!=null) {echo $formatPulang;} ?></textarea>
                                </div>    
                            </div>
                            <p>Contoh format pesan :</p>
                            <p>Siswa {{nama}} telah pulang di sekolah pada {{tanggal}}, jam {{jam}}.</p>
                            <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
