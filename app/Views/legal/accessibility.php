<section class="sp-page-hero sp-hero-dark">
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url('/')) ?>">Home</a> <span>/</span> <span>Accessibility Statement</span>
    </nav>
    <h1>Digital Accessibility &amp; Inclusive Dispatch Commitment</h1>
    <p class="sp-lead">Ensuring every homeowner, facility manager, and insurance professional can request 24/7 emergency restoration help without barriers.</p>
  </div>
</section>

<section class="sp-section">
  <div class="sp-container sp-legal-layout">
    <aside class="sp-legal-toc">
      <div class="sp-toc-card">
        <h3>WCAG 2.1 Level AA</h3>
        <a href="#acc-standard">1. Technical Conformance</a>
        <a href="#acc-features">2. Assistive Engineering</a>
        <a href="#acc-emergency">3. Alternate 24/7 Channels</a>
        <a href="#acc-feedback">4. Remediation SLA</a>
      </div>
    </aside>

    <div class="sp-legal-body">
      <article id="acc-standard" class="sp-legal-block">
        <h2>1. Target Conformance Standard</h2>
        <p><?= e(COMPANY_LEGAL_NAME) ?> is committed to maintaining digital accessibility across the entire RescuePro® web application in alignment with the <strong>Web Content Accessibility Guidelines (WCAG) 2.1 Level AA</strong> published by the W3C Web Accessibility Initiative (WAI) and applicable Americans with Disabilities Act (ADA) Title III digital service standards.</p>
      </article>

      <article id="acc-features" class="sp-legal-block">
        <h2>2. Accessibility Engineering Implemented Across This Platform</h2>
        <div class="sp-grid-2 sp-mt-md">
          <div class="sp-card">
            <h3>Keyboard &amp; Focus Navigation</h3>
            <p>All mega-menus, service tabs, interactive mitigation calculators, FAQ accordions, and emergency intake modals are reachable via sequential keyboard navigation (<code>Tab</code>, <code>Shift+Tab</code>, <code>Enter</code>, and <code>Escape</code> to dismiss overlays).</p>
          </div>
          <div class="sp-card">
            <h3>Color Contrast &amp; Typography</h3>
            <p>Primary charcoal body typography (<code>#1D2025</code>) on white backgrounds maintains over 14:1 contrast, paired with crisp Plus Jakarta Sans &amp; Inter typography and scalable rem/clamp sizing up to 200% zoom without horizontal clipping.</p>
          </div>
          <div class="sp-card">
            <h3>Semantic Landmarks &amp; ARIA Labels</h3>
            <p>Pages use structured HTML5 landmarks (<code>&lt;header&gt;</code>, <code>&lt;nav&gt;</code>, <code>&lt;main&gt;</code>, <code>&lt;footer&gt;</code>), single logical <code>H1</code> hierarchy per view, explicit form <code>&lt;label&gt;</code> bindings, and descriptive <code>alt</code> attributes on restoration imagery.</p>
          </div>
          <div class="sp-card">
            <h3>Reduced Motion Respect</h3>
            <p>Interactive Vue transitions, hover zooms, and mega-menu animations remain subtle and responsive, preserving clear focus outlines for users navigating with screen magnifiers or switch devices.</p>
          </div>
        </div>
      </article>

      <article id="acc-emergency" class="sp-legal-block">
        <h2>3. Direct 24/7 Telephone &amp; Relay Dispatch Assistance</h2>
        <p>If an emergency restoration event occurs and any interactive web control creates an obstacle with your screen reader or assistive technology, live dispatch coordinators are available 24/7/365 at <strong><?= e(HOTLINE_PHONE) ?></strong> (compatible with telecommunications relay services and TDD/TTY systems) to log your ticket manually with zero delay.</p>
      </article>

      <article id="acc-feedback" class="sp-legal-block">
        <h2>4. Accessibility Feedback &amp; Two-Day Triage SLA</h2>
        <p>If you encounter an accessibility barrier on any route of the RescuePro® portal, please report the URL and assistive configuration through our <a href="<?= e(url('/contact')) ?>">Contact Support Form</a> or by writing to <?= e(CORPORATE_ADDRESS) ?>. Our digital engineering team triages and responds to all accessibility reports within two (2) business days.</p>
      </article>
    </div>
  </div>
</section>
