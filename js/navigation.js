/*! jQuery navigation.js
  Add toggle icon for mobile navigation and dropdown animations for widescreen navigation
  Author: Thomas W (themezee.com)
*/
jQuery(document).ready(function($) {
						
	/** Header Search */
	/* Add toggle effect */
	$('.header-search-icon').on('click', function(){
		$('#header-search-wrap').slideToggle();
		$(this).toggleClass('active');
	});
	
	/** Tablet Main Navigation */
	/* Add toggle effect */
	$('#mainnav-icon-tablet').on('click', function(){
		$('#mainnav').slideToggle();
		$(this).toggleClass('active');
	});
	
	
	/** Mobile Top Navigation */
	/* Add toggle effect */
	$('#topnav-icon').on('click', function(){
		$('#topnav-menu').slideToggle();
		$(this).toggleClass('active');
	});
	
	/** Mobile Social Icons */
	/* Add toggle effect */
	$('#social-menu-icon').on('click', function(){
		if($('#mainnav').is(':visible')) {
			$('#mainnav').slideToggle();
			$('#navi-social-icons #social-icons-menu').delay(400).slideToggle();
		} else {
			$('#navi-social-icons #social-icons-menu').slideToggle();
		}
		$(this).toggleClass('active');
	});
	
	/** Mobile Main Navigation */
	/* Add toggle effect */
	$('#mainnav-icon-phone').on('click', function(){
		if($('#navi-social-icons #social-icons-menu').is(':visible')) {
			$('#navi-social-icons #social-icons-menu').slideToggle();
			$('#mainnav').delay(400).slideToggle();
		} else {
			$('#mainnav').slideToggle();
		}
		$(this).toggleClass('active');
	});

	/** Widescreen Dropdown Navigation */
	/* Get Screen Size with Listener */ 
	if(typeof matchMedia == 'function') {
		var mq = window.matchMedia('(max-width: 60em)');
		mq.addListener(zeeWidthChange);
		zeeWidthChange(mq);
	}
	function zeeWidthChange(mq) {
		if (mq.matches) {
	
			/* Reset dropdown animations */
			$('#mainnav-menu ul').css({display: 'block'}); // Opera Fix
			$('#mainnav-menu li ul').css({visibility: 'visible', display: 'block'});
			$('#mainnav-menu li').unbind('mouseenter mouseleave');
		
		} else {
			
			/* Add dropdown animations */
			$('#mainnav-menu ul').css({display: 'none'}); // Opera Fix
			$('#mainnav-menu li').hover(function(){
				$(this).find('ul:first').css({visibility: 'visible',display: 'none'}).slideDown(300);
			},function(){
				$(this).find('ul:first').css({visibility: 'hidden'});
			});
			
		}
	}
	
});
	