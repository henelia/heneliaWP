<?php get_header(); ?>

<main id="main" class="main archive-page">
	<div class="container">
		<?php
			the_archive_title( '<h1>', '</h1>' );
			the_archive_description( '<div class="taxonomy-description wp-wysiwyg">', '</div>' );
		?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="post-resume">
				<div class="post-resume-img">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>
				<div class="post-resume-content">
					<h2><a href="<?php the_permalink(); ?>" title="Lire la suite de <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p class="post-resume-infos">
						<strong>Date :</strong> <time class="pub-date post-resume-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time> 
						<?php /* Si les catégories sont activé dans le plugin [He] Config */
						if ( !isset( $heCustomOptions['he-post-categories'] ) ) { ?>
							| <strong>Catégorie :</strong> <?php the_category( ', ' ); ?>
						<?php } ?>
						<?php the_tags( ' | <strong>Tag :</strong> ', ', ', ''); ?></p>
					<?php the_excerpt(); ?>
					<div class="text-right">
						<a href="<?php the_permalink(); ?>" title="Lire la suite de <?php the_title(); ?>" class="btn btn-default">Lire la suite</a>
					</div>
				</div>
			</article>
		<?php endwhile; else : ?>
		
			<p class="query-no-result">Aucun résultat.</p>

		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>