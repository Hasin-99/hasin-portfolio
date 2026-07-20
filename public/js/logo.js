/**
 * HASIN special logo — visible on every page; animates after logo wipe
 */
(function () {
  const mark = document.querySelector('.site-header .hasin-mark');
  const brand = document.querySelector('.site-header .brand');
  if (!mark || !brand) return;

  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  brand.classList.add('is-revealed', 'is-special');
  brand.style.opacity = '1';
  mark.style.opacity = '1';

  function specialPresence() {
    if (reduce || typeof anime === 'undefined' || !anime.animate) return;

    const orbit = mark.querySelector('.hasin-orbit');
    const core = mark.querySelector('.hasin-core');
    const spark = mark.querySelector('.hasin-spark');
    const rise = mark.querySelector('.hasin-rise');
    const letters = brand.querySelectorAll('.brand-letter');

    // Page-enter: logo does a special settle (never fades to invisible)
    anime.animate(mark, {
      scale: [0.86, 1.06, 1],
      rotate: ['-8deg', '2deg', '0deg'],
      duration: 900,
      ease: 'out(4)',
    });

    anime.animate(letters, {
      translateY: [10, 0],
      delay: anime.stagger(48, { start: 80 }),
      duration: 620,
      ease: 'out(3)',
    });

    if (rise) {
      anime.animate(rise, {
        opacity: [0.2, 1, 0.85],
        duration: 1200,
        ease: 'out(2)',
      });
    }

    if (spark) {
      anime.animate(spark, {
        scale: [0.4, 1.35, 1],
        opacity: [0, 1, 1],
        duration: 900,
        delay: 200,
        ease: 'out(3)',
      });
    }

    // Ongoing special motion
    if (orbit) {
      anime.animate(orbit, {
        rotate: '360deg',
        duration: 12000,
        ease: 'linear',
        loop: true,
      });
    }
    if (core) {
      anime.animate(core, {
        scale: [1, 1.14, 1],
        duration: 2400,
        ease: 'inOut(2)',
        loop: true,
      });
    }
    if (spark) {
      anime.animate(spark, {
        opacity: [0.55, 1, 0.55],
        scale: [1, 1.2, 1],
        duration: 2800,
        ease: 'inOut(2)',
        loop: true,
        delay: 400,
      });
    }
  }

  brand.addEventListener('pointerenter', () => brand.classList.add('is-hot'));
  brand.addEventListener('pointerleave', () => brand.classList.remove('is-hot'));

  window.addEventListener('pageshow', () => {
    brand.classList.add('is-revealed', 'is-special');
    brand.style.opacity = '1';
    mark.style.opacity = '1';
  });

  function boot() {
    specialPresence();
  }

  if (document.documentElement.classList.contains('is-ready')) boot();
  else {
    // Wait for logo wipe to finish, then run special nav logo motion
    document.addEventListener('hasin:ready', boot, { once: true });
  }
})();
