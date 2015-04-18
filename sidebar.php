
<?php 

	// Get Theme Options from Database
	$theme_options = momentous_theme_options();
	
	// Only show sidebar if fullwidth layout is not selected 
	if ( isset($theme_options['layout']) and $theme_options['layout'] <> 'fullwidth' ) : 
	
?>

	<section id="sidebar" class="secondary clearfix" role="complementary">

		<?php
			// Check if Sidebar has widgets
			if( is_active_sidebar('sidebar') ) : 
			
				dynamic_sidebar('sidebar');
			
			// Show hint where to add widgets
			else : ?>

			<aside class="widget">
				<h3 class="widgettitle"><?php _e('Widget Area', 'momentous-lite'); ?></h3>
				<div class="textwidget">
					<p><?php _e('There are no active widgets to be displayed. Please go to Appearance -> Widgets to setup your sidebar.', 'momentous-lite'); ?></p>
				</div>
			</aside>
		
		<?php endif; ?>

	</section>
	
<?php endif; ?>