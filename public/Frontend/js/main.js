// AquaNova - small interactions
(function(){
  // Sticky header shadow on scroll
  const nav = document.querySelector('.navbar-aqua');
  const onScroll = () => {
    if (!nav) return;
    if (window.scrollY > 20) nav.classList.add('scrolled');
    else nav.classList.remove('scrolled');
  };
  document.addEventListener('scroll', onScroll, {passive:true});
  onScroll();

  // Active link highlight based on file name
  const path = (location.pathname.split('/').pop() || "{{route('home')}}").toLowerCase();
  document.querySelectorAll('.navbar-aqua .nav-link').forEach(a => {
    const href = (a.getAttribute('href')||'').toLowerCase();
    if (href === path) a.classList.add('active');
  });

  // Reveal on scroll
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting){ e.target.classList.add('visible'); io.unobserve(e.target); } });
  }, {threshold:0.12});
  document.querySelectorAll('.reveal').forEach(el => io.observe(el));

  // Counter animation
  const counters = document.querySelectorAll('[data-count]');
  const cio = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target;
      const target = parseInt(el.dataset.count, 10);
      const suffix = el.dataset.suffix || '';
      let cur = 0;
      const step = Math.max(1, Math.floor(target / 60));
      const t = setInterval(() => {
        cur += step;
        if (cur >= target){ cur = target; clearInterval(t); }
        el.textContent = cur.toLocaleString() + suffix;
      }, 25);
      cio.unobserve(el);
    });
  }, {threshold:0.4});
  counters.forEach(c => cio.observe(c));

  // Contact form (static demo)
  const form = document.getElementById('contactForm');
  if (form){
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const msg = document.getElementById('formMsg');
      if (msg){ msg.classList.remove('d-none'); }
      form.reset();
    });
  }
})();
