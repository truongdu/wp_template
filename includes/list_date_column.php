<!-- <?php
  $cat_name = get_the_category();
  $args = array(
      'post_type' => 'column',
      'posts_per_page' => -1,
      'cat' => $cat_name[0]->term_id,
  );
  $archiveByDate = new WP_Query($args);
  $month = '';
  $cate = $cat_name[0]->slug;

  if ($archiveByDate->have_posts()) :
    while ($archiveByDate->have_posts()) :
      $archiveByDate->the_post();
      if($month != get_the_date('m')):
        $month = get_the_date('m');
        if($cate == ""){
          ?>
            <li><a href="<?php echo home_url('column').'/?qYear='.get_the_date('Y').'&qMonth='.get_the_date('m') ?>"><?php echo get_the_date('Y年m月'); ?></a></li>

          <?php
        }else{ ?>
            <li><a href="<?php echo home_url('column-category').'/'.$cate.'/?qYear='.get_the_date('Y').'&qMonth='.get_the_date('m') ?>"><?php echo get_the_date('Y年m月'); ?></a></li>

          <?php
        }
        ?>
        <?php
      endif;
    endwhile;
  endif;
  wp_reset_query();
?> -->



<?php
    $args = array(
        'post_type' => 'column',
        'posts_per_page' => -1,
      );
      $query = new WP_Query( $args );

      $archiveByDate = new WP_Query($args);
      $monthly_array = array();
      if ($archiveByDate->have_posts()) :
        while ($archiveByDate->have_posts()) :
          $archiveByDate->the_post();
          $monthly = get_the_date('Y.m');
          array_push($monthly_array, $monthly);
          // if($month != get_the_date('m')):
          //   $month = get_the_date('m');
          //   $count = $query->post_count;
            ?>
            <!-- <li><a href="<?php echo home_url('column').'/?qYear='.get_the_date('Y').'&qMonth='.get_the_date('m') ?>"><?php echo get_the_date('Y年m月'); ?>(<?php  echo($count); ?>)</a></li> -->
            <?php
          // endif;
        endwhile;
        $count_monthly_array = array_count_values($monthly_array);

        // echo "<pre>";
        // print_r($count_monthly_array);
        // echo "</pre>";
        foreach($count_monthly_array as $key => $count) :
          $explode_monthly = explode('.', $key)[0];
          $year = explode('.', $key)[0];
          $month = explode('.', $key)[1];
          echo '<li><a href="'. home_url('column'). '/?qYear='. $year .'&qMonth='. $month .'">'. $year .'年'. $month .'月('. $count .')</a></li>';
        endforeach;
      endif;
?>