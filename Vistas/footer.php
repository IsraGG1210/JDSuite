<!-- ======= Footer ======= -->
<!-- Footer -->
<section id="footer" style="background-color:<?php echo $bg ?>;">
	<div class="container">
		<div class="row text-center text-xs-center text-sm-left text-md-left">
			<div class="col-xs-12 col-sm-3 col-md-3">
				<h5>JD Suite</h5>
				<ul class="list-unstyled quick-links">
					<li><a href="<?php echo SERVERURL?>punto-de-venta"><i class="fa fa-angle-double-right"></i>JD Store</a></li>
					<li><a href="<?php echo SERVERURL?>punto-de-venta-restaurantes"><i class="fa fa-angle-double-right"></i>JD Rest</a></li>
					<li><a href="<?php echo SERVERURL?>facturacion-electronica"><i class="fa fa-angle-double-right"></i>JD Invoice</a></li>
					<li><a href="<?php echo SERVERURL?>venta-tiempo-aire-electronico"><i class="fa fa-angle-double-right"></i>JD TAE</a></li>
					<li><a href="<?php echo SERVERURL?>ecommerce"><i class="fa fa-angle-double-right"></i>JD Ecomm</a></li>
					<li><a href="<?php echo SERVERURL?>#"><i class="fa fa-angle-double-right"></i>JD CEO</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">
				<h5>Blog y Comunidad</h5>
				<ul class="list-unstyled quick-links">
					<li><a href="#"><i class="fa fa-angle-double-right"></i>Blog
							JD</a></li>
					<li><a href="#"><i class="fa fa-angle-double-right"></i>JDShop.mx</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">
				<h5>Tienda</h5>
				<ul class="list-unstyled quick-links">
					<li><a href="<?php echo SERVERURL?>1/busqueda/kit"><i class="fa fa-angle-double-right"></i>Kits Equipos</a></li>
					<li><a href="<?php echo SERVERURL?>1/busqueda/impresora"><i class="fa fa-angle-double-right"></i>Impresoras</a>
					</li>
					<li><a href="<?php echo SERVERURL?>1/busqueda/cajon"><i class="fa fa-angle-double-right"></i>Cajon Dinero</a></li>
					<li><a href="<?php echo SERVERURL?>1/busqueda/lector"><i class="fa fa-angle-double-right"></i>Lectores</a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">
				<h5>Soporte</h5>
				<ul class="list-unstyled quick-links">
					<?php if(!isset($_SESSION['username'])){ ?>
					<li><a href="login"><i class="fa fa-angle-double-right"></i>Ingresa a tu cuenta para contactar con soporte</a> </li>
					<?php }else {?>
					<li><a href="#"><i class="fa fa-angle-double-right"></i>Contacta con soporte tecnico</a> </li>
					<?php }?>

				
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
				<ul class="list-unstyled list-inline social text-center">
					<li class="list-inline-item"><a href="#"><i class="fab fa-youtube fa-xl"></i></a></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-twitter-square fa-xl"></i></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-xl"></i></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-square fa-xl"></i></a></li>
				</ul>
			</div>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5 text-center">

			<a href="registro">
				<h3 style="color:white;">¿No tienes cuenta? <button
						class="btn btn-primary rounded-pill">Registrate</button></h3>
			</a>

		</div>
	</div>
</section>
<!-- ./Footer -->

<!-- End Footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
	integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"
	integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
	integrity="sha512-oFBfx20Vuw8reYrngBlvcrgBmDcEAPE0Vv7Rb9b7JYZNHmDFdxZhiOTGm0CePa7ouSwfty9qwHQck1aVGWK5tA=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
	integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"
	integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	
</body>

</html>