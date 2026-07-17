<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'custom-home-page' ); ?>>
<?php wp_body_open(); ?>

<header class="site-header-custom">
	<div class="header-shell">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="brand-mark">A</span>
			<span class="brand-copy">
				<strong>آونتورین</strong>
				<small>جواهرات لوکس</small>
			</span>
		</a>

		<div class="header-actions">
			<button class="icon-btn icon-btn--search" type="button" aria-label="جستجو">
				<span>⌕</span>
			</button>
			<a class="icon-btn" href="<?php echo function_exists( 'wc_get_page_permalink' ) ? esc_url( wc_get_page_permalink( 'myaccount' ) ) : esc_url( home_url( '/my-account/' ) ); ?>" aria-label="حساب کاربری">
				<span>◌</span>
			</a>
			<a class="icon-btn" href="<?php echo function_exists( 'wc_get_cart_url' ) ? esc_url( wc_get_cart_url() ) : esc_url( home_url( '/cart/' ) ); ?>" aria-label="سبد خرید">
				<span>🛍</span>
			</a>
			<button class="menu-toggle" type="button" aria-label="فهرست موبایل">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>

	<nav class="mobile-nav" id="mobile-nav" aria-label="منوی موبایل">
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_class'     => 'mobile-nav-list',
				'container'      => false,
				'fallback_cb'    => false,
			) );
		} else {
			echo '<ul class="mobile-nav-list"><li><a href="' . esc_url( home_url( '/shop/' ) ) . '">فروشگاه</a></li></ul>';
		}
		?>
	</nav>

	<nav class="desktop-categories" aria-label="دسته‌بندی‌ها">
		<?php
		$categories = array(
			array( 'name' => 'انگشتر', 'slug' => 'ring', 'icon' => '◌' ),
			array( 'name' => 'گوشواره', 'slug' => 'earrings', 'icon' => '✦' ),
			array( 'name' => 'دستبند', 'slug' => 'bracelet', 'icon' => '❋' ),
			array( 'name' => 'گردنبند', 'slug' => 'necklace', 'icon' => '◍' ),
		);

		foreach ( $categories as $category ) {
			$term = get_term_by( 'slug', $category['slug'], 'product_cat' );
			$link = $term && ! is_wp_error( $term ) ? get_term_link( $term ) : home_url( '/shop/' );
			if ( is_wp_error( $link ) ) {
				$link = home_url( '/shop/' );
			}
			echo '<a class="category-pill" href="' . esc_url( $link ) . '"><span>' . esc_html( $category['icon'] ) . '</span>' . esc_html( $category['name'] ) . '</a>';
		}
		?>
	</nav>
</header>
