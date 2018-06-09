
		<div class="navbar">
			<div class="container">
				<ul class="nav navbar-nav">
					<li>
						<a href="<?=site_url('Homepage')?>"><i class="fab fa-facebook fa-2x"></i></a>
					</li>
					<li>
						<a href="<?=site_url('Homepage')?>"><span class="fab fa-twitter fa-2x"></span></a>
					</li>
					<li>
						<a href="<?=site_url('Homepage')?>"><span class="fab fa-instagram fa-2x"></span></a>
					</li>
					<li>
						<a href="<?=site_url('Homepage')?>"><span class="fab fa-youtube fa-2x"></span></a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="margin:0 auto;">
					<li style="margin-top:5px;">
						<div class="dropdown">
							Selamat Datang,<b><u><a href="<?=site_url('Homepage/MyProfile')?>"> <?php echo $_SESSION['username'] ?> </a></u></b> |
							<a class="btn btn-default btn-xs" href="<?=site_url('Homepage/logout')?>">
								<h5>Logout</h5>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
