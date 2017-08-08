<?php get_header(); ?>

<main id="main" class="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>

		<?php endwhile; else : ?>
		
			<p class="query-no-result">Aucun résultat.</p>

		<?php endif; ?>
</main>

<?php get_footer(); ?>