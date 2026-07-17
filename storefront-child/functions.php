<?php
//// Shayan - rtl.css version for cash
add_filter( 'locale_stylesheet_uri', function ($localized_stylesheet_uri) {
    $time_ver = filemtime( get_stylesheet_directory() . '/rtl.css' );
    return add_query_arg( array('ver' => $time_ver), $localized_stylesheet_uri );
});
///////
///////////// ShayanFP Admin Font
function shayanweb_wppanelfonts() {
	wp_enqueue_style( 'custom_admin_panel_style', trailingslashit( get_stylesheet_directory_uri() ) . 'admin-font.css' );
}
add_action( 'admin_enqueue_scripts', 'shayanweb_wppanelfonts' );
/////////////////////////////////////////
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
////
////
/// copy shayanweb translations
add_action( 'admin_init', 'shayanweb_copy_translations' );
function shayanweb_copy_translations() {
  copy( trailingslashit( get_stylesheet_directory_uri() ) . 'languages/import/storefront-fa_IR.po' , '../wp-content/languages/themes/storefront-fa_IR.po' );
  copy( trailingslashit( get_stylesheet_directory_uri() ) . 'languages/import/storefront-fa_IR.mo' , '../wp-content/languages/themes/storefront-fa_IR.mo' );
}
