	
	<div id="footer-bg">
	
		<?php do_action('momentous_before_footer'); ?>
		
		<div id="footer-wrap">
		
			<footer id="footer" class="container clearfix" role="contentinfo">
				
				<span id="footer-text"><?php momentous_display_footer_text(); ?></span>
				
				<div id="credit-link"><?php do_action('momentous_credit_link'); ?></div>
			
			</footer>
		
		</div>

	</div>
	
</div><!-- end #wrapper -->

<?php wp_footer(); ?>
</body>
</html>