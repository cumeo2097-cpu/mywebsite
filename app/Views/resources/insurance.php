<!-- INSURANCE CLAIM PROCESS & CONTINUING EDUCATION (CE) -->
<section class="sp-subhero">
  <div class="sp-container">
    <div class="sp-subhero-grid">
      <div>
        <span class="sp-badge sp-badge-orange" style="margin-bottom:10px;">Insurance Carriers, Adjusters &amp; Policyholders</span>
        <h1>Insurance Claim Assistance &amp; Accredited Continuing Education</h1>
        <p class="sp-subhero-lead">
          RescuePro&reg; partners seamlessly with insurance carriers, agents, and adjusters nationwide—providing standardized Xactimate scoping, timestamped moisture logs, and state-approved CE courses.
        </p>
        <div style="display:flex; gap:14px; flex-wrap:wrap; align-items:center;">
          <a href="#ce-register" class="sp-chevron-btn">Register for CE Course</a>
          <a href="#moisture-log" class="sp-btn sp-btn-outline">View Moisture Log Sample</a>
        </div>
      </div>

      <div class="sp-subhero-img-wrap">
        <div class="sp-subhero-dots" aria-hidden="true"></div>
        <img src="<?= sp_img('insurance_consult') ?>" alt="RescuePro insurance claim coordination and documentation">
      </div>
    </div>
  </div>
</section>

<!-- DIAGONAL INSURANCE WORKFLOW SPLIT -->
<section class="sp-insurance-split">
  <div class="sp-insurance-photo">
    <img src="<?= sp_img('water_hardwood_clean') ?>" alt="Moisture meter documentation for claim substantiation">
  </div>
  <div class="sp-insurance-body">
    <span class="sp-badge sp-badge-green" style="margin-bottom:10px;">Transparent Carrier Compliance</span>
    <h2>How RescuePro Streamlines Your Claim File</h2>
    <p>
      From initial first notice of loss (FNOL) to final clearance certificate, RescuePro technicians capture pre-loss and post-mitigation photographs, daily temperature/humidity psychrometric readings, and Xactimate line items.
    </p>
    <p>
      Standardized reporting reduces adjuster site delays and helps homeowners restore damaged rooms rapidly without surprise administrative bottlenecks.
    </p>
    <a href="<?= e(url('/#request')) ?>" class="sp-chevron-btn">Request Emergency Dispatch</a>
  </div>
</section>

<!-- SAMPLE PSYCHROMETRIC MOISTURE DRYING LOG -->
<section id="moisture-log" class="sp-section sp-section-alt">
  <div class="sp-container">
    <div class="sp-section-head">
      <span class="sp-badge sp-badge-orange">IICRC S500 Claim Substantiation</span>
      <h2>Sample Daily Psychrometric &amp; Structural Moisture Log</h2>
      <p>Every water mitigation file documents calibrated Ambient Humidity, Grains Per Pound (GPP), and material Moisture Content (MC) until dry standards are proven.</p>
    </div>

    <div class="sp-table-wrap">
      <table class="sp-table">
        <thead>
          <tr>
            <th>Drying Day</th>
            <th>Ambient Temp / RH</th>
            <th>Specific Humidity (GPP)</th>
            <th>Subfloor MC% (Goal &le; 12%)</th>
            <th>Equipment Active</th>
            <th>Verification Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Day 1 — Initial Intake</strong></td>
            <td>74&deg;F / 68% RH</td>
            <td>86 GPP</td>
            <td>28.4% MC (Saturated)</td>
            <td>2 LGR Dehumidifiers + 8 Air Movers</td>
            <td><span class="sp-status-pill st-Dispatched">Mitigation Active</span></td>
          </tr>
          <tr>
            <td><strong>Day 2 — Psychrometric Check</strong></td>
            <td>78&deg;F / 46% RH</td>
            <td>66 GPP</td>
            <td>19.1% MC (Drying)</td>
            <td>2 LGR Dehumidifiers + 8 Air Movers</td>
            <td><span class="sp-status-pill st-On-Site">On-Site Drying</span></td>
          </tr>
          <tr>
            <td><strong>Day 3 — Vapor Equilibrium</strong></td>
            <td>76&deg;F / 37% RH</td>
            <td>50 GPP</td>
            <td>13.6% MC (Approaching Target)</td>
            <td>1 LGR Dehumidifier + 6 Air Movers</td>
            <td><span class="sp-status-pill st-On-Site">Monitored</span></td>
          </tr>
          <tr>
            <td><strong>Day 4 — Final Clearance</strong></td>
            <td>73&deg;F / 35% RH</td>
            <td>43 GPP</td>
            <td>10.8% MC (Dry Goal Verified)</td>
            <td>Equipment Removed &amp; Sanitized</td>
            <td><span class="sp-status-pill st-Completed">Completed &amp; Logged</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- CE COURSES + REGISTRATION FORM -->
