// JavaScript Document
jQuery(document).ready(function() {
	
	var dronenViewPortWidth = '',
		dronenViewPortHeight = '';

	function dronenViewport(){

		dronenViewPortWidth = jQuery(window).width(),
		dronenViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( dronenViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var dronenSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var dronenSiteHeaderWidth = jQuery('.site-header').width();
			var dronenSiteHeaderPadding = ( dronenSiteHeaderWidth * 2 )/100;
			var dronenMenuHeight = jQuery('.menu-container').height();
			
			var dronenMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var dronenMenuPadding = ( dronenSiteHeaderHeight - ( (dronenSiteHeaderPadding * 2) + dronenMenuHeight ) )/2;
			var dronenMenuButtonsPadding = ( dronenSiteHeaderHeight - ( (dronenSiteHeaderPadding * 2) + dronenMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':dronenMenuPadding});
			jQuery('.site-buttons').css({'padding-top':dronenMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		dronenViewport();
		
	});
	
	dronenViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( dronenViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

		
	
});		