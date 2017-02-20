<div class="inbox">
    <h2>Identitas Website</h2>
    <div class="col-md-12 compose-right">
		<div class="inbox-details-default">
			<?php
				if(isset($data["error"]) && count($data["error"]) > 0) {
			?>
				<div class="alert alert-danger" role="alert">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<ul class="list-square">
						<?php
							foreach($data["error"] as $error) {
						?>
						<li>
						<?php echo $error; ?>
						</li>
						<?php 
							} 
						?>
					</ul>
				</div>
			<?php
				}
				elseif(isset($data["success"])) {
			?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $data["success"]; ?>
				</div>
				<meta http-equiv="refresh" content="0;url=<?php echo PATH; ?>?hal=identitas">

			<?php 
				} 
			?>
				<div class="inbox-details-body">							
					<form class="com-mail" method="POST" role="form" enctype="multipart/form-data">	
						<input type="text"  name="id_identitas" value="<?php echo $data["identitas"]->id_identitas; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->id_identitas; ?>';}" hidden>
						<label>Nama Kampus</label>
						<input type="text"  name="nama_campus" value="<?php echo $data["identitas"]->nama_campus; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->nama_campus; ?>';}">
						<label>Judul</label>
						<input type="text" name="judul_website"  value="<?php echo $data["identitas"]->judul_website; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->judul_website; ?>';}">
						<label>Keterangan</label>
						<textarea class="editor" name="keterangan" rows="6"  value="Message :" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->keterangan; ?>';}"><?php echo $data["identitas"]->keterangan; ?></textarea>
						<br />
						<label>URL</label>
						<input type="text" name="url"  value="<?php echo $data["identitas"]->url; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->url; ?>';}">
						<label>Meta Deskripsi</label>
						<input type="text"  name="meta_deskripsi" value="<?php echo $data["identitas"]->meta_deskripsi; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->meta_deskripsi; ?>';}">
						<label>Meta Keyword</label>
						<input type="text"  name="meta_keyword" value="<?php echo $data["identitas"]->meta_keyword; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->meta_keyword; ?>';}">
						<label>Alamat</label>
						<input type="text"  name="alamat" value="<?php echo $data["identitas"]->alamat; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->alamat; ?>';}">
						<label>Email</label>
						<input type="text"  name="email" value="<?php echo $data["identitas"]->email; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->email; ?>';}">
						<label>Telp</label>
						<input type="text"  name="telp" value="<?php echo $data["identitas"]->telp; ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $data["identitas"]->telp; ?>';}">
						<label>Google Maps</label>
						<input type="text"  name="google_maps" value='<?php echo $data["identitas"]->google_maps; ?>' >
						<label>Favicon</label>
						<?php
							if(isset($data["identitas"])) {
								if($data["identitas"]->favicon){
                        ?>
								<div class="form-group">
									<img src="<?php echo PATH; ?>resource/webcamp/images/<?php echo $data["identitas"]->favicon; ?>">
								</div>
						<?php
								}
							}
						?>
						<div class="form-group">
							<div class="btn btn-default btn-file">
								<i class="fa fa-paperclip"> </i> Attachment
								<input type="file" name="images">
							</div>
						</div>
						<br />
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
		</div>
	</div>    	
    <div class="clearfix"> </div>     
</div>
