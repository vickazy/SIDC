<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-list"/></span> &nbsp <a href="<?php echo site_url('kategori/kategori_mahasiswa');?>"><strong>Kategori Mahasiswa Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Tambah Kategori Mahasiswa</strong>
		</h4>
    </div>
		<!--pesan error/sukses/dll-->
		<?php
		$data=$this->session->flashdata('m_sukses');
		if ($data!=null){?>
			<div class="alert alert-success" role="alert">
				<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $data;?>
			</div>
		<?php
		}
		$data=$this->session->flashdata('m_eror');
		if ($data!=null){?>
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $this->session->flashdata('m_eror');?>
			</div>
		<?php
		}
		?>
		<div class="row">
			<div class="col-xs-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<div class="title">Form Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?php echo site_url('kategori/tambah_proses_mhs');?>" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID Kategori</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id_kategori" id="id_kategori" readonly value="<?php echo $kode;?>" placeholder="ID Kategori">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Kategori</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori">
								</div>
							</div>
							
							<div class="col-sm-20">
							<div class="well well-sm">
								<div class="form-group">
										<div class="col-sm-offset-2 col-sm-2">
											<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
										</div>
								</div>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>