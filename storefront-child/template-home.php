<?php
/*
Template Name: Home - Aventurin
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$hero_image = 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?auto=format&fit=crop&w=1400&q=80';
$categories = array(
	array( 'name' => 'انگشتر', 'slug' => 'ring', 'icon' => '◌', 'desc' => 'طراحی ظریف' ),
	array( 'name' => 'گوشواره', 'slug' => 'earrings', 'icon' => '✦', 'desc' => 'درخشش مینیمال' ),
	array( 'name' => 'دستبند', 'slug' => 'bracelet', 'icon' => '❋', 'desc' => 'شیک و مدرن' ),
	array( 'name' => 'گردنبند', 'slug' => 'necklace', 'icon' => '◍', 'desc' => 'آراسته و لوکس' ),
);

$discount_products = array();
$bestsellers = array();

if ( class_exists( 'WooCommerce' ) ) {
	$discount_query = new WC_Product_Query( array(
		'limit' => 8,
		'on_sale' => true,
		'status' => 'publish',
	) );
	$discount_products = $discount_query->get_products();

	$bestseller_query = new WC_Product_Query( array(
		'limit' => 8,
		'orderby' => 'meta_value_num',
		'meta_key' => 'total_sales',
		'order' => 'DESC',
		'status' => 'publish',
	) );
	$bestsellers = $bestseller_query->get_products();
}
?>

<main class="custom-home-page-main">
	<section class="hero-section" data-reveal>
		<div class="hero-overlay"></div>
		<img class="hero-image" src="<?php echo esc_url( $hero_image ); ?>" alt="جواهرات لوکس">
		<div class="hero-content">
			<p class="hero-kicker">مجموعهٔ جدید پاییزه</p>
			<h1>زیباییِ ماندگار در هر جزئیات</h1>
			<p>انگشترها، گوشواره‌ها و گردنبندهای دست‌ساز با ظاهری شفاف، مدرن و بی‌نقص برای لحظه‌های خاص شما.</p>
			<div class="hero-actions">
				<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">مشاهدهٔ فروشگاه</a>
				<a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">تجربهٔ مشاوره</a>
			</div>
		</div>
	</section>

	<section class="categories-section" data-reveal>
		<div class="section-heading">
			<p class="section-tag">کالکشن‌ها</p>
			<h2>دسته‌بندی‌های محبوب</h2>
		</div>
		<div class="category-grid">
			<?php foreach ( $categories as $category ) :
				$term = get_term_by( 'slug', $category['slug'], 'product_cat' );
				$link = $term && ! is_wp_error( $term ) ? get_term_link( $term ) : home_url( '/shop/' );
				if ( is_wp_error( $link ) ) {
					$link = home_url( '/shop/' );
				}
			?>
				<a class="category-card" href="<?php echo esc_url( $link ); ?>">
					<span class="category-icon"><?php echo esc_html( $category['icon'] ); ?></span>
					<strong><?php echo esc_html( $category['name'] ); ?></strong>
					<small><?php echo esc_html( $category['desc'] ); ?></small>
				</a>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="product-section" data-reveal>
		<div class="section-heading">
			<p class="section-tag">تخفیف ویژه</p>
			<h2>پیشنهادهای محدود</h2>
		</div>
		<div class="swiper discount-swiper">
			<div class="swiper-wrapper">
				<?php if ( ! empty( $discount_products ) ) : foreach ( $discount_products as $product ) :
					$product_url = $product->get_permalink();
					$image = wp_get_attachment_image( $product->get_image_id(), 'large', false, array( 'class' => 'product-image' ) );
					$regular = $product->get_regular_price();
					$sale = $product->get_price();
					$discount_percent = $regular && $sale ? round( ( ( $regular - $sale ) / $regular ) * 100 ) : 0;
				?>
				<div class="swiper-slide">
					<article class="product-card">
						<?php if ( $product->is_on_sale() ) : ?><span class="sale-badge">-<?php echo esc_html( $discount_percent ); ?>٪</span><?php endif; ?>
						<a class="product-media" href="<?php echo esc_url( $product_url ); ?>"><?php echo $image ? $image : '<img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?auto=format&fit=crop&w=900&q=80" alt="محصول">'; ?></a>
						<div class="product-body">
							<h3><?php echo esc_html( $product->get_name() ); ?></h3>
							<p><?php echo wp_kses_post( $product->get_short_description() ?: 'جواهرات دست‌ساز با جزئیات لوکس' ); ?></p>
							<div class="product-meta">
								<span><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
								<a class="small-btn" href="<?php echo esc_url( $product_url ); ?>">خرید</a>
							</div>
						</div>
					</article>
				</div>
				<?php endforeach; else : ?>
				<?php for ( $i = 0; $i < 4; $i++ ) : ?>
				<div class="swiper-slide">
					<article class="product-card">
						<span class="sale-badge">-۲۰٪</span>
						<a class="product-media" href="#"><img src="https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?auto=format&fit=crop&w=900&q=80" alt="محصول"></a>
						<div class="product-body">
							<h3>آویز طلایی مینیمال</h3>
							<p>طراحی ساده و درخشان برای استایل روزمره.</p>
							<div class="product-meta"><span>۱۴,۵۰۰,۰۰۰ تومان</span><a class="small-btn" href="#">خرید</a></div>
						</div>
					</article>
				</div>
				<?php endfor; ?>
				<?php endif; ?>
			</div>
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
	</section>

	<section class="product-section" data-reveal>
		<div class="section-heading">
			<p class="section-tag">پرفروش‌ها</p>
			<h2>محبوب‌ترین انتخاب‌ها</h2>
		</div>
		<div class="swiper bestsellers-swiper">
			<div class="swiper-wrapper">
				<?php if ( ! empty( $bestsellers ) ) : foreach ( $bestsellers as $product ) :
					$product_url = $product->get_permalink();
					$image = wp_get_attachment_image( $product->get_image_id(), 'large', false, array( 'class' => 'product-image' ) );
				?>
				<div class="swiper-slide">
					<article class="product-card product-card--soft">
						<a class="product-media" href="<?php echo esc_url( $product_url ); ?>"><?php echo $image ? $image : '<img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80" alt="محصول">'; ?></a>
						<div class="product-body">
							<h3><?php echo esc_html( $product->get_name() ); ?></h3>
							<p><?php echo wp_kses_post( $product->get_short_description() ?: 'جنس استیل و سنگ‌های طبیعی' ); ?></p>
							<div class="product-meta">
								<span><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
								<a class="small-btn" href="<?php echo esc_url( $product_url ); ?>">افزودن به سبد</a>
							</div>
						</div>
					</article>
				</div>
				<?php endforeach; else : ?>
				<?php for ( $i = 0; $i < 4; $i++ ) : ?>
				<div class="swiper-slide">
					<article class="product-card product-card--soft">
						<a class="product-media" href="#"><img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80" alt="محصول"></a>
						<div class="product-body">
							<h3>زنجیر نقره‌ای هفت‌سنگ</h3>
							<p>با جزئیات ظریف و ماندگار.</p>
							<div class="product-meta"><span>۷,۴۰۰,۰۰۰ تومان</span><a class="small-btn" href="#">افزودن به سبد</a></div>
						</div>
					</article>
				</div>
				<?php endfor; ?>
				<?php endif; ?>
			</div>
			<div class="swiper-button-next swiper-button-next--secondary"></div>
			<div class="swiper-button-prev swiper-button-prev--secondary"></div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
