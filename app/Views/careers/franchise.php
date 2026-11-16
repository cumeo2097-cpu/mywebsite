<!-- OWN A RescuePro FRANCHISE (Video 18:55) -->
<section class="sp-subhero">
  <div class="sp-container">
    <div class="sp-subhero-grid">
      <div>
        <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;">Entrepreneur #1 in Restoration Services &bull; 23 Years</span>
        <h1>Own a RescuePro&reg; Franchise</h1>
        <p class="sp-subhero-lead">
          Backed by the world’s largest cleanup and restoration franchise system spanning more than 2,410 protected territories—RescuePro equips business leaders with national insurance carrier programs, fleet buying power, and Gallatin HQ training.
        </p>
        <div style="display:flex; gap:14px; flex-wrap:wrap; align-items:center;">
          <a href="#inquiry" class="sp-chevron-btn">Request Franchise Info Kit</a>
          <a href="tel:<?= e(FRANCHISE_PHONE_TEL) ?>" class="sp-btn sp-btn-outline">Call <?= e(FRANCHISE_PHONE) ?></a>
        </div>
      </div>

      <div class="sp-subhero-img-wrap">
        <div class="sp-subhero-dots" aria-hidden="true"></div>
        <img src="<?= sp_img('careers_presentation') ?>" alt="RescuePro Franchise Leadership and Business Development">
      </div>
    </div>
  </div>
</section>

<!-- CAPITAL TIER PATHWAY ESTIMATOR + INQUIRY FORM -->
<section id="inquiry" class="sp-section sp-section-alt">
  <div class="sp-container">
    <div class="sp-grid-2" style="gap:36px; align-items:start;">
      <div>
        <span class="sp-badge sp-badge-orange">Territory Planning Tool</span>
        <h2 style="font-size:28px; font-weight:400; color:#2B333C; margin:10px 0 12px;">
          Interactive Capital Tier Estimator
        </h2>
        <p style="font-size:15px; color:var(--sp-muted); line-height:1.68; margin:0 0 18px;">
          Compare single-territory ownership versus regional multi-unit growth hubs. Select your available liquid capital tier below:
        </p>

        <div class="sp-filter-bar">
          <button type="button" class="sp-chip" :class="{ active: capitalTier === '150k' }" @click="capitalTier = '150k'">$100K – $200K</button>
          <button type="button" class="sp-chip" :class="{ active: capitalTier === '300k' }" @click="capitalTier = '300k'">$250K – $450K</button>
          <button type="button" class="sp-chip" :class="{ active: capitalTier === '500k' }" @click="capitalTier = '500k'">$500K+ Multi-Unit</button>
        </div>

        <div class="sp-form-card" style="border-left:4px solid var(--sp-orange);">
          <span class="sp-badge sp-badge-green" style="margin-bottom:8px;">{{ capitalSummary.label }}</span>
          <h3 style="margin:0 0 8px; color:#22262A; font-size:20px;">{{ capitalSummary.verdict }}</h3>
          <p style="margin:0; font-size:14.5px; color:var(--sp-muted); line-height:1.65;">{{ capitalSummary.desc }}</p>
        </div>
      </div>

      <div class="sp-form-card">
        <h3 style="margin:0 0 6px; font-size:22px; color:#22262A;">Connect with Franchise Sales Team</h3>
        <p style="margin:0 0 18px; font-size:13.5px; color:var(--sp-muted);">
          Direct Hotline: <strong><?= e(FRANCHISE_PHONE) ?></strong> &bull; Available protected county territories nationwide.
        </p>

        <form method="POST" action="<?= e(url('/franchise-inquiry')) ?>">
          <?= csrf_field() ?>
          <div class="sp-grid-2" style="gap:14px;">
            <div class="sp-form-group">
              <label class="sp-label">Full Name *</label>
              <input type="text" name="full_name" class="sp-input" required placeholder="Morgan Hayes">
            </div>
            <div class="sp-form-group">
              <label class="sp-label">Phone Number *</label>
              <input type="tel" name="phone" class="sp-input" required placeholder="(615) 555-0188">
            </div>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Email Address *</label>
            <input type="email" name="email" class="sp-input" required placeholder="morgan@businessgroup.com">
          </div>

          <div class="sp-grid-2" style="gap:14px;">
            <div class="sp-form-group">
              <label class="sp-label">Target Territory State / Metro</label>
              <input type="text" name="territory_state" class="sp-input" placeholder="e.g. Middle Tennessee / Texas">
            </div>
            <div class="sp-form-group">
              <label class="sp-label">Liquid Capital Range</label>
              <input type="text" name="liquid_capital" class="sp-input" :value="capitalSummary.label" readonly>
            </div>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Management / Construction Background Notes</label>
            <textarea name="notes" class="sp-textarea" rows="3" placeholder="Share leadership background or preferred territory region..."></textarea>
          </div>

          <button type="submit" class="sp-chevron-btn sp-chevron-lg" style="width:100%; justify-content:center;">
            Request Franchise Disclosure Packet
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php
