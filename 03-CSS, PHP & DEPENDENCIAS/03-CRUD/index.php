<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			Products
		</title>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
		<style type="text/css">
			.sidebar{
				height: 90vh;
			}
		</style>
	</head>
	<body>

		<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">Navbar</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Link</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            Dropdown
		          </a>
		          <ul class="dropdown-menu">
		            <li><a class="dropdown-item" href="#">Action</a></li>
		            <li><a class="dropdown-item" href="#">Another action</a></li>
		            <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item" href="#">Something else here</a></li>
		          </ul>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link disabled">Disabled</a>
		        </li>
		      </ul>
		      <form class="d-flex" role="search">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
		        <!-- <button class="btn btn-outline-success" type="submit">Nuevo producto</button> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Nuevo producto
                </button>

                
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>


		      </form>
		    </div>
		  </div>
		</nav>

		<div class="container-fluid">
			
			<div class="row">

                <!-- SIDEBAR -->
				<div class="col-sm-2 d-sm-block d-none text-bg-dark sidebar">
					
					<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
			                <a class="nav-link active" aria-current="page" href="#">Home</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link" href="#">Link</a>
			            </li>
			            <li class="nav-item dropdown">
			                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			                Dropdown
			            </a>
			            <ul class="dropdown-menu dropdown-menu-dark">

			                <li><a class="dropdown-item" href="#">Action</a></li>
			                <li><a class="dropdown-item" href="#">Another action</a></li>
			                <li>
			                    <hr class="dropdown-divider">
			                </li>
			                <li><a class="dropdown-item" href="#">Something else here</a></li>
			            </ul>
			          </li>
			        </ul>	

				</div>

				<div class="col">
					
					<section>
						
						<div class="row">

                            <?php for ($i=0; $i < 12; $i++):?>

                                <div class="col-md-4 col-sm-12">

                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="card-link">Card link</a>
                                            <a href="#" class="card-link">Another link</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
							

						</div>

					</section> 

					 
				</div>

			</div>

		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	</body>
</html>