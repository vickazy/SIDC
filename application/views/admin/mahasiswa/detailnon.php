<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-file"/></span> &nbsp <a href="<?php echo site_url('mahasiswa/nonaktif');?>"><strong>Mahasiswa Nonaktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Detail Nonaktif</strong>
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
	<form class="form-horizontal" action="<?php echo site_url('mahasiswa/tambah_proses');?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">NIM</label>
				<div class="col-sm-9">
					<input disabled type="text" name="nim" class="form-control" value="<?php echo $mahasiswa['nim'];?>" readonly="readonly">
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-9">
					<input disabled type="text" name="nama_mahasiswa" class="form-control" value="<?php echo $mahasiswa['nama_mahasiswa'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-9">
					<select disabled name="jenis_kelamin" class="form-control">
						<option value="<?php echo $mahasiswa['jk'];?>"><?php echo $mahasiswa['jk'];?></option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jalan</label>
				<div class="col-sm-9">
					<input disabled type="text" name="jalan" class="form-control" value="<?php echo $mahasiswa['jalan'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">RT</label>
				<div class="col-sm-9">
					<input disabled type="text" name="rt" class="form-control" value="<?php echo $mahasiswa['rt'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">RW</label>
				<div class="col-sm-9">
					<input disabled type="text" name="rw" class="form-control" value="<?php echo $mahasiswa['rw'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Desa</label>
				<div class="col-sm-9">
					<input disabled type="text" name="desa" class="form-control" value="<?php echo $mahasiswa['desa'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kecamatan</label>
				<div class="col-sm-9">
					<input disabled type="text" name="kecamatan" class="form-control" value="<?php echo $mahasiswa['kecamatan'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kota</label>
				<div class="col-sm-9">
					<input disabled type="text" name="kota" class="form-control" value="<?php echo $mahasiswa['kota'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kode Pos</label>
				<div class="col-sm-9">
					<input disabled type="text" name="kode_pos" class="form-control" value="<?php echo $mahasiswa['kode_pos'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Provinsi</label>
				<div class="col-sm-9">
					<input disabled type="text" name="provinsi" class="form-control" value="<?php echo $mahasiswa['provinsi'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-9">
					<input disabled type="text" name="phone" class="form-control" value="<?php echo $mahasiswa['phone'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Golongan Darah</label>
				<div class="col-sm-9">
					<input disabled type="text" name="gol_darah" class="form-control" value="<?php echo $mahasiswa['gol_darah'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-9">
					<select disabled name="agama" class="form-control">
						<option value="<?php echo $mahasiswa['agama'];?>"><?php echo $mahasiswa['agama'];?></option>
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
					<input disabled type="text" name="jurusan_asal" class="form-control" value="<?php echo $mahasiswa['jurusan_asal'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tahun Masuk</label>
				<div class="col-sm-9">
					<input disabled type="text" name="tahun_masuk" class="form-control" value="<?php echo $mahasiswa['tahun_masuk'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Ayah</label>
				<div class="col-sm-9">
					<input disabled type="text" name="nama_ayah" class="form-control" value="<?php echo $mahasiswa['ayah'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Ibu</label>
				<div class="col-sm-9">
					<input disabled type="text" name="nama_ibu" class="form-control" value="<?php echo $mahasiswa['ibu'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pendidikan Ayah</label>
				<div class="col-sm-9">
					<input disabled type="text" name="pendidikan_ayah" class="form-control" value="<?php echo $mahasiswa['pendidikan_ayah'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pendidikan Ibu</label>
				<div class="col-sm-9">
					<input disabled type="text" name="pendidikan_ibu" class="form-control" value="<?php echo $mahasiswa['pendidikan_ibu'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pekerjaan Ayah</label>
				<div class="col-sm-9">
					<input disabled type="text" name="pekerjaan_ayah" class="form-control" value="<?php echo $mahasiswa['pekerjaan_ayah'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pekerjaan Ibu</label>
				<div class="col-sm-9">
					<input disabled type="text" name="pekerjaan_ibu" class="form-control" value="<?php echo $mahasiswa['pekerjaan_ibu'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Penghasilan Ayah</label>
				<div class="col-sm-9">
					<input disabled type="text" name="penghasilan_ayah" class="form-control" value="<?php echo $mahasiswa['penghasilan_ayah'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Penghasilan Ibu</label>
				<div class="col-sm-9">
					<input disabled type="text" name="penghasilan_ibu" class="form-control" value="<?php echo $mahasiswa['penghasilan_ibu'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kota lahir</label>
				<div class="col-sm-9">
					<input disabled type="text" name="kota_lahir" class="form-control" value="<?php echo $mahasiswa['kota_lahir'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Lahir</label>
				<div class="col-sm-9">
					<input disabled type="text" name="tanggal_lahir" class="form-control" value="<?php echo $mahasiswa['tanggal_lahir'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Anak Ke</label>
				<div class="col-sm-9">
					<input disabled type="text" name="anak_ke" class="form-control" value="<?php echo $mahasiswa['anak_ke'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jumah Anak</label>
				<div class="col-sm-9">
					<input disabled type="text" name="jumlah_anak" class="form-control" value="<?php echo $mahasiswa['jumlah_anak'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Sekolah Asal</label>
				<div class="col-sm-9">
					<input disabled type="text" name="asal_sekolah" class="form-control" value="<?php echo $mahasiswa['asal_sekolah'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kota Sekolah</label>
				<div class="col-sm-9">
					<input disabled type="text" name="kota_sekolah" class="form-control" value="<?php echo $mahasiswa['kota_sekolah'];?>">
				</div>
			</div>
		</form>
</div>