<!-- CLEANING & RESTORATION RESOURCES, FAQ & GLOSSARY (Video 1:43, 10:29, 13:32, 14:05) -->
<nav class="sp-resource-subnav" aria-label="Resource Sections">
  <div class="sp-container sp-resource-subnav-links">
    <button type="button" :class="{ active: resourceTab === 'articles' && articleCategory === 'All' }" @click="resourceTab = 'articles'; articleCategory = 'All'">Resources Home</button>
    <button type="button" :class="{ active: resourceTab === 'articles' && articleCategory === 'Water' }" @click="resourceTab = 'articles'; articleCategory = 'Water'">Water</button>
    <button type="button" :class="{ active: resourceTab === 'articles' && articleCategory === 'Construction' }" @click="resourceTab = 'articles'; articleCategory = 'Construction'">Construction</button>
    <button type="button" :class="{ active: resourceTab === 'articles' && articleCategory === 'Mold' }" @click="resourceTab = 'articles'; articleCategory = 'Mold'">Mold</button>
    <button type="button" :class="{ active: resourceTab === 'articles' && articleCategory === 'Specialty Cleaning' }" @click="resourceTab = 'articles'; articleCategory = 'Specialty Cleaning'">Specialty Cleaning</button>
    <button type="button" :class="{ active: resourceTab === 'faq' }" @click="resourceTab = 'faq'">FAQ</button>
    <button type="button" :class="{ active: resourceTab === 'glossary' }" @click="resourceTab = 'glossary'">Glossary</button>
    <a href="<?= e(url('/insurance')) ?>">Insurance Professionals</a>
  </div>
</nav>

<!-- ARTICLES DIRECTORY VIEW -->
<section class="sp-section" v-if="resourceTab === 'articles'">
  <div class="sp-container">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:18px; margin-bottom:26px;">
      <div>
        <span class="sp-badge sp-badge-orange">Homeowner &amp; Commercial Library</span>
        <h1 style="font-size:clamp(30px, 3.2vw, 40px); font-weight:300; color:#2B333C; margin:10px 0 4px;">
          {{ articleCategory === 'All' ? 'Cleaning & Restoration Guides' : articleCategory + ' Damage Resources' }}
        </h1>
      </div>
      <div style="min-width:290px; flex:0 1 360px;">
        <input type="text" class="sp-input" v-model="articleSearch" placeholder="Filter guides (e.g. laminate, baseboards, roof leak)...">
      </div>
    </div>

    <div v-if="filteredArticles.length === 0" class="sp-form-card" style="text-align:center;">
      <p style="margin:0 0 12px; color:var(--sp-muted);">No articles matched your search query.</p>
      <button type="button" class="sp-btn sp-btn-orange sp-btn-sm" @click="articleCategory = 'All'; articleSearch = ''">Show All Articles</button>
    </div>

    <div v-for="art in filteredArticles" :key="art.id" class="sp-article-row">
      <img :src="art.image" :alt="art.title" class="sp-article-row-thumb">
      <div>
        <span class="sp-badge sp-badge-orange" style="margin-bottom:8px;">{{ art.tag }}</span>
        <h3>{{ art.title }}</h3>
        <div style="font-size:12.5px; color:#6B7280; margin-bottom:8px;">{{ art.date }} &bull; {{ art.read_time }}</div>
        <p>{{ art.excerpt }}</p>
        <div style="display:flex; flex-wrap:wrap; gap:10px; align-items:center;">
          <button type="button" class="sp-chevron-btn" @click="openArticleModal(art)" style="padding:9px 26px 9px 18px; font-size:13.5px;">Read Full Guide</button>
          <a :href="'<?= e(url('/resources/article?id=')) ?>' + art.id" class="sp-btn sp-btn-outline sp-btn-sm">Read Full Manual</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ARTICLE READER MODAL -->
