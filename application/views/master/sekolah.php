<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Sekolah</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Data Sekolah</li>
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
                        <strong class="card-title">Data Sekolah</strong>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Data</b></a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NPSN</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat</th>
                                    <th>No Tlp</th>
                                    <th>Email</th>
                                    <th>Nama Kepala Sekolah</th>
                                    <th>No Hp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach($query->result() as $row){ 
                            echo "<tr>
                                    <td>" .$row->npsn. "</td>
                                    <td>" .$row->namaSekolah. "</td>
                                    <td>" .$row->alamatSekolah. "</td>
                                    <td>" .$row->noTlp. "</td>
                                    <td>" .$row->email. "</td>
                                    <td>" .$row->kepalaSekolah. "</td>
                                    <td>" .$row->noHpKepsek. "</td>
                                    <td><a href='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#addModal' onclick=\"Set('".$row->npsn."', '".$row->namaSekolah."', '".$row->alamatSekolah."', '".$row->noTlp."', '".$row->email."', '".$row->kepalaSekolah."', '".$row->noHpKepsek."')\"><i class='fa fa-pencil'></i></a>
                                        <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete('".$row->npsn."', '".$row->namaSekolah."', '".$row->alamatSekolah."', '".$row->noTlp."', '".$row->email."', '".$row->kepalaSekolah."', '".$row->noHpKepsek."')\"><i class='fa fa-trash'></i></a>
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
                    <h5 class="modal-title" id="mediumModalLabel">Data Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url().$this->session->userdata('akses')."/Sekolah/add"; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">NPSN</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="npsn" name="npsn" required>
                            </div>
                        </div>                                  
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama Sekolah</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="namaSekolah" name="namaSekolah" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Alamat</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="alamatSekolah" name="alamatSekolah" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Telepon</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="noTlp" name="noTlp" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama Kepala Sekolah</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="kepalaSekolah" name="kepalaSekolah" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">No HP</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="noHpKepsek" name="noHpKepsek" required>
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
                    <h5 class="modal-title" id="mediumModalLabel">Data Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url().$this->session->userdata('akses')."/Sekolah/delete"; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-8">
                                <p>Apakah anda yakin ingin menghapus ?<p>
                                <input type="hidden" class="form-control" id="npsn2" name="npsn2" required>
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

</div><!-- .content -->
<div class="clearfix"></div>

<script type="text/javascript">
    function Set(npsn, namaSekolah, alamatSekolah, noTlp, email, kepalaSekolah, noHpKepsek) {
        document.getElementById('npsn').readOnly = true;
        document.getElementById('npsn').value = npsn;
        document.getElementById('namaSekolah').value = namaSekolah;
        document.getElementById('alamatSekolah').value = alamatSekolah;
        document.getElementById('noTlp').value = noTlp;
        document.getElementById('email').value = email;
        document.getElementById('kepalaSekolah').value = kepalaSekolah;
        document.getElementById('noHpKepsek').value = noHpKepsek;
    }

    function Delete(npsn, namaSekolah, alamatSekolah, noTlp, email, kepalaSekolah, noHpKepsek) {
        document.getElementById('npsn2').value = npsn;
        document.getElementById('namaSekolah2').value = namaSekolah;
        document.getElementById('alamatSekolah2').value = alamatSekolah;
        document.getElementById('noTlp2').value = noTlp;
        document.getElementById('email2').value = email;
        document.getElementById('kepalaSekolah2').value = kepalaSekolah;
        document.getElementById('noHpKepsek2').value = noHpKepsek;
    }

    function Reset() {
        document.getElementById('npsn').readOnly = false;
        document.getElementById('npsn').value = "";
        document.getElementById('namaSekolah').value = "";
        document.getElementById('alamatSekolah').value = "";
        document.getElementById('noTlp').value = "";
        document.getElementById('email').value = "";
        document.getElementById('kepalaSekolah').value = "";
        document.getElementById('noHpKepsek').value = "";
    }
</script>