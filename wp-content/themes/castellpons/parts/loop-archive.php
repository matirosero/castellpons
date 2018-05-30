<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-article small-margin-collapse small-padding-collapse'); ?> role="article">

	<div class="news-article-image">
		<?php the_post_thumbnail('news-list-image-full'); ?>
	</div>

	<div class="news-article-inner">
		<div class="news-article-content">
			<header class="article-header">
				<h2 class="article-title"><?php the_title(); ?></h2>
				<?php //get_template_part( 'parts/content', 'byline' ); ?>
			</header> <!-- end article header -->

			<section class="entry-content" itemprop="articleBody">

				<?php the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?>

			</section> <!-- end article section -->
		</div>

		<footer class="article-footer">
			<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
	    	<a href="#" class="button news-article-project-btn"><?php _e( 'See project', 'jointswp' );?></a>
		</footer> <!-- end article footer -->

	</div>



</article> <!-- end article -->