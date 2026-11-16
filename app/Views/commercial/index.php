<!-- COMMERCIAL LARGE LOSS & CONSTRUCTION DIVISIONS (Video 2:28, 5:43, 8:25) -->
<section class="sp-subhero">
  <div class="sp-container">
    <div class="sp-subhero-grid">
      <div>
        <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;">Commercial Large Loss &amp; CAT Response</span>
        <h1>Commercial Restoration, Large Loss &amp; Reconstruction</h1>
        <p class="sp-subhero-lead">
          When fire, storm flooding, or sprinkler discharge threatens business continuity, RescuePro&reg; Commercial Large Loss teams mobilize self-contained generator rigs, desiccant dehumidifiers, and turnkey reconstruction specialists nationwide.
        </p>
        <div style="display:flex; gap:14px; flex-wrap:wrap; align-items:center;">
          <a href="#phases" class="sp-chevron-btn">Explore Construction Phases</a>
          <a href="<?= e(url('/commercial/erp')) ?>" class="sp-btn sp-btn-outline">Setup Free Facility ERP</a>
        </div>
      </div>

      <div class="sp-subhero-img-wrap">
        <div class="sp-subhero-dots" aria-hidden="true"></div>
        <img src="<?= sp_img('commercial_largeloss') ?>" alt="RescuePro Commercial Large Loss Disaster Recovery Fleet">
      </div>
    </div>
  </div>
</section>

<!-- FLOATING COMMERCIAL CALL CENTER BANNER -->
<div class="sp-floating-loc-wrap">
  <div class="sp-container">
    <div class="sp-floating-loc-card">
      <div>
        <div class="sp-loc-eyebrow">National Commercial Accounts &amp; Catastrophe Dispatch</div>
        <h2>24/7 Commercial Call Center &amp; Multi-Site Response</h2>
        <p>Priority disaster SLA coordination for multi-family properties, hospitals, schools, hotels, and Fortune 500 portfolios.</p>
      </div>
      <div>
        <a href="tel:<?= e(COMMERCIAL_PHONE_TEL) ?>" class="sp-chevron-btn">Call <?= e(COMMERCIAL_PHONE) ?></a>
      </div>
    </div>
  </div>
</div>

<!-- OVERVIEW + QUICK LINKS SIDEBAR -->
<section class="sp-section" style="padding-top:16px;">
  <div class="sp-container">
    <div class="sp-content-sidebar-grid">
      <div>
        <h2 style="font-size:28px; font-weight:400; color:#2B333C; margin:0 0 14px;">
          Catastrophic Damage Restoration and Repair
        </h2>
        <p style="font-size:15.5px; color:var(--sp-muted); line-height:1.7; margin:0 0 18px;">
          No commercial facility loss is too complex. Backed by more than 2,410 franchises across North America, our Commercial Large Loss Division connects emergency mitigation crews seamlessly with licensed general contractors under a single unified scope.
        </p>
        <p style="font-size:15.5px; color:var(--sp-muted); line-height:1.7; margin:0;">
          Healthcare infection-control barriers (ICRA), hotel suite turnaround scheduling, industrial machinery soot decontamination, and commercial roof dry-in help minimize tenant lease interruption and lost operating revenue.
        </p>
      </div>

      <aside>
        <div class="sp-quick-links">
          <h3>Quick Links:</h3>
          <ul>
            <li><a href="#phases">Pre-Construction &amp; Build-Back Phases</a></li>
            <li><a href="#industries">Commercial Industries Served</a></li>
            <li><a href="<?= e(url('/commercial/erp')) ?>">Emergency Ready Plan (ERP) Program</a></li>
            <li><a href="<?= e(url('/services/construction')) ?>">Commercial Construction Services</a></li>
            <li><a href="<?= e(url('/insurance')) ?>">Insurance Carrier Documentation</a></li>
          </ul>
        </div>
        <div class="sp-question-search-box">
          <label for="sp-comm-search">Search Commercial Services</label>
          <div class="sp-question-input-wrap">
            <input id="sp-comm-search" type="text" v-model="globalSearchQuery" @keyup.enter="openSearchModal()" placeholder="Search ERP, large loss, desiccant...">
            <button type="button" @click="openSearchModal()" style="background:none; border:0; color:var(--sp-orange); cursor:pointer; font-size:18px;" aria-label="Search">
              <i class="ph-bold ph-magnifying-glass"></i>
            </button>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<!-- #233546 INTERACTIVE VUE CONSTRUCTION PHASES TOGGLE (Pre-Construction vs Construction) -->
<section id="phases" class="sp-slate-section">
  <div class="sp-container">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; padding:0 30px 18px;">
      <div>
        <span class="sp-badge sp-badge-orange">Single-Source Mitigation &amp; Rebuild</span>
        <h2 style="font-size:32px; font-weight:300; color:#fff; margin:10px 0 4px;">
          Commercial Reconstruction Execution Phases
        </h2>
      </div>
      <div style="display:flex; gap:10px; flex-wrap:wrap;">
        <button type="button" class="sp-chip" :class="{ active: commercialPhase === 'pre' }" @click="commercialPhase = 'pre'">
          Pre-Construction Phase
        </button>
        <button type="button" class="sp-chip" :class="{ active: commercialPhase === 'const' }" @click="commercialPhase = 'const'">
          Construction Phase
        </button>
      </div>
    </div>

    <div class="sp-slate-cols">
      <div v-for="step in activeCommercialSteps" :key="step.title" class="sp-slate-step">
        <div class="sp-slate-num">{{ step.num }}</div>
        <h3>{{ step.title }}</h3>
        <p>{{ step.desc }}</p>
      </div>
    </div>
  </div>
</section>

<!-- COMMERCIAL INDUSTRIES SERVED -->
<section id="industries" class="sp-section sp-section-alt">
  <div class="sp-container">
    <div class="sp-section-head">
      <span class="sp-badge sp-badge-green">Specialized Compliance</span>
      <h2>Commercial Industries Served</h2>
      <p>Tailored emergency protocols built around regulatory compliance, occupied-building safety, and rapid reopening.</p>
    </div>

    <div class="sp-grid-3">
      <?php foreach ($industries as $ind): ?>
        <div class="sp-card">
          <div class="sp-card-body">
            <div style="width:48px; height:48px; border-radius:8px; background:var(--sp-orange-soft); color:var(--sp-orange); display:grid; place-items:center; font-size:24px; margin-bottom:12px;">
              <i class="ph-bold <?= e($ind['icon']) ?>"></i>
            </div>
            <h3><?= e($ind['name']) ?></h3>
            <p><?= e($ind['desc']) ?></p>
            <a href="<?= e(url('/commercial/erp')) ?>" class="sp-read-more">Setup Facility ERP <span>&rsaquo;</span></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
