        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row --> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading" style="padding-bottom: 20px">
                            <div>
                                Administrator
                            <a href="index.php?url=data_pengguna_tambah" class="btn btn-sm btn-success" style="float: right;"><i class="fa fa-plus"></i> Tambah</a>
                            
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas)): ?>
                                        <?php foreach($datas as $data): ?>
                                        <tr>
                                            <td><?php echo $data['id']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['password']; ?></td>
                                            <td><?php echo $data['level']; ?></td>       
                                            <td align="center">
                                                <a href="index.php?url=data_pengguna_lihat&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-info" title="Lihat">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="index.php?url=data_pengguna_ubah&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-warning" title="Ubah">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="config/pengguna/proses_hapus.php?&id=<?php echo $data['id'] ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')" >
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>
        <!-- /#page-wrapper -->