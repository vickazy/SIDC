<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-file"/></span> &nbsp <a href="<?php echo site_url('mahasiswa');?>"><strong>Mahasiswa Aktif</strong></a>
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
			$id=$mahasiswa['nim'];
		?>
		<div class="col-md-5">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th width=100>NIM</th>
							<td width=500><?php echo $mahasiswa['nim'];?></td>
						</tr>
						<tr>
							<th>Nama</th>
							<td><?php echo $mahasiswa['nama_mahasiswa'];?></td>
						</tr>
						<tr>
							<th width=250>Jenis Kelamin</th>
							<td><?php echo $mahasiswa['jk'];?></td>
						</tr>
						<tr>
							<th width=100>Jalan</th>
							<td><?php echo $mahasiswa['jalan'];?></td>
						</tr>
						<tr>
							<th width=250>RT</th>
							<td><?php echo $mahasiswa['rt'];?></td>
						</tr>
						<tr>
							<th width=250>RW</th>
							<td><?php echo $mahasiswa['rw'];?></td>
						</tr>
						<tr>
							<th width=250>Desa</th>
							<td><?php echo $mahasiswa['desa'];?></td>
						</tr>
						<tr>
							<th width=250>Kecamatan</th>
							<td><?php echo $mahasiswa['kecamatan'];?></td>
						</tr>
						<tr>
							<th width=250>Kota</th>
							<td><?php echo $mahasiswa['kota'];?></td>
						</tr>
						<tr>
							<th width=250>Kode Pos</th>
							<td><?php echo $mahasiswa['kode_pos'];?></td>
						</tr>
						
						<tr>
							<th width=250>Phone</th>
							<td><?php echo $mahasiswa['phone'];?></td>
						</tr>
						<tr>
							<th width=250>Provinsi</th>
							<td><?php echo $mahasiswa['provinsi'];?></td>
						</tr>
						<tr>
							<th width=250>Golongan Darah</th>
							<td><?php echo $mahasiswa['gol_darah'];?></td>
						</tr>
						<tr>
							<th width=250>Agama</th>
							<td><?php echo $mahasiswa['agama'];?></td>
						</tr>
						<tr>
							<th width=250>Jurusan Asal</th>
							<td><?php echo $mahasiswa['jurusan_asal'];?></td>
						</tr>
						<tr>
							<th width=250>Tahun Masuk</th>
							<td><?php echo $mahasiswa['tahun_masuk'];?></td>
						</tr>
						<tr>
							<th width=250>Nama Ayah</th>
							<td><?php echo $mahasiswa['ayah'];?></td>
						</tr>
						<tr>
							<th width=250>Nama Ibu</th>
							<td><?php echo $mahasiswa['ibu'];?></td>
						</tr>
						<tr>
							<th width=250>Pendidikan Ayah</th>
							<td><?php echo $mahasiswa['pendidikan_ayah'];?></td>
						</tr>
						<tr>
							<th width=250>Pendidikan Ibu</th>
							<td><?php echo $mahasiswa['pendidikan_ibu'];?></td>
						</tr>
						<tr>
							<th width=250>Pekerjaan Ayah</th>
							<td><?php echo $mahasiswa['pekerjaan_ayah'];?></td>
						</tr>
						<tr>
							<th width=250>Pekerjaan Ibu</th>
							<td><?php echo $mahasiswa['pekerjaan_ibu'];?></td>
						</tr>
						<tr>
							<th width=250>Penghasilan Ayah</th>
							<td><?php echo $mahasiswa['penghasilan_ayah'];?></td>
						</tr>
						<tr>
							<th width=250>Penghasilan Ibu</th>
							<td><?php echo $mahasiswa['penghasilan_ibu'];?></td>
						</tr>
						<tr>
							<th width=250>Kota Lahir</th>
							<td><?php echo $mahasiswa['kota_lahir'];?></td>
						</tr>
						<tr>
							<th width=250>Tanggal Lahir</th>
							<td><?php echo $mahasiswa['tanggal_lahir'];?></td>
						</tr>
						<tr>
							<th width=250>Anak ke</th>
							<td><?php echo $mahasiswa['anak_ke'];?></td>
						</tr>
						<tr>
							<th width=250>Jumlah Anak</th>
							<td><?php echo $mahasiswa['jumlah_anak'];?></td>
						</tr>
						<tr>
							<th width=250>Sekolah Asal</th>
							<td><?php echo $mahasiswa['asal_sekolah'];?></td>
						</tr>
						<tr>
							<th width=250>Kota Sekolah</th>
							<td><?php echo $mahasiswa['kota_sekolah'];?></td>
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
						$cekmhs=$this->M_mahasiswa->cekgambar($mahasiswa['nim'],$idkat)->num_rows();
						if($cekmhs==0){?>
							<form action= <?php echo site_url('mahasiswa/kompres_jadi');?> method='post' enctype='multipart/form-data' role='form'>
											<?php
											echo "<input type='hidden' name='id_mhs' value=".$id.">";
											echo "<input type='hidden' name='id_kategori' value=".$row->id_kategori.">";
											echo "<input type='file' name='gambar' class='form-control' required='' placeholder='Pilih File'/>";
								
						}else{
							$idkat=$row->id_kategori;
							$gr=$this->M_mahasiswa->cekgamba($idkat,$id)->row_array();
							$gambar=['src'=>'gambarmhs/'.$gr['nama_gambar'],
									'width'=>'100', 'class'=>'img4'];
							$info = getimagesize('gambarmhs/'.$gr['nama_gambar']);
								/* menampilkan image yang terupload */
								echo img($gambar);
						}
					?>
				</td>
				<td width=75 align = "center">
					<?php 
						$cekmhs=$this->M_mahasiswa->cekgambar($mahasiswa['nim'],$idkat)->num_rows();
						if($cekmhs==0){
							echo "<input class='btn btn-flat btn-md btn-success' type='submit'  value='Tambah' name='gambar'/>";
							echo "</form>";
						}else{
						?>
						<?php
							echo "<a href=".site_url('mahasiswa/hapusgbr/'.$id.$row->id_kategori.'/'.$id)." class='tooltipsku' data-toggle='tooltip' data-placement='top' title=".'hapus'.$row->nama_kategori.">
										<button type='button' class='btn btn-danger' aria-label='Left Align'>
											<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
										</button>
									</a>";
							echo "<a href=".site_url('download/download_mhs/'.$gr['nama_gambar'])." class='tooltipsku' data-toggle='tooltip' data-placement='top' title=".'download'.$row->nama_kategori.">
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