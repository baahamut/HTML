<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<?php
session_start();
if (!isset($_SESSION['login'])) {
	header ('Location: http://localhost/porto/HTML/membres/index.php');
	exit();
}
?>
	<head>
	

		<!-- Basic -->
		<meta charset="utf-8">
		<title>L'affaire à faire.fr</title>
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="Crivos.com">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Libs CSS -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/fonts/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="vendor/flexslider/flexslider.css" media="screen" />
		<link rel="stylesheet" href="vendor/fancybox/jquery.fancybox.css" media="screen" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">

		<!-- Current Page Styles -->
		<link rel="stylesheet" href="vendor/revolution-slider/css/settings.css" media="screen" />
		<link rel="stylesheet" href="vendor/revolution-slider/css/captions.css" media="screen" />
		<link rel="stylesheet" href="vendor/circle-flip-slideshow/css/component.css" media="screen" />

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Skin -->
		<link rel="stylesheet" href="css/skins/blue.css">
		
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="css/bootstrap-responsive.css" />
		<link rel="stylesheet" href="css/theme-responsive.css" />

		<!-- Favicons -->
		<link rel="shortcut icon" href="picto.jpg">
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">

		<!-- Head Libs -->
		<script src="vendor/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond.js"></script>
		<![endif]-->

		<!-- Facebook OpenGraph Tags - Go to http://developers.facebook.com/ for more information.
		<meta property="og:title" content="Porto Website Template."/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="http://www.crivos.com/themes/porto"/>
		<meta property="og:image" content="http://www.crivos.com/themes/porto/"/>
		<meta property="og:site_name" content="Porto"/>
		<meta property="fb:app_id" content=""/>
		<meta property="og:description" content="Porto - Responsive HTML5 Template"/>
		-->

	</head>
	<body>

		<div class="body">
			<header>
				<div class="container">
					<h1 class="logo">
						<a href="index.html">
							<img alt="Porto" src="img/logo.png">
						</a>
					</h1>
					<div class="search">
						<form class="form-search" id="searchForm" action="page-search-results.html" method="get">
							<div class="control-group">
								<input type="text" class="input-medium search-query" name="q" id="q" placeholder="Rechercher...">
								<button class="search" type="submit"><i class="icon-search"></i></button>
							</div>
						</form>
					</div>
					<nav>
						<ul class="nav nav-pills nav-top">
							<li>
								<a href="about-us.html"><i class="icon-angle-right"></i>A propos</a>
							</li>
							<li>
								<a href="membres/deconnexion.php"><i class="icon-angle-right"></i>Se déconnecter</a>
							</li>
							<li class="phone">
								<span><i class="icon-phone"></i>0685482904</span>
							</li>
						</ul>
					</nav>
					<div class="social-icons">
						<ul class="social-icons">
							<li class="facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook">Facebook</a></li>
							<li class="twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter">Twitter</a></li>
							<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">Linkedin</a></li>
						</ul>
					</div>
					<nav>
						<ul class="nav nav-pills nav-main" id="mainMenu">
							<li class="dropdown active">
								<a class="dropdown-toggle" href="index.html">
									Accueil
									<i class="icon-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="index.html">Particuliers</a></li>
									<li><a href="index-2.html">Professionnels</a></li>
									<li><a href="index-2.html">Les deux</a></li>
								</ul>
							</li>
							<li>
								<a href="about-us.html">Carte</a>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#">
									Catégories
									<i class="icon-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
									

									<li class="dropdown-submenu">	
										<a href="#">Véhicule</a>
										<ul class="dropdown-menu">
											<li><a href="blog-full-width.html">Voiture</a></li>
											<li><a href="blog-large-image.html">Moto</a></li>
											<li><a href="blog-medium-image.html">Caravaning</a></li>
											<li><a href="blog-post.html">Autres</a></li>
										</ul>
										</li>

									<li class="dropdown-submenu">
									<a href="#">Immobilier</a>
									<ul class="dropdown-menu">
											<li><a href="blog-full-width.html">Vente</a></li>
											<li><a href="blog-large-image.html">Location</a></li>
											<li><a href="blog-medium-image.html">Autres</a></li>
										
										</ul>
										</li>

									<li class="dropdown-submenu">
									<a href="#">Maison</a>
									<ul class="dropdown-menu">
											<li><a href="blog-full-width.html">Smartphone</a></li>
											<li><a href="blog-large-image.html">Basique</a></li>
											<li><a href="blog-medium-image.html">Accessoire</a></li>
											<li><a href="blog-post.html">Autres</a></li>
										</ul>
										</li>

									<li class="dropdown-submenu">
										<a href="#">Habillement</a>
										<ul class="dropdown-menu">
											<li><a href="#">Filles</a></li>
											<li><a href="#">Garçons</a></li>
											<li><a href="#">Enfants</a></li>
											<li><a href="#">Bébé</a></li>
										</ul>
									</li>

									
									<li class="dropdown-submenu">
									<a href="#">Téléphonie</a>
									<ul class="dropdown-menu">
											<li><a href="blog-full-width.html">Smartphone</a></li>
											<li><a href="blog-large-image.html">Basique</a></li>
											<li><a href="blog-medium-image.html">Accessoires</a></li>
											<li><a href="blog-post.html">Autres</a></li>
										</ul>
										</li>

									<li class="dropdown-submenu">
									<a href="#">Jeux vidéo</a>
									<ul class="dropdown-menu">
											<li><a href="blog-full-width.html">Console de salon</a></li>
											<li><a href="blog-large-image.html">Console portable</a></li>
											<li><a href="blog-medium-image.html">Ordinateur</a></li>
											<li><a href="blog-post.html">Accessoires</a></li>
											<li><a href="blog-post.html">Autres</a></li>
										</ul>
										</li>

									<li class="dropdown-submenu">
									<a href="#">Emploi</a>
									<ul class="dropdown-menu">
											<li><a href="blog-full-width.html">CDI</a></li>
											<li><a href="blog-large-image.html">CDD</a></li>
											<li><a href="blog-medium-image.html">Temporaire</a></li>
											<li><a href="blog-post.html">Stage/Etudiant</a></li>
											<li><a href="blog-post.html">Associatif</a></li>
										</ul>
										</li>

									<li class="dropdown-submenu">
									<a href="#">Loisirs</a>
									<ul class="dropdown-menu">
											<li><a href="blog-full-width.html">Animaux</a></li>
											<li><a href="blog-large-image.html">DVD</a></li>
											<li><a href="blog-medium-image.html">Musique</a></li>
											<li><a href="blog-post.html">Livre</a></li>
											<li><a href="blog-post.html">Jouets</a></li>
										</ul>
										</li>

									
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" href="#">
									Rechercher
								</a>
								
							</li>
							<li>
								<a href="contact-us.html">Contactez nous</a>
							</li>
						</ul>
					</nav>
				</div>
			</header>

			<div role="main" class="main">
				<div id="content" class="content full">

					<div class="slider-container">
						<div class="slider" id="revolutionSlider">
							<ul>
								<li data-transition="slidedown" data-slotamount="10" data-masterspeed="300">
									<img src="img/slides/slide-bg.jpg" data-fullwidthcentering="on" alt="">

										<div class="caption sft stb visible-desktop"
											 data-x="42"
											 data-y="180"
											 data-speed="1000"
											 data-start="1000"
											 data-easing="easeOutExpo"><img src="img/slides/slide-title-border.png" alt=""></div>

										<div class="caption bottom-label lfl stl"
											 data-x="92"
											 data-y="180"
											 data-speed="300"
											 data-start="500"
											 data-easing="easeOutExpo">Félicitations!</div>

										<div class="caption sft stb visible-desktop"
											 data-x="222"
											 data-y="180"
											 data-speed="300"
											 data-start="1000"
											 data-easing="easeOutExpo"><img src="img/slides/slide-title-border.png" alt=""></div>

										<div class="caption main-label sft stb"
											 data-x="100"
											 data-y="230"
											 data-speed="300"
											 data-start="1500"
											 data-easing="easeOutExpo"><?php echo htmlentities(trim($_SESSION['login'])); ?></div>

										<div class="caption bottom-label sft stb"
											 data-x="42"
											 data-y="280"
											 data-speed="500"
											 data-start="2000"
											 data-easing="easeOutExpo">Vous avez maintenant accés à votre affaire</div>
										<div class="caption right-label sft stb"
											 data-x="592"
											 data-y="150"
											 data-speed="500"
											 data-start="2500"
											 data-easing="easeOutExpo"><a href="ajouter.php" class="btn btn-large btn-primary"><i class="icon-folder-open-alt"></i> Ajouter des articles</a></div>
										 <div class="caption right-label sft stb"
											 data-x="592"
											 data-y="200"
											 data-speed="500"
											 data-start="3000"
											 data-easing="easeOutExpo"><a href="gerer.php" class="btn btn-large btn-primary"><i class="icon-shopping-cart"></i> Gérer mon affaire</a></div>
										<div class="caption right-label sft stb"
											 data-x="592"
											 data-y="250"
											 data-speed="500"
											 data-start="3500"
											 data-easing="easeOutExpo"><a href="valeur.php" class="btn btn-large btn-primary"><i class="icon-magic"></i> Mise en valeur</a></div>
										 <div class="caption right-label sft stb"
											 data-x="592"
											 data-y="300"
											 data-speed="500"
											 data-start="4000"
											 data-easing="easeOutExpo"><a href="personnaliser.php" class="btn btn-large btn-primary"><i class="icon-home"></i> Personnaliser mon affaire</a></div>
										
										
							</ul>
							
						</div>
					</div>

					<div class="home-intro">
						<div class="container">
							<div class="row">
								<div class="span8">

									
										
										
								</div>
								<div class="span4">
									<div class="get-started">
										<a href="index.php" class="btn btn-large btn-primary"><i class="icon-off"></i> Se déconnecter</a>
										

												
											</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
