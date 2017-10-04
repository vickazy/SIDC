<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-file"/></span> &nbsp <a href="<?php echo site_url('mahasiswa');?>"><strong>Mahasiswa Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Tambah</strong>
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
							<div class="title">From Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<div class="form-group well">
							<form action="<?php echo site_url('mahasiswa/importdata')?>" method="post" enctype="multipart/form-data" role="form">
									<input class="btn btn-flat btn-md btn-success" type="submit"  value="Import" name="save"/>
								<div class="col-sm-5">
										<input type="file" id="import" name="import" class="form-control" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
								</div>
							</form>
						</div>
					
						<form class="form-horizontal" role="form" action="<?php echo site_url('mahasiswa/tambah_proses');?>" method="post">
							<div class="form-group">
				<label class="col-sm-2 control-label">NIM</label>
				<div class="col-sm-9">
					<input type="text" name="nim" class="form-control" placeholder="NIM Mahasiswa">
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-9">
					<input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-9">
					<select name="jk" class="form-control">
						<option value="Jenis Kelamin">Jenis Kelamin </option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jalan</label>
				<div class="col-sm-9">
					<input type="text" name="jalan" class="form-control" placeholder="Jalan">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">RT</label>
				<div class="col-sm-9">
					<input type="text" name="rt" class="form-control" placeholder="RT">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">RW</label>
				<div class="col-sm-9">
					<input type="text" name="rw" class="form-control" placeholder="RW">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Desa</label>
				<div class="col-sm-9">
					<input type="text" name="desa" class="form-control" placeholder="Desa">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kecamatan</label>
				<div class="col-sm-9">
					<input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kota</label>
				<div class="col-sm-9">
					<input type="text" name="kota" class="form-control" placeholder="Kota">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kode Pos</label>
				<div class="col-sm-9">
					<input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Provinsi</label>
				<div class="col-sm-9">
					<input type="text" name="provinsi" class="form-control" placeholder="Provinsi">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-9">
					<input type="text" name="phone" class="form-control" placeholder="Phone">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Golongan Darah</label>
				<div class="col-sm-9">
					<input type="text" name="gol_darah" class="form-control" placeholder="Golongan Darah">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-9">
					<select name="agama" class="form-control">
						<option value="Agama">Agama?</option>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Protestan">Protestan</option>
						<option value="Budha">Budha</option>
						<option value="Hindu">Hindu</option>
						<option value="Kepercayaan">Kepercayaan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jurusan Asal</label>
				<div class="col-sm-9">
					<input type="text" name="jurusan_asal" class="form-control" placeholder="Jurusan Asal">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tahun Masuk</label>
				<div class="col-sm-9">
					<input type="text" name="tahun_masuk" class="form-control" placeholder="Tahun Masuk">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Ayah</label>
				<div class="col-sm-9">
					<input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Ibu</label>
				<div class="col-sm-9">
					<input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pendidikan Ayah</label>
				<div class="col-sm-9">
					<input type="text" name="pendidikan_ayah" class="form-control" placeholder="Pendidikan Ayah">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pendidikan Ibu</label>
				<div class="col-sm-9">
					<input type="text" name="pendidikan_ibu" class="form-control" placeholder="Pendidikan Ibu">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pekerjaan Ayah</label>
				<div class="col-sm-9">
					<input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan Ayah">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pekerjaan Ibu</label>
				<div class="col-sm-9">
					<input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Penghasilan Ayah</label>
				<div class="col-sm-9">
					<input type="text" name="penghasilan_ayah" class="form-control" placeholder="Penghasilan Ayah">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Penghasilan Ibu</label>
				<div class="col-sm-9">
					<input type="text" name="penghasilan_ibu" class="form-control" placeholder="Penghasilan Ibu">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kota lahir</label>
				<div class="col-sm-9">
					<input type="text" name="kota_lahir" class="form-control" placeholder="Kota Lahir">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Lahir</label>
				<div class="col-sm-9">
					<input type="text" name="tanggal_lahir" id="tanggal" class="form-control" placeholder="Tanggal Lahir">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Anak Ke</label>
				<div class="col-sm-9">
					<input type="text" name="anak_ke" class="form-control" placeholder="Anak Ke">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jumah Anak</label>
				<div class="col-sm-9">
					<input type="text" name="jumlah_anak" class="form-control" placeholder="Jumlah Anak">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Sekolah Asal</label>
				<div class="col-sm-9">
					<input type="text" name="asal_sekolah" class="form-control" placeholder="Sekolah Asal">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kota Sekolah</label>
				<div class="col-sm-9">
					<input type="text" name="kota_sekolah" class="form-control" placeholder="Kota Sekolah">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Gelombang</label>
				<div class="col-sm-9">
					<select name="gelombang" class="form-control">
						<option value="gelomb">Gelombang Pendaftaran </option>
						<option value="g1">Gelombang 1</option>
						<option value="g2">Gelombang 2</option>
						<option value="g3">Gelombang 3</option>
					</select>
				</div>
			</div>
							<div class="col-sm-20">
								<div class="well well-sm">
									<div class="form-group">
											<div class="col-sm-offset-2 col-sm-5">
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
</div>