<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<script src="jquery.js"></script>
<script  src="photoZoom.min.js"> </script>
<script>
$(document).ready(function()
{
$("body").photoZoom(
{
zoomStyle : {
"border":"1px solid #ccc",
"background-color":"#fff",
"box-shadow":"0 0 5px #888"
}
});
</script> 
</head>
<body>
<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('dosen');?>"><strong>Dosen Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Detail</strong>
		</h4>
    </div>
		<!--pesan error/sukses/dll-->	
		<div class="panel-body">	
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
			<?php
			$id=$dosen['id_dosen'];
			?>
			<div class="col-md-5">	
					<table class="table table-hover table-responsive table-bordered">
							<tr>
								<th width=100>NIP / ID Dosen</th>
								<td width=500><?php echo $dosen['id_dosen'];?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td><?php echo $dosen['nama_dosen'];?></td>
							</tr>
							<tr>
								<th width=250>Tempat Lahir</th>
								<td><?php echo $dosen['tmpt_lahir'];?></td>
							</tr>
							<tr>
								<th width=100>Tanggal Lahir</th>
								<td><?php echo $dosen['tgl_lahir'];?></td>
							</tr>
							<tr>
								<th width=250>Jenis Kelamin</th>
								<td><?php echo $dosen['jenis_kelamin'];?></td>
							</tr>
							<tr>
								<th width=250>Agama</th>
								<td><?php echo $dosen['agama'];?></td>
							</tr>
							<tr>
								<th width=250>Pendidikan Terakhir</th>
								<td><?php echo $dosen['pendidikan_akhir'];?></td>
							</tr>
							<tr>
								<th width=250>Kepegawaian</th>
								<td><?php echo $dosen['status_kepegawaian'];?></td>
							</tr>
							<tr>
								<th width=250>Status</th>
								<td><?php echo $dosen['status_keanggotaan'];?></td>
							</tr>
							<tr>
								<th width=250>Alamat</th>
								<td><?php echo $dosen['alamat'];?></td>
							</tr>
					</table>
			</div>
			</br>

<!--Tambah Gambar-->
		<div class="col-md-12">
			
			<div class="panel panel-default">
					<!--panel header-->
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-inbox"></span>
							<strong>Tambah Data Gambar</strong>
						</h4>
					</div>				
					<!--body-->
				<div class="panel-body">
					</br>
					<table class="table table-hover table-responsive table-bordered">
						<thead>
							<tr>
								<th width=50>No.</th>
								<th width=350>Kategori</th>
								<th width=200>Gambar</th>
								<th colspan="3" align="center">Aksi</th>
							</tr>
						</thead>
			<?php $no=0; foreach($kategori as $row): $no++;?>
			<tr>
				<td ><?php echo $no;?></td>
				<td ><?php echo $row->nama_kategori;?></td>
				<?php $idkat=$row->id_kategori;?>
				<td >
					<?php
						$cekdosen=$this->m_dosen->cekgambar($dosen['id_dosen'],$idkat)->num_rows();
						if($cekdosen==0){?>
							<form action= <?php echo site_url('dosen/kompres_jadi');?> method='post' enctype='multipart/form-data' role='form'>
											<?php
											echo "<input type='hidden' name='id_dosen' value=".$id.">";
											echo "<input type='hidden' name='id_kategori' value=".$row->id_kategori.">";
											echo "<input type='file' name='gambar' class='form-control' required='' placeholder='Pilih File'/>";
								
						}else{
							$idkat=$row->id_kategori;
							$gr=$this->m_dosen->cekgamba($idkat,$id)->row_array();
							$gambar=['src'=>'gambardosen/'.$gr['nama_gambar'],
									'width'=>'100', 'class'=>'img4'];
							$info = getimagesize('gambardosen/'.$gr['nama_gambar']);
								/* menampilkan image yang terupload */
								echo img($gambar);
								
						}
					?>
				</td>
				<td width=75 align = "center">
					<?php 
						$cekdosen=$this->m_dosen->cekgambar($dosen['id_dosen'],$idkat)->num_rows();
						if($cekdosen==0){
							echo "<input class='btn btn-flat btn-md btn-success' type='submit'  value='Tambah' name='gambar'/>";
							echo "</form>";
						}else{
					?>	
					<?php
							echo "<a href=".site_url('dosen/hapusgbr/'.$id.$row->id_kategori.'/'.$id)." class='tooltipsku' data-toggle='tooltip' data-placement='top' title=".'hapus'.$row->nama_kategori.">
										<button type='button' class='btn btn-danger' aria-label='Left Align'>
											<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
										</button>
									</a>";
						
							echo "<a href=".site_url('download/download_dos/'.$gr['nama_gambar'])." class='tooltipsku' data-toggle='tooltip' data-placement='top' title=".'download'.$row->nama_kategori.">
											<button type='button' class='btn btn-download' aria-label='Left Align'>
												<span class='glyphicon glyphicon-download' aria-hidden='true'></span>
											</button>
										</a>";
							}
					?>
					
				</td>
			</tr>
			<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
</div>
</body>
</html>
