<div class="content">
    <div class="animated fadeIn">
        <div class="row">
        
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header"><strong>Logo Sekolah</strong></div>
                    <div class="card-body card-block">
                        <div class="row form-group" style="justify-content: center;">
                            <img class="user-avatar rounded-circle mt-3 mb-3" id="tampilanLogo" name="tampilanLogo" style="width:200px; height:200px;" src="<?php echo base_url(); ?>ElaAdmin-master/images/pnm.png" alt="User Avatar">
                        </div>
                        <div class="row form-group">
                            <div class="col col-6 mx-auto" style="text-align: center;"><label for="username" class=" form-control-label"><strong>Nama Sekolah</strong></label></div>
                        </div>
                        <div class="row form-group" style="justify-content: center;">
                            <input type="file" id="upload_image" name="uploadImage" accept="image/*">
                        </div>
                        <div id="uploadedImage"></div>
                    </div>
            </div>
        </div>
        
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header"><strong>Data Sekolah</strong></div>
                    <div class="card-body card-block">
                            <div class="row form-group">
                                <label for="npsn" class="col-md-4 form-control-label" style="text-align: right;">NPSN</label>
                                <div class="col-md-4">
                                    <input type="text" id="npsn" name="npsn" placeholder="NPSN" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="nama" class="col-md-4 form-control-label" style="text-align: right;">Nama Sekolah</label>
                                <div class="col-md-8">
                                    <input type="text" id="namaSekolah" placeholder="Masukkan nama sekolah" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="alamat" class="col-md-4 form-control-label" style="text-align: right;">Alamat</label>
                                <div class="col-md-8">
                                    <input type="text" id="alamatSekolah" placeholder="Masukkan alamat sekolah" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="noTlp" class="col-md-4 form-control-label" style="text-align: right;">Telepon</label>
                                <div class="col-md-4">
                                    <input type="tel" id="noTlp" placeholder="Nomor telepon" class="form-control">
                                </div>    
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-md-4 form-control-label" style="text-align: right;">Email</label>
                                <div class="col-md-8">
                                    <input type="text" id="emailSekolah" placeholder="Masukkan email sekolah" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="namaKepala" class="col-md-4 form-control-label" style="text-align: right;">Kepala Sekolah</label>
                                <div class="col-md-8">
                                    <input type="text" id="kepalaSekolah" placeholder="Masukkan nama kepala sekolah" class="form-control">
                                </div>
                            </div>  
                            <div class="row form-group">
                                <label for="noHp" class="col-md-4 form-control-label" style="text-align: right;">Nomor HP</label>
                                <div class="col-md-4">
                                    <input type="tel" id="noHp" placeholder="Nomor hp" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div id="uploadImageModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
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
                    <div id="imageDemo"></div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Crop &amp; Upload</button>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<script>
    function upload() {
        document.getElementById("uploadLogo").click();
    };
</script>

<script>  
    $(document).ready(function(){
    $image_crop = $('#imageDemo').croppie({
        enableExif: true,
        viewport: {
        width:250,
        height:200,
        type:'circle'
        },
        boundary:{
        width:300,
        height:300
        }
    });
    
    $('#uploadImage').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadImageModal').modal('show');
    });
    
    $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
        }).then(function(response){
        $.ajax({
            url:"upload.php",
            type: "POST",
            data:{"image": response},
            success:function(data)
            {
            $('#uploadImageModal').modal('hide');
            $('#uploadedImage').html(data);
            }
        });
        })
    });
    });  
</script>