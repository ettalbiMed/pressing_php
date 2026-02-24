<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<header class="site-header" id="top">
    <nav class="navbar" aria-label="Navigation principale">
        <div class="container nav-inner">
            <button class="menu-toggle" aria-expanded="false" aria-controls="navMenu">☰</button>
            <ul id="navMenu" class="nav-links">
                <li><a href="#home">Accueil</a></li>
                <li><a href="#about">À propos</a></li>
                <li><a href="#services">Services</a></li>
                <li class="logo-slot">
                    <a href="#home" class="logo logo--enter" aria-label="Accueil">
                        <img src="/assets/img/logo.svg" alt="Logo Atelier Émeraude" width="110" height="64">
                    </a>
                </li>
                <li><a href="#delivery">Delivery</a></li>
                <li><a href="#gallery">Galerie</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <span class="city-badge">Témara</span>
        </div>
    </nav>
</header>
<main>
    <section id="home" class="hero section-target">
        <div class="hero-carousel" data-carousel>
            <div class="hero-slide is-active"><img src="/assets/img/hero/hero-1.svg" alt="Atelier pressing éco-responsable à Témara" width="1600" height="900" fetchpriority="high"></div>
            <div class="hero-slide"><img src="/assets/img/hero/hero-2.svg" alt="Collecte et livraison Témara" width="1600" height="900" loading="lazy"></div>
            <div class="hero-slide"><img src="/assets/img/hero/hero-3.svg" alt="Box 24/7 Témara sécurisée" width="1600" height="900" loading="lazy"></div>
            <button class="carousel-arrow prev" aria-label="Slide précédente">‹</button>
            <button class="carousel-arrow next" aria-label="Slide suivante">›</button>
            <div class="carousel-dots" aria-label="Navigation slides"></div>
        </div>
        <div class="hero-overlay">
            <div class="container reveal">
                <h1>Pressing à Témara</h1>
                <p>Un atelier premium, des procédés doux et un service fluide pour votre quotidien: Pressing à domicile Témara, collecte et livraison, et Box 24/7.</p>
                <div class="cta-group">
                    <a href="#delivery" class="btn">Réserver une collecte</a>
                    <a href="#contact" class="btn btn-secondary">Nous contacter</a>
                </div>
                <div class="chips">
                    <span>Delivery à Témara</span><span>Qualité premium</span><span>Box 24/7</span>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="container section section-target reveal">
        <h2>À propos</h2>
        <p>Notre équipe conçoit un soin textile exigeant, pensé pour durer. Nous privilégions les cycles maîtrisés, les produits responsables et une logistique optimisée pour Témara.</p>
        <div class="pillars grid-3">
            <article class="card"><h3>🌿 Éco</h3><p>Procédés doux, économies d’eau et emballages raisonnés.</p></article>
            <article class="card"><h3>✨ Qualité</h3><p>Contrôle visuel de chaque pièce et finitions haut de gamme.</p></article>
            <article class="card"><h3>⚡ Rapidité</h3><p>Organisation locale pour des délais courts et fiables.</p></article>
        </div>
    </section>

    <section id="services" class="container section section-target reveal">
        <h2>Services</h2>
        <div class="services-grid">
            <?php foreach ($site['services'] as $index => $service): ?>
                <article class="card service-card <?= $index === 6 ? 'featured' : '' ?>">
                    <h3><?= esc($service) ?></h3>
                    <p><?= $index === 6 ? 'Accès autonome et sécurisé pour dépôt et retrait, même tard le soir.' : 'Un service soigné, adapté à vos textiles et à vos exigences de confort.' ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="delivery" class="container section section-target reveal">
        <h2>Votre pressing à domicile à Témara <span class="price-badge">à partir de 100 Dh</span></h2>
        <div class="steps grid-3">
            <article class="card"><h3>1. Commande</h3><p>Appelez-nous ou écrivez sur WhatsApp pour réserver.</p><p><a class="btn" href="tel:<?= esc($site['contact']['phone']) ?>">Appeler</a> <a class="btn btn-secondary" href="https://wa.me/<?= esc($site['contact']['whatsapp']) ?>">WhatsApp</a></p></article>
            <article class="card"><h3>2. Collecte</h3><p>Nous passons sur le créneau qui vous convient, à domicile ou en entreprise.</p></article>
            <article class="card"><h3>3. Livraison</h3><p>Retour propre, plié et prêt à ranger, partout à Témara.</p></article>
        </div>
        <div class="card box-option">
            <h3>Option Box 24/7</h3>
            <p>Dépôt/collecte autonome via box dédiée, sécurisée, disponible 24h/24 7j/7.</p>
            <a href="#contact" class="btn js-box-link">Où est la box ?</a>
        </div>
    </section>

    <section class="slogan reveal"><p><span>CLEAN IS</span><span>THE NEW</span><span>COOL</span></p></section>

    <section id="gallery" class="container section section-target reveal">
        <h2>Galerie / Social</h2>
        <div class="gallery-grid">
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <figure class="gallery-item card">
                    <img src="/assets/img/gallery/gallery-<?= $i ?>.svg" alt="Visuel atelier pressing Témara #<?= $i ?>" width="400" height="400" loading="lazy">
                    <figcaption>Instant atelier #<?= $i ?> · Soin textile premium à Témara.</figcaption>
                </figure>
            <?php endfor; ?>
        </div>
        <a class="btn" href="<?= esc($site['socials']['instagram']) ?>">Suivez-nous</a>
    </section>

    <section id="faq" class="container section section-target reveal">
        <h2>FAQ</h2>
        <?php foreach ($site['faq'] as $item): ?>
            <details class="faq-item card"><summary><?= esc($item['q']) ?></summary><p><?= esc($item['a']) ?></p></details>
        <?php endforeach; ?>
    </section>

    <section id="contact" class="container section section-target reveal">
        <h2>Contact</h2>
        <?php if (session('success')): ?><p class="flash success"><?= esc(session('success')) ?></p><?php endif; ?>
        <?php if (session('error')): ?><p class="flash error"><?= esc(session('error')) ?></p><?php endif; ?>
        <div class="contact-grid">
            <div class="card" id="address-card">
                <h3><?= esc($site['siteName']) ?></h3>
                <p>Ville: <?= esc($site['city']) ?></p>
                <p>Téléphone: <a href="tel:<?= esc($site['contact']['phone']) ?>">Appeler</a></p>
                <p>WhatsApp: <a href="https://wa.me/<?= esc($site['contact']['whatsapp']) ?>">Écrire</a></p>
                <p>Email: <a href="mailto:<?= esc($site['contact']['email']) ?>"><?= esc($site['contact']['email']) ?></a></p>
                <p>Adresse: <?= esc($site['contact']['address']) ?> — Box 24/7 disponible ici</p>
                <p>Horaires: Lun–Ven 08h–20h, Sam 09h–18h, Box 24/7 active</p>
                <p><a href="https://maps.google.com" target="_blank" rel="noopener">Itinéraire Google Maps</a></p>
                <iframe title="Carte Témara" src="https://maps.google.com/maps?q=Temara&t=&z=13&ie=UTF8&iwloc=&output=embed" loading="lazy"></iframe>
            </div>
            <form class="card" method="post" action="/contact">
                <?= csrf_field() ?>
                <input type="text" name="company" tabindex="-1" autocomplete="off" class="hp-field" aria-hidden="true">
                <label>Nom<input type="text" name="name" required maxlength="120" value="<?= esc(old('name')) ?>"></label>
                <label>Téléphone<input type="tel" name="phone" required maxlength="30" value="<?= esc(old('phone')) ?>"></label>
                <label>Email (optionnel)<input type="email" name="email" maxlength="160" value="<?= esc(old('email')) ?>"></label>
                <label>Message<input type="text" name="message" maxlength="1000" value="<?= esc(old('message')) ?>"></label>
                <button class="btn" type="submit">Envoyer</button>
            </form>
        </div>
    </section>
</main>
<footer class="footer">
    <div class="container">
        <p>Pressing éco-responsable premium à Témara. Service local, discret et fiable.</p>
        <p><?= esc($site['siteName']) ?> · <?= esc($site['contact']['address']) ?> · <?= esc($site['contact']['phone']) ?></p>
        <p>© <?= date('Y') ?> <?= esc($site['siteName']) ?> · Mentions légales · Politique confidentialité</p>
    </div>
</footer>
<?= $this->endSection() ?>
