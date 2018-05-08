<?php
/**
 * Template part for displaying a single project
 */
?>

<div class="inner-content">

	<div class="content-row">
	<!-- grid-x grid-margin-x grid-padding-x -->

		<main class="main" role="main">
			 <!-- small-12 large-8 medium-8 cell -->

			<header class="article-header">
				<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
				<?php get_template_part( 'parts/content', 'byline' ); ?>
		    </header> <!-- end article header -->

		    <section class="entry-content" itemprop="articleBody">
				<?php the_post_thumbnail('full'); ?>
				<?php the_content(); ?>
			</section> <!-- end article section -->

			<footer class="article-footer">
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
				<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
			</footer> <!-- end article footer -->

			<?php comments_template(); ?>

		</main> <!-- end #main -->

		<div id="sidebar1" class="sidebar" role="complementary">
			<!-- small-12 medium-4 large-4 cell -->

			Sidebar

		</div>

	</div> <!-- end article -->

</div> <!-- end #inner-content -->

