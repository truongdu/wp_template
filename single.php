<?php
$obj = get_queried_object();
//  echo "<pre>";
//  print_r($obj);
//  echo "</pre>";

$post_categories = wp_get_object_terms( get_the_ID(), 'category', '' );
$term_list = wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'all' ) );

if ( have_posts() ):
	while( have_posts() ):
		the_post();

		$GLOBALS['title'] = get_post_meta($post->ID, 'meta_title', true) ? get_post_meta($post->ID, 'meta_title', true) : get_the_title()."｜txt_txt";
		$GLOBALS['keywords'] = get_post_meta($post->ID, 'meta_keywords', true) ? get_post_meta($post->ID, 'meta_keywords', true) : "txt_txt";
		$GLOBALS['description'] = get_post_meta($post->ID, 'meta_description', true) ? get_post_meta($post->ID, 'meta_description', true) : "txt_txt";
		$GLOBALS['h1'] = get_post_meta($post->ID, 'meta_h1', true) ? get_post_meta($post->ID, 'meta_h1', true) : "txt_txt";

		$GLOBALS['bodyID'] = 'topics';
		$GLOBALS['bodyClass'] = "under";
		$list_category_topics = get_the_terms($post->ID, 'category' );
		$GLOBALS['h2'] = $list_category_topics[0]->name;

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
						<li><?php echo strip_tags(get_the_title()); ?></li>
				</ul>
				</div>
		</div>
	<!-- content start -->
	<div id="content">
			<!-- content start -->
				<div class="inner">
					<div class="section clearfix">
						<?php
							if(get_the_title() != ""){ ?>
							<h3 class="h3_title"><?php the_title() ?></h3>
							<?php } else{ ?>
								<h3 class="h3_title">Coming Soon</h3>
							<?php }
						?>

						<div><?php the_content(); ?></div>
					</div>
					<div class="section clearfix">
								<div class="group_u_btn">
										<p class="btn-primary center"><a href="<?php echo home_url('/topics/'); ?>" class="view-list"><span>txt_txt</span></a></p>
								</div>
						</div>
				</div>
		</div>
</div>
<!-- end #main -->
<?php
	endwhile;
endif;
get_footer();
?>