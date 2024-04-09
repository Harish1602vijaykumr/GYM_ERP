<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Sign Up | AdminKit Demo</title>

	<link href="{{asset('public/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">REGISTRATION</h1>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form>
										<div class="mb-3">
											<label class="form-label">Full name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
										<div class="mb-3">
											<label class="form-label">Gender</label><br/>
											<input  type="radio" id="male" name="gender" value="male" />
											<label for="male">Male</label><br/>
											<input  type="radio" id="female" name="gender" value="female" />
											<label for="fe">Female</label>
										</div>
										<div class="mb-3">
											<label class="form-label">district</label>
											<select class="form-control form-control-lg" type="dropdown" name="district">
												<option>Select District</option>
												<option>Thanjavur</option>
												<option>Trichy</option>
												<option>Chennai</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Address</label>
											<textarea class="form-control form-control-lg"  name="password" rows="5" cols="33" /></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Photo</label>
											<input class="form-control form-control-lg" type="file" name="photo" />
										</div>
										<div class="d-grid gap-2 mt-3">
											<a href="index.html" class="btn btn-lg btn-primary">Sign up</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Already have account? <a href="pages-sign-in.html">Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>