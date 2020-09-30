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
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal2" onclick="Reset2()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Pengelola</b></a>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal1" onclick="Reset1()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Admin</b></a>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai / Sekolah</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
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
                                    <td>";
                                        if($row->level == 'admin') {
                                            echo "<a href='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#addModal1' onclick=\"Set1('".$row->idUser."', '".$row->idPegawai."', '".$row->username."', '".$row->password."', '".$row->statusUser."')\"><i class='fa fa-pencil'></i></a>
                                            <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete1('".$row->idUser."', '".$row->idPegawai."', '".$row->username."', '".$row->password."', '".$row->statusUser."')\"><i class='fa fa-trash'></i></a>";
                                        } else if($row->level == 'pengelola') {
                                            echo "<a href='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#addModal2' onclick=\"Set2('".$row->idUser."', '".$row->npsn."', '".$row->username."', '".$row->password."', '".$row->statusUser."')\"><i class='fa fa-pencil'></i></a>
                                            <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete2('".$row->idUser."', '".$row->npsn."', '".$row->username."', '".$row->password."', '".$row->statusUser."')\"><i class='fa fa-trash'></i></a>";
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

    <div class="modal fade" id="addModal1" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Superadmin/User/add'); ?>" method="post" class="form-horizontal" role="form">
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
                                <input type="password" class="form-control" id="password" name="password">
                                <p>Kosongkan password jika anda tidak ingin mengubah password.</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Pegawai</label>
                            <div class="col-md-3">
                                <select id="idPegawai" name="idPegawai" data-placeholder="Pegawai" tabindex="1">
                                    <option value="">---Pegawai---</option>
                                    <?php
                                        $pegawai = $this->mMaster->TampilData("*", "ms_pegawai", null, null, null);
                                        foreach($pegawai->result() as $row) {
                                            echo "<option value='".$row->idPegawai."'>".$row->namaPegawai."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" id="level" name="level" value="admin">
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Status</label>
                            <div class="col col-md-8">
                                <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label mr-2">
                                        <input type="radio" id="status1" name="statusUser" value="aktif" class="form-check-input">Aktif
                                    </label>
                                    <label for="inline-radio2" class="form-check-label mr-2">
                                        <input type="radio" id="status2" name="statusUser" value="tidakaktif" class="form-check-input">Tidak Aktif
                                    </label>
                                </div>
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

    <div class="modal fade" id="addModal2" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Superadmin/User/add'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <input type="hidden" id="idUser3" name="idUser3">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="username3" name="username3" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" id="password3" name="password3">
                            <p>Kosongkan password jika anda tidak ingin mengubah password.</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Sekolah</label>
                            <div class="col-md-3">
                                <select id="npsn3" name="npsn3" data-placeholder="Sekolah" tabindex="1">
                                    <option value="">---Sekolah---</option>
                                    <?php
                                        $sekolah = $this->mMaster->TampilData("*", "ms_sekolah", null, null, null);
                                        foreach($sekolah->result() as $row) {
                                            echo "<option value='".$row->npsn."'>".$row->namaSekolah."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" id="level3" name="level3" value="pengelola">
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Status</label>
                            <div class="col col-md-8">
                                <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label mr-2">
                                        <input type="radio" id="status3" name="statusUser3" value="aktif" class="form-check-input">Aktif
                                    </label>
                                    <label for="inline-radio2" class="form-check-label mr-2">
                                        <input type="radio" id="status4" name="statusUser3" value="tidakaktif" class="form-check-input">Tidak Aktif
                                    </label>
                                </div>
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
                    <h5 class="modal-title" id="mediumModalLabel">Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Superadmin/User/delete'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-8">
                                <p>Apakah anda yakin ingin menghapus ?<p>
                                <input type="hidden" class="form-control" id="idUser2" name="idUser2" required>
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
    function Set1(idUser, idPegawai, username, password, statusUser) {
        document.getElementById('idUser').readOnly = true;
        document.getElementById('idUser').value = idUser;
        document.getElementById('idPegawai').value = idPegawai;
        document.getElementById('username').value = username;
        document.getElementById('password').value = "";
        if(statusUser == 'aktif') {
            document.getElementById('status1').checked = true;
        } else if(statusUser == 'tidakaktif') {
            document.getElementById('status2').checked = true;
        }
    }

    function Set2(idUser, npsn, username, password, statusUser) {
        document.getElementById('idUser3').readOnly = true;
        document.getElementById('idUser3').value = idUser;
        document.getElementById('npsn3').value = npsn;
        document.getElementById('username3').value = username;
        document.getElementById('password3').value = "";
        if(statusUser == 'aktif') {
            document.getElementById('status3').checked = true;
        } else if(statusUser == 'tidakaktif') {
            document.getElementById('status4').checked = true;
        }
    }

    function Delete1(idUser, idPegawai, username, password, statusUser) {
        document.getElementById('idUser2').value = idUser;
        document.getElementById('idPegawai2').value = idPegawai;
        document.getElementById('username2').value = username;
        document.getElementById('password').value = "";
        document.getElementById('statusUser2').value = statusUser;
    }

    function Delete2(idUser, npsn, username, password, statusUser) {
        document.getElementById('idUser2').value = idUser;
        document.getElementById('npsn2').value = npsn;
        document.getElementById('username2').value = username;
        document.getElementById('password').value = "";
        document.getElementById('statusUser2').value = statusUser;
    }

    function Reset1() {
        document.getElementById('idUser').readOnly = false;
        document.getElementById('idUser').value = "";
        document.getElementById('idPegawai').value = "";
        document.getElementById('username').value = "";
        document.getElementById('password').value = "";
        document.getElementById('status1').checked = false;
        document.getElementById('status2').checked = false;
    }

    function Reset2() {
        document.getElementById('idUser3').readOnly = false;
        document.getElementById('idUser3').value = "";
        document.getElementById('npsn3').value = "";
        document.getElementById('username3').value = "";
        document.getElementById('password3').value = "";
        document.getElementById('status3').checked = false;
        document.getElementById('status4').checked = false;
    }
</script>