<?php
global $wp_query;
global $post;

// ================ DEFAULT SETTING ===================
//add Featured Image
add_theme_support( 'post-thumbnails' );
//remove_filter( 'the_excerpt', 'wpautop' );
/*increa limit upload file*/
@ini_set( 'upload_max_size', '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );
/*--add feature images--*/
//ADD MENU
if ( function_exists( 'register_nav_menu' ) ) {
    register_nav_menu( 'main-menu', 'Main Menu' );
}
//EXCERPT
add_post_type_support( 'page', 'excerpt' );
function close_tags( $text ) {
    $patt_open = "%((?<!</)(?<=<)[\s]*[^/!>\s]+(?=>|[\s]+[^>]*[^/]>)(?!/>))%";
    $patt_close = "%((?<=</)([^>]+)(?=>))%";
    if ( preg_match_all( $patt_open, $text, $matches ) ) {
        $m_open = $matches[ 1 ];
        if ( !empty( $m_open ) ) {
            preg_match_all( $patt_close, $text, $matches2 );
            $m_close = $matches2[ 1 ];
            if ( count( $m_open ) > count( $m_close ) ) {
                $m_open = array_reverse( $m_open );
                foreach ( $m_close as $tag )$c_tags[ $tag ]++;
                foreach ( $m_open as $k => $tag )
                    if ( $c_tags[ $tag ]-- <= 0 )$text .= '</' . $tag . '>';
            }
        }
    }
    return $text;
}
function content_by_id( $num, $id ) {
    $post_content = get_post( $id );
    $theContent = $post_content->post_content;
    $output = preg_replace( '/<img[^>]+./', '', $theContent );
    $limit = $num + 1;
    $content = explode( ' ', $output, $limit );
    array_pop( $content );
    $content = implode( " ", $content );
    $content = strip_tags( $content, '<p><a><address><a><abbr><acronym><b><big><blockquote><br><caption><cite><class><code><col><del><dd><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><ins><kbd><li><ol><p><pre><q><s><span><strike><strong><sub><sup><table><tbody><td><tfoot><tr><tt><ul><var>' );
    $a = close_tags( $content );
    $b = $a . " ...";
    return $b;
} //REMOVE NEXT ENTRIES

require_once( dirname( __FILE__ ) . '/includes/shortcode.php' );
require_once( dirname( __FILE__ ) . '/includes/create_posttype.php' );
// require_once( dirname( __FILE__ ) . '/includes/add_image_size.php' );
// add_image_size( 'img_240x180', 240, 180, true );

// ================ END DEFAULT SETTING ===================
// ================ EMBEDED RESOURCES ===================
 function theme_sources() {
    global $wp_query;
    global $post;
    // cancel jquery of wordpress
    wp_deregister_script('jquery');

    // CSS
    if(is_front_page() || is_home()) : wp_enqueue_style( 'aos', get_theme_file_uri('/css/aos.css') );
    endif;
    wp_enqueue_style( 'base', get_theme_file_uri('/css/base.css') );
    wp_enqueue_style( 'fonts', get_theme_file_uri('/css/fonts.css') );
    wp_enqueue_style( 'slick', get_theme_file_uri('/css/slick.css') );
    wp_enqueue_style( 'slick-them', get_theme_file_uri('/css/slick-theme.css') );
    wp_enqueue_style( 'styles', get_theme_file_uri('/css/styles.css') );
    wp_enqueue_style( 'responsive', get_theme_file_uri('/css/responsive.css') );
    if(!is_front_page()) :
        wp_enqueue_style( 'under', get_theme_file_uri('/css/under.css') );
        wp_enqueue_style( 'under-res', get_theme_file_uri('/css/under_responsive.css') );
    endif;
    // END CSS

    // JAVASCRIPT
    wp_enqueue_script( 'jquery', get_theme_file_uri('/js/jquery.js'), array(), '', 1 );
    wp_enqueue_script( 'sweetlink', get_theme_file_uri('/js/sweetlink.js'), array(), '', 1 );
    wp_enqueue_script( 'tracktel', get_theme_file_uri('/js/track-tel.js'), array(), '', 1 );
    wp_enqueue_script( 'scroll-js', get_theme_file_uri('/js/jquery.scroll.js'), array(), '', 1 );
    wp_enqueue_script( 'common-js', get_theme_file_uri('/js/common.js'), array(), '', 1 );
    wp_enqueue_script( 'slick-min-js', get_theme_file_uri('/js/slick.min.js'), array(), '', 1 );

    if(is_front_page() || is_home() ) :
        wp_enqueue_script( 'top-js', get_theme_file_uri('/js/top.js'), array(), '', 1 );
        wp_enqueue_script( 'aos-js', get_theme_file_uri('/js/aos.js'), array(), '', 1 );
    endif;
    // END JAVASCRIPT
    if(is_page('contact')):
        wp_enqueue_script( 'ajax-zip', get_theme_file_uri('/js/ajaxzip3.js'), array(), '', 1 );
    endif;
}
add_action('wp_enqueue_scripts', 'theme_sources');
// ================ END EMBEDED RESOURCES ===================
// ================ ADD FAVICON FOR WORDPRESS'S ADMIN PAGES ===================
function add_favicon() {
    $favicon_url = get_stylesheet_directory_uri() . '/images/favicon.ico';
    echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');
// ================ END ADD FAVICON FOR WORDPRESS'S ADMIN PAGES ===================
?>
<?php
    function content_number($num, $content) {
        $a = strip_tags($content);
        if(strlen($a)>$num)
        {
        $a = mb_substr($a,0,$num) . '…';
        }
        return $a;
    }
?>
