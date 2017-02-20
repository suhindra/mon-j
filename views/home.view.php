<!--market updates updates-->
<div class="inner-block">
    <div class="market-updates">
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-1">
                <div class="col-md-8 market-update-left">
                    <h3><?php echo $data["total"]["client"]; ?></h3>
                    <h4>Client</h4>
                    <p>Client pada Mon-J</p>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-file-text-o"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-8 market-update-left">
                    <h3><?php echo $data["total"]["terminal"]; ?></h3>
                    <h4>Stasiun</h4>
                    <p>Jumlah Stasiun</p>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-user"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-8 market-update-left">
                    <h3><?php echo $data["total"]["connected"]; ?></h3>
                    <h4>Connected</h4>
                    <p>Status client connected</p>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-envelope-o"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--market updates end here-->
    <div class="chit-chat-layer1">
        <div class="row mb40">
            <div class="col-md-12 mb5">
                <div class="demo-grid">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-monitoring" data-toggle="tab" aria-expanded="false">MONITORING</a></li>
                        <li class=""><a href="#stasiun-info" data-toggle="tab" aria-expanded="true">INFO STASIUN</a></li>
                        <li class=""><a href="#stasiun-sett" data-toggle="tab" aria-expanded="false">EDIT INFO</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-monitoring">
                            <div class="bs-example">
                                <table class="table table-hover data-table table-striped tablesorter">
                                    <thead>
                                        <tr>
                                            <th class="header" style="width: 40px;">No</th>
                                            <th class="header">Nama Client</th>
                                            <th class="header">IP Client</th>
                                            <th class="header">Status</th>
                                            <th class="header" style="width:100px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach($data["clientData"] as $client) {
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $client->nama_client; ?></td>
                                            <td><?php echo $client->ip_client; ?></td>
                                            <td><?php echo $client->status_client; ?></td>
                                            <td width="150px">
                                                <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo $client->id_client; ?>">Edit</a>
                                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete<?php echo $client->id_client; ?>">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                            $no++;
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <?php foreach ($data["monitoringData"] as $stasiun): ?>
                        <div class="tab-pane" id="stasiun-info">
                            <ul>
                                <li>Nama stasiun : <strong><?php echo $stasiun->nama_terminal; ?></strong></li>
                                <li>Alamat : <strong><?php echo $stasiun->alamat_terminal; ?></strong></li>
                                <li>Telp : <strong><?php echo $stasiun->telp_terminal; ?></strong></li>
                                <li>Jumlah PC : <strong><?php echo $stasiun->jml_client; ?> PC</strong></li>
                            </ul>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="stasiun-sett">
                            <div class="tab-pane" id="stasiun-sett">
                                <a class="btn btn-warning btn-sm" data-toggle='modal' data-target='#editSt'>Edit</a>
                                <a class="btn btn-danger btn-sm"  data-toggle='modal' data-target='#delSt'>Delete</a>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-pane -->
                        <?php endforeach ?>
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit info stasiun -->
<?php foreach ($data["monitoringData"] as $stasiun): ?>
<div class="modal fade" id="editSt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Info</h4>
            </div>
            <div class="modal-body">
                <!-- Form edit -->
                <!-- Hidden input -->
                <form class="form-horizontal" role="form" style="width:100%" method="post" action="<?php echo SITE_URL; ?>?hal=Stasiun&&action=update">
                    <input type="hidden" name="id_st" value="<?php echo $stasiun->id_terminal; ?>">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nama Stasiun</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-train"></i>
                                </div>
                                <input type="text" value="<?php echo $stasiun->nama_terminal; ?>" class="form-control" name="name_st" placeholder="Nama Stasiun" required>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTelp" class="col-sm-2 control-label">Telp Stasiun</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" value="<?php echo $stasiun->telp_terminal; ?>" class="form-control" name="telp_st" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" required>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAdd" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="add_st" rows='10' placeholder='Alamat Stasiun' required><?php echo $stasiun->alamat_terminal; ?></textarea>
                        </div>
                    </div>
                    <!-- / Form edit -->
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="edit_stasiun">Save changes</button>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- / Modal delete info stasiun -->
<div class="modal modal-success fade" id="delSt">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Anda yakin ingin menghapus <strong><?=$stasiun->nama_terminal?></strong> ?</h4>
            </div>
            <div class="modal-body">
                <p>Semua data client dengan nama stasiun <strong><?=$stasiun->nama_terminal?></strong> juga akan dihapus.</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="window.location.href='<?php echo SITE_URL; ?>?hal=Stasiun&&action=delete&&id=<?php echo $stasiun->id_terminal; ?>';" class="btn btn-outline">Hapus</button>
                <button type="button" class="btn btn-outline" data-dismiss="modal">Batal</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- / Modal Delete -->
<?php endforeach ?>


<?php 
    foreach ($data["clientData"] as $client) {    
        // Modal Edit
        echo '<div class="modal fade" id="modalEdit'.$client->id_client.'">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Edit '.$client->nama_client.'</h4>
                      </div>
                      <div class="modal-body">
                        <!-- Start form -->
                       <form class="form-horizontal" role="form" style="width:80%" name="add_client" method="post" action="'.SITE_URL; ?>?hal=Client&&action=update&&id=<?php echo $client->id_client.'">
                       <input type="hidden" name="id_client" value="'.$client->id_client.'" />
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="IP">IP:</label>
                            <div class="col-sm-10">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-laptop"></i>
                              </div>
                              <input type="text" value="'.$client->ip_client.'" placeholder="Masukan IP" name="ip" class="form-control" data-inputmask="\'alias\': \'ip\'" data-mask="" required>
                            </div><!-- /.input group -->
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="Host">Nama Client:</label>
                            <div class="col-sm-10">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa  fa-sort-alpha-asc"></i>
                              </div>
                              <input type="text" name="client"  value="'.$client->nama_client.'" class="form-control" placeholder="Masukan Nama Host" required>
                            </div><!-- /.input group --> 
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="stasiun">Stasiun:</label>
                            <div class="col-sm-10">
                             <div class="input-group">
                                <div class="input-group-addon">
                                 <i class="fa fa-train"></i>
                                </div>
                                <select name="stasiun" class="form-control select2" style="width: 100%;">'?>;
                                <?php foreach($data["stasiunData"] as $stasiun) { ?>
                                    <option
                                    <?php if ($stasiun->id_terminal == $client->id_terminal): ?>
                                        <?php echo "selected" ?>
                                    <?php endif ?>
                                     value="<?=$stasiun->id_terminal?>"><?=$stasiun->nama_terminal?></option>
                                <?php } echo '
                                </select>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_client">Save changes</button>
                        </form>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>';
        // Modal Delete client
        echo '<div class="modal modal-success fade" id="modalDelete'.$client->id_client.'">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    <form method="post" action="'.SITE_URL; ?>?hal=Client&&action=delete&&id=<?php echo $client->id_client.'">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Anda yakin ingin menghapus ?</h4>
</div>
<div class="modal-body">
    <p>
    <h4>Anda yakin ingin menghapus <strong>'.$client->nama_client.'</strong> ?</h4>
    <input type="hidden" name="id_client" value="'.$client->id_client.'">
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-outline" name="del_cln">Hapus</button>
    <button type="button" class="btn btn-outline" data-dismiss="modal">Batal</button>
</div>
</div></form><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>';
}
?>

