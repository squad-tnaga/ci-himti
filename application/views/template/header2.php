
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
							<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="<?=site_url('Homepage/login')?>">
								<h5>Login</h5>
							</a>
							<div class="dropdown-menu" id="loginbox">
								<div id="loginboxcontent">
									<h4><center>Login</center></h4>
									<hr>
									<form action="<?=site_url('Homepage/login')?>" method="post">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="username" placeholder="Username">
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="password" class="form-control" name="password" placeholder="Password">
										</div>
										
										<div class="form-group">
											<div class="checkbox">
												<label><input type="checkbox" name="rememberme">Remember Me!</label>
											</div>
										</div>

										<div class="btn-group" style="width:100%">
											<input type="submit" value="Login" class="btn btn-primary btn-lg" style="width:50%">
											<input type="reset" value="Reset" class="btn btn-danger btn-lg" style="width:50%">
										</div>
									</form>
									<br>
									<a href="<?=site_url('Login/forgotpassword')?>"><i>forgot password ?</i></a>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
