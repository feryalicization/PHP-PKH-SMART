        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Hasil Seleksi Calon Penerima Bantuan PKH Dengan Metode SMART</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#result">Hasil Seleksi</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="result" class="tab-pane fade in active">
                            <h3>Tabel Hasil Seleksi</h3>
                            <div class="panel panel-info">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table id="dataTables-result" class="table table-bordered ctr">
                                        <thead>
                                            <tr>
                                                <th width="100">Ranking</th>
                                                <th>Nama</th>
                                                <th>%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($hasil as $key => $value) : ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $key + 1 ?></td>
                                                    <td><?php echo $value['nama']; ?></td>
                                                    <td style="text-align: center;" >
                                                        <?php echo number_format($value['persen'], 2, '.', '');  ?> %
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#page-wrapper -->