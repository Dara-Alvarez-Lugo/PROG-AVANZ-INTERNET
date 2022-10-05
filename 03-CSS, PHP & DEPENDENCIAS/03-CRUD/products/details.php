<?php
	include '../app/ProductsController.php';

	$productController = new ProductsController();
	$a = $_GET['slug'];
	$product = $productController->detailsProducts($a);

?>

<!DOCTYPE html>
<html>

	<head>
		<!-- HEAD -->
		<?php include '../layouts/head.template.php'; ?>
		
	</head>

	
	<body>

		<!-- NAV -->
		<?php include '../layouts/nav.template.php'; ?>

		<div class="container-fluid">
			
			<div class="row">
				
				<!-- SIDEBAR -->
				<?php include '../layouts/sidebar.template.php'; ?>
			
				
				<!-- CONTENIDO -->
				<div class="col-md-10 col-lg-10 col-sm-12">

					<section> 
						<div class="row bg-light m-2">
							<div class="col">
								<label>
									/Productos
								</label>
							</div>
							<!-- <div class="col">
								
							</div> -->
						</div> 
					</section>
					
					<section>
						
						<div class="row">
							
							<div class="col-md-4 col-sm-12"> 

								<div class="card mb-2">
									<img src="<?= $product->cover ?>" class="card-img-top" alt="...">
									<div class="card-body">
										<h5 class="card-title"><?= $product->name ?></h5>
										<h6 class="card-subtitle mb-2 text-muted"><?= $product->brand->name ?></h6>
										<p class="card-text"><?= $product->description ?></p>

										<p>Marca</p>
										<p><?= $product->brand->name ?></p>

										<p>Categoria</p>
										<?php if (isset($product->categories) && count($product->categories) > 0) : ?>
											<?php foreach($product->categories as $item): ?>
												<p><?= $item->name; ?></p>
											<?php  endforeach; ?>
										<?php endif; ?>

										<p>Etiquetas</p>
										<?php if (isset($product->tags) && count($product->tags) > 0) : ?>
											<?php foreach($product->tags as $item): ?>
												<p><?= $item->name; ?></p>
											<?php  endforeach; ?>
										<?php endif; ?>


										<div class="row">
											<a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
												Editar
											</a>
											<a onclick="eliminar(this)" href="#" class="btn btn-danger mb-1 col-6">
												Eliminar
											</a>
										</div>

									</div>
								</div>  

							</div>

						</div>

					</section> 

					 
				</div>
				<!-- CONTENIDO -->

			</div>

		</div>



		<!-- MODAL -->
		





		<!-- SCRIPTS -->
		<?php include '../layouts/scripts.template.php'; ?>
		



		
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