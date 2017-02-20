<div class="chit-chat-layer1">
    <div class="row mb40">
        <div class="col-md-12 mb5">
            <div class="demo-grid">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-monitoring">
                        <h2>List Stasiun</h2>
                        <div class="bs-example">
                            <table class="table table-hover data-table table-striped tablesorter">
                                <thead>
                                    <tr>
                                        <th class="header" style="width: 40px;">No</th>
                                        <th class="header">Nama Stasiun</th>
                                        <th class="header">Alamat</th>
                                        <th class="header">No Telp</th>
                                        <th class="header">Jumlah Client</th>
                                        <th class="header" style="width:100px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($data["stasiunData"] as $stasiun) {
                                    ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $stasiun->nama_terminal; ?></td>
                                                <td><?php echo $stasiun->alamat_terminal; ?></td>
                                                <td><?php echo $stasiun->telp_terminal; ?></td>
                                                <td><?php echo $stasiun->jml_client; ?></td>
                                                <td width="300px">
                                                    <a class="btn btn-primary btn-sm" href="<?php echo SITE_URL; ?>?hal=Monitoring&&id=<?php echo $stasiun->id_terminal; ?>">Monitoring</a>
                                                    <a class="btn btn-warning btn-sm" href="<?php echo SITE_URL; ?>?hal=Stasiun&&action=default&&id=<?php echo $stasiun->id_terminal; ?>">Jadikan Default Stasiun</a>
                                                </td>
                                            </tr>
                                    <?php
                                            $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div>
        </div>
    </div>
</div>