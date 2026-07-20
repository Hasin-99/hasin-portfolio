/**
 * HASIN Signal Lattice — confined to hero portrait zone only
 */
(function () {
  const canvas = document.getElementById('signal-canvas');
  if (!canvas) return;

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const isMobile = window.matchMedia('(max-width: 860px)').matches;
  if (reduceMotion) {
    canvas.style.display = 'none';
    return;
  }

  const ctx = canvas.getContext('2d');
  if (!ctx) return;

  let width = 0;
  let height = 0;
  let dpr = Math.min(window.devicePixelRatio || 1, 2);
  let raf = 0;
  let t = 0;

  const pointer = { x: 0.5, y: 0.5, tx: 0.5, ty: 0.5 };
  const scroll = { y: 0, ty: 0 };

  const NODE_COUNT = isMobile ? 22 : 36;
  const nodes = [];
  const links = [];

  function seedLattice() {
    nodes.length = 0;
    links.length = 0;
    for (let i = 0; i < NODE_COUNT; i++) {
      nodes.push({
        x: (Math.random() - 0.5) * 2.0,
        y: (Math.random() - 0.5) * 1.5,
        z: (Math.random() - 0.5) * 2.0,
        ox: 0,
        oy: 0,
        oz: 0,
        pulse: Math.random() * Math.PI * 2,
      });
      nodes[i].ox = nodes[i].x;
      nodes[i].oy = nodes[i].y;
      nodes[i].oz = nodes[i].z;
    }
    for (let i = 0; i < NODE_COUNT; i++) {
      for (let j = i + 1; j < NODE_COUNT; j++) {
        const dx = nodes[i].x - nodes[j].x;
        const dy = nodes[i].y - nodes[j].y;
        const dz = nodes[i].z - nodes[j].z;
        const dist = Math.sqrt(dx * dx + dy * dy + dz * dz);
        if (dist < 0.9) links.push([i, j, dist]);
      }
    }
  }

  function resize() {
    const parent = canvas.parentElement;
    width = parent ? parent.clientWidth : window.innerWidth;
    height = parent ? parent.clientHeight : window.innerHeight;
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    canvas.width = Math.floor(width * dpr);
    canvas.height = Math.floor(height * dpr);
    canvas.style.width = width + 'px';
    canvas.style.height = height + 'px';
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function project(n, rotY, rotX) {
    let x = n.x;
    let y = n.y;
    let z = n.z;

    const cosY = Math.cos(rotY);
    const sinY = Math.sin(rotY);
    const cosX = Math.cos(rotX);
    const sinX = Math.sin(rotX);

    let xz = x * cosY - z * sinY;
    let zz = z * cosY + x * sinY;
    let yz = y * cosX - zz * sinX;
    zz = zz * cosX + y * sinX;

    const perspective = 2.6;
    const scale = (perspective / (perspective + zz + 1.2)) * Math.min(width, height) * 0.42;
    return {
      sx: width * 0.5 + xz * scale + (pointer.x - 0.5) * 24,
      sy: height * 0.5 + yz * scale + (pointer.y - 0.5) * 18 + scroll.y * 0.015,
      depth: zz,
      alpha: Math.max(0.08, 1 - (zz + 1.4) / 3.2),
    };
  }

  function draw() {
    t += 0.0045;
    pointer.x += (pointer.tx - pointer.x) * 0.06;
    pointer.y += (pointer.ty - pointer.y) * 0.06;
    scroll.y += (scroll.ty - scroll.y) * 0.08;

    ctx.clearRect(0, 0, width, height);

    const gx = width * (0.5 + (pointer.x - 0.5) * 0.12);
    const gy = height * (0.45 + (pointer.y - 0.5) * 0.1);
    const grad = ctx.createRadialGradient(gx, gy, 0, gx, gy, Math.max(width, height) * 0.55);
    grad.addColorStop(0, 'rgba(26, 95, 104, 0.07)');
    grad.addColorStop(0.55, 'rgba(174, 184, 196, 0.04)');
    grad.addColorStop(1, 'rgba(230, 235, 240, 0)');
    ctx.fillStyle = grad;
    ctx.fillRect(0, 0, width, height);

    const rotY = t * 0.35 + (pointer.x - 0.5) * 0.45;
    const rotX = 0.2 + (pointer.y - 0.5) * 0.3 + scroll.y * 0.00012;

    for (let i = 0; i < nodes.length; i++) {
      const n = nodes[i];
      const breathe = Math.sin(t * 1.4 + n.pulse) * 0.04;
      n.x = n.ox + breathe;
      n.y = n.oy + Math.cos(t * 1.1 + n.pulse) * 0.03;
      n.z = n.oz + Math.sin(t * 0.9 + i) * 0.05;
    }

    const projected = nodes.map((n) => project(n, rotY, rotX));

    for (let i = 0; i < links.length; i++) {
      const [a, b] = links[i];
      const pa = projected[a];
      const pb = projected[b];
      const alpha = Math.min(pa.alpha, pb.alpha) * 0.4;
      ctx.beginPath();
      ctx.moveTo(pa.sx, pa.sy);
      ctx.lineTo(pb.sx, pb.sy);
      ctx.strokeStyle = `rgba(26, 95, 104, ${alpha})`;
      ctx.lineWidth = 1;
      ctx.stroke();
    }

    for (let i = 0; i < projected.length; i++) {
      const p = projected[i];
      const size = 1.5 + (1 - p.depth) * 1.3;
      ctx.beginPath();
      ctx.arc(p.sx, p.sy, size, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(13, 20, 25, ${0.2 + p.alpha * 0.4})`;
      ctx.fill();
      ctx.beginPath();
      ctx.arc(p.sx, p.sy, size * 0.4, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(42, 122, 133, ${0.3 + p.alpha * 0.4})`;
      ctx.fill();
    }

    const ringX = width * 0.55 + Math.cos(t * 0.7) * 20;
    const ringY = height * 0.4 + Math.sin(t * 0.55) * 16;
    ctx.beginPath();
    ctx.ellipse(ringX, ringY, 58, 22, t * 0.4, 0, Math.PI * 2);
    ctx.strokeStyle = 'rgba(26, 95, 104, 0.16)';
    ctx.lineWidth = 1.2;
    ctx.stroke();

    raf = requestAnimationFrame(draw);
  }

  function onPointer(e) {
    const rect = canvas.getBoundingClientRect();
    const x = e.clientX ?? (e.touches && e.touches[0]?.clientX) ?? rect.left + width / 2;
    const y = e.clientY ?? (e.touches && e.touches[0]?.clientY) ?? rect.top + height / 2;
    pointer.tx = Math.min(1, Math.max(0, (x - rect.left) / Math.max(rect.width, 1)));
    pointer.ty = Math.min(1, Math.max(0, (y - rect.top) / Math.max(rect.height, 1)));
  }

  function onScroll() {
    scroll.ty = window.scrollY;
  }

  seedLattice();
  resize();
  draw();

  window.addEventListener('resize', () => {
    resize();
    seedLattice();
  });

  if (typeof ResizeObserver !== 'undefined' && canvas.parentElement) {
    const ro = new ResizeObserver(() => resize());
    ro.observe(canvas.parentElement);
  }
  window.addEventListener('pointermove', onPointer, { passive: true });
  window.addEventListener('scroll', onScroll, { passive: true });

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) cancelAnimationFrame(raf);
    else raf = requestAnimationFrame(draw);
  });
})();
