<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Data User</li>
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
                        <strong class="card-title">Data User</strong>
                    </div>
                    <div class="card-body">
                        <div style="width: 100%; text-align: right; margin-bottom: 10px;">
                            <a href="#" class="on-default edit-row btn btn-success mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()"><i class="fa fa-plus"></i></a>
                        </div>

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai / Sekolah</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($query->result() as $row){ 
                            echo "<tr>
                                    <td>" .$no. "</td>
                                    <td>";
                                        if($row->npsn != null) {
                                            echo $row->namaSekolah;
                                        } else if ($row->idPegawai != null) {
                                            echo $row->namaPegawai;
                                        }
                                    echo "</td>
                                    <td>" .$row->username. "</td>
                                    <td>";
                                        if($row->level == 'superadmin') {
                                            echo 'Super Admin';
                                        } else if($row->level == 'admin') {
                                            echo 'Admin';
                                        } else if($row->level == 'pengelola') {
                                            echo 'Pengelola';
                                        }
                                    echo "</td>
                                    <td>";
                                        if($row->statusUser == 'aktif') {
                                            echo 'Aktif';
                                        } else if($row->statusUser == 'tidakaktif') {
                                            echo 'Tidak Aktif';
                                        }
                                    echo "</td>
                                </tr>";
                            $no++;
                            } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <input type="hidden" id="idUser" name="idUser">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Level</label>
                            <div class="col col-md-8">
                                <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label mr-2">
                                        <input type="radio" id="level1" name="level" value="superadmin" class="form-check-input">Super Admin
                                    </label>
                                    <label for="inline-radio2" class="form-check-label mr-2">
                                        <input type="radio" id="level2" name="level" value="admin" class="form-check-input">Administrator
                                    </label>
                                    <label for="inline-radio2" class="form-check-label mr-2">
                                        <input type="radio" id="level2" name="level" value="pengelola" class="form-check-input">Pengelola
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Status</label>
                            <div class="col col-md-8">
                                <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label mr-2">
                                        <input type="radio" id="status1" name="status" value="aktif" class="form-check-input">Aktif
                                    </label>
                                    <label for="inline-radio2" class="form-check-label mr-2">
                                        <input type="radio" id="status2" name="status" value="tidakaktif" class="form-check-input">Tidak Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama Pegawai</label>
                            <div class="col-md-3">
                                <select data-placeholder="Nama Pegawai" class="standardSelect" tabindex="1">
                                    <option value="" label="default"></option>
                                    <option value="Joko">Joko</option>
                                    <option value="Joni">Joni</option>
                                    <option value="Subari">Subari</option>
                                    <option value="Parto">Parto</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama Sekolah</label>
                            <div class="col-md-3">
                                <select data-placeholder="Nama Sekolah" class="standardSelect" tabindex="1">
                                    <option value="" label="default"></option>
                                    <option value="SMA Negeri 1 Madiun">SMA Negeri 1 Madiun</option>
                                    <option value="SMA Negeri 2 Madiun">SMA Negeri 2 Madiun</option>
                                    <option value="SMA Negeri 3 Madiun">SMA Negeri 3 Madiun</option>
                                    <option value="SMA Negeri 4 Madiun">SMA Negeri 4 Madiun</option>
                                    <option value="SMA Negeri 5 Madiun">SMA Negeri 5 Madiun</option>
                                    <option value="SMA Negeri 6 Madiun">SMA Negeri 6 Madiun</option>
                                </select>
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