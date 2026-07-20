/**
 * Home — kinetic hero, portrait tilt, work preview, marquee
 */
(function () {
  function initHome() {
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const hasAnime = typeof anime !== 'undefined' && anime.animate;

    /* Always keep hero copy readable */
    document
      .querySelectorAll('.hero-role, .hero-name, .hero-headline, .hero-support, .hero-cta .btn, .hero-visual-meta, .hero-brand-main')
      .forEach((el) => {
        el.style.opacity = '1';
      });

    /* ---- Kinetic brand letter split ---- */
    const brand = document.querySelector('.hero-brand-main');
    if (brand && hasAnime && anime.splitText && !reduce) {
      const { splitText, animate, stagger } = anime;
      const split = splitText(brand, { chars: true });
      animate(split.chars, {
        opacity: [0, 1],
        translateY: [80, 0],
        rotateX: [-90, 0],
        delay: stagger(55, { start: 120 }),
        duration: 1100,
        ease: 'out(4)',
      });
    }

    if (!hasAnime) return;
    const { animate, stagger } = anime;

    const fadeIns = [
      ['.hero-role', 200],
      ['.hero-name', 320],
      ['.hero-headline', 420],
      ['.hero-support', 520],
    ];
    fadeIns.forEach(([sel, delay]) => {
      const el = document.querySelector(sel);
      if (!el || reduce) return;
      animate(el, {
        opacity: [0, 1],
        translateY: [22, 0],
        delay,
        duration: 850,
        ease: 'out(3)',
      });
    });

    const cta = document.querySelectorAll('.hero-cta .btn');
    if (cta.length && !reduce) {
      animate(cta, {
        opacity: [0, 1],
        translateY: [16, 0],
        delay: stagger(90, { start: 620 }),
        duration: 750,
        ease: 'out(3)',
      });
    }

    const visual = document.querySelector('.hero-stage');
    if (visual && !reduce) {
      animate(visual, {
        opacity: [0, 1],
        translateZ: [-80, 0],
        rotateY: [12, -6],
        duration: 1400,
        ease: 'out(3)',
        delay: 120,
      });
    }

    const meta = document.querySelector('.hero-visual-meta');
    if (meta && !reduce) {
      animate(meta, {
        opacity: [0, 1],
        delay: 900,
        duration: 700,
        ease: 'out(2)',
      });
    }

    const dot = document.querySelector('.hero-brand .accent-dot');
    if (dot && !reduce) {
      animate(dot, {
        scale: [1, 1.35, 1],
        opacity: [1, 0.55, 1],
        duration: 2600,
        ease: 'inOut(2)',
        loop: true,
      });
    }

    /* ---- 3D portrait tilt (fine pointer only) ---- */
    const stage = document.querySelector('.hero-stage');
    const stageWrap = document.querySelector('.hero-visual');
    const canTilt =
      stage &&
      stageWrap &&
      !reduce &&
      window.matchMedia('(pointer: fine)').matches &&
      !window.matchMedia('(max-width: 960px)').matches;

    if (canTilt) {
      stageWrap.addEventListener('pointermove', (e) => {
        const rect = stageWrap.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width - 0.5;
        const y = (e.clientY - rect.top) / rect.height - 0.5;
        stage.style.transform = `rotateY(${-6 + x * 10}deg) rotateX(${2 - y * 8}deg) translateZ(0)`;
      });
      stageWrap.addEventListener('pointerleave', () => {
        stage.style.transform = 'rotateY(-6deg) rotateX(2deg)';
      });
    }

    /* ---- Work row floating preview (desktop only) ---- */
    const preview = document.querySelector('.work-preview');
    const workRows = document.querySelectorAll('.work-row[data-preview]');
    const previewOk =
      preview &&
      workRows.length &&
      window.matchMedia('(pointer: fine)').matches &&
      window.innerWidth > 960;

    if (previewOk) {
      const titleEl = preview.querySelector('.work-preview-title');
      const catEl = preview.querySelector('.work-preview-cat');
      const numEl = preview.querySelector('.work-preview-num');

      workRows.forEach((row) => {
        row.addEventListener('pointerenter', () => {
          titleEl.textContent = row.dataset.preview || '';
          catEl.textContent = row.dataset.category || '';
          numEl.textContent = row.dataset.num || '';
          preview.classList.add('is-active');
        });
        row.addEventListener('pointermove', (e) => {
          preview.style.transform = `translate3d(${e.clientX + 28}px, ${e.clientY - 40}px, 0)`;
        });
        row.addEventListener('pointerleave', () => {
          preview.classList.remove('is-active');
        });
      });
    }

    /* ---- Infinite marquee pause on hover ---- */
    const marquee = document.querySelector('.signal-marquee-track');
    if (marquee) {
      const wrap = marquee.parentElement;
      wrap?.addEventListener('pointerenter', () => (marquee.style.animationPlayState = 'paused'));
      wrap?.addEventListener('pointerleave', () => (marquee.style.animationPlayState = 'running'));
    }
  }

  function start() {
    if (document.documentElement.classList.contains('is-ready')) {
      initHome();
    } else {
      document.addEventListener('hasin:ready', initHome, { once: true });
      setTimeout(() => {
        if (!document.documentElement.classList.contains('is-ready')) {
          document.documentElement.classList.add('is-ready');
          initHome();
        }
      }, 1600);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', start);
  } else {
    start();
  }
})();
