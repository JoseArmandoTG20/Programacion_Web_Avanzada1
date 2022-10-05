<?php 
	include '../app/ProductController.php';
	$product = new ProductController;
	$products = $product -> getProducts();
?>

<!DOCTYPE html>
<html>
	<head>
		<?php include '../layouts/head.template.php'; ?>
	</head>
	<body>
		<?php include '../layouts/nav.template.php'; ?>

		<div class="container-fluid">	
			<div class="row">
				<?php include '../layouts/sidebar.template.php' ?>
				<div class="col-md-10 col-lg-10 col-sm-12">
					<section> 
						<div class="row bg-light m-2">
							<div class="col">
								<label>
									/Productos
								</label>
							</div>
							<div class="col">
								<button data-bs-toggle="modal" data-bs-target="#addProductModal" class=" float-end btn btn-primary">
									Añadir Producto
								</button>
							</div>
						</div> 
					</section>
					
					<section>
						<div class="row">
							<?php foreach ($products as $product): ?>
								<div class="col-md-4 col-sm-12"> 
									<div class="card mb-2">
									<img src='<?php echo $product -> cover ?>' class="card-img-top" alt="...">
										<div class="card-body">
											<h5 class="card-title"><?php echo $product -> name ?></h5>
											<p class="card-text"><?php echo $product ->  description ?></p>

											<div class="row">
												<a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
													Editar
												</a>
												<a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 col-6">
													Eliminar
												</a>
												<a href="./details.php" class="btn btn-info col-12">
													Detalles
												</a>
											</div>
										</div>
									</div>  
								</div>
							<?php endforeach; ?>
						</div>
					</section> 
				</div>
			</div>
		</div>

		<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form>
						<div class="modal-body">
							<label>Nombre:</label>
							<input name="name_P" type="text" class="form-control"  
							aria-describedby="addon-wrapping">

							<label>Descripción:</label>
							<input name="description_P" type="text" class="form-control"  
							aria-describedby="addon-wrapping">

							<label>Características:</label>
							<textarea name="features_P"  class="form-control" 
							id="floatingTextarea2" style="height: 100px"></textarea>
						</div>
						<form enctype="multipart/form-data" action="uploader.php" method="POST">
							<input name="uploadedfile" type="file" />
							<input type="submit" value="Subir archivo" />
						</form>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
								Cerrar
							</button>
							<button type="submit" class="btn btn-primary">
								Guardar Cambios
							</button>
						</div>
						<input type="hidden" value="addProduct" name="action">
					</form>
		    	</div>
		  	</div>
		</div>

		<?php include'../layouts/scripts.template.php' ?>
		<script type="text/javascript">
			function eliminar(target)
			{
				swal({
				  title: "Are you sure?",
				  text: "Once deleted, you will not be able to recover this imaginary file!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal("Poof! Your imaginary file has been deleted!", {
				      icon: "success",
				    });
				  } else {
				    swal("Your imaginary file is safe!");
				  }
				});
			}
		</script>
	</body>
</html>