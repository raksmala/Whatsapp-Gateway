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
                    </div>
                    <div class="card-body">
                        <div style="width: 100%; text-align: right; margin-bottom: 10px;">
                            <a href="#" class="on-default edit-row btn btn-success mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()"><i class="fa fa-plus"></i></a>
                        </div>

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Sekolah</th>
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
                                    <td>" .$row->namaSekolah. "</td>
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
                <form action="#" method="post" class="form-horizontal" role="form">
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
                                <input type="text" class="form-control" id="alamatSiswa" name="alamatSiswa" required>
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