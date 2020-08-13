        <link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/Croppie-master/croppie.css" />
        <link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/Croppie-master/demo/demo.css" />
   


        

        <section>
                <div class="demo-wrap upload-demo">
                    <div class="container">
                        <div class="grid">
                            <div class="col-1-2">
                                <div class="actions">
                                    <a class="btn file-btn">
                                        <span>Upload</span>
                                        <input type="file" id="upload" value="Choose a file" accept="image/*" />
                                    </a>
                                    <button class="upload-result">Result</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

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
                        <button class="btn btn-success crop_image">Crop &amp; Upload</button>
                    </div>
                </div>
            </div>
        </div>

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
                    width: 100,
                    height: 100,
                    type: 'circle'
                },
                enableExif: true
            });

            $('#upload').on('change', function () { readFile(this); });
            $('.upload-result').on('click', function (ev) {
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (resp) {
                    popupResult({
                        src: resp
                    });
                });
                reader.readAsDataURL(this.files[0]);
            });
        </script>