``html
  <?php get_header(); 

	if ( have_posts() ) while ( have_posts() ) : the_post(); 

		// Assume our post type is 'products'
		// Set Timestamp for the currently viewed product
		if (get_post_type( $post->ID ) == 'products' ):
    		update_post_meta( $post->ID, '_last_viewed', current_time('mysql') );
    	endif;

    	//args
		$args = array(
		    'post_type' => 'products',
		    'posts_per_page' => 5,
		    'meta_key' => '_last_viewed',
		    'orderby' => 'meta_value',
		    'order' => 'DESC'
		);

		//query
		query_posts( $args ); 

		if( have_posts() ) :
	 		while( have_posts() ) : the_post(); ?>
		        <h2><a href="YOUR LINK">YOUR TITLE</a></h2>
		    <?php endwhile;
		endif; 
		wp_reset_query(); 

	endwhile;

get_footer(); ?>
``
