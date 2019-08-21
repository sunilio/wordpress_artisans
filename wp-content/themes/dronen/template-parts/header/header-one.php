<?php
	
	$dronenHeaderPostId = '';
	$dronenHeaderPostTitle = '';
	$dronenHeaderPostDesc = '';

	if( '' != get_theme_mod('dronen_header_one_post') && 'select' != get_theme_mod('dronen_header_one_post') ){

		$dronenHeaderPostId = get_theme_mod('dronen_header_one_post');

		if( ctype_alnum($dronenHeaderPostId) ){

			$dronenHeaderPost = get_post( $dronenHeaderPostId );

			$dronenHeaderPostTitle = $dronenHeaderPost->post_title;
			$dronenHeaderPostDesc = $dronenHeaderPost->post_excerpt;
			$dronenHeaderPostContent = $dronenHeaderPost->post_content;
			$dronenHeaderPostUrl = get_the_permalink($dronenHeaderPostId);
			
			$dronenHeaderPostThumbnail = get_the_post_thumbnail_url($dronenHeaderPostId,'dronen-producttwo');

		}

	}			
	
	if( '' != $dronenHeaderPostId ):

?>

<div class="header-one-container">

	<div class="header-one-image">
		
		<?php
		
			if( '' != $dronenHeaderPostThumbnail ){
				
				echo '<img src="' . esc_url($dronenHeaderPostThumbnail) . '">';
				
			}
		
		?>
		
	</div><!-- .header-one-image -->
	
	<div class="header-one-content">
		
		<h2><?php echo esc_html($dronenHeaderPostTitle); ?></h2>
		<p>
			<?php 
					
				if( '' != $dronenHeaderPostDesc ){
							
					echo esc_html($dronenHeaderPostDesc);
							
				}else{
							
					echo esc_html($dronenHeaderPostContent);
							
				}
					
			?>		
		</p>
		<?php if( '' != $dronenHeaderPostUrl ): ?>
		<p>
			<a class="readMore" href="<?php echo esc_url($dronenHeaderPostUrl); ?>"><?php _e('Read More', 'dronen') ?></a>
		</p>
		<?php endif; ?>
		
	</div><!-- .header-one-content -->
	
</div><!-- .header-one-container -->

<?php endif; ?>