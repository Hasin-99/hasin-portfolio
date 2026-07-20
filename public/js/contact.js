/**
 * Contact — live validation + copy-to-clipboard + UX
 */
(function () {
  function init() {
    const form = document.querySelector('.contact-form');
    const copyBtn = document.querySelector('[data-copy-email]');

    if (copyBtn) {
      copyBtn.addEventListener('click', async () => {
        const email = copyBtn.getAttribute('data-copy-email') || '';
        try {
          await navigator.clipboard.writeText(email);
          const prev = copyBtn.textContent;
          copyBtn.textContent = 'Copied';
          copyBtn.classList.add('is-copied');
          setTimeout(() => {
            copyBtn.textContent = prev;
            copyBtn.classList.remove('is-copied');
          }, 1600);
        } catch (_) {
          const prev = copyBtn.textContent;
          copyBtn.textContent = 'Copy failed';
          setTimeout(() => {
            copyBtn.textContent = prev || 'Copy';
          }, 1800);
        }
      });
    }

    if (!form) return;

    const fields = {
      name: form.querySelector('#name'),
      email: form.querySelector('#email'),
      message: form.querySelector('#message'),
    };
    const counter = form.querySelector('.char-count');
    const btn = form.querySelector('button[type="submit"]');

    function validateEmail(v) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
    }

    function setState(input, ok, msg) {
      if (!input) return;
      const group = input.closest('.form-group');
      if (!group) return;
      group.classList.toggle('is-invalid', !ok);
      group.classList.toggle('is-valid', ok && input.value.trim().length > 0);
      let hint = group.querySelector('.live-hint');
      if (!hint) {
        hint = document.createElement('div');
        hint.className = 'live-hint';
        group.appendChild(hint);
      }
      hint.textContent = ok ? '' : msg || '';
    }

    function updateCounter() {
      if (!counter || !fields.message) return;
      const n = fields.message.value.length;
      counter.textContent = `${n} / 5000`;
      counter.classList.toggle('is-warn', n > 4500);
    }

    function validateField(name) {
      const input = fields[name];
      if (!input) return true;
      const v = input.value.trim();
      if (name === 'name') {
        const ok = v.length >= 2;
        setState(input, ok, 'Please enter your name (2+ characters).');
        return ok;
      }
      if (name === 'email') {
        const ok = validateEmail(v);
        setState(input, ok, 'Enter a valid email address.');
        return ok;
      }
      if (name === 'message') {
        const ok = v.length >= 10 && v.length <= 5000;
        setState(input, ok, 'Message should be 10–5000 characters.');
        return ok;
      }
      return true;
    }

    Object.keys(fields).forEach((key) => {
      const input = fields[key];
      if (!input) return;
      input.addEventListener('input', () => {
        validateField(key);
        if (key === 'message') updateCounter();
      });
      input.addEventListener('blur', () => validateField(key));
    });
    updateCounter();

    form.addEventListener('submit', (e) => {
      const ok = ['name', 'email', 'message'].every(validateField);
      if (!ok) {
        e.preventDefault();
        const firstBad = form.querySelector('.form-group.is-invalid input, .form-group.is-invalid textarea');
        firstBad?.focus();
        return;
      }
      if (btn) {
        btn.disabled = true;
        btn.textContent = 'Sending…';
        btn.classList.add('is-loading');
      }
    });

    if (typeof anime !== 'undefined' && anime.animate) {
      const title = document.querySelector('.contact-hero h1');
      const run = () => {
        if (!title) return;
        title.style.opacity = '1';
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        anime.animate(title, {
          opacity: [0, 1],
          translateY: [22, 0],
          duration: 800,
          ease: 'out(3)',
        });
      };
      if (document.documentElement.classList.contains('is-ready')) run();
      else document.addEventListener('hasin:ready', run, { once: true });
    } else {
      const title = document.querySelector('.contact-hero h1');
      if (title) title.style.opacity = '1';
    }
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();
})();
