<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Siswa</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Data Siswa</li>
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
                        <strong class="card-title">Data Siswa</strong>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Data</b></a>
                    </div>
                    <div class="card-body">
                        
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Nama Orang Tua</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach($query->result() as $row){ 
                            echo "<tr>
                                    <td>" .$row->nisn. "</td>
                                    <td>" .$row->namaSiswa. "</td>
                                    <td>" .$row->jenisKelamin. "</td>
                                    <td>" .$row->alamatSiswa. "</td>
                                    <td>" .$row->namaOrangtua. "</td>
                                    <td>" .$row->noHp. "</td>
                                    <td><a href='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#addModal' onclick=\"Set('".$row->nisn."', '".$row->namaSiswa."', '".$row->jenisKelamin."', '".$row->alamatSiswa."', '".$row->namaOrangtua."', '".$row->noHp."', '".$row->idKelas."', '".$row->status."')\"><i class='fa fa-pencil'></i></a>
                                        <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete('".$row->nisn."', '".$row->namaSiswa."', '".$row->jenisKelamin."', '".$row->alamatSiswa."', '".$row->namaOrangtua."', '".$row->noHp."', '".$row->idKelas."', '".$row->status."')\"><i class='fa fa-trash'></i></a>
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
                    <h5 class="modal-title" id="mediumModalLabel">Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Pengelola/Siswa/add'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">NISN</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nisn" name="nisn" required>
                            </div>
                        </div>                                  
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="namaSiswa" name="namaSiswa" required>
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
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama Orang Tua</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="namaOrangtua" name="namaOrangtua" required>
                            </div>
                        </div>                                  
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">No HP</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="noHp" name="noHp" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Kelas</label>
                            <div class="col-md-3">
                                <select id="idKelas" name="idKelas" data-placeholder="Kelas" tabindex="1">
                                    <option value="">---Kelas---</option>
                                    <?php
                                        $orangtua = $this->mMaster->TampilData("*", "ms_kelas", null, null);
                                        foreach($orangtua->result() as $row) {
                                            echo "<option value='".$row->idKelas."'>".$row->namaKelas."</option>";
                                        }
                                    ?>
                                </select>
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
                    <h5 class="modal-title" id="mediumModalLabel">Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Pengelola/Siswa/delete'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-8">
                                <p>Apakah anda yakin ingin menghapus ?<p>
                                <input type="hidden" class="form-control" id="nisn2" name="nisn2" required>
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
    function Set(nisn, namaSiswa, jenisKelamin, alamatSiswa, namaOrangtua, noHp, idKelas, status) {
        document.getElementById('nisn').readOnly = true;
        document.getElementById('nisn').value = nisn;
        document.getElementById('namaSiswa').value = namaSiswa;
        if(jenisKelamin == 'Laki-laki') {
            document.getElementById('jkLaki').checked = true;
        } else if(jenisKelamin == 'Perempuan') {
            document.getElementById('jkPerempuan').checked = true;
        }
        document.getElementById('alamatSiswa').value = alamatSiswa;
        document.getElementById('namaOrangtua').value = namaOrangtua;
        document.getElementById('noHp').value = noHp;
        document.getElementById('idKelas').value = idKelas;
        if(status == 'aktif') {
            document.getElementById('status1').checked = true;
        } else if(status == 'tidakaktif') {
            document.getElementById('status2').checked = true;
        }
    }

    function Delete(nisn, namaSiswa, jenisKelamin, alamatSiswa, namaOrangtua, noHp, idKelas, status) {
        document.getElementById('nisn2').value = nisn;
        document.getElementById('namaSiswa2').value = namaSiswa;
        document.getElementById('jenisKelamin2').value = jenisKelamin;
        document.getElementById('alamatSiswa2').value = alamatSiswa;
        document.getElementById('namaOrangtua2').value = namaOrangtua;
        document.getElementById('noHp2').value = noHp;
        document.getElementById('idKelas2').value = idKelas;
        document.getElementById('status2').value = status;
    }

    function Reset() {
        document.getElementById('nisn').readOnly = false;
        document.getElementById('nisn').value = "";
        document.getElementById('namaSiswa').value = "";
        document.getElementById('alamatSiswa').value = "";
        document.getElementById('jkLaki').checked = false;
        document.getElementById('jkPerempuan').checked = false;
        document.getElementById('namaOrangtua').value = "";
        document.getElementById('noHp').value = "";
        document.getElementById('idKelas').value = "";
        document.getElementById('status').value = "";
    }
</script>