const nav = document.querySelector('.navbar');
const menuBtn = document.querySelector('.menu-toggle');
const navMenu = document.querySelector('.nav-links');
const logo = document.querySelector('.logo');

menuBtn?.addEventListener('click', () => {
  const open = navMenu.classList.toggle('open');
  menuBtn.setAttribute('aria-expanded', String(open));
});

document.querySelectorAll('a[href^="#"]').forEach((a) => {
  a.addEventListener('click', (e) => {
    const id = a.getAttribute('href');
    const target = document.querySelector(id);
    if (!target) return;
    e.preventDefault();
    const top = target.getBoundingClientRect().top + window.scrollY - 76;
    window.scrollTo({ top, behavior: 'smooth' });
    navMenu?.classList.remove('open');
  });
});

const sections = document.querySelectorAll('.section-target');
const links = document.querySelectorAll('.nav-links a');
const sectionObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (!entry.isIntersecting) return;
    links.forEach((l) => l.classList.toggle('active', l.getAttribute('href') === `#${entry.target.id}`));
  });
}, { rootMargin: '-40% 0px -50% 0px', threshold: 0.1 });
sections.forEach((s) => sectionObserver.observe(s));

const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) entry.target.classList.add('is-visible');
  });
}, { threshold: 0.14 });
document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));

window.addEventListener('scroll', () => {
  const compact = window.scrollY > 10;
  nav?.classList.toggle('nav-scrolled', compact);
  logo?.classList.toggle('logo--compact', compact);
});

const c = document.querySelector('[data-carousel]');
if (c) {
  const slides = [...c.querySelectorAll('.hero-slide')];
  const dotsWrap = c.querySelector('.carousel-dots');
  let i = 0, timer;

  const go = (n) => {
    i = (n + slides.length) % slides.length;
    slides.forEach((s, idx) => s.classList.toggle('is-active', idx === i));
    dotsWrap.querySelectorAll('button').forEach((d, idx) => d.classList.toggle('active', idx === i));
  };

  slides.forEach((_, idx) => {
    const b = document.createElement('button');
    b.setAttribute('aria-label', `Aller au slide ${idx + 1}`);
    b.addEventListener('click', () => go(idx));
    dotsWrap.appendChild(b);
  });
  go(0);

  c.querySelector('.next')?.addEventListener('click', () => go(i + 1));
  c.querySelector('.prev')?.addEventListener('click', () => go(i - 1));

  const start = () => timer = setInterval(() => go(i + 1), 4500);
  const stop = () => clearInterval(timer);
  start();
  c.addEventListener('mouseenter', stop);
  c.addEventListener('mouseleave', start);
}

document.querySelector('.js-box-link')?.addEventListener('click', () => {
  const card = document.querySelector('#address-card');
  if (!card) return;
  card.style.outline = '3px solid var(--brand)';
  setTimeout(() => card.style.outline = 'none', 1800);
});
