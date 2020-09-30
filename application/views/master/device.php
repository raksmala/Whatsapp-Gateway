<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Device</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Data Device</li>
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
                        <strong class="card-title">Data Device</strong>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Data</b></a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NPSN</th>
                                    <th>Nama Sekolah</th>
                                    <th>Serial</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($query->result() as $row){ 
                            echo "<tr>
                                    <td>" .$no. "</td>
                                    <td>" .$row->npsn. "</td>
                                    <td>" .$row->namaSekolah. "</td>
                                    <td>" .$row->serial. "</td>
                                    <td><a href='#' class='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#addModal' onclick=\"Set('".$row->id."', '".$row->npsn."', '".$row->serial."')\"><i class='fa fa-pencil'></i></a>
                                        <a href='#' class='on-default delete-row btn btn-danger' data-toggle='modal' data-target='#deleteModal' onclick=\"Delete('".$row->id."', '".$row->npsn."', '".$row->serial."')\"><i class='fa fa-trash'></i></a>
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
                    <h5 class="modal-title" id="mediumModalLabel">Data Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url().$this->session->userdata('akses')."/Device/add"; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">NPSN</label>
                            <div class="col-md-4">
                                <input type="hidden" class="form-control" id="id" name="id" required>
                                <input type="text" class="form-control" id="npsn" name="npsn" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Serial</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="serial" name="serial" required>
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
                <form action="<?php echo base_url().$this->session->userdata('akses')."/Device/delete"; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-8">
                                <p>Apakah anda yakin ingin menghapus ?<p>
                                <input type="hidden" class="form-control" id="id2" name="id2" required>
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
    function Set(id, npsn, serial) {
        document.getElementById('id').value = id;
        document.getElementById('npsn').value = npsn;
        document.getElementById('serial').value = serial;
    }

    function Delete(id, npsn, serial) {
        document.getElementById('id2').value = id;
        document.getElementById('npsn2').value = npsn;
        document.getElementById('serial').value = alamatSekolah;
    }

    function Reset() {
        document.getElementById('npsn').value = "";
        document.getElementById('serial').value = "";
    }
</script>