<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CRUD CI 3</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	</head>
	<body>
	<div class="container">
			<!-- Título de oa página -->
			<div class="row">
				<h2>CRUD EN CI 3</h2>
			</div>

			<!-- Formulario -->
			<div class="mb-12">
				<?php echo form_open('inicio/agregar', ['id' => 'form-persona']); ?>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="">Nombre</label>
							<input type="text" name="nombre" class="form-control" required placeholder="Nombre" id="nombre">
						</div>
						<div class="form-group col-sm-6">
							<label for="">Apellidos</label>
							<input type="text" name="apellidos" class="form-control" required placeholder="Apellidos" id="apellidos">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="">Fecha de nacimiento</label>
							<input type="date" name="fecha_nacimiento" class="form-control" required id="fecha_nacimiento">
						</div>
						<div class="form-group col-sm-6">
							<label for="">Genero</label>
							<input type="text" name="genero" class="form-control" required placeholder="F o M" id="genero">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Guardar</button>
				<?php echo form_close(); ?>
			</div>

            <br><br>
            <div>
			<a href="<?= base_url('camara'); ?>" type="button" class="btn btn-success">Acceder a la cámara</a>
            </div>

            <br><br>

			<!-- Tabla de datos -->
			<div class="row">
				<div class="card col-12">
					<div class="card-header">
						<h4>Tabla de personas</h4>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Fecha de nacimiento</th>
									<th scope="col">Genero</th>
									<th scope="col">Editar</th>
									<th scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
                                $count = 0;
                                foreach($personas as $persona){
                                    echo '<tr>
                                        <td>'.$count++.'</td>
                                        <td>'.$persona->nombre.' '.$persona->apellidos.'</td>
                                        <td>'.$persona->fecha_nacimiento.'</td>
                                        <td>'.$persona->genero.'</td>
                                        <td><button type="button" class="btn btn-warning text-white" onclick="llenar_datos('.$persona->id.', `'.$persona->nombre.'`, `'.$persona->apellidos.'`, `'.$persona->fecha_nacimiento.'`, `'.$persona->genero.'`)">Editar</button></td>
                                        <td><a href="'.base_url('inicio/eliminar/'.$persona->id).'" type="button" class="btn btn-danger">Eliminar</a></td>
                                    </tr>';
                                }
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script>
			let url = "<?php echo base_url('inicio/actualizar'); ?>";
			const llenar_datos = (id, nombre, apellidos,fecha_nacimiento, genero) => {
				let path = url+"/"+id;
				document.getElementById('form-persona').setAttribute('action', path);
				document.getElementById('nombre').value = nombre;
                document.getElementById('apellidos').value = apellidos;  
				document.getElementById('fecha_nacimiento').value = fecha_nacimiento;
				document.getElementById('genero').value = genero;
			};
		
		</script>
	</body>
</html>