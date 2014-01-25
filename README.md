You can add a timestamp to your post meta each time a product is viewed, then query the five most recently viewed products.

Assuming you are using a custom post type named 'product', add the following inside the loop of your single-product.php template file:

if (get_post_type( $post->ID ) == 'product' ): 
    update_post_meta( $post->ID, '_last_viewed', current_time('mysql') );
endif;

To display the five most recently viewed products:

<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 5,
    'meta_key' => '_last_viewed',
    'orderby' => 'meta_value',
    'order' => 'DESC'
);
query_posts( $args ); ?>
<?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
