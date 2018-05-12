<?php
/**
 * Template part for displaying a single project
 */
?>

<div class="inner-content">

	<div class="content-row project-information">
	<!-- grid-x grid-margin-x grid-padding-x -->

		<main class="main" role="main">
			 <!-- small-12 large-8 medium-8 cell -->

			<?php
			if ( !has_post_thumbnail() ) { ?>
				<header class="article-header">
					<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
				<?php
				if ( is_singular( 'cp-project' ) ) { ?>
					<p><?php the_excerpt(); ?></p>
				<?php } ?>
			    </header> <!-- end article header -->
			<?php } ?>

		    <section class="entry-content" itemprop="articleBody">
				<?php the_content(); ?>
			</section> <!-- end article section -->

		</main> <!-- end #main -->

		<?php get_template_part( 'parts/loop', 'single-project-sidebar' ); ?>

	</div> <!-- end project-information -->

	<?php get_template_part( 'parts/loop', 'single-project-meta' ); ?>

	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<?php //comments_template(); ?>

</div> <!-- end #inner-content -->

