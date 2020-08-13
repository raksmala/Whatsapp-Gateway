<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Pegawai</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Data Pegawai</li>
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
                        <strong class="card-title">Data Pegawai</strong>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Data</b></a>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($query->result() as $row){ 
                            echo "<tr>
                                    <td>" .$no. "</td>
                                    <td>" .$row->namaPegawai. "</td>
                                    <td>" .$row->jenisKelamin. "</td>
                                    <td>" .$row->alamatPegawai. "</td>
                                    <td>" .$row->noHp. "</td>
                                    <td><a href='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#addModal' onclick=\"Set('".$row->idPegawai."', '".$row->namaPegawai."', '".$row->jenisKelamin."', '".$row->alamatPegawai."', '".$row->noHp."')\"><i class='fa fa-pencil'></i></a>
                                        <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete('".$row->idPegawai."', '".$row->namaPegawai."', '".$row->jenisKelamin."', '".$row->alamatPegawai."', '".$row->noHp."')\"><i class='fa fa-trash'></i></a>
                                    </td>
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

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Superadmin/Pegawai/add'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <input type="hidden" id="idPegawai" name="idPegawai">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="namaPegawai" name="namaPegawai" required>
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
                            <label class="col-md-3 form-control-label" style="text-align: right;">No HP</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="noHp" name="noHp" required>
                            </div>
                        </div> 
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Alamat</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="alamatPegawai" name="alamatPegawai" required>
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
                    <h5 class="modal-title" id="mediumModalLabel">Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Superadmin/Pegawai/delete'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-8">
                                <p>Apakah anda yakin ingin menghapus ?<p>
                                <input type="hidden" class="form-control" id="idPegawai2" name="idPegawai2" required>
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
    function Set(idPegawai, namaPegawai, jenisKelamin, alamatPegawai, noHp) {
        document.getElementById('idPegawai').readOnly = true;
        document.getElementById('idPegawai').value = idPegawai;
        document.getElementById('namaPegawai').value = namaPegawai;
        if(jenisKelamin == 'Laki-laki') {
            document.getElementById('jkLaki').checked = true;
        } else if(jenisKelamin == 'Perempuan') {
            document.getElementById('jkPerempuan').checked = true;
        }
        document.getElementById('alamatPegawai').value = alamatPegawai;
        document.getElementById('noHp').value = noHp;
    }

    function Delete(idPegawai, namaPegawai, jenisKelamin, alamatPegawai, noHp) {
        document.getElementById('idPegawai2').value = idPegawai;
        document.getElementById('namaPegawai2').value = namaPegawai;
        document.getElementById('jenisKelamin2').value = jenisKelamin;
        document.getElementById('alamatPegawai2').value = alamatPegawai;
        document.getElementById('noHp2').value = noHp;
    }

    function Reset() {
        document.getElementById('idPegawai').readOnly = false;
        document.getElementById('idPegawai').value = "";
        document.getElementById('namaPegawai').value = "";
        document.getElementById('alamatPegawai').value = "";
        document.getElementById('jkLaki').checked = false;
        document.getElementById('jkPerempuan').checked = false;
        document.getElementById('noHp').value = "";
    }
</script>