<?php
$vuePayload = [
    'baseUrl' => BASE_URL,
    'megaMenus' => \App\Models\CatalogData::megaMenus(),
    'franchises' => \App\Models\CatalogData::franchises(),
    'services' => array_values(\App\Models\CatalogData::services()),
    'articles' => \App\Models\CatalogData::articles(),
    'glossary' => \App\Models\CatalogData::glossaryTerms(),
    'globalFaqs' => \App\Models\CatalogData::globalFaqs(),
    'jobs' => \App\Models\CatalogData::jobs(),
    'serviceFaqs' => isset($service['faqs']) && is_array($service['faqs']) ? $service['faqs'] : [],
    'serviceSteps' => isset($service['steps']) && is_array($service['steps']) ? $service['steps'] : [],
    'initialResourceTab' => $initialTab ?? 'articles',
    'initialResourceCat' => $initialCat ?? 'All',
];
$jsonFlags = JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;
?>
<script>
window.__SP_APP_DATA__ = <?= json_encode($vuePayload, $jsonFlags) ?>;

const { createApp } = Vue;

const app = createApp({
  data() {
    const boot = window.__SP_APP_DATA__ || {};
    return {
      // Navigation & 3-Column Hover Mega Menu
      activeMenu: null,
      activeMegaCatIdx: 0,
      mobileNavOpen: false,
      searchModalOpen: false,
      globalSearchQuery: '',

      // Hydrated catalogs
      megaMenus: boot.megaMenus || {},
      franchises: boot.franchises || [],
      services: boot.services || [],
      articles: boot.articles || [],
      glossary: boot.glossary || {},
      globalFaqs: boot.globalFaqs || [],
      jobs: boot.jobs || [],
      serviceSteps: boot.serviceSteps || [],
      serviceFaqs: boot.serviceFaqs || [],

      // Location Picker & Modal
      locationModalOpen: false,
      zipInput: '',
      activeFranchise: (boot.franchises && boot.franchises[0]) ? boot.franchises[0] : null,
      zipNotice: '',

      // Dark Slate Multi-Step Carousel (shows 3 columns at a time)
      slateOffset: 0,
      commercialPhase: 'pre',
      prePhaseSteps: [
        { num: '1', title: 'Site Assessment & Safety Planning', desc: 'Project estimators inspect structural integrity, mechanical penetrations, and OSHA containment boundaries alongside facility managers.' },
        { num: '2', title: 'Xactimate Scoping & Code Review', desc: 'Transparent line-item reconstruction scopes identify municipal code upgrades, structural engineering approvals, and insurance carrier documentation.' },
        { num: '3', title: 'Trade Scheduling & Permitting', desc: 'Coordinated permit submissions, material procurement, and phased off-hours contractor scheduling minimize operational interruption.' },
      ],
      constPhaseSteps: [
        { num: '1', title: 'Selective Demolition & Containment', desc: 'Negative-pressure dust barriers isolate active commercial business corridors during interior demolition and debris haul-out.' },
        { num: '2', title: 'Structural Framing, MEP & Envelope', desc: 'Licensed electricians, plumbers, HVAC mechanical technicians, and roofing crews execute rough-ins and building dry-in.' },
        { num: '3', title: 'Finishes & Final Sign-Off', desc: 'Drywall texture, acoustical ceilings, flooring, millwork, and final fire marshal walkthrough restore full business operations.' },
      ],

      // FAQ Accordions
      openFaqIndex: 0,
      globalFaqCat: 'All',

      // Resources Hub (Articles | FAQ | Glossary)
      resourceTab: boot.initialResourceTab || 'articles',
      articleCategory: boot.initialResourceCat || 'All',
      articleSearch: '',
      activeArticle: null,
      activeGlossaryLetter: 'all',

      // Commercial ERP Interactive Builder
      erpForm: {
        facility_name: 'Sumner Regional Medical Pavilion',
        facility_type: 'Healthcare Facility',
        address: '801 Industrial Blvd, Gallatin, TN 37066',
        water_shutoff: 'Basement Mechanical Room B1 — Red Main Gate Valve',
        electric_panel: 'East Corridor Utility Closet #2 (Main 800A Breaker)',
        gas_shutoff: 'Exterior North Loading Dock — Yellow Meter Valve',
        emergency_contact: 'Alex Mercer (Facilities Director) — (615) 555-0148'
      },

      // Careers Filter & Apply Modal
      careerTrack: 'all',
      careerSearch: '',
      activeJob: null,
      jobApplicantName: '',
      jobApplicantEmail: '',
      jobApplicationSent: false,

      // Franchise Capital Estimator
      capitalTier: '300k',

      // Admin Console Live Filter
      adminTab: 'dispatch',
      portalTab: 'tracker',
      portalNotifyEmail: true,
      portalNotifySms: true,
      selectedTicketCode: 'RP-2026-1001',
      faqQuery: '',
      activeFaqCat: 'All',
      openFaqKeys: {},
      calcSqft: 650,
      calcCategory: 'Cat1',
      calcMaterial: 'Drywall & Carpet',
      adminStatusFilter: 'All',
      adminSearch: '',

      // Auth Quick Fill
      loginEmail: '',
      loginPassword: ''
    };
  },
  computed: {
    currentMegaList() {
      if (!this.activeMenu || !this.megaMenus[this.activeMenu]) return [];
      return this.megaMenus[this.activeMenu];
    },
    currentMegaCat() {
      const list = this.currentMegaList;
      return list[this.activeMegaCatIdx] || list[0] || null;
    },
    visibleSlateSteps() {
      const total = this.serviceSteps.length;
      if (total <= 3) return this.serviceSteps;
      const start = Math.min(this.slateOffset, total - 3);
      return this.serviceSteps.slice(start, start + 3);
    },
    slatePageCount() {
      return Math.max(1, Math.ceil(this.serviceSteps.length - 2));
    },
    activeCommercialSteps() {
      return this.commercialPhase === 'pre' ? this.prePhaseSteps : this.constPhaseSteps;
    },
    globalSearchResults() {
      const q = this.globalSearchQuery.trim().toLowerCase();
      const base = this.baseHref;
      const items = [];

      this.services.forEach(s => {
        items.push({
          key: 'srv-' + s.slug,
          kind: 'Restoration Service',
          title: s.title,
          subtitle: s.summary,
          href: base(s.url)
        });
      });

      this.articles.forEach(a => {
        items.push({
          key: 'art-' + a.id,
          kind: 'Resource Article',
          title: a.title,
          subtitle: a.excerpt,
          href: base('/resources')
        });
      });

      [
        { key: 'pg-comm', kind: 'Commercial', title: 'Commercial Large Loss & Disaster Recovery Team', subtitle: '24/7 commercial response for healthcare, hospitality & industrial sites', href: base('/commercial') },
        { key: 'pg-erp', kind: 'Preparedness', title: 'RescuePro Emergency Ready Plan (ERP)', subtitle: 'Free mobile shut-off map & priority facility response', href: base('/commercial/erp') },
        { key: 'pg-gloss', kind: 'Glossary', title: 'Restoration Terms Glossary (A–Z)', subtitle: 'Industry definitions for mitigation, psychrometrics & mold remediation', href: base('/resources?tab=glossary') },
        { key: 'pg-faq', kind: 'FAQ', title: 'Frequently Asked Questions', subtitle: 'Answers about water extraction, black mold, fire soot & insurance claims', href: base('/resources?tab=faq') },
        { key: 'pg-why', kind: 'About Us', title: 'Our History, Press Releases & Community', subtitle: 'Over 50 years serving homeowners and first responders nationwide', href: base('/why') },
        { key: 'pg-fran', kind: 'Ownership', title: 'Own a RescuePro Franchise', subtitle: 'Ranked #1 by Entrepreneur Magazine in Restoration Services for 23 years', href: base('/franchise-ownership') }
      ].forEach(p => items.push(p));

      this.franchises.forEach(f => {
        items.push({
          key: 'fr-' + f.code,
          kind: '24/7 Local Franchise',
          title: f.name + ' (' + f.zip + ')',
          subtitle: f.address + ' • ' + f.phone,
          href: base('/locations')
        });
      });

      if (!q) return items.slice(0, 6);
      return items.filter(it =>
        it.title.toLowerCase().includes(q) ||
        it.subtitle.toLowerCase().includes(q) ||
        it.kind.toLowerCase().includes(q)
      ).slice(0, 8);
    },
    filteredFranchises() {
      const q = this.zipInput.trim().toLowerCase();
      if (!q) return this.franchises;
      return this.franchises.filter(f =>
        f.zip.toLowerCase().includes(q) ||
        f.city.toLowerCase().includes(q) ||
        f.state.toLowerCase().includes(q) ||
        f.name.toLowerCase().includes(q) ||
        f.code.toLowerCase().includes(q)
      );
    },
    filteredArticles() {
      const q = this.articleSearch.trim().toLowerCase();
      return this.articles.filter(a => {
        const catOk = this.articleCategory === 'All' || a.category === this.articleCategory;
        const txtOk = !q || a.title.toLowerCase().includes(q) || a.excerpt.toLowerCase().includes(q) || a.tag.toLowerCase().includes(q);
        return catOk && txtOk;
      });
    },
    faqCategories() {
      const seen = new Set();
      (this.globalFaqs || []).forEach(f => { if (f.cat) seen.add(f.cat); });
      return Array.from(seen);
    },
    filteredGlobalFaqs() {
      let list = this.globalFaqs || [];
      if (this.globalFaqCat && this.globalFaqCat !== 'All') {
        list = list.filter(f => f.cat === this.globalFaqCat);
      }
      if (this.activeFaqCat && this.activeFaqCat !== 'All') {
        list = list.filter(f => f.cat === this.activeFaqCat);
      }
      const q = (this.faqQuery || '').trim().toLowerCase();
      if (q) {
        list = list.filter(f => (f.q + ' ' + f.a + ' ' + f.cat).toLowerCase().includes(q));
      }
      return list;
    },
    calcEstimate() {
      const sqft = Math.max(100, Number(this.calcSqft) || 650);
      const catMult = this.calcCategory === 'Cat3' ? 1.85 : (this.calcCategory === 'Cat2' ? 1.35 : 1.0);
      const matMult = this.calcMaterial === 'Solid Hardwood' ? 1.45 : (this.calcMaterial === 'Finished Basement Concrete' ? 1.2 : 1.0);
      const low = Math.round(sqft * 4.2 * catMult * matMult / 50) * 50;
      const high = Math.round(low * 1.45 / 50) * 50;
      const airMovers = Math.max(4, Math.ceil(sqft / 75));
      const dehumUnits = Math.max(1, Math.ceil((sqft * catMult) / 550));
      const days = this.calcCategory === 'Cat3' ? '4–7 Days (With Sanitization)' : (this.calcMaterial === 'Solid Hardwood' ? '5–7 Days (Negative-Pressure Mats)' : '3–4 Days Verified Dry');
      const protocol = this.calcCategory === 'Cat3'
        ? 'Category 3 Blackwater Protocol: Controlled drywall flood cuts, porous pad removal & EPA biocide misting.'
        : (this.calcMaterial === 'Solid Hardwood'
            ? 'Injectidry® Negative-Pressure Hardwood Floor Mat System paired with low-grain refrigerant dehumidification.'
            : 'ANSI/IICRC S500 Psychrometric Closed-Loop Drying with FLIR daily thermal moisture mapping.');
      return {
        costText: '$' + low.toLocaleString() + ' – $' + high.toLocaleString(),
        daysText: days,
        airMovers,
        dehumUnits,
        protocol,
      };
    },
    glossaryEntries() {
      const out = [];
      Object.keys(this.glossary || {}).forEach(letter => {
        if (this.activeGlossaryLetter === 'all' || this.activeGlossaryLetter === letter) {
          out.push({ letter, terms: this.glossary[letter] });
        }
      });
      return out;
    },
    filteredJobs() {
      const q = this.careerSearch.trim().toLowerCase();
      return this.jobs.filter(j => {
        const trackOk = this.careerTrack === 'all' || j.track === this.careerTrack;
        const txtOk = !q || j.title.toLowerCase().includes(q) || j.location.toLowerCase().includes(q) || j.summary.toLowerCase().includes(q);
        return trackOk && txtOk;
      });
    },
    capitalSummary() {
      const map = {
        '150k': { label: '$100K – $200K Liquid Capital', verdict: 'Single-Territory Launch Pathway', desc: 'Ideal for owner-operators launching an initial protected county territory with core fleet financing and full RescuePro University training in Gallatin, TN.' },
        '300k': { label: '$250K – $450K Liquid Capital', verdict: 'Fast-Track Metro Territory & Expansion', desc: 'Accelerates wrapped fleet expansion, commercial marketing rep hiring, and rapid national Preferred Vendor carrier alignment.' },
        '500k': { label: '$500K+ Multi-Territory / Growth Group', verdict: 'Regional Multi-Unit & Large Loss CAT Ready', desc: 'Positioned for multi-territory operations, semi-mounted commercial desiccant drying rigs, and dedicated reconstruction divisions.' }
      };
      return map[this.capitalTier] || map['300k'];
    }
  },
  methods: {
    baseHref(path) {
      const base = (window.__SP_APP_DATA__ && window.__SP_APP_DATA__.baseUrl) ? window.__SP_APP_DATA__.baseUrl.replace(/\/$/, '') : '';
      const clean = '/' + String(path || '').replace(/^\/+/, '');
      return base + clean;
    },
    openMega(name) {
      if (this.activeMenu !== name) {
        this.activeMegaCatIdx = 0;
      }
      this.activeMenu = name;
    },
    toggleMenu(name) {
      if (this.activeMenu === name) {
        this.activeMenu = null;
      } else {
        this.activeMegaCatIdx = 0;
        this.activeMenu = name;
      }
    },
    iconClassFor(key) {
      const m = {
        drop: 'ph-drop',
        flame: 'ph-flame',
        mold: 'ph-biohazard',
        storm: 'ph-cloud-lightning',
        hammer: 'ph-hammer',
        biohazard: 'ph-warning',
        spray: 'ph-spray-bottle',
        sparkle: 'ph-sparkle',
        building: 'ph-buildings',
        shield: 'ph-shield-check',
        layers: 'ph-stack',
        book: 'ph-book-open'
      };
      return m[key] || 'ph-caret-right';
    },
    openSearchModal() {
      this.activeMenu = null;
      this.searchModalOpen = true;
    },
    prevSlateSlide() {
      if (this.slateOffset > 0) this.slateOffset--;
    },
    nextSlateSlide() {
      if (this.slateOffset < Math.max(0, this.serviceSteps.length - 3)) this.slateOffset++;
    },
    lookupFranchise() {
      const matches = this.filteredFranchises;
      if (matches.length > 0) {
        this.activeFranchise = matches[0];
        this.zipNotice = '';
      } else {
        this.activeFranchise = this.franchises[0] || null;
        this.zipNotice = 'National Call Center routing active for ZIP "' + this.zipInput + '".';
      }
    },
    selectFranchiseModal(fr) {
      this.activeFranchise = fr;
      this.locationModalOpen = false;
    },
    toggleFaq(idx) {
      this.openFaqIndex = this.openFaqIndex === idx ? -1 : idx;
    },
    applyErpPreset(kind) {
      if (kind === 'hotel') {
        this.erpForm = {
          facility_name: 'Grand Harbor Suites & Convention Hotel',
          facility_type: 'Hospitality / Hotel',
          address: '1500 Ross Ave, Dallas, TX 75201',
          water_shutoff: 'Sub-Level Chiller Plant — Valve #4 (Blue Tag)',
          electric_panel: 'Service Mezzanine Room 2B (Transfer Switch)',
          gas_shutoff: 'Back Alley Service Apron Behind Kitchen',
          emergency_contact: 'Sarah Jenkins (General Manager) — (214) 555-0192'
        };
      } else if (kind === 'school') {
        this.erpForm = {
          facility_name: 'Oakridge Consolidated High School Campus',
          facility_type: 'Education / Campus',
          address: '420 Campus Blvd, Atlanta, GA 30303',
          water_shutoff: 'Gymnasium Boiler Room North Wall',
          electric_panel: 'Main Custodial Corridor Panel A-12',
          gas_shutoff: 'Cafeteria Exterior Fence Enclosure',
          emergency_contact: 'David Ortiz (District Safety) — (404) 555-0134'
        };
      } else {
        this.erpForm = {
          facility_name: 'Sumner Regional Medical Pavilion',
          facility_type: 'Healthcare Facility',
          address: '801 Industrial Blvd, Gallatin, TN 37066',
          water_shutoff: 'Basement Mechanical Room B1 — Red Main Gate Valve',
          electric_panel: 'East Corridor Utility Closet #2 (Main 800A Breaker)',
          gas_shutoff: 'Exterior North Loading Dock — Yellow Meter Valve',
          emergency_contact: 'Alex Mercer (Facilities Director) — (615) 555-0148'
        };
      }
    },
    openArticleModal(article) {
      this.activeArticle = article;
    },
    openJobModal(job) {
      this.activeJob = job;
      this.jobApplicationSent = false;
      this.jobApplicantName = '';
      this.jobApplicantEmail = '';
    },
    submitJobQuickApply() {
      if (this.jobApplicantName.trim().length < 2 || !this.jobApplicantEmail.includes('@')) return;
      this.jobApplicationSent = true;
    },
    matchesAdminRow(status, ticket, name, zip, serviceType) {
      const statusOk = this.adminStatusFilter === 'All' || status === this.adminStatusFilter;
      const q = this.adminSearch.trim().toLowerCase();
      if (!q) return statusOk;
      const hay = (ticket + ' ' + name + ' ' + zip + ' ' + serviceType).toLowerCase();
      return statusOk && hay.includes(q);
    },
    toggleFaqKey(q) {
      this.openFaqKeys[q] = !this.openFaqKeys[q];
    },
    isFaqOpen(q) {
      return !!this.openFaqKeys[q];
    },
    expandAllFaqs() {
      const next = {};
      (this.filteredGlobalFaqs || []).forEach(f => { next[f.q] = true; });
      this.openFaqKeys = next;
    },
    collapseAllFaqs() {
      this.openFaqKeys = {};
    },
    fillDemoCreds(role) {
      if (role === 'admin') { this.loginEmail = 'admin@rescuepro.test'; this.loginPassword = 'Admin123!'; } else { this.loginEmail = 'customer@rescuepro.test'; this.loginPassword = 'Customer123!'; }
    }
  }
});
app.config.errorHandler = (err, instance, info) => { console.error('[RescuePro Vue Error]', info, err); };
app.mount('#app');
</script>

<?php
