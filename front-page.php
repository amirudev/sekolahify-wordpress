<?php get_header(); ?>
	<main>
		<section class="hero">
			<?php 
			$post_highlighted = new WP_Query(
				array(
					'post_type' => 'post',
					'posts_per_page' => 5,
				)
			);

			if($post_highlighted->have_posts()): ?>
				<div class="splide">
				  <div class="splide__track">
						<ul class="splide__list">
				<?php while($post_highlighted->have_posts()):
					$post_highlighted->the_post();
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
					if($url): ?>
						<li class="splide__slide">
							<img src="<?php echo $url ?>">
							<div class="highlighted-news__slide-item">
								<div class="content-container">
									<a href="<?= get_post_permalink() ?>">
										<h3><?= get_the_title() ?></h3>
										<p><?= get_the_excerpt() ?></p>
									</a>
								</div>
							</div>
						</li>
					<?php endif;
					?>
				<?php endwhile; ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
		</section>
		<section class="main-content">
			<div class="content-container">
				<div class="content">
					<article>
						
					</article>
				</div>
				<?php get_sidebar() ?>
			</div>
		</section>
	</main>
<?php get_footer(); ?>