<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-th"/></span> &nbsp <a href="<?php echo site_url('tata_usaha');?>"><strong>Tata Usaha Aktif</strong></a>
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
			$id=$tata_usaha['id_tu'];
			?>
			<div class="col-md-5">	
					<table class="table table-hover table-responsive table-bordered">
							<tr>
								<th width=100>NIP / ID Tata Usaha</th>
								<td width=500><?php echo $tata_usaha['id_tu'];?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td><?php echo $tata_usaha['nama_tu'];?></td>
							</tr>
							<tr>
								<th width=250>Tempat Lahir</th>
								<td><?php echo $tata_usaha['tmpt_lahir'];?></td>
							</tr>
							<tr>
								<th width=100>Tanggal Lahir</th>
								<td><?php echo $tata_usaha['tgl_lahir'];?></td>
							</tr>
							<tr>
								<th width=250>Jenis Kelamin</th>
								<td><?php echo $tata_usaha['jenis_kelamin'];?></td>
							</tr>
							<tr>
								<th width=250>Agama</th>
								<td><?php echo $tata_usaha['agama'];?></td>
							</tr>
							<tr>
								<th width=250>Pendidikan Terakhir</th>
								<td><?php echo $tata_usaha['pendidikan_akhir'];?></td>
							</tr>
							<tr>
								<th width=250>Kepegawaian</th>
								<td><?php echo $tata_usaha['status_kepegawaian'];?></td>
							</tr>
							<tr>
								<th width=250>Status</th>
								<td><?php echo $tata_usaha['status_keanggotaan'];?></td>
							</tr>
							<tr>
								<th width=250>Alamat</th>
								<td><?php echo $tata_usaha['alamat'];?></td>
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
						$cektu=$this->M_tata_usaha->cekgambar($tata_usaha['id_tu'],$idkat)->num_rows();
						if($cektu==0){?>
							<form action= <?php echo site_url('tata_usaha/kompres_jadi');?> method='post' enctype='multipart/form-data' role='form'>
											<?php
											echo "<input type='hidden' name='id_tu' value=".$id.">";
											echo "<input type='hidden' name='id_kategori' value=".$row->id_kategori.">";
											echo "<input type='file' name='gambar' class='form-control' required='' placeholder='Pilih File'/>";
								
						}else{
							$idkat=$row->id_kategori;
							$gr=$this->M_tata_usaha->cekgamba($idkat,$id)->row_array();
							$gambar=['src'=>'gambartu/'.$gr['nama_gambar'],
									'width'=>'100', 'class'=>'img4'];
							$info = getimagesize('gambartu/'.$gr['nama_gambar']);
								/* menampilkan image yang terupload */
								echo img($gambar);
						}
					?>
				</td>
				<td width=75 align = "center">
					<?php 
						$cektu=$this->M_tata_usaha->cekgambar($tata_usaha['id_tu'],$idkat)->num_rows();
						if($cektu==0){
							echo "<input class='btn btn-flat btn-md btn-success' type='submit'  value='Tambah' name='gambar'/>";
							echo "</form>";
						}else{
						?>
						<?php
							echo "<a href=".site_url('tata_usaha/hapusgbr/'.$id.$row->id_kategori.'/'.$id)." class='tooltipsku' data-toggle='tooltip' data-placement='top' title=".'hapus'.$row->nama_kategori.">
										<button type='button' class='btn btn-danger' aria-label='Left Align'>
											<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
										</button>
								</a>";
							echo "<a href=".site_url('download/download_tu/'.$gr['nama_gambar'])." class='tooltipsku' data-toggle='tooltip' data-placement='top' title=".'download'.$row->nama_kategori.">
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
			<script src="<?php echo base_url('assets/js_add/jquery.js');?>"></script>
		</div></div>
