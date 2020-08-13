<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Alumni</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Data Alumni</li>
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
                        <strong class="card-title">Data Alumni</strong>
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

</div><!-- .content -->
<div class="clearfix"></div>