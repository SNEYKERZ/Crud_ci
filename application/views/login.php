<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<!-- Custom Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<div class="container d-flex justify-content-center align-items-center h-100">
		<a id="login" href=" <?= base_url('login'); ?> " class="mt-3 me-2" style="text-decoration: none; font-size: 30px">
			<p>Login</p>
		</a>
		||
		<a id= "registro" class="mt-3 ms-2" style="text-decoration: none; font-size: 30px">
			<p>Registro</p>
		</a>
	</div>
	
	<div class="form-fluid">
		<div class="d-flex justify-content-center">
			<div class="card p-4 w-75">
				<h3 class="text-center mt-3 mb-4">LOGIN</h3>
				<form>
				<div class="mb-3" id="name" style="display: none;">
						<label for="name" class="form-label">nombre</label>
						<input type="text" class="form-control" id ="name" placeholder="nombre" required>						
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
						<div id="emailHelp" class="form-text">lo compartiremos con el que lo pida mi fai😜.
						</div>
					</div>
					<div class="mb-3">
						<label for="contraseña" class="form-label">Password</label>
						<input type="password" class="form-control" id="contraseña" required>
					</div>
					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Check me out</label>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>

	</div>
<script>
	document.getElementById('registro').addEventListener('click', function(){
		document.getElementById('name').style.display = 'block';

		if (document.getElementById('name').style.display == 'block') {
			document.getElementById('name').style.display = 'none';
		}
	
	});
	document.getElementById('login').addEventListener('click', function(){
		document.getElementById('name').style.display = 'none';
	
	});

</script>
</body>

</html>
