<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <span>Contact RescuePro®</span>
    </nav>
    <h1>Contact RescuePro® — 24/7 Emergency Dispatch &amp; National HQ</h1>
    <p class="sp-lead">Need immediate water, fire, storm, or mold mitigation? Call <?= e(HOTLINE_PHONE) ?> any hour or route your inquiry straight to the right operational desk.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container sp-contact-grid">
    <div class="sp-contact-left">
      <div class="sp-card sp-card-accent">
        <h2>24/7 Emergency Operations &amp; Corporate Desk</h2>
        <p class="sp-muted">Our national dispatch center coordinates over 2,410 independently owned and operated territories across North America.</p>

        <div class="sp-contact-channels">
          <div class="sp-channel-row">
            <strong>24/7 Emergency Loss Dispatch</strong>
            <a href="tel:+18005550199" class="sp-phone-big"><?= e(HOTLINE_PHONE) ?></a>
            <span>Guaranteed <?= (int)SLA_RESPONSE_MINS ?>-minute local crew chief callback</span>
          </div>
          <div class="sp-channel-row">
            <strong>Franchise Ownership &amp; Territory Development</strong>
            <span><?= e(FRANCHISE_PHONE) ?> &middot; <a href="<?= e(url('/franchise')) ?>">Request FDD Packet &rarr;</a></span>
          </div>
          <div class="sp-channel-row">
            <strong>National Corporate Support Center</strong>
            <span><?= e(COMPANY_LEGAL_NAME) ?> &middot; <?= e(CORPORATE_ADDRESS) ?></span>
          </div>
          <div class="sp-channel-row">
            <strong>Commercial Large Loss &amp; National Accounts</strong>
            <span>24/7 CAT Team &middot; <a href="<?= e(url('/commercial')) ?>">Large Loss Portal &rarr;</a></span>
          </div>
        </div>
      </div>

      <div class="sp-card sp-mt-md">
        <h3>Regional Territory Dispatch Offices (Sample Verified Hubs)</h3>
        <div class="sp-mini-franchise-list">
          <?php foreach (array_slice($franchises, 0, 5) as $fr): ?>
          <div class="sp-mini-fr-item">
            <div>
              <strong><?= e($fr['name']) ?></strong>
              <div class="sp-muted"><?= e($fr['address'] ?? ($fr['city'] . ', ' . $fr['state'] . ' ' . $fr['zip'])) ?></div>
            </div>
            <span class="sp-pill sp-pill-green"><?= e($fr['phone']) ?></span>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="sp-mt-sm">
          <a href="<?= e(url('/locations')) ?>" class="sp-btn sp-btn-outline">Search All Locations by ZIP &rarr;</a>
        </div>
      </div>
    </div>

    <div class="sp-contact-right">
      <div class="sp-card">
        <h2>Send a Direct Message to National Support</h2>
        <p class="sp-muted">For active property billing questions, commercial account onboarding, media inquiries, or accessibility requests, submit the form below.</p>
        <form action="<?= e(url('/contact-submit')) ?>" method="POST" class="sp-form sp-mt-md">
          <?= csrf_field() ?>
          <div class="sp-form-row">
            <label for="c_name">Full Name *</label>
            <input id="c_name" name="full_name" type="text" required minlength="2" value="<?= old('full_name') ?>" placeholder="Jordan Miller">
          </div>
          <div class="sp-form-row">
            <label for="c_email">Work or Personal Email *</label>
            <input id="c_email" name="email" type="email" required value="<?= old('email') ?>" placeholder="name@company.com">
          </div>
          <div class="sp-form-row">
            <label for="c_topic">Routing Department *</label>
            <select id="c_topic" name="topic">
              <option value="Residential Restoration Support">Residential Restoration Support</option>
              <option value="Commercial National Account / ERP">Commercial National Account / ERP</option>
              <option value="Insurance Adjuster / Claims Desk">Insurance Adjuster / Claims Desk</option>
              <option value="Billing &amp; Documentation Copy">Billing &amp; Documentation Copy</option>
              <option value="Digital Accessibility / Privacy Request">Digital Accessibility / Privacy Request</option>
              <option value="General Corporate Inquiry">General Corporate Inquiry</option>
            </select>
          </div>
          <div class="sp-form-row">
            <label for="c_msg">Message &amp; Property / Reference Details *</label>
            <textarea id="c_msg" name="message" rows="5" required minlength="6" placeholder="Include ticket code (e.g. RP-2026-1001), ZIP code, or details so our team can respond accurately..."><?= old('message') ?></textarea>
          </div>
          <button type="submit" class="sp-btn sp-btn-orange sp-btn-block">Submit Inquiry to RescuePro® Desk</button>
        </form>
      </div>
    </div>
  </div>
</section>
