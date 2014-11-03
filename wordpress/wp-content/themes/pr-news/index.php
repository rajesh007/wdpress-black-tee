<?php get_header(); ?>

<div class="container-fluid  container"> 
	<div id="mcontainer">
		<?php prnews_sidebar_home($paged);		
if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="boxy">
		<div id="post-<?php the_ID(); ?>" <?php post_class('thumb'); ?>>
		<a href="<?php the_permalink(); ?>">
		<div class="posttitle"><?php the_title(); ?></div></a>
<?php if(prnews_thumbnail($post->ID) =='') { 
 the_excerpt(); 
} else {
 echo prnews_thumbnail($post->ID);
}
?>
			<div class="category-tag">
<i class="icon-folder-open"></i> <?php the_category(', '); ?>  <?php the_tags(' <i class="icon-tags"></i> ',', '); ?>
	        </div>
		</div>
	</div>
		<?php 
		endwhile; 
		else :
		?>
			<div class="boxy">
				<div class="post-wrapper">
					<div class="h1-wrapper">
						<h1><?php _e( 'No Items Found', 'prnews' ); ?></h1>
					</div>		
	
					<div class="post-content text-align-center">
					<p><?php _e('Perhaps searching will help.', 'prnews'); ?></p>
					<?php get_search_form(); ?>
					</div>
				</div>
			</div>
	</div>
		<?php endif; ?>
	</div>
	<div id="navigation">
		<ul class="pager">
			<li id="navigation-next"><?php next_posts_link(__('&laquo; Previous', 'prnews')) ?></li>
			<li id="navigation-previous"><?php previous_posts_link(__('Next &raquo;', 'prnews')) ?></li>
		</ul>
	</div>
<div id="footernav">
<?php	if (has_nav_menu('boot_nav')) {
						wp_nav_menu(array('theme_location' => 'boot_nav', 'menu_class' => 'nav'));
					} ?>
</div>
  <div id="scroll-top"><a href="#"><i class="icon-chevron-up icon-2x"></i></a></div>
</div>
<?php get_footer(); ?>