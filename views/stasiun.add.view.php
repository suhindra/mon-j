<div class="chit-chat-layer1">
    <div class="row mb40">
        <div class="col-md-12 mb5">
            <div class="demo-grid">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-monitoring">
                        <div class="bs-example">

                            <div class="tab-content ">
                                <div class="active tab-pane">
                                <h2>Add Stasiun</h2>
                                <!-- Post -->
                                    <div class="post">
                                        <div class="box-body">
                                            <?php
                                                if(isset($message)) {
                                            ?>
                                                <div class="alert <?php if($message["success"] == false) echo "alert-danger"; else echo "alert-success"; ?>"><?php echo $message["message"]; ?></div>
                                            <?php
                                                }
                                            ?>
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-2 control-label">Nama Stasiun</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-train"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="name_st" placeholder="Nama Stasiun" required>
                                                        </div><!-- /.input group -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputTelp" class="col-sm-2 control-label">Telp Stasiun</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-phone"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="telp_st" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" required>
                                                        </div><!-- /.input group -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAdd" class="col-sm-2 control-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="add_st" rows='10' placeholder='Alamat Stasiun' required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-warning" name="add_stasiun">Simpan</button>
                                                        <button type="reset" class="btn btn-danger" name="">Reset</button>
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