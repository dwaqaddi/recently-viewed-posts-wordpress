## Recently Views Post ( Wordpress )

You can add a timestamp to your post meta each time a product is viewed, then query the number of most recently viewed products/posts.

### Set Timestamp

Assuming you are using a custom post type named **'products'**, add the code below inside the loop of your **single-product.php** template file:

```html
if (get_post_type( $post->ID ) == 'products ): 
    update_post_meta( $post->ID, '_last_viewed', current_time('mysql') );
endif;
```

### Display Recent Viewed Post
To display the five most recently viewed products:

```html

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 5,
    'meta_key' => '_last_viewed',
    'orderby' => 'meta_value',
    'order' => 'DESC'
);

query_posts( $args ); 

if( have_posts() ):
    while( have_posts() ) : the_post();
        <h2><a href="YOUR LINK">YOUR TITLE</a></h2>
    endwhile; 
endif;
wp_reset_query();
```

Now you have the list of recently viewed post/products by the user.
