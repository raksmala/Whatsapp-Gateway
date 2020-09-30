
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
        
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header"><strong>Logo Sekolah</strong></div>
                    <div class="card-body card-block">
                        <div id="uploadedLogo" class="row form-group" style="justify-content: center;">
                            <img class="user-avatar rounded-circle mt-3 mb-3" id="tampilanLogo" name="tampilanLogo" style="width:200px; height:200px;" <?php foreach($query->result() as $row) {if($row->logo!=null){$logoName=$row->logo; echo "src='" .base_url(). "assets/Logo/" .$row->logo. "'";} else {echo "src='" .base_url(). "assets/Logo/default.png'";}} ?> alt="User Avatar">
                        </div>
                        <div class="row form-group">
                            <div class="col col-8 mx-auto" style="text-align: center;"><label for="username" class=" form-control-label"><strong><?php echo $this->session->userdata('username'); ?></strong></label></div>
                        </div>
                        <div class="row form-group" style="justify-content: center;">
                            <input type="file" id="upload" name="upload" accept="image/*" style="display: none;">
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('upload').click();">Upload</button>
                        </div>
                        <div id="uploadedImage"></div>
                    </div>
                </div>
            </div>
        
            <?php
                foreach($query->result() as $row) {
                    if($row->npsn==null) {
                        $npsn = null;
                    } else {
                        $npsn = $row->npsn;
                    }

                    if($row->namaSekolah==null) {
                        $namaSekolah = null;
                    } else {
                        $namaSekolah = $row->namaSekolah;
                    }

                    if($row->alamatSekolah==null) {
                        $alamatSekolah = null;
                    } else {
                        $alamatSekolah = $row->alamatSekolah;
                    }

                    if($row->noTlp==null) {
                        $noTlp = null;
                    } else {
                        $noTlp = $row->noTlp;
                    }

                    if($row->email==null) {
                        $email = null;
                    } else {
                        $email = $row->email;
                    }

                    if($row->kepalaSekolah==null) {
                        $kepalaSekolah = null;
                    } else {
                        $kepalaSekolah = $row->kepalaSekolah;
                    }

                    if($row->noHpKepsek==null) {
                        $noHpKepsek = null;
                    } else {
                        $noHpKepsek = $row->noHpKepsek;
                    }
                }
            ?>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><strong>Data Sekolah</strong></div>
                    <div class="card-body card-block">
                        <form action="<?php echo base_url('Pengelola/Sekolah/add'); ?>" method="post" class="form-horizontal" role="form">
                            <div class="row form-group">
                                <label for="npsn" class="col-md-3 form-control-label" style="text-align: right;">NPSN</label>
                                <div class="col-md-4">
                                    <input type="text" id="npsn" name="npsn" placeholder="NPSN" <?php if($npsn!=null) {echo "value='" .$npsn. "'";} ?> class="form-control" readonly="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="nama" class="col-md-3 form-control-label" style="text-align: right;">Nama Sekolah</label>
                                <div class="col-md-8">
                                    <input type="text" id="namaSekolah" name="namaSekolah" placeholder="Masukkan nama sekolah" <?php if($namaSekolah!=null) {echo "value='" .$namaSekolah. "'";} ?> class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="alamat" class="col-md-3 form-control-label" style="text-align: right;">Alamat</label>
                                <div class="col-md-8">
                                    <input type="text" id="alamatSekolah" name="alamatSekolah" placeholder="Masukkan alamat sekolah" <?php if($alamatSekolah!=null) {echo "value='" .$alamatSekolah. "'";} ?> class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="noTlp" class="col-md-3 form-control-label" style="text-align: right;">Telepon</label>
                                <div class="col-md-4">
                                    <input type="tel" id="noTlp" name="noTlp" placeholder="Nomor telepon" <?php if($noTlp!=null) {echo "value='" .$noTlp. "'";} ?> class="form-control">
                                </div>    
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-md-3 form-control-label" style="text-align: right;">Email</label>
                                <div class="col-md-8">
                                    <input type="text" id="email" name="email" placeholder="Masukkan email sekolah" <?php if($email!=null) {echo "value='" .$email. "'";} ?> class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="namaKepala" class="col-md-3 form-control-label" style="text-align: right;">Kepala Sekolah</label>
                                <div class="col-md-8">
                                    <input type="text" id="kepalaSekolah" name="kepalaSekolah" placeholder="Masukkan nama kepala sekolah" <?php if($kepalaSekolah!=null) {echo "value='" .$kepalaSekolah. "'";} ?> class="form-control">
                                </div>
                            </div>  
                            <div class="row form-group">
                                <label for="noHp" class="col-md-3 form-control-label" style="text-align: right;">Nomor HP</label>
                                <div class="col-md-4">
                                    <input type="tel" id="noHpKepsek" name="noHpKepsek" placeholder="Nomor hp" <?php if($noHpKepsek!=null) {echo "value='" .$noHpKepsek. "'";} ?> class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- .animated -->
</div><!-- .content -->

<div id="uploadimageModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Crop &amp; Upload Gambar</h4>
                <button type="button" class="close" data-dismiss="modal" >
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="upload-demo-wrap">
                            <div id="upload-demo"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success upload-result">Crop &amp; Upload</button>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<script src="<?php echo base_url(); ?>assets/Croppie-master/croppie.js"></script>
<script src="<?php echo base_url(); ?>assets/Croppie-master/demo/demo.js"></script>


<script>
    var $uploadCrop;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            $('#uploadimageModal').modal('show');
            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
                
            }
            
            reader.readAsDataURL(input.files[0]);
        }
        else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        enableExif: true
    });

    $('#upload').on('change', function () { readFile(this); });
    $('.upload-result').on('click', function (event) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            $.ajax({
                url:"<?php echo base_url(); ?>Pengelola/Sekolah/logo",
                type:"POST",
                data:{"image": response},
                success:function(data) {
                    $('#uploadimageModal').modal('hide');
                    setTimeout(function(){
                        location.reload();
                    }, 2000);
                }
            });
        });
        reader.readAsDataURL(this.files[0]);
    });
</script>