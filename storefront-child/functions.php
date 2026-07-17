<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'locale_stylesheet_uri', function ( $localized_stylesheet_uri ) {
	$time_ver = filemtime( get_stylesheet_directory() . '/rtl.css' );
	return add_query_arg( array( 'ver' => $time_ver ), $localized_stylesheet_uri );
} );

function shayanweb_wppanelfonts() {
	wp_enqueue_style( 'custom_admin_panel_style', trailingslashit( get_stylesheet_directory_uri() ) . 'admin-font.css' );
}
add_action( 'admin_enqueue_scripts', 'shayanweb_wppanelfonts' );

function shayanweb_footer_copyright() {
	register_sidebar( array(
		'name'          => __( 'کپی‌رایت فوتر (اختصاصی شایان وب)', 'storefront' ),
		'id'            => 'shayanweb_footer_copyright',
		'description'   => __( 'در اینجا یک ابزارک "متن" قرار دهید و متن کپی رایت را بنویسید. کدنویسی شده توسط شایان وب. (این قابلیت فقط در نسخه‌ی فارسی استور فرانت شایان وب قرار دارد.)', 'storefront' ),
		'before_widget' => '<div id="%1$s" class="footer-copyright %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widgettitle">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'shayanweb_footer_copyright' );

add_action( 'admin_init', 'shayanweb_copy_translations' );
function shayanweb_copy_translations() {
	copy( trailingslashit( get_stylesheet_directory_uri() ) . 'languages/import/storefront-fa_IR.po', '../wp-content/languages/themes/storefront-fa_IR.po' );
	copy( trailingslashit( get_stylesheet_directory_uri() ) . 'languages/import/storefront-fa_IR.mo', '../wp-content/languages/themes/storefront-fa_IR.mo' );
}

function storefront_child_enqueue_assets() {
	wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null );
	wp_enqueue_style( 'storefront-child-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );
	wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true );
	wp_enqueue_script( 'storefront-child-home', get_stylesheet_directory_uri() . '/assets/home.js', array( 'swiper-js' ), filemtime( get_stylesheet_directory() . '/assets/home.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_assets' );

function storefront_child_front_page_template( $template ) {
	if ( is_front_page() && file_exists( get_stylesheet_directory() . '/template-home.php' ) ) {
		return get_stylesheet_directory() . '/template-home.php';
	}

	return $template;
}
add_filter( 'template_include', 'storefront_child_front_page_template' );

function storefront_child_prepare_homepage() {
	if ( is_page_template( 'template-home.php' ) || is_front_page() ) {
		remove_all_actions( 'storefront_homepage' );
		remove_all_actions( 'homepage' );
		remove_all_actions( 'storefront_content_top' );
		remove_all_actions( 'storefront_before_content' );
		remove_all_actions( 'storefront_after_content' );
		remove_all_actions( 'storefront_content_bottom' );
	}
}
add_action( 'wp', 'storefront_child_prepare_homepage' );
