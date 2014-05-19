<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
	// on teste les deux mots de passe
	if ($_POST['pass'] != $_POST['pass_confirm']) {
		$erreur = 'Les 2 mots de passe sont différents.';
	}
	else {
		$base = mysql_connect ('localhost', 'root', '');
		mysql_select_db ('affaire', $base);

		// on recherche si ce login est déjà utilisé par un autre membre
		$sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_real_escape_string($_POST['login']).'"';
		$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$data = mysql_fetch_array($req);

		if ($data[0] == 0) {
		$sql = 'INSERT INTO membre VALUES("", "'.mysql_real_escape_string($_POST['login']).'", "'.mysql_real_escape_string($_POST['mail']).'", "'.mysql_real_escape_string(md5($_POST['pass'])).'", "'.mysql_real_escape_string(md5($_POST['pass_confirm'])).'", "'.mysql_real_escape_string($_POST['nom']).'", "'.mysql_real_escape_string($_POST['prenom']).'", "'.mysql_real_escape_string($_POST['adresse']).'", "'.mysql_real_escape_string($_POST['telephone']).'") ' ;
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: login.php');
		exit();
		}
		else {
		$erreur = 'Un membre possède déjà ce login.';
		}
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>


<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->

	<head>

	<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$base = mysql_connect ('localhost', 'root', '');
	mysql_select_db ('affaire', $base);

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_real_escape_string($_POST['login']).'" AND pass_md5="'.mysql_real_escape_string(md5($_POST['pass'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);

	mysql_free_result($req);
	mysql_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: http://localhost/porto/HTML/login.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = 'Compte non reconnu.';
	}
	// sinon, alors la, il y a un gros problème :)
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>

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
								<a href="login.html"><i class="icon-angle-right"></i>Mon compte</a>
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
									
								</a>
							</li>
							<li>
								<a href="magasin/shop.html">Carte</a>
							</li>
							<li>
								<a href="articles.html">Articles</a>
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
								
							<form action="inscription.php" method="post">
Nom de l'affaire: <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
Adresse email : <input type="email" name="mail" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>"><br />
Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
Confirmation du mot de passe : <input type="password" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
Nom : <input type="text" name="nom" value="<?php if (isset($_POST['nom'])) echo htmlentities(trim($_POST['nom'])); ?>"><br />
Prénom : <input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlentities(trim($_POST['prenom'])); ?>"><br />
Adresse <input type="text" name="adresse" value="<?php if (isset($_POST['adresse'])) echo htmlentities(trim($_POST['adresse'])); ?>"><br />
Téléphone : <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="telephone" value="<?php if (isset($_POST['telephone'])) echo htmlentities(trim($_POST['telephone'])); ?>"><br />
<input type="submit" name="inscription" value="Inscription">
</form>

								
							</ul>
							
							</div>
						</div>
					</div>

					<div class="home-intro">
						<div class="container">

							<div class="row">
								<div class="span8">
									<p>
										La seule solution pour créer votre affaire <em>Gratuitement.</em>
										<span>Créez. Vendez. C'est facile et rapide!</span>
									</p>
								</div>
								<div class="span4">
									<div class="get-started">
									
										
										
										
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="container">

						<div class="row center">
							<div class="span12">
								<h2 class="short">Porto is <strong class="inverted">incredibly</strong> beautiful and fully responsive.</h2>
								<p class="featured lead">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie vestibulum.
								</p>
							</div>
						</div>

					</div>

					<div class="home-concept">
						<div class="container">

							<div class="row center">
								<span class="sun"></span>
								<span class="cloud"></span>
								<div class="span2 offset1">
									<div class="process-image">
										<img src="img/home-concept-item-1.png" alt="" />
										<strong>Strategy</strong>
									</div>
								</div>
								<div class="span2">
									<div class="process-image">
										<img src="img/home-concept-item-2.png" alt="" />
										<strong>Planning</strong>
									</div>
								</div>
								<div class="span2">
									<div class="process-image">
										<img src="img/home-concept-item-3.png" alt="" />
										<strong>Build</strong>
									</div>
								</div>
								<div class="span4 offset1">
									<div class="project-image">
										<div id="fcSlideshow" class="fc-slideshow">
											<ul class="fc-slides">
												<li><a href="portfolio-single-project.html"><img src="img/projects/project-home-1.jpg" /></a></li>
												<li><a href="portfolio-single-project.html"><img src="img/projects/project-home-2.jpg" /></a></li>
											</ul>
										</div>
										<strong class="our-work">Our Work</strong>
									</div>
								</div>
							</div>

							<hr class="tall" />

						</div>
					</div>

					<div class="container">

						<div class="row">
							<div class="span8">
								<h2>Our <strong>Features</strong></h2>
								<div class="row">
									<div class="span4">
										<div class="feature-box">
											<div class="feature-box-icon">
												<i class="icon-group"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter">Customer Support</h4>
												<p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
											</div>
										</div>
										<div class="feature-box">
											<div class="feature-box-icon">
												<i class="icon-file"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter">HTML5 / CSS3 / JS</h4>
												<p class="tall">Lorem ipsum dolor sit amet, adip.</p>
											</div>
										</div>
										<div class="feature-box">
											<div class="feature-box-icon">
												<i class="icon-google-plus"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter">500+ Google Fonts</h4>
												<p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
											</div>
										</div>
										<div class="feature-box">
											<div class="feature-box-icon">
												<i class="icon-adjust"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter">Colors</h4>
												<p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="feature-box">
											<div class="feature-box-icon">
												<i class="icon-film"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter">Sliders</h4>
												<p class="tall">Lorem ipsum dolor sit amet, consectetur.</p>
											</div>
										</div>
										<div class="feature-box">
											<div class="feature-box-icon">
												<i class="icon-ok"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter">Icons</h4>
												<p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
											</div>
										</div>
										<div class="feature-box">
											<div class="feature-box-icon">
												<i class="icon-reorder"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter">Buttons</h4>
												<p class="tall">Lorem ipsum dolor sit, consectetur adip.</p>
											</div>
										</div>
										<div class="feature-box">
											<div class="feature-box-icon">
												<i class="icon-desktop"></i>
											</div>
											<div class="feature-box-info">
												<h4 class="shorter">Lightbox</h4>
												<p class="tall">Lorem sit amet, consectetur adip.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="span4">
								<h2>and more...</h2>
								<div class="accordion" id="accordion">
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="icon-lightbulb"></i> Group Item #1</a>
										</div>
										<div id="collapseOne" class="accordion-body collapse in">
											<div class="accordion-inner">
												Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor odio vulputate eleifend in in tortorodio vulputate eleifend in in tortor.
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="icon-bell-alt"></i> Group Item #2</a>
										</div>
										<div id="collapseTwo" class="accordion-body collapse">
											<div class="accordion-inner">
												Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="icon-laptop"></i> Group Item #3</a>
										</div>
										<div id="collapseThree" class="accordion-body collapse">
											<div class="accordion-inner">
												Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<hr class="tall" />

						<div class="row center">
							<div class="span12">
								<h2 class="short">We're not the only ones <strong>excited</strong> about Porto Template...</h2>
								<h4 class="lead tall">5,500 customers in 100 countries use Porto Template. Meet our customers.</h4>
							</div>
						</div>
						<div class="row center">
							<div class="flexslider unstyled" data-plugin-options='{"directionNav":false, "animation":"slide", "slideshow": false, "maxVisibleItems": 6}'>
								<ul class="slides">
									<li>
										<div class="span2">
											<img class="mobile-max-width small" src="img/logo-client-1.jpg" alt="">
										</div>
									</li>
									<li>
										<div class="span2">
											<img class="mobile-max-width small" src="img/logo-client-2.jpg" alt="">
										</div>
									</li>
									<li>
										<div class="span2">
											<img class="mobile-max-width small" src="img/logo-client-3.jpg" alt="">
										</div>
									</li>
									<li>
										<div class="span2">
											<img class="mobile-max-width small" src="img/logo-client-4.jpg" alt="">
										</div>
									</li>
									<li>
										<div class="span2">
											<img class="mobile-max-width small" src="img/logo-client-5.jpg" alt="">
										</div>
									</li>
									<li>
										<div class="span2">
											<img class="mobile-max-width small" src="img/logo-client-6.jpg" alt="">
										</div>
									</li>
									<li>
										<div class="span2">
											<img class="mobile-max-width small" src="img/logo-client-4.jpg" alt="">
										</div>
									</li>
									<li>
										<div class="span2">
											<img class="mobile-max-width small" src="img/logo-client-2.jpg" alt="">
										</div>
									</li>
								</ul>
							</div>
						</div>

					</div>

					<div class="map-section">
						<section class="featured footer map">
							<div class="container">
								<div class="row">
									<div class="span6">
										<div class="recent-posts">
											<h2>Latest <strong>Blog</strong> Posts</h2>
											<div class="row">
												<div class="flexslider unstyled" data-plugin-options='{"directionNav":false, "animation":"slide"}'>
													<ul class="slides">
														<li>
															<div class="span3">
																<article>
																	<div class="date">
																		<span class="day">15</span>
																		<span class="month">Jan</span>
																	</div>
																	<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
																</article>
															</div>
															<div class="span3">
																<article>
																	<div class="date">
																		<span class="day">15</span>
																		<span class="month">Jan</span>
																	</div>
																	<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
																</article>
															</div>
														</li>
														<li>
															<div class="span3">
																<article>
																	<div class="date">
																		<span class="day">12</span>
																		<span class="month">Jan</span>
																	</div>
																	<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
																</article>
															</div>
															<div class="span3">
																<article>
																	<div class="date">
																		<span class="day">11</span>
																		<span class="month">Jan</span>
																	</div>
																	<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
																</article>
															</div>
														</li>
														<li>
															<div class="span3">
																<article>
																	<div class="date">
																		<span class="day">15</span>
																		<span class="month">Jan</span>
																	</div>
																	<h4><a href="blog-post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat libero. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
																</article>
															</div>
															<div class="span3">
																<article>
																	<div class="date">
																		<span class="day">15</span>
																		<span class="month">Jan</span>
																	</div>
																	<h4><a href="blog-post.html">Lorem ipsum dolor</a></h4>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. <a href="/" class="read-more">read more <i class="icon-angle-right"></i></a></p>
																</article>
															</div>
														</li>
													</ul>
												</div>
												<div class="row">
													<div class="span6">
														<a class="btn btn-flat btn-mini btn-primary pull-right pull-bottom-phone" href="#">View All Posts <i class="icon-arrow-right"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="span6">
										<h2><strong>What</strong> Client’s Say</h2>
										<div class="row">
											<div class="flexslider flexslider-top-title unstyled" data-plugin-options='{"controlNav":false, "slideshow": false, "animationLoop": true, "animation":"slide"}'>
												<ul class="slides">
													<li>
														<div class="span6">
															<blockquote class="testimonial">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.  Donec hendrerit vehicula est, in consequat.  Donec hendrerit vehicula est, in consequat.</p>
															</blockquote>
															<div class="testimonial-arrow-down"></div>
															<div class="testimonial-author">
																<div class="thumbnail thumbnail-small">
																	<img src="img/clients/client-1.jpg" alt="">
																</div>
																<p><strong>John Smith</strong><span>CEO & Founder - Red Wine</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="span6">
															<blockquote class="testimonial">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
															</blockquote>
															<div class="testimonial-arrow-down"></div>
															<div class="testimonial-author">
																<div class="thumbnail thumbnail-small">
																	<img src="img/clients/client-1.jpg" alt="">
																</div>
																<p><strong>John Smith</strong><span>CEO & Founder - Crivos</span></p>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>

			<footer>
				<div class="container">
					<div class="row">
						<div class="footer-ribon">
							<span>Contact</span>
						</div>
						<div class="span3">
							<h4>Newsletter</h4>
							<p>Inscrivez-vous à notre lettre des abonnés afin de recevoir avant tout le monde les dernières nouvelles et mises à jour du site.</p>

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
									<img alt="Porto" src="img/logo.png">
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
