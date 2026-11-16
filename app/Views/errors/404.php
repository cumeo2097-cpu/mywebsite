<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <h1>404 — Page Not Found</h1>
    <p class="sp-lead">The restoration resource or route you requested could not be located. Jump directly to one of our core services or our 24/7 dispatch line below.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container">
    <div class="sp-card sp-card-accent" style="max-width:720px;margin:0 auto 36px;text-align:center;">
      <h2>Need Immediate 24/7 Emergency Property Help?</h2>
      <p class="sp-muted">Our national hotline operates around the clock at <strong><?= e(HOTLINE_PHONE) ?></strong>, or browse every active route in our Sitemap.</p>
      <div class="sp-btn-row" style="justify-content:center;margin-top:18px;">
        <a href="<?= e(url('/')) ?>" class="sp-btn sp-btn-orange">Back to Homepage</a>
        <a href="<?= e(url('/faq')) ?>" class="sp-btn sp-btn-outline">FAQ Center</a>
        <a href="<?= e(url('/sitemap')) ?>" class="sp-btn sp-btn-outline">Website Sitemap</a>
      </div>
    </div>

    <?php if (!empty($services)): ?>
    <div class="sp-grid-4">
      <?php foreach ($services as $svc): ?>
      <a href="<?= e(url('/service/' . $svc['slug'])) ?>" class="sp-card" style="display:block;color:var(--sp-dark);">
        <h3 style="font-size:1rem;"><?= e($svc['title']) ?></h3>
        <p class="sp-muted" style="font-size:0.84rem;margin-bottom:0;"><?= e($svc['summary']) ?></p>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
