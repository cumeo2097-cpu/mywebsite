<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <span>Privacy Policy</span>
    </nav>
    <h1>Privacy Policy &amp; Property Telemetry Data Protection</h1>
    <p class="sp-lead">Last Updated January 2026 &middot; How RescuePro® safeguards property owner identities, emergency dispatch records, psychrometric moisture logs, and insurance claim documentation.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container sp-legal-layout">
    <aside class="sp-legal-toc">
      <div class="sp-toc-card">
        <h3>Privacy Controls</h3>
        <a href="#priv-collect">1. Information We Collect</a>
        <a href="#priv-use">2. Operational Dispatch Use</a>
        <a href="#priv-sharing">3. Carriers &amp; Franchise Routing</a>
        <a href="#priv-security">4. Portal Security &amp; Sessions</a>
        <a href="#priv-retention">5. Record Retention Schedule</a>
        <a href="#priv-rights">6. Consumer Privacy Rights</a>
      </div>
    </aside>

    <div class="sp-legal-body">
      <article id="priv-collect" class="sp-legal-block">
        <h2>1. Categories of Information Collected</h2>
        <p>RescuePro® collects only the operational, contact, and technical inspection data required to dispatch certified restoration crews, document insurance claims, and maintain facility readiness plans:</p>
        <ul class="sp-check-list">
          <li><strong>Dispatch &amp; Identity Details:</strong> Full name, email address, phone number, property street address, ZIP code, and property classification (Residential or Commercial).</li>
          <li><strong>Loss &amp; Facility Telemetry:</strong> Affected square footage, water contamination category, utility shutoff valve locations (via Emergency Ready Plans), and daily room-by-room relative humidity and moisture percentages.</li>
          <li><strong>Continuing Education &amp; Franchise Records:</strong> Insurance adjuster license numbers, brokerage affiliations, and prospective franchise territory preferences submitted voluntarily through our forms.</li>
        </ul>
      </article>

      <article id="priv-use" class="sp-legal-block">
        <h2>2. How Operational Data Is Processed</h2>
        <p>Submitted information is routed to execute emergency dispatch requests, display real-time drying stage status inside your authenticated Customer Portal, generate Xactimate-compatible moisture documentation, and verify Continuing Education (CE) credits for insurance professionals.</p>
        <p>RescuePro® does <strong>not</strong> sell personal contact data or property loss histories to unrelated third-party data brokers or external telemarketers.</p>
      </article>

      <article id="priv-sharing" class="sp-legal-block">
        <h2>3. Controlled Sharing with Franchisees &amp; Insurance Adjusters</h2>
        <p>To deliver localized 24/7 physical mitigation, dispatch details are shared with the assigned independent RescuePro® franchise serving your territory ZIP code. When authorized by the property owner, dry-standard certificates, thermal moisture maps, and equipment runtime logs are transmitted securely to your designated insurance carrier claims adjuster.</p>
      </article>

      <article id="priv-security" class="sp-legal-block">
        <h2>4. Authentication, CSRF Defense &amp; Cookie Architecture</h2>
        <p>Every interactive form inside the RescuePro® platform utilizes cryptographically random anti-forgery tokens (CSRF validation), strict server-side input sanitization, prepared SQL statements, and <code>HttpOnly</code> + <code>SameSite=Lax</code> session cookies. Authenticated customer portals enforce strict role-based isolation so residential homeowners only view tickets and ERP profiles bound to their verified email and account ID.</p>
      </article>

      <article id="priv-retention" class="sp-legal-block">
        <h2>5. Restoration Record Retention Policy</h2>
        <p>Because property insurance audits, structural warranty verifications, and state licensing regulations frequently reference historical mitigation documentation, verified moisture logs and completion records are archived securely for seven (7) years following project sign-off unless earlier statutory deletion is mandated.</p>
      </article>

      <article id="priv-rights" class="sp-legal-block">
        <h2>6. State Privacy Rights &amp; Data Access Requests</h2>
        <p>Residents of California (CCPA/CPRA), Virginia, Colorado, Texas, and other applicable jurisdictions may request access to, correction of, or deletion of personal contact records stored in our national portal. Submit verified privacy requests via our <a href="<?= e(url('/contact')) ?>">Contact Support Center</a> or call <?= e(HOTLINE_PHONE) ?>.</p>
      </article>
    </div>
  </div>
</section>
