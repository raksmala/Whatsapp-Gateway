<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Guru</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Data Guru</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Guru</strong>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Data</b></a>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#importModal" style="float: right;"><b>Import Excel</b></a>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach($query->result() as $row){ 
                            echo "<tr>
                                    <td>" .substr($row->nip, 0, 8). " " .substr($row->nip, 8, 6). " " .substr($row->nip, 14, 1). " " .substr($row->nip, 15, 3). "</td>
                                    <td>" .$row->namaGuru. "</td>
                                    <td>" .$row->jenisKelamin. "</td>
                                    <td>" .$row->alamatGuru. "</td>
                                    <td><a href='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#addModal' onclick=\"Set('".$row->nip."', '".$row->namaGuru."', '".$row->jenisKelamin."', '".$row->alamatGuru."')\"><i class='fa fa-pencil'></i></a>
                                        <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete('".$row->nip."', '".$row->namaGuru."', '".$row->jenisKelamin."', '".$row->alamatGuru."')\"><i class='fa fa-trash'></i></a>
                                    </td>
                                </tr>";
                            } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Pengelola/Guru/add'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">NIP</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nip" name="nip" required>
                            </div>
                        </div>                                  
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="namaGuru" name="namaGuru" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Jenis Kelamin</label>
                            <div class="col col-md-8">
                                <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label mr-2">
                                        <input type="radio" id="jkLaki" name="jenisKelamin" value="Laki-laki" class="form-check-input">Laki-laki
                                    </label>
                                    <label for="inline-radio2" class="form-check-label mr-2">
                                        <input type="radio" id="jkPerempuan" name="jenisKelamin" value="Perempuan" class="form-check-input">Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Alamat</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="alamatGuru" name="alamatGuru" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Pengelola/Guru/delete'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-8">
                                <p>Apakah anda yakin ingin menghapus ?<p>
                                <input type="hidden" class="form-control" id="nip2" name="nip2" required>
                            </div>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>

    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="importExcel" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-md-8">
                            <a href="<?php echo base_url('Pengelola/Guru/excel'); ?>">Unduh Format Excel</a>
                        </div>
                        <div class="col-md-8 mt-2">
                            <input type="file" id="file" name="file" required accept=".xls, .xlsx">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div><!-- .content -->
<div class="clearfix"></div>


<script type="text/javascript">
    function Set(nip, namaGuru, jenisKelamin, alamatGuru) {
        document.getElementById('nip').readOnly = true;
        document.getElementById('nip').value = nip;
        document.getElementById('namaGuru').value = namaGuru;
        if(jenisKelamin == 'Laki-laki') {
            document.getElementById('jkLaki').checked = true;
        } else if(jenisKelamin == 'Perempuan') {
            document.getElementById('jkPerempuan').checked = true;
        }
        document.getElementById('alamatGuru').value = alamatGuru;
    }

    function Delete(nip, namaGuru, jenisKelamin, alamatGuru) {
        document.getElementById('nip2').value = nip;
        document.getElementById('namaGuru2').value = namaGuru;
        document.getElementById('jenisKelamin2').value = jenisKelamin;
        document.getElementById('alamatGuru2').value = alamatGuru;
    }

    function Reset() {
        document.getElementById('nip').readOnly = false;
        document.getElementById('nip').value = "";
        document.getElementById('namaGuru').value = "";
        document.getElementById('jkLaki').checked = false;
        document.getElementById('jkPerempuan').checked = false;
        document.getElementById('alamatGuru').value = "";
    }
</script>

<script>
    $(document).ready(function(){

        $('#importExcel').on('submit', function(event){
        $('#importExcel').modal('hide');
		event.preventDefault();
		$.ajax({
            url:"<?php echo base_url(); ?>Pengelola/Guru/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
                setTimeout(function(){
                    location.reload();
                }, 500);
			}
		})
        .fail(function (jqXHR, textStatus, errorThrown) { alert("Gagal"); });
	    });
    });
</script>