<?php
require get_theme_file_path('/inc/search-route.php');

function load_files()
{
    wp_enqueue_style('school_home_stylesheet', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('school_stylesheet2', get_theme_file_uri('/build/index.css'));

    wp_enqueue_style('font_awesome_icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    wp_enqueue_style('school_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Rubik:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('school_stylesheet', get_stylesheet_uri());

    wp_enqueue_script('school_js', get_theme_file_uri('/build/index.js'), NULL, '1.0', true);
    //    
    wp_localize_script('school_js', 'siteData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}
add_action('wp_enqueue_scripts', 'load_files');

function school_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('teacher_portrait', 180, 270, true);
    add_image_size('teacher_landscape', 220, 180, true);
    // add_image_size('teacher_landscape', 220, 180, array( 'left', 'top'));
    add_image_size('page_banner', 1500, 700, true);

    register_nav_menu('header-menu', 'Header Menu');
    register_nav_menu('footer-menu', 'Footer Menu');
}
add_action('after_setup_theme', 'school_features');

function display_page_banner($args = NULL){
    if( !isset($args['title']) || empty($args['title']) ) {
        $args['title'] = get_the_title();
    }
    if( !isset($args['description']) || empty($args['description'])) {
        $args['description'] = get_field('description');
    }
    if( !isset($args['image']) || empty($args['image'])) {
        if (get_field('background_image')){
            $backgroundImage = get_field('background_image'); 
            $args['image'] = $backgroundImage["sizes"]["page_banner"];
        }
        else {
            $args['image'] =  get_theme_file_uri('/assets/images/banner.jpg'); 
        }
    }
    ?>
    <!-- Banner Section -->
    <div class="image-and-banner">
        <img class="image" src="<?php echo $args['image']; ?>" alt="" />
        <div class="banner-section">
        <div class="banner">
            <h1 class="banner-primary"><?php echo $args['title']; ?></h1>
            <h2 class="banner-description"><?php echo $args['description']; ?></h2>
        </div>
        </div>
    </div>
    <?php
}

function alter_school_queries($query)
{
    if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'value' => date('Ymd'),
                'compare' => '>=',
                'type' => 'DATE'
            )
        ));
    }
}
add_action('pre_get_posts', 'alter_school_queries');

function school_custom_rest()
{
    register_rest_field('post', 'author_name', array(
        'get_callback' => function () {
            return get_the_author();
        }
    ));
    register_rest_field('lecture', 'lecture_post_count', array(
        'get_callback' => function () {
            return count_user_posts(get_current_user_id(), 'lecture');
        }
    ));
}
add_action('rest_api_init', 'school_custom_rest');

//check user role
function check_user_role($role){
    $user = wp_get_current_user();
    if(in_array( $role, (array) $user->roles )){
        return true;
    }
    return false;
 }
 
//redirect subscriber to homepage after loggin in
function redirect_login()
{
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 and ($currentUser->roles[0] == 'subscriber' or check_user_role('teacher'))) {
         wp_redirect(site_url('/'));
         exit;
    }
}
add_action('admin_init', 'redirect_login');

//redirect user to homepage after logging out
function redirect_logout(){
    wp_redirect(site_url('/'));
    exit;
}
add_action('wp_logout', 'redirect_logout');

//hide top admin bar from subscriber
function hide_admin_bar(){
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 and ($currentUser->roles[0] == 'subscriber' or check_user_role('teacher'))) {
        show_admin_bar(false);
    }
}
add_action('wp_loaded', 'hide_admin_bar'); 

//Login page logo points to homepage
function school_login_url(){
	return esc_url(site_url('/'));
}

add_filter('login_headerurl', 'school_login_url'); 

//use our own css on the login form
function load_login_css(){
    wp_enqueue_style('school_home_stylesheet', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('school_stylesheet2', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('font_awesome_icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    wp_enqueue_style('school_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Rubik:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('school_stylesheet', get_stylesheet_uri());
}
add_action('login_enqueue_scripts', 'load_login_css'); 

function school_login_title(){
	return 'School of Excellence';
}
add_filter('login_headertitle', 'school_login_title'); 

function make_lecture_private( $data, $arr ){
    if($data['post_type'] == 'lecture'){	 
        if(count_user_posts( get_current_user_id(), 'lecture') > 4 AND !$arr['ID']) {
            $error = json_encode('Max post limit reached');
            exit($error);
        }
        $data['post_title'] == sanitize_text_field($data['post_title']);
        $data['post_content'] == sanitize_textarea_field($data['post_content']);
    }
    if($data['post_type'] == 'lecture' && $data['post_status'] != 'trash')
        $data['post_status'] = 'private';
    return $data;
}

add_filter('wp_insert_post_data', 'make_lecture_private', 10, 2);

function remove_private_from_title( $title ) {
    // Return only the title portion as defined by %s, not the additional 'Private: '
    return "%s";
}

add_filter( 'private_title_format', 'remove_private_from_title' );
