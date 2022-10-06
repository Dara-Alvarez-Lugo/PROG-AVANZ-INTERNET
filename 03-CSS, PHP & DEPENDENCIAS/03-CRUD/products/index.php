<?php
	include '../app/ProductsController.php';
	include '../app/BrandsController.php';

	$brandController = new BrandsController();
	$brands = $brandController->getBrands();

	$productController = new ProductsController();
	$products = $productController->getProducts();

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
							<div class="col">
								<button data-bs-toggle="modal" data-bs-target="#addProductModal" class=" float-end btn btn-primary">
									Añadir producto
								</button>
							</div>
						</div> 
					</section>
					

					<section>
						
						<div class="row">

							<?php if(isset($products) && count($products) > 0):?>
								<?php foreach($products as $product):?>

									<div class="col-md-4 col-sm-12"> 

										<div class="card mb-2">
										<img src="<?= $product->cover ?>" class="card-img-top" alt="...">
										<div class="card-body">
											<h5 class="card-title"><?= $product->name ?></h5>
											<h6 class="card-subtitle mb-2 text-muted"><?= $product->brand->name ?></h6>
											<p class="card-text"><?= $product->description ?></p>

											<div class="row">
												<a onclick="eliminar(<?$product->id?>)" href="#" class="btn btn-warning mb-1 col-6">
													Editar
												</a>
												<a a onclick="eliminar(<?= $product->id ?>)" href="#" class="btn btn-danger mb-1 col-6">
													Eliminar
												</a>
												<a href="details.php?slug=<?= $product->slug ?>" class="btn btn-info col-12">
													Detalles
												</a>
											</div>

										</div>
										</div>  

									</div>

								<?php endforeach;?>
							<?php endif;?>


						</div>

					</section> 

					 
				</div>
				<!-- CONTENIDO -->

			</div>

		</div>





		<!-- MODAL -->
		<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Añadir producto</h5>
		        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>

		      <form method="post" enctype="multipart/form-data" action="../app/ProductsController.php">
				
			 	 <div class="modal-body">

				  	<!-- <label for="">Name</label> -->
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">@</span>
						<input name="name" required type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<!-- <label for="">Description</label> -->
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">@</span>
						<input name="description" required type="text" class="form-control" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<!-- <label for="">Features</label> -->
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">@</span>
						<input name="features" required type="text" class="form-control" placeholder="Features" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<!-- <label for="">Brand ID</label> -->
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">@</span>
						<!-- <input name="brand_id" required type="text" class="form-control" placeholder="Brand ID" aria-label="Username" aria-describedby="basic-addon1"> -->

						<select name="" id="">
							<?php foreach($brands as $brand):?>
								<option value="<?=$brand->id?>">
									<?= $brand->name?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<!-- <label for="">Imagen</label> -->
					<div class="mb-3">
						<input name="cover" class="form-control" type="file" accept="image/*" id="formFileMultiple" multiple>
					</div>


					<input type="hidden" name="action" value="add">

					
			      </div>

			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
			        	Cerrar
			        </button>
			        <button type="submit" class="btn btn-primary">
			        	Guardar
			        </button>

			      </div>

		      </form>

		    </div>

		  </div>
		  
		</div>





		<!-- SCRIPTS -->
		<?php include '../layouts/scripts.template.php'; ?>
		
		



		<script type="text/javascript">

			function eliminar(id)
			{
				swal({
				  title: "Are you sure?",
				  text: "Once deleted, you will not be able to recover this imaginary file!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) 
					{

						swal("Poof! Your imaginary file has been deleted!", {
							icon: "success",
						});
						var bodyFormData = new FormData();
						bodyFormData.append('id', id);
						bodyFormData.append('action', 'delete');
						axios.post('../app/ProductsController.php', bodyFormData)
							.then(function(response) {
								console.log(response);
								location.reload();
							})
							.catch(function(error) {
								console.log(error);
							});
						}
						
					else{
						swal("Your imaginary file is safe!");
				 	}
				});
			}
		</script>

	</body>

</html>