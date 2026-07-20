/**
 * Works — live filter + search + hash routing + empty state
 */
(function () {
  function norm(s) {
    return (s || '').toString().trim().toLowerCase();
  }

  function init() {
    const buttons = [...document.querySelectorAll('.filter-btn')];
    const rows = [...document.querySelectorAll('.project-row')];
    const search = document.querySelector('.works-search-input');
    const countEl = document.querySelector('.works-live-count');
    const emptyEl = document.querySelector('.works-empty');
    if (!rows.length) return;

    let activeFilter = 'all';
    let query = '';

    function apply() {
      let visible = 0;
      rows.forEach((row) => {
        const cat = norm(row.dataset.category);
        const text = norm(row.textContent);
        const matchFilter = activeFilter === 'all' || cat === activeFilter;
        const matchQuery = !query || text.includes(query);
        const show = matchFilter && matchQuery;
        row.classList.toggle('is-hidden', !show);
        row.setAttribute('aria-hidden', show ? 'false' : 'true');
        if (show) visible += 1;
      });

      if (countEl) {
        countEl.textContent =
          visible === rows.length
            ? `${visible} projects`
            : `${visible} of ${rows.length} projects`;
      }
      if (emptyEl) emptyEl.hidden = visible !== 0;

      const shown = rows.filter((r) => !r.classList.contains('is-hidden'));
      if (
        shown.length &&
        typeof anime !== 'undefined' &&
        anime.animate &&
        !window.matchMedia('(prefers-reduced-motion: reduce)').matches
      ) {
        anime.animate(shown, {
          opacity: [0, 1],
          translateY: [14, 0],
          delay: anime.stagger(40),
          duration: 420,
          ease: 'out(2)',
        });
      }
    }

    function setFilter(value, pushHash) {
      activeFilter = norm(value) || 'all';
      buttons.forEach((b) => {
        const on = norm(b.dataset.filter) === activeFilter;
        b.classList.toggle('is-active', on);
        b.setAttribute('aria-selected', on ? 'true' : 'false');
      });
      if (pushHash) {
        const hash = activeFilter === 'all' ? '' : `#${encodeURIComponent(activeFilter)}`;
        history.replaceState(null, '', `${location.pathname}${location.search}${hash}`);
      }
      apply();
    }

    buttons.forEach((btn) => {
      btn.setAttribute('role', 'tab');
      btn.addEventListener('click', () => setFilter(btn.dataset.filter || 'all', true));
    });

    if (search) {
      let t;
      search.addEventListener('input', () => {
        clearTimeout(t);
        t = setTimeout(() => {
          query = norm(search.value);
          apply();
        }, 120);
      });
    }

    // Hash deep-link: /works#fintech
    const fromHash = decodeURIComponent((location.hash || '').replace(/^#/, ''));
    if (fromHash && buttons.some((b) => norm(b.dataset.filter) === norm(fromHash))) {
      setFilter(fromHash, false);
    } else {
      setFilter('all', false);
    }

    window.addEventListener('hashchange', () => {
      const h = decodeURIComponent((location.hash || '').replace(/^#/, '')) || 'all';
      setFilter(h, false);
    });

    if (typeof anime !== 'undefined' && anime.animate) {
      const title = document.querySelector('.works-hero h1');
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
      const title = document.querySelector('.works-hero h1');
      if (title) title.style.opacity = '1';
    }
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();
})();
