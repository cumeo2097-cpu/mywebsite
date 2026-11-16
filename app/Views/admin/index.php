<?php
$user = App\Core\Auth::user();
$totalReq = count($requests);
$activeReq = count(array_filter($requests, static fn($r) => !in_array($r['status'], ['Completed', 'Cancelled'], true)));
$catLossCount = count(array_filter($requests, static fn($r) => ($r['property_type'] ?? '') === 'Commercial'));
$completedCount = count(array_filter($requests, static fn($r) => $r['status'] === 'Completed'));
?>
<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <span>National Dispatch Admin Console</span>
    </nav>
    <h1>RescuePro® Operations Command &amp; Dispatch Console</h1>
    <p class="sp-lead">Authenticated Commander: <strong><?= e($user['name'] ?? 'National Dispatcher') ?></strong> &middot; Live triage, psychrometric tracking, fleet utilization &amp; Xactimate® claims monitoring.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container">
    <!-- Top Executive KPI Cards -->
    <div class="sp-kpi-row">
      <div class="sp-kpi-card">
        <div class="sp-kpi-val"><?= $activeReq ?> / <?= $totalReq ?></div>
        <div class="sp-kpi-lbl">Active Dispatch Queue</div>
      </div>
      <div class="sp-kpi-card" style="border-left-color:#16A34A;">
        <div class="sp-kpi-val"><?= count($fleetInventory) ?> Units</div>
        <div class="sp-kpi-lbl">Tracked CAT &amp; LGR Assets</div>
      </div>
      <div class="sp-kpi-card" style="border-left-color:#2563EB;">
        <div class="sp-kpi-val"><?= $catLossCount ?> Commercial</div>
        <div class="sp-kpi-lbl">Large Loss Priority Jobs</div>
      </div>
      <div class="sp-kpi-card" style="border-left-color:#0F172A;">
        <div class="sp-kpi-val"><?= (float)SLA_CARRIER_COMPLIANCE ?>%</div>
        <div class="sp-kpi-lbl">Xactimate® Audit Score (<?= $completedCount ?> Closed)</div>
      </div>
    </div>

    <!-- 6-Tab Navigation -->
    <div class="sp-tab-bar sp-mt-lg" role="tablist">
      <button type="button" class="sp-tab-btn" :class="{active: adminTab === 'dispatch'}" @click="adminTab = 'dispatch'">1. Live Dispatch Queue (<?= $totalReq ?>)</button>
      <button type="button" class="sp-tab-btn" :class="{active: adminTab === 'drying'}" @click="adminTab = 'drying'">2. Moisture &amp; Drying Logs</button>
      <button type="button" class="sp-tab-btn" :class="{active: adminTab === 'fleet'}" @click="adminTab = 'fleet'">3. Fleet &amp; Equipment</button>
      <button type="button" class="sp-tab-btn" :class="{active: adminTab === 'claims'}" @click="adminTab = 'claims'">4. Insurance &amp; Xactimate®</button>
      <button type="button" class="sp-tab-btn" :class="{active: adminTab === 'erp'}" @click="adminTab = 'erp'">5. Saved ERP Profiles (<?= count($erpProfiles) ?>)</button>
      <button type="button" class="sp-tab-btn" :class="{active: adminTab === 'inquiries'}" @click="adminTab = 'inquiries'">6. Franchise &amp; CE Rosters</button>
    </div>

    <!-- TAB 1: LIVE DISPATCH QUEUE -->
    <div v-show="adminTab === 'dispatch'">
      <div class="sp-card">
        <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;margin-bottom:16px;">
          <div>
            <h2 style="margin:0;">Active Emergency Triage &amp; Crew Assignment</h2>
            <p class="sp-muted" style="margin:4px 0 0;">Update job ticket workflow status or dispatch crew notes; customer portals sync automatically.</p>
          </div>
          <div class="sp-chip-row">
            <button type="button" class="sp-chip" :class="{active: adminStatusFilter === 'All'}" @click="adminStatusFilter = 'All'">All</button>
            <button type="button" class="sp-chip" :class="{active: adminStatusFilter === 'New'}" @click="adminStatusFilter = 'New'">New</button>
            <button type="button" class="sp-chip" :class="{active: adminStatusFilter === 'Dispatched'}" @click="adminStatusFilter = 'Dispatched'">Dispatched</button>
            <button type="button" class="sp-chip" :class="{active: adminStatusFilter === 'On-Site Drying'}" @click="adminStatusFilter = 'On-Site Drying'">On-Site Drying</button>
            <button type="button" class="sp-chip" :class="{active: adminStatusFilter === 'Completed'}" @click="adminStatusFilter = 'Completed'">Completed</button>
          </div>
        </div>

        <div class="sp-table-wrap">
          <table class="sp-table">
            <thead>
              <tr>
                <th>Ticket / Timestamp</th>
                <th>Property Owner &amp; Site</th>
                <th>Peril &amp; Classification</th>
                <th>Workflow Status</th>
                <th>Dispatch Action &amp; Crew Notes</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($requests as $req):
                $st = $req['status'] ?? 'New';
                $pillClass = match ($st) {
                    'Completed' => 'sp-pill-green',
                    'On-Site Drying' => 'sp-pill-blue',
                    'Dispatched' => 'sp-pill-orange',
                    'Cancelled' => 'sp-pill-red',
                    default => 'sp-pill-slate',
                };
              ?>
              <tr v-show="adminStatusFilter === 'All' || adminStatusFilter === <?= e(json_encode($st)) ?>">
                <td>
                  <strong><?= e($req['ticket_code']) ?></strong>
                  <div class="sp-muted" style="font-size:0.8rem;">ID #<?= (int)$req['id'] ?> &middot; <?= e($req['property_type']) ?></div>
                  <div class="sp-muted" style="font-size:0.78rem;"><?= e(substr((string)$req['created_at'], 0, 16)) ?></div>
                </td>
                <td>
                  <strong><?= e($req['full_name']) ?></strong>
                  <div style="font-size:0.84rem;"><?= e($req['phone']) ?> &middot; <?= e($req['email']) ?></div>
                  <div class="sp-muted" style="font-size:0.82rem;"><?= e($req['address']) ?> (ZIP <?= e($req['zip_code']) ?>)</div>
                </td>
                <td>
                  <strong><?= e($req['service_type']) ?></strong>
                  <div class="sp-tag-inline sp-mt-xs"><?= e($req['water_category']) ?></div>
                  <div class="sp-muted" style="font-size:0.8rem;margin-top:4px;max-width:260px;"><?= e($req['details']) ?></div>
                </td>
                <td>
                  <span class="sp-pill <?= e($pillClass) ?>"><?= e($st) ?></span>
                </td>
                <td style="min-width:280px;">
                  <form action="<?= e(url('/admin/update')) ?>" method="POST" class="sp-form" style="gap:8px;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= (int)$req['id'] ?>">
                    <select name="status" class="sp-select" style="padding:7px 10px;font-size:0.84rem;">
                      <?php foreach (['New', 'Dispatched', 'On-Site Drying', 'Completed', 'Cancelled'] as $opt): ?>
                      <option value="<?= e($opt) ?>" <?= $st === $opt ? 'selected' : '' ?>><?= e($opt) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <input type="text" name="admin_notes" class="sp-input" style="padding:7px 10px;font-size:0.82rem;" value="<?= e($req['admin_notes'] ?? '') ?>" placeholder="Update crew notes / moisture targets...">
                    <button type="submit" class="sp-btn sp-btn-green" style="padding:7px 12px;font-size:0.82rem;">Save Ticket Update</button>
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB 2: PSYCHROMETRIC & MOISTURE LOGS -->
    <div v-show="adminTab === 'drying'" v-cloak>
      <div class="sp-card">
        <h2>Psychrometric &amp; Structural Moisture Drying Telemetry</h2>
        <p class="sp-muted">Daily Grains Per Pound (GPP), Relative Humidity (RH), and pin wood moisture readings vs. IICRC S500 dry goal baselines.</p>
        <div class="sp-table-wrap sp-mt-md">
          <table class="sp-table">
            <thead>
              <tr>
                <th>Ticket</th>
                <th>Monitoring Cycle</th>
                <th>Affected Room</th>
                <th>Room Temp / RH / GPP</th>
                <th>Wood MC% vs Goal</th>
                <th>Equipment &amp; Tech</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($psychrometricLogs as $log):
                $mc = (float)$log['wood_mc'];
                $goal = (float)$log['dry_goal'];
                $pct = max(8, min(100, (int)round(($goal / max($mc, 1)) * 100)));
              ?>
              <tr>
                <td><strong><?= e($log['ticket_code']) ?></strong></td>
                <td><?= e($log['day']) ?><div class="sp-muted" style="font-size:0.78rem;"><?= e($log['date']) ?></div></td>
                <td><strong><?= e($log['room']) ?></strong></td>
                <td><?= (int)$log['temp_f'] ?>&deg;F &middot; <?= (int)$log['rh_pct'] ?>% RH &middot; <strong><?= (int)$log['gpp'] ?> GPP</strong></td>
                <td style="min-width:170px;">
                  <div><strong><?= e((string)$mc) ?>%</strong> &rarr; Goal <?= e((string)$goal) ?>%</div>
                  <div class="sp-mc-meter"><div class="sp-mc-fill" style="width:<?= $pct ?>%;"></div></div>
                </td>
                <td>
                  <div style="font-size:0.85rem;font-weight:700;"><?= e($log['equipment']) ?></div>
                  <div class="sp-muted" style="font-size:0.78rem;"><?= e($log['tech']) ?> &middot; <span class="sp-pill sp-pill-blue"><?= e($log['status']) ?></span></div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB 3: FLEET & EQUIPMENT -->
    <div v-show="adminTab === 'fleet'" v-cloak>
      <div class="sp-card">
        <h2>National Drying Equipment &amp; Fleet Inventory</h2>
        <div class="sp-table-wrap sp-mt-md">
          <table class="sp-table">
            <thead>
              <tr>
                <th>Asset Tag</th>
                <th>Equipment Class &amp; Model</th>
                <th>Assigned Territory Hub</th>
                <th>Ticket Binding</th>
                <th>Utilization</th>
                <th>Readiness Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($fleetInventory as $unit): ?>
              <tr>
                <td><strong><?= e($unit['unit_id']) ?></strong></td>
                <td><strong><?= e($unit['category']) ?></strong><div class="sp-muted" style="font-size:0.82rem;"><?= e($unit['model']) ?></div></td>
                <td><?= e($unit['territory']) ?></td>
                <td><strong><?= e($unit['assigned_ticket']) ?></strong></td>
                <td style="min-width:140px;">
                  <div><?= (int)$unit['utilization_pct'] ?>% Runtime Health</div>
                  <div class="sp-mc-meter"><div class="sp-mc-fill" style="width:<?= (int)$unit['utilization_pct'] ?>%;"></div></div>
                </td>
                <td><span class="sp-pill sp-pill-green"><?= e($unit['status']) ?></span><div class="sp-muted" style="font-size:0.76rem;">Cal: <?= e($unit['last_calibrated']) ?></div></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB 4: INSURANCE CLAIMS -->
    <div v-show="adminTab === 'claims'" v-cloak>
      <div class="sp-card">
        <h2>Insurance Carrier Xactimate® Files &amp; QA Audits</h2>
        <div class="sp-table-wrap sp-mt-md">
          <table class="sp-table">
            <thead>
              <tr>
                <th>Claim #</th>
                <th>Ticket</th>
                <th>Carrier &amp; Adjuster</th>
                <th>Peril Type</th>
                <th>Xactimate® Scope Status</th>
                <th>QA Audit &amp; State</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($insuranceClaims as $cl): ?>
              <tr>
                <td><strong><?= e($cl['claim_number']) ?></strong></td>
                <td><?= e($cl['ticket_code']) ?></td>
                <td><strong><?= e($cl['carrier']) ?></strong><div class="sp-muted" style="font-size:0.8rem;">Adj: <?= e($cl['adjuster']) ?></div></td>
                <td><?= e($cl['loss_type']) ?></td>
                <td><strong><?= e($cl['xactimate_status']) ?></strong></td>
                <td><span class="sp-pill sp-pill-green"><?= e($cl['audit_score']) ?></span> <span class="sp-pill sp-pill-orange"><?= e($cl['status']) ?></span></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB 5: ERP PROFILES -->
    <div v-show="adminTab === 'erp'" v-cloak>
      <div class="sp-card">
        <h2>Registered Emergency Ready Profiles (<?= count($erpProfiles) ?> Facilities)</h2>
        <div class="sp-table-wrap sp-mt-md">
          <table class="sp-table">
            <thead>
              <tr>
                <th>Facility Name &amp; Type</th>
                <th>Street Address</th>
                <th>Main Water Shutoff</th>
                <th>Electric Panel &amp; Gas</th>
                <th>Emergency Contact</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($erpProfiles as $erp): ?>
              <tr>
                <td><strong><?= e($erp['facility_name']) ?></strong><div><span class="sp-tag-inline"><?= e($erp['facility_type']) ?></span></div></td>
                <td><?= e($erp['address']) ?></td>
                <td><?= e($erp['water_shutoff']) ?></td>
                <td><div><?= e($erp['electric_panel']) ?></div><div class="sp-muted" style="font-size:0.8rem;"><?= e($erp['gas_shutoff']) ?></div></td>
                <td><?= e($erp['emergency_contact']) ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- TAB 6: FRANCHISE & CE -->
    <div v-show="adminTab === 'inquiries'" v-cloak>
      <div class="sp-grid-2">
        <div class="sp-card">
          <h3>Franchise Ownership Inquiries (<?= count($franchiseInquiries) ?>)</h3>
          <div class="sp-table-wrap sp-mt-sm">
            <table class="sp-table">
              <thead><tr><th>Candidate</th><th>Territory</th><th>Capital</th></tr></thead>
              <tbody>
                <?php if (empty($franchiseInquiries)): ?>
                <tr><td colspan="3" class="sp-muted">No new franchise inquiries queued in this session yet.</td></tr>
                <?php else: foreach ($franchiseInquiries as $fi): ?>
                <tr>
                  <td><strong><?= e($fi['full_name']) ?></strong><div class="sp-muted" style="font-size:0.8rem;"><?= e($fi['email']) ?> &middot; <?= e($fi['phone']) ?></div></td>
                  <td><?= e($fi['territory_state']) ?></td>
                  <td><span class="sp-pill sp-pill-green"><?= e($fi['liquid_capital']) ?></span></td>
                </tr>
                <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="sp-card">
          <h3>Insurance CE Class Registrations (<?= count($ceRegistrations) ?>)</h3>
          <div class="sp-table-wrap sp-mt-sm">
            <table class="sp-table">
              <thead><tr><th>Attendee</th><th>Agency / License</th><th>Course</th></tr></thead>
              <tbody>
                <?php if (empty($ceRegistrations)): ?>
                <tr><td colspan="3" class="sp-muted">No new CE registrations recorded in this session yet.</td></tr>
                <?php else: foreach ($ceRegistrations as $ce): ?>
                <tr>
                  <td><strong><?= e($ce['full_name']) ?></strong><div class="sp-muted" style="font-size:0.8rem;"><?= e($ce['email']) ?></div></td>
                  <td><?= e($ce['agency_name']) ?><div class="sp-muted" style="font-size:0.78rem;">Lic: <?= e($ce['license_number']) ?></div></td>
                  <td><strong><?= e($ce['course_title']) ?></strong></td>
                </tr>
                <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
