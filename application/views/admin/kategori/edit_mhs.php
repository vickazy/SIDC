<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-list"/></span> &nbsp <a href="<?php echo site_url('kategori/kategori_mahasiswa');?>"><strong>Kategori Mahasiswa Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Edit</strong>
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
	<?php $id=$kategori['id_kategori'];?>
	<form class="form-horizontal" action="<?php echo site_url('kategori/edit_prosesmhs/'.$id);?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Id Kategori</label>
			<div class="col-sm-9">
				<input required disabled value="<?php echo $kategori['id_kategori'];?>" type="text" name="id_kategori" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Nama Kategori</label>
			<div class="col-sm-9">
				<input required value="<?php echo $kategori['nama_kategori'];?>" type="text" name="nama" maxlength=90 class="form-control">
			</div>
		</div>
		<div class="col-sm-20">
			<div class="well well-sm">
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="delete" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</button>
						</div>
				</div>
			</div>
		</div>
	</form>
</div>