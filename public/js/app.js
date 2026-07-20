/**
 * HASIN portfolio — master motion + reactive shell
 */
(function () {
  const header = document.querySelector('.site-header');
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.site-nav');
  const progress = document.querySelector('.scroll-progress span');
  const preloader = document.querySelector('.preloader');
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Between-page wipe featuring special HASIN logo ---------- */
  function runPreloader() {
    if (!preloader) {
      document.documentElement.classList.add('is-ready');
      return Promise.resolve();
    }

    if (reduce) {
      if (preloader.isConnected) preloader.remove();
      document.documentElement.classList.add('is-ready');
      return Promise.resolve();
    }

    const failsafe = setTimeout(() => {
      if (preloader.isConnected) preloader.remove();
      document.documentElement.classList.add('is-ready');
      document.dispatchEvent(new CustomEvent('hasin:ready'));
    }, 3200);

    return new Promise((resolve) => {
      const done = () => {
        clearTimeout(failsafe);
        if (preloader.isConnected) preloader.remove();
        document.documentElement.classList.add('is-ready');
        resolve();
      };

      const mark = preloader.querySelector('.preloader-mark');
      const letters = preloader.querySelectorAll('.preloader-brand span');
      const bar = preloader.querySelector('.preloader-bar span');
      const tag = preloader.querySelector('.preloader-tag');

      if (typeof anime !== 'undefined' && anime.animate) {
        const { animate, stagger } = anime;
        if (mark) {
          animate(mark, {
            opacity: [0, 1],
            scale: [0.65, 1.08, 1],
            rotate: ['-12deg', '0deg'],
            duration: 900,
            ease: 'out(4)',
          });
        }
        animate(letters, {
          opacity: [0, 1],
          translateY: [36, 0],
          delay: stagger(55, { start: 180 }),
          duration: 750,
          ease: 'out(4)',
        });
        if (tag) {
          animate(tag, {
            opacity: [0, 1],
            delay: 500,
            duration: 500,
            ease: 'out(2)',
          });
        }
        if (bar) {
          animate(bar, {
            scaleX: [0, 1],
            duration: 900,
            ease: 'inOut(3)',
            delay: 220,
          });
        }
        animate(preloader, {
          opacity: [1, 0],
          duration: 550,
          delay: 1250,
          ease: 'inOut(2)',
          onComplete: done,
        });
      } else {
        setTimeout(done, 500);
      }
    });
  }

  /* ---------- Header / scroll progress ---------- */
  if (header) {
    let ticking = false;
    const onScroll = () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => {
        header.classList.toggle('is-scrolled', window.scrollY > 24);
        if (progress) {
          const max = document.documentElement.scrollHeight - window.innerHeight;
          const p = max > 0 ? Math.min(1, window.scrollY / max) : 0;
          progress.style.transform = `scaleX(${p})`;
        }
        ticking = false;
      });
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
  }

  /* ---------- Mobile nav (reactive + a11y) ---------- */
  function setNav(open) {
    if (!toggle || !nav) return;
    toggle.classList.toggle('is-open', open);
    nav.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    document.body.classList.toggle('nav-open', open);
    document.body.style.overflow = open ? 'hidden' : '';
  }

  if (toggle && nav) {
    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-controls', 'site-nav');
    nav.id = 'site-nav';

    toggle.addEventListener('click', () => setNav(!nav.classList.contains('is-open')));

    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => setNav(false));
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') setNav(false);
    });

    window.addEventListener(
      'resize',
      () => {
        if (window.innerWidth > 860) setNav(false);
      },
      { passive: true }
    );
  }

  /* ---------- Scroll reveals ---------- */
  function revealOnScroll() {
    const nodes = document.querySelectorAll('.reveal:not(.is-animated)');
    if (!nodes.length) return;

    if (reduce || typeof anime === 'undefined' || !anime.animate) {
      nodes.forEach((el) => el.classList.add('is-visible', 'is-animated'));
      return;
    }

    const { animate, stagger } = anime;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          if (el.parentElement?.hasAttribute('data-stagger')) return;
          el.classList.add('is-animated', 'is-visible');
          animate(el, {
            opacity: [0, 1],
            translateY: [28, 0],
            duration: 850,
            ease: 'out(3)',
          });
          observer.unobserve(el);
        });
      },
      { threshold: 0.1, rootMargin: '0px 0px -6% 0px' }
    );

    nodes.forEach((el) => {
      if (!el.closest('[data-stagger]')) observer.observe(el);
    });

    document.querySelectorAll('[data-stagger]').forEach((group) => {
      const kids = group.querySelectorAll(':scope > .reveal');
      if (!kids.length) return;
      const groupObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const targets = [...kids].filter((k) => !k.classList.contains('is-animated'));
            targets.forEach((k) => k.classList.add('is-animated', 'is-visible'));
            animate(targets, {
              opacity: [0, 1],
              translateY: [32, 0],
              delay: stagger(70),
              duration: 800,
              ease: 'out(3)',
            });
            groupObserver.unobserve(entry.target);
          });
        },
        { threshold: 0.06 }
      );
      groupObserver.observe(group);
    });
  }

  /* ---------- Boot ---------- */
  function boot() {
    runPreloader().then(() => {
      revealOnScroll();
      window.HasinMotion = { revealOnScroll };
      document.dispatchEvent(new CustomEvent('hasin:ready'));
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
