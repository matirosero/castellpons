<?php
/**
 * Template part for displaying page content in page.php
 */
?>



<div class="inner-content">

	<div class="content-row">
	<!-- grid-x grid-margin-x grid-padding-x -->

		<main id="main" class="main" role="main" data-aos="fade-up" data-aos-offset="-200">
			 <!-- small-12 large-8 medium-8 cell -->

			<?php
			if ( !has_post_thumbnail() ) { ?>
				<header class="article-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header> <!-- end article header -->
			<?php } ?>

		    <section class="entry-content" itemprop="articleBody">
			    <?php the_content(); ?>

			    <?php
			    if ( is_page_template( 'template-iconsbox.php' ) ) { ?>

			    	<div class="callout icon-box" data-aos="fade-up">

			    		<?php
			    		if ( get_post_meta( get_the_ID(), 'mro_cp_iconsbox_title', true ) ) {
			    			 echo '<h3>' . get_post_meta( get_the_ID(), 'mro_cp_iconsbox_title', true ) . '</h3>';
			    		}

			    		if ( get_post_meta( get_the_ID(), 'mro_cp_iconsbox_title', true ) ) {

			    			$icons = get_post_meta( get_the_ID(), 'mro_cp_iconsbox_icon_group', true );

			    			echo '<ul>';

			    			foreach ( $icons as $icon ) {
			    				echo '<li>
			    					<div class="icon"><img src="' . $icon['icon'] . '" alt="" /></div>
			    					<p>' . $icon['description'] . '</p>
			    					</li>';
			    			}

			    			echo '</ul>';

			    		} else { echo 'no'; }
			    		?>

			    	</div>

			    <?php } ?>
			</section> <!-- end article section -->

			<footer class="article-footer">
				 <?php wp_link_pages(); ?>
			</footer> <!-- end article footer -->


		</main> <!-- end #main -->

		<div id="sidebar1" class="sidebar" role="complementary" data-aos="fade-up" data-aos-offset="-200">
			<!-- small-12 medium-4 large-4 cell -->

			<?php
		    $content = get_post_meta( get_the_ID(), 'mro_cp_page_sidebar', true );
		    // var_dump($content);
		    cp_content_filter( $content );
		    ?>

		</div>

	</div> <!-- end article -->

</div> <!-- end #inner-content -->

