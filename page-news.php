<?php
$obj = get_queried_object();
$GLOBALS['title'] = "txt_txt";
$GLOBALS['keywords'] = "txt_txt";
$GLOBALS['description'] = "txt_txt";
$GLOBALS['h1'] = "txt_txt";

$GLOBALS['bodyID'] = "topics";
$GLOBALS['bodyClass'] = "under";

$cat_name = get_the_category();
get_header();
?>
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
						<li>txt_txt</li>
				</ul>
				</div>
		</div>
	<!-- content start -->
	<div id="content">
		<div class="inner clearfix">
			<h3 class="h3_title">txt_txt</h3>
			<div class="section clearfix">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					global $post;
					$args = array(
						'post_type' =>'post',
						'orderby' => 'date',
						'order' => 'desc',
						'posts_per_page' => 10,
						'paged' => $paged,
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