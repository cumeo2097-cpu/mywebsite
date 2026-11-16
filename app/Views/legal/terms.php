<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <span>Terms of Service</span>
    </nav>
    <h1>Terms of Service &amp; Restoration Authorization Standards</h1>
    <p class="sp-lead">Effective January 1, 2026 &middot; Governing digital portal access, 24/7 emergency dispatch requests, and independently owned RescuePro® franchise operations nationwide.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container sp-legal-layout">
    <aside class="sp-legal-toc">
      <div class="sp-toc-card">
        <h3>Document Sections</h3>
        <a href="#sec-acceptance">1. Acceptance &amp; Scope</a>
        <a href="#sec-franchise">2. Franchise Ownership Model</a>
        <a href="#sec-dispatch">3. 24/7 Dispatch &amp; Stabilization</a>
        <a href="#sec-iicrc">4. IICRC S500 / S520 / S700 Standards</a>
        <a href="#sec-insurance">5. Insurance Billing &amp; Xactimate</a>
        <a href="#sec-warranty">6. Limited Workmanship Warranty</a>
        <a href="#sec-liability">7. Limitation of Liability</a>
        <a href="#sec-contact">8. Legal &amp; Compliance Desk</a>
      </div>
    </aside>

    <div class="sp-legal-body">
      <article id="sec-acceptance" class="sp-legal-block">
        <h2>1. Acceptance of Terms &amp; Platform Scope</h2>
        <p>By accessing the <strong>RescuePro®</strong> digital restoration portal, submitting an emergency dispatch ticket, creating an Emergency Ready Profile (ERP), or authenticating into a residential or commercial customer account, you agree to be bound by these Terms of Service and our <a href="<?= e(url('/privacy-policy')) ?>">Privacy Policy</a>. These terms govern online scheduling, dry-log tracking, and informational guidance prior to the execution of a site-specific Work Authorization agreement.</p>
        <p>Online dispatch submissions establish a priority routing request to the nearest available territory office. Formal mitigation work begins only after an on-site crew chief completes an initial moisture mapping inspection and obtains physical or electronic signature on a Franchise Work Authorization &amp; Scope Acknowledgment.</p>
      </article>

      <article id="sec-franchise" class="sp-legal-block">
        <h2>2. Independent Franchise Ownership Notice</h2>
        <p>Each <strong>RescuePro®</strong> franchise location is independently owned and operated under license from <?= e(COMPANY_LEGAL_NAME) ?> (Corporate Support Center: <?= e(CORPORATE_ADDRESS) ?>). While all franchisees adhere to uniform IICRC training protocols, standardized Xactimate invoicing practices, and National Response SLA benchmarks, each franchisee retains direct legal responsibility for job-site personnel, municipal licensing, general liability insurance, and physical contracting on your property.</p>
      </article>

      <article id="sec-dispatch" class="sp-legal-block">
        <h2>3. 24/7 Emergency Dispatch &amp; Site Access Requirements</h2>
        <p>When you trigger an emergency dispatch ticket via our web portal or 24/7 National Dispatch Line (<?= e(HOTLINE_PHONE) ?>), RescuePro® assigns the ticket based on property ZIP code, loss severity, and nearest fleet telemetry unit:</p>
        <ul class="sp-check-list">
          <li><strong>Callback Window:</strong> Local crew chief contact within <?= (int)SLA_RESPONSE_MINS ?> minutes of verified ticket intake.</li>
          <li><strong>Safe Property Access:</strong> Property owners or authorized facility managers must ensure safe utility isolation (electrical breaker lockouts, active gas shutoff where needed) prior to deep structural extraction.</li>
          <li><strong>Biohazard &amp; Asbestos Screening:</strong> Buildings constructed prior to 1980 may require accredited third-party asbestos or lead sampling before invasive demolition (flood cuts, subfloor removal) proceeds.</li>
        </ul>
      </article>

      <article id="sec-iicrc" class="sp-legal-block">
        <h2>4. IICRC Technical Compliance &amp; Drying Verification</h2>
        <p>All water damage mitigation, mold remediation, fire &amp; soot cleaning, and trauma decontamination services performed across the RescuePro® network follow current revisions of ANSI/IICRC technical reference standards: <strong>S500</strong> (Water Damage Restoration), <strong>S520</strong> (Mold Remediation), and <strong>S700</strong> (Fire and Smoke Damage Restoration).</p>
        <p>Dehumidifiers, HEPA air scrubbers, and high-velocity air movers remain positioned on site until daily pin and pinless moisture readings achieve verified dry-standard equilibrium relative to unaffected structural materials in the property.</p>
      </article>

      <article id="sec-insurance" class="sp-legal-block">
        <h2>5. Insurance Claim Documentation &amp; Xactimate Estimating</h2>
        <p>RescuePro® works collaboratively with major property &amp; casualty insurance carriers and maintains <strong><?= (float)SLA_CARRIER_COMPLIANCE ?>%</strong> carrier documentation compliance. Line-item scopes are prepared in Xactimate® using current regional pricing databases, supported by daily psychrometric logs (temperature, relative humidity, GPP grains per pound), thermal imaging photos, and equipment runtime manifests.</p>
        <p>Insurance coverage determinations, deductible obligations, and policy sub-limits remain strictly between the policyholder and the issuing insurance carrier. Policyholders remain responsible for policy deductibles and any non-covered upgrades or betterment selections.</p>
      </article>

      <article id="sec-warranty" class="sp-legal-block">
        <h2>6. Limited Workmanship Warranty &amp; Customer Portal Records</h2>
        <p>Completed structural mitigation and licensed reconstruction projects include a standard <strong>12-month limited workmanship warranty</strong> from the date of Certificate of Satisfaction signature, provided property environmental conditions remain within normal HVAC humidity ranges and third-party plumbing or roof failures do not re-wet repaired assemblies.</p>
      </article>

      <article id="sec-liability" class="sp-legal-block">
        <h2>7. Limitation of Digital Portal Liability &amp; Governing Law</h2>
        <p>Educational guides, DIY mitigation calculators, and troubleshooting timelines published in the RescuePro® Resource Center provide general best-practice guidance and do not replace on-site engineering, medical, or hazardous material evaluations. To the maximum extent permitted by applicable law, these terms are governed by the laws of the State of Tennessee without regard to conflict-of-law principles.</p>
      </article>

      <article id="sec-contact" class="sp-legal-block">
        <h2>8. Legal Notices &amp; Compliance Inquiries</h2>
        <p>Written compliance inquiries, copyright notifications, or subpoena service regarding corporate digital systems should be addressed to <?= e(COMPANY_LEGAL_NAME) ?>, Attn: Legal &amp; Compliance Office, <?= e(CORPORATE_ADDRESS) ?>, or submitted directly via our <a href="<?= e(url('/contact')) ?>">National Support Contact Desk</a>.</p>
      </article>
    </div>
  </div>
</section>
