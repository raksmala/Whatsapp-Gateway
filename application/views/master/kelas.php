<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Kelas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Data Kelas</li>
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
                        <strong class="card-title">Data Kelas</strong>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Data</b></a>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($query->result() as $row){ 
                            echo "<tr>
                                    <td>" .$no. "</td>
                                    <td>" .$row->namaKelas. "</td>
                                    <td><a href='".base_url('Pengelola/DetailKelas?id='.$row->idKelas)."' class='on-default edit-row btn btn-primary'><i class='fa fa-pencil'></i></a>
                                        <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete('".$row->idKelas."','".$row->namaKelas."')\"><i class='fa fa-trash'></i></a>
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

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Pengelola/Kelas/add'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <input type="hidden" id="idKelas" name="idKelas">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama Kelas</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="namaKelas" name="namaKelas" required>
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
                    <h5 class="modal-title" id="mediumModalLabel">Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Pengelola/Kelas/delete'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-8">
                                <p>Apakah anda yakin ingin menghapus ?<p>
                                <input type="hidden" class="form-control" id="idKelas2" name="idKelas2" required>
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
    function Set(idKelas, namaKelas) {
        document.getElementById('idKelas').readOnly = true;
        document.getElementById('idKelas').value = idKelas;
        document.getElementById('namaKelas').value = namaKelas;
    }

    function Delete(idKelas, namaKelas) {
        document.getElementById('idKelas2').value = idKelas;
        document.getElementById('namaKelas2').value = namaKelas;
    }

    function Reset() {
        document.getElementById('idKelas').readOnly = false;
        document.getElementById('idKelas').value = "";
        document.getElementById('namaKelas').value = "";
    }
</script>