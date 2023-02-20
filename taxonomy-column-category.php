<?php
$obj = get_queried_object();
// echo "<pre>";
// print_r($obj);
// echo "</pre>";

        $GLOBALS['title'] = $obj->name.'txt_txt'  ;
        $GLOBALS['keywords'] = get_post_meta($post->ID, 'keywords', true) ? get_post_meta($post->ID, 'keywords', true) : "txt_txt";
        $GLOBALS['description'] = get_post_meta($post->ID, 'des', true) ? get_post_meta($post->ID, 'des', true) : "txt_txt";
        $GLOBALS['h1'] = get_post_meta($post->ID, 'h1', true) ? get_post_meta($post->ID, 'h1', true) : "txt_txt";
        $GLOBALS['h2'] = $obj -> name;

        $GLOBALS['bodyID'] = $obj -> name;
        $GLOBALS['bodyClass'] = "under";
        // END

        get_header(); ?>
        <div id="main">
            <!-- #top_info -->
            <div id="top_info" class="clearfix">
                <div class="inner">
                <h2 class="h2_title">txt_txt</h2>
                </div>
            </div>
            <!-- end #top_info -->
            <!-- #topic_path -->
            <div id="topic_path" class="clearfix">
                <div class="inner">
                <ul>
                    <li><a href="#">TOP</a></li>
                    <li><a href="<?php echo home_url('/column/'); ?>">txt_txt</a></li>
                    <li><?php echo $GLOBALS['h2'] ?></li>
                </ul>
                </div>
            </div>
            <!-- end #topic_path -->

            <div id="content" class="clearfix">
                <div class="inner">
                    <!-- ================================================= -->
                    <div class="section clearfix">
                        <div class="blog_content">
                            <div class="blog_aside">
                                <p>カテゴリー</p>
                                    <?php include( 'includes/list_cate_column.php' );?>
                                <p>アーカイブ</p>
                                <ul>
                                    <?php include( 'includes/list_date_column.php' );?>
                                </ul>
                            </div>
                            <div class="blog_box">
                                <h3><?php echo $GLOBALS['h2'] ?></h3>
                                <div class="blog_list">
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                global $post;
                                global $wp_query;
                                $args = array(
                                'post_type' =>'column',
                                'orderby' => 'date',
                                'order' => 'desc',
                                'posts_per_page' => 10,
                                'paged' => $paged,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'column-category',
                                        'field' => 'slug',
                                        'terms' => $obj->slug,
                                    )
                                )
                                );

                                $the_query = new WP_Query( $args );
                                $qa_posts = get_posts($args);
                                foreach($qa_posts as $post) : setup_postdata($post);
                                    $date = get_the_date('Y.m.d', $post->ID);
                                    $content = content_by_id(40,$post->ID);
                                    $list_category_column =  get_the_terms($post->ID, 'column-category' );
                                //     echo "<pre>";
                                //    print_r($list_category_column);
                                //      echo "</pre>";
                                ?>
                                    <dl>
                                        <dt>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if(get_the_post_thumbnail()):?>
                                                        <img src="<?php echo get_the_post_thumbnail_url();?>"
                                                            alt="<?php the_title();?>">
                                                    <?php else:?><img src="<?php echo get_theme_file_uri('images/dummy.jpg');?>" alt="<?php the_title();?>">
                                                <?php endif; ?>
                                            </a>
                                        </dt>
                                        <dd>
                                            <p class="title"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></p>
                                           <div class="group_cate">
                                            <?php
                                                if ($list_category_column) : foreach($list_category_column as $column) : setup_postdata($post); ?>
                                                    <p class="cate cate_<?php echo $column->term_id?>"><?php echo $column->name ?></p>
                                                <?php  endforeach; endif; ?>
                                           </div>
                                            <div class="blog_txt"><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 150, '…', 'UTF-8');?></div>
                                            <p class="date"><?php echo get_the_date('Y/m/d'); ?>
                                        </dd>
                                    </dl>
                                <?php
                                endforeach;
                                wp_reset_query();
                                ?>
                            </div>
                            </div>
                        </div>
                        <div class="section">
                            <?php
                                wp_pagenavi( array( 'query' => $the_query ) );
                                wp_reset_postdata();
                                wp_reset_query();
                                ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<!-- end #main -->
<?php
		get_footer();
?>