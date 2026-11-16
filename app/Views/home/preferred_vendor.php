<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <span>Insurance Preferred Vendor Program</span>
    </nav>
    <h1>National Carrier Preferred Vendor &amp; TPA Partnership</h1>
    <p class="sp-lead">Standardized IICRC mitigation protocols, <?= (float)SLA_CARRIER_COMPLIANCE ?>% Xactimate documentation compliance, and real-time job-file visibility trusted by leading property carriers.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container">
    <div class="sp-kpi-row">
      <div class="sp-kpi-card">
        <div class="sp-kpi-val"><?= (int)SLA_RESPONSE_MINS ?> Min</div>
        <div class="sp-kpi-lbl">Verified Claim Callback SLA</div>
      </div>
      <div class="sp-kpi-card">
        <div class="sp-kpi-val">&lt; 4 Hrs</div>
        <div class="sp-kpi-lbl">Emergency On-Site Mobilization</div>
      </div>
      <div class="sp-kpi-card">
        <div class="sp-kpi-val"><?= (float)SLA_CARRIER_COMPLIANCE ?>%</div>
        <div class="sp-kpi-lbl">Carrier Guideline Audit Score</div>
      </div>
      <div class="sp-kpi-card">
        <div class="sp-kpi-val">2,410+</div>
        <div class="sp-kpi-lbl">North American Dispatch Hubs</div>
      </div>
    </div>

    <div class="sp-grid-2 sp-mt-lg">
      <div class="sp-card">
        <h2>Why Carriers Assign Claims to RescuePro®</h2>
        <p>Indemnity control depends on speed of extraction, objective psychrometric stopping points, and transparent billing. Every RescuePro® territory operates under a unified national Quality Assurance Audit Charter.</p>
        <ul class="sp-check-list sp-mt-sm">
          <li><strong>Xactimate® Level-3 Standardized Scopes:</strong> Accurate regional pricing lists, line-item photo annotations, and 48-hour preliminary scope upload.</li>
          <li><strong>Objective Drying Verification:</strong> Daily hygrometer &amp; pin moisture readings uploaded until assemblies match baseline dry standards—preventing prolonged equipment billing.</li>
          <li><strong>Single-Source Turnkey Reconstruction:</strong> Eliminates handoff delays between mitigation teams and general contractors, shrinking temporary housing (ALE) spend.</li>
          <li><strong>Contents &amp; Pack-Out Traceability:</strong> Barcoded room-by-room inventory, ultrasonic cleaning, and climate-controlled vault storage.</li>
        </ul>
      </div>

      <div class="sp-card">
        <h2>Live Carrier Audit &amp; Xactimate Integration Feed</h2>
        <p class="sp-muted">Representative recent claim files audited against RescuePro® SLA milestones:</p>
        <div class="sp-table-wrap sp-mt-sm">
          <table class="sp-table">
            <thead>
              <tr>
                <th>Claim #</th>
                <th>Carrier / TPA</th>
                <th>Peril</th>
                <th>Audit Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach (array_slice($claims, 0, 5) as $cl): ?>
              <tr>
                <td><strong><?= e($cl['claim_number']) ?></strong></td>
                <td><?= e($cl['carrier']) ?></td>
                <td><?= e($cl['loss_type']) ?></td>
                <td><span class="sp-pill sp-pill-green"><?= e($cl['status']) ?></span></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="sp-mt-md sp-btn-row">
          <a href="<?= e(url('/insurance#ce-register')) ?>" class="sp-btn sp-btn-orange">Register for Adjuster CE Credits</a>
          <a href="<?= e(url('/contact')) ?>" class="sp-btn sp-btn-outline">Partner with National Accounts</a>
        </div>
      </div>
    </div>

    <?php if (!empty($courses)): ?>
    <div class="sp-card sp-mt-lg">
      <h2>Accredited Adjuster &amp; Agent Continuing Education (<?= count($courses) ?> Courses)</h2>
      <div class="sp-grid-3 sp-mt-md">
        <?php foreach (array_slice($courses, 0, 6) as $course): ?>
        <div class="sp-ce-mini-card">
          <span class="sp-tag-inline"><?= e($course['credits']) ?> Credits &middot; <?= e($course['format']) ?></span>
          <h4><?= e($course['title']) ?></h4>
          <p class="sp-muted"><?= e($course['summary'] ?? $course['desc'] ?? '') ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