<!-- Il faut mettre un menu déroulant caroussel avec les dernières annonces-->
			<footer>
				<div class="container">
					<div class="row">
						<div class="footer-ribon">
							<span>Contact</span>
						</div>
						<div class="span3">
							<h4>Newsletter</h4>
							<p>Inscrivez-vous à notre lettre des abonnés afin de recevoir avant tout le monde les dernières nouvelles et mises à jour du site. </p>


							<div class="alert alert-success hidden" id="newsletterSuccess">
								<strong>Félicitations</strong> Vous avez bien été ajouté à notre lettre des abonnés
							</div>

							<div class="alert alert-error hidden" id="newsletterError"></div>

							<form class="form-inline" id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
								<div class="control-group">
									<div class="input-append">
										<input class="span2" placeholder="Adresse email" name="email" id="email" type="text">
										<button class="btn" type="submit">Go!</button>
									</div>
								</div>
							</form>
						</div>
						<div class="span3">
							<h4>Derniers Tweets</h4>
							<div id="tweet" class="twitter">
								<p>Veuillez patienter...</p>
							</div>
						</div>
						<div class="span4">
							<div class="contact-details">
								<h4>Gardons le contact</h4>
								<ul class="contact">
									<li><p><i class="icon-map-marker"></i> <strong>Adresse:</strong>Rue du commandant tifriss</p></li>
									<li><p><i class="icon-phone"></i> <strong>Téléphone:</strong> 0685482904</p></li>
									<li><p><i class="icon-envelope"></i> <strong>Email:</strong> <a href="mailto:contact@laffaireafaire.fr">contact@laffaireafaire.fr</a></p></li>
								</ul>
							</div>
						</div>
						<div class="span2">
							<h4>Suivez-nous</h4>
							<div class="social-icons">
								<ul class="social-icons">
									<li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
									<li class="twitter"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
									<li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="span1">
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" src="img/logo-footer.png">
								</a>
							</div>
							<div class="span7">
								<p>© Copyright 2014. Tous droits réservés.</p>
							</div>
							<div class="span4">
								<nav id="sub-menu">
									<ul>
										<li><a href="page-faq.html">FAQ's</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Libs -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="vendor/jquery.js"><\/script>')</script>
		<script src="vendor/jquery.easing.js"></script>
		<script src="vendor/jquery.cookie.js"></script>
		<!-- <script src="master/style-switcher/style.switcher.js"></script> -->
		<script src="vendor/bootstrap.js"></script>
		<script src="vendor/selectnav.js"></script>
		<script src="vendor/twitterjs/twitter.js"></script>
		<script src="vendor/revolution-slider/js/jquery.themepunch.plugins.js"></script>
		<script src="vendor/revolution-slider/js/jquery.themepunch.revolution.js"></script>
		<script src="vendor/flexslider/jquery.flexslider.js"></script>
		<script src="vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
		<script src="vendor/fancybox/jquery.fancybox.js"></script>
		<script src="vendor/jquery.validate.js"></script>

		<script src="js/plugins.js"></script>

		<!-- Current Page Scripts -->
		<script src="js/views/view.home.js"></script>

		<!-- Theme Initializer -->
		<script src="js/theme.js"></script>

		<!-- Custom JS -->
		<script src="js/custom.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
		<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->

	</body>
</html>
