<div class="frontPageContainer">
	
	<div class="frontPageServices">
		
		<div class="frontPageWelcome">
		
			<?php
			
				$dronenWelcomePostTitle = '';
				$dronenWelcomePostDesc = '';
				$dronenWelcomePostContent = '';

				if( '' != get_theme_mod('dronen_welcome_post') && 'select' != get_theme_mod('dronen_welcome_post') ){

					$dronenWelcomePostId = get_theme_mod('dronen_welcome_post');

					if( ctype_alnum($dronenWelcomePostId) ){

						$dronenWelcomePost = get_post( $dronenWelcomePostId );

						$dronenWelcomePostTitle = $dronenWelcomePost->post_title;
						$dronenWelcomePostDesc = $dronenWelcomePost->post_excerpt;
						$dronenWelcomePostContent = $dronenWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($dronenWelcomePostTitle); ?></h1>
			<div class="frontWelcomeContent">
				<p>
					<?php 
					
						if( '' != $dronenWelcomePostDesc ){
							
							echo esc_html($dronenWelcomePostDesc);
							
						}else{
							
							echo esc_html($dronenWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .frontWelcomeContent -->			
			
		</div><!-- .frontPageWelcome -->
		
		<div class="frontPageServiceItems">
			
			<?php

				$dronen_left_cat = '';

				if(get_theme_mod('dronen_services_cat')){
					$dronen_left_cat = get_theme_mod('dronen_services_cat');
					$dronen_left_cat_num = -1;
				}else{
					$dronen_left_cat = 0;
					$dronen_left_cat_num = 5;
				}		

				$dronen_left_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $dronen_left_cat_num,
				   'cat' => $dronen_left_cat
				);

				$dronen_left = new WP_Query($dronen_left_args);		

				if ( $dronen_left->have_posts() ) : while ( $dronen_left->have_posts() ) : $dronen_left->the_post();
   			?> 			
			<div class="frontPageServiceItem">
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('dronen-home-posts');
						}else{
							echo '<img src="' . esc_url( esc_url( get_template_directory_uri() ) ) . '/assets/images/frontitemimage.png" />';
						}						
				?>
				<?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(dronen_limitedstring(get_the_content(), 50));
						}
					
					?>
				</p>				
				
			</div><!-- .frontPageServiceItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontPageServiceItems -->
		
	</div><!-- .frontPageServices -->
	
	<div class="frontPagePortfolio">
		
		<h1><?php _e('Portfolio', 'dronen'); ?></h1>
		
		<div class="frontPagePortfolioItems">
			
			<?php

				$dronen_portfolio_cat = '';

				if(get_theme_mod('dronen_portfolio_cat')){
					$dronen_portfolio_cat = get_theme_mod('dronen_portfolio_cat');
					$dronen_portfolio_cat_num = -1;
				}else{
					$dronen_portfolio_cat = 0;
					$dronen_portfolio_cat_num = 5;
				}		

				$dronen_portfolio_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> $dronen_portfolio_cat_num,
				   'cat' => $dronen_portfolio_cat
				);

				$dronen_portfolio = new WP_Query($dronen_portfolio_args);		

				if ( $dronen_portfolio->have_posts() ) : while ( $dronen_portfolio->have_posts() ) : $dronen_portfolio->the_post();
   			?>			
			<div class="frontPagePortfolioItem">
				
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}else{
							echo '<img src="' . esc_url( esc_url( get_template_directory_uri() ) ) . '/assets/images/service.jpg" />';
						}						
				?>
				<?php the_title( '<h3>', '</h3>' ); ?>				
				
			</div><!-- .frontPagePortfolioItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>
			
		</div><!-- .frontPagePortfolioItems -->
		
	</div><!-- .frontPagePortfolio -->
	
	<div class="frontPageNews">
		
			<h1><?php _e('News', 'dronen'); ?></h1>
			
			<?php

				$dronen_right_cat = '';

				if(get_theme_mod('dronen_news_cat')){
					$dronen_right_cat = get_theme_mod('dronen_news_cat');
				}else{
					$dronen_right_cat = 0;
				}		

				$dronen_right_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> 4,
				   'cat' => $dronen_right_cat
				);

				$dronen_right = new WP_Query($dronen_right_args);		

				if ( $dronen_right->have_posts() ) : while ( $dronen_right->have_posts() ) : $dronen_right->the_post();
   			?> 			
			<div class="frontNewsItem">
				
				<?php the_title( '<h3>', '</h3>' ); ?>
				<p>
					<?php  
						
						//$frontPostExcerpt = '';
						//$frontPostExcerpt = get_the_excerpt();
					
						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(dronen_limitedstring(get_the_content(), 100));
						}
					
					?>				
				</p>
				<p class="readmore"><a href="<?php echo esc_url(get_the_permalink()); ?>">Read More</a></p>
				
			</div><!-- .frontNewsItem -->
			<?php endwhile; wp_reset_postdata(); endif;?>			
		
	</div><!-- .frontPageNews -->	
	
</div><!-- .frontPageContainer -->	