<?php

$dronenPostsPagesArray = array(
	'select' => __('Select a post/page', 'dronen'),
);

$dronenPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$dronenPostsPagesQuery = new WP_Query( $dronenPostsPagesArgs );
	
if ( $dronenPostsPagesQuery->have_posts() ) :
							
	while ( $dronenPostsPagesQuery->have_posts() ) : $dronenPostsPagesQuery->the_post();
			
		$dronenPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$dronenPostsPagesTitle = get_the_title();
		}else{
				$dronenPostsPagesTitle = get_the_ID();
		}
		$dronenPostsPagesArray[$dronenPostsPagesId] = $dronenPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$dronenYesNo = array(
	'select' => __('Select', 'dronen'),
	'yes' => __('Yes', 'dronen'),
	'no' => __('No', 'dronen'),
);

$dronenSliderType = array(
	'select' => __('Select', 'dronen'),
	'header' => __('WP Custom Header', 'dronen'),
	'header-one' => __('dronen Header', 'dronen'),
);

$dronenServiceLayouts = array(
	'select' => __('Select', 'dronen'),
	'one' => __('One', 'dronen'),
	'two' => __('Two', 'dronen'),
);

$dronenAvailableCats = array( 'select' => __('Select', 'dronen') );

$dronen_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $dronen_categories_raw as $category ){
	
	$dronenAvailableCats[$category->term_id] = $category->name;
	
}

$dronenBusinessLayoutType = array( 
	'select' => __('Select', 'dronen'), 
	'one' => __('One', 'dronen'), 
	'two' => __('Two', 'dronen'),
	'three' => __('Three', 'dronen'),
);
