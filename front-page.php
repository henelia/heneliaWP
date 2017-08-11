<?php get_header(); ?>

<main id="main" class="main homepage">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<h1><?php the_title(); ?></h1>
			<div class="wp-wysiwyg">
				<?php the_content(); ?>
			</div>
		
		<?php endwhile; else : ?>
		
			<p class="query-no-result">Aucun résultat.</p>

		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>