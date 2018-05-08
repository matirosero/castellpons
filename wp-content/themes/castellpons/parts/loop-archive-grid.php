<?php
/**
 * The template part for displaying a grid of posts
 *
 * For more info: http://jointswp.com/docs/grid-archive/
 */

// Adjust the amount of rows in the grid
$grid_columns = 4; ?>

<?php if( 0 === ( $wp_query->current_post  )  % $grid_columns ): ?>

    <div class="grid-x grid-margin-x grid-padding-x archive-grid" > <!--Begin Grid-->

<?php endif; ?>

		<!--Item: -->
		<div class="small-2 medium-3 large-3 cell panel">

			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

				<section class="featured-image" itemprop="articleBody">
					<?php the_post_thumbnail('full'); ?>
				</section> <!-- end article section -->

				<header class="article-header">
					<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				</header> <!-- end article header -->

			</article> <!-- end article -->

		</div>

<?php if( 0 === ( $wp_query->current_post + 1 )  % $grid_columns ||  ( $wp_query->current_post + 1 ) ===  $wp_query->post_count ): ?>

   </div>  <!--End Grid -->

<?php endif; ?>

