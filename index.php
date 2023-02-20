<?php
$GLOBALS['title'] = get_post_meta($post->ID, 'meta_title', true) ? get_post_meta($post->ID, 'meta_title', true) : get_the_title()."txt_txt";
$GLOBALS['keywords'] = get_post_meta($post->ID, 'meta_keywords', true) ? get_post_meta($post->ID, 'meta_keywords', true) : "txt_txt";
$GLOBALS['description'] = get_post_meta($post->ID, 'meta_description', true) ? get_post_meta($post->ID, 'meta_description', true) : "txt_txt";
$GLOBALS['h1'] = get_post_meta($post->ID, 'meta_h1', true) ? get_post_meta($post->ID, 'meta_h1', true) : "txt_txt";

$GLOBALS['bodyID'] = "index";
$GLOBALS['bodyClass'] = "";
global $post;
global $wp_query;
get_header();
?>
<div id="main">
    <div id="sec04">
        <div class="inner">
            <ul class="sec03-list list-column" >
                <?php
                    $args = array(
                    'post_type' =>'column',
                    'posts_per_page'=>50,
                    );
                    $the_query = new WP_Query( $args );
                    $qa_posts = get_posts($args);
                    foreach($qa_posts as $post) :
                        setup_postdata($post);
                        $date = get_the_date('Y.m.d', $post->ID);
                        $list_cate_column = get_the_terms($post->ID, 'column-category' );

                        if(get_the_title() != "") :
                            $title = get_the_title(); else: $title = "Coming Soon";
                        endif;

                        if(get_the_post_thumbnail()):
                            $img = get_the_post_thumbnail_url(); else:
                            $img = get_theme_file_uri('images/dummy.jpg');
                        endif;

                        $thumbnail = "<img src='{$img}' alt='{$title}'>";
                    ?>
                    <li>
                        <a href="<?php the_permalink();?>">
                            <p class="img"><?php echo $thumbnail ?></p>
                            <p class="date"><?php echo $date ?></p>
                            <p class="tt"><?php echo $title ?></p>
                            <?php if ($list_cate_column) : foreach($list_cate_column as $column) : setup_postdata($post); ?>
                                <p class="cate cate_<?php echo $column->term_id ?>"><?php echo $column->name ?></p>
                            <?php  endforeach; endif; ?>
                            <?php
                                $list_tag_column =  get_the_terms($post->ID, 'post_tag' );
                                if (!empty($list_tag_column)) { ?>
                                    <ul class="column-similar-tag">
                                        <?php foreach($list_tag_column as $column) : setup_postdata($post); ?>
                                        <li><p href="<?php bloginfo( 'url' ); ?>/tag/<?php echo $column->slug; ?>/">#<?php echo $column->name ?></p></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php }
                            ?>

                        </a>
                    </li>
                    <?php
                    endforeach;
                    wp_reset_query();
                ?>
            </ul>


            <p class="btn-primary center" ><a href="<?php echo home_url('/column/'); ?>">txt_txt</a></p>
        </div>
    </div>
    <div id="sec05">
        <div class="inner">
            <div class="sec05-box" >
                <div class="sec05-list">
                    <?php
                        $args = array(
                            'post_status' => 'publish',
                            'post_type' =>'post',
                            'order' => 'DESC',
                            'orderby' => 'date',
                            'posts_per_page' => 50,
                            );
                        $the_query = new WP_Query( $args );
                        $qa_posts = get_posts($args);
                        foreach($qa_posts as $post) :
                            setup_postdata($post);
                            $date = get_the_date('Y.m.d', $post->ID);
                            $title = get_the_title();
                            if(get_the_title() != ""){ $title = get_the_title();} else{ $title = "Coming Soon";}
                            $list_category_news = get_the_terms($post->ID, 'category' );
                        ?>
                        <dl><dt><?php echo $date ?></dt><dd><a href="<?php the_permalink();?>"><?php echo $title ?></a></dd>
                    </dl>
                    <?php

                    endforeach;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end #main-->
<?php
get_footer();
?>