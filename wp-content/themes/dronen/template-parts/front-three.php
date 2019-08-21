<div class="front-three-container">

	<div class="front-three-services">
	
		<?php 
					
				$dronenWelcomePostTitle = '';
				$dronenWelcomePostDesc = '';
				$dronenWelcomePostContent = '';
				
				if( '' != get_theme_mod('dronen_three_welcome_post') && 'select' != get_theme_mod('dronen_three_welcome_post') ){
					
					$dronenWelcomePostId = get_theme_mod('dronen_three_welcome_post');
					
					if( ctype_alnum($dronenWelcomePostId) ){

						$dronenWelcomePost = get_post( $dronenWelcomePostId );
					
						$dronenWelcomePostTitle = $dronenWelcomePost->post_title;
						$dronenWelcomePostDesc = $dronenWelcomePost->post_excerpt;
						$dronenWelcomePostContent = $dronenWelcomePost->post_content;
						
					}
					
				}
				
				
				
		?>
		<div class="frontpage-welcome-container">

			<h1><?php echo esc_html($dronenWelcomePostTitle); ?></h1>
			<div>
			<?php 
					
				if( '' != $dronenWelcomePostDesc ){
							
					echo esc_html($dronenWelcomePostDesc);
							
				}else{
							
					echo esc_html($dronenWelcomePostContent);
							
				}
					
			?>			
			</div>

		</div><!-- .frontpage-welcome-container -->

		
		<div class="bizthree-items">
		
			<?php
				
				if( '' != get_theme_mod('dronen_three_products_one') && 'select' != get_theme_mod('dronen_three_products_one') ):
				
				$dronenProductOneTitle = '';
				$dronenProductOneDesc = '';
				$dronenProductOneUrl = '';
				$dronenProductOneImage = '';			
				
				$dronenProductOneId = get_theme_mod('dronen_three_products_one');
				
				if( ctype_alnum($dronenProductOneId) ){

					$dronenProductOne = get_post( $dronenProductOneId );
				
					$dronenProductOneTitle = $dronenProductOne->post_title;
					$dronenProductOneDesc = $dronenProductOne->post_excerpt;
					$dronenProductOneContent = dronen_limitedstring($dronenProductOne->post_content, 150);
					$dronenProductOneUrl = get_permalink( $dronenProductOneId );
					
					if( has_post_thumbnail($dronenProductOneId) ){
						$dronenProductOneImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenProductOneId ), 'full' );
						$dronenProductOneImage = $dronenProductOneImage[0];
					}				
					
				}			
				
			?>
			<div class="bizthree-item">
			
				<div class="bizthree-image">
					
					<?php 

						if( '' != $dronenProductOneImage ){
							echo '<a href="' . esc_url($dronenProductOneUrl) . '"><img src="' . esc_url($dronenProductOneImage) . '" /></a>';
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						}
							
					?>				
					
				</div><!-- .bizthree-image -->
				
				<div class="bizthree-content">
				
					<h3><a href="<?php echo esc_url($dronenProductOneUrl); ?>"><?php echo esc_html($dronenProductOneTitle); ?></a></h3>
					<div>
					<?php 
					
						if( '' != $dronenProductOneDesc ){
							
							echo esc_html($dronenProductOneDesc);
							
						}else{
							
							echo esc_html($dronenProductOneContent);
							
						}
					
					?>		
					</div>	
				
				</div><!-- .bizthree-content -->		
			
			</div><!-- .bizthree-item -->
			<?php endif; ?>
			
			<?php 
			
				if( '' != get_theme_mod('dronen_three_products_two') && 'select' != get_theme_mod('dronen_three_products_two') ):
				
				$dronenProductTwoTitle = '';
				$dronenProductTwoDesc = '';
				$dronenProductTwoUrl = '';
				$dronenProductTwoImage = '';			
				
				$dronenProductTwoId = get_theme_mod('dronen_three_products_two');
				
				if( ctype_alnum($dronenProductTwoId) ){

					$dronenProductTwo = get_post( $dronenProductTwoId );
				
					$dronenProductTwoTitle = $dronenProductTwo->post_title;
					$dronenProductTwoDesc = $dronenProductTwo->post_excerpt;
					$dronenProductTwoContent = dronen_limitedstring($dronenProductTwo->post_content, 150);
					$dronenProductTwoUrl = get_permalink( $dronenProductTwoId );
					
					if( has_post_thumbnail($dronenProductTwoId) ){
						$dronenProductTwoImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenProductTwoId ), 'full' );
						$dronenProductTwoImage = $dronenProductTwoImage[0];
					}				
					
				}			
				
			?>
			<div class="bizthree-item">
			
				<div class="bizthree-image">
					
					<?php 

						if( '' != $dronenProductTwoImage ){
							echo '<a href="' . esc_url($dronenProductTwoUrl) . '"><img src="' . esc_url($dronenProductTwoImage) . '" /></a>';
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						}
							
					?>				
					
				</div><!-- .bizthree-image -->
				
				<div class="bizthree-content">
				
					<h3><a href="<?php echo esc_url($dronenProductTwoUrl); ?>"><?php echo esc_html($dronenProductTwoTitle); ?></a></h3>
					<div>
					<?php 
					
						if( '' != $dronenProductTwoDesc ){
							
							echo esc_html($dronenProductTwoDesc);
							
						}else{
							
							echo esc_html($dronenProductTwoContent);
							
						}
					
					?>		
					</div>	
				
				</div><!-- .bizthree-content -->		
			
			</div><!-- .bizthree-item -->
			<?php endif; ?>

			<?php 
			
				if( '' != get_theme_mod('dronen_three_products_three') && 'select' != get_theme_mod('dronen_three_products_three') ):
				
				$dronenProductThreeTitle = '';
				$dronenProductThreeDesc = '';
				$dronenProductThreeUrl = '';
				$dronenProductThreeImage = '';			
				
				$dronenProductThreeId = get_theme_mod('dronen_three_products_three');
				
				if( ctype_alnum($dronenProductThreeId) ){

					$dronenProductThree = get_post( $dronenProductThreeId );
				
					$dronenProductThreeTitle = $dronenProductThree->post_title;
					$dronenProductThreeDesc = $dronenProductThree->post_excerpt;
					$dronenProductThreeContent = dronen_limitedstring($dronenProductThree->post_content, 150);
					$dronenProductThreeUrl = get_permalink( $dronenProductThreeId );
					
					if( has_post_thumbnail($dronenProductThreeId) ){
						$dronenProductThreeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenProductThreeId ), 'full' );
						$dronenProductThreeImage = $dronenProductThreeImage[0];
					}				
					
				}			
				
			?>
			<div class="bizthree-item">
			
				<div class="bizthree-image">
					
					<?php 

						if( '' != $dronenProductThreeImage ){
							echo '<a href="' . esc_url($dronenProductThreeUrl) . '"><img src="' . esc_url($dronenProductThreeImage) . '" /></a>';
						}else{
							echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						}
							
					?>				
					
				</div><!-- .bizthree-image -->
				
				<div class="bizthree-content">
				
					<h3><a href="<?php echo esc_url($dronenProductThreeUrl); ?>"><?php echo esc_html($dronenProductThreeTitle); ?></a></h3>
					<div>
					<?php 
					
						if( '' != $dronenProductThreeDesc ){
							
							echo esc_html($dronenProductThreeDesc);
							
						}else{
							
							echo esc_html($dronenProductThreeContent);
							
						}
					
					?>		
					</div>	
				
				</div><!-- .bizthree-content -->		
			
			</div><!-- .bizthree-item -->
			<?php endif; ?>		
		
		</div><!-- .bizthree-items -->
	
	</div><!-- .front-three-services -->
	
	<div class="front-three-portfolio">
	
		<h3><?php echo __( 'Portfolio', 'dronen' ); ?></h3>
		
		<div class="front-three-portfolio-content">
		
			<?php
				
				if( '' != get_theme_mod('dronen_three_portfolio_one') && 'select' != get_theme_mod('dronen_three_portfolio_one') ):
				
				$dronenPortfolioOneTitle = '';
				$dronenPortfolioOneImage = '';			
				
				$dronenPortfolioOneId = get_theme_mod('dronen_three_portfolio_one');
				
				if( ctype_alnum($dronenPortfolioOneId) ){

					$dronenProductOne = get_post( $dronenPortfolioOneId );
				
					$dronenPortfolioOneTitle = $dronenProductOne->post_title;
					$dronenPortfolioOneUrl = get_permalink( $dronenProductOneId );
					
					if( has_post_thumbnail($dronenPortfolioOneId) ){
						$dronenPortfolioOneImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenPortfolioOneId ), 'full' );
						$dronenPortfolioOneImage = $dronenPortfolioOneImage[0];
					}				
					
				}			
				
			?>

			<div class="front-three-portfolio-item">
			
				<?php
					
					if( '' != $dronenPortfolioOneImage ){
						
						echo '<img src="' . esc_url( $dronenPortfolioOneImage ) . '" />';
						
					}else{
						
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						
					}
					
				?>
				<p><?php echo esc_html($dronenPortfolioOneTitle); ?></p>
			
			</div><!-- .front-three-portfolio-item -->
			
			<?php endif; ?>	
			
			<?php
				
				if( '' != get_theme_mod('dronen_three_portfolio_two') && 'select' != get_theme_mod('dronen_three_portfolio_two') ):
				
				$dronenPortfolioTwoTitle = '';
				$dronenPortfolioTwoImage = '';			
				
				$dronenPortfolioTwoId = get_theme_mod('dronen_three_portfolio_two');
				
				if( ctype_alnum($dronenPortfolioTwoId) ){

					$dronenProductTwo = get_post( $dronenPortfolioTwoId );
				
					$dronenPortfolioTwoTitle = $dronenProductTwo->post_title;
					$dronenPortfolioTwoUrl = get_permalink( $dronenProductTwoId );
					
					if( has_post_thumbnail($dronenPortfolioTwoId) ){
						$dronenPortfolioTwoImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenPortfolioTwoId ), 'full' );
						$dronenPortfolioTwoImage = $dronenPortfolioTwoImage[0];
					}				
					
				}			
				
			?>

			<div class="front-three-portfolio-item">
			
				<?php
					
					if( '' != $dronenPortfolioTwoImage ){
						
						echo '<img src="' . esc_url( $dronenPortfolioTwoImage ) . '" />';
						
					}else{
						
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						
					}
					
				?>
				<p><?php echo esc_html($dronenPortfolioTwoTitle); ?></p>
			
			</div><!-- .front-three-portfolio-item -->
			
			<?php endif; ?>	

			<?php
				
				if( '' != get_theme_mod('dronen_three_portfolio_three') && 'select' != get_theme_mod('dronen_three_portfolio_three') ):
				
				$dronenPortfolioThreeTitle = '';
				$dronenPortfolioThreeImage = '';			
				
				$dronenPortfolioThreeId = get_theme_mod('dronen_three_portfolio_three');
				
				if( ctype_alnum($dronenPortfolioThreeId) ){

					$dronenProductThree = get_post( $dronenPortfolioThreeId );
				
					$dronenPortfolioThreeTitle = $dronenProductThree->post_title;
					$dronenPortfolioThreeUrl = get_permalink( $dronenProductThreeId );
					
					if( has_post_thumbnail($dronenPortfolioThreeId) ){
						$dronenPortfolioThreeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $dronenPortfolioThreeId ), 'full' );
						$dronenPortfolioThreeImage = $dronenPortfolioThreeImage[0];
					}				
					
				}			
				
			?>

			<div class="front-three-portfolio-item">
			
				<?php
					
					if( '' != $dronenPortfolioThreeImage ){
						
						echo '<img src="' . esc_url( $dronenPortfolioThreeImage ) . '" />';
						
					}else{
						
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
						
					}
					
				?>
				<p><?php echo esc_html($dronenPortfolioThreeTitle); ?></p>
			
			</div><!-- .front-three-portfolio-item -->
			
			<?php endif; ?>				
		
		</div><!-- .front-three-portfolio-content -->
	
	</div><!-- .front-three-portfolio -->

</div><!-- .front-three-container -->