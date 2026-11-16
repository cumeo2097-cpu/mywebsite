<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <span>Website Sitemap</span>
    </nav>
    <h1>RescuePro® Complete Website Directory &amp; Sitemap</h1>
    <p class="sp-lead">Direct verified links to every residential service, commercial division, technical guide, FAQ center, portal workspace, and legal document.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container">
    <div class="sp-grid-3">
      <div class="sp-card">
        <h3>Company &amp; National Operations</h3>
        <ul class="sp-sitemap-list">
          <li><a href="<?= e(url('/')) ?>">Home — 24/7 Emergency Restoration Hub</a></li>
          <li><a href="<?= e(url('/why')) ?>">Why RescuePro® — History &amp; First Responders</a></li>
          <li><a href="<?= e(url('/locations')) ?>">Find a Location (ZIP / City Directory)</a></li>
          <li><a href="<?= e(url('/contact')) ?>">Contact RescuePro® &amp; HQ Support</a></li>
          <li><a href="<?= e(url('/about/preferred-vendor')) ?>">Carrier Preferred Vendor Network</a></li>
          <li><a href="<?= e(url('/careers')) ?>">Corporate &amp; Franchise Careers</a></li>
          <li><a href="<?= e(url('/franchise')) ?>">Own a RescuePro® Franchise</a></li>
        </ul>
      </div>

      <div class="sp-card">
        <h3>Restoration &amp; Commercial Services</h3>
        <ul class="sp-sitemap-list">
          <?php foreach ($services as $svc): ?>
          <li><a href="<?= e(url('/service/' . $svc['slug'])) ?>"><?= e($svc['title']) ?></a></li>
          <?php endforeach; ?>
          <li><a href="<?= e(url('/commercial')) ?>">Commercial Large Loss Division</a></li>
          <li><a href="<?= e(url('/commercial/erp')) ?>">Emergency Ready Plan (ERP) Builder</a></li>
          <li><a href="<?= e(url('/insurance')) ?>">Insurance Claims &amp; CE Courses</a></li>
        </ul>
      </div>

      <div class="sp-card">
        <h3>Portals, FAQ &amp; Legal Trust Center</h3>
        <ul class="sp-sitemap-list">
          <li><a href="<?= e(url('/faq')) ?>">Frequently Asked Questions (FAQ)</a></li>
          <li><a href="<?= e(url('/resources')) ?>">Restoration Guides &amp; Resources</a></li>
          <li><a href="<?= e(url('/resources/glossary')) ?>">A–Z Restoration Glossary</a></li>
          <li><a href="<?= e(url('/portal')) ?>">Customer Restoration Portal</a></li>
          <li><a href="<?= e(url('/admin')) ?>">National Dispatch Admin Console</a></li>
          <li><a href="<?= e(url('/login')) ?>">Account Sign In</a> &middot; <a href="<?= e(url('/register')) ?>">Create Account</a></li>
          <li><a href="<?= e(url('/terms-of-service')) ?>">Terms of Service</a></li>
          <li><a href="<?= e(url('/privacy-policy')) ?>">Privacy Policy</a></li>
          <li><a href="<?= e(url('/accessibility')) ?>">WCAG 2.1 AA Accessibility Statement</a></li>
        </ul>
      </div>
    </div>

    <div class="sp-card sp-mt-lg">
      <h3>All Technical Field Guides &amp; Homeowner Manuals (<?= count($articles) ?>)</h3>
      <div class="sp-grid-3 sp-mt-md">
        <?php foreach ($articles as $art): ?>
        <div class="sp-sitemap-article-item">
          <span class="sp-tag-inline"><?= e($art['category']) ?></span>
          <a href="<?= e(url('/resources/article?id=' . (int)$art['id'])) ?>"><?= e($art['title']) ?></a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
