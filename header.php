<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="utf-8" />

	<!-- Title -->
	<title><?php wp_title(''); ?></title>

	<?php 
		$title = get_bloginfo();
	?>
	
	<!-- Applications Name -->
	<meta name="application-name" content="<?php echo $title; ?>"/>

	<!-- Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- Color navigator & apps -->
	<meta name="theme-color" content="#f04840">
	<meta name="msapplication-TileColor" content="#f04840" />

	<!-- Favicon & Icon apps -->
	<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon/favicon.ico" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon/favicon-128.png" sizes="128x128" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon/favicon-16x16.png" sizes="16x16" />
	
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/images/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/images/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/images/favicon/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/images/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/images/favicon/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/images/favicon/apple-touch-icon-152x152.png" />

	<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/images/favicon/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="<?php bloginfo('template_directory'); ?>/images/favicon/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="<?php bloginfo('template_directory'); ?>/images/favicon/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="<?php bloginfo('template_directory'); ?>/images/favicon/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="<?php bloginfo('template_directory'); ?>/images/favicon/mstile-310x310.png" />

	<!-- Wordpress head & modules -->
	<?php wp_head(); ?>
	
	<?php if ( function_exists('he_analytics') ) {
		he_analytics();
	} ?>


</head>
<body class="<?php display_body_class(); ?>">
	<ul class="skip-nav no-print">
		<?php if(!is_home()) { ?><li><a href="/" title="Retour à la page d'accueil">Accueil</a></li><?php } ?>
		<li><a href="#primary-nav" title="Accès à la navigation">Navigation principale</a></li>
		<li><a href="#main" title="Accès direct au contenu">Contenu</a></li>
	</ul>
	<!--[if lte IE 9]><div class="alert-ie"><p class="mt0"><strong>Attention ! </strong> Votre navigateur (Internet Explorer 9 ou inférieur) présente de sérieuses lacunes en terme de sécurité et de performances, dues à son obsolescence. En conséquence, ce site sera consultable mais de manière moins optimale qu'avec un navigateur récent&nbsp;: <a href="http://www.browserforthebetter.com/download.html">Internet&nbsp;Explorer&nbsp;10 et +</a>, <a href="http://www.mozilla.org/fr/firefox/new/">Firefox</a>, <a href="https://www.google.com/intl/fr/chrome/browser/">Chrome</a>, <a href="http://www.apple.com/fr/safari/">Safari</a>,...</p></div><![endif]-->
	<header class="header">
		<a href="/" class="logo" title="<?php echo $title; ?>">
			<?php echo file_get_contents(get_bloginfo('template_directory').'/images/logo.svg'); ?>
		</a>
		<?php display_secondary_nav() ?>
		<?php display_primary_nav() ?>
	</header>