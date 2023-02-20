<?php
$GLOBALS['title'] = "txt_txt";
$GLOBALS['keywords'] = "txt_txt";
$GLOBALS['description'] = "txt_txt";
$GLOBALS['h1'] = "txt_txt";

$GLOBALS['bodyID'] = "column";
$GLOBALS['bodyClass'] = "under";

$obj = get_queried_object();
$cat_name = get_the_category();
get_header();
?>
    <div id="main">
        <!-- #top_info -->
        <div id="top_info" class="clearfix">
            <div class="inner">
                <h2>txt_txt</h2>
            </div>
        </div>
        <!-- end #top_info -->
        <!-- #topic_path -->
        <div id="topic_path" class="clearfix">
            <div class="inner">
            <ul>
                <li><a href="#">TOP</a></li>
                <li>txt_txt</li>
            </ul>
            </div>
        </div>
        <!-- end #topic_path -->

        <div id="content" class="clearfix">
            <div class="inner">
                <?php
                    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                    global $post;

                    // Query post argument
                    $args = array(
                        'post_type' =>'column',
                        'orderby' => 'date',
                        'order' => 'desc',
                        'posts_per_page' => 10,
                        'paged' => $paged,

                    );
                    if($_GET['qYear'] && $_GET['qMonth']) :
                        $args['year'] = $_GET['qYear'];
                        $args['monthnum'] = $_GET['qMonth'];
                    endif;

                    $the_query = new WP_Query( $args );
                    $array_posts = get_posts($args);
                    $categories = get_categories($args);

                ?>

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
                        <?php
                        if($array_posts): ?>
                        <div class="blog_box">
                            <h3 class="h3_title">コラムカテゴリータイトルが入ります。</h3>
                            <div class="blog_list">
                                <?php
                                foreach($array_posts as $post):
                                    setup_postdata($post);
                                    $list_category_column = get_the_terms($post->ID, 'column-category' );

                                    $boxh4_img = isset(get_field('column_boxh4')['img']['url']) ? get_field('column_boxh4')['img']['url'] : "";
                                    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
                                    ?>
                                    <div class="img">
                                    <?php
                                    $f = 'img'; $src = '_Src'; $value = '_Value';
                                    $feature_img = '';
                                        for($i = 1; $i <= 10 ; $i++){
                                        $value_img = ${$f.$i.$value};
                                        $src_img = ${$f.$i.$src};
                                        if($value_img!=""){
                                            $feature_img = $src_img;
                                            break;
                                        }
                                        }
                                    if($feature_img==''){
                                        $feature_img = "../images/dummy.jpg";
                                    }
                                    ?>
                                    <img src="<?php echo $feature_img; ?>" alt="<?php echo the_title(); ?>">
                                    </div>


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
                                            <?php
                                                if(get_the_title() != ""){ ?>
                                                    <p class="title"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></p>
                                                <?php } else{ ?>
                                                    <p class="title"><a href="<?php the_permalink(); ?>">Coming Soon</a></p>
                                                <?php }
                                            ?>
                                            <div class="group_cate">
                                                <?php
                                                if ($list_category_column) : foreach($list_category_column as $column) : setup_postdata($post); ?>
                                                    <p class="cate cate_<?php echo $column->term_id?>"><?php echo $column->name ?></p>
                                                <?php  endforeach; endif; ?>
                                            </div>
                                            <div class="blog_txt"><?php echo mb_strimwidth(strip_tags(get_the_content()), 0, 150, '…', 'UTF-8');?></div>
                                            <p class="date"><?php echo get_the_date('Y.m.d'); ?>
                                        </dd>
                                    </dl>
                                <?php
                                endforeach; ?>
                            </div>

                            <!-- NO PLUGIN PAGENAVI -->
                            <?php if (function_exists('devvn_wp_corenavi')) devvn_wp_corenavi($the_query); ?>

                            <!-- PLUGIN PAGENAVI -->
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
                <?php
                    else:
                        echo '<p class="">記事は見つかりませんでした。</p>';
                    endif;
                ?>

            </div>
        </div>
    <!-- end #main -->
    </div>
<?php
get_footer();
?>
