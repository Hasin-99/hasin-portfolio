/**
 * HASIN — magnetic cursor + interactive states
 */
(function () {
  const fine = window.matchMedia('(pointer: fine)').matches;
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (!fine || reduce) return;

  document.documentElement.classList.add('has-custom-cursor');

  const root = document.createElement('div');
  root.className = 'cursor-root';
  root.innerHTML = `
    <div class="cursor-dot"></div>
    <div class="cursor-ring"></div>
    <div class="cursor-label"></div>
  `;
  document.body.appendChild(root);

  const dot = root.querySelector('.cursor-dot');
  const ring = root.querySelector('.cursor-ring');
  const label = root.querySelector('.cursor-label');

  const pos = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
  const ringPos = { x: pos.x, y: pos.y };
  let visible = false;

  function render() {
    ringPos.x += (pos.x - ringPos.x) * 0.18;
    ringPos.y += (pos.y - ringPos.y) * 0.18;
    dot.style.transform = `translate3d(${pos.x}px, ${pos.y}px, 0)`;
    ring.style.transform = `translate3d(${ringPos.x}px, ${ringPos.y}px, 0)`;
    label.style.transform = `translate3d(${ringPos.x}px, ${ringPos.y}px, 0)`;
    requestAnimationFrame(render);
  }
  requestAnimationFrame(render);

  window.addEventListener(
    'pointermove',
    (e) => {
      pos.x = e.clientX;
      pos.y = e.clientY;
      if (!visible) {
        visible = true;
        root.classList.add('is-on');
      }
    },
    { passive: true }
  );

  document.addEventListener('mouseleave', () => root.classList.remove('is-on'));
  document.addEventListener('mouseenter', () => root.classList.add('is-on'));

  const interactive = 'a, button, .btn, .work-row, .project-row, .magnetic, .filter-btn, .resume-btn, input, textarea';

  document.addEventListener('pointerover', (e) => {
    const target = e.target.closest(interactive);
    if (!target) return;
    root.classList.add('is-hover');
    const text = target.getAttribute('data-cursor') || '';
    if (text) {
      label.textContent = text;
      root.classList.add('has-label');
    }
  });

  document.addEventListener('pointerout', (e) => {
    const target = e.target.closest(interactive);
    if (!target) return;
    root.classList.remove('is-hover', 'has-label');
    label.textContent = '';
  });

  // Magnetic pull for .magnetic elements
  document.querySelectorAll('.magnetic').forEach((el) => {
    el.addEventListener('pointermove', (e) => {
      const rect = el.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      el.style.transform = `translate3d(${x * 0.22}px, ${y * 0.28}px, 0)`;
    });
    el.addEventListener('pointerleave', () => {
      el.style.transform = '';
    });
  });
})();
