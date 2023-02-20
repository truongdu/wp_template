<?php
/* Template Name: Postype News */


$obj = get_queried_object();
$post_categories = wp_get_object_terms( get_the_ID(), 'category', '' );
$term_list = wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'all' ) );

$GLOBALS['h1'] = "txt_txt";
$GLOBALS['keywords'] = "txt_txt";

if($obj -> slug == 'cate1'){
	$GLOBALS['title'] = "txt_txt";
	$GLOBALS['description'] = "txt_txt";
}elseif($obj -> slug == 'cate2'){
	$GLOBALS['title'] = "txt_txt";
	$GLOBALS['description'] = "txt_txt";
} else{
	$GLOBALS['title'] = "txt_txt";
	$GLOBALS['description'] = "txt_txt";
}

$GLOBALS['bodyID'] = "news";
$GLOBALS['bodyClass'] = "under";

$list_category_news = get_the_terms($post->ID, 'category' );
$GLOBALS['h2'] = $list_category_news[0]->name;

$cat_name = get_the_category();
get_header();
?>
<div id="main">
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
					<li><a href="<?php echo home_url('/topics/'); ?>">txt_txt</a></li>
					<li><?php echo $GLOBALS['h2'] ?></li>
				</ul>
		</div>
	</div>
	<!-- content start -->
	<div id="content">
		<div class="inner clearfix">
			<h3 class="h3_title"><?php echo $GLOBALS['h2'] ?></h3>
				<div class="section clearfix">
					<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						global $post;
						$year     = get_query_var('year');
						$monthnum = get_query_var('monthnum');
						$day_query = array( array(
													'year' => $year,
													'monthnum' => $monthnum,
													),);
						$args = array(
							'post_type' =>'post',
							'orderby' => 'date',
							'order' => 'desc',
							'posts_per_page' => 10,
							'paged' => $paged,
							'cat' => $cat_name[0]->term_id,
							'date_query' => $day_query,
						);

						$the_query = new WP_Query( $args );
						$array_posts = get_posts($args);
						$categories = get_categories($args);
					?>
					<?php if($array_posts): ?>
						<div class="sec05-list">
							<?php
								foreach($array_posts as $post):setup_postdata($post);
							?>
							<dl>
									<dt><?php echo get_the_date('Y.m.d'); ?></dt>
									<dd>
										<?php
											if(get_the_title() != ""){ ?>
												<a href="<?php the_permalink();?>"><?php echo get_the_title() ?></a>
											<?php } else{ ?>
												<a href="<?php the_permalink();?>">Coming Soon</a>
											<?php }
										?>
									</dd>
							</dl>
							<?php endforeach;?>
						</div>
					<?php else: ?>
				<p>現在のカテゴリに一致する投稿はありません。</p>
				<?php endif;?>
				<div class="section">
					<?php wp_pagenavi( array( 'query' => $the_query ) ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end #main -->
<?php
get_footer();
?>