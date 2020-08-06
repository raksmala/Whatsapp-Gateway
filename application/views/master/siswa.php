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
                <form action="#" method="post" class="form-horizontal" role="form">
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
                                <select data-placeholder="Pilih Kelas" class="standardSelect" tabindex="1">
                                    <option value="" label="default"></option>
                                    <option value="10 IPA 1">10 IPA 1</option>
                                    <option value="10 IPA 2">10 IPA 2</option>
                                    <option value="10 IPA 3">10 IPA 3</option>
                                    <option value="10 IPS 1">10 IPS 1</option>
                                    <option value="11 IPA 1">11 IPA 1</option>
                                    <option value="11 IPA 2">11 IPA 2</option>
                                    <option value="11 IPA 3">11 IPA 3</option>
                                    <option value="11 IPS 1">11 IPS 1</option>
                                    <option value="12 IPA 1">12 IPA 1</option>
                                    <option value="12 IPA 2">12 IPA 2</option>
                                    <option value="12 IPA 3">12 IPA 3</option>
                                    <option value="12 IPS 1">12 IPS 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama Orang Tua</label>
                            <div class="col-md-3">
                                <select data-placeholder="Nama Orang Tua" class="standardSelect" tabindex="1">
                                    <option value="" label="default"></option>
                                    <option value="Joko">Joko</option>
                                    <option value="Joni">Joni</option>
                                    <option value="Subari">Subari</option>
                                    <option value="Parto">Parto</option>
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

</div><!-- .content -->
<div class="clearfix"></div>

<script type="text/javascript">
    function Set(idAnggota, namaAnggota, NIMAnggota, jabatanAnggota, programStudiAnggota) {
        document.getElementById('idAnggota').value = idAnggota;
        document.getElementById('namaAnggota').value = namaAnggota;
        document.getElementById('NIMAnggota').value = NIMAnggota;
        document.getElementById('jabatanAnggota').value = jabatanAnggota;
        document.getElementById('programStudiAnggota').value = programStudiAnggota;
    }

    function Delete(idAnggota, namaAnggota, NIMAnggota, jabatanAnggota, programStudiAnggota) {
        document.getElementById('idAnggota2').value = idAnggota;
        document.getElementById('namaAnggota2').value = namaAnggota;
        document.getElementById('NIMAnggota2').value = NIMAnggota;
        document.getElementById('jabatanAnggota2').value = jabatanAnggota;
        document.getElementById('programStudiAnggota2').value = programStudiAnggota;
    }

    function Reset(idAnggota, namaAnggota, NIMAnggota, jabatanAnggota, programStudiAnggota) {
        document.getElementById('idAnggota').value = "";
        document.getElementById('namaAnggota').value = "";
        document.getElementById('NIMAnggota').value = "";
        document.getElementById('jabatanAnggota').value = "";
        document.getElementById('programStudiAnggota').value = "";
    }
</script>