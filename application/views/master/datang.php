
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
        
        <?php
                foreach($query->result() as $row) {
                    if($row->mulaiDatang==null) {
                        $mulaiDatang = null;
                    } else {
                        $mulaiDatang = $row->mulaiDatang;
                    }

                    if($row->selesaiDatang==null) {
                        $selesaiDatang = null;
                    } else {
                        $selesaiDatang = $row->selesaiDatang;
                    }

                    if($row->formatDatang==null) {
                        $formatDatang = null;
                    } else {
                        $formatDatang = $row->formatDatang;
                    }
                }
            ?>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>Pengaturan Datang</strong></div>
                    <div class="card-body card-block">
                    <form action="<?php echo base_url('Pengelola/Datang/add'); ?>" method="post" class="form-horizontal" role="form">
                            <div class="row form-group">
                                <label for="nama" class="col-md-3 form-control-label" style="text-align: right;">Jam Mulai</label>
                                <div class="col-md-8">
                                    <input type="text" id="mulaiDatang" name="mulaiDatang" placeholder="Contoh : 06:00:00" <?php if($mulaiDatang!=null) {echo "value='" .$mulaiDatang. "'";} ?> class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="alamat" class="col-md-3 form-control-label" style="text-align: right;">Jam Selesai</label>
                                <div class="col-md-8">
                                    <input type="text" id="selesaiDatang" name="selesaiDatang" placeholder="Contoh : 06:00:00" <?php if($selesaiDatang!=null) {echo "value='" .$selesaiDatang. "'";} ?> class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="noTlp" class="col-md-3 form-control-label" style="text-align: right;">Format Pesan</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="formatDatang" name="formatDatang" placeholder="Format Pesan"><?php if($formatDatang!=null) {echo $formatDatang;} ?></textarea>
                                </div>    
                            </div>
                            <p>Contoh format pesan :</p>
                            <p>Siswa {{nama}} telah datang di sekolah pada {{tanggal}}, jam {{jam}}.</p>
                            <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
