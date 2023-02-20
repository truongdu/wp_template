<?php
/* Template directory */
add_shortcode('tmpurl', 'shortcode_tmpurl');
function shortcode_tmpurl() {
	return get_bloginfo('template_url');
}
/* Site directory */
add_shortcode('siteurl', 'shortcode_siteurl');
function shortcode_siteurl() {
	return get_bloginfo('url');
}
?>
<?php
add_shortcode( 'list_news', 'shortcode_list_news' );
function shortcode_list_news( $atts ) {
    ob_start();
    extract( shortcode_atts(
			array (
				'type' => 'post',
				'order' => 'date',
				'orderby' => 'title',
				'posts' => -1,
				'category' => '',
			), $atts )
		);
    $arg = array(
			'post_type' => $type,
			'order' => $order,
			'orderby' => $orderby,
			'posts_per_page' => $posts,
			'category_name' => $category,
			'tax_query' =>
				array(
					array(
						'taxonomy' => 'category',
						'field' => 'slug',
						// 'terms' => 'implant'
					)
				)
    );
    $query = new WP_Query( $arg );
    if ( $query->have_posts() ) { ?>
    		<ul class="slider_blog">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <li class="item">
            <a href="<?php the_permalink();?>">
                <p class="image">
                  <?php if(get_the_post_thumbnail()):?>
                  <img src="<?php echo get_the_post_thumbnail_url();?>"
                  alt="<?php the_title();?>">
                  <?php else:?><img src="<?php echo get_theme_file_uri('images/dumy.jpg');?>" alt="<?php the_title();?>">
                  <?php endif; ?>
                </p>
                <div class="box_content_slider_blog">
                  <p class="date"><?php the_time('Y/m/d'); ?></p>
                  <p class="title_blog"><?php echo mb_strimwidth(get_the_title(), 0, 60, '…', 'UTF-8');?></p>
                </div>
            </a>
        </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    	<?php $myvariable = ob_get_clean();
    	return $myvariable;
    }
}
?>