<div class="sp-modal-backdrop" v-if="activeArticle" @click.self="activeArticle = null">
  <div class="sp-modal">
    <button type="button" class="sp-modal-close" @click="activeArticle = null" aria-label="Close"><i class="ph-bold ph-x"></i></button>
    <span class="sp-badge sp-badge-orange">{{ activeArticle.tag }}</span>
    <h2 style="margin:10px 0 6px; color:#22262A;">{{ activeArticle.title }}</h2>
    <div style="font-size:12.5px; color:var(--sp-muted); margin-bottom:16px;">{{ activeArticle.date }} &bull; {{ activeArticle.read_time }}</div>
    <img :src="activeArticle.image" :alt="activeArticle.title" style="width:100%; height:230px; object-fit:cover; border-radius:4px; margin-bottom:16px;">
    <p v-for="(para, pIdx) in activeArticle.body" :key="pIdx" style="font-size:15px; color:#374151; line-height:1.7; margin:0 0 12px;">
      {{ para }}
    </p>
    <div style="margin-top:20px; padding-top:14px; border-top:1px solid var(--sp-border); display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">
      <strong style="color:#22262A; font-size:14px;">Need professional help with this issue?</strong>
      <a href="<?= e(url('/#request')) ?>" class="sp-chevron-btn">Request 24/7 Service</a>
    </div>
  </div>
</div>

<!-- FAQ TAB VIEW (Video 1:43) -->
<section class="sp-section" v-if="resourceTab === 'faq'">
  <div class="sp-container" style="max-width:920px;">
    <div style="text-align:center; margin-bottom:28px;">
      <span class="sp-badge sp-badge-orange">Verified Homeowner Answers</span>
      <h1 style="font-size:clamp(30px, 3.2vw, 42px); font-weight:300; color:#2B333C; margin:10px 0 8px;">Frequently Asked Questions</h1>
      <p style="color:var(--sp-muted); font-size:15.5px; margin:0 0 12px;">Clear answers about emergency response times, moisture standards, insurance coordination, and reconstruction.</p>
      <a href="<?= e(url('/faq')) ?>" class="sp-btn sp-btn-outline sp-btn-sm">Open Dedicated 32-FAQ Search Portal</a>
    </div>

    <div class="sp-filter-bar" style="justify-content:center;">
      <button v-for="cat in ['All', 'Water', 'Mold', 'Fire', 'Storm', 'Insurance', 'Construction']"
              :key="cat"
              type="button"
              class="sp-chip"
              :class="{ active: globalFaqCat === cat }"
              @click="globalFaqCat = cat; openFaqIndex = 0">
        {{ cat }}
      </button>
    </div>

    <div v-for="(faq, idx) in filteredGlobalFaqs" :key="faq.q" class="sp-faq-clean-item">
      <button type="button" class="sp-faq-clean-btn" @click="toggleFaq(idx)">
        <span>{{ faq.q }}</span>
        <i class="ph-bold" :class="openFaqIndex === idx ? 'ph-caret-up' : 'ph-caret-down'"></i>
      </button>
      <div class="sp-faq-clean-body" v-show="openFaqIndex === idx">
        <span class="sp-badge sp-badge-orange" style="margin-bottom:8px;">{{ faq.cat }}</span>
        <div>{{ faq.a }}</div>
      </div>
    </div>
  </div>
</section>

<!-- GLOSSARY A–Z INDEX VIEW (Video 13:32) -->
<section class="sp-section" v-if="resourceTab === 'glossary'">
  <div class="sp-container">
    <div style="text-align:center;">
      <span class="sp-badge sp-badge-orange">IICRC Restoration Terminology</span>
      <h1 style="font-size:clamp(34px, 3.6vw, 46px); font-weight:300; color:#2B333C; margin:10px 0 6px;">Glossary</h1>
      <p style="color:var(--sp-muted); font-size:15.5px; max-width:660px; margin:0 auto;">Select any letter below to explore cleanup, mitigation, psychrometrics, and insurance claim definitions.</p>
    </div>

    <div class="sp-glossary-alpha">
      <button type="button" class="sp-glossary-letter-btn" :class="{ active: activeGlossaryLetter === 'all' }" @click="activeGlossaryLetter = 'all'">all</button>
      <button v-for="letter in Object.keys(glossary)"
              :key="letter"
              type="button"
              class="sp-glossary-letter-btn"
              :class="{ active: activeGlossaryLetter === letter }"
              @click="activeGlossaryLetter = letter">
        {{ letter }}
      </button>
    </div>

    <div v-for="grp in glossaryEntries" :key="grp.letter" class="sp-glossary-group">
      <h2>{{ grp.letter }}</h2>
      <div class="sp-glossary-cols">
        <div v-for="item in grp.terms" :key="item.term" class="sp-glossary-term-card">
          <strong style="display:block; color:#22262A; font-size:15.5px; margin-bottom:6px;">{{ item.term }}</strong>
          <span style="font-size:13.5px; color:var(--sp-muted); line-height:1.6; display:block;">{{ item.def }}</span>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
