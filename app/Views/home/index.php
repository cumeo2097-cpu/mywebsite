<!-- HOMEPAGE: DIAGONAL HERO, PROCESS 4-BOX, FIRST RESPONDERS, SERVICES, INSURANCE SPLIT, COMMUNITY & DISPATCH -->
<section class="sp-home-hero">
  <div class="sp-home-hero-photo" style="background-image:url('<?= sp_img('hero_fleet_banner') ?>');"></div>

  <div class="sp-home-hero-left">
    <div class="sp-home-hero-left-inner">
      <h1>The #1 Choice in Cleanup &amp; Restoration*</h1>

      <p class="sp-detect-label">Your detected location is:</p>
      <div class="sp-detect-city">
        {{ activeFranchise ? (activeFranchise.city + ', ' + activeFranchise.state) : '<?= e(DETECTED_CITY) ?>' }}
      </div>

      <a :href="'tel:' + (activeFranchise ? activeFranchise.phone.replace(/\D/g, '') : '<?= e(EMERGENCY_PHONE_TEL) ?>')" class="sp-detect-sublink">
        {{ activeFranchise ? activeFranchise.name : 'RescuePro National Call Center' }}
        &bull; {{ activeFranchise ? activeFranchise.phone : '<?= e(EMERGENCY_PHONE) ?>' }}
      </a>

      <div class="sp-change-loc">
        Not your location?
        <button type="button" @click="locationModalOpen = true">Update/change location</button>
      </div>

      <div class="sp-review-pill">
        <span class="sp-review-icon"><i class="ph-fill ph-star"></i></span>
        <span>{{ activeFranchise ? Number(activeFranchise.reviews).toLocaleString() : '187,515' }} Reviews</span>
        <span class="sp-review-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
        <strong>{{ activeFranchise ? activeFranchise.rating : '4.8' }}</strong>
      </div>
    </div>
  </div>

  <a :href="'tel:' + (activeFranchise ? activeFranchise.phone.replace(/\D/g, '') : '<?= e(EMERGENCY_PHONE_TEL) ?>')" class="sp-hero-phone-ribbon">
    <strong>{{ activeFranchise ? activeFranchise.phone : '<?= e(EMERGENCY_PHONE) ?>' }}</strong>
    <span>We're Here to Help&reg; 24/7</span>
  </a>
</section>

<!-- 4-STEP CHEVRON-BOTTOM PROCESS BOXES (Assess, Secure, Clean, Restore) -->
<section class="sp-process4-section">
  <div class="sp-container">
    <div class="sp-section-head">
      <span class="sp-badge sp-badge-orange">24/7 Emergency Response Standard</span>
      <h2>Our Expert Restoration Process</h2>
      <p>Certified technicians respond rapidly across more than 2,410 U.S. and Canadian locations to make disaster damage "Like it never even happened."</p>
    </div>

    <div class="sp-process4-grid">
      <!-- Step 1: Assess -->
      <div class="sp-p4-card">
        <div class="sp-p4-top-wrap">
          <div class="sp-p4-top-border">
            <div class="sp-p4-top-inner">
              <h3>Assess</h3>
              <svg viewBox="0 0 64 48" fill="none" stroke="#FF5A00" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <rect x="4" y="12" width="36" height="24" rx="2"/>
                <path d="M40 19h11l7 8v9H40V19z"/>
                <circle cx="16" cy="39" r="5"/>
                <circle cx="49" cy="39" r="5"/>
                <path d="M12 22h18M12 28h12"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="sp-p4-bottom">
          Our local emergency crew inspects property damage using FLIR thermal imaging and digital moisture meters to map every affected material accurately.
        </div>
      </div>

      <!-- Step 2: Secure -->
      <div class="sp-p4-card">
        <div class="sp-p4-top-wrap">
          <div class="sp-p4-top-border">
            <div class="sp-p4-top-inner">
              <h3>Secure</h3>
              <svg viewBox="0 0 64 48" fill="none" stroke="#FF5A00" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M8 24L32 6l24 18"/>
                <path d="M15 20v20h34V20"/>
                <rect x="26" y="25" width="12" height="15"/>
                <path d="M29 25v-3a3 3 0 0 1 6 0v3"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="sp-p4-bottom">
          Immediate emergency board-up, roof tarping, water shut-off coordination, and HEPA negative-air containment protect your structure from further loss.
        </div>
      </div>

      <!-- Step 3: Clean -->
      <div class="sp-p4-card">
        <div class="sp-p4-top-wrap">
          <div class="sp-p4-top-border">
            <div class="sp-p4-top-inner">
              <h3>Clean</h3>
              <svg viewBox="0 0 64 48" fill="none" stroke="#FF5A00" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M22 14h16l4 10v16H18V24l4-10z"/>
                <path d="M26 14V8h8v6"/>
                <path d="M44 12l8-4M46 18h10M44 24l8 4"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="sp-p4-bottom">
          Industrial truck-mounted extraction, dry-chemical soot removal, antimicrobial sanitization, and thermal fogging remove contamination safely.
        </div>
      </div>

      <!-- Step 4: Restore -->
      <div class="sp-p4-card">
        <div class="sp-p4-top-wrap">
          <div class="sp-p4-top-border">
            <div class="sp-p4-top-inner">
              <h3>Restore</h3>
              <svg viewBox="0 0 64 48" fill="none" stroke="#FF5A00" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M10 38h44"/>
                <path d="M18 38V20l14-10 14 10v18"/>
                <path d="M27 38v-9h10v9"/>
                <path d="M47 11l6 6"/>
              </svg>
            </div>
          </div>
        </div>
        <div class="sp-p4-bottom">
          Scientific structural dehumidification followed by seamless drywall, flooring, painting, and reconstruction returns your property to pre-loss condition.
        </div>
      </div>
    </div>

    <div style="text-align:center; margin-top:34px;">
      <a href="#request" class="sp-chevron-btn sp-chevron-lg">Request 24/7 Service</a>
    </div>
  </div>
