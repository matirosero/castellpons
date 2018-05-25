<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>
<div data-sticky-container>
  <div class="top-bar" id="top-bar-menu" data-sticky data-options="marginTop:0; stickyOn:small">
    <div class="title-area top-bar-left float-left">
		<ul class="menu">
			<li>
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				} else { ?>
					<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
				<?php } ?>
			</li>
		</ul>
    </div>
    <div class="top-bar-right show-for-medium">
    	<?php joints_top_nav(); ?>
    </div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><i class="icon-menu-toggle"></i></a></li>
		</ul>
	</div>
  </div>
</div>
<?php /*
<div data-sticky-container>
<div class="top-bar" id="top-bar-menu" data-sticky data-options="marginTop:0;" style="width:100%" data-top-anchor="1" data-btm-anchor="content:bottom">
	<div class="title-area top-bar-left float-left">
		<ul class="menu">
			<li>
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				} else { ?>
					<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
				<?php } ?>
			</li>
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><i class="icon-menu-toggle"></i></a></li>
		</ul>
	</div>
</div>
</div> */ ?>