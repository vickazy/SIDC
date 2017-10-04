<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-list"/></span> &nbsp <a href="<?php echo site_url('tata_usaha');?>"><strong>Tata Usaha Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong>Hapus Akses</strong>
		</h4>
    </div>
	<!--pesan error/sukses/dll-->		
	<?php
	$data=$this->session->flashdata('message');
	if ($data!=null){?>
		<div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			<?php echo $this->session->flashdata('message');?>
		</div>
	<?php
	}
	?>
	<?php echo validation_errors();?>
	</br>
	</br>
	<?php $id_tu=$tata_usaha['id_tu'];?>
	<?php $no=0; foreach($akses as $row): $no++;?>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo site_url('tata_usaha/hapusakses/'.$this->uri->segment(4));?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">Id User</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $akses['id_tu'];?>" type="text" name="id_kategori" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Akses</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $akses['id_akses'];?>" type="text" name="id_kategori" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Akses</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $akses['nama_akses'];?>" type="text" name="nama_kategori" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="delete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