</section>

<!-- FIRST RESPONDER BOWL & FIREFIGHTER CHALLENGE LEAGUE SECTION -->
<section class="sp-section" style="padding-bottom:0;">
  <div class="sp-container">
    <div class="sp-subhero-grid" style="padding-bottom:48px;">
      <div>
        <span class="sp-badge sp-badge-orange">Serving Our Heroes Nationwide</span>
        <h2 style="font-size:clamp(28px, 3vw, 38px); font-weight:300; color:#2B333C; margin:12px 0 14px; line-height:1.2;">
          RescuePro&reg; Proudly Supports First Responders
        </h2>
        <p style="font-size:15.5px; color:var(--sp-muted); line-height:1.68; margin:0 0 18px;">
          Through the Firefighter Challenge League&reg; and the annual RescuePro First Responder Bowl&reg;, our system honors the brave firefighters, EMS professionals, paramedics, and law enforcement personnel protecting our neighborhoods every day.
        </p>
        <p style="font-size:15px; color:var(--sp-muted); line-height:1.65; margin:0 0 24px;">
          From major stadium bowl tributes to emergency disaster relief alongside local fire departments, RescuePro stands beside the people who run toward danger when property and lives are at risk.
        </p>
        <div style="display:flex; gap:14px; flex-wrap:wrap; align-items:center;">
          <a href="<?= e(url('/why#community')) ?>" class="sp-chevron-btn">Learn More</a>
          <a href="<?= e(url('/locations')) ?>" class="sp-btn sp-btn-outline">Find Local Franchise</a>
        </div>
      </div>

      <div>
        <div style="position:relative; border-radius:4px; overflow:hidden; box-shadow:0 14px 34px rgba(0,0,0,0.14);">
          <img src="<?= sp_img('firefighter_hose') ?>" alt="RescuePro supports Firefighters and First Responders" style="width:100%; height:310px; object-fit:cover;">
          <div style="position:absolute; left:16px; right:16px; bottom:16px; display:flex; gap:12px; align-items:center; justify-content:space-between; background:rgba(255,255,255,0.95); padding:10px 16px; border-radius:4px; box-shadow:0 6px 18px rgba(0,0,0,0.16);">
            <img src="<?= sp_img('firefighter_league_logo') ?>" alt="Firefighter Challenge League" style="height:44px; width:auto; object-fit:contain;">
            <img src="<?= sp_img('first_responder_bowl') ?>" alt="RescuePro First Responder Bowl" style="height:44px; width:auto; object-fit:contain;">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div style="background:#1D2025; color:#FFFFFF; padding:22px 0; text-align:center;">
    <div class="sp-container">
      <div style="font-size:clamp(20px, 2.5vw, 28px); font-weight:300; letter-spacing:0.01em;">
        We Take Care of the People <strong style="color:#FF5A00; font-weight:700;">Who Take Care of People</strong>
      </div>
    </div>
  </div>
</section>


<!-- LOWER FIRST RESPONDER DIAGONAL SPLIT BANNER (Matches Video First Responder Tribute Section) -->
<section class="sp-first-responder-split">
  <div class="sp-fr-split-photo">
    <img src="<?= sp_img('first_responder_team_banner') ?>" alt="RescuePro Salutes Community First Responders">
  </div>
  <div class="sp-fr-split-copy">
    <h3>We Take Care of the People Who Take Care of People</h3>
    <p>When crisis strikes after hours, firefighters, paramedics, and emergency responders run toward hazard without hesitation—and RescuePro® crews arrive right behind incident command to board up breached structures, pump out sprinkler runoff, and protect residential neighborhoods.</p>
    <a href="<?= e(url('/why#community')) ?>" class="sp-chevron-btn">Explore First Responder Mission</a>
  </div>
</section>

<!-- RESIDENTIAL & COMMERCIAL RESTORATION SERVICES GRID -->
<section class="sp-section sp-section-alt">
  <div class="sp-container">
    <div class="sp-section-head">
      <span class="sp-badge sp-badge-green">Residential &amp; Commercial Mitigation</span>
      <h2>Complete Cleanup, Remediation &amp; Construction Services</h2>
      <p>Certified crews operate with calibrated psychrometric monitoring, containment controls, and seamless turn-key reconstruction.</p>
    </div>

    <div class="sp-grid-4">
      <?php foreach ($services as $srv): ?>
        <div class="sp-card">
          <img src="<?= $srv['card_image'] ?>" alt="<?= e($srv['short_title']) ?>" class="sp-card-img">
          <div class="sp-card-body">
            <span class="sp-badge sp-badge-orange" style="align-self:flex-start;"><?= e($srv['badge']) ?></span>
            <h3><?= e($srv['short_title']) ?></h3>
            <p><?= e($srv['summary']) ?></p>
            <a href="<?= e(url($srv['url'])) ?>" class="sp-read-more">Explore Service <span>&rsaquo;</span></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- DIAGONAL INSURANCE SPLIT BANNER -->
<section class="sp-insurance-split">
  <div class="sp-insurance-photo">
    <img src="<?= sp_img('insurance_consult') ?>" alt="RescuePro helps homeowners and property adjusters navigate claims">
  </div>
  <div class="sp-insurance-body">
    <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;">Preferred Vendor Network</span>
    <h2>RescuePro Helps with the Insurance Claim Process</h2>
    <p>
      Navigating sudden property damage is stressful enough without fighting scattered repair estimates. RescuePro coordinates directly with major residential and commercial insurance carriers nationwide.
    </p>
    <p>
      From day-one emergency mitigation photos and Xactimate line-item documentation to daily digital moisture readings, we help keep your property claim transparent from dispatch through completion.
    </p>
    <a href="<?= e(url('/insurance')) ?>" class="sp-chevron-btn" style="margin-top:8px;">Learn More</a>
  </div>
</section>

<!-- IN THE COMMUNITY: V-CHEVRON IMAGE MASK CARDS -->
<section class="sp-section">
  <div class="sp-container">
    <div class="sp-section-head">
      <span class="sp-badge sp-badge-orange">Coast-to-Coast Impact</span>
      <h2>RescuePro in the Community</h2>
      <p>How local franchise owners and corporate teams support families, first responders, and civic causes every month.</p>
    </div>

    <div class="sp-v-grid">
      <?php foreach ($communityStories as $story): ?>
        <article class="sp-v-card">
          <div class="sp-v-card-img-box">
            <img src="<?= $story['image'] ?>" alt="<?= e($story['title']) ?>">
          </div>
          <div class="sp-v-card-body">
            <h3><?= e($story['title']) ?></h3>
            <p class="sp-v-excerpt"><?= e($story['subtitle']) ?></p>
            <div class="sp-v-loc"><?= e($story['location']) ?></div>
            <a href="<?= e(url('/why#community')) ?>" class="sp-read-more">Read More <span>&rsaquo;</span></a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- INTERACTIVE MITIGATION & DRYING TIME ESTIMATOR -->