<section id="ce-register" class="sp-section">
  <div class="sp-container">
    <div class="sp-section-head">
      <span class="sp-badge sp-badge-orange">For Agents, Adjusters &amp; Brokers</span>
      <h2>State-Approved Continuing Education (CE) Courses</h2>
      <p>Complimentary technical restoration training hosted live or virtually by RescuePro&reg; National Training instructors.</p>
    </div>

    <div class="sp-grid-2" style="margin-bottom:44px;">
      <?php foreach ($courses as $c): ?>
        <div class="sp-card">
          <div class="sp-card-body">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:6px;">
              <span class="sp-badge sp-badge-orange"><?= e($c['code']) ?></span>
              <span class="sp-badge sp-badge-green"><?= e($c['credits']) ?></span>
            </div>
            <h3><?= e($c['title']) ?></h3>
            <p><?= e($c['desc']) ?></p>
            <div style="font-size:12.5px; font-weight:700; color:#22262A;">Format: <?= e($c['format']) ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="sp-form-card" style="max-width:760px; margin:0 auto;">
      <h3 style="margin:0 0 6px; font-size:22px; color:#22262A;">Reserve Your Continuing Education Seat</h3>
      <p style="margin:0 0 18px; font-size:13.5px; color:var(--sp-muted);">Enter your licensing details so CE credit Roster certificates can be filed promptly after attendance.</p>

      <form method="POST" action="<?= e(url('/ce-register')) ?>">
        <?= csrf_field() ?>
        <div class="sp-grid-2" style="gap:14px;">
          <div class="sp-form-group">
            <label class="sp-label">Full Name *</label>
            <input type="text" name="full_name" class="sp-input" required placeholder="Taylor Brooks">
          </div>
          <div class="sp-form-group">
            <label class="sp-label">Work Email *</label>
            <input type="email" name="email" class="sp-input" required placeholder="t.brooks@carrier.com">
          </div>
        </div>
        <div class="sp-grid-2" style="gap:14px;">
          <div class="sp-form-group">
            <label class="sp-label">Insurance Carrier / Agency</label>
            <input type="text" name="agency_name" class="sp-input" placeholder="National Property Claims Group">
          </div>
          <div class="sp-form-group">
            <label class="sp-label">Adjuster / Agent License #</label>
            <input type="text" name="license_number" class="sp-input" placeholder="TN-884120">
          </div>
        </div>
        <div class="sp-form-group">
          <label class="sp-label">Select CE Course *</label>
          <select name="course_title" class="sp-select" required>
            <?php foreach ($courses as $c): ?>
              <option value="<?= e($c['title']) ?>"><?= e($c['code'] . ' — ' . $c['title'] . ' (' . $c['credits'] . ')') ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="sp-chevron-btn sp-chevron-lg">Confirm Seat Registration</button>
      </form>
    </div>
  </div>
</section>

<?php
