<?php 
require_once("header.php"); 
require_once("config\config.php")
?>

	<style>
		#errordiv {
			display: none;
		}
	</style>
	<section class="about section-margin mb-5" style="padding-top: 110px; min-height: 70vh;">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-5">
					<div class="about__img text-center text-md-left mb-5 mb-md-0">
						<img class="img-fluid" src="img/steel.png" alt="">
					</div>
				</div>
				<div class="col-md-7 pl-xl-5">
					<div class="section-intro">
						<h2 class="section-intro__subtitle">Engineering Database</h2>
					</div>
					<div>
						<form>
							<div class="form-group">
								<label for="Username">Username</label>
								<input type="username" name="username" id="username" class="form-control"
									placeholder="Enter Username" required='required' style="width:50%;max-width:80%;">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" name="password" id="password" class="form-control"
									placeholder="Enter Password" required='required' style="width:50%;max-width:80%;">
							</div>
							<button id="submit" type="submit" class="btn btn-primary">Login</button>
							<div class="text-center mt-4" id="errordiv">
								<!--bootstrap alert danger to show red box with text -->
								<div class="alert alert-danger" style="width:50%;max-width:80%;">
									<span class="txt1">
										<p>Invalid Username and/or Password</p>
									</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php require_once("footer.php"); ?>
<script src="js/login.js"></script>
