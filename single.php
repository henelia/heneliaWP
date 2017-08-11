<?php get_header(); ?>

<main id="main" class="main post">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<p class="post-infos">
				<strong>Date :</strong> <time class="pub-date post-resume-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> 
				<?php /* Si les catégories sont activé dans le plugin [He] Config */
				if ( !isset( $heCustomOptions['he-post-categories'] ) ) { ?>
					| <strong>Catégorie :</strong> <?php the_category( ', ' ); ?>
				<?php } ?>
				<?php the_tags( ' | <strong>Tag :</strong> ', ', ', ''); ?>
			</p>
			<?php the_post_thumbnail(); ?>
			<div class="wp-wysiwyg">
				<?php the_content(); ?>
			</div>

		<?php endwhile; else : ?>
		
			<p class="query-no-result">Aucun résultat.</p>

		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>