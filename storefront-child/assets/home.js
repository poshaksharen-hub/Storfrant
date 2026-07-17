document.addEventListener('DOMContentLoaded', function () {
  const header = document.querySelector('.site-header-custom');
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.mobile-nav');
  const searchBtn = document.querySelector('.icon-btn--search');
  const searchOverlay = document.querySelector('.search-overlay');
  const searchClose = document.querySelector('.search-overlay__close');
  const heroSection = document.querySelector('.hero-section');
  const heroImage = document.querySelector('.hero-image');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      nav.classList.toggle('is-open');
      toggle.classList.toggle('is-open');
      document.body.classList.toggle('menu-open');
    });
  }

  if (searchBtn && searchOverlay) {
    searchBtn.addEventListener('click', function () {
      searchOverlay.classList.add('is-open');
      document.body.classList.add('menu-open');
      searchOverlay.querySelector('input')?.focus();
    });
  }

  if (searchClose && searchOverlay) {
    searchClose.addEventListener('click', function () {
      searchOverlay.classList.remove('is-open');
      document.body.classList.remove('menu-open');
    });
  }

  if (searchOverlay) {
    searchOverlay.addEventListener('click', function (event) {
      if (event.target === searchOverlay) {
        searchOverlay.classList.remove('is-open');
        document.body.classList.remove('menu-open');
      }
    });
  }

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      searchOverlay?.classList.remove('is-open');
      document.body.classList.remove('menu-open');
    }
  });

  if (heroSection && heroImage) {
    heroSection.addEventListener('mousemove', function (event) {
      const rect = heroSection.getBoundingClientRect();
      const x = ((event.clientX - rect.left) / rect.width - 0.5) * 10;
      const y = ((event.clientY - rect.top) / rect.height - 0.5) * 10;
      heroImage.style.transform = 'translate3d(' + (-x * 0.8) + 'px, ' + (-y * 0.8) + 'px, 0) scale(1.06)';
    });

    heroSection.addEventListener('mouseleave', function () {
      heroImage.style.transform = '';
    });
  }

  const revealItems = document.querySelectorAll('[data-reveal]');
  const animatedCards = document.querySelectorAll('.category-card, .feature-card, .product-card, .curated-banner, .cta-card');

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
        }
      });
    }, { threshold: 0.16 });

    revealItems.forEach(function (item) {
      observer.observe(item);
    });
  } else {
    revealItems.forEach(function (item) {
      item.classList.add('is-visible');
    });
  }

  animatedCards.forEach(function (card) {
    card.addEventListener('mousemove', function (event) {
      const rect = card.getBoundingClientRect();
      const x = ((event.clientX - rect.left) / rect.width - 0.5) * 8;
      const y = ((event.clientY - rect.top) / rect.height - 0.5) * 8;
      card.style.transform = 'perspective(1000px) rotateY(' + x + 'deg) rotateX(' + (-y) + 'deg) translateY(-4px)';
    });

    card.addEventListener('mouseleave', function () {
      card.style.transform = '';
    });
  });

  if (header) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 40) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }
    });
  }

  const discountSwiper = new Swiper('.discount-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    autoplay: { delay: 4500, disableOnInteraction: false },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      640: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });

  const bestsellersSwiper = new Swiper('.bestsellers-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    navigation: {
      nextEl: '.swiper-button-next--secondary',
      prevEl: '.swiper-button-prev--secondary'
    },
    breakpoints: {
      640: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
});
