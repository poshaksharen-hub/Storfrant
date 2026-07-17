<?php
/*
Template Name: Home - Aventurin
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$skip_header_footer = isset( $skip_header_footer ) && $skip_header_footer;

if ( ! $skip_header_footer ) {
	get_header();
}

$hero_image = 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?auto=format&fit=crop&w=1600&q=80';
$editorial_image = 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?auto=format&fit=crop&w=1400&q=80';
$atelier_image = 'https://images.unsplash.com/photo-1523170335258-f5ed11844a49?auto=format&fit=crop&w=1400&q=80';
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
		<div class="hero-ambient ambient-one"></div>
		<div class="hero-ambient ambient-two"></div>
		<div class="hero-overlay"></div>
		<div class="hero-visual">
			<img class="hero-image" src="<?php echo esc_url( $hero_image ); ?>" alt="جواهرات لوکس">
		</div>
		<div class="hero-content">
			<div class="hero-badges">
				<span>مجموعهٔ جدید</span>
				<span>طراحی محدود</span>
			</div>
			<p class="hero-kicker">کالکشن طلایی پاییزه</p>
			<h1>ظرافتی که در هر نگاه، ارزش می‌سازد</h1>
			<p>مجموعه‌ای از انگشترها، گوشواره‌ها و گردنبندهای دست‌ساز با پرداختِ نرم، فرم‌های مینیمال و هویتِ ماندگار برای لحظه‌های خاص شما.</p>
			<div class="hero-actions">
				<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">مشاهدهٔ فروشگاه</a>
				<a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">تجربهٔ مشاوره</a>
			</div>
			<div class="hero-metrics">
				<div><strong>۳۵۰+</strong><span>طرح اختصاصی</span></div>
				<div><strong>۲۴ ساعته</strong><span>پشتیبانی</span></div>
				<div><strong>۹۸٪</strong><span>رضایت مشتری</span></div>
			</div>
		</div>
		<aside class="hero-card">
			<p class="hero-card__eyebrow">پیشنهاد ویژه</p>
			<h3>کالکشن «شکوه شب»</h3>
			<p>دستبند و آویزهای ظریف با سنگ‌های طبیعی و پرداخت نقره‌ای براق.</p>
			<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">مشاهدهٔ کالکشن</a>
		</aside>
	</section>

	<section class="feature-strip" data-reveal>
		<div class="feature-card">
			<span>✦</span>
			<strong>ضمانت اصالت</strong>
			<p>محصولات با اصالت، کیفیت تضمین‌شده و بسته‌بندی لوکس.</p>
		</div>
		<div class="feature-card">
			<span>⬢</span>
			<strong>سفارشی‌سازی</strong>
			<p>طرح‌های اختصاصی برای مناسبت‌های خاص و هدیه‌های ماندگار.</p>
		</div>
		<div class="feature-card">
			<span>✧</span>
			<strong>ارسال سریع</strong>
			<p>تحویل مطمئن، سریع و با پشتیبانی حرفه‌ای در همه‌جا.</p>
		</div>
	</section>

	<section class="editorial-section" data-reveal>
		<div class="editorial-copy">
			<p class="section-tag">داستان برند</p>
			<h2>آرتِ ظریف برای هویت و خاطرهٔ شما</h2>
			<p>هر قطعه در آونتورین با دقت، اصالت و حس لوکس انتخاب می‌شود تا زیبایی شما را در هر لحظه، کامل‌تر و خاص‌تر نشان دهد.</p>
			<div class="editorial-points">
				<div><strong>نیم‌ه‌یاقوت</strong><span>سنگ‌های طبیعی و انتخاب‌شده</span></div>
				<div><strong>پرداخت خاص</strong><span>روکش و سطح‌کاری حرفه‌ای</span></div>
				<div><strong>بسته‌بندی لوکس</strong><span>هدیه‌ای شیک و ماندگار</span></div>
			</div>
		</div>
		<div class="editorial-card">
			<img src="<?php echo esc_url( $editorial_image ); ?>" alt="کالکشن جواهرات">
			<div class="editorial-badge">مخصوص مناسبت‌های خاص</div>
		</div>
	</section>

	<section class="atelier-section" data-reveal>
		<div class="atelier-media">
			<img src="<?php echo esc_url( $atelier_image ); ?>" alt="اتاق طراحی جواهرات">
		</div>
		<div class="atelier-copy">
			<p class="section-tag">آتلیه ما</p>
			<h2>مشاوره، طراحی و انتخابی خاص برای لحظه‌های ماندگار</h2>
			<p>در آونتورین، هر قطعه با دقتِ طراحی، اصالتِ انتخاب و ذوقی خاص برگزیده می‌شود تا زیبایی شما را در کنار حس لوکس، آرامش و خاطره منتقل کند.</p>
			<div class="atelier-points">
				<div><strong>طرح‌های محدود</strong><span>فقط در تعداد محدود و با اصالت بالا</span></div>
				<div><strong>پشتیبانی ویژه</strong><span>مشاوره قبل و بعد از خرید</span></div>
			</div>
		</div>
	</section>

	<section class="curated-section" data-reveal>
		<div class="curated-banner">
			<div class="curated-copy">
				<p class="section-tag">کالکشن ویژه</p>
				<h2>درخشش شما، با انتخابی متفاوت و ماندگار</h2>
				<p>از آویزهای ظریف گرفته تا حلقه‌های مینیمال، همه‌چیز با دقت انتخاب شده تا حس لوکس و اصالت را در کنار هم نگه دارد.</p>
				<div class="hero-actions curated-actions">
					<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">مشاهده کلکسیون</a>
					<a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">مشاوره سفارشی</a>
				</div>
			</div>
			<div class="curated-highlights">
				<div class="highlight-card"><strong>۷ روز ضمانت</strong><span>بازگشت و تعویض</span></div>
				<div class="highlight-card"><strong>ارسال سریع</strong><span>در سراسر ایران</span></div>
				<div class="highlight-card"><strong>طراحی اختصاصی</strong><span>برای مناسبت‌های خاص</span></div>
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

	<section class="cta-section" data-reveal>
		<div class="cta-card">
			<p class="section-tag">آغاز یک انتخاب متفاوت</p>
			<h2>برای هدیه‌ای خاص، مشاوره و طراحی اختصاصی در خدمت شماست</h2>
			<p>از طراحی‌های مینیمال و شیک تا مدل‌های خاص و ماندگار، تیم ما برای انتخاب درست کنار شما خواهد بود.</p>
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">درخواست مشاوره</a>
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

<?php if ( ! $skip_header_footer ) { get_footer(); } ?>
