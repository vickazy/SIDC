<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-list"/></span> &nbsp <a href="<?php echo site_url('kategori');?>"><strong>Kategori Dosen Aktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('kategori/tambah');?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Kategori Dosen</a>
		<a href="<?php echo site_url('kategori/dosen_nonaktif');?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Lihat Kategori Dosen Nonaktif</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('kategori/cari');?>" method="post">
			<div class="form-group">
				<label>Cari Kategori Dosen </label>
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
		
		<div class="well well-sm">
			<a href="<?php echo site_url('kategori/kategori_tu');?>" class="btn btn-info"><i class="glyphicon glyphicon-list"></i> Lihat Kategori Tata Usaha</a>
			<a href="<?php echo site_url('kategori/kategori_mahasiswa');?>" class="btn btn-warning"><i class="glyphicon glyphicon-list"></i> Lihat Kategori Mahasiswa</a>
		</div>

		<?php echo $pagination;?>
		<table class="table table-hover table-responsive table-bordered">
			<thead style="text-align='center'">
				<tr>
					<th width=10>No.</th>
					<th width=30>ID Kategori</th>
					<th width=100>Nama Kategori</th>
					<th colspan="3">Aksi</th>
				</tr>
			</thead>
			<?php $no=0; foreach($kategori as $row): $no++;?>
			<tr>
				<td ><?php echo $no+$page;?></td>
				<td ><?php echo $row->id_kategori;?></td>
				<td ><?php echo $row->nama_kategori;?></td>
				<td width=40 align = "center">
					<a href="<?php echo site_url('kategori/edit/'.$row->id_kategori);?>" 
						class='tooltipsku' 
						data-toggle='tooltip' 
						data-placement='top'
						title="<?php echo 'edit '.$row->nama_kategori;?>"
						> <!--id_kategori dibawa ke controller-->
						<button type="button" class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
						</button>
					</a>
					&nbsp;
					<a href="<?php echo site_url('kategori/hapus/'.$row->id_kategori);?>" 
						class='tooltipsku' 
						data-toggle='tooltip' 
						data-placement='top'
						title="<?php echo 'hapus '.$row->nama_kategori;?>"
						> <!--id_kategori dibawa ke controller-->
						<button type="button" class="btn btn-danger" aria-label="Left Align">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</button>
					</a>
				</td>
			</tr>
			<?php endforeach; ?>
	</div>
</div>


<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('dashboard/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('dashboard/petugas/delete_success');?>";
                }
            });
        });
    });
</script>