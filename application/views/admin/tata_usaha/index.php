<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-th"/></span> &nbsp <a href="<?php echo site_url('tata_usaha');?>"><strong>Tata Usaha Aktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('tata_usaha/tambah');?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
			<a href="<?php echo site_url('tata_usaha/nonaktif');?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Lihat Data Nonaktif</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('tata_usaha/cari');?>" method="post">
			<div class="form-group">
				<label>Cari Tata Usaha </label>
				<input type="text" class="form-control" placeholder="masukkan nama" name="cari">
			</div>
			<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>	
		</form>
	</div>
	<div class="panel-body">		
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
		</br>
		<?php echo $pagination;?>
		<table class="table table-hover table-responsive table-bordered">
			<thead>
				<tr>
					<th >No.</th>
					<th >Kode TU</th>
					<th >Nama</th>
					<th >JK</th>
					<th >Kepagawaian</th>
					<th >Status</th>
					<th colspan="3" align="center">Aksi</th>
				</tr>
			</thead>
			<?php $no=0; foreach($tata_usaha as $row): $no++;?>
			<tr>
				<td ><?php echo $no+$page;?></td>
				<td ><?php echo $row->id_tu;?></td>
				<td ><?php echo $row->nama_tu;?></td>
				<td ><?php echo $row->jenis_kelamin;?></td>
				<td ><?php echo $row->status_kepegawaian;?></td>
				<td ><?php echo $row->status_keanggotaan;?></td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('tata_usaha/detail/'.$row->id_tu);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'detail '.$row->nama_tu;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('tata_usaha/edit/'.$row->id_tu);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'edit '.$row->nama_tu;?>"
							>
							<button type="button" class="btn btn-info" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a disabled href="<?php echo site_url('tata_usaha/hapus/'.$row->id_tu);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Hapus '.$row->nama_tu;?>"
							>
							<button type="button" class="btn btn-danger" aria-label="Left Align">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		</br>
		<?php echo $pagination;?>
	</div>
</div>