<section class="sp-section sp-section-alt">
  <div class="sp-container">
    <div class="sp-section-head">
      <h2>Structural Drying Time &amp; Equipment Sizing Estimator</h2>
      <p>Estimate baseline ANSI/IICRC S500 LGR dehumidifier deployment, high-velocity air mover counts, and expected drying duration prior to dispatch.</p>
    </div>
    <div class="sp-card sp-card-pad sp-calc-grid">
      <div class="sp-form">
        <div class="sp-form-row">
          <label for="calc-sqft">Affected Floor Area: <strong>{{ calcSqft.toLocaleString() }} sq. ft.</strong></label>
          <input id="calc-sqft" type="range" min="100" max="4000" step="50" v-model.number="calcSqft">
        </div>
        <div class="sp-form-row">
          <label>Water Contamination Category (IICRC S500)</label>
          <div class="sp-chip-row">
            <button type="button" class="sp-chip" :class="{active: calcCategory === 'Cat1'}" @click="calcCategory = 'Cat1'">Cat 1: Clean Supply Water</button>
            <button type="button" class="sp-chip" :class="{active: calcCategory === 'Cat2'}" @click="calcCategory = 'Cat2'">Cat 2: Grey Appliance Water</button>
            <button type="button" class="sp-chip" :class="{active: calcCategory === 'Cat3'}" @click="calcCategory = 'Cat3'">Cat 3: Sewage / Floodwater</button>
          </div>
        </div>
        <div class="sp-form-row">
          <label for="calc-mat">Primary Wet Surface Assembly</label>
          <select id="calc-mat" v-model="calcMaterial">
            <option value="Drywall & Carpet">Drywall Perimeter &amp; Broadloom Carpet</option>
            <option value="Solid Hardwood">Solid Oak / Engineered Hardwood Floor</option>
            <option value="Finished Basement Concrete">Basement Slab &amp; Cinderblock Wall</option>
          </select>
        </div>
      </div>
      <div class="sp-calc-readout">
        <div style="font-size:0.8rem;text-transform:uppercase;letter-spacing:1px;color:#A7F3D0;font-weight:800;">Estimated Mitigation Scope</div>
        <div class="sp-calc-big sp-mt-xs">{{ calcEstimate.costText }}</div>
        <div style="font-size:0.88rem;color:#E2E8F0;margin-top:4px;">Typical insured mitigation range before finish rebuild</div>
        <div class="sp-calc-metrics">
          <div class="sp-calc-metric-box">
            <strong>{{ calcEstimate.daysText }}</strong>
            <span>Target Dry Timeline</span>
          </div>
          <div class="sp-calc-metric-box">
            <strong>{{ calcEstimate.airMovers }} Units / {{ calcEstimate.dehumUnits }} LGR</strong>
            <span>Psychrometric Fleet Load</span>
          </div>
        </div>
        <div style="font-size:0.86rem;color:#D1FAE5;margin-bottom:14px;">
          <strong>Field Protocol:</strong> {{ calcEstimate.protocol }}
        </div>
        <a href="#request" class="sp-btn sp-btn-orange sp-btn-block">Lock In On-Site Thermal Assessment</a>
      </div>
    </div>
  </div>
</section>
<!-- 24/7 EMERGENCY DISPATCH REQUEST FORM -->
<section id="request" class="sp-section sp-section-dark">
  <div class="sp-container">
    <div class="sp-content-sidebar-grid" style="align-items:center;">
      <div>
        <span class="sp-badge sp-badge-orange">24/7 National Dispatch Routing</span>
        <h2 style="font-size:clamp(28px, 3vw, 36px); font-weight:300; color:#fff; margin:12px 0 14px;">
          Need Immediate Cleanup or Restoration?
        </h2>
        <p style="color:#CBD5E1; font-size:15.5px; line-height:1.68; margin:0 0 22px;">
          Submit your emergency intake below or call <strong style="color:#FF5A00;"><?= e(EMERGENCY_PHONE) ?></strong> anytime day or night. Our National Call Center routes your ticket immediately to the nearest certified RescuePro&reg; team.
        </p>

        <div style="display:grid; gap:14px; color:#E2E8F0; font-size:14.5px;">
          <div><i class="ph-bold ph-check-circle" style="color:#FF5A00;"></i> Over 2,410+ Locations Across the U.S. &amp; Canada</div>
          <div><i class="ph-bold ph-check-circle" style="color:#FF5A00;"></i> Faster to Any Size Disaster&trade; — 24/7 Live Dispatchers</div>
          <div><i class="ph-bold ph-check-circle" style="color:#FF5A00;"></i> Standardized Xactimate Estimates &amp; Moisture Logs</div>
          <div><i class="ph-bold ph-check-circle" style="color:#FF5A00;"></i> Full Mitigation-to-Reconstruction Under One Roof</div>
        </div>
      </div>

      <div class="sp-form-card" style="color:var(--sp-text);">
        <h3 style="margin:0 0 6px; font-size:21px; color:#22262A;">Request 24/7 Emergency Dispatch</h3>
        <p style="margin:0 0 18px; font-size:13.5px; color:var(--sp-muted);">Creates a verified dispatch ticket routed to local certified crews.</p>

        <form method="POST" action="<?= e(url('/request')) ?>">
          <?= csrf_field() ?>
          <div class="sp-grid-2" style="gap:14px;">
            <div class="sp-form-group">
              <label class="sp-label">Full Name *</label>
              <input type="text" name="full_name" class="sp-input" value="<?= old('full_name') ?>" placeholder="Jordan Miller" required>
            </div>
            <div class="sp-form-group">
              <label class="sp-label">Phone Number *</label>
              <input type="tel" name="phone" class="sp-input" value="<?= old('phone') ?>" placeholder="(615) 555-0190" required>
            </div>
          </div>

          <div class="sp-grid-2" style="gap:14px;">
            <div class="sp-form-group">
              <label class="sp-label">Email Address *</label>
              <input type="email" name="email" class="sp-input" value="<?= old('email') ?>" placeholder="jordan@example.com" required>
            </div>
            <div class="sp-form-group">
              <label class="sp-label">ZIP / Postal Code *</label>
              <input type="text" name="zip_code" class="sp-input" :value="activeFranchise ? activeFranchise.zip : '37066'" placeholder="37066" required>
            </div>
          </div>

          <div class="sp-grid-3" style="gap:14px;">
            <div class="sp-form-group">
              <label class="sp-label">Service Needed *</label>
              <select name="service_type" class="sp-select" required>
                <option value="Water Damage Restoration">Water Damage Restoration</option>
                <option value="Fire & Smoke Restoration">Fire &amp; Smoke Restoration</option>
                <option value="Mold Remediation">Mold Remediation</option>
                <option value="Storm & Disaster Recovery">Storm &amp; Disaster Recovery</option>
                <option value="Commercial Large Loss">Commercial Large Loss</option>
                <option value="Construction Services">Construction Services</option>
                <option value="Biohazard & Trauma Cleanup">Biohazard &amp; Trauma Cleanup</option>
                <option value="Specialty Cleaning & Pack-Out">Specialty Cleaning &amp; Pack-Out</option>
              </select>
            </div>
            <div class="sp-form-group">
              <label class="sp-label">Property Type</label>
              <select name="property_type" class="sp-select">
                <option value="Residential">Residential Home</option>
                <option value="Commercial">Commercial Facility</option>
                <option value="Multi-Family">Apartment / Multi-Family</option>
              </select>
            </div>
            <div class="sp-form-group">
              <label class="sp-label">Loss Category</label>
              <select name="water_category" class="sp-select">
                <option value="Category 1 (Clean Pipe)">Cat 1 (Clean Pipe)</option>
                <option value="Category 2 (Grey Water)">Cat 2 (Grey Water)</option>
                <option value="Category 3 (Black/Sewage)">Cat 3 (Black / Sewage)</option>
                <option value="Fire / Soot / Odor">Fire / Soot / Odor</option>
                <option value="N/A">Other / Assessment Needed</option>
              </select>
            </div>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Property Street Address *</label>
            <input type="text" name="address" class="sp-input" value="<?= old('address') ?>" placeholder="801 Industrial Blvd, Gallatin, TN" required>
          </div>

          <div class="sp-form-group">
            <label class="sp-label">Describe What Happened</label>
            <textarea name="details" class="sp-textarea" rows="3" placeholder="Burst upstairs pipe flooding hardwood kitchen floors, valve shut off..."><?= old('details') ?></textarea>
          </div>

          <button type="submit" class="sp-chevron-btn sp-chevron-lg" style="width:100%; justify-content:center;">
            Submit 24/7 Dispatch Request
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php
