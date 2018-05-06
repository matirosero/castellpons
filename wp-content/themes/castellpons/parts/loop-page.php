<?php
/**
 * Template part for displaying page content in page.php
 */
?>



<div class="inner-content">

	<div class="content-row">
	<!-- grid-x grid-margin-x grid-padding-x -->

		<main class="main" role="main">
			 <!-- small-12 large-8 medium-8 cell -->

			<?php
			if ( !has_post_thumbnail() ) { ?>
				<header class="article-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header> <!-- end article header -->
			<?php } ?>

		    <section class="entry-content" itemprop="articleBody">
			    <?php the_content(); ?>
			</section> <!-- end article section -->

			<footer class="article-footer">
				 <?php wp_link_pages(); ?>
			</footer> <!-- end article footer -->

			<?php comments_template(); ?>

		</main> <!-- end #main -->

		<div id="sidebar1" class="sidebar" role="complementary">
			<!-- small-12 medium-4 large-4 cell -->

			<?php
		    $content = get_post_meta( get_the_ID(), 'mro_cp_page_sidebar', true );
		    // var_dump($content);
		    cp_content_filter( $content );
		    ?>

		</div>

	</div> <!-- end article -->

</div> <!-- end #inner-content -->

