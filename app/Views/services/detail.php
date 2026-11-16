<!-- SERVICE DETAIL TEMPLATE: SUBHERO + DOTS, FLOATING LOCATION BANNER, SIDEBAR QUICK LINKS, 4-STEP CHEVRON, SLATE SLIDER, SPLIT INSURANCE, V-CARDS & FAQ -->
<section class="sp-subhero">
  <div class="sp-container">
    <div class="sp-subhero-grid">
      <div>
        <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;"><?= e($service['badge']) ?></span>
        <h1><?= e($service['title']) ?></h1>
        <p class="sp-subhero-lead"><?= e($service['tagline']) ?></p>
        <div style="display:flex; gap:14px; flex-wrap:wrap; align-items:center;">
          <a href="#service-intake" class="sp-chevron-btn">Request 24/7 Help</a>
          <a href="#process" class="sp-btn sp-btn-outline">View Our Process</a>
        </div>
      </div>

      <div class="sp-subhero-img-wrap">
        <div class="sp-subhero-dots" aria-hidden="true"></div>
        <img src="<?= $service['hero_image'] ?>" alt="<?= e($service['title']) ?>">
      </div>
    </div>
  </div>
</section>

<!-- FLOATING OVERLAPPING LOCAL FRANCHISE CARD -->
<div class="sp-floating-loc-wrap">
  <div class="sp-container">
    <div class="sp-floating-loc-card">
      <div>
        <div class="sp-loc-eyebrow">24/7 Emergency Services &bull; Detected Local Territory</div>
        <h2>{{ activeFranchise ? activeFranchise.name : 'RescuePro National Call Center' }}</h2>
        <p>
          {{ activeFranchise ? (activeFranchise.address + ' • Est. Arrival ' + activeFranchise.eta + ' • ' + activeFranchise.radius + ' coverage') : 'Over 2,410 independently owned and operated locations ready 24/7.' }}
          &nbsp;<button type="button" @click="locationModalOpen = true" style="background:none; border:0; color:var(--sp-orange); font-weight:700; text-decoration:underline; cursor:pointer; padding:0;">Update/change location</button>
        </p>
      </div>
      <div>
        <a :href="'tel:' + (activeFranchise ? activeFranchise.phone.replace(/\D/g, '') : '<?= e(EMERGENCY_PHONE_TEL) ?>')" class="sp-chevron-btn">
          Call {{ activeFranchise ? activeFranchise.phone : '<?= e(EMERGENCY_PHONE) ?>' }}
        </a>
      </div>
    </div>
  </div>
</div>

<!-- MAIN CONTENT + QUICK LINKS & SEARCH BOX SIDEBAR -->
<section class="sp-section" style="padding-top:18px;">
  <div class="sp-container">
    <div class="sp-content-sidebar-grid">
      <div>
        <h2 style="font-size:28px; font-weight:400; color:#2B333C; margin:0 0 14px;">
          Trusted <?= e($service['short_title']) ?> Mitigation &amp; Cleanup
        </h2>
        <p style="font-size:15.5px; color:var(--sp-muted); line-height:1.7; margin:0 0 24px;">
          <?= e($service['summary']) ?> Every minute counts following property damage—without specialized extraction, HEPA containment, or dehumidification, secondary structural degradation escalates quickly.
        </p>

        <div class="sp-grid-2" style="gap:20px;">
          <div style="background:#F7F8FA; border:1px solid var(--sp-border); border-radius:4px; padding:22px;">
            <h3 style="margin:0 0 12px; font-size:17px; color:#22262A;">Common Scenarios Handled</h3>
            <ul style="margin:0; padding-left:18px; color:var(--sp-muted); font-size:14px; display:grid; gap:8px;">
              <?php foreach ($service['causes'] as $cause): ?>
                <li><?= e($cause) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div style="background:#F7F8FA; border:1px solid var(--sp-border); border-radius:4px; padding:22px;">
            <h3 style="margin:0 0 12px; font-size:17px; color:#22262A;">Specialized Field Equipment</h3>
            <ul style="margin:0; padding-left:18px; color:var(--sp-muted); font-size:14px; display:grid; gap:8px;">
              <?php foreach ($service['equipment'] as $eq): ?>
                <li><?= e($eq) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

      <aside>
        <div class="sp-quick-links">
          <h3>Quick Links:</h3>
          <ul>
            <?php foreach ($service['quick_links'] as $qIdx => $qText): ?>
              <li>
                <a href="<?= $qIdx === 0 ? '#process' : ($qIdx >= 4 ? '#service-intake' : '#recommended') ?>">
                  <?= e($qText) ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="sp-question-search-box">
          <label for="sp-side-search">Have a restoration question?</label>
          <div class="sp-question-input-wrap">
            <input id="sp-side-search" type="text" v-model="globalSearchQuery" @keyup.enter="openSearchModal()" placeholder="Search services, FAQs, glossary...">
            <button type="button" @click="openSearchModal()" style="background:none; border:0; color:var(--sp-orange); cursor:pointer; font-size:18px;" aria-label="Search">
              <i class="ph-bold ph-magnifying-glass"></i>
            </button>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<!-- 4-STEP CHEVRON-BOTTOM SERVICE PROCESS -->
<section class="sp-process4-section">
  <div class="sp-container">
    <div class="sp-section-head">
      <h2>What to Expect During <?= e($service['short_title']) ?></h2>
      <p>Four proven stages guiding every RescuePro&reg; technician from first walkthrough to final sign-off.</p>
    </div>

    <div class="sp-process4-grid">
      <?php foreach ($service['process4'] as $idx => $p4): ?>
        <div class="sp-p4-card">
          <div class="sp-p4-top-wrap">
            <div class="sp-p4-top-border">
              <div class="sp-p4-top-inner">
                <h3><?= e($p4['step']) ?></h3>
                <?php if ($idx === 0): ?>
                  <svg viewBox="0 0 64 48" fill="none" stroke="#FF5A00" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="4" y="12" width="36" height="24" rx="2"/><path d="M40 19h11l7 8v9H40V19z"/><circle cx="16" cy="39" r="5"/><circle cx="49" cy="39" r="5"/>
                  </svg>
                <?php elseif ($idx === 1): ?>
                  <svg viewBox="0 0 64 48" fill="none" stroke="#FF5A00" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M8 24L32 6l24 18"/><path d="M15 20v20h34V20"/><rect x="26" y="25" width="12" height="15"/>
                  </svg>
                <?php elseif ($idx === 2): ?>
                  <svg viewBox="0 0 64 48" fill="none" stroke="#FF5A00" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M22 14h16l4 10v16H18V24l4-10z"/><path d="M26 14V8h8v6"/><path d="M44 12l8-4M46 18h10"/>
                  </svg>
                <?php else: ?>
                  <svg viewBox="0 0 64 48" fill="none" stroke="#FF5A00" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10 38h44"/><path d="M18 38V20l14-10 14 10v18"/><path d="M27 38v-9h10v9"/>
                  </svg>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="sp-p4-bottom"><?= e($p4['desc']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- #233546 HORIZONTAL MULTI-STEP RESTORATION CAROUSEL (Video 3:29 & 8:25) -->
<section id="process" class="sp-slate-section">
  <div class="sp-container">
    <div style="padding:0 30px;">
      <span class="sp-badge sp-badge-orange">Step-By-Step Mitigation Standard</span>
      <h2 style="font-size:32px; font-weight:300; color:#fff; margin:10px 0 6px;">
        The <?= count($service['steps']) ?>-Step <?= e($service['short_title']) ?> Process
      </h2>
      <p style="color:#CBD5E1; margin:0; font-size:15px;">Use the slider controls below to step through each certified phase of property restoration.</p>
    </div>

    <div class="sp-slate-cols">
      <div v-for="st in visibleSlateSteps" :key="st.num" class="sp-slate-step">
        <div class="sp-slate-num">{{ st.num }}</div>
        <h3>{{ st.title }}</h3>
        <p>{{ st.desc }}</p>
      </div>
    </div>

    <div class="sp-slate-controls" v-if="serviceSteps.length > 3">
      <div class="sp-slate-dots">
        <button v-for="idx in slatePageCount" :key="idx"
                type="button"
                class="sp-slate-dot"
                :class="{ active: slateOffset === (idx - 1) }"
                @click="slateOffset = idx - 1"
                :aria-label="'Slide ' + idx"></button>
      </div>
      <div class="sp-slate-arrows">
        <button type="button" class="sp-circle-arrow" @click="prevSlateSlide()" :disabled="slateOffset === 0" aria-label="Previous steps">&lsaquo;</button>
        <button type="button" class="sp-circle-arrow" @click="nextSlateSlide()" :disabled="slateOffset >= serviceSteps.length - 3" aria-label="Next steps">&rsaquo;</button>
      </div>
    </div>
  </div>
</section>

<!-- DIAGONAL INSURANCE / CONTENTS SPLIT BANNER -->
<section class="sp-insurance-split">
  <div class="sp-insurance-photo">
    <img src="<?= sp_img(in_array($service['slug'], ['specialty', 'cleaning'], true) ? 'packout_warehouse' : 'insurance_consult') ?>" alt="RescuePro documentation and specialized care">
  </div>
  <div class="sp-insurance-body">
    <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;">Streamlined Claims &amp; Care</span>
    <h2><?= in_array($service['slug'], ['specialty', 'cleaning'], true) ? 'Climate-Controlled Pack-Out &amp; Contents Inventory' : 'Direct Coordination with Your Insurance Adjuster' ?></h2>
    <p>
      <?= in_array($service['slug'], ['specialty', 'cleaning'], true)
        ? 'When extensive structural cleaning or reconstruction is required, certified pack-out specialists barcode-inventory, pad-wrap, transport, and ultrasonic-clean your furniture and heirlooms in secure vaults.'
        : 'Our teams use Xactimate estimating software and timestamped photo moisture logs to keep homeowners and property insurance adjusters completely aligned throughout the restoration timeline.' ?>
    </p>
    <a href="<?= e(url('/insurance')) ?>" class="sp-chevron-btn">Insurance Process Details</a>
  </div>
</section>

<!-- RECOMMENDED ARTICLES V-CHEVRON CARDS + SERVICE FAQ -->
<section id="recommended" class="sp-section sp-section-alt">
  <div class="sp-container">
    <div class="sp-section-head">
      <span class="sp-badge sp-badge-orange">Helpful Homeowner Guides</span>
      <h2>Recommended For You</h2>
    </div>

    <div class="sp-v-grid" style="margin-bottom:58px;">
      <?php foreach (array_slice($articles, 0, 3) as $art): ?>
        <article class="sp-v-card">
          <div class="sp-v-card-img-box">
            <img src="<?= $art['image'] ?>" alt="<?= e($art['title']) ?>">
          </div>
          <div class="sp-v-card-body">
            <h3><?= e($art['title']) ?></h3>
            <p class="sp-v-excerpt"><?= e(substr($art['excerpt'], 0, 128)) ?>...</p>
            <div class="sp-v-loc"><?= e($art['tag']) ?> &bull; <?= e($art['read_time']) ?></div>
            <a href="<?= e(url('/resources?cat=' . urlencode($art['category']))) ?>" class="sp-read-more">Read More <span>&rsaquo;</span></a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <div style="max-width:860px; margin:0 auto;" v-if="serviceFaqs.length > 0">
      <h2 style="font-size:28px; font-weight:400; color:#2B333C; margin:0 0 16px;">Frequently Asked Questions</h2>
      <div v-for="(faq, idx) in serviceFaqs" :key="idx" class="sp-faq-clean-item">
        <button type="button" class="sp-faq-clean-btn" @click="toggleFaq(idx)">
          <span>{{ faq.q }}</span>
          <i class="ph-bold" :class="openFaqIndex === idx ? 'ph-caret-up' : 'ph-caret-down'"></i>
        </button>
        <div class="sp-faq-clean-body" v-show="openFaqIndex === idx">{{ faq.a }}</div>
      </div>
    </div>
  </div>
</section>


<!-- ANSI/IICRC TECHNICAL CLASSIFICATION & COMPLIANCE MATRIX -->
<section class="sp-section sp-section-alt" style="border-top:1px solid var(--sp-border);">
  <div class="sp-container">
    <div class="sp-section-head">
      <h2>Technical Reference &amp; Clearance Verification Matrix</h2>
      <p>Every RescuePro® project documents calibrated psychrometric targets and containment differentials before build-back clearance is signed.</p>
    </div>
    <div class="sp-table-wrap">
      <table class="sp-table">
        <thead>
          <tr>
            <th>Severity / Standard</th>
            <th>Primary Scope Criteria</th>
            <th>Engineering Controls &amp; Containment</th>
            <th>Clearance Sign-Off Benchmark</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>ANSI/IICRC S500 Category 1–2</strong></td>
            <td>Sanitary supply bursts &amp; appliance greywater lines</td>
            <td>Injectidry® negative-pressure mats, LGR dehumidification</td>
            <td>Wood &le; 12% MC, Drywall &le; 0.5% WME relative scale</td>
          </tr>
          <tr>
            <td><strong>ANSI/IICRC S500 Category 3</strong></td>
            <td>Sewage backups, rising floodwater &amp; silt intrusion</td>
            <td>Controlled 2–4 ft flood cuts, EPA-registered antimicrobial wash</td>
            <td>Negative pressure logged + ATP surface swab clearance</td>
          </tr>
          <tr>
            <td><strong>ANSI/IICRC S520 Mold</strong></td>
            <td>Visible fungal amplification or elevated hidden spores</td>
            <td>6-mil poly containment at &minus;5 Pa + 99.97% HEPA scrubbing</td>
            <td>Independent IEP spore-trap air sample pass (&lt; outdoor control)</td>
          </tr>
          <tr>
            <td><strong>ANSI/IICRC S700 Fire &amp; Smoke</strong></td>
            <td>Protein grease, wood char, synthetic soot &amp; suppression runoff</td>
            <td>Vulcanized chemical sponge lift, hydroxyl odor oxidation, shellac seal</td>
            <td>Zero measurable acidic residue &amp; thermal clearance audit</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align:center;margin-top:26px;">
      <a href="<?= e(url('/faq')) ?>" class="sp-btn sp-btn-outline" style="margin-right:10px;">Explore 32-Question Knowledge Base</a>
      <a href="<?= e(url('/resources')) ?>" class="sp-btn sp-btn-orange">Read 24 Field Manuals</a>
    </div>
  </div>
</section>

<!-- SERVICE-SPECIFIC DISPATCH INTAKE -->
<section id="service-intake" class="sp-section">
  <div class="sp-container" style="max-width:840px;">
    <div class="sp-form-card">
      <span class="sp-badge sp-badge-orange">24/7 Dispatch Scheduling</span>
      <h2 style="margin:10px 0 6px; font-size:26px; font-weight:400; color:#22262A;">
        Schedule <?= e($service['short_title']) ?> Evaluation
      </h2>
      <p style="margin:0 0 20px; font-size:14px; color:var(--sp-muted);">
        Available 24 hours a day, 7 days a week via our National Call Center at <strong><?= e(EMERGENCY_PHONE) ?></strong>.
      </p>

      <form method="POST" action="<?= e(url('/request')) ?>">
        <?= csrf_field() ?>
        <input type="hidden" name="service_type" value="<?= e($service['short_title']) ?>">
        <div class="sp-grid-2" style="gap:14px;">
          <div class="sp-form-group">
            <label class="sp-label">Full Name *</label>
            <input type="text" name="full_name" class="sp-input" required placeholder="Alex Morgan">
          </div>
          <div class="sp-form-group">
            <label class="sp-label">Phone Number *</label>
            <input type="tel" name="phone" class="sp-input" required placeholder="(615) 555-0192">
          </div>
        </div>
        <div class="sp-grid-3" style="gap:14px;">
          <div class="sp-form-group">
            <label class="sp-label">Email Address *</label>
            <input type="email" name="email" class="sp-input" required placeholder="alex@example.com">
          </div>
          <div class="sp-form-group">
            <label class="sp-label">ZIP Code *</label>
            <input type="text" name="zip_code" class="sp-input" :value="activeFranchise ? activeFranchise.zip : '37066'" required>
          </div>
          <div class="sp-form-group">
            <label class="sp-label">Property Type</label>
            <select name="property_type" class="sp-select">
              <option value="Residential">Residential</option>
              <option value="Commercial">Commercial</option>
            </select>
          </div>
        </div>
        <div class="sp-form-group">
          <label class="sp-label">Street Address *</label>
          <input type="text" name="address" class="sp-input" required placeholder="Property address requiring crew dispatch">
        </div>
        <div class="sp-form-group">
          <label class="sp-label">Situation Notes</label>
          <textarea name="details" class="sp-textarea" rows="3" placeholder="Tell our dispatcher which rooms or floors are impacted..."></textarea>
        </div>
        <button type="submit" class="sp-chevron-btn sp-chevron-lg">Dispatch Local Crew Now</button>
      </form>
    </div>
  </div>
</section>

<?php
