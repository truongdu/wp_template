<?php
     $args = array(
        'post_type' => 'column',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );
    $get_args_column = new WP_Query($args);
    $total_column = $get_args_column->post_count;
?>

<ul>
        <li <?php if( get_post_type( get_the_ID() ) == 'column' && is_post_type_archive()) {  echo "class='active'";  } ?> >
            <a href="<?php echo home_url(); ?>/column/">全て(<?php echo $total_column; ?>)</a>
        </li>
        <?php
            $column_cat_exist = taxonomy_exists( 'category' );
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $taxonomy_column_name =  $term->name;
            $taxonomy_column_slug =  $term->slug;
            $taxonomies = array(
                'column-category',
            );
            $args = array(
                'order'             => 'ASC',
                'hide_empty'        => false,
                'exclude'           => array(),
                'exclude_tree'      => array(),
                'include'           => array(),
                'number'            => '',
                'fields'            => 'all',
                'slug'              => '',
                'parent'            => '',
                'hierarchical'      => true,
                'child_of'          => 0,
                'get'               => '',
                'name__like'        => '',
                'description__like' => '',
                'pad_counts'        => false,
                'offset'            => '',
                'search'            => '',
                'cache_domain'      => 'core',
            );
            $terms_list = get_terms($taxonomies, $args);
                foreach($terms_list as $terms) : setup_postdata($terms);
                // echo "<pre>";
                // print_r($terms->slug);
                // echo "</pre>";
                if($terms->term_taxonomy_id != 1){ ?>
                    <li <?php if($taxonomy_column_slug== $terms->slug) { echo "class='active'"; } ?>><a href="<?php bloginfo( 'url' ); ?>/column-category/<?php echo $terms->slug; ?>/">
                <?php echo $terms->name;  echo  "(".$terms->count.")"; ?></a></li>
            <?php  } ?>
    <?php
    endforeach;
    wp_reset_query();
    ?>
</ul>