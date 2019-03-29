<?php
// require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

 
 require_once (dirname(__FILE__) . '/sample/barebones-config.php');

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

/* NOTE 2803019 */

add_action( 'wp_enqueue_scripts', 'note_theme_enqueue_styles' , 20 );
function note_theme_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    
}

/* DISABLE CLASSIS EDITOR WORDPRESS */

if ( version_compare($GLOBALS['wp_version'], '5.0-beta', '>') ) {
    // WP > 5 beta
    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
} else {
    // WP < 5 beta
    add_filter( 'gutenberg_can_edit_post_type', '__return_false' );
}

/* CREATE SHORT CODE Ý KIẾN KHÁCH HÀNG */
if(!function_exists('create_shortcode_comment_custommer')) {
    function create_shortcode_comment_custommer() {
        $xhtml = '';
        $data = array(
            'custommer_1.jpg||Phạm Huy Cường||Đã Mua Tại dienthoaithongminh.info||Đã mua và cảm thấy rất hài lòng về máy. Cấu hình ngon cộng thêm camera rất đẹp. Pin xài tương đối ổn, cảm biến vân tay nhạy. Nói chung là siêu phẩm nên không có gì phải phàn nàn.||GROUP1059||BOX1060||GROUP1061||HEADLINE1067||GROUP1068||HEADLINE1069||HEADLINE1070||icon-star-cs1.png',
            'custommer_2.jpg||Hoàng Nữ Minh Châu||Đã Mua Tại dienthoaithongminh.info||Siêu phẩm xứng đáng, quà tặng giá trị, màn hình đẹp, camera xuất sắc. Nhân viên tư vấn dễ thương nhiệt tình. Mình sẽ giới thiệu thêm bạn bè ủng hộ cửa hàng.||GROUP1071||BOX1072||GROUP1073||HEADLINE1078||GROUP1079||HEADLINE1080||HEADLINE1081||icon-star-cs2.png',
            'custommer_3.jpg||Nguyễn Ngọc Duyên||Đã Mua Tại dienthoaithongminh.info||Máy này đúng là siêu phẩm mình thấy rất mượt chơi game không nóng, nhiều người không thích exyno mà với mình exyno rất tốt, có cái riêng của Samsung.||GROUP1082||BOX1083||GROUP1084||HEADLINE1090||GROUP1091||HEADLINE1092||HEADLINE1093||icon-star-cs3.png'
        );
        foreach ($data as $key => $item) {
            $exdata = explode('||',$item);
            $xhtml.= '<div id="'.$exdata[4].'" class="widget-element widget-snap widget-group" lp-type="widget_group" lp-lang="GROUP" lp-display="block" lp-group="GROUP1253">
                        <div class="widget-content">
                            <div id="'.$exdata[5].'" class="widget-element widget-snap ladi-drop lazy-hidden" lp-type="box" lp-lang="BOX" lp-group="GROUP1059" lp-display="block">
                                <div class="widget-content">';
            $xhtml.=                  '<img class="custommer-image-photo" src="http://note9.sharenows.com/wp-content/uploads/2019/03/'.$exdata[0].'">';
            $xhtml.=            '</div>
                                <div class="ladi-widget-overlay"></div>
                            </div>
                            <div id="'.$exdata[6].'" class="widget-element widget-snap widget-group" lp-type="widget_group" lp-lang="GROUP" lp-display="block" lp-group="GROUP1059">
                                <div class="widget-content">';
            $xhtml.=                '<img class="custommer-star-photo" src="http://note9.sharenows.com/wp-content/uploads/2019/03/'.$exdata[11].'">';   
            $xhtml.=            '</div>
                            </div>
                            <div id="'.$exdata[7].'" class="widget-element widget-snap" lp-type="textinline" lp-editor="true" lp-lang="HEADLINE" lp-group="GROUP1059" lp-display="block">';
            $xhtml.=                  '<p class="widget-content" lp-node="p">'.$exdata[3].'</p>';
            $xhtml.=        '</div>
                            <div id="'.$exdata[8].'" class="widget-element widget-snap widget-group" lp-type="widget_group" lp-lang="GROUP" lp-display="block" lp-group="GROUP1059">
                                <div class="widget-content">
                                    <div id="'.$exdata[9].'" class="widget-element widget-snap" lp-type="textinline" lp-editor="true" lp-lang="HEADLINE" lp-group="GROUP1068" lp-display="block">';
            $xhtml.=                     '<h6 class="widget-content" lp-node="h6">'.$exdata[1].'</h6>';
            $xhtml.=                '</div>';
            $xhtml.=                '<div id="'.$exdata[10].'" class="widget-element widget-snap" lp-type="textinline" lp-editor="true" lp-lang="HEADLINE" lp-group="GROUP1068" lp-display="block">
                                        <h6 class="widget-content" lp-node="h6">'.$exdata[2].'</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $xhtml;
    }
    add_shortcode( 'COMMENT-CUSTOMMER', 'create_shortcode_comment_custommer');
}


add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

if ( !function_exists('register_sidebar_footer') ){
    function register_sidebar_footer() {
    register_sidebar( array(
        'name'          => __( 'Footer Copyright', 'note9.sharenows.com' ),
        'id'            => 'sidebar-footer',
        'description'   => __( 'Widgets in this area will be shown on footer.', 'note9.sharenows.com' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    }
    add_action( 'widgets_init', 'register_sidebar_footer' );
}


/* CREATE SHORT CODE */
if(!function_exists('create_shortcode')) {
    if(!class_exists('Cuongdeptrai')){
        echo 'hello world';
    }
}

echo 'abc';