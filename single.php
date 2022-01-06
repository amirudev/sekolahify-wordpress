<?php get_header() ?>
<main class="page post-page">
		<section class="hero">
            <?php the_post_thumbnail(); ?>
			<div class="hero__breadcrumb">
				<div class="content-container">
					<!-- <p><b><a href="#">Beranda</a> > <a href="#">Profil</a> > Program Studi</b></p> -->
					<h2><b><?php echo get_the_title() ?></b></h2>
				</div>
			</div>
		</section>
		<section class="main-content">
			<div class="content-container">
				<div class="content">
            		<?php the_content(); ?>					
				</div>
				<?php get_sidebar() ?>
			</div>
		</section>
	</main>
<?php get_footer() ?>