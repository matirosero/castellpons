<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-article'); ?> role="article">

	<div class="news-article-image">
		<?php the_post_thumbnail('full'); ?>
	</div>

	<div class="news-article-content">
		<header class="article-header">
			<h2 class="article-title"><?php the_title(); ?></h2>
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