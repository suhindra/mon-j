<div class="chit-chat-layer1">
    <div class="row mb40">
        <div class="col-md-12 mb5">
            <div class="demo-grid">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-monitoring">
                        <h2>Add Client</h2>
                        <div class="bs-example">

                            <div class="tab-content ">
                                <?php
                                    if(isset($data['message'])) {
                                ?>
                                    <div class="alert <?php if($data['message']["success"] == false) echo "alert-danger"; else echo "alert-success"; ?>"><?php echo $message["message"]; ?></div>
                                <?php
                                    }
                                ?>
                                <div class="active tab-pane">
                                <!-- Post -->
                                    <div class="post">
                                        <div class="box-body">
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Host Name</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa  fa-sort-alpha-asc"></i>
                                                            </div>
                                                            <input type="text" name="client" class="form-control" placeholder="Masukan Nama Host" required>
                                                        </div><!-- /.input group -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputTelp" class="col-sm-2 control-label">IP Client</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-laptop"></i>
                                                            </div>
                                                            <input type="text" placeholder="Masukan IP" name="ip" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" required>
                                                        </div><!-- /.input group -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputTelp" class="col-sm-2 control-label">Stasiun</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-train"></i>
                                                            </div>
                                                            <select name="stasiun" class="form-control select2" style="width: 100%;">
                                                            <?php foreach($data["stasiunData"] as $stasiun) { ?>
                                                                <option value="<?=$stasiun->id_terminal?>"><?=$stasiun->nama_terminal?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-warning" name="add_client">Simpan</button>
                                                        <button type="reset" class="btn btn-danger" name="add_client">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            <!-- end -->
                            </div>
                        </div>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div>
        </div>
    </div>
</div>