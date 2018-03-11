<?php include('../controle/sessao.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<?php include ("../pgs/head.html"); ?>
	<style type="text/css">
		.home{	
			background: rgba(4, 172, 131, 1);
			border-bottom:solid 3px rgba(4, 172, 131, 1);
			border-top:solid 3px rgba(4, 172, 131, 1);
		}
	</style>
</head>
<body>
	<header>
		<?php include ("../pgs/menu_cliente.html"); ?>
	</header>

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: -2em">
	  	<ol class="carousel-indicators">
	    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  	</ol>
	  	<div class="carousel-inner">
	    	<div class="carousel-item active">
	      		<img class="d-block w-100" src="../img/banner_1.jpg" alt="First slide">
	    	</div>
		    <div class="carousel-item">
		      	<img class="d-block w-100" src="../img/banner_1.jpg" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      	<img class="d-block w-100" src="../img/banner_1.jpg" alt="Third slide">
		    </div>
	  	</div>
	  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    	<span class="sr-only">Previous</span>
	  	</a>
	  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    	<span class="sr-only">Next</span>
	  	</a>
	</div>

	<?php include("../pgs/footer.html"); ?>
	<script type="text/javascript">
		$('.carousel').carousel();
	</script>
</body>
</html>