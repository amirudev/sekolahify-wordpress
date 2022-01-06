<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SEKOLAHIFY</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header>
		<div class="information">
			<div class="content-container">
				<p><b>NEWS UPDATE: </b>SMKN 1 GUNUNGPUTRI ...</p>
				<p>12:00:00 29 Desember 2021</p>
			</div>
		</div>
		<div class="header-title">
			<div class="content-container">
				<div class="header-logo__container">
					<?php
					function_exists('the_custom_logo') {
						the_custom_logo()
					}
					?>
				</div>
				<div class="header-title__name">
					<h1><?php bloginfo( 'name' ); ?></h1>
					<p>Jl. Raya Kh. Umar Rawa Ilat, Cileungsi, Bogor, Jawa Barat, Indonesia</p>
				</div>
			</div>
		</div>
		<nav class="floating-navbar top">
			<div class="content-container">
				<div class="navbar-logo">
					<?php
					function_exists('the_custom_logo') {
						the_custom_logo()
					}
					?>
					<div class="navbar-logo__title">
						<p class="navbar-logo__name"><?php bloginfo( 'name' ); ?></p>
						<p>Jl. Raya Kh. Umar Rawa Ilat, Cileungsi, Bogor, Jawa Barat, Indonesia</p>
					</div>
				</div>
				<ul>
					<li>
						<a href="#">Beranda</a>
					</li>
					<li>
						<a href="#">Beranda</a>
					</li>
					<li>
						<a href="#">Beranda</a>
					</li>
					<li>
						<ul class="floating-navbar__dropdown">
							<li>
								<a href="#">Program</a>
							</li>
							<li>
								<a href="#">Studi</a>
							</li>
							<li>
								<a href="#">Kegiatan</a>
							</li>
						</ul>
						<a href="#">Profil</a>
					</li>
					<li>
						<!-- <ul class="floating-navbar__dropdown">
							<li>
								<a href="#">Program</a>
							</li>
							<li>
								<a href="#">Studi</a>
							</li>
							<li>
								<a href="#">Kegiatan</a>
							</li>
						</ul> -->
						<a href="#">Akademik</a>
					</li>
					<li>
						<ul class="floating-navbar__dropdown">
							<li>
								<a href="#">Program</a>
							</li>
							<li>
								<a href="#">Studi</a>
							</li>
							<li>
								<a href="#">Kegiatan</a>
							</li>
						</ul>
						<a href="#">Ekstrakulikuler</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>