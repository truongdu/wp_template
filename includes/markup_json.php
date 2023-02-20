<?php
    if ( is_home() || is_front_page() ) :?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "HOME"
                        "item": "<?php echo get_home_url() ?>",
                    }
                ]
            }
        </script>

    <?php elseif(is_single() && get_post_type() == 'post') :?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "HOME"
                    "item": "<?php echo get_home_url() ?>",
                },{
                    "@type": "ListItem",
                    "position": 2,
                    "name": "txt_txt_h2"
                    "item": "<?php echo home_url('/news/'); ?>",
                },{
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo get_the_terms($post->ID,'category')[0]->name; ?>"
                    "item": "<?php echo get_term_link(get_the_terms($post->ID,'category')[0], 'category'); ?>",
                },{
                    "@type": "ListItem",
                    "position": 4,
                    "name": "<?php the_title(); ?>"
                    "item": "<?php echo home_url( $wp->request ) ?>/",
                }]
            }
        </script>

    <?php elseif(is_category()) : ?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "HOME"
                    "item": "<?php echo get_home_url() ?>",
                    },{
                    "@type": "ListItem",
                    "position": 2,
                    "name": "txt_txt_h2"
                    "item": "<?php echo home_url('/news/'); ?>",
                    },{
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo get_the_terms($post->ID,'category')[0]->name; ?>"
                    "item": "<?php echo get_term_link(get_the_terms($post->ID,'category')[0], 'category'); ?>",
                }]
            }
        </script>

    <?php elseif(is_post_type_archive()) :
        $post_type_obj = get_post_type_object( get_post_type());
        $name = $post_type_obj->labels->singular_name;
        if('column' == get_post_type()) {
            $name = 'column_custom';
        }
        ?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "HOME"
                        "item": "<?php echo home_url(); ?>",
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "<?php echo $name;  ?>"
                        "item": "<?php echo get_post_type_archive_link( get_post_type() ); ?>",
                    }
                ]
            }
        </script>

    <?php  elseif(is_tax()):
        $terms = get_terms();
        //var_dump($terms);
        $cate_id = get_queried_object()->term_id;
        $cate_name = get_queried_object()->name;
        $cate_slug = get_queried_object()->slug;
        $post_type_obj = get_post_type_object( get_post_type());
        $name = $post_type_obj->labels->singular_name;
        if('column' == get_post_type()) {
            $name = 'column_custom';
        }
        ?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "HOME"
                        "item": "<?php echo home_url(); ?>",
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "<?php echo $name;  ?>"
                        "item": "<?php echo get_post_type_archive_link( get_post_type() ); ?>",
                    },
                    {
                        "@type": "ListItem",
                        "position": 3,
                        "name": "<?php echo  $cate_name ?>"
                        "item": "<?php echo  get_term_link($cate_slug, 'column-category') ?>",
                    }
                ]
            }
        </script>

    <?php elseif(is_singular('column')):
        if('column' == get_post_type()) {
            $name = 'column_custom';
        }
        $terms = get_the_terms( $post->ID, 'column-category' );
        if ( !empty( $terms ) ){
            // get the first term
            $term = array_shift( $terms );
            $cate_slug = $term->slug;
            $cate_name = $term->name;
        }
        ?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "HOME"
                        "item": "<?php echo home_url(); ?>",
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "<?php echo $name;  ?>"
                        "item": "<?php echo get_post_type_archive_link( get_post_type() ); ?>",
                    },
                    {
                        "@type": "ListItem",
                        "position": 3,
                        "name": "<?php echo  $cate_name ?>"
                        "item": "<?php echo  get_term_link($cate_slug, 'column-category') ?>",
                    },
                    {
                        "@type": "ListItem",
                        "position": 4,
                        "name": "<?php the_title(); ?>"
                        "item": "<?php the_permalink() ?>",
                    }
                ]
            }
        </script>

    <?php else: ?>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "HOME"
                    "item": "<?php echo get_home_url() ?>",
                    },{
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo $GLOBALS['h2'] ?>"
                    "item": "<?php echo home_url( $wp->request ) ?>",
                }]
            }
        </script>
    <?php endif;
?>