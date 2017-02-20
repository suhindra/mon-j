<div class="chit-chat-layer1">
    <div class="row mb40">
        <div class="col-md-12 mb5">
            <div class="demo-grid">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-monitoring">
                        <h2>Log Email</h2>
                        <div class="bs-example">
                            <table class="table table-hover data-table table-striped tablesorter">
                                <thead>
                                    <tr>
                                        <th class="header" style="width: 40px;">No</th>
                                        <th class="header">Nama Client</th>
                                        <th class="header">Tanggal</th>
                                        <th class="header">Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($data["logData"] as $log) {
                                        ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $log->nama_client; ?></td>
                                        <td><?php echo $log->tgl; ?></td>
                                        <td><?php echo $log->jam; ?></td>
                                    </tr>
                                    <?php
                                        $no++;
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>


