<!-- MENU -->
				<div class="side-menu">
					<nav class="navbar navbar-default" role="navigation">
						<div class="side-menu-container">
							<div class="navbar-header">
								<a class="navbar-brand" href="<?php echo base_url('index.php/dashboard');?>">
									<div class="icon fa fa-paper-plane"></div>
									<div class="title">SI DC AKN Bojonegoro</div>
								</a>
								<button type="button" class="navbar-expand-toggle pull-right visible-xs">
									<i class="fa fa-times icon"></i>
								</button>
							</div>
							<!-- deretan menu-->
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="<?php echo base_url('index.php/dashboard');?>">
										<span class="icon fa fa-paper-plane"></span><span class="title">Halaman Utama</span>
									</a>
								</li>
								<li class="">
									<a href="<?php 
									$akses3=$this->m_login->akses_dos($session_id)->row_array();
									$nama=$akses3['nama_dosen'];
									$id=$akses3['id_dosen'];
									echo base_url('index.php/dosen/detail/'.$id);?>">
										&nbsp; 
										<span class="glyphicon glyphicon-user"></span><span class="title">
											<?php
												echo "&nbsp;<strong>Dosen</strong>&nbsp<strong>".$nama."</strong>";
											?>
										</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</nav>				
					<!-- END MENU -->
				</div>	