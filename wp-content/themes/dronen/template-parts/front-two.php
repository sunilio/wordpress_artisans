<div class="frontTwoContainer">

	<div class="frontTwoWelcomeContainer">
		
			<?php
			
				$dronenWelcomePostTitle = '';
				$dronenWelcomePostDesc = '';
				$dronenWelcomePostContent = '';

				if( '' != get_theme_mod('dronen_two_welcome_post') && 'select' != get_theme_mod('dronen_two_welcome_post') ){

					$dronenWelcomePostId = get_theme_mod('dronen_two_welcome_post');

					if( ctype_alnum($dronenWelcomePostId) ){

						$dronenWelcomePost = get_post( $dronenWelcomePostId );

						$dronenWelcomePostTitle = $dronenWelcomePost->post_title;
						$dronenWelcomePostDesc = $dronenWelcomePost->post_excerpt;
						$dronenWelcomePostContent = $dronenWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($dronenWelcomePostTitle); ?></h1>
			<div class="frontTwoWelcomeContent">
				<p>
					<?php 
					
						if( '' != $dronenWelcomePostDesc ){
							
							echo esc_html($dronenWelcomePostDesc);
							
						}else{
							
							echo esc_html($dronenWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .frontTwoWelcomeContent -->	
		
	</div><!-- .frontTwoWelcomeContainer -->
	
	<div class="frontPageTwoProductsContainer">
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				if( '' != get_theme_mod('dronen_two_product_post_one') && 'select' != get_theme_mod('dronen_two_product_post_one') ):
			
				$dronenProductOneTitle = '';
				$dronenProductOneDesc = '';

					$dronenProductOneId = get_theme_mod('dronen_two_product_post_one');

					if( ctype_alnum($dronenProductOneId) ){

						$dronenProductOne = get_post( $dronenProductOneId );

						$dronenProductOneTitle = $dronenProductOne->post_title;
						$dronenProductOneDesc = $dronenProductOne->post_excerpt;
						$dronenProductOneContent = dronen_limitedstring($dronenProductOne->post_content, 150);
						$dronenProductOneLink = get_permalink($dronenProductOneId);
						
						if( has_post_thumbnail( $dronenProductOneId ) ){
							
							$dronenProductOneImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenProductOneId ), 'dronen-producttwo' );
							$dronenProductOneImage = $dronenProductOneImage[0];
							
						}else{
							
							$dronenProductOneImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}

					}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($dronenProductOneImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($dronenProductOneLink); ?>"><?php echo esc_html($dronenProductOneTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $dronenProductOneDesc ){
							
							echo esc_html($dronenProductOneDesc);
							
						}else{
							
							echo esc_html($dronenProductOneContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			<?php endif; ?>
			
		</div><!-- .frontPageTwoProductContainer -->
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				if( '' != get_theme_mod('dronen_two_product_post_two') && 'select' != get_theme_mod('dronen_two_product_post_two') ):
			
				$dronenProductTwoTitle = '';
				$dronenProductTwoDesc = '';

					$dronenProductTwoId = get_theme_mod('dronen_two_product_post_two');

					if( ctype_alnum($dronenProductTwoId) ){

						$dronenProductTwo = get_post( $dronenProductTwoId );

						$dronenProductTwoTitle = $dronenProductTwo->post_title;
						$dronenProductTwoDesc = $dronenProductTwo->post_excerpt;
						$dronenProductTwoContent = dronen_limitedstring($dronenProductTwo->post_content, 150);
						$dronenProductTwoLink = get_permalink($dronenProductTwoId);
						
						if( has_post_thumbnail( $dronenProductTwoId ) ){
							
							$dronenProductTwoImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenProductTwoId ), 'dronen-producttwo' );
							$dronenProductTwoImage = $dronenProductTwoImage[0];
							
						}else{
							
							$dronenProductTwoImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}						

					}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($dronenProductTwoImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($dronenProductTwoLink); ?>"><?php echo esc_html($dronenProductTwoTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $dronenProductTwoDesc ){
							
							echo esc_html($dronenProductTwoDesc);
							
						}else{
							
							echo esc_html($dronenProductTwoContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			<?php endif; ?>
			
		</div><!-- .frontPageTwoProductContainer -->
		
		<div class="frontPageTwoProductContainer">
			
			<?php
			
				if( '' != get_theme_mod('dronen_two_product_post_three') && 'select' != get_theme_mod('dronen_two_product_post_three') ):
			
				$dronenProductThreeTitle = '';
				$dronenProductThreeDesc = '';

					$dronenProductThreeId = get_theme_mod('dronen_two_product_post_three');

					if( ctype_alnum($dronenProductThreeId) ){

						$dronenProductThree = get_post( $dronenProductThreeId );

						$dronenProductThreeTitle = $dronenProductThree->post_title;
						$dronenProductThreeDesc = $dronenProductThree->post_excerpt;
						$dronenProductThreeContent = dronen_limitedstring($dronenProductThree->post_content, 150);
						$dronenProductThreeLink = get_permalink($dronenProductThreeId);
						
						if( has_post_thumbnail( $dronenProductThreeId ) ){
							
							$dronenProductThreeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenProductThreeId ), 'dronen-producttwo' );
							$dronenProductThreeImage = $dronenProductThreeImage[0];
							
						}else{
							
							$dronenProductThreeImage = get_template_directory_uri() . '/assets/images/service.jpg';
							
						}						

					}			
			
			?>
			<div class="frontPageTwoProductImage">
				<img src="<?php echo esc_url($dronenProductThreeImage); ?>" />
			</div><!-- .frontPageTwoProductImage -->
			<h2><a href="<?php echo esc_url($dronenProductThreeLink); ?>"><?php echo esc_html($dronenProductThreeTitle); ?></a></h2>
			<div class="frontPageTwoProductContent">
				
				<p>
					<?php 
					
						if( '' != $dronenProductThreeDesc ){
							
							echo esc_html($dronenProductThreeDesc);
							
						}else{
							
							echo esc_html($dronenProductThreeContent);
							
						}
					
					?>
				</p>
				
			</div><!-- .frontTwoWelcomeContent -->			
			<?php endif; ?>
			
		</div><!-- .frontPageTwoProductContainer -->		
		
	</div><!-- .frontPageTwoProductsContainer -->
	
</div><!-- .frontPageTwoContainer -->