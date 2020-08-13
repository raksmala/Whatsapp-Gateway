<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Orang Tua</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Data Orang Tua</li>
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
                        <strong class="card-title">Data Orang Tua</strong>
                        <a href="#" class="on-default edit-row btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#addModal" onclick="Reset()" style="float: right;"><i class="fa fa-plus"></i>&nbsp; <b>Tambah Data</b></a>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Orang Tua</th>
                                    <th>No HP</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach($query->result() as $row){ 
                            echo "<tr>
                                    <td>" .$no. "</td>
                                    <td>" .$row->namaOrangtua. "</td>
                                    <td>" .$row->noHp. "</td>
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
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Data Orang Tua</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="row form-group">
                            <input type="hidden" id="idOrangtua" name="idOrangtua">
                            <label class="col-md-3 form-control-label" style="text-align: right;">Nama</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="namaOrangtua" name="namaOrangtua" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 form-control-label" style="text-align: right;">No HP</label>
                            <div class="col-md-5">
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