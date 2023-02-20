<?php
$obj = get_queried_object();
//  echo "<pre>";
//  print_r($obj);
//  echo "</pre>";

$post_categories = wp_get_object_terms( get_the_ID(), 'column-category', '' );
$term_list = wp_get_post_terms( $post->ID, 'column-category', array( 'fields' => 'all' ) );

if ( have_posts() ):
	while( have_posts() ):
		the_post();
        $GLOBALS['title'] = get_post_meta($post->ID, 'meta_title', true) ? get_post_meta($post->ID, 'meta_title', true) : get_the_title()."｜txt_txt";
		$GLOBALS['keywords'] = get_post_meta($post->ID, 'meta_keywords', true) ? get_post_meta($post->ID, 'meta_keywords', true) : "txt_txt";
		$GLOBALS['description'] = get_post_meta($post->ID, 'meta_description', true) ? get_post_meta($post->ID, 'meta_description', true) : "txt_txt";
        $GLOBALS['h1'] = get_post_meta($post->ID, 'meta_h1', true) ? get_post_meta($post->ID, 'meta_h1', true) : "txt_txt";

        $list_category_column = get_the_terms($post->ID, 'column-category' );
        $list_tag_column =  get_the_terms($post->ID, 'post_tag' );
        $list_author_column = get_the_terms($post->ID, 'column-author' );

        $GLOBALS['h2'] = $list_category_column[0]->name;

		$GLOBALS['bodyID'] = "column";
        $GLOBALS['bodyClass'] = "under";

		get_header();
        ?>
        <div id="main">
            <div id="content" class="clearfix">
            <!-- #top_info -->
            <div id="top_info" class="clearfix">
                <div class="inner">
                <h2 class="h2_title"><?php echo $GLOBALS['h2'] ?></h2>
                </div>
            </div>
            <!-- end #top_info -->
            <!-- #topic_path -->
            <div id="topic_path" class="clearfix">
                <div class="inner">
                <ul>
                    <li><a href="#">TOP</a></li>
                    <li><a href="<?php echo home_url('/column/'); ?>">txt_txt</a></li>
                    <li><a href="<?php bloginfo( 'url' );?>/column-category/<?php echo $term_list[0]->slug ?>"><?php echo $GLOBALS['h2'] ?></a></li>
                    <li><?php echo strip_tags(get_the_title()); ?></li>
                </ul>
                </div>
            </div>
            <!-- end #topic_path -->
            <div id="content">
                <div class="inner clearfix">
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
                            <div class="blog_detail">
                                <?php
                                    $boxh4_img = isset(get_field('column_boxh4')['img']['url']) ? get_field('column_boxh4')['img']['url'] : "";
                                    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
                                ?>

                                <h3><?php the_title() ?></h3>

                                <div class="detal_cate">
                                    <?php
                                        if ($list_category_column) : foreach($list_category_column as $column) : setup_postdata($post); ?>
                                        <p class="cate cate_<?php echo $column->term_id?>"><?php echo $column->name ?></p>
                                        <?php  endforeach; endif; ?>
                                        <p class="date"><?php echo get_the_date('Y/m/d');
                                    ?>
                                </div>

                                <?php
                                if(get_the_content() != ""){ ?>
                                    <div class="section clearfix">
                                        <div><?php the_content(); ?></div>
                                    </div>
                                <?php }
                                ?>

                                <div class="author_box">
                                    <?php
                                        if ($list_author_column) : foreach($list_author_column as $column) : setup_postdata($post); ?>
                                        <p><?php echo $column->name ?></p>
                                    <?php  endforeach; endif; ?>
                                </div>

                                <?php
                                    if (!empty($list_tag_column)) { ?>
                                        <ul class="column-similar-tag">
                                            <?php foreach($list_tag_column as $column) : setup_postdata($post); ?>
                                            <li><p href="<?php bloginfo( 'url' ); ?>/tag/<?php echo $column->slug; ?>/">#<?php echo $column->name ?></p></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php }
                                ?>


                                <div class="section clearfix">
                                    <?php
                                        $prev_post = get_previous_post( true, '', 'column-category' );
                                        if ( $prev_post ) {
                                            $prev_url = get_permalink( $prev_post->ID );
                                            $prev_title = get_the_title( $prev_post->ID );
                                        }
                                        $next_post = get_next_post( true, '', 'column-category' );
                                        if ( $next_post ) {
                                            $next_url = get_permalink( $next_post->ID );
                                            $next_title = get_the_title( $next_post->ID );
                                        }
                                    ?>
                                    <div class="single_btn">
                                        <div>
                                            <?php if($prev_post) { ?>
                                                <p class="btn prev"><a href="<?php echo $prev_url; ?>" class="view-list"><span>≪ 前の記事へ</span></a></p>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <?php
                                                foreach ( $post_categories as $postcat1 ) {
                                                    echo '<p class="btn btn_view"><a href="' . esc_url( get_category_link( $postcat1->term_id ) ) . '" class="view-list"><span>一覧に戻る</span></a></p>';
                                                }
                                            ?>
                                        </div>
                                        <div>
                                            <?php if($next_post) { ?>
                                                <p class="btn next"><a href="<?php echo $next_url; ?>" class="view-list"><span>次の記事へ ≫</span></a></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
	get_footer();
	endwhile;
endif;
?>