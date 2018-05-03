<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-x grid-margin-x grid-padding-x'); ?> role="article">

	<div class="article-image small-12 medium-4 cell">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
	</div>

	<div class="article-content small-12 medium-8 cell">
		<header class="article-header">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php get_template_part( 'parts/content', 'byline' ); ?>
		</header> <!-- end article header -->

		<section class="entry-content" itemprop="articleBody">
			
			<?php the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?>
		</section> <!-- end article section -->

		<footer class="article-footer">
	    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
		</footer> <!-- end article footer -->
	</div>

</article> <!-- end article -->