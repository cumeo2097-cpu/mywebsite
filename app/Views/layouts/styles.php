<style>
  :root {
    --sp-orange: #FF5A00;
    --sp-orange-hover: #D94B00;
    --sp-orange-soft: #FFF4EC;
    --sp-charcoal: #1D2025;
    --sp-footer-bg: #262626;
    --sp-slate: #233546;
    --sp-slate-light: #2D4256;
    --sp-green: #1B6B3A;
    --sp-text: #22262A;
    --sp-muted: #5A626A;
    --sp-border: #E2E6EA;
    --sp-bg-light: #F7F8FA;
    --sp-white: #FFFFFF;
    --sp-ease: cubic-bezier(0.22, 1, 0.36, 1);
  }

  *, *::before, *::after { box-sizing: border-box; }
  html { scroll-behavior: smooth; }
  body {
    margin: 0;
    font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif;
    color: var(--sp-text);
    background: var(--sp-white);
    line-height: 1.55;
    -webkit-font-smoothing: antialiased;
  }
  a { color: inherit; text-decoration: none; }
  img { max-width: 100%; display: block; }
  button, input, select, textarea { font-family: inherit; }
  [v-cloak] { display: none !important; }

  .sp-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
  }

  /* ================= TOP ORANGE UTILITY BAR (Video 0:00) ================= */
  .sp-utility-bar {
    background: var(--sp-orange);
    color: var(--sp-white);
    height: 36px;
    position: relative;
    z-index: 1050;
  }
  .sp-utility-inner {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 24px;
    font-size: 13px;
    font-weight: 600;
  }
  .sp-util-item {
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
  }
  .sp-util-link {
    color: #fff;
    background: transparent;
    border: 0;
    padding: 6px 10px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: background .15s, color .15s;
  }
  .sp-util-item:hover .sp-util-link,
  .sp-util-item.open .sp-util-link {
    background: #fff;
    color: var(--sp-orange);
  }
  .sp-util-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 240px;
    background: #fff;
    color: var(--sp-text);
    box-shadow: 0 14px 36px rgba(0, 0, 0, 0.16);
    border-top: 2px solid var(--sp-orange);
    padding: 8px 0;
    z-index: 1100;
    display: none;
  }
  .sp-util-item:hover .sp-util-dropdown { display: block; }
  .sp-util-dropdown a {
    display: block;
    padding: 9px 18px;
    font-size: 13.5px;
    font-weight: 500;
    color: var(--sp-text);
    border-bottom: 1px solid #F1F3F5;
    transition: background .15s, color .15s, padding-left .15s;
  }
  .sp-util-dropdown a:last-child { border-bottom: 0; }
  .sp-util-dropdown a:hover {
    background: var(--sp-orange-soft);
    color: var(--sp-orange);
    padding-left: 22px;
  }

  /* ================= MAIN HEADER (84px Video Style) ================= */
  .sp-header {
    background: #fff;
    position: sticky;
    top: 0;
    z-index: 1000;
    border-bottom: 1px solid var(--sp-border);
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
  }
  .sp-header-inner {
    height: 84px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
  }
  .sp-brand-lockup {
    display: inline-flex;
    align-items: center;
    flex-shrink: 0;
    transition: transform .2s var(--sp-ease);
  }
  .sp-brand-lockup:hover { transform: scale(1.02); }
  .sp-logo-svg { display: block; }

  .sp-nav {
    display: flex;
    align-items: stretch;
    height: 100%;
    gap: 8px;
  }
  .sp-nav-item {
    display: flex;
    align-items: center;
    position: relative;
  }
  .sp-nav-trigger {
    background: transparent;
    border: 0;
    height: 100%;
    padding: 0 16px;
    font-size: 15.5px;
    font-weight: 500;
    color: #2B3035;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    position: relative;
    transition: color .18s;
  }
  .sp-nav-trigger::after {
    content: '';
    position: absolute;
    left: 12px;
    right: 12px;
    bottom: 0;
    height: 3px;
    background: var(--sp-orange);
    transform: scaleX(0);
    transition: transform .22s var(--sp-ease);
  }
  .sp-nav-trigger:hover, .sp-nav-trigger.active {
    color: var(--sp-orange);
  }
  .sp-nav-trigger:hover::after, .sp-nav-trigger.active::after {
    transform: scaleX(1);
  }

  .sp-header-call-area {
    text-align: right;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: center;
    gap: 2px;
    flex-shrink: 0;
  }
  .sp-header-call-top {
    font-size: 11.5px;
    font-weight: 600;
    color: var(--sp-orange);
    letter-spacing: 0.01em;
  }
  .sp-header-call-row {
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .sp-header-phone-block {
    text-align: right;
    line-height: 1.15;
  }
  .sp-header-phone-block small {
    display: block;
    font-size: 10.5px;
    color: var(--sp-muted);
    font-weight: 600;
  }
  .sp-header-phone-block a {
    font-size: 19px;
    font-weight: 600;
    color: var(--sp-orange);
    letter-spacing: -0.01em;
  }
  .sp-header-phone-block a:hover { color: var(--sp-orange-hover); text-decoration: underline; }

  .sp-portal-pill {
    font-size: 12px;
    font-weight: 700;
    color: var(--sp-slate);
    border: 1px solid #CBD5E1;
    padding: 5px 12px;
    border-radius: 999px;
    transition: all .18s;
  }
  .sp-portal-pill:hover {
    border-color: var(--sp-orange);
    color: var(--sp-orange);
    background: var(--sp-orange-soft);
  }

  /* ================= 3-COLUMN FLOATING HOVER MEGA MENU (Video 2:07, 2:49, 4:09) ================= */
  .sp-mega-wrap {
    position: absolute;
    top: calc(100% + 4px);
    left: 50%;
    transform: translateX(-50%);
    width: min(1040px, calc(100vw - 32px));
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 22px 54px rgba(0, 0, 0, 0.22);
    border: 1px solid #EAECEF;
    z-index: 1090;
    overflow: hidden;
    animation: spMenuFade .18s var(--sp-ease);
  }
  @keyframes spMenuFade {
    from { opacity: 0; transform: translateX(-50%) translateY(-6px); }
    to { opacity: 1; transform: translateX(-50%) translateY(0); }
  }
  .sp-mega-3col {
    display: grid;
    grid-template-columns: 245px 1fr 310px;
    min-height: 365px;
  }
  .sp-mega-left {
    background: #FAFAFB;
    border-right: 1px solid #EAECEF;
    padding: 12px 0;
  }
  .sp-mega-cat-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 11px 18px;
    cursor: pointer;
    color: #3B4148;
    font-size: 14px;
    font-weight: 500;
    border-left: 4px solid transparent;
    transition: background .14s, color .14s, border-color .14s, padding-left .14s;
  }
  .sp-mega-cat-item .sp-cat-label {
    display: inline-flex;
    align-items: center;
    gap: 11px;
  }
  .sp-mega-cat-item svg { width: 18px; height: 18px; stroke: currentColor; flex-shrink: 0; }
  .sp-mega-cat-item .sp-cat-arrow { opacity: 0; transition: opacity .14s, transform .14s; font-size: 14px; }
  .sp-mega-cat-item:hover,
  .sp-mega-cat-item.active {
    background: #FFF3EB;
    color: var(--sp-orange);
    border-left-color: var(--sp-orange);
    font-weight: 700;
    padding-left: 22px;
  }
  .sp-mega-cat-item:hover .sp-cat-arrow,
  .sp-mega-cat-item.active .sp-cat-arrow {
    opacity: 1;
    transform: translateX(2px);
  }

  .sp-mega-mid {
    padding: 26px 28px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
  }
  .sp-mega-mid-title {
    font-size: 20px;
    font-weight: 500;
    color: #22262A;
    margin: 0 0 10px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: color .15s;
  }
  .sp-mega-mid-title:hover { color: var(--sp-orange); }
  .sp-mega-mid-desc {
    font-size: 13.5px;
    color: var(--sp-muted);
    margin: 0 0 18px;
    line-height: 1.55;
  }
  .sp-mega-subbox {
    border: 1px solid #DFD3CC;
    border-radius: 3px;
    padding: 12px 16px;
    display: grid;
    gap: 9px;
    background: #fff;
  }
  .sp-mega-sublink {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13.5px;
    font-weight: 500;
    color: #363B40;
    transition: transform .16s var(--sp-ease), color .16s;
  }
  .sp-mega-sublink:hover {
    color: var(--sp-orange);
    transform: translateX(6px);
  }
  .sp-mega-right {
    padding: 22px 22px 22px 6px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .sp-mega-photo-frame {
    width: 100%;
    height: 280px;
    border-radius: 3px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
  }
  .sp-mega-photo-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .35s var(--sp-ease);
  }
  .sp-mega-photo-frame:hover img { transform: scale(1.05); }

  /* ================= SIGNATURE ORANGE CHEVRON-PILL BUTTON (Video 0:20, 1:00, 1:21, 17:08) ================= */
  .sp-chevron-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: var(--sp-orange);
    color: #FFFFFF;
    font-weight: 700;
    font-size: 14.5px;
    padding: 12px 32px 12px 24px;
    border: 0;
    border-radius: 28px 0 0 28px;
    clip-path: polygon(0 0, calc(100% - 14px) 0, 100% 50%, calc(100% - 14px) 100%, 0 100%);
    cursor: pointer;
    text-decoration: none;
    transition: background .2s, transform .2s var(--sp-ease), filter .2s;
    box-shadow: 0 4px 12px rgba(255, 90, 0, 0.25);
  }
  .sp-chevron-btn::after {
    content: '›';
    font-size: 22px;
    font-weight: 400;
    line-height: 1;
    margin-left: 2px;
    transition: transform .22s var(--sp-ease);
  }
  .sp-chevron-btn:hover {
    background: var(--sp-orange-hover);
    transform: translateY(-2px);
    filter: drop-shadow(0 6px 14px rgba(255, 90, 0, 0.36));
  }
  .sp-chevron-btn:hover::after {
    transform: translateX(4px);
  }
  .sp-chevron-btn.sp-chevron-lg {
    font-size: 16px;
    padding: 14px 40px 14px 28px;
  }

  /* Standard secondary buttons */
  .sp-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 11px 22px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 14px;
    border: 2px solid transparent;
    cursor: pointer;
    transition: all .18s var(--sp-ease);
  }
  .sp-btn-orange { background: var(--sp-orange); color: #fff; }
  .sp-btn-orange:hover { background: var(--sp-orange-hover); transform: translateY(-1px); }
  .sp-btn-slate { background: var(--sp-slate); color: #fff; }
  .sp-btn-slate:hover { background: #192836; transform: translateY(-1px); }
  .sp-btn-outline { background: #fff; border-color: #CBD5E1; color: var(--sp-slate); }
  .sp-btn-outline:hover { border-color: var(--sp-orange); color: var(--sp-orange); }
  .sp-btn-sm { padding: 7px 14px; font-size: 13px; }

  /* ================= HOMEPAGE DIAGONAL HERO (Video 0:00) ================= */
  .sp-home-hero {
    position: relative;
    min-height: 505px;
    background: var(--sp-charcoal);
    overflow: hidden;
    display: flex;
    align-items: stretch;
  }
  .sp-home-hero-photo {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 68%;
    background-size: cover;
    background-position: left center;
    z-index: 1;
  }
  .sp-home-hero-left {
    position: relative;
    z-index: 3;
    width: 50%;
    min-width: 490px;
    background: #1C1F24;
    padding: 58px 80px 58px 0;
    clip-path: polygon(0 0, 100% 0, 86% 100%, 0 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #fff;
  }
  .sp-home-hero-left-inner {
    margin-left: max(24px, calc((100vw - 1200px) / 2 + 24px));
    max-width: 460px;
  }
  .sp-home-hero-left h1 {
    font-size: clamp(29px, 3.2vw, 39px);
    font-weight: 400;
    line-height: 1.22;
    margin: 0 0 22px;
    color: #FFFFFF;
  }
  .sp-detect-label {
    font-size: 13.5px;
    color: #E2E5E9;
    margin: 0 0 4px;
  }
  .sp-detect-city {
    font-size: clamp(28px, 3vw, 36px);
    font-weight: 400;
    color: var(--sp-orange);
    margin: 0 0 12px;
    line-height: 1.15;
  }
  .sp-detect-sublink {
    display: inline-block;
    color: var(--sp-orange);
    text-decoration: underline;
    font-size: 15px;
    margin-bottom: 16px;
  }
  .sp-detect-sublink:hover { color: #FF823D; }
  .sp-change-loc {
    font-size: 13.5px;
    color: #D2D6DC;
    margin-bottom: 26px;
  }
  .sp-change-loc button {
    background: none;
    border: 0;
    color: #fff;
    text-decoration: underline;
    cursor: pointer;
    font-size: 13.5px;
    padding: 0 0 0 6px;
  }
  .sp-change-loc button:hover { color: var(--sp-orange); }

  /* Review Pill [★] 187,515 Reviews ★★★★★ 4.8 */
  .sp-review-pill {
    display: inline-flex;
    align-items: center;
    background: #FFFFFF;
    color: #222;
    border-radius: 6px;
    padding: 6px 14px 6px 8px;
    gap: 10px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.28);
    font-size: 13.5px;
    font-weight: 700;
  }
  .sp-review-icon {
    background: var(--sp-orange);
    color: #fff;
    width: 30px;
    height: 30px;
    border-radius: 5px;
    display: grid;
    place-items: center;
    font-size: 16px;
  }
  .sp-review-stars { color: #F59E0B; letter-spacing: 1px; font-size: 14px; }

  /* Bottom-Right Left-Pointing Orange Callout Banner */
  .sp-hero-phone-ribbon {
    position: absolute;
    right: 0;
    bottom: 62px;
    z-index: 4;
    background: var(--sp-orange);
    color: #fff;
    padding: 20px 56px 20px 64px;
    clip-path: polygon(28px 0, 100% 0, 100% 100%, 28px 100%, 0 50%);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
    text-align: center;
    transition: background .2s, transform .2s var(--sp-ease);
  }
  .sp-hero-phone-ribbon:hover {
    background: var(--sp-orange-hover);
    transform: translateX(-4px);
  }
  .sp-hero-phone-ribbon strong {
    display: block;
    font-size: clamp(26px, 2.8vw, 34px);
    font-weight: 700;
    line-height: 1.1;
  }
  .sp-hero-phone-ribbon span {
    font-size: 15px;
    font-weight: 500;
    opacity: 0.96;
  }

  /* ================= SUBPAGE WHITE SPLIT HERO WITH DOTS & FLOATING LOCATION CARD (Video 1:21, 2:28, 18:55) ================= */
  .sp-subhero {
    background: #FFFFFF;
    padding: 36px 0 88px;
    border-bottom: 1px solid #EEF1F4;
    position: relative;
  }
  .sp-subhero-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 44px;
    align-items: center;
  }
  .sp-subhero h1 {
    font-size: clamp(32px, 3.6vw, 44px);
    font-weight: 300;
    color: #2B333C;
    margin: 0 0 16px;
    line-height: 1.16;
  }
  .sp-subhero-lead {
    font-size: 16.5px;
    color: #424B54;
    line-height: 1.65;
    margin: 0 0 24px;
  }
  .sp-subhero-img-wrap {
    position: relative;
    padding-right: 30px;
  }
  .sp-subhero-img-wrap img {
    width: 100%;
    height: 310px;
    object-fit: cover;
    border-radius: 3px;
    position: relative;
    z-index: 2;
    box-shadow: 0 10px 26px rgba(0, 0, 0, 0.12);
  }
  .sp-subhero-dots {
    position: absolute;
    top: 16px;
    right: 0;
    bottom: -14px;
    width: 120px;
    background-image: radial-gradient(#CBD5E1 2.2px, transparent 2.2px);
    background-size: 12px 12px;
    z-index: 1;
  }

  /* Floating Location Banner overlapping bottom of subpage hero (Video 1:21 & 2:28) */
  .sp-floating-loc-wrap {
    position: relative;
    z-index: 20;
    margin-top: -54px;
    margin-bottom: 34px;
  }
  .sp-floating-loc-card {
    background: #FFFFFF;
    border-radius: 4px;
    box-shadow: 0 12px 34px rgba(0, 0, 0, 0.12);
    border: 1px solid #EAECEF;
    padding: 24px 36px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
  }
  .sp-floating-loc-card .sp-loc-eyebrow {
    font-size: 12.5px;
    color: var(--sp-orange);
    font-weight: 600;
    margin-bottom: 2px;
  }
  .sp-floating-loc-card h2 {
    font-size: 25px;
    font-weight: 700;
    color: #22262A;
    margin: 0 0 4px;
  }
  .sp-floating-loc-card p {
    margin: 0;
    font-size: 13.5px;
    color: var(--sp-muted);
  }

  /* ================= 4-STEP CHEVRON-BOTTOM PROCESS BOXES (Video 1:00 — Assess, Secure, Clean, Restore) ================= */
  .sp-process4-section {
    background: #F4F5F7;
    padding: 62px 0;
  }
  .sp-process4-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
    margin-top: 34px;
  }
  .sp-p4-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform .25s var(--sp-ease);
  }
  .sp-p4-card:hover { transform: translateY(-6px); }
  .sp-p4-top-wrap {
    width: 82%;
    position: relative;
    z-index: 3;
    filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.10));
  }
  .sp-p4-top-border {
    background: var(--sp-orange);
    padding: 0 0 4px;
    clip-path: polygon(0 0, 100% 0, 100% 78%, 50% 100%, 0 78%);
  }
  .sp-p4-top-inner {
    background: #FFFFFF;
    padding: 20px 14px 28px;
    text-align: center;
    clip-path: polygon(0 0, 100% 0, 100% 76%, 50% 98%, 0 76%);
  }
  .sp-p4-top-inner h3 {
    font-size: 20px;
    font-weight: 400;
    color: #2B333C;
    margin: 0 0 10px;
  }
  .sp-p4-top-inner svg {
    width: 52px;
    height: 44px;
    margin: 0 auto;
    transition: transform .25s var(--sp-ease);
  }
  .sp-p4-card:hover .sp-p4-top-inner svg { transform: scale(1.1); }
  .sp-p4-bottom {
    background: #FFFFFF;
    width: 100%;
    flex: 1;
    margin-top: -36px;
    padding: 54px 20px 24px;
    text-align: center;
    font-size: 13.5px;
    color: var(--sp-muted);
    line-height: 1.55;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    border-radius: 3px;
    transition: box-shadow .25s;
  }
  .sp-p4-card:hover .sp-p4-bottom {
    box-shadow: 0 14px 30px rgba(35, 53, 70, 0.14);
  }

  /* ================= DARK SLATE-BLUE (#233546) HORIZONTAL PROCESS SLIDER (Video 3:29 & 8:25) ================= */
  .sp-slate-section {
    background: var(--sp-slate);
    color: #FFFFFF;
    padding: 64px 0;
  }
  .sp-slate-cols {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0;
    margin-top: 28px;
  }
  .sp-slate-step {
    padding: 12px 30px 18px;
    border-right: 1px solid rgba(255, 255, 255, 0.22);
    transition: background .2s;
  }
  .sp-slate-step:last-child { border-right: 0; }
  .sp-slate-step:hover { background: rgba(255, 255, 255, 0.04); }
  .sp-slate-num {
    font-size: 56px;
    font-weight: 800;
    color: var(--sp-orange);
    line-height: 1;
    margin-bottom: 14px;
  }
  .sp-slate-step h3 {
    font-size: 18px;
    font-weight: 700;
    color: #FFFFFF;
    margin: 0 0 10px;
  }
  .sp-slate-step p {
    font-size: 14px;
    color: #D2DAE2;
    line-height: 1.6;
    margin: 0;
  }
  .sp-slate-controls {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 32px;
    padding: 0 30px;
  }
  .sp-slate-dots { display: flex; gap: 10px; }
  .sp-slate-dot {
    width: 12px;
    height: 12px;
    background: rgba(255, 255, 255, 0.28);
    border: 0;
    cursor: pointer;
    transition: background .18s, transform .18s;
  }
  .sp-slate-dot.active { background: var(--sp-orange); transform: scale(1.1); }
  .sp-slate-arrows { display: flex; gap: 12px; }
  .sp-circle-arrow {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--sp-orange);
    color: #fff;
    border: 0;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    display: grid;
    place-items: center;
    transition: background .18s, transform .18s;
  }
  .sp-circle-arrow:hover { background: var(--sp-orange-hover); transform: scale(1.08); }
  .sp-circle-arrow:disabled { opacity: 0.4; cursor: not-allowed; transform: none; }

  /* ================= DIAGONAL INSURANCE SPLIT BANNER (Video 0:41 & 3:50) ================= */
  .sp-insurance-split {
    display: grid;
    grid-template-columns: 1.08fr 1fr;
    background: #FFFFFF;
    overflow: hidden;
    border-top: 1px solid #EEF1F4;
    border-bottom: 1px solid #EEF1F4;
    min-height: 410px;
  }
  .sp-insurance-photo {
    position: relative;
    overflow: hidden;
  }
  .sp-insurance-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .sp-insurance-photo::after {
    content: '';
    position: absolute;
    top: 0;
    right: -1px;
    width: 96px;
    height: 100%;
    background: #FFFFFF;
    clip-path: polygon(100% 0, 100% 100%, 0 100%);
  }
  .sp-insurance-body {
    padding: 52px 56px 52px 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
  }
  .sp-insurance-body h2 {
    font-size: 32px;
    font-weight: 300;
    color: #2B333C;
    margin: 0 0 16px;
    line-height: 1.22;
  }
  .sp-insurance-body p {
    font-size: 14.5px;
    color: var(--sp-muted);
    line-height: 1.68;
    margin: 0 0 14px;
  }

  /* ================= V-CHEVRON IMAGE MASK CARDS (Video 17:39) ================= */
  .sp-v-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
  }
  .sp-v-card {
    background: #FFFFFF;
    border: 1px solid #EAECEF;
    border-radius: 3px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform .24s var(--sp-ease), box-shadow .24s var(--sp-ease);
  }
  .sp-v-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 36px rgba(0, 0, 0, 0.12);
  }
  .sp-v-card-img-box {
    height: 186px;
    width: 100%;
    overflow: hidden;
    clip-path: polygon(0 0, 100% 0, 100% 74%, 50% 100%, 0 74%);
    background: #1D2025;
  }
  .sp-v-card-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .36s var(--sp-ease);
  }
  .sp-v-card:hover .sp-v-card-img-box img { transform: scale(1.07); }
  .sp-v-card-body {
    padding: 18px 24px 24px;
    display: flex;
    flex-direction: column;
    flex: 1;
  }
  .sp-v-card-body h3 {
    font-size: 18px;
    font-weight: 500;
    color: var(--sp-orange);
    margin: 0 0 10px;
    line-height: 1.35;
  }
  .sp-v-card-body .sp-v-excerpt {
    font-style: italic;
    font-size: 13.5px;
    color: #555D66;
    margin: 0 0 10px;
    flex: 1;
  }
  .sp-v-card-body .sp-v-loc {
    font-size: 13.5px;
    font-weight: 700;
    color: #2B333C;
    margin-bottom: 14px;
  }
  .sp-read-more {
    font-size: 13.5px;
    font-weight: 700;
    color: #2B333C;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: color .15s, gap .15s;
  }
  .sp-read-more:hover { color: var(--sp-orange); gap: 8px; }

  /* ================= QUICK LINKS SIDEBAR + SEARCH BOX (Video 1:21, 4:42) ================= */
  .sp-content-sidebar-grid {
    display: grid;
    grid-template-columns: 1.65fr 0.85fr;
    gap: 54px;
    align-items: start;
  }
  .sp-quick-links h3 {
    font-size: 16px;
    font-weight: 700;
    color: #2B333C;
    margin: 0 0 14px;
  }
  .sp-quick-links ul {
    list-style: none;
    padding: 0;
    margin: 0 0 26px;
    display: grid;
    gap: 11px;
  }
  .sp-quick-links a {
    color: var(--sp-orange);
    text-decoration: underline;
    font-size: 14.5px;
    font-weight: 500;
    display: inline-block;
    transition: transform .15s, color .15s;
  }
  .sp-quick-links a:hover { color: var(--sp-orange-hover); transform: translateX(4px); }
  .sp-question-search-box {
    background: var(--sp-slate);
    color: #FFFFFF;
    padding: 22px 24px 26px;
    border-radius: 3px;
    box-shadow: 0 10px 26px rgba(35, 53, 70, 0.16);
  }
  .sp-question-search-box label {
    display: block;
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 12px;
  }
  .sp-question-input-wrap {
    display: flex;
    align-items: center;
    background: #FFFFFF;
    border-radius: 26px;
    padding: 6px 16px;
    gap: 8px;
  }
  .sp-question-input-wrap input {
    border: 0;
    outline: none;
    width: 100%;
    font-size: 14px;
    color: #222;
    padding: 5px 0;
  }

  /* ================= RESOURCE ORANGE SUB-NAV BAR (Video 1:43, 13:32) ================= */
  .sp-resource-subnav {
    background: var(--sp-orange);
    color: #FFFFFF;
    padding: 10px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.25);
  }
  .sp-resource-subnav-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 6px 0;
    font-size: 13px;
    font-weight: 500;
  }
  .sp-resource-subnav-links button,
  .sp-resource-subnav-links a {
    background: transparent;
    border: 0;
    color: #FFFFFF;
    cursor: pointer;
    padding: 2px 12px;
    font-size: 13px;
    font-weight: 500;
    border-right: 1px solid rgba(255, 255, 255, 0.45);
    transition: opacity .15s;
  }
  .sp-resource-subnav-links button:last-child,
  .sp-resource-subnav-links a:last-child { border-right: 0; }
  .sp-resource-subnav-links button:hover,
  .sp-resource-subnav-links button.active {
    text-decoration: underline;
    font-weight: 700;
  }

  /* ================= ARTICLE HORIZONTAL ROWS (Video 10:29, 14:05) ================= */
  .sp-article-row {
    display: grid;
    grid-template-columns: 270px 1fr;
    gap: 26px;
    padding: 24px 0;
    border-bottom: 1px solid #E5E8EC;
    align-items: start;
  }
  .sp-article-row-thumb {
    width: 100%;
    height: 168px;
    object-fit: cover;
    border-radius: 3px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transition: transform .25s var(--sp-ease);
  }
  .sp-article-row:hover .sp-article-row-thumb { transform: scale(1.03); }
  .sp-article-row h3 {
    font-size: 19px;
    font-weight: 500;
    color: var(--sp-orange);
    margin: 0 0 8px;
  }
  .sp-article-row p {
    font-size: 13.5px;
    color: var(--sp-muted);
    margin: 0 0 12px;
    line-height: 1.6;
  }

  /* ================= GLOSSARY A–Z INDEX (Video 13:32) ================= */
  .sp-glossary-alpha {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px 14px;
    margin: 22px 0 34px;
  }
  .sp-glossary-letter-btn {
    background: none;
    border: 0;
    color: var(--sp-orange);
    font-size: 18px;
    font-weight: 500;
    text-transform: lowercase;
    cursor: pointer;
    padding: 2px 6px;
    border-bottom: 2px solid transparent;
    transition: border-color .15s, transform .15s;
  }
  .sp-glossary-letter-btn:hover,
  .sp-glossary-letter-btn.active {
    border-bottom-color: var(--sp-orange);
    font-weight: 700;
    transform: translateY(-2px);
  }
  .sp-glossary-group { margin-bottom: 34px; }
  .sp-glossary-group h2 {
    font-size: 28px;
    font-weight: 400;
    color: var(--sp-orange);
    text-transform: uppercase;
    border-bottom: 1px solid #E5E8EC;
    padding-bottom: 6px;
    margin: 0 0 18px;
  }
  .sp-glossary-cols {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px 28px;
  }
  .sp-glossary-term-card {
    background: #FFFFFF;
    border: 1px solid #EAECEF;
    border-left: 3px solid var(--sp-orange);
    padding: 14px 16px;
    border-radius: 3px;
    transition: box-shadow .18s, transform .18s;
  }
  .sp-glossary-term-card:hover {
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    transform: translateY(-2px);
  }

  /* ================= CLEAN ORANGE FAQ ACCORDION (Video 1:43) ================= */
  .sp-faq-clean-item {
    border-bottom: 1px solid #E2E6EA;
  }
  .sp-faq-clean-btn {
    width: 100%;
    background: transparent;
    border: 0;
    padding: 18px 6px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    text-align: left;
    font-size: 16px;
    font-weight: 600;
    color: var(--sp-orange);
    cursor: pointer;
  }
  .sp-faq-clean-btn:hover { color: var(--sp-orange-hover); }
  .sp-faq-clean-body {
    padding: 0 6px 18px;
    color: var(--sp-muted);
    font-size: 14.5px;
    line-height: 1.65;
  }

  /* ================= STANDARD SECTIONS, GRIDS, CARDS, FORMS, TABLES ================= */
  .sp-section { padding: 62px 0; }
  .sp-section-alt { background: var(--sp-bg-light); }
  .sp-section-dark { background: var(--sp-slate); color: #fff; }
  .sp-section-head { max-width: 760px; margin: 0 auto 38px; text-align: center; }
  .sp-section-head h2 {
    font-size: clamp(26px, 3vw, 34px);
    font-weight: 400;
    color: #2B333C;
    margin: 8px 0 10px;
  }
  .sp-section-dark .sp-section-head h2 { color: #FFFFFF; }
  .sp-section-head p { color: var(--sp-muted); font-size: 15.5px; margin: 0; }
  .sp-section-dark .sp-section-head p { color: #CBD5E1; }

  .sp-grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }
  .sp-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
  .sp-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }

  .sp-card {
    background: #fff;
    border: 1px solid var(--sp-border);
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    transition: transform .22s var(--sp-ease), box-shadow .22s var(--sp-ease);
  }
  .sp-card:hover { transform: translateY(-4px); box-shadow: 0 14px 28px rgba(0, 0, 0, 0.10); }
  .sp-card-img { height: 195px; width: 100%; object-fit: cover; }
  .sp-card-body { padding: 22px; flex: 1; display: flex; flex-direction: column; }
  .sp-card-body h3 { margin: 8px 0 8px; font-size: 18.5px; color: #22262A; }
  .sp-card-body p { margin: 0 0 16px; color: var(--sp-muted); font-size: 14px; flex: 1; }

  .sp-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    padding: 4px 11px;
    border-radius: 999px;
  }
  .sp-badge-orange { background: var(--sp-orange-soft); color: var(--sp-orange); }
  .sp-badge-green { background: #E7F5EC; color: var(--sp-green); }

  /* Forms & Tables */
  .sp-input, .sp-select, .sp-textarea {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid #CBD5E1;
    border-radius: 6px;
    font-size: 14px;
    color: var(--sp-text);
    background: #fff;
    transition: border-color .15s, box-shadow .15s;
  }
  .sp-input:focus, .sp-select:focus, .sp-textarea:focus {
    outline: none;
    border-color: var(--sp-orange);
    box-shadow: 0 0 0 3px rgba(255, 90, 0, 0.14);
  }
  .sp-form-card {
    background: #fff;
    border: 1px solid var(--sp-border);
    border-radius: 6px;
    padding: 28px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
  }
  .sp-form-group { margin-bottom: 15px; }
  .sp-label { display: block; font-size: 13px; font-weight: 700; color: #2B333C; margin-bottom: 5px; }

  .sp-filter-bar { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 22px; }
  .sp-chip {
    background: #fff;
    border: 1.5px solid var(--sp-border);
    border-radius: 999px;
    padding: 7px 16px;
    font-size: 13px;
    font-weight: 600;
    color: var(--sp-slate);
    cursor: pointer;
    transition: all .15s;
  }
  .sp-chip.active, .sp-chip:hover {
    background: var(--sp-orange);
    border-color: var(--sp-orange);
    color: #fff;
  }

  .sp-table-wrap {
    background: #fff;
    border: 1px solid var(--sp-border);
    border-radius: 6px;
    overflow-x: auto;
  }
  .sp-table { width: 100%; border-collapse: collapse; min-width: 680px; }
  .sp-table th {
    background: var(--sp-slate);
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    padding: 13px 16px;
    text-align: left;
  }
  .sp-table td { padding: 14px 16px; border-bottom: 1px solid var(--sp-border); font-size: 14px; }
  .sp-status-pill { display: inline-block; padding: 4px 10px; border-radius: 999px; font-size: 12px; font-weight: 700; }
  .st-New { background: #FEF3C7; color: #92400E; }
  .st-Dispatched { background: #DBEAFE; color: #1E40AF; }
  .st-On-Site { background: #E0E7FF; color: #3730A3; }
  .st-Completed { background: #D1FAE5; color: #065F46; }
  .st-Cancelled { background: #F1F5F9; color: #475569; }

  /* ERP Mobile Phone Simulator */
  .sp-phone-frame {
    background: #141A23;
    border: 8px solid #232D3B;
    border-radius: 32px;
    padding: 16px 14px;
    box-shadow: 0 18px 44px rgba(0, 0, 0, 0.22);
    max-width: 390px;
    margin: 0 auto;
  }
  .sp-phone-screen { background: #fff; border-radius: 20px; overflow: hidden; }
  .sp-phone-topbar { background: var(--sp-orange); color: #fff; padding: 14px 16px; font-weight: 700; display: flex; justify-content: space-between; font-size: 14px; }
  .sp-phone-content { padding: 16px; font-size: 13px; }
  .sp-phone-row { background: var(--sp-bg-light); border: 1px solid var(--sp-border); border-radius: 6px; padding: 9px 12px; margin-bottom: 9px; }
  .sp-phone-row small { display: block; font-size: 10.5px; text-transform: uppercase; color: var(--sp-muted); font-weight: 700; }
  .sp-phone-row strong { font-size: 13.5px; color: #22262A; }

  /* Flash Alerts & Modals */
  .sp-flash-wrap { max-width: 1200px; margin: 14px auto 0; padding: 0 24px; }
  .sp-alert { padding: 13px 18px; border-radius: 6px; font-size: 14px; font-weight: 600; margin-bottom: 10px; }
  .sp-alert-success { background: #ECFDF5; color: #065F46; border: 1px solid #A7F3D0; }
  .sp-alert-error { background: #FEF2F2; color: #991B1B; border: 1px solid #FECACA; }

  .sp-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(18, 22, 27, 0.72);
    backdrop-filter: blur(4px);
    z-index: 2000;
    display: grid;
    place-items: center;
    padding: 20px;
  }
  .sp-modal {
    background: #fff;
    border-radius: 6px;
    max-width: 720px;
    width: 100%;
    max-height: 88vh;
    overflow-y: auto;
    padding: 28px;
    box-shadow: 0 24px 60px rgba(0, 0, 0, 0.30);
    position: relative;
  }
  .sp-modal-close {
    position: absolute;
    top: 14px;
    right: 14px;
    background: var(--sp-bg-light);
    border: 1px solid var(--sp-border);
    width: 34px;
    height: 34px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 16px;
    display: grid;
    place-items: center;
  }

  /* ================= ORANGE "ALSO OF INTEREST" BAR + CHARCOAL #262626 FOOTER (Video 17:39) ================= */
  .sp-also-orange-bar {
    background: var(--sp-orange);
    color: #FFFFFF;
    padding: 13px 0;
    font-size: 13.5px;
  }
  .sp-also-orange-inner {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 10px 0;
  }
  .sp-also-orange-inner span.sp-also-label {
    font-weight: 700;
    margin-right: 18px;
  }
  .sp-also-orange-inner a {
    color: #FFFFFF;
    padding: 0 18px;
    border-right: 1px solid rgba(255, 255, 255, 0.45);
    transition: opacity .15s;
  }
  .sp-also-orange-inner a:last-child { border-right: 0; }
  .sp-also-orange-inner a:hover { text-decoration: underline; opacity: 0.9; }

  .sp-footer {
    background: var(--sp-footer-bg);
    color: #C7CBD1;
    padding: 52px 0 32px;
    font-size: 13px;
  }
  .sp-footer-grid {
    display: grid;
    grid-template-columns: 1.55fr repeat(4, 1fr);
    gap: 28px;
    padding-bottom: 34px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.12);
  }
  .sp-footer h4 {
    color: var(--sp-orange);
    font-size: 14.5px;
    font-weight: 600;
    margin: 0 0 14px;
  }
  .sp-footer ul { list-style: none; padding: 0; margin: 0; }
  .sp-footer li { margin-bottom: 9px; }
  .sp-footer a { color: #D4D7DD; transition: color .15s, padding-left .15s; }
  .sp-footer a:hover { color: var(--sp-orange); padding-left: 3px; }
  .sp-footer-social {
    display: flex;
    gap: 12px;
    margin: 14px 0 18px;
  }
  .sp-footer-social a {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    display: grid;
    place-items: center;
    color: #fff;
    padding-left: 0 !important;
  }
  .sp-footer-social a:hover { background: var(--sp-orange); color: #fff; }
  .sp-footer-disclaimers {
    padding-top: 22px;
    font-size: 11.5px;
    color: #9DA3AC;
    line-height: 1.65;
  }

  .sp-mobile-toggle {
    display: none;
    background: #F4F5F7;
    border: 1px solid #D1D5DB;
    border-radius: 6px;
    padding: 8px 10px;
    font-size: 20px;
    cursor: pointer;
  }

  /* Responsive */
  @media (max-width: 1024px) {
    .sp-home-hero-left { width: 100%; min-width: 0; clip-path: none; padding: 42px 24px; }
    .sp-home-hero-photo { width: 100%; opacity: 0.25; }
    .sp-hero-phone-ribbon { position: static; margin: 0 24px 24px; }
    .sp-mega-3col, .sp-subhero-grid, .sp-content-sidebar-grid, .sp-insurance-split { grid-template-columns: 1fr; }
    .sp-process4-grid, .sp-grid-4 { grid-template-columns: repeat(2, 1fr); }
    .sp-slate-cols, .sp-v-grid, .sp-grid-3, .sp-glossary-cols { grid-template-columns: repeat(2, 1fr); }
    .sp-footer-grid { grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 820px) {
    .sp-nav, .sp-header-call-top, .sp-header-phone-block { display: none; }
    .sp-mobile-toggle { display: inline-flex; }
  }
  @media (max-width: 620px) {
    .sp-process4-grid, .sp-slate-cols, .sp-v-grid, .sp-grid-3, .sp-grid-2, .sp-glossary-cols, .sp-article-row, .sp-footer-grid {
      grid-template-columns: 1fr;
    }
    .sp-slate-step { border-right: 0; border-bottom: 1px solid rgba(255,255,255,0.18); }
  }
</style>

<style>
  /* ================= V4 UNIFIED GRADUATION PROJECT EXTENSIONS ================= */
  .sp-card:not(:has(> .sp-card-body)):not(:has(> .sp-card-img)), .sp-card-pad { padding: 26px; }
  .sp-muted { color: var(--sp-muted); font-size: 0.94rem; }
  .sp-lead { font-size: 1.08rem; }
  .sp-hero-dark { background: linear-gradient(125deg, #131B24 0%, #0E3524 100%); color: #FFFFFF; }
  .sp-mt-xs { margin-top: 8px; } .sp-mt-sm { margin-top: 14px; } .sp-mt-md { margin-top: 24px; } .sp-mt-lg { margin-top: 40px; }
  .sp-inline-form { display: inline-block; margin: 0; }
  .sp-hero-grid { display: grid; grid-template-columns: 1.05fr 1fr; gap: 36px; align-items: center; }
  .sp-btn-green { background: #1B6B3A; color: #FFFFFF !important; }
  .sp-btn-green:hover { background: #14532D; transform: translateY(-1px); }
  .sp-btn-outline-light { background: transparent; color: #FFFFFF !important; border-color: rgba(255,255,255,0.45); }
  .sp-btn-outline-light:hover { background: rgba(255,255,255,0.12); border-color: #FFFFFF; }
  .sp-btn-ghost { background: var(--sp-bg-light); color: var(--sp-text) !important; }
  .sp-btn-block { width: 100%; }
  .sp-btn-row { display: flex; gap: 12px; flex-wrap: wrap; }
  .sp-section-soft { padding: 62px 0; background: var(--sp-bg-light); }
  .sp-ce-mini-card { border: 1px solid var(--sp-border); border-radius: 8px; padding: 16px; background: var(--sp-bg-light); }
.sp-page-hero { padding: 52px 0; background: linear-gradient(125deg, #131B24 0%, #0E3524 100%); color: #FFFFFF; }
.sp-page-hero h1 { color: #FFFFFF; font-size: clamp(1.85rem, 3.6vw, 2.7rem); margin: 10px 0 12px; }
.sp-page-hero .sp-lead { color: #CBD5E1; max-width: 780px; font-size: 1.08rem; margin: 0; }
.sp-breadcrumb { font-size: 0.85rem; color: #94A3B8; display: flex; gap: 8px; flex-wrap: wrap; }
.sp-breadcrumb a { color: #CBD5E1; }

.sp-card {
  background: #FFFFFF; border: 1px solid var(--sp-border); border-radius: var(--sp-radius);
  padding: 26px; box-shadow: 0 4px 16px rgba(15,23,42,0.04);
}
.sp-card-accent { border-top: 4px solid var(--sp-orange); box-shadow: var(--sp-shadow); }
.sp-card-do { border-top: 4px solid #16A34A; }
.sp-card-dont { border-top: 4px solid #DC2626; }
.sp-first-responder-split {
  display: grid; grid-template-columns: 1.08fr 1fr; min-height: 410px;
  background: #EFF3F7; overflow: hidden; border-top: 1px solid var(--sp-border); border-bottom: 1px solid var(--sp-border);
}
.sp-fr-split-photo { position: relative; min-height: 320px; background: #0F172A; }
.sp-fr-split-photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
@media (min-width: 901px) {
  .sp-fr-split-photo { clip-path: polygon(0 0, 100% 0, 86% 100%, 0 100%); }
}
.sp-fr-split-copy {
  display: flex; flex-direction: column; justify-content: center; align-items: flex-start;
  padding: 48px 56px 48px 36px; max-width: 620px;
}
.sp-fr-split-copy h3 { font-size: clamp(1.5rem, 2.7vw, 2.05rem); font-weight: 800; margin-bottom: 14px; color: var(--sp-dark); }
.sp-fr-split-copy p { font-size: 0.98rem; color: var(--sp-slate); margin-bottom: 22px; }

/* Interactive Calculator */
.sp-calc-grid { display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 28px; align-items: center; }
.sp-calc-readout { background: linear-gradient(145deg, var(--sp-green), #052617); color: #FFFFFF; padding: 28px; border-radius: 12px; }
.sp-calc-big { font-size: 2.15rem; font-weight: 900; color: #FF8B47; line-height: 1.1; }
.sp-calc-metrics { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin: 18px 0; }
.sp-calc-metric-box { background: rgba(255,255,255,0.09); padding: 12px; border-radius: 8px; }
.sp-calc-metric-box strong { display: block; font-size: 1.25rem; color: #FFFFFF; }
.sp-calc-metric-box span { font-size: 0.78rem; color: #A7F3D0; }

/* Forms, Tables, KPIs, Admin & Portal Dashboards */
.sp-form { display: grid; gap: 14px; }
.sp-form-row { display: grid; gap: 6px; }
.sp-form-row label { font-size: 0.86rem; font-weight: 700; color: var(--sp-dark); }
.sp-form input, .sp-form select, .sp-form textarea, .sp-input, .sp-select {
  width: 100%; padding: 11px 13px; border: 1.5px solid var(--sp-border); border-radius: 7px;
  font-family: inherit; font-size: 0.94rem; color: var(--sp-dark); background: #FFFFFF;
}
.sp-form input:focus, .sp-form select:focus, .sp-form textarea:focus, .sp-input:focus { outline: none; border-color: var(--sp-orange); box-shadow: 0 0 0 3px rgba(255,90,0,0.12); }

.sp-kpi-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; }
.sp-kpi-card { background: #FFFFFF; border: 1px solid var(--sp-border); border-left: 4px solid var(--sp-orange); border-radius: 10px; padding: 20px; box-shadow: 0 4px 12px rgba(15,23,42,0.04); }
.sp-kpi-val { font-size: 1.85rem; font-weight: 900; color: var(--sp-dark); line-height: 1.1; }
.sp-kpi-lbl { font-size: 0.82rem; font-weight: 700; color: var(--sp-muted); text-transform: uppercase; letter-spacing: 0.6px; margin-top: 6px; }

.sp-tab-bar { display: flex; gap: 8px; flex-wrap: wrap; border-bottom: 2px solid var(--sp-border); padding-bottom: 10px; margin-bottom: 24px; }
.sp-tab-btn {
  padding: 10px 16px; border-radius: 7px; border: 1px solid var(--sp-border);
  background: var(--sp-bg-soft); color: var(--sp-slate); font-weight: 700; cursor: pointer; font-family: inherit;
  transition: all 0.2s ease;
}
.sp-tab-btn.active { background: var(--sp-orange); color: #FFFFFF; border-color: var(--sp-orange); }

.sp-pill { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 0.78rem; font-weight: 800; }
.sp-pill-green { background: #DCFCE7; color: #166534; }
.sp-pill-orange { background: #FFEDD5; color: #9A3412; }
.sp-pill-blue { background: #DBEAFE; color: #1E40AF; }
.sp-pill-red { background: #FEE2E2; color: #991B1B; }
.sp-pill-slate { background: #F1F5F9; color: #334155; }
.sp-tag-inline { display: inline-block; background: #FFF2EB; color: var(--sp-orange-dark); font-size: 0.74rem; font-weight: 800; padding: 2px 8px; border-radius: 4px; text-transform: uppercase; letter-spacing: 0.4px; }

/* 6-Stage Portal Progress Bar */
.sp-stage-bar { display: grid; grid-template-columns: repeat(6, 1fr); gap: 8px; margin-top: 16px; }
.sp-stage-step { background: var(--sp-bg-soft); border: 1px solid var(--sp-border); border-radius: 6px; padding: 8px 6px; text-align: center; font-size: 0.74rem; font-weight: 700; color: var(--sp-muted); }
.sp-stage-step.done { background: #DCFCE7; border-color: #86EFAC; color: #166534; }
.sp-stage-step.current { background: #FFF2EB; border-color: var(--sp-orange); color: var(--sp-orange-dark); box-shadow: 0 2px 8px rgba(255,90,0,0.18); }

.sp-mc-meter { height: 8px; background: #E2E8F0; border-radius: 4px; overflow: hidden; margin-top: 5px; }
.sp-mc-fill { height: 100%; background: linear-gradient(90deg, var(--sp-orange), #22C55E); border-radius: 4px; }

/* FAQ, Article Reader, Legal TOC & Modals */
.sp-chip-row { display: flex; gap: 8px; flex-wrap: wrap; }
.sp-faq-search-row { display: flex; gap: 10px; flex-wrap: wrap; }
.sp-faq-search-row .sp-input { flex: 1; min-width: 240px; }
.sp-faq-layout, .sp-article-reader-grid, .sp-legal-layout, .sp-contact-grid { display: grid; grid-template-columns: 2.1fr 0.9fr; gap: 32px; align-items: start; }
.sp-legal-layout { grid-template-columns: 280px 1fr; }
.sp-toc-card { position: sticky; top: 96px; background: var(--sp-bg-soft); border: 1px solid var(--sp-border); border-radius: 10px; padding: 20px; display: grid; gap: 8px; }
.sp-toc-card a { color: var(--sp-slate); font-size: 0.9rem; font-weight: 600; padding: 4px 0; }
.sp-toc-card a:hover { color: var(--sp-orange); }
.sp-legal-block { margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid var(--sp-border); }

.sp-accordion-list { display: grid; gap: 12px; }
.sp-acc-item { border: 1px solid var(--sp-border); border-radius: 8px; background: #FFFFFF; overflow: hidden; }
.sp-acc-trigger { width: 100%; background: none; border: none; padding: 16px 20px; text-align: left; cursor: pointer; display: flex; justify-content: space-between; align-items: center; gap: 16px; font-family: inherit; }
.sp-acc-q { display: block; font-size: 1rem; font-weight: 700; color: var(--sp-dark); margin-top: 4px; }
.sp-acc-icon { font-size: 1.35rem; font-weight: 800; color: var(--sp-orange); }
.sp-acc-body { padding: 0 20px 18px; color: var(--sp-slate); border-top: 1px solid #F1F5F9; }

.sp-article-cover-img { width: 100%; max-height: 410px; object-fit: cover; border-radius: 10px; border: 1px solid var(--sp-border); }
.sp-article-meta-bar { display: flex; gap: 18px; flex-wrap: wrap; align-items: center; color: #CBD5E1; font-size: 0.9rem; }
.sp-article-lead-box { background: #FFF7F2; border-left: 4px solid var(--sp-orange); padding: 16px 20px; border-radius: 6px; font-size: 1.02rem; }
.sp-article-prose p { font-size: 1.02rem; color: #2D3748; margin-bottom: 16px; }
.sp-equipment-strip { display: flex; gap: 8px; flex-wrap: wrap; align-items: center; }
.sp-eq-badge { background: var(--sp-bg-soft); border: 1px solid var(--sp-border); padding: 4px 10px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; color: var(--sp-green); }
.sp-numbered-protocol { padding-left: 20px; display: grid; gap: 10px; font-weight: 500; }
.sp-check-list, .sp-warn-list, .sp-sitemap-list { padding-left: 18px; display: grid; gap: 8px; }
.sp-aside-links { display: grid; gap: 12px; margin-top: 12px; }
.sp-aside-link { display: block; padding: 10px 12px; background: var(--sp-bg-soft); border-radius: 7px; border: 1px solid var(--sp-border); color: var(--sp-dark); }
.sp-aside-link:hover { border-color: var(--sp-orange); }
.sp-aside-link span { display: block; font-size: 0.8rem; color: var(--sp-muted); margin-top: 2px; }
.sp-sitemap-article-item { padding: 10px; background: var(--sp-bg-soft); border-radius: 6px; border: 1px solid var(--sp-border); display: grid; gap: 4px; }
.sp-contact-channels { display: grid; gap: 14px; margin-top: 16px; }
.sp-channel-row { padding: 12px; background: var(--sp-bg-soft); border-radius: 8px; display: grid; gap: 2px; }
.sp-phone-big { font-size: 1.4rem; font-weight: 900; color: var(--sp-orange); }
.sp-mini-franchise-list { display: grid; gap: 10px; margin-top: 10px; }
.sp-mini-fr-item { display: flex; justify-content: space-between; align-items: center; padding: 10px 12px; background: var(--sp-bg-soft); border-radius: 8px; gap: 10px; }

/* Modal */
.sp-modal-card { background: #FFFFFF; border-radius: 12px; max-width: 780px; width: 100%; max-height: 88vh; overflow-y: auto; padding: 30px; position: relative; box-shadow: 0 30px 60px rgba(0,0,0,0.3); }
.sp-modal-close { position: absolute; top: 14px; right: 16px; border: none; background: var(--sp-bg-soft); width: 34px; height: 34px; border-radius: 50%; font-size: 1.4rem; cursor: pointer; }
.sp-modal-foot { display: flex; justify-content: flex-end; gap: 12px; margin-top: 22px; padding-top: 16px; border-top: 1px solid var(--sp-border); }

  .sp-table th { white-space: nowrap; }
  .sp-acc-item { transition: border-color .18s; }
  .sp-acc-item:hover { border-color: var(--sp-orange); }
  @media (max-width: 980px) {
    .sp-hero-grid, .sp-first-responder-split, .sp-calc-grid, .sp-faq-layout, .sp-article-reader-grid, .sp-legal-layout, .sp-contact-grid { grid-template-columns: 1fr; }
    .sp-kpi-row { grid-template-columns: repeat(2, 1fr); }
    .sp-stage-bar { grid-template-columns: repeat(3, 1fr); }
    .sp-fr-split-copy { padding: 32px 24px; }
  }
  @media (max-width: 560px) { .sp-kpi-row, .sp-calc-metrics { grid-template-columns: 1fr; } }
</style>
<?php
