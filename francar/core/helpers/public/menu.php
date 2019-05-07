<?php
class Public
{
	public static function menu($title)
	{
	print('
		
		');

	}

	public static function footerTemplate($controller)
	{
		print('
				</main>
				<footer class="page-footer green">
					<div class="container">
						<div class="row">
							<div class="col s12 m6 l6">
								<h5 class="white-text">Nosotros</h5>
								<p>
									<blockquote><a href="#mision" class="modal-trigger white-text"><b>Misión</b></a> | <a href="#vision" class="modal-trigger white-text"><b>Visión</b></a> | <a href="#valores" class="modal-trigger white-text"><b>Valores</b></a></blockquote>
									<blockquote><a href="#terminos" class="modal-trigger white-text"><b>Términos y condiciones</b></a></blockquote>
								</p>
							</div>
							<div class="col s12 m6 l6">
								<h5 class="white-text">Contáctanos</h5>
								<p>
									<blockquote><a class="white-text" href="https://www.facebook.com/" target="_blank"><b>facebook</b></a> | <a class="white-text" href="https://twitter.com/" target="_blank"><b>twitter</b></a></blockquote>
									<blockquote><a class="white-text" href="https://www.instagram.com/" target="_blank"><b>instagram</b></a> | <a class="white-text" href="https://www.youtube.com/" target="_blank"><b>youtube</b></a></blockquote>
								</p>
							</div>
						</div>
					</div>
					<div class="footer-copyright">
						<div class="container">
							<span>© Coffeeshop, todos los derechos reservados.</span>
							<span class="grey-text text-lighten-4 right">Diseñado con <a class="red-text text-accent-1" href="http://materializecss.com/" target="_blank"><b>Materialize</b></a></span>
						</div>
					</div>
				</footer>
				<script type="text/javascript" src="../../libraries/jquery-3.2.1.min.js"></script>
				<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
				<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
				<script type="text/javascript" src="../../resources/js/commerce.js"></script>
				<script type="text/javascript" src="../../core/helpers/functions.js"></script>
				<script type="text/javascript" src="../../core/controllers/public/'.$controller.'"></script>
			</body>
			</html>
		');
	}

	public static function modals()
	{
		print('
			<!-- Términos y condiciones -->
			<div id="terminos" class="modal">
				<div class="modal-content">
					<h4 class="center-align">TÉRMINOS Y CONDICIONES</h4>
					<p>Nuestra empresa ofrece los mejores productos a nivel nacional con una calidad garantizada y...</p>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
				</div>
			</div>

			<!-- Misión -->
			<div id="mision" class="modal">
				<div class="modal-content">
					<h4 class="center-align">MISIÓN</h4>
					<p>Ofrecer los mejores productos a nivel nacional para satisfacer a nuestros clientes y...</p>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
				</div>
			</div>

			<!-- Visión -->
			<div id="vision" class="modal">
				<div class="modal-content">
					<h4 class="center-align">VISIÓN</h4>
					<p>Ser la empresa lider en la región ofreciendo productos de calidad a precios accesibles y...</p>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
				</div>
			</div>

			<!-- Valores -->
			<div id="valores" class="modal">
				<div class="modal-content center-align">
					<h4>VALORES</h4>
					<p>Responsabilidad</p>
					<p>Honestidad</p>
					<p>Seguridad</p>
					<p>Calidad</p>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
				</div>
			</div>
		');
	}
}
?>
