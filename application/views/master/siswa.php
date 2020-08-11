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
                    </div>
                    <div class="card-body">
                        <div style="width: 100%; text-align: right; margin-bottom: 10px;">
                            <a href="#" class="on-default edit-row btn btn-success mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()"><i class="fa fa-plus"></i></a>
                        </div>
                        
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Kelas</th>
                                    <th>Sekolah</th>
                                    <th>Nama Orang Tua</th>
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
                                    <td>" .$row->namaKelas. "</td>
                                    <td>" .$row->namaSekolah. "</td>
                                    <td>" .$row->namaOrangtua. "</td>
                                    <td><a href='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#addModal' onclick=\"Set('".$row->nisn."', '".$row->namaSiswa."', '".$row->jenisKelamin."', '".$row->alamatSiswa."', '".$row->idKelas."', '".$row->idOrangtua."')\"><i class='fa fa-pencil'></i></a>
                                        <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete('".$row->nisn."', '".$row->namaSiswa."', '".$row->jenisKelamin."', '".$row->alamatSiswa."', '".$row->idKelas."', '".$row->idOrangtua."')\"><i class='fa fa-trash'></i></a>
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
                            <label class="col-md-3 form-control-label" style="text-align: right;">Kelas</label>
                            <div class="col-md-3">
                                <select id="idKelas" name="idKelas" data-placeholder="Pilih Kelas" class="standardSelect" tabindex="1">
                                    <option value="" label="default"></option>
                                    <?php
                                        $kelas = $this->mMaster->TampilData("*", "ms_kelas", null, null);
                                        foreach($kelas->result() as $row) {
                                            echo "<option value='".$row->idKelas."'>".$row->namaKelas."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama Orang Tua</label>
                            <div class="col-md-3">
                                <select id="idOrangtua" name="idOrangtua" data-placeholder="Nama Orang Tua" class="standardSelect" tabindex="1">
                                    <option value="" label="default"></option>
                                    <?php
                                        $orangtua = $this->mMaster->TampilData("*", "ms_orangtua", null, null);
                                        foreach($orangtua->result() as $row) {
                                            echo "<option value='".$row->idOrangtua."'>".$row->namaOrangtua."</option>";
                                        }
                                    ?>
                                </select>
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div><!-- .content -->
<div class="clearfix"></div>

<script type="text/javascript">
    function Set(nisn, namaSiswa, jenisKelamin, alamatSiswa, idKelas, idOrangtua) {
        document.getElementById('nisn').readOnly = true;
        document.getElementById('nisn').value = nisn;
        document.getElementById('namaSiswa').value = namaSiswa;
        if(jenisKelamin == 'Laki-laki') {
            document.getElementById('jkLaki').checked = true;
        } else if(jenisKelamin == 'Perempuan') {
            document.getElementById('jkPerempuan').checked = true;
        }
        document.getElementById('alamatSiswa').value = alamatSiswa;
        document.getElementById('idKelas').value = idKelas;
        document.getElementById('idOrangtua').value = idOrangtua;
    }

    function Delete(nisn, namaSiswa, jenisKelamin, alamatSiswa, idKelas, idOrangtua) {
        document.getElementById('nisn2').value = nisn;
        document.getElementById('namaSiswa2').value = namaSiswa;
        document.getElementById('jenisKelamin2').value = jenisKelamin;
        document.getElementById('alamatSiswa2').value = alamatSiswa;
        document.getElementById('idKelas2').value = idKelas;
        document.getElementById('idOrangtua2').value = idOrangtua;
    }

    function Reset(nisn, namaSiswa, jenisKelamin, alamatSiswa, idKelas, idOrangtua) {
        document.getElementById('nisn').value = "";
        document.getElementById('namaSiswa').value = "";
        document.getElementById('jenisKelamin').value = "";
        document.getElementById('alamatSiswa').value = "";
        document.getElementById('idKelas').value = "";
        document.getElementById('idOrangtua').value = "";
    }
</script>