/**
 * About — entrance + portrait presence
 */
(function () {
  function init() {
    const title = document.querySelector('.page-hero h1');
    if (title) title.style.opacity = '1';

    if (typeof anime === 'undefined' || !anime.animate) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    if (title) {
      anime.animate(title, {
        opacity: [0, 1],
        translateY: [28, 0],
        duration: 950,
        ease: 'out(3)',
      });
    }

    const portrait = document.querySelector('.about-portrait');
    if (portrait && window.matchMedia('(pointer: fine)').matches) {
      portrait.style.transformStyle = 'preserve-3d';
      portrait.style.transition = 'transform 0.4s cubic-bezier(0.22, 1, 0.36, 1)';
      portrait.addEventListener('pointermove', (e) => {
        const r = portrait.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width - 0.5;
        const y = (e.clientY - r.top) / r.height - 0.5;
        portrait.style.transform = `rotateY(${x * 8}deg) rotateX(${-y * 6}deg)`;
      });
      portrait.addEventListener('pointerleave', () => {
        portrait.style.transform = '';
      });
    }
  }

  function start() {
    if (document.documentElement.classList.contains('is-ready')) init();
    else document.addEventListener('hasin:ready', init, { once: true });
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', start);
  else start();
})();
