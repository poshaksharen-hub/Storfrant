<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer class="site-footer-custom" role="contentinfo">
		<div class="footer-shell">
			<div class="footer-brand">
				<h3>آونتورین</h3>
				<p>جواهرات ماندگار برای لحظه‌های خاص و خاطره‌های ماندگار.</p>
			</div>
			<div class="footer-links">
				<strong>خدمات</strong>
				<a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">فروشگاه</a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">مشاوره تخصصی</a>
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">درباره ما</a>
			</div>
			<div class="footer-links">
				<strong>ارتباط</strong>
				<a href="mailto:info@example.com">info@example.com</a>
				<a href="tel:+989123456789">+98 912 345 6789</a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">ارسال پیام</a>
			</div>
			<div class="footer-social">
				<strong>شبکه‌های اجتماعی</strong>
				<a href="#">اینستاگرام</a>
				<a href="#">پینترست</a>
				<a href="#">واتساپ</a>
			</div>
		</div>
		<div class="footer-bottom">
			<span><?php dynamic_sidebar( 'shayanweb_footer_copyright' ); ?></span>
			<span>طراحی و اجرا: آونتورین</span>
		</div>
	</footer>

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
