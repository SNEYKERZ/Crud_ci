<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login/Registro</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <!-- Títulos para alternar entre Login y Registro -->
        <div class="mb-4 text-center">
            <a id="login-tab" href="#" class="me-3 text-decoration-none" style="font-size: 30px;">Login</a>
            ||
            <a id="registro-tab" href="#" class="ms-3 text-decoration-none" style="font-size: 30px;">Registro</a>
        </div>
			<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?= $this->session->flashdata('success'); ?>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger" role="alert">
				<?= $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>

        <!-- Formulario -->
        <div class="card p-4 w-50">
            <h3 id="form-title" class="text-center mb-4">LOGIN</h3>
            <form method="post" action="<?= base_url('login/login'); ?>">

			<input type="hidden" name="action" id="action" value="login">
			
                <input type="hidden" id="action_type" name="action_type" value="login"> <!-- Campo oculto para alternar -->
                
                <!-- Campo para el nombre (solo visible en registro) -->
                <div class="mb-3" id="nombre-container" style="display: none;">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Tu nombre">
                </div>

                <!-- Campo para el email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Tu correo" required>
                    <div class="form-text">No compartiremos tu correo con nadie.</div>
                </div>

                <!-- Campo para la contraseña -->
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="contraseña" class="form-control" placeholder="Tu contraseña" required>
                </div>

                <!-- Botón dinámico -->
                <button type="submit" id="submit-button" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>

    <script>
        // Alternar entre Login y Registro
        document.getElementById('login-tab').addEventListener('click', function () {
			document.getElementById('action').value = 'login'; // Define acción como login
            document.getElementById('nombre-container').style.display = 'none'; // Oculta campo nombre
            document.getElementById('form-title').textContent = 'LOGIN'; // Cambia título
            document.getElementById('submit-button').textContent = 'Entrar'; // Cambia botón
            document.getElementById('action_type').value = 'login'; // Define acción como login
        });

        document.getElementById('registro-tab').addEventListener('click', function () {
			document.getElementById('action').value = 'registro'; // Define acción como registro 
            document.getElementById('nombre-container').style.display = 'block'; // Muestra campo nombre
			document.getElementById('nombre-container').setAttribute = require; 
            document.getElementById('form-title').textContent = 'REGISTRO'; // Cambia título
            document.getElementById('submit-button').textContent = 'Registrarse'; // Cambia botón
            document.getElementById('action_type').value = 'registro'; // Define acción como registro
        });
    </script>
</body>

</html>
