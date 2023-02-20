<?php
if ( have_posts() ):
	while( have_posts() ):
		the_post();
		$obj = get_queried_object();

		$GLOBALS['title'] = get_post_meta($post->ID, 'meta_title', true) ? get_post_meta($post->ID, 'meta_title', true) : get_the_title()."txt_txt";
		$GLOBALS['keywords'] = get_post_meta($post->ID, 'meta_keywords', true) ? get_post_meta($post->ID, 'meta_keywords', true) : "txt_txt";
		$GLOBALS['description'] = get_post_meta($post->ID, 'meta_description', true) ? get_post_meta($post->ID, 'meta_description', true) : "txt_txt";
		$GLOBALS['h1'] = get_post_meta($post->ID, 'meta_h1', true) ? get_post_meta($post->ID, 'meta_h1', true) : "txt_txt";
		$GLOBALS['h2'] = get_the_title();

		$GLOBALS['bodyID'] = $post->post_name;
		$GLOBALS['bodyClass'] = "under";

		get_header();
		?>
		<div id="main">
				<?php
					if(is_page('brand_story')){ ?>
						<div id="content">
							<?php the_content(); ?>
						</div>
					<?php } else{ ?>
						<!-- #top_info -->
						<div id="top_info" class="clearfix">
							<div class="inner">
								<h2 class="h2_title"><?php echo $GLOBALS['h2']; ?></h2>
							</div>
						</div>
						<!-- end #top_info -->
						<!-- #topic_path -->
						<div id="topic_path" class="clearfix">
							<div class="inner">
								<ul>
									<li><a href="#">TOP</a></li>
									<li><?php echo strip_tags(get_the_title()); ?></li>
								</ul>
							</div>
						</div>
						<!-- end #topic_path -->
						<!-- content start -->
						<div id="content">
							<div class="inner">
								<?php the_content(); ?>
							</div>
						</div>
					<?php } ?>
		</div>
		<!-- end #main -->
	<?php
		get_footer();
	endwhile;
endif;
?>