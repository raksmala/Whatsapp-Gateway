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
                    </div>
                    <div class="card-body">
                        <div style="width: 100%; text-align: right; margin-bottom: 10px;">
                            <a href="#" class="on-default edit-row btn btn-success mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()"><i class="fa fa-plus"></i></a>
                        </div>

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
                                    <td>" .$row->noHp. "</td>
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
                <form action="#" method="post" class="form-horizontal" role="form">
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
                                <input type="text" class="form-control" id="noHp" name="noHp" required>
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

</div><!-- .content -->
<div class="clearfix"></div>