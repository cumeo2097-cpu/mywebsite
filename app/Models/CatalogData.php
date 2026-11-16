<?php
declare(strict_types=1);

namespace App\Models;

class CatalogData
{
    public static function mediaMap(): array
    {
        $keys = [
            'hero_fleet_banner',
            'hero_van_techs_clean',
            'water_hardwood_hero',
            'water_hardwood_clean',
            'careers_presentation',
            'firefighter_hose',
            'first_responder_bowl',
            'firefighter_league_logo',
            'insurance_consult',
            'fire_framing',
            'mold_hazmat',
            'residential_ceiling',
            'commercial_largeloss',
            'commercial_handshake',
            'packout_warehouse',
            'history_hq',
            'article_laminate',
            'article_baseboard',
            'article_roof_leak',
            'article_slab_leak',
        ];
        $out = [];
        foreach ($keys as $k) {
            $out[$k] = sp_img($k);
        }
        return $out;
    }

    public static function megaMenus(): array
    {
        return [
            'residential' => [
                [
                    'key' => 'water',
                    'label' => 'Water Damage',
                    'icon' => 'drop',
                    'title' => 'Water Damage Restoration Services',
                    'url' => '/services/water-damage',
                    'desc' => 'When water invades your home, rapid extraction and scientific drying protect hardwood, drywall, and subfloors within hours.',
                    'image' => sp_img('water_hardwood_clean'),
                    'links' => [
                        ['label' => 'Water Damage Restoration & Extraction', 'url' => '/services/water-damage'],
                        ['label' => 'Flooded Basement & Crawlspace Cleanup', 'url' => '/services/water-damage'],
                        ['label' => 'Burst Pipe & Appliance Leak Mitigation', 'url' => '/services/water-damage'],
                        ['label' => 'Sewage & Black Water Remediation', 'url' => '/services/biohazard-cleaning'],
                    ],
                ],
                [
                    'key' => 'fire',
                    'label' => 'Fire Damage',
                    'icon' => 'flame',
                    'title' => 'Fire & Smoke Restoration Services',
                    'url' => '/services/fire-damage',
                    'desc' => 'From immediate board-up and roof tarping to soot decontamination and deep thermal fogging odor neutralization.',
                    'image' => sp_img('fire_framing'),
                    'links' => [
                        ['label' => 'Fire & Smoke Damage Restoration', 'url' => '/services/fire-damage'],
                        ['label' => 'Soot & Smoke Odor Removal', 'url' => '/services/fire-damage'],
                        ['label' => 'Emergency Board-Up & Roof Tarping', 'url' => '/services/fire-damage'],
                        ['label' => 'Contents Pack-Out & Ultrasonic Cleaning', 'url' => '/services/specialty-cleaning'],
                    ],
                ],
                [
                    'key' => 'mold',
                    'label' => 'Mold',
                    'icon' => 'mold',
                    'title' => 'Mold Removal & Remediation Services',
                    'url' => '/services/mold-remediation',
                    'desc' => 'Mold can begin growing within 24–72 hours on almost any surface with moisture, so if you suspect mold in your home, contact RescuePro® for professional remediation.',
                    'image' => sp_img('mold_hazmat'),
                    'links' => [
                        ['label' => 'Mold Removal & Remediation', 'url' => '/services/mold-remediation'],
                        ['label' => 'Mold Inspections and Sampling', 'url' => '/services/mold-remediation#process'],
                        ['label' => 'Contents Pack Out & Storage', 'url' => '/services/specialty-cleaning'],
                    ],
                ],
                [
                    'key' => 'storm',
                    'label' => 'Storm/Disaster',
                    'icon' => 'storm',
                    'title' => 'Storm & Major Disaster Recovery',
                    'url' => '/services/storm-damage',
                    'desc' => 'Over 2,410 independently owned and operated franchises backed by National Catastrophe (CAT) storm convoys.',
                    'image' => sp_img('commercial_largeloss'),
                    'links' => [
                        ['label' => 'Hurricane, Tornado & High Wind Cleanup', 'url' => '/services/storm-damage'],
                        ['label' => 'Emergency Roof Tarping & Tree Debris', 'url' => '/services/storm-damage'],
                        ['label' => 'Winter Freeze & Ice Dam Water Recovery', 'url' => '/services/storm-damage'],
                    ],
                ],
                [
                    'key' => 'construction',
                    'label' => 'Construction',
                    'icon' => 'hammer',
                    'title' => 'Residential Construction & Rebuild',
                    'url' => '/services/construction',
                    'desc' => 'One company from mitigation through final finishes—seamlessly reconstructing drywall, cabinetry, roofing, and flooring.',
                    'image' => sp_img('residential_ceiling'),
                    'links' => [
                        ['label' => 'Full Home Reconstruction & Contracting', 'url' => '/services/construction'],
                        ['label' => 'Drywall, Flooring & Finish Carpentry', 'url' => '/services/construction'],
                        ['label' => 'Roof Repair & Structural Framing', 'url' => '/services/construction'],
                    ],
                ],
                [
                    'key' => 'biohazard',
                    'label' => 'Biohazard',
                    'icon' => 'biohazard',
                    'title' => 'Biohazard & Crime Scene Cleanup',
                    'url' => '/services/biohazard-cleaning',
                    'desc' => 'Compassionate, OSHA-compliant decontamination for trauma scenes, hoarding environments, chemicals, and pathogen exposures.',
                    'image' => sp_img('mold_hazmat'),
                    'links' => [
                        ['label' => 'Biohazard, Trauma & Crime Scene Cleanup', 'url' => '/services/biohazard-cleaning'],
                        ['label' => 'Hoarding & Extreme Clutter Remediation', 'url' => '/services/biohazard-cleaning'],
                        ['label' => 'Viruses, Pathogens & Sewage Decontamination', 'url' => '/services/biohazard-cleaning'],
                    ],
                ],
                [
                    'key' => 'cleaning',
                    'label' => 'General Cleaning',
                    'icon' => 'spray',
                    'title' => 'Residential Cleaning Services',
                    'url' => '/service/cleaning',
                    'desc' => 'Deep carpet extraction, HVAC & air duct cleaning, upholstery care, and tough smoke or pet odor removal.',
                    'image' => sp_img('residential_ceiling'),
                    'links' => [
                        ['label' => 'Air Ducts & HVAC Ventilation Cleaning', 'url' => '/service/cleaning'],
                        ['label' => 'Carpet, Rug & Upholstery Deep Extraction', 'url' => '/service/cleaning'],
                        ['label' => 'Ceiling, Wall & Floor Restoration Clean', 'url' => '/service/cleaning'],
                    ],
                ],
                [
                    'key' => 'specialty',
                    'label' => 'Specialty Cleaning',
                    'icon' => 'sparkle',
                    'title' => 'Specialty Restoration & Cleaning',
                    'url' => '/services/specialty-cleaning',
                    'desc' => 'Specialized pack-out inventorying, electronics recovery, document freeze-drying, and fine art conservation cleaning.',
                    'image' => sp_img('packout_warehouse'),
                    'links' => [
                        ['label' => 'Contents Pack-Out, Inventory & Storage', 'url' => '/services/specialty-cleaning'],
                        ['label' => 'Document & Archives Freeze-Drying', 'url' => '/services/specialty-cleaning'],
                        ['label' => 'Certified: RescuePro Cleaned® Programs', 'url' => '/services/specialty-cleaning'],
                    ],
                ],
            ],
            'commercial' => [
                [
                    'key' => 'large_loss',
                    'label' => 'Large Loss',
                    'icon' => 'building',
                    'title' => 'Commercial Large Loss Division',
                    'url' => '/commercial',
                    'desc' => 'Dedicated Disaster Recovery Teams equipped with truck-mounted desiccant dehumidifiers and generators for high-value commercial structures.',
                    'image' => sp_img('commercial_handshake'),
                    'links' => [
                        ['label' => 'Commercial Large Loss Restoration', 'url' => '/commercial'],
                        ['label' => 'Catastrophic Damage & Disaster Recovery Team', 'url' => '/commercial'],
                        ['label' => 'Hospitality, Healthcare & Multi-Family', 'url' => '/commercial'],
                    ],
                ],
                [
                    'key' => 'erp',
                    'label' => 'Ready Plan',
                    'icon' => 'shield',
                    'title' => 'Emergency Ready Plan (ERP)',
                    'url' => '/commercial/erp',
                    'desc' => 'Up to 50% of businesses close permanently after a major disaster without a recovery plan. Create your free ERP shut-off profile.',
                    'image' => sp_img('packout_warehouse'),
                    'links' => [
                        ['label' => 'Commercial Emergency Ready Profile (ERP)', 'url' => '/commercial/erp'],
                        ['label' => 'Facility Shut-Off Valve & Panel Mapping', 'url' => '/commercial/erp'],
                        ['label' => 'Priority Commercial Dispatch Authorization', 'url' => '/commercial/erp'],
                    ],
                ],
                [
                    'key' => 'industries',
                    'label' => 'Industries Served',
                    'icon' => 'layers',
                    'title' => 'Commercial Industries Served',
                    'url' => '/commercial#industries',
                    'desc' => 'Tailored mitigation compliance for hospitals (ICRA), hotels, schools, retail centers, municipal facilities, and manufacturing plants.',
                    'image' => sp_img('commercial_largeloss'),
                    'links' => [
                        ['label' => 'Healthcare & Medical Facilities', 'url' => '/commercial#industries'],
                        ['label' => 'Hospitality, Resorts & Retail', 'url' => '/commercial#industries'],
                        ['label' => 'Education, Government & Manufacturing', 'url' => '/commercial#industries'],
                    ],
                ],
                [
                    'key' => 'c_water',
                    'label' => 'Water Damage',
                    'icon' => 'drop',
                    'title' => 'Commercial Water Removal & Drying',
                    'url' => '/services/water-damage',
                    'desc' => 'High-capacity commercial extraction and low-grain desiccant drying designed to minimize tenant and operational disruption.',
                    'image' => sp_img('water_hardwood_clean'),
                    'links' => [
                        ['label' => 'Sprinkler Discharge & High-Rise Extraction', 'url' => '/services/water-damage'],
                        ['label' => 'Commercial Desiccant Dehumidification', 'url' => '/commercial'],
                    ],
                ],
                [
                    'key' => 'c_fire',
                    'label' => 'Fire Damage',
                    'icon' => 'flame',
                    'title' => 'Commercial Fire & Soot Restoration',
                    'url' => '/services/fire-damage',
                    'desc' => 'Rapid board-up, commercial HVAC ductwork decontamination, machinery cleaning, and full multi-unit rebuild.',
                    'image' => sp_img('fire_framing'),
                    'links' => [
                        ['label' => 'Commercial Fire & Smoke Cleanup', 'url' => '/services/fire-damage'],
                        ['label' => 'Industrial Equipment & Inventory Recovery', 'url' => '/commercial'],
                    ],
                ],
                [
                    'key' => 'c_mold',
                    'label' => 'Mold',
                    'icon' => 'mold',
                    'title' => 'Commercial Mold Remediation',
                    'url' => '/services/mold-remediation',
                    'desc' => 'Strict negative-air containment chambers, HEPA filtration, and post-remediation clearance coordination.',
                    'image' => sp_img('mold_hazmat'),
                    'links' => [
                        ['label' => 'Commercial Mold Containment & HEPA', 'url' => '/services/mold-remediation'],
                        ['label' => 'Indoor Air Quality & Coil Decontamination', 'url' => '/service/cleaning'],
                    ],
                ],
                [
                    'key' => 'c_storm',
                    'label' => 'Storm/Disaster',
                    'icon' => 'storm',
                    'title' => 'Commercial Catastrophe Response',
                    'url' => '/services/storm-damage',
                    'desc' => 'Self-contained power generators, mobile command semi-trailers, and regional storm task forces ready nationwide.',
                    'image' => sp_img('hero_van_techs_clean'),
                    'links' => [
                        ['label' => 'Commercial Storm & Flood Recovery', 'url' => '/services/storm-damage'],
                        ['label' => 'Emergency Roof Tarping & Shoring', 'url' => '/services/storm-damage'],
                    ],
                ],
                [
                    'key' => 'c_construction',
                    'label' => 'Construction',
                    'icon' => 'hammer',
                    'title' => 'Commercial Construction Division',
                    'url' => '/services/construction',
                    'desc' => 'Turnkey pre-construction estimating, code-upgrade contracting, and commercial build-back under one roof.',
                    'image' => sp_img('residential_ceiling'),
                    'links' => [
                        ['label' => 'Pre-Construction & Construction Phases', 'url' => '/commercial#phases'],
                        ['label' => 'Commercial General Contracting', 'url' => '/services/construction'],
                    ],
                ],
                [
                    'key' => 'c_biohazard',
                    'label' => 'Biohazard',
                    'icon' => 'biohazard',
                    'title' => 'Commercial Biohazard & Trauma',
                    'url' => '/services/biohazard-cleaning',
                    'desc' => 'Discreet fleet vehicle, retail, and workplace pathogen and chemical residue remediation.',
                    'image' => sp_img('mold_hazmat'),
                    'links' => [
                        ['label' => 'Squad Cars, Fleets & Commercial Biohazard', 'url' => '/services/biohazard-cleaning'],
                        ['label' => 'EPA List N Pathogen Sanitization', 'url' => '/services/biohazard-cleaning'],
                    ],
                ],
                [
                    'key' => 'c_cleaning',
                    'label' => 'General Cleaning',
                    'icon' => 'spray',
                    'title' => 'Commercial Specialty Cleaning',
                    'url' => '/services/specialty-cleaning',
                    'desc' => 'Preventive HVAC duct cleaning, high-ceiling dustdowns, and VCT/tile restoration for commercial venues.',
                    'image' => sp_img('packout_warehouse'),
                    'links' => [
                        ['label' => 'Commercial Ductwork & Air Handling', 'url' => '/service/cleaning'],
                        ['label' => 'Document & Media Recovery', 'url' => '/services/specialty-cleaning'],
                    ],
                ],
            ],
            'resources' => [
                [
                    'key' => 'res_home',
                    'label' => 'Resources Home',
                    'icon' => 'book',
                    'title' => 'Cleaning & Restoration Resource Center',
                    'url' => '/resources',
                    'desc' => 'Practical repair checklists, disaster safety advisories, Frequently Asked Questions, and our restoration Glossary.',
                    'image' => sp_img('article_laminate'),
                    'links' => [
                        ['label' => 'Browse All Restoration Articles', 'url' => '/resources'],
                        ['label' => 'Frequently Asked Questions (FAQ)', 'url' => '/resources?tab=faq'],
                        ['label' => 'Restoration Terms Glossary (A–Z)', 'url' => '/resources?tab=glossary'],
                    ],
                ],
                [
                    'key' => 'res_water',
                    'label' => 'Water Damage Guides',
                    'icon' => 'drop',
                    'title' => 'Water Damage & Flood Guides',
                    'url' => '/resources?cat=Water',
                    'desc' => 'Step-by-step guidance on warped laminate flooring, swollen baseboards, slab leaks, and emergency shut-off steps.',
                    'image' => sp_img('article_baseboard'),
                    'links' => [
                        ['label' => 'How to Repair Water Damaged Laminate Flooring', 'url' => '/resources?cat=Water'],
                        ['label' => 'How to Fix Water Damage on Baseboards', 'url' => '/resources?cat=Water'],
                    ],
                ],
                [
                    'key' => 'res_construction',
                    'label' => 'Construction Guides',
                    'icon' => 'hammer',
                    'title' => 'Construction & Structural Repair Guides',
                    'url' => '/resources?cat=Construction',
                    'desc' => 'Identify subtle roof leak trails, concrete foundation slab leaks, and rebuild timelines.',
                    'image' => sp_img('article_roof_leak'),
                    'links' => [
                        ['label' => 'How to Fix a Roof Leak Quickly', 'url' => '/resources?cat=Construction'],
                        ['label' => 'Slab Leak Repair: Signs & Options', 'url' => '/resources?cat=Construction'],
                    ],
                ],
                [
                    'key' => 'res_insurance',
                    'label' => 'Insurance Professionals',
                    'icon' => 'shield',
                    'title' => 'Insurance Claim Process & CE Credit',
                    'url' => '/insurance',
                    'desc' => 'Carrier SLAs, Xactimate line-item scoping, daily psychrometric drying logs, and Continuing Education courses.',
                    'image' => sp_img('insurance_consult'),
                    'links' => [
                        ['label' => 'How RescuePro Helps With Insurance Claims', 'url' => '/insurance'], ['label' => 'Carrier Preferred Vendor Program', 'url' => '/about/preferred-vendor'],
                        ['label' => 'Register for Accredited CE Courses', 'url' => '/insurance#ce-register'],
                    ],
                ],
            ],
        ];
    }

    public static function services(): array
    {
        return [
            'water' => [
                'slug' => 'water',
                'url' => '/services/water-damage',
                'badge' => 'RESIDENTIAL & COMMERCIAL • IICRC S500',
                'title' => 'Water Damage Restoration and Cleanup Services',
                'short_title' => 'Water Damage',
                'tagline' => 'Every hour counts to prevent secondary structural saturation and microbial growth within 24–48 hours.',
                'summary' => 'Rapid 24/7 emergency water extraction, structural dehumidification, thermal moisture mapping, and complete sanitization.',
                'hero_image' => sp_img('water_hardwood_hero'),
                'card_image' => sp_img('water_hardwood_clean'),
                'accent' => '#FF5A00',
                'quick_links' => [
                    'Water Extraction & Drying Process',
                    'Category 1, 2 & 3 Water Classifications',
                    'Basement & Crawlspace Flooding',
                    'Hardwood Floor & Subfloor Drying',
                    'Burst Pipe & Winter Freeze Cleanup',
                    'Insurance Documentation & Xactimate',
                ],
                'process4' => [
                    ['step' => 'Assess', 'icon' => 'truck', 'desc' => 'Inspect water source, determine loss category, and map moisture using infrared imaging.'],
                    ['step' => 'Secure', 'icon' => 'home', 'desc' => 'Stop active intrusion, protect salvageable furnishings, and deploy safety containment.'],
                    ['step' => 'Clean', 'icon' => 'spray', 'desc' => 'Extract standing water with truck-mounted pumps and apply antimicrobial sanitizers.'],
                    ['step' => 'Restore', 'icon' => 'restore', 'desc' => 'Dry structure to standard targets with LGR dehumidifiers and rebuild damaged finishes.'],
                ],
                'steps' => [
                    ['num' => '1', 'title' => 'Emergency Contact', 'desc' => 'Your restoration process begins when you call our National Call Center. A specialist asks key scope questions so your local team arrives with exact pumping and drying resources.'],
                    ['num' => '2', 'title' => 'Inspection and Water Damage Assessment', 'desc' => 'Our certified technicians inspect the water source, identify Category 1, 2, or 3 contamination, and map hidden wall and subfloor dampness with thermal cameras.'],
                    ['num' => '3', 'title' => 'Water Removal / Water Extraction', 'desc' => 'Truck-mounted submersible pumps and industrial extractors remove hundreds of gallons of standing water rapidly before swelling and delamination escalate.'],
                    ['num' => '4', 'title' => 'Drying and Dehumidification', 'desc' => 'High-velocity air movers and commercial Low-Grain Refrigerant (LGR) or desiccant dehumidifiers draw trapped moisture from hardwood, drywall, and studs.'],
                    ['num' => '5', 'title' => 'Cleaning and Sanitizing', 'desc' => 'Belongings, trim, and framing undergo specialized wet/dry cleaning, antimicrobial sanitization, and industrial odor neutralization.'],
                    ['num' => '6', 'title' => 'Restoration and Rebuild', 'desc' => 'The final step makes your home or business "Like it never even happened." Repairs range from installing a few drywall panels and repainting to major structural reconstruction.'],
                ],
                'causes' => [
                    'Burst or frozen supply pipes inside exterior walls',
                    'Basement flooding, groundwater seepage & sump pump failure',
                    'Roof leaks, storm runoff & structural breaches',
                    'Water heater ruptures & washing machine hose bursts',
                    'Category 3 sewage backups & municipal drain overflows',
                    'Firefighting hose water & overhead sprinkler discharge',
                ],
                'equipment' => [
                    'Penetrating & Non-Penetrating Digital Moisture Meters',
                    'FLIR Infrared Thermal Imaging Moisture Cameras',
                    'Truck-Mounted High-CFM Water Extraction Units',
                    'Low-Grain Refrigerant (LGR) & Desiccant Dehumidifiers',
                    'High-Velocity Axial & Centrifugal Air Movers',
                ],
                'faqs' => [
                    ['q' => 'How quickly can a RescuePro crew arrive after water damage?', 'a' => 'We maintain 24/7/365 emergency dispatch teams nationwide. A specialist contacts you rapidly after intake and routes certified technicians directly to your door to begin mitigation fast.'],
                    ['q' => 'What is the difference between Category 1, 2, and 3 water?', 'a' => 'Category 1 originates from a clean sanitary supply line. Category 2 (grey water) carries chemical or biological contaminants such as appliance discharge. Category 3 (black water) includes sewage backups and outdoor flooding requiring strict containment and full PPE.'],
                    ['q' => 'How does RescuePro help with my homeowners insurance claim?', 'a' => 'We document daily psychrometric moisture readings, capture clear pre- and post-mitigation photos, and prepare standardized Xactimate line-item documentation aligned with insurance adjusters.'],
                    ['q' => 'How long does structural drying typically take?', 'a' => 'Most residential structural drying cycles complete in 3 to 5 days depending on saturation depth, wood/drywall density, and indoor relative humidity levels.'],
                ],
            ],
            'fire' => [
                'slug' => 'fire',
                'url' => '/services/fire-damage',
                'badge' => 'FIRE, SOOT & ODOR • IICRC FSRT',
                'title' => 'Fire Damage Restoration and Smoke Cleanup',
                'short_title' => 'Fire & Smoke Damage',
                'tagline' => 'Managing acidic soot residues, smoke odor infiltration, board-up security, and firefighting water damage simultaneously.',
                'summary' => 'Emergency board-up, roof tarping, dry-chemical soot cleanup, thermal fogging deodorization, and full reconstruction.',
                'hero_image' => sp_img('fire_framing'),
                'card_image' => sp_img('fire_framing'),
                'accent' => '#FF5A00',
                'quick_links' => [
                    'Emergency Board-Up & Roof Tarping',
                    'Acidic Smoke & Soot Neutralization',
                    'Thermal Fogging Odor Removal',
                    'Contents Pack-Out & Inventory',
                    'HVAC Ductwork Decontamination',
                    'Structural Fire Reconstruction',
                ],
                'process4' => [
                    ['step' => 'Assess', 'icon' => 'truck', 'desc' => 'We assess the fire damage, inspect safety, and plan your restoration.'],
                    ['step' => 'Secure', 'icon' => 'home', 'desc' => 'Board-up and tarping for security and to prevent further damage.'],
                    ['step' => 'Clean', 'icon' => 'spray', 'desc' => 'We remove affected materials and clean restorable surfaces and contents.'],
                    ['step' => 'Restore', 'icon' => 'restore', 'desc' => 'Rebuild and restore your space to pre-loss condition quickly and carefully.'],
                ],
                'steps' => [
                    ['num' => '1', 'title' => 'Emergency Contact', 'desc' => 'Immediately after fire department clearance, call our 24/7 dispatch center so an emergency crew responds to secure the structure.'],
                    ['num' => '2', 'title' => 'Inspection and Fire Damage Assessment', 'desc' => 'Specialists examine framing stability, smoke migration paths inside ductwork, and soot type (protein, synthetic, or natural wood).'],
                    ['num' => '3', 'title' => 'Immediate Board-Up and Roof-Tarp', 'desc' => 'Shattered windows, breached doors, and damaged roof openings are secured immediately to block weather and unauthorized access.'],
                    ['num' => '4', 'title' => 'Water Removal and Drying', 'desc' => 'Because fire suppression saturates floors and ceilings, crews extract standing water and dry structural cavities right away.'],
                    ['num' => '5', 'title' => 'Soot Removal and Deodorization', 'desc' => 'Using HEPA air scrubbers, specialized soot sponges, and thermal foggers, crews neutralize embedded smoke molecules from walls and textiles.'],
                    ['num' => '6', 'title' => 'Restoration and Rebuild', 'desc' => 'Salvaged contents return from climate storage and our construction division rebuilds framing, electrical, cabinetry, and interiors.'],
                ],
                'causes' => [
                    'Kitchen grease flare-ups & cooking fires',
                    'Faulty electrical panels, wiring arcs & power strips',
                    'Furnace puff-backs distributing oily soot via ductwork',
                    'Fireplace ember escapes & portable heater accidents',
                    'Wildfire smoke infiltration into HVAC systems',
                    'Secondary saturation from firefighting hoses & sprinklers',
                ],
                'equipment' => [
                    'True HEPA Negative Air Scrubbers',
                    'Thermal Fogging Deodorization Units',
                    'Hydroxyl & Commercial Ozone Generators',
                    'Ultrasonic Contents & Electronics Baths',
                    'Dry-Chemical Vulcanized Soot Sponges',
                ],
                'faqs' => [
                    ['q' => 'Should I wipe soot off my walls before RescuePro arrives?', 'a' => 'Avoid wiping soot with damp cloths or household cleaners. Soot is highly acidic and greasy—wiping without specialized dry sponges smears carbon permanently into paint and plaster.'],
                    ['q' => 'How is stubborn burnt smoke odor removed permanently?', 'a' => 'We remove charred sources, clean HVAC ductwork, and deploy thermal fogging plus hydroxyl oxidation to break down odor molecules inside microscopic pores.'],
                    ['q' => 'What happens to furniture, clothes, and personal items?', 'a' => 'Our contents specialists inventory, pack out, ultrasonically clean or ozone-deodorize restorable items at our warehouse, and store them safely until reconstruction finishes.'],
                ],
            ],
            'mold' => [
                'slug' => 'mold',
                'url' => '/services/mold-remediation',
                'badge' => 'CONTAINMENT & HEPA • IICRC S520',
                'title' => 'Mold Remediation, Removal & Inspection',
                'short_title' => 'Mold',
                'tagline' => 'Significant mold growth can happen in just 24 to 72 hours (about 3 days) when moisture persists.',
                'summary' => 'Negative air pressure containment barriers, 0.3-micron HEPA air filtration, antimicrobial remediation, and moisture correction.',
                'hero_image' => sp_img('mold_hazmat'),
                'card_image' => sp_img('mold_hazmat'),
                'accent' => '#FF5A00',
                'quick_links' => [
                    'Mold Removal vs. Remediation',
                    'What is Black Mold?',
                    'Mold Remediation Process',
                    'Attic Mold Removal',
                    'Basement & Crawlspace Mold',
                    'Contents Pack Out & Storage',
                ],
                'process4' => [
                    ['step' => 'Assess', 'icon' => 'truck', 'desc' => 'Trace visible colonies and detect concealed dampness inside framing and chases.'],
                    ['step' => 'Secure', 'icon' => 'home', 'desc' => 'Isolate affected zones using negative-pressure poly containment barriers.'],
                    ['step' => 'Clean', 'icon' => 'spray', 'desc' => 'Deploy HEPA air scrubbers, safely remove infested drywall, and apply antimicrobials.'],
                    ['step' => 'Restore', 'icon' => 'restore', 'desc' => 'Clean contents, encapsulate treated framing, and restore drywall and trim.'],
                ],
                'steps' => [
                    ['num' => '1', 'title' => 'Emergency Contact', 'desc' => 'Call our National Call Center to schedule an immediate property moisture and microbial assessment.'],
                    ['num' => '2', 'title' => 'Inspection and Mold Damage Assessment', 'desc' => 'Technicians visually inspect suspect zones and trace hidden moisture sources with infrared cameras and pinless meters.'],
                    ['num' => '3', 'title' => 'Mold Containment', 'desc' => 'Various containment methods such as negative air chambers prevent airborne mold spores from drifting into clean hallways or bedrooms.'],
                    ['num' => '4', 'title' => 'Air Filtration (HEPA Scrubbers)', 'desc' => 'Specialized 0.3-micron HEPA filtration captures microscopic airborne spores throughout active remediation work.'],
                    ['num' => '5', 'title' => 'Removing Mold and Mold-Infested Materials', 'desc' => 'Porous drywall and carpeting may be removed safely while framing undergoes wire brushing, HEPA vacuuming, and EPA antimicrobial treatment.'],
                    ['num' => '6', 'title' => 'Cleaning Contents & Restoration', 'desc' => 'Clothing, drapes, and furniture are cleaned, deodorized, and damaged building finishes are rebuilt.'],
                ],
                'causes' => [
                    'Slow hidden plumbing leaks under sinks or showers',
                    'Sustained indoor relative humidity above 60%',
                    'Previous water damage not dried within 48 hours',
                    'Basement block seepage & unvented crawlspaces',
                    'Bathroom exhaust ductwork venting into attic rafters',
                    'Clogged HVAC condensate drain lines',
                ],
                'equipment' => [
                    'Negative Air Pressure Poly Zip-Wall Chambers',
                    '0.3-Micron True HEPA Air Scrubbers',
                    'EPA-Registered Antimicrobial & Fungicidal Sealants',
                    'Digital Thermo-Hygrometers & Borescopes',
                    'Full Tyvek PPE & P100 Respirators',
                ],
                'faqs' => [
                    ['q' => 'What is the difference between mold removal and mold remediation?', 'a' => 'Microscopic mold spores exist everywhere indoors and outdoors, making 100% permanent "removal" impossible. Proper mold remediation contains the work zone, removes contaminated colonies, filters spores out of the air, and fixes the moisture problem so normal spore balance returns.'],
                    ['q' => 'Should I spray bleach on visible black mold?', 'a' => 'No. Household bleach is mostly water; its chlorine flashes off quickly on porous wood and drywall, leaving live mold roots fed by extra water so colonies bounce back quickly.'],
                    ['q' => 'Can mold grow behind painted drywall?', 'a' => 'Yes. Slow roof or pipe leaks saturate the back paper facing of drywall and wood studs weeks before musty odors or stains appear in the room.'],
                ],
            ],
            'storm' => [
                'slug' => 'storm',
                'url' => '/services/storm-damage',
                'badge' => 'CAT RESPONSE TEAM • 24/7 NATIONAL',
                'title' => 'Storm & Major Disaster Cleanup Services',
                'short_title' => 'Storm/Disaster',
                'tagline' => 'When severe weather strikes, National Catastrophe (CAT) teams mobilize generators and semi-trailers immediately.',
                'summary' => '24/7 disaster recovery for hurricanes, tornadoes, severe flooding, roof wind breaches, and winter pipe freezes.',
                'hero_image' => sp_img('commercial_largeloss'),
                'card_image' => sp_img('commercial_largeloss'),
                'accent' => '#FF5A00',
                'quick_links' => [
                    'National Catastrophe (CAT) Convoys',
                    'Emergency Roof Tarping & Board-Up',
                    'Floodwater Extraction & Silt Removal',
                    'Winter Freeze & Ice Dam Mitigation',
                    'Commercial Storm Recovery Teams',
                    'Tree & Structural Debris Clearing',
                ],
                'process4' => [
                    ['step' => 'Assess', 'icon' => 'truck', 'desc' => 'Rapid post-storm triage to document wind, roof, and flood intrusion.'],
                    ['step' => 'Secure', 'icon' => 'home', 'desc' => 'Weatherproof tarping, structural shoring, and generator deployment.'],
                    ['step' => 'Clean', 'icon' => 'spray', 'desc' => 'Bulk flood extraction, contaminated silt clearing, and antimicrobial wash.'],
                    ['step' => 'Restore', 'icon' => 'restore', 'desc' => 'Large-scale desiccant drying and full exterior/interior reconstruction.'],
                ],
                'steps' => [
                    ['num' => '1', 'title' => 'CAT Storm Mobilization', 'desc' => 'Mobile command trailers and unaffected neighboring franchises convoy into disaster zones within hours.'],
                    ['num' => '2', 'title' => 'Emergency Board-Up & Tarping', 'desc' => 'Crews immediately seal damaged roofs and shattered windows to halt ongoing wind and rain exposure.'],
                    ['num' => '3', 'title' => 'Off-Grid Power & Pumping', 'desc' => 'Commercial diesel generators power heavy trash pumps and extractors even when local utilities fail.'],
                    ['num' => '4', 'title' => 'Desiccant Structural Drying', 'desc' => 'High-capacity desiccant dehumidifiers stabilize massive residential and commercial buildings.'],
                    ['num' => '5', 'title' => 'Sanitization & Flood Cutout', 'desc' => 'Category 3 storm water requires safe tear-out of contaminated insulation, drywall, and EPA sanitization.'],
                    ['num' => '6', 'title' => 'Reconstruction & Handover', 'desc' => 'Coordinated general contracting brings roofs, siding, electrical, and finishes back to pre-storm condition.'],
                ],
                'causes' => [
                    'Hurricanes, storm surge & coastal wind damage',
                    'Tornado strikes & straight-line microbursts',
                    'River flooding & flash municipal sewer overflows',
                    'Sub-zero cold snaps bursting exterior piping',
                    'Heavy hail perforating roofs & siding',
                    'Downed timber puncturing attics & trusses',
                ],
                'equipment' => [
                    '53-Foot Mobile Storm Command Semi-Trucks',
                    'Trailer-Mounted Desiccant Dehumidifiers',
                    'Commercial Backup Diesel Generators',
                    'Reinforced Shrink-Wrap & Weatherproof Tarps',
                    'High-Head Flood & Silt Trash Pumps',
                ],
                'faqs' => [
                    ['q' => 'Can RescuePro still pump out floodwater if neighborhood power is out?', 'a' => 'Yes. Our disaster trucks and trailers carry on-board commercial generators capable of running heavy extractors and air movers off-grid.'],
                    ['q' => 'What happens if a regional hurricane overwhelms every local contractor?', 'a' => 'Our national CAT network routes experienced crews, semi-trucks, and drying warehouses from clean neighboring states straight into impacted neighborhoods.'],
                ],
            ],
            'construction' => [
                'slug' => 'construction',
                'url' => '/services/construction',
                'badge' => 'LICENSED GENERAL CONTRACTING',
                'title' => 'Residential & Commercial Construction Services',
                'short_title' => 'Construction',
                'tagline' => 'Seamless reconstruction from mitigation tear-out to final trim—with one trusted team managing every trade.',
                'summary' => 'Complete estimating, selective demolition, framing, drywall, flooring, electrical, plumbing, roofing, and painting.',
                'hero_image' => sp_img('residential_ceiling'),
                'card_image' => sp_img('residential_ceiling'),
                'accent' => '#FF5A00',
                'quick_links' => [
                    'Mitigation to Rebuild Continuity',
                    'Pre-Construction Estimating',
                    'Drywall, Texture & Finish Painting',
                    'Roofing, Siding & Structural Framing',
                    'Kitchen & Bathroom Reconstruction',
                    'Commercial Tenant Build-Back',
                ],
                'process4' => [
                    ['step' => 'Assess', 'icon' => 'truck', 'desc' => 'Digital scoping, material matching, and permit planning with adjusters.'],
                    ['step' => 'Secure', 'icon' => 'home', 'desc' => 'Site dust containment, temporary structural shoring, and rough-in prep.'],
                    ['step' => 'Clean', 'icon' => 'spray', 'desc' => 'Selective demolition of unsalvageable framing, trim, and damaged cabinetry.'],
                    ['step' => 'Restore', 'icon' => 'restore', 'desc' => 'Complete framing, drywall, flooring, paint, and final walkthrough sign-off.'],
                ],
                'steps' => [
                    ['num' => '1', 'title' => 'Emergency Contact & Mitigation Hand-Off', 'desc' => 'Because RescuePro handles both drying and construction, project managers begin scoping repairs while mitigation finishes.'],
                    ['num' => '2', 'title' => 'Estimating & Insurance Scoping', 'desc' => 'We deliver detailed line-item rebuild estimates aligned with carrier adjusters so supplements never stall your rebuild.'],
                    ['num' => '3', 'title' => 'Permitting & Material Selection', 'desc' => 'Our coordinators obtain municipal building permits and guide you through flooring, cabinet, and fixture selections.'],
                    ['num' => '4', 'title' => 'Drywall, Carpentry & Rough-In', 'desc' => 'Licensed framing, electrical, HVAC, and plumbing trades restore walls, subfloors, insulation, and texture seamlessly.'],
                    ['num' => '5', 'title' => 'Finishes, Cabinetry & Painting', 'desc' => 'Precision installation of hardwood, tile, custom millwork, primer sealers, and multi-coat architectural paint.'],
                    ['num' => '6', 'title' => 'Final Walkthrough & Sign-Off', 'desc' => 'A dedicated project manager walks every room with you to ensure craftsmanship meets pre-loss standards.'],
                ],
                'causes' => [
                    'Post-water-mitigation drywall, baseboard & flooring rebuild',
                    'Structural fire truss, kitchen & ceiling replacement',
                    'Wind & fallen tree roof deck and siding repairs',
                    'Vehicle impact structural masonry & framing repairs',
                    'Commercial corridor & lobby reconstruction',
                    'Mold-compromised bathroom & subfloor replacements',
                ],
                'equipment' => [
                    'Xactimate Estimating & 3D Digital Scanning',
                    'Licensed Electrical, Mechanical & Plumbing Trades',
                    'Laser Leveling & Structural Shoring Jacks',
                    'Negative-Pressure Zip-Wall Dust Containment',
                    'Commercial Paint Sprayers & Trim Carpentry Gear',
                ],
                'faqs' => [
                    ['q' => 'Why choose RescuePro for reconstruction instead of hiring a separate contractor?', 'a' => 'Working with one seamless team prevents scheduling gaps between the dry-out crew and rebuild trades, simplifies insurance supplements, and restores your property weeks faster.'],
                    ['q' => 'Do local RescuePro construction teams handle building permits?', 'a' => 'Where required by state and local law, our licensed construction divisions manage municipal permit pulls and code compliance inspections.'],
                ],
            ],
            'biohazard' => [
                'slug' => 'biohazard',
                'url' => '/services/biohazard-cleaning',
                'badge' => 'OSHA, CDC & EPA PROTOCOLS',
                'title' => 'Professional Biohazard & Crime Scene Cleanup',
                'short_title' => 'Biohazard',
                'tagline' => 'Compassionate, discreet remediation for biological hazards, crime scenes, hoarding, chemicals, and pathogens.',
                'summary' => 'OSHA bloodborne pathogen compliance, regulated medical waste disposal, hoarding remediation, and viral disinfection.',
                'hero_image' => sp_img('mold_hazmat'),
                'card_image' => sp_img('mold_hazmat'),
                'accent' => '#FF5A00',
                'quick_links' => [
                    'Hoarding',
                    'Rodent Infestation',
                    'Illicit Substances',
                    'Chemicals and Residues',
                    'Squad Cars and Jail Cells',
                    'Viruses and Pathogens',
                ],
                'process4' => [
                    ['step' => 'Assess', 'icon' => 'truck', 'desc' => 'Determine degree of biological or chemical hazard after clearance.'],
                    ['step' => 'Secure', 'icon' => 'home', 'desc' => 'Establish strict containment perimeters, PPE gear, and negative air.'],
                    ['step' => 'Clean', 'icon' => 'spray', 'desc' => 'Apply EPA-registered hospital disinfectants and package bio-waste safely.'],
                    ['step' => 'Restore', 'icon' => 'restore', 'desc' => 'Deodorize, sanitize restorable fixtures, and verify safe indoor habitation.'],
                ],
                'steps' => [
                    ['num' => '1', 'title' => 'Discreet Intake & Consultation', 'desc' => 'If your property needs hazmat, trauma, or crime scene cleanup, our specialists coordinate quietly with sensitivity and care.'],
                    ['num' => '2', 'title' => 'Assessment of Biological Contamination', 'desc' => 'Following any police investigation clearance, technicians determine the exact scope of bloodborne pathogens, chemicals, or odors.'],
                    ['num' => '3', 'title' => 'OSHA Containment & PPE Protection', 'desc' => 'Teams comply strictly with local, state, and federal health regulations before handling compromised surfaces.'],
                    ['num' => '4', 'title' => 'Porous Removal & Bio-Waste Disposal', 'desc' => 'Unsalvageable materials are sealed inside licensed medical waste containers and transported to regulated treatment facilities.'],
                    ['num' => '5', 'title' => 'Hospital-Grade Disinfection & Deodorization', 'desc' => 'Non-porous surfaces and adjacent living spaces undergo multi-stage EPA antimicrobial disinfection and ATP verification.'],
                    ['num' => '6', 'title' => 'Safe Restoration Handover', 'desc' => 'Ensuring everyone living or working at your property can do so comfortably inside a thoroughly sanitized, restored space.'],
                ],
                'causes' => [
                    'Hoarding clutter, biohazard filth & structural buildup',
                    'Rodent infestation droppings & hantavirus decontamination',
                    'Illicit substance residues & clandestine lab neutralization',
                    'Tear gas, pepper spray & industrial chemical residues',
                    'Squad cars, municipal fleets & detention holding cells',
                    'Viral outbreaks & bloodborne pathogen exposures',
                ],
                'equipment' => [
                    'Full Tyvek Level-C/B Suits & Positive-Pressure Respirators',
                    'EPA-Registered List N Hospital Virucides',
                    'ULV Electrostatic Disinfectant Sprayers',
                    'ATP Surface Hygiene Verification Luminometers',
                    'Licensed Regulated Medical Waste Manifest Containers',
                ],
                'faqs' => [
                    ['q' => 'What regulations do RescuePro biohazard technicians follow?', 'a' => 'Teams strictly comply with OSHA Bloodborne Pathogens standards (29 CFR 1910.1030), EPA disinfectant label requirements, and state regulated waste transport manifests.'],
                    ['q' => 'Can RescuePro handle severe hoarding situations with empathy?', 'a' => 'Yes. Our specialists work compassionately with families, estate managers, and social workers to recover valuables while clearing hazardous clutter safely.'],
                ],
            ],
            'cleaning' => [
                'slug' => 'cleaning',
                'url' => '/service/cleaning',
                'badge' => 'RESIDENTIAL & COMMERCIAL CLEANING',
                'title' => 'General & Deep Property Cleaning Services',
                'short_title' => 'General Cleaning',
                'tagline' => 'Beyond routine dusting—deep extraction for carpets, upholstery, HVAC ducts, and stubborn household odors.',
                'summary' => 'Truck-mounted hot water extraction, rotary HVAC air duct brushing, leather and fabric care, and odor removal.',
                'hero_image' => sp_img('residential_ceiling'),
                'card_image' => sp_img('residential_ceiling'),
                'accent' => '#FF5A00',
                'quick_links' => [
                    'Air Ducts & HVAC System Cleaning',
                    'Carpet & Fine Rug Extraction',
                    'Upholstery & Drapery Care',
                    'Ceiling, Wall & Tile Restoration',
                    'Pet & Tobacco Odor Neutralization',
                    'Post-Renovation Dust Cleanup',
                ],
                'process4' => [
                    ['step' => 'Assess', 'icon' => 'truck', 'desc' => 'Inspect carpet backing, air returns, and fabric dye stability.'],
                    ['step' => 'Secure', 'icon' => 'home', 'desc' => 'Corner guards, floor runners, and supply register isolation protect finishes.'],
                    ['step' => 'Clean', 'icon' => 'spray', 'desc' => 'Rotary brushing, truck-mounted hot extraction, and enzymatic pre-sprays.'],
                    ['step' => 'Restore', 'icon' => 'restore', 'desc' => 'Groom fibers, speed-dry upholstery, and leave indoor air fresh.'],
                ],
                'steps' => [
                    ['num' => '1', 'title' => 'Inspection & Pre-Test', 'desc' => 'Technicians test upholstery weave and carpet traffic lanes to match safe pH cleaning solutions.'],
                    ['num' => '2', 'title' => 'Dry Particulate & HEPA Vacuuming', 'desc' => 'High-filtration vacuuming extracts dry abrasive grit and dust before moisture application.'],
                    ['num' => '3', 'title' => 'Air Duct & Vent Agitation', 'desc' => 'Negative-air duct whips dislodge years of lint, pollen, and dust from supply and return plenums.'],
                    ['num' => '4', 'title' => 'Truck-Mounted Hot Water Extraction', 'desc' => 'High-temperature extraction rinses away embedded grease and residue without soapy re-soiling film.'],
                    ['num' => '5', 'title' => 'Odor Counteraction & Protection', 'desc' => 'Enzymatic pet treatments and fiber protectants restore showroom brightness and scent.'],
                    ['num' => '6', 'title' => 'Rapid Drying & Inspection', 'desc' => 'Low-profile air movers speed-dry carpets so families walk on floors the same day.'],
                ],
                'causes' => [
                    'High-traffic carpet dullness, spills & pet accidents',
                    'Dust, pollen & dander buildup inside HVAC ductwork',
                    'Drywall dust left behind by kitchen remodeling',
                    'Move-in / move-out deep interior estate sanitization',
                    'Seasonal spring allergen reduction across drapes',
                    'Stubborn cooking & tobacco odor in rental units',
                ],
                'equipment' => [
                    'Truck-Mounted High-Temp Hot Water Extractors',
                    'Rotary Power-Brush Negative-Air Duct Cleaners',
                    'Dry-Solvent Fine Fabric & Leather Conditioning Kits',
                    'Enzymatic Pet & Organic Stain Digestants',
                    'True HEPA Backpack Particulate Vacuums',
                ],
                'faqs' => [
                    ['q' => 'How often should home HVAC air ducts be inspected or cleaned?', 'a' => 'Most homes benefit from professional inspection after fire/smoke events, post-remodeling, following mold remediation, or every 3–5 years when occupants have severe allergies.'],
                    ['q' => 'Will carpet stay soaking wet for days after extraction?', 'a' => 'No. Our truck-mounted vacuum recovery removes over 95% of moisture immediately, typically drying within hours.'],
                ],
            ],
            'specialty' => [
                'slug' => 'specialty',
                'url' => '/services/specialty-cleaning',
                'badge' => 'SPECIALTY RESTORATION DIVISIONS',
                'title' => 'Specialty Restoration, Pack-Out & Cleaning Services',
                'short_title' => 'Specialty Cleaning',
                'tagline' => 'Dedicated facilities for contents pack-out inventorying, freeze-dry document recovery, and ultrasonic care.',
                'summary' => 'Complete contents pack-out & climate storage, paper & archival freeze-drying, electronics restoration, and Certified: RescuePro Cleaned®.',
                'hero_image' => sp_img('packout_warehouse'),
                'card_image' => sp_img('packout_warehouse'),
                'accent' => '#FF5A00',
                'quick_links' => [
                    'Contents Pack Out & Warehouse Storage',
                    'Document & Book Freeze-Drying',
                    'Electronics & Fine Jewelry Ultrasonic Care',
                    'Vandalism, Graffiti & Tear Gas Removal',
                    'Biohazard & Hoarding Cleanup',
                    'Certified: RescuePro Cleaned® Program',
                ],
                'process4' => [
                    ['step' => 'Assess', 'icon' => 'truck', 'desc' => 'Room-by-room digital photo cataloging of salvageable furniture and records.'],
                    ['step' => 'Secure', 'icon' => 'home', 'desc' => 'Protective bubble-wrapping, crating, and secure palletized warehouse transport.'],
                    ['step' => 'Clean', 'icon' => 'spray', 'desc' => 'Ultrasonic wash baths, ozone deodorization chambers, and freeze-drying.'],
                    ['step' => 'Restore', 'icon' => 'restore', 'desc' => 'Scheduled return delivery and room placement once property rebuild completes.'],
                ],
                'steps' => [
                    ['num' => '1', 'title' => 'Digital Photo Inventory & Cataloging', 'desc' => 'Every heirloom, carton, and appliance receives barcode inventory tracking so homeowners and adjusters see every item.'],
                    ['num' => '2', 'title' => 'Protective Pack-Out & Climate Storage', 'desc' => 'Belongings move safely into monitored climate-controlled vaults while structural drying and construction occur.'],
                    ['num' => '3', 'title' => 'Ultrasonic & Specialized Deodorization', 'desc' => 'Porcelain, crystal, circuit boards, and keepsakes are gently cleaned inside micro-cavitation ultrasonic baths.'],
                    ['num' => '4', 'title' => 'Vacuum Freeze-Drying for Documents', 'desc' => 'Soaked medical charts, legal deeds, and family photo albums undergo sublimation drying so wet pages separate cleanly.'],
                    ['num' => '5', 'title' => 'Textile & Garment Esporta Care', 'desc' => 'Fire- and water-exposed clothing and leather goods undergo specialized restorative laundering.'],
                    ['num' => '6', 'title' => 'White-Glove Move-Back Delivery', 'desc' => 'Once reconstruction passes final walkthrough, crews unpack and set furniture back in place.'],
                ],
                'causes' => [
                    'Entire house pack-outs during major fire or flood rebuilds',
                    'Soaked law office records, blueprints & hospital archives',
                    'Commercial graffiti, spray paint & vandalism',
                    'Kitchen electronics & HVAC component soot restoration',
                    'Textile & heirloom rug contamination recovery',
                    'Facility-wide commercial viral & bacterial sanitization',
                ],
                'equipment' => [
                    'Barcode Inventorying & Contents Tracking Software',
                    'Vacuum Freeze-Drying Sublimation Chambers',
                    'Multi-Stage Ultrasonic Soot Cleaning Tanks',
                    'Temperature & Humidity Monitored Storage Vaults',
                    'Hydroxyl Deodorization Vault Chambers',
                ],
                'faqs' => [
                    ['q' => 'How do I keep track of belongings during a pack-out?', 'a' => 'Each box and furniture item is photographed, barcoded, and logged in a digital manifest shared with both you and your insurance adjuster.'],
                    ['q' => 'Can soaked paper books or contracts really be saved?', 'a' => 'Yes. Freezing wet paper immediately halts mold and ink bleed until our vacuum sublimation chamber turns ice directly to vapor without liquid warping.'],
                ],
            ],
        ];
    }

    public static function franchises(): array
    {
        return array (
  0 => 
  array (
    'id' => 1,
    'name' => 'RescuePro® of Nashville North & Gallatin',
    'city' => 'Gallatin',
    'state' => 'TN',
    'zip' => '37066',
    'address' => '801 Industrial Blvd, Suite 100, Gallatin, TN 37066',
    'phone' => '(615) 555-0192',
    'rating' => 4.9,
    'reviews' => 642,
    'response_time' => '38 min avg dispatch',
    'certifications' => 
    array (
      0 => 'IICRC Master Water Restorer',
      1 => 'Commercial Large Loss Certified',
      2 => 'Lead-Safe EPA',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Fire',
      2 => 'Mold',
      3 => 'Storm',
      4 => 'Construction',
      5 => 'ERP',
    ),
    'code' => 'RP-TN-37066',
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'RescuePro® of Downtown Nashville',
    'city' => 'Nashville',
    'state' => 'TN',
    'zip' => '37201',
    'address' => '420 Robertson Pkwy, Nashville, TN 37201',
    'phone' => '(615) 555-0144',
    'rating' => 4.9,
    'reviews' => 818,
    'response_time' => '34 min avg dispatch',
    'certifications' => 
    array (
      0 => 'IICRC S500/S520/S700',
      1 => 'Large Loss Team',
      2 => 'Hospitality Preferred',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Fire',
      2 => 'Mold',
      3 => 'Commercial',
      4 => 'Biohazard',
    ),
    'code' => 'RP-TN-37201',
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'RescuePro® of Central Dallas',
    'city' => 'Dallas',
    'state' => 'TX',
    'zip' => '75201',
    'address' => '1450 Stemmons Fwy, Dallas, TX 75201',
    'phone' => '(214) 555-0148',
    'rating' => 4.8,
    'reviews' => 975,
    'response_time' => '41 min avg dispatch',
    'certifications' => 
    array (
      0 => 'Storm CAT Lead',
      1 => 'Desiccant Fleet Hub',
      2 => 'Healthcare Certified',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Fire',
      2 => 'Storm',
      3 => 'Commercial',
      4 => 'Construction',
    ),
    'code' => 'RP-TX-75201',
  ),
  3 => 
  array (
    'id' => 4,
    'name' => 'RescuePro® of Greater Atlanta Midtown',
    'city' => 'Atlanta',
    'state' => 'GA',
    'zip' => '30308',
    'address' => '680 West Peachtree St, Atlanta, GA 30308',
    'phone' => '(404) 555-0177',
    'rating' => 4.9,
    'reviews' => 734,
    'response_time' => '39 min avg dispatch',
    'certifications' => 
    array (
      0 => 'IICRC Master Fire Restorer',
      1 => 'Commercial ERP Partner',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Fire',
      2 => 'Mold',
      3 => 'Construction',
      4 => 'Cleaning',
    ),
    'code' => 'RP-GA-30308',
  ),
  4 => 
  array (
    'id' => 5,
    'name' => 'RescuePro® of Chicago Loop & North Shore',
    'city' => 'Chicago',
    'state' => 'IL',
    'zip' => '60601',
    'address' => '210 N Michigan Ave, Suite 400, Chicago, IL 60601',
    'phone' => '(312) 555-0163',
    'rating' => 4.8,
    'reviews' => 590,
    'response_time' => '44 min avg dispatch',
    'certifications' => 
    array (
      0 => 'High-Rise Water Extraction',
      1 => 'Freeze-Pipe Specialists',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Mold',
      2 => 'Commercial',
      3 => 'Construction',
    ),
    'code' => 'RP-IL-60601',
  ),
  5 => 
  array (
    'id' => 6,
    'name' => 'RescuePro® of Tampa Bay & Clearwater',
    'city' => 'Tampa',
    'state' => 'FL',
    'zip' => '33602',
    'address' => '910 N Florida Ave, Tampa, FL 33602',
    'phone' => '(813) 555-0129',
    'rating' => 4.9,
    'reviews' => 1120,
    'response_time' => '36 min avg dispatch',
    'certifications' => 
    array (
      0 => 'Hurricane CAT Command',
      1 => 'IICRC S520 Mold Specialist',
    ),
    'services_offered' => 
    array (
      0 => 'Storm',
      1 => 'Water',
      2 => 'Mold',
      3 => 'Commercial',
      4 => 'Biohazard',
    ),
    'code' => 'RP-FL-33602',
  ),
  6 => 
  array (
    'id' => 7,
    'name' => 'RescuePro® of Phoenix Metro & Scottsdale',
    'city' => 'Phoenix',
    'state' => 'AZ',
    'zip' => '85004',
    'address' => '515 E Camelback Rd, Phoenix, AZ 85004',
    'phone' => '(602) 555-0181',
    'rating' => 4.9,
    'reviews' => 486,
    'response_time' => '40 min avg dispatch',
    'certifications' => 
    array (
      0 => 'Sub-Slab Moisture Tracing',
      1 => 'Smoke & Brushfire Recovery',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Fire',
      2 => 'Mold',
      3 => 'Specialty',
    ),
    'code' => 'RP-AZ-85004',
  ),
  7 => 
  array (
    'id' => 8,
    'name' => 'RescuePro® of Denver Front Range',
    'city' => 'Denver',
    'state' => 'CO',
    'zip' => '80202',
    'address' => '1640 Blake St, Denver, CO 80202',
    'phone' => '(303) 555-0136',
    'rating' => 4.8,
    'reviews' => 512,
    'response_time' => '42 min avg dispatch',
    'certifications' => 
    array (
      0 => 'High-Altitude Psychrometrics',
      1 => 'Freeze Burst Rapid Crew',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Fire',
      2 => 'Storm',
      3 => 'Construction',
    ),
    'code' => 'RP-CO-80202',
  ),
  8 => 
  array (
    'id' => 9,
    'name' => 'RescuePro® of Seattle & Puget Sound',
    'city' => 'Seattle',
    'state' => 'WA',
    'zip' => '98101',
    'address' => '1205 Pine St, Seattle, WA 98101',
    'phone' => '(206) 555-0195',
    'rating' => 4.9,
    'reviews' => 608,
    'response_time' => '37 min avg dispatch',
    'certifications' => 
    array (
      0 => 'Crawlspace Mold Abatement',
      1 => 'Commercial Large Loss',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Mold',
      2 => 'Storm',
      3 => 'Commercial',
    ),
    'code' => 'RP-WA-98101',
  ),
  9 => 
  array (
    'id' => 10,
    'name' => 'RescuePro® of Charlotte & Piedmont',
    'city' => 'Charlotte',
    'state' => 'NC',
    'zip' => '28202',
    'address' => '330 S Tryon St, Charlotte, NC 28202',
    'phone' => '(704) 555-0152',
    'rating' => 4.9,
    'reviews' => 694,
    'response_time' => '35 min avg dispatch',
    'certifications' => 
    array (
      0 => 'Preferred Carrier Hub',
      1 => 'IICRC S700 Fire',
    ),
    'services_offered' => 
    array (
      0 => 'Water',
      1 => 'Fire',
      2 => 'Mold',
      3 => 'Storm',
      4 => 'ERP',
    ),
    'code' => 'RP-NC-28202',
  ),
);
    }

    public static function articles(): array
    {
        $items = array (
  0 => 
  array (
    'id' => 1,
    'slug' => 'how-to-dry-hardwood-and-laminate-floors',
    'category' => 'Water Damage',
    'tag' => 'Water Mitigation Guide',
    'title' => 'How to Dry Hardwood & Laminate Floors Before Cupping Becomes Permanent',
    'date' => 'February 2026',
    'read_time' => '8 min technical read',
    'iicrc_standard' => 'ANSI/IICRC S500 Section 16 (Wood Assemblies)',
    'equipment_used' => 
    array (
      0 => 'Injectidry® Floor Mat Panel',
      1 => 'Phoenix LGR 200 Dehumidifier',
      2 => 'Delmhorst J-2000 Pin Meter',
    ),
    'excerpt' => 'Understand equilibrium moisture gradients across solid oak, engineered wood, and laminate subfloors—plus when vacuum mat panels rescue warped planks.',
    'body' => 
    array (
      0 => 'Hardwood flooring reacts asymmetrically whenever liquid water collects on top or migrates up from a saturated plywood subfloor. Because the underside of a plank absorbs moisture faster than the polyurethane-sealed top surface can evaporate it, bottom wood cells swell horizontally—forcing the outer edges of each strip upward into classic concave cupping.',
      1 => 'Timing dictates salvageability. During the first 12 to 24 hours of a Category 1 clean-water release (such as a refrigerator ice-maker line or dishwasher hose leak), wood fibers remain within elastic tolerances. Conventional box fans blowing only across the top wear layer cannot relieve trapped moisture in the tongue-and-groove joints or vapor retarder felt underneath.',
      2 => 'Certified RescuePro® technicians connect specialized high-static vacuum floor mats directly to negative-pressure blowers. Sealed around plank zones with non-marring painter tape, these mats pull high-humidity air and bound water vapor vertically up through board seams while LGR dehumidifiers keep room grain levels (GPP) below 40.',
      3 => 'Note the sharp distinction for click-lock HDF laminate flooring: high-density fiberboard cores swell irreversibly upon prolonged saturation, requiring targeted board removal and subfloor sanitization rather than top-down mat drying. Daily Delmhorst insulated pin readings confirm when solid oak returns within 2% of unaffected rooms before any sanding or refinishing is considered.',
    ),
    'steps' => 
    array (
      0 => '1. Shut off the pressurized plumbing valve and mop surface puddles immediately.',
      1 => '2. Record baseline pinless moisture readings in both affected and unaffected adjacent rooms.',
      2 => '3. Pull toe-kick panels under kitchen cabinetry to ventilate trapped moisture reservoirs.',
      3 => '4. Install Injectidry® floor mats connected to low-grain refrigerant dehumidifiers.',
      4 => '5. Maintain steady psychrometric drying for 3–5 days until subfloor and planks reach equilibrium.',
    ),
    'dos' => 
    array (
      0 => 'Remove damp area rugs and impermeable plastic runners right away.',
      1 => 'Photograph buckled areas before demolition for insurance documentation.',
      2 => 'Allow gradual wood relaxation (acclimation) prior to assessing any sanding need.',
    ),
    'donts' => 
    array (
      0 => 'Never sand cupped floorboards while moisture content still exceeds 12%—they will later crown.',
      1 => 'Avoid using high-heat space heaters that scorch finish and split wood grain.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'How many days does floor mat drying take?',
        'a' => 'Most solid white oak assemblies normalize within 4 to 7 days when negative-pressure mats run continuously alongside LGR dehumidification.',
      ),
      1 => 
      array (
        'q' => 'Can engineered wood be salvaged after flooding?',
        'a' => 'Cross-ply engineered boards tolerate moisture better than MDF laminate and can often be dried if delamination has not occurred at the veneer glue line.',
      ),
    ),
    'image_key' => 'article_laminate',
  ),
  1 => 
  array (
    'id' => 2,
    'slug' => 'wall-wicking-baseboard-detachment-and-flood-cuts',
    'category' => 'Water Damage',
    'tag' => 'Structural Drying',
    'title' => 'Preventing Drywall Wicking: Baseboard Removal, Vapor Barriers & Precision Flood Cuts',
    'date' => 'February 2026',
    'read_time' => '7 min technical read',
    'iicrc_standard' => 'ANSI/IICRC S500 Class 2 & Class 3 Cavity Drying',
    'equipment_used' => 
    array (
      0 => 'FLIR E8-XT Thermal Imager',
      1 => 'Wall-Cavity Injection Manifold',
      2 => 'HEPA Negative Air Scrubber',
    ),
    'excerpt' => 'Capillary action draws floor water up to 24 inches into gypsum core and fiberglass batts within hours. Learn how pros decide between cavity drying and a 2-foot flood cut.',
    'body' => 
    array (
      0 => 'Gypsum drywall behaves like a dense chalk sponge when standing water contacts the bottom 0.5-inch expansion gap behind trim molding. Through capillary suction, moisture climbs vertically behind painted latex films, soaking interior wall insulation even while the room-side paint still feels cool rather than dripping wet.',
      1 => 'Thermal imaging reveals these concealed cold evaporation plumes within seconds. When vinyl wallpaper, oil-based semi-gloss paint, or exterior foam sheathing blocks bidirectional evaporation, water remains trapped against untreated timber bottom plates—triggering microbial decay inside the wall cavity within 48 hours.',
      2 => 'For Category 1 losses without fiberglass insulation, RescuePro® crews score latex caulk neatly, detach wood baseboards intact for reinstallation, bore concealed 3/8-inch weep/injection holes behind the trim zone, and force warm dry air through internal stud bays using cavity manifolds.',
      3 => 'Conversely, when water contains contaminants (Category 2/3) or saturates paper-faced fiberglass batts, a laser-leveled 24-inch or 48-inch flood cut ensures wet insulation can be bagged out cleanly and wooden sill plates sprayed with botanical antimicrobials before drywall reconstruction.',
    ),
    'steps' => 
    array (
      0 => '1. Map vertical capillary wicking height across every perimeter wall via FLIR infrared scan.',
      1 => '2. Score top baseboard caulk cleanly with a razor blade to preserve millwork edges.',
      2 => '3. Label and pull baseboards; bore test holes to verify stud cavity insulation presence.',
      3 => '4. Either mount positive-pressure cavity injection nozzles or perform clean laser flood cuts.',
    ),
    'dos' => 
    array (
      0 => 'Score caulk lines cleanly so painted upper drywall paper never tears.',
      1 => 'Keep drywall debris contained under HEPA negative air during tear-out.',
    ),
    'donts' => 
    array (
      0 => 'Do not re-nail baseboards or paint walls before stud lumber drops below 15% wood moisture.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Why do technicians commonly cut drywall at 24 or 48 inches?',
        'a' => 'Standard 4x8 drywall sheets run 48 inches wide; cutting neatly along an exact 24-inch or 48-inch horizontal datum minimizes mud joints and simplifies seamless sheet replacement during build-back.',
      ),
    ),
    'image_key' => 'article_baseboard',
  ),
  2 => 
  array (
    'id' => 3,
    'slug' => 'ceiling-water-stain-and-roof-leak-drying-protocol',
    'category' => 'Water Damage',
    'tag' => 'Emergency Roof & Ceiling',
    'title' => 'Sagging Ceilings & Roof Leaks: Safe Relief, Attic Drying & Insulation Extraction',
    'date' => 'January 2026',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'ANSI/IICRC S500 Attic & Ceiling Assemblies',
    'equipment_used' => 
    array (
      0 => 'Heavy-Duty Tarp Anchors',
      1 => 'Insulation Extraction Vacuum',
      2 => 'Axial Air Movers',
    ),
    'excerpt' => 'Water weight trapped inside drywall ceilings poses sudden collapse hazards. Follow safe containment and emergency tarping before storm rains resume.',
    'body' => 
    array (
      0 => 'A single square yard of wet blown-in cellulose or fiberglass attic insulation retains over 35 pounds of water—far exceeding the pullout strength of 1.25-inch drywall screws. When a ceiling paint film bubbles or bows downward, the assembly is signaling imminent structural failure rather than cosmetic staining.',
      1 => 'Safeguarding occupants starts with clearing furniture underneath and installing a high-millage drip chute or relief puncture into a catch barrel only after confirming electrical circuits feeding ceiling fixtures and smoke detectors have been de-energized at the main breaker.',
      2 => 'Once safe access is established, wet attic insulation must be vacuum-extracted using large-bore truck vacuums so roof rafters, ceiling joists, and HVAC boot collars can receive direct dehumidified airflow.',
    ),
    'steps' => 
    array (
      0 => '1. Turn off ceiling lighting circuits at the breaker panel before approaching bowing drywall.',
      1 => '2. Relocate electronics and drape plastic sheeting over furnishings below the stain.',
      2 => '3. Anchor reinforced tarps on storm-damaged roof decking and vacuum soaked attic insulation.',
      3 => '4. Dehumidify ceiling joist bays and prime stain-blocked drywall prior to texture matching.',
    ),
    'dos' => 
    array (
      0 => 'Inspect upper HVAC chases and plumbing vent boots during wind-driven rain events.',
      1 => 'Document shingle uplift damage with time-stamped exterior photos for adjusters.',
    ),
    'donts' => 
    array (
      0 => 'Never stand beneath a visibly sagging wet plaster or drywall ceiling.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Can painted yellow water rings be painted over once dry?',
        'a' => 'Only after moisture content normalizes and a stain-blocking shellac primer is applied; standard water-based latex lets tannin rings bleed right back through.',
      ),
    ),
    'image_key' => 'residential_ceiling',
  ),
  3 => 
  array (
    'id' => 4,
    'slug' => 'sub-slab-plumbing-leaks-and-concrete-dehumidification',
    'category' => 'Water Damage',
    'tag' => 'Structural Concrete',
    'title' => 'Sub-Slab Plumbing Leaks: Acoustic Pinpointing & Concrete Vapor Drying',
    'date' => 'January 2026',
    'read_time' => '7 min technical read',
    'iicrc_standard' => 'ASTM F2170 Concrete Relative Humidity + IICRC S500',
    'equipment_used' => 
    array (
      0 => 'Acoustic Leak Listener',
      1 => 'Phoenix LGR Dehumidifier',
      2 => 'Calcium Chloride Test Kit',
    ),
    'excerpt' => 'Warm spots on tile floors and spiraling water bills often point to pressurized copper or PEX fractures below slab-on-grade foundations.',
    'body' => 
    array (
      0 => 'Slab-on-grade homes route hot and cold supply lines through or beneath 4-inch poured concrete slabs. Tiny corrosion pinholes caused by acidic soil or concrete abrasion continuously saturate sand bedding beneath slabs, driving hydrostatic moisture upward against vinyl tile, glue-down wood, and carpeted bedrooms.',
      1 => 'Rather than breaking jackhammers into finished living rooms blindly, certified leak specialists utilize pressurized nitrogen tracer gas and ultrasonic acoustic listening discs to pinpoint fracture coordinates within inches before licensed plumbers bypass or spot-repair the line.',
      2 => 'Because poured concrete holds vast volumes of pore water slowly released over days, RescuePro® measures in-situ concrete internal relative humidity (ASTM F2170 probes) before clearing adhesive flooring reinstallation.',
    ),
    'steps' => 
    array (
      0 => '1. Confirm meter dial spinning with all interior fixtures shut off.',
      1 => '2. Isolate leak location thermally and acoustically prior to concrete saw-cutting.',
      2 => '3. Run closed-loop low-grain dehumidifiers over concrete to extract bound slab vapor.',
      3 => '4. Verify ASTM F2170 relative humidity below 75% prior to adhesive re-installation.',
    ),
    'dos' => 
    array (
      0 => 'Feel for localized warm spots on bare ceramic tile floors indicative of hot-line leaks.',
    ),
    'donts' => 
    array (
      0 => 'Avoid reinstalling moisture-sensitive LVP or engineered hardwood over damp concrete.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Does concrete dry completely in 24 hours with fans?',
        'a' => 'Never. Concrete looks dry on the top 1/4 inch while remaining saturated underneath; controlled low-GPP dehumidification over 4–7 days prevents future flooring adhesive failure.',
      ),
    ),
    'image_key' => 'article_slab_leak',
  ),
  4 => 
  array (
    'id' => 5,
    'slug' => 'crawlspace-encapsulation-after-storm-flooding',
    'category' => 'Water Damage',
    'tag' => 'Crawlspace Engineering',
    'title' => 'Crawlspace Flooding & Vapor Barrier Encapsulation After Heavy Rains',
    'date' => 'December 2025',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'IICRC S500 Crawlspace Drying & ASHRAE Humidity Control',
    'equipment_used' => 
    array (
      0 => 'Submersible Trash Pump',
      1 => '20-Mil Reinforced Vapor Liner',
      2 => 'Commercial Crawler Dehumidifier',
    ),
    'excerpt' => 'Standing crawlspace water feeds wood-rot fungi that silently weaken floor joists and draw humid musty air straight into your main living room via stack effect.',
    'body' => 
    array (
      0 => 'Because warm conditioned air rises through upstairs ceilings (the building stack effect), up to 40% of ground-floor indoor air enters directly from the crawlspace beneath your feet. Standing puddle water under floorboards pushes floor-joist moisture above the 20% fungal decay threshold.',
      1 => 'Post-flood crawlspace restoration combines rapid sump dewatering, contaminated mud-silt skimming, disposal of waterlogged batt insulation hanging between floor joists, soda/botanical mold treatment, and sealed perimeter French drains.',
      2 => 'Installing continuous 20-mil cross-laminated poly vapor liners sealed up foundation piers—paired with an automated crawlspace dehumidifier—maintains 45–50% RH year-round.',
    ),
    'steps' => 
    array (
      0 => '1. Pump standing floodwater out and clear perimeter French drain silt.',
      1 => '2. Remove saturated fiberglass batts harboring moisture against subfloors.',
      2 => '3. Dry subfloor plywood & girders down below 14% MC before sealing seams.',
    ),
    'dos' => 
    array (
      0 => 'Install sealed sump basins with battery-backup pumps in low-grade lots.',
    ),
    'donts' => 
    array (
      0 => 'Do not lay thin tarp plastic over active puddles; standing water must be extracted first.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Should crawlspace vents stay open in humid summer weather?',
        'a' => 'Building science proves open vents pull warm humid outdoor air onto cool AC ductwork and joists, worsening condensation—closed conditioned crawlspaces perform dramatically better.',
      ),
    ),
    'image_key' => 'water_drying_mats',
  ),
  5 => 
  array (
    'id' => 6,
    'slug' => 'category-3-sewage-backup-health-and-disinfection',
    'category' => 'Water Damage',
    'tag' => 'Biohazard Water',
    'title' => 'Category 3 Blackwater & Sewage Backups: Strict OSHA & IICRC Removal Rules',
    'date' => 'December 2025',
    'read_time' => '7 min technical read',
    'iicrc_standard' => 'ANSI/IICRC S500 Category 3 Water Protocol',
    'equipment_used' => 
    array (
      0 => 'Level-C PPE & Splash Shield',
      1 => 'ATP Hygiene Luminometer',
      2 => 'EPA Virucidal Sprayer',
    ),
    'excerpt' => 'Drain backups carry active bacteria, viruses, and endotoxins. Know exactly which household contents are non-salvageable and how certified sanitization works.',
    'body' => 
    array (
      0 => 'Unlike clean supply-pipe water (Category 1), municipal sewer backups, toilet bowl overflows containing feces, or rising river floods (Category 3 Blackwater) carry severe pathogenic microorganisms including E. coli, Hepatitis A, and aerosolized endotoxins.',
      1 => 'Under ANSI/IICRC S500 strict standards, all porous materials contacted by Category 3 liquid—including carpet, padding, upholstered furniture lower legs, particleboard cabinetry, and drywall—cannot be reliably disinfected and must be safely controlled-removed inside sealed heavy bags.',
      2 => 'Remaining structural framing, concrete slabs, and metal conduits undergo high-pressure sanitization, detergent scrubbing, botanical hospital disinfectant dwell cycles, and objective ATP bioluminescence testing before re-enclosure.',
    ),
    'steps' => 
    array (
      0 => '1. Restrict occupant & pet entry; shut off HVAC to prevent aerosol spread.',
      1 => '2. Extract raw waste via dedicated vacuum tanks without cross-contaminating clean drains.',
      2 => '3. Strip all porous substrates 12+ inches above the verified wicking line.',
      3 => '4. Clean, sanitize, verify via ATP swabbing, and seal-dry bare concrete/studs.',
    ),
    'dos' => 
    array (
      0 => 'Ensure technicians isolate the clean living zone with negative-air poly barriers.',
    ),
    'donts' => 
    array (
      0 => 'Never try drying sewage-soaked carpets with household fans—doing so aerosolizes pathogens.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Is sewer backup covered automatically by homeowner insurance?',
        'a' => 'Many standard policies exclude municipal sewer backups unless a specific Water/Sewer Backup Endorsement was purchased; check your declarations page immediately.',
      ),
    ),
    'image_key' => 'water_hardwood_clean',
  ),
  6 => 
  array (
    'id' => 7,
    'slug' => 'dry-chemical-sponge-soot-removal-guide',
    'category' => 'Fire & Smoke',
    'tag' => 'Soot Chemistry',
    'title' => 'Dry-Chemical Sponges vs. Wet Cleaning: Stopping Permanent Soot Etching',
    'date' => 'February 2026',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'ANSI/IICRC S700 Surface Residue Classification',
    'equipment_used' => 
    array (
      0 => 'Vulcanized Natural Rubber Sponges',
      1 => 'HEPA Brush Vacuums',
      2 => 'Alkaline Neutralizing Degreasers',
    ),
    'excerpt' => 'Soot residue type depends on what burned—synthetic upholstery, dry wood framing, or kitchen protein grease—and wiping with the wrong cleaner locks stains permanently.',
    'body' => 
    array (
      0 => 'Smoke is not uniform ash. Low-oxygen smoldering fires involving plastics, foams, and synthetic carpets leave sticky, oily wet-smoke webs that smear effortlessly. High-heat paper and wood fires produce powdery dry soot, while stove grease fires leave invisible, fiercely pungent protein films.',
      1 => 'Certified fire techs test an inconspicuous patch using HEPA vacuuming followed by non-water vulcanized natural rubber dry-cleaning sponges. Slicing darkened sponge layers cleanly as they load lifts carbon soot out of matte ceiling texture and brick pores without smudging.',
      2 => 'Only after dry carbon lifting concludes are targeted alkaline neutralizers applied to neutralize hydrochloric and sulfuric acids before priming.',
    ),
    'steps' => 
    array (
      0 => '1. Identify combustion fuel chemistry (Dry, Wet/Synthetic, Protein, or Fuel Oil).',
      1 => '2. HEPA brush-vacuum loose cobweb and surface soot prior to any contact wiping.',
      2 => '3. Dry-sponge porous drywall and brick masonry from cleanest zone toward worst zone.',
      3 => '4. Wet-neutralize acidic residues on tile, cabinetry, and bright metals immediately to stop pitting.',
    ),
    'dos' => 
    array (
      0 => 'Protect stainless steel appliances, marble counters, and brass hardware within hours of suppression.',
    ),
    'donts' => 
    array (
      0 => 'Never wipe smoke-coated painted walls with wet paper towels or standard glass cleaner.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Why did smoke travel to rooms far away from the kitchen fire?',
        'a' => 'Thermal convection pushes pressurized heated smoke gases through wall electrical outlets, recessed can lights, and return HVAC ducts seeking cold exterior walls.',
      ),
    ),
    'image_key' => 'article_fire_soot',
  ),
  7 => 
  array (
    'id' => 8,
    'slug' => 'hydroxyl-vs-ozone-smoke-odor-elimination',
    'category' => 'Fire & Smoke',
    'tag' => 'Deodorization Physics',
    'title' => 'Hydroxyl Generators vs. Ozone Chambers: Permanent Smoke Odor Removal',
    'date' => 'January 2026',
    'read_time' => '7 min technical read',
    'iicrc_standard' => 'IICRC S700 Multi-Step Deodorization Matrix',
    'equipment_used' => 
    array (
      0 => 'TiO2 UV-A Hydroxyl Generators',
      1 => 'Tri-Atomic Ozone Chambers',
      2 => 'Thermal Fogger Units',
    ),
    'excerpt' => 'Masking odor sprays fade in 48 hours. Compare true molecular oxidation methods safe for occupied homes vs. vaulted structural shock treatments.',
    'body' => 
    array (
      0 => 'True deodorization requires altering or destroying volatile organic compounds (VOCs) absorbed into wood, grout, and fabric pores—not spraying heavy fragrances over them. Odor science follows four mandatory stages: source removal, surface cleaning, vapor-phase odor counteractant penetration, and structural sealing.',
      1 => 'Hydroxyl radical generators use UV light spectrums over titanium dioxide catalysts to safely oxidize airborne smoke molecules in occupied residences without degrading rubber gaskets, indoor plants, or electronics.',
      2 => 'Conversely, high-output ozone generators are strictly utilized inside vacant contained zones or sealed off-site pack-out vault rooms when rapid structural oxidation of heavy charred timber is needed.',
    ),
    'steps' => 
    array (
      0 => '1. Physically remove charred framing and unsalvageable burnt contents (Source Removal).',
      1 => '2. Thoroughly clean walls, HVAC interiors, and ceiling plenums.',
      2 => '3. Deploy safe continuous Hydroxyl scrubbers in active repair zones.',
      3 => '4. Coat deeply scorched structural joists with pigmented shellac barrier primer.',
    ),
    'dos' => 
    array (
      0 => 'Insist on HVAC ductwork cleaning prior to powering central heat or air.',
    ),
    'donts' => 
    array (
      0 => 'Never remain inside a room where high-PPM ozone shock machines are operating.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Will smoke smell return on humid summer afternoons?',
        'a' => 'Only if underlying porous timber wasn’t cleaned, oxidized, and shellac-sealed; proper four-step S700 deodorization stops summer off-gassing permanently.',
      ),
    ),
    'image_key' => 'fire_framing',
  ),
  8 => 
  array (
    'id' => 9,
    'slug' => 'structural-timber-encapsulation-after-attic-fire',
    'category' => 'Fire & Smoke',
    'tag' => 'Structural Recovery',
    'title' => 'Ice & Soda Blasting Charred Attic Rafters Before Odor Barrier Sealing',
    'date' => 'December 2025',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'Structural Engineer + IICRC S700 Timber Remediation',
    'equipment_used' => 
    array (
      0 => 'Dry-Ice Blasting Rig',
      1 => 'Bicarbonate Soda Blaster',
      2 => 'Shellac Kilz Sealer Sprayer',
    ),
    'excerpt' => 'Sandblasting weakens historic rafters, while paint over deep char traps burnt smell forever. See how dry-ice and sodium bicarbonate lift char cleanly.',
    'body' => 
    array (
      0 => 'When attic trusses suffer superficial flash charring without losing structural cross-section depth (verified by a licensed structural engineer), tearing down an entire roof structure is often unnecessary. However, deeply charred pores harbor acidic smoke resins resistant to hand scrubbing.',
      1 => 'Pressurized baking-soda blasting and cryogenic dry-ice pellet blasting shear carbonized char down to bright raw wood grain without leaving secondary abrasive sand grit behind. Once blasted and HEPA vacuumed, pigmented shellac vapor-barrier coatings lock any microscopic timber trace permanently inside the wood.',
    ),
    'steps' => 
    array (
      0 => '1. Have a structural engineer verify load-bearing truss strength and member spacing.',
      1 => '2. Isolate attic floor beneath negative air containment before blasting begins.',
      2 => '3. Blast charred timber evenly using dry-ice pellets or sodium bicarbonate media.',
      3 => '4. Spray continuous shellac odor-sealing coat across all exposed decking and joists.',
    ),
    'dos' => 
    array (
      0 => 'Check municipal code before blasting; leave-clean inspection photos streamline building sign-off.',
    ),
    'donts' => 
    array (
      0 => 'Avoid brushing shellac over heavy unblasted flaking char—the sealer will simply peel off.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Why choose shellac sealer instead of cheaper latex primer?',
        'a' => 'Water-based latex paints are vapor-permeable, allowing residual burnt VOC gases to pass straight into rooms during hot attic days; shellac forms an airtight resin barrier.',
      ),
    ),
    'image_key' => 'article_fire_soot',
  ),
  9 => 
  array (
    'id' => 10,
    'slug' => 'ultrasonic-contents-pack-out-and-electronics-recovery',
    'category' => 'Fire & Smoke',
    'tag' => 'Contents Conservation',
    'title' => 'Barcoded Pack-Outs & Ultrasonic Soot Restoration for Electronics and Keepsakes',
    'date' => 'November 2025',
    'read_time' => '5 min technical read',
    'iicrc_standard' => 'Insurance Pack-Out Manifesting + UL Electronics Inspection',
    'equipment_used' => 
    array (
      0 => 'Ultrasonic Transducer Bath',
      1 => 'ESD Clean-Bench Drying Oven',
      2 => 'Inventory Barcode Scanners',
    ),
    'excerpt' => 'Recovering heirlooms, computers, and china faster than replacement lowers claim downtime and rescues irreplaceable personal belongings.',
    'body' => 
    array (
      0 => 'Before structural contractors strip soaked drywall or blast smoky rafters, RescuePro® contents specialists catalog every room item digitally using tablet barcode photography. Delicate glassware, bronze lamps, precision tools, and non-powered circuit boards travel safely to our ultrasonic cleaning bays.',
      1 => 'Using microscopic cavitation bubbles in temperature-regulated deionized baths, ultrasonic transducers flush carbon soot out of intricate engravings and cooling fins without abrasion before items rest in vaulted dry storage until rebuild day.',
    ),
    'steps' => 
    array (
      0 => '1. Perform digital room-by-room photographic inventory before packing cartons.',
      1 => '2. Clean smoke-coated porcelain, brass, and glass inside multi-frequency ultrasonic baths.',
      2 => '3. Store cleaned household goods inside security-monitored, humidity-controlled vaults.',
    ),
    'dos' => 
    array (
      0 => 'Keep personal identification, prescription medications, and jewelry with you during pack-out.',
    ),
    'donts' => 
    array (
      0 => 'Never power on a smoke-exposed computer or television before internal circuit soot is cleaned—carbon dust bridges electrical shorts.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Can I access seasonal clothes stored in your pack-out warehouse?',
        'a' => 'Yes. Because every box carries a room/item barcode manifest, technicians can retrieve requested clothing cartons on short notice.',
      ),
    ),
    'image_key' => 'packout_warehouse',
  ),
  10 => 
  array (
    'id' => 11,
    'slug' => 'negative-air-containment-in-mold-remediation',
    'category' => 'Mold',
    'tag' => 'Engineering Controls',
    'title' => 'Negative Air Pressure (-5 Pa) & Zip-Wall Containment in Mold Remediation',
    'date' => 'February 2026',
    'read_time' => '7 min technical read',
    'iicrc_standard' => 'ANSI/IICRC S520 Condition 3 Containment Rules',
    'equipment_used' => 
    array (
      0 => 'Phoenix Guardian HEPA 500',
      1 => 'Digital Differential Manometer',
      2 => '6-Mil Fire-Retardant Poly',
    ),
    'excerpt' => 'Why scraping mold openly contaminates your entire house—and how negative-pressure airlocks force airflow strictly inward until HEPA exhaust cleans it.',
    'body' => 
    array (
      0 => 'Microscopic mold spores (2 to 10 microns) weigh virtually nothing and ride normal household convection currents everywhere the moment dry scraping or demolition begins. Simply spraying bleach or running a household shop vacuum blows spores through the exhaust port at high velocity into clean bedrooms.',
      1 => 'Professional Condition 3 remediation isolates the contaminated area behind double-layered 6-mil polyethylene sheeting sealed tightly with painter-safe poly tape and zipped airlock chambers. A commercial HEPA Air Scrubber positioned inside vents filtered clean air outside via lay-flat ducting—dropping pressure inside the work zone to at least -5 Pascals relative to surrounding hallways.',
      2 => 'Any tiny air leak draws clean hallway air inward rather than pushing contaminated spore plumes outward, protecting immune-sensitive occupants throughout mitigation.',
    ),
    'steps' => 
    array (
      0 => '1. Lock out central air handlers and mask all nearby supply/return vents.',
      1 => '2. Erect floor-to-ceiling 6-mil poly containment barriers with negative-air HEPA exhaust.',
      2 => '3. Verify -5 Pa pressure differential on digital manometers throughout demolition.',
      3 => '4. Clean framing using HEPA-sandwiches (HEPA vacuum -> wire brush -> HEPA vacuum -> wipe).',
    ),
    'dos' => 
    array (
      0 => 'Request digital manometer pressure logs when reviewing your remediation work scope.',
    ),
    'donts' => 
    array (
      0 => 'Never open zip containment flaps while an active HEPA scrubber is turned off.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Must families vacate the house during contained mold work?',
        'a' => 'Not always for small localized Condition 3 baths with full -5 Pa containment; however, extensive whole-level remediation or occupants with severe asthma benefit from temporary relocation.',
      ),
    ),
    'image_key' => 'article_mold_air',
  ),
  11 => 
  array (
    'id' => 12,
    'slug' => 'third-party-iep-clearance-air-sampling-explained',
    'category' => 'Mold',
    'tag' => 'Quality Assurance',
    'title' => 'Independent IEP Mold Clearance Testing: How Lab Spore Traps Prove Clean Air',
    'date' => 'January 2026',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'IICRC S520 Independent Indoor Environmental Professional (IEP)',
    'equipment_used' => 
    array (
      0 => 'Air-O-Cell Bioaerosol Pump',
      1 => 'HEPA Air Scrubber',
      2 => 'Surface Tape-Lift Swabs',
    ),
    'excerpt' => 'Avoiding conflict of interest by pairing certified remediation crews with third-party laboratory air clearance prior to rebuilding your walls.',
    'body' => 
    array (
      0 => 'Trustworthy mold remediation separates who performs physical cleanup from who signs off final air safety. An independent Indoor Environmental Professional (IEP) inspects contained framing visually for zero visible dust or staining, verifies normal structural wood moisture (<15%), and draws metered Air-O-Cell bioaerosol samples compared against outdoor baseline air.',
      1 => 'When Stachybotrys/Chaetomium markers register zero and indoor Penicillium/Aspergillus counts sit well below outdoor air levels, the laboratory issues a formal Post-Remediation Verification (PRV) Clearance Certificate protecting homeowners, real estate buyers, and landlords.',
    ),
    'steps' => 
    array (
      0 => '1. Complete all HEPA vacuuming, antimicrobial wipes, and 24-hour air scrubbing.',
      1 => '2. Shut down the interior air scrubber 2 hours prior to lab sample collection OR sample per IEP protocol.',
      2 => '3. Keep poly containment intact until written lab clearance arrives.',
    ),
    'dos' => 
    array (
      0 => 'Keep final PRV lab clearance certificates permanently with your property title deeds.',
    ),
    'donts' => 
    array (
      0 => 'Never tear down containment poly walls before lab results verify clearance.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Can zero mold spores ever exist inside a house?',
        'a' => 'No. Natural ambient outdoor air constantly carries benign spores; clearance ensures indoor levels are clean, normal, and free of elevated water-indicator genera.',
      ),
    ),
    'image_key' => 'mold_removal',
  ),
  12 => 
  array (
    'id' => 13,
    'slug' => 'hvac-ductwork-coil-cleaning-after-mold-or-smoke',
    'category' => 'Mold',
    'tag' => 'Indoor Air Quality',
    'title' => 'HVAC Blower, Evaporator Coil & Supply Duct Sanitization After Mold or Smoke',
    'date' => 'December 2025',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'NADCA ACR Assessment, Cleaning & Restoration of HVAC Systems',
    'equipment_used' => 
    array (
      0 => 'Negative-Air Duct Vacuum (3500 CFM)',
      1 => 'Compressed Air Whip Lines',
      2 => 'Non-Toxic Coil Cleaner',
    ),
    'excerpt' => 'When microbial dust or acidic smoke coats air handler fins and insulated ductboard, running central air re-contaminates spotless rooms daily.',
    'body' => 
    array (
      0 => 'Condensation trays and cool fibrous ductboard plenums frequently collect airborne dust and moisture droplets—turning hidden HVAC components into silent dispersion engines after a basement leak or kitchen fire.',
      1 => 'Following NADCA ACR standards, RescuePro® technicians connect high-velocity negative-air collection trunks to the main supply and return plenums, isolate branch runs with zoning bladders, scrub blower squirrel cages and A-coils cleanly, and evaluate porous internal duct liner replacement if microbial colonization penetrated fiberglass backing.',
    ),
    'steps' => 
    array (
      0 => '1. Perform borescope camera inspection of main trunk lines and evaporator cabinet.',
      1 => '2. Pull registers, wash louvers, and block branch runs under 3500 CFM HEPA vacuum.',
      2 => '3. Agitate metallic duct interiors using rotary nylon brushes and pneumatic air whips.',
    ),
    'dos' => 
    array (
      0 => 'Replace basic fiberglass furnace filters with MERV 11–13 pleated filters post-cleaning.',
    ),
    'donts' => 
    array (
      0 => 'Never coat torn fibrous ductboard insulation with wet chemicals—damaged duct liner requires replacement.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Does homeowner insurance include HVAC cleaning after a fire?',
        'a' => 'Yes, when smoke residue or elevated airborne particulates entered return ducts during loss events.',
      ),
    ),
    'image_key' => 'cleaning_carpet_hvac',
  ),
  13 => 
  array (
    'id' => 14,
    'slug' => 'basement-efflorescence-vs-active-mold-colonies',
    'category' => 'Mold',
    'tag' => 'Diagnostic Checklist',
    'title' => 'White Basement Powder: Concrete Efflorescence Salt vs. Active Fungal Growth',
    'date' => 'November 2025',
    'read_time' => '5 min technical read',
    'iicrc_standard' => 'Masonry Moisture Diagnostics & IICRC S520',
    'equipment_used' => 
    array (
      0 => 'Pinless Masonry Meter',
      1 => 'Water Drop Dissolution Test',
      2 => 'HEPA Wire Scrubber',
    ),
    'excerpt' => 'Not every fuzzy white deposit on basement cinder blocks is mold. Learn how hydrostatic water leaves crystalline efflorescence—and when both occur together.',
    'body' => 
    array (
      0 => 'Crystalline chalky white crust on concrete basement walls is commonly misidentified as white mold. In reality, hydrostatic soil groundwater wicking inward dissolves calcium carbonate salts inside mortar and evaporates on the interior face—leaving crusty mineral efflorescence.',
      1 => 'Quick physical behavior distinguishes them: crystalline efflorescence crumbles grit-like between fingers and dissolves rapidly in clear water drops, whereas living mold colonies feel fuzzy, greasy, or velvety and never dissolve into clear droplets. Yet both warn of dangerous exterior hydrostatic foundation moisture that quickly grows true black mold on adjacent wood framing and boxes.',
    ),
    'steps' => 
    array (
      0 => '1. Inspect gutter downspouts and soil grading sloping toward the basement wall.',
      1 => '2. Wear N95 gloves while inspecting and avoid cardboard storage directly against masonry.',
      2 => '3. Install perimeter French drains or dehumidification below 50% RH.',
    ),
    'dos' => 
    array (
      0 => 'Extend exterior downspouts at least 6 feet away from basement foundation walls.',
    ),
    'donts' => 
    array (
      0 => 'Never cover damp efflorescing cinderblocks behind unsealed wood studs and fiberglass batts.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Does waterproof masonry paint permanently cure efflorescence?',
        'a' => 'No. High exterior hydrostatic groundwater pressure eventually blisters interior sealer paints unless exterior grading and drainage relieve soil saturation.',
      ),
    ),
    'image_key' => 'article_mold_air',
  ),
  14 => 
  array (
    'id' => 15,
    'slug' => 'emergency-roof-tarping-and-storm-board-up',
    'category' => 'Storm',
    'tag' => 'Hurricane & Wind Prep',
    'title' => '24/7 Emergency Board-Up & Sandbag-Free Wind-Rated Roof Tarping Standards',
    'date' => 'February 2026',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'FEMA Blue-Roof Furring Strip Tarping Standard',
    'equipment_used' => 
    array (
      0 => '10-Mil Woven Poly Tarps',
      1 => '2x4 Timber Furring Strips',
      2 => '5/8" CDX Plywood Panels',
    ),
    'excerpt' => 'Sandbags tear loose in 35 mph gusts. See how wrapped wood furring strips and reinforced tarping protect interiors without creating nail leaks.',
    'body' => 
    array (
      0 => 'Placing bricks or sandbags loosely over hardware-store plastic sheeting almost always fails on the second squall line—turning into dangerous flying projectiles while pouring fresh rainwater into soaked bedrooms. Insurance adjusters specifically require loss-mitigation duty of care under your property policy.',
      1 => 'RescuePro® emergency storm teams anchor heavy woven poly over missing ridge caps and tree-impact zones by wrapping the perimeter around continuous 1x3 and 2x4 wooden furring strips screwed neatly into roof rafters along intact upper deck edges—and utilizing tension-bolt compression brackets when boarding broken commercial storefronts so frames remain undamaged.',
    ),
    'steps' => 
    array (
      0 => '1. Assess overhead downed utility hazards safely from street grade first.',
      1 => '2. Measure roof opening and stretch heavy-duty poly over the ridge peak to shed runoff cleanly.',
      2 => '3. Wrap tarp edges around timber batten strips secured tightly into sound decking.',
    ),
    'dos' => 
    array (
      0 => 'Keep pre-loss and board-up invoices—policies typically reimburse reasonable emergency mitigation upfront.',
    ),
    'donts' => 
    array (
      0 => 'Never climb wet, wind-swept pitched roofs without fall-arrest harnesses.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'How fast can RescuePro® arrive to board up a broken window overnight?',
        'a' => 'Most urban and suburban districts deploy emergency board-up trucks within 1 to 3 hours 24/7/365.',
      ),
    ),
    'image_key' => 'article_storm_prep',
  ),
  15 => 
  array (
    'id' => 16,
    'slug' => 'sump-pump-battery-failure-and-basement-backup-guide',
    'category' => 'Storm',
    'tag' => 'Flood Prevention',
    'title' => 'Why Basement Sump Pumps Fail Mid-Storm—and Battery Backup Redundancy',
    'date' => 'January 2026',
    'read_time' => '5 min technical read',
    'iicrc_standard' => 'Residential Stormwater Mechanical Reliability Guide',
    'equipment_used' => 
    array (
      0 => 'Dual-Float DC Backup Sump',
      1 => 'Quiet Check Valve',
      2 => 'Wi-Fi High-Water Alarm',
    ),
    'excerpt' => 'Grid power drops precisely when groundwater pumps work hardest. Inspect stuck float switches and discharge freezes before spring rains arrive.',
    'body' => 
    array (
      0 => 'Roughly 70% of spring finished-basement flood losses occur not because drains clogged, but because lightning knocked out neighborhood electricity right at peak storm rainfall—leaving AC-only basement sump pits overflowing within 22 minutes.',
      1 => 'Protect finished basements with four annual 5-minute tests: pour a 5-gallon bucket slowly into the crock to test the vertical mechanical float switch, check the AGM deep-cycle DC marine backup battery charge, inspect exterior buried discharge pop-ups for ice or root blockage, and mount a wireless water puck alarm on the rim.',
    ),
    'steps' => 
    array (
      0 => '1. Unplug and test AC pump float actuation using 5 gallons of clear tap water.',
      1 => '2. Verify automatic DC marine battery backup switch-over by briefly tripping the AC breaker.',
      2 => '3. Confirm exterior check-valve flap closes cleanly without water hammering.',
    ),
    'dos' => 
    array (
      0 => 'Replace primary AC submersible pumps proactively every 7 to 10 years.',
    ),
    'donts' => 
    array (
      0 => 'Avoid cheap tethered float switches inside narrow pits where cords catch on crock walls.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Are water-powered municipal backup pumps reliable?',
        'a' => 'Yes on pressurized city water mains with zero electricity required, though they pump slower per minute than heavy-duty 12V DC battery backups.',
      ),
    ),
    'image_key' => 'storm_response',
  ),
  16 => 
  array (
    'id' => 17,
    'slug' => 'catastrophe-mobile-desiccant-trailers-and-generator-staging',
    'category' => 'Storm',
    'tag' => 'Large-Loss Fleet',
    'title' => 'How Mobile Desiccant Semi-Trailers Dry Flooded Towers During Grid Blackouts',
    'date' => 'December 2025',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'Commercial CAT Power & 5000 CFM Desiccant Psychrometrics',
    'equipment_used' => 
    array (
      0 => '5000 CFM Desiccant Rotor Trailer',
      1 => '150 kW Whisper Diesel Gen',
      2 => '20" Lay-Flat Ducting',
    ),
    'excerpt' => 'Refrigerant dehumidifiers slow down in cold flooded buildings or unpowered plants. Silica gel desiccant trailers pump bone-dry 5% RH air nonstop.',
    'body' => 
    array (
      0 => 'Standard refrigerant dehumidifiers rely on cold evaporator coils to condense liquid water—losing efficiency sharply when winter storm blackouts drop interior commercial temperatures below 55°F. Desiccant dehumidification uses rotating silica-gel honeycomb wheels that chemically adsorb moisture vapor straight from air streams regardless of cold temperatures.',
      1 => 'Mounted alongside self-contained commercial diesel generators, RescuePro® 5000 CFM desiccant rigs feed massive dry airflow through flexible lay-flat ductwork across multi-floor hotels, warehouses, and school gyms—drying structural concrete and elevator shafts days ahead of traditional schedules.',
    ),
    'steps' => 
    array (
      0 => '1. Deploy self-contained diesel generator and 5000 CFM desiccant trailer at exterior loading bay.',
      1 => '2. Route supply air ducts into wet shafts and pressurize stairwells cleanly.',
      2 => '3. Monitor supply vs. return dew-point differential continuously on cloud telemetry.',
    ),
    'dos' => 
    array (
      0 => 'Pre-designate exterior generator staging pads in your Commercial Emergency Ready Plan.',
    ),
    'donts' => 
    array (
      0 => 'Never operate portable fuel generators inside enclosed garages or dock corridors (CO hazard).',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Does RescuePro® fuel its own generators during regional fuel shortages?',
        'a' => 'Yes—National CAT mobile command convoys carry auxiliary diesel fuel tenders and priority carrier contracts.',
      ),
    ),
    'image_key' => 'commercial_largeloss',
  ),
  17 => 
  array (
    'id' => 18,
    'slug' => 'winter-freeze-pipe-thawing-and-burst-prevention',
    'category' => 'Storm',
    'tag' => 'Freeze Mitigation',
    'title' => 'Preventing Exploded Attic & Exterior Wall Pipes During Sub-Zero Polar Vortexes',
    'date' => 'November 2025',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'Cold-Weather Plumbing Stabilization Guide',
    'equipment_used' => 
    array (
      0 => 'Digital Pipe Freeze Thawer',
      1 => 'Infrared Draft Locator',
      2 => 'Frost-Free Sillcock',
    ),
    'excerpt' => 'Ice expansion generates over 2,000 PSI inside copper elbows—splitting pipes behind insulated cabinets that only flood when temperatures rise.',
    'body' => 
    array (
      0 => 'Most devastating winter home floods occur not during the deepest overnight freeze, but the next afternoon when melting ice plugs unleash city water pressure through split copper elbows hidden behind kitchen cabinets or garage walls.',
      1 => 'Simple preventive checks drop freeze claim risk over 80%: disconnect exterior garden hoses before the first frost (trapped water bursts interior sillcock stems inside siding), insulate perimeter rim joists, leave under-sink vanity doors propped open to circulate 68°F room air, and install an automatic ultrasonic flow shutoff valve if traveling.',
    ),
    'steps' => 
    array (
      0 => '1. Locate main indoor water shutoff valve and attach a bright neon identification tag.',
      1 => '2. Open vanity cabinets on uninsulated exterior walls during <20°F cold snaps.',
      2 => '3. Allow farthest faucet cold/hot blend a pencil-thin continuous trickle during deep freezes.',
    ),
    'dos' => 
    array (
      0 => 'Keep indoor thermostat no lower than 58°F even when leaving home vacant in winter.',
    ),
    'donts' => 
    array (
      0 => 'Never thaw frozen copper or PEX pipes with an open-flame propane torch inside wall bays.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Can PEX plastic pipe freeze and still burst?',
        'a' => 'While PEX expands more flexibly than rigid copper, brass crimp fittings and hard freezes still split PEX assemblies if ice persists too long.',
      ),
    ),
    'image_key' => 'article_roof_leak',
  ),
  18 => 
  array (
    'id' => 19,
    'slug' => 'commercial-emergency-ready-plan-erp-blueprint',
    'category' => 'Commercial',
    'tag' => 'Business Continuity',
    'title' => 'Why 50% of Businesses Never Reopen After Disasters—and How a Free ERP Protects Revenue',
    'date' => 'February 2026',
    'read_time' => '7 min technical read',
    'iicrc_standard' => 'NFPA 1600 Business Continuity & Pre-Loss Preparedness',
    'equipment_used' => 
    array (
      0 => 'Digital Valve QR Tagging',
      1 => 'Matterport Pre-Loss Map',
      2 => 'Priority Dispatch SLA',
    ),
    'excerpt' => 'Mapping main sprinkler risers, electrical panels, and backup IT rooms before an incident cuts commercial mitigation downtime by up to 62%.',
    'body' => 
    array (
      0 => 'When a 2-inch fire sprinkler riser snaps at 2:15 AM inside a medical clinic or downtown hotel, nighttime security staff rarely know where main shutoff gate valves hide behind mechanical room doors—costing $40,000 per hour in cascading elevator shaft damage while searching for blueprints.',
      1 => 'A RescuePro® Emergency Ready Plan (ERP) is a complimentary pre-loss facility digital dossier containing high-resolution valve location photos, utility lockouts, priority vendor contacts, and pre-authorized Work Authorization approvals so field crews bypass administrative bottlenecks during peak storm seasons.',
    ),
    'steps' => 
    array (
      0 => '1. Walk mechanical basements and roof penthouses with a RescuePro® Commercial Specialist.',
      1 => '2. Label all main domestic water, sprinkler riser, gas, and panel shutoffs with durable QR tags.',
      2 => '3. Sync shutoff maps and backup contacts directly inside your RescuePro® Mobile ERP Portal.',
    ),
    'dos' => 
    array (
      0 => 'Assign one designated after-hours decision maker with pre-signed work authorization clearance.',
    ),
    'donts' => 
    array (
      0 => 'Do not lock mechanical shutoff rooms behind key-only doors inaccessible to facility security.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Is creating a Commercial ERP really free with zero subscription obligation?',
        'a' => 'Yes. RescuePro® builds, tags, and hosts your Emergency Ready Plan at zero charge as part of our local community preparedness partnership.',
      ),
    ),
    'image_key' => 'article_commercial_erp',
  ),
  19 => 
  array (
    'id' => 20,
    'slug' => 'multi-story-sprinkler-discharge-containment',
    'category' => 'Commercial',
    'tag' => 'High-Rise Engineering',
    'title' => 'High-Rise Fire Sprinkler Discharge: Stopping Vertical Floor-to-Floor Cascade',
    'date' => 'January 2026',
    'read_time' => '7 min technical read',
    'iicrc_standard' => 'Commercial High-Rise Water Containment & Elevator Safety',
    'equipment_used' => 
    array (
      0 => 'Dike Berms & Floor Squeezes',
      1 => 'Elevator Shaft Lockout Safety',
      2 => 'Multi-Floor Power Distribution',
    ),
    'excerpt' => 'One triggered sprinkler head flows 25+ gallons per minute of stagnant iron-pipe water across occupied tenant suites and electrical closets below.',
    'body' => 
    array (
      0 => 'Stagnant black fire-suppression pipe water contains iron oxide sludge, cutting oils, and bacterial slime that permanently stain commercial carpet tiles and penetrate structural concrete floor cores around plumbing sleeves down 4 to 8 stories below the origin point.',
      1 => 'Immediate commercial containment targets elevator shafts and IT server risers first using pressurized dike barriers, multi-truck simultaneous floor extraction, suspended acoustic tile removal, and commercial desiccant conditioning without halting unaffected tenant wings.',
    ),
    'steps' => 
    array (
      0 => '1. Lock out exposed elevator shafts and low-voltage risers safely with building engineering.',
      1 => '2. Form floor diversion dikes channeling discharge toward temporary extraction manifolds.',
      2 => '3. Remove wet mineral acoustic ceiling tiles immediately before sagging grids collapse.',
    ),
    'dos' => 
    array (
      0 => 'Notify building life-safety alarm monitoring desks prior to isolating wet sprinkler zones.',
    ),
    'donts' => 
    array (
      0 => 'Never operate wet shop vacuums plugged into damp floor-mounted electrical duplex boxes.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Can offices remain partially open while drying one flooded wing?',
        'a' => 'Yes. Zippered acoustic containment corridors and night-shift noisy tear-out keep unaffected hospital clinics and corporate offices generating revenue.',
      ),
    ),
    'image_key' => 'commercial_largeloss',
  ),
  20 => 
  array (
    'id' => 21,
    'slug' => 'healthcare-terminal-cleaning-and-atp-verification',
    'category' => 'Commercial',
    'tag' => 'Healthcare ICRA',
    'title' => 'ICRA Class IV Hospital Containment & ATP Bio-Verification During Remediation',
    'date' => 'December 2025',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'ASHRAE/ASHE ICRA Class IV Infection Control Risk Assessment',
    'equipment_used' => 
    array (
      0 => 'Hard-Panel Ante-Rooms',
      1 => 'HEPA Negative Monitors',
      2 => 'ATP Hygiene Readers',
    ),
    'excerpt' => 'Dust and fungal spores harmless outdoors pose life-threatening risks near surgical suites and oncology wards. Explore hospital ICRA containment.',
    'body' => 
    array (
      0 => 'Water leaks inside ambulatory clinics, skilled nursing centers, and acute care hospitals require strict ASHE Infection Control Risk Assessment (ICRA) Class III/IV containment before any ceiling tile rises or drywall breaks. Aspergillus spores disturbed during repairs can endanger immunocompromised patients.',
      1 => 'RescuePro® Healthcare Mitigation Teams deploy rigid modular hardwall ante-rooms, sticky-walk tacky mats, continuous negative-pressure alarm logging, and post-clean ATP bioluminescence threshold audits coordinated alongside hospital Infection Preventionists.',
    ),
    'steps' => 
    array (
      0 => '1. Co-sign ICRA Class IV work permit with facility Infection Prevention Leadership.',
      1 => '2. Install rigid lockable barrier walls, negative-air HEPA exhausts, and dual clean/dirty rooms.',
      2 => '3. Verify differential pressure logs and ATP RLU swab counts under threshold before reopening.',
    ),
    'dos' => 
    array (
      0 => 'Inspect HEPA exhaust filters with DOP aerosol particle counters prior to healthcare start.',
    ),
    'donts' => 
    array (
      0 => 'Never transport uncovered demolition debris through active clinical patient corridors.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Do hospital crews undergo background and vaccination compliance screening?',
        'a' => 'Yes—certified Commercial Large-Loss healthcare specialists maintain up-to-date badging and ICRA certification cards.',
      ),
    ),
    'image_key' => 'article_commercial_erp',
  ),
  21 => 
  array (
    'id' => 22,
    'slug' => 'xactimate-level-3-estimating-and-moisture-log-audits',
    'category' => 'Insurance',
    'tag' => 'Insurance Claims',
    'title' => 'Inside Xactimate® Estimating: How Daily Moisture Logs Prevent Claim Disputes',
    'date' => 'February 2026',
    'read_time' => '7 min technical read',
    'iicrc_standard' => 'Xactimate® ESX Pricing & Carrier Desk-Adjuster Audit Charter',
    'equipment_used' => 
    array (
      0 => 'DryBook® Mobile Sync',
      1 => 'Xactimate Sketch Blueprints',
      2 => 'Daily Hygrometer Logs',
    ),
    'excerpt' => 'Property adjusters audit mitigation bills on objective evidence—not guesses. See why room sketches, GPP charts, and time-stamped photos speed claim checks.',
    'body' => 
    array (
      0 => 'Claim bottlenecks almost always happen when a restoration invoice arrives lacking objective proof justifying why four air movers and two LGR dehumidifiers stayed on site five days instead of two. Modern carrier desk adjusters audit digital mitigation files strictly against ANSI/IICRC S500 equipment sizing formulas.',
      1 => 'Every RescuePro® claim packet bundles dimensionally accurate Xactimate® room sketches, affected-material square footages, Day 1 vs. Day 5 wood moisture percentages, and thermal images proving exact tear-out lines—delivering a 99.4% clean first-pass carrier approval rate.',
    ),
    'steps' => 
    array (
      0 => '1. Capture wide establishing photos plus close-ups with rulers and wet moisture gauges on Day 1.',
      1 => '2. Record intake and exhaust dehumidifier grains-per-pound (GPP) psychrometrics every 24 hours.',
      2 => '3. Pull drying machines promptly the moment affected assemblies match dry-goal baseline readings.',
    ),
    'dos' => 
    array (
      0 => 'Track your claim number inside the RescuePro® Customer Portal to view real-time carrier sign-off.',
    ),
    'donts' => 
    array (
      0 => 'Avoid throwing away failed plumbing valves or burst washing-machine hoses before adjuster inspection.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Does RescuePro® bill my insurance company directly?',
        'a' => 'Yes, in almost all covered claims. We transmit standardized Xactimate documentation straight to your desk or field adjuster upon work authorization.',
      ),
    ),
    'image_key' => 'insurance_consult',
  ),
  22 => 
  array (
    'id' => 23,
    'slug' => 'oriental-rugs-and-fine-upholstery-extraction-care',
    'category' => 'Cleaning',
    'tag' => 'Textile Science',
    'title' => 'Wet Cleaning Wool Oriental Rugs & Delicate Upholstery Without Dye Bleed',
    'date' => 'December 2025',
    'read_time' => '5 min technical read',
    'iicrc_standard' => 'IICRC S300 Upholstery & Rug Conservation Standard',
    'equipment_used' => 
    array (
      0 => 'pH-Buffered Acidic Rinse',
      1 => 'Shearing Upholstery Tool',
      2 => 'Centrifuge Rug Dryer',
    ),
    'excerpt' => 'Alkaline carpet detergents strip protective wool lanolin and trigger permanent color bleeding on natural silk and Persian weaves.',
    'body' => 
    array (
      0 => 'Natural wool, silk, linen, and cotton Haitian weaves require vastly gentler cleaning chemistry than synthetic nylon residential broadloom carpeting. High-pH alkaline pre-sprays or over-wetting water temperatures above 150°F strip essential wool fibers, shrink cotton warps, and destabilize vegetable dyes within minutes.',
      1 => 'RescuePro® textile specialists always perform pre-clean crocking dye-fastness tests, vacuum dry soil thoroughly from the pile foundation, mist neutral/acidic pH conditioners, extract via zero-overspray shearing upholstery tools, and flat-dry silk/wool pieces rapidly.',
    ),
    'steps' => 
    array (
      0 => '1. Identify weave fiber content (burn/solubility test) and wet-crock dye migration check.',
      1 => '2. Dry-brush and pile-lift embedded abrasive silica grit before adding moisture.',
      2 => '3. Rinse with slightly acidic pH-neutralizing fiber stabilizer and turbo-dry evenly.',
    ),
    'dos' => 
    array (
      0 => 'Rotate heirloom rugs 180 degrees annually and pad cleanly over sealed hardwood.',
    ),
    'donts' => 
    array (
      0 => 'Never use enzyme oxygen stain removers on genuine silk or fine Merino wool.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'How often should household upholstery be professionally cleaned?',
        'a' => 'Every 12 to 24 months depending on pets and HVAC air filtration to prevent grit wear on seat cushions.',
      ),
    ),
    'image_key' => 'cleaning_carpet_hvac',
  ),
  23 => 
  array (
    'id' => 24,
    'slug' => 'discreet-biohazard-and-osha-pathogen-standards',
    'category' => 'Cleaning',
    'tag' => 'Bio-Decontamination',
    'title' => 'OSHA Bloodborne Pathogen Rules & Certified Biohazard Site Clearance',
    'date' => 'November 2025',
    'read_time' => '6 min technical read',
    'iicrc_standard' => 'OSHA 29 CFR 1910.1030 + IICRC S540 Trauma Cleanup',
    'equipment_used' => 
    array (
      0 => 'ATP Bioluminescence Swab Meter',
      1 => 'EPA Registered Virucide',
      2 => 'DOT Bio-Waste Shippers',
    ),
    'excerpt' => 'What property managers must verify before releasing trauma, hoarding, or medical spill suites back to staff or tenants safely.',
    'body' => 
    array (
      0 => 'Biological fluids seep rapidly beneath laminate seams, vinyl floor tiles, and subfloor nail holes where surface mopping cannot reach. Under OSHA 29 CFR 1910.1030, untrained building custodians should never handle bloodborne spills without certified Bloodborne Pathogen training, Hepatitis immunization protocols, and regulated bio-medical waste disposal manifests.',
      1 => 'Certified RescuePro® bio-recovery teams quietly decontaminate affected rooms, strip compromised porous subfloors where capillary blood penetrated, execute validated chemical dwell intervals, and prove microscopic cleanliness via handheld ATP hygiene readings.',
    ),
    'steps' => 
    array (
      0 => '1. Secure affected doors cleanly while preserving dignity and building privacy.',
      1 => '2. Package biological materials inside rigid DOT-approved infectious waste drums.',
      2 => '3. Sanitize hard and structural substrates to verified pass thresholds on ATP meters.',
    ),
    'dos' => 
    array (
      0 => 'Verify your cleanup provider supplies official medical-waste manifest destruction certificates.',
    ),
    'donts' => 
    array (
      0 => 'Never place blood-soaked carpeting or gauze into regular municipal dumpsters.',
    ),
    'faq' => 
    array (
      0 => 
      array (
        'q' => 'Can unmarked vehicles be requested for trauma site response?',
        'a' => 'Yes. Discreet unmarked commercial response vans are available upon request when privacy matters most.',
      ),
    ),
    'image_key' => 'biohazard_clean',
  ),
);
        foreach ($items as &$a) {
            $a['image'] = sp_img($a['image_key'] ?? 'article_laminate');
        }
        return $items;
    }

    public static function pressReleases(): array
    {
        return [
            'featured' => [
                [
                    'title' => 'RescuePro Proudly Sponsors CNN Heroes: An All-Star Tribute Honoring Five Inspiring Changemakers',
                    'summary' => 'Viewers Name Quilen Blackwell as 2025 CNN Hero of the Year',
                    'location' => 'GALLATIN, Tennessee, December',
                ],
                [
                    'title' => 'RescuePro Proudly Presents National First Responders Day Roll Call of Heroes Ceremony in Times Square',
                    'summary' => 'First Responders Children’s Foundation event hosted by Jon Stewart honors first ...',
                    'location' => 'NEW YORK, New York',
                ],
            ],
            'list' => [
                [
                    'title' => 'Holiday Plans Can Go Up in Smoke in Less Than a Minute',
                    'meta' => 'GALLATIN, Tennessee, December 15, 2025—A Christmas tree fire can go from a single spark ...',
                ],
                [
                    'title' => 'RescuePro Annual Convention Raises More Than $100,000 for First Responders Children’s Foundation',
                    'meta' => 'GALLATIN, TENNESSEE, July 31, 2025 — The RescuePro community raised more than $100,000 in ...',
                ],
                [
                    'title' => 'RescuePro Partners with First Responders Children’s Foundation to Honor 9/11 Heroes and Support Nashvi...',
                    'meta' => 'NASHVILLE, TN – In commemoration of September 11th and to honor the courage of first ...',
                ],
            ],
        ];
    }

    public static function communityStories(): array
    {
        return [
            [
                'image' => sp_img('hero_van_techs_clean'),
                'title' => 'First Responders Children’s Foundation, RescuePro Honor First Responders After L.A. Wildfires',
                'subtitle' => 'Private Event at Dodger Stadium Supports Community Heroes',
                'location' => 'LOS ANGELES, California, ...',
            ],
            [
                'image' => sp_img('firefighter_hose'),
                'title' => 'RescuePro Honors Fallen Firefighter at First Responder Bowl',
                'subtitle' => '12 Honor a Responder Awards Given at Bowl Games Across the Country',
                'location' => 'Gallatin, Tennessee, ...',
            ],
            [
                'image' => sp_img('commercial_handshake'),
                'title' => 'PGA TOUR, RescuePro announce extension of marketing partnership',
                'subtitle' => 'RescuePro has served as the Official Cleanup and Restoration Company of the PGA TOUR since ...',
                'location' => 'PONTE VEDRA BEACH, Florida, ...',
            ],
        ];
    }

    public static function glossaryTerms(): array
    {
        return [
            'a' => [
                ['term' => 'Antimicrobial', 'def' => 'An EPA-registered agent applied during water, sewage, or mold mitigation to inhibit microorganisms including fungi and bacteria on structural framing.'],
                ['term' => 'Air Scrubber (HEPA)', 'def' => 'A portable filtration machine utilizing 0.3-micron High-Efficiency Particulate Air filters to strip mold spores, fine soot, and dust from indoor air.'],
                ['term' => 'Air Mover', 'def' => 'A high-velocity centrifugal or axial fan positioned across wet walls and carpets to evaporate surface moisture into surrounding air for dehumidification.'],
            ],
            'b' => [
                ['term' => 'Biohazard', 'def' => 'Biological contaminants including bloodborne pathogens, sewage backup, animal waste, or viral matter requiring OSHA-compliant PPE and regulated disposal.'],
                ['term' => 'Black Water (Category 3)', 'def' => 'Grossly contaminated water from sewage line backups, rising river floods, or sea surges containing dangerous microbes and chemical toxins.'],
                ['term' => 'Board-Up', 'def' => 'Immediate structural plywood sealing over shattered glass doors and windows following fire, vehicle impact, or storm breaches.'],
            ],
            'c' => [
                ['term' => 'Containment Chamber', 'def' => 'Sealed 6-mil polyethylene sheeting paired with negative air pressure machines that prevent mold spores or lead/asbestos dust from leaving a work area.'],
                ['term' => 'Contents Pack-Out', 'def' => 'Barcoded inventorying, packing, and transport of furniture and personal keepsakes to a climate warehouse during home restoration.'],
                ['term' => 'Cross-Contamination', 'def' => 'Accidental transfer of microbial spores, soot, or biological matter from an affected zone into clean living areas via footwear, HVAC, or airflow.'],
            ],
            'd' => [
                ['term' => 'Dehumidifier (LGR)', 'def' => 'Low-Grain Refrigerant equipment engineered to extract significantly lower humidity grains from air even as materials approach dry standards.'],
                ['term' => 'Desiccant Dehumidifier', 'def' => 'Silica-gel rotor drying machinery that produces ultra-dry air ideal for unheated winter sites, concrete vaults, and commercial large losses.'],
                ['term' => 'Delamination', 'def' => 'Separation of secondary latex carpet backing or wood flooring veneers when adhesives weaken from prolonged saturation.'],
            ],
            'g' => [
                ['term' => 'Grey Water (Category 2)', 'def' => 'Water carrying significant chemical, biological, or physical contaminants from washing machine discharge, sump pumps, or aquarium breaks.'],
                ['term' => 'Grains Per Pound (GPP)', 'def' => 'Standard psychrometric measurement indicating exact weight of water vapor present inside each pound of dry air (used to track drying efficiency).'],
            ],
            'i' => [
                ['term' => 'IICRC S500 / S520', 'def' => 'Internationally recognized standards published by the Institute of Inspection Cleaning and Restoration Certification for professional Water and Mold work.'],
                ['term' => 'Infrared Thermography', 'def' => 'Non-destructive thermal camera imaging that reveals cool evaporative zones indicating concealed moisture behind drywall and tile.'],
            ],
            'l' => [
                ['term' => 'Large Loss Division', 'def' => 'Dedicated RescuePro catastrophe commercial teams equipped for hospitals, universities, factories, and multi-story losses exceeding standard single-franchise inventory.'],
                ['term' => 'Loss Mitigation', 'def' => 'Prompt emergency actions taken to prevent secondary water, mold, or corrosion damage and reduce overall property repair costs.'],
            ],
            'm' => [
                ['term' => 'Moisture Content (MC)', 'def' => 'Percentage weight of moisture measured inside wood subfloors, studs, or drywall using calibrated pin and pinless meters.'],
                ['term' => 'Moisture Mapping', 'def' => 'Systematic daily logging of perimeter wetness lines across rooms to prove complete structural drying for policyholders and insurers.'],
            ],
            'n' => [
                ['term' => 'Negative Air Pressure', 'def' => 'Exhausting filtered air out of a poly-sealed containment zone so any leakage pulls clean room air inward rather than letting spores escape.'],
                ['term' => 'National Call Center', 'def' => 'RescuePro’s 24/7/365 dispatch intake center coordinating local franchise routing nationwide and assisting commercial accounts.'],
            ],
            'o' => [
                ['term' => 'Ozone Generator', 'def' => 'Unoccupied-space oxidative machine producing O3 molecules that break apart heavy smoke, pet, and decay odors permanently.'],
            ],
            'p' => [
                ['term' => 'Psychrometrics', 'def' => 'Science of temperature, relative humidity, and vapor pressure balanced carefully inside a structure to achieve rapid, safe evaporation.'],
                ['term' => 'Puff-Back', 'def' => 'Fuel ignition misfire in an oil furnace or boiler that blasts sticky, smelly black soot throughout supply registers and carpets.'],
            ],
            'r' => [
                ['term' => 'Relative Humidity (RH)', 'def' => 'Ratio of airborne water vapor compared to the maximum vapor capacity at that temperature; kept between 30–50% to curb mold.'],
                ['term' => 'Reconstruction', 'def' => 'Licensed general-contracting phases returning mitigated spaces to pre-loss framing, insulation, drywall, trim, and paint.'],
            ],
            's' => [
                ['term' => 'Sublimation (Freeze-Drying)', 'def' => 'Converting ice crystals in frozen books or medical documents straight into vapor under vacuum without passing through damaging liquid phase.'],
                ['term' => 'Subfloor', 'def' => 'Structural plywood or OSB sheathing supporting finished flooring that requires deep drying to avoid squeaks and delamination.'],
            ],
            'u' => [
                ['term' => 'Ultrasonic Cleaning', 'def' => 'High-frequency acoustic waves inside liquid tanks that lift smoke soot out of intricate hardware, crystal, electronics, and blinds.'],
            ],
            'w' => [
                ['term' => 'Water Extraction', 'def' => 'Physical pumping and vacuuming of liquid water, roughly 500x faster at moisture removal than evaporation alone.'],
                ['term' => 'Wicking', 'def' => 'Capillary upward rise of water inside porous drywall gypsum and insulation above standing flood water lines.'],
            ],
        ];
    }

    public static function globalFaqs(): array
    {
        return array (
  0 => 
  array (
    'cat' => 'Water',
    'q' => 'How fast does RescuePro® respond to an active water emergency?',
    'a' => 'Our 24/7 dispatch desk triggers a callback from the nearest territory crew chief within 15 minutes and mobilizes emergency trucks on site within 1–4 hours nationwide.',
  ),
  1 => 
  array (
    'cat' => 'Water',
    'q' => 'What is the difference between Category 1, Category 2, and Category 3 water?',
    'a' => 'Category 1 is clean sanitary water (broken supply pipe); Category 2 contains chemical or mild soap contaminants (washing machine overflow); Category 3 is grossly unsanitary blackwater (sewage backup or rising floodwater) requiring complete porous tear-out and sanitization.',
  ),
  2 => 
  array (
    'cat' => 'Water',
    'q' => 'How long do noisy air movers and dehumidifiers need to stay in my home?',
    'a' => 'Average structural drying takes 3 to 5 days. Removing equipment early based solely on touch leaves core framing wet; we extract equipment once daily moisture gauges hit dry-standard baseline.',
  ),
  3 => 
  array (
    'cat' => 'Water',
    'q' => 'Should I turn off my electrical breaker before RescuePro® arrives?',
    'a' => 'Never enter standing water if electrical outlets, power strips, or basement panels are submerged or sparking—call utility emergency services or isolate main power only from a dry floor area.',
  ),
  4 => 
  array (
    'cat' => 'Mold',
    'q' => 'Does homeowner insurance cover mold testing and remediation?',
    'a' => 'When mold develops directly from a sudden covered water loss (such as a documented pipe burst), remediation is frequently covered up to policy mold sub-limits. Long-term gradual leaks or foundation humidity are typically excluded.',
  ),
  5 => 
  array (
    'cat' => 'Mold',
    'q' => 'Can I stay inside my house while mold remediation takes place?',
    'a' => 'Smaller localized bathrooms contained under -5 Pa negative air barriers often allow safe occupancy elsewhere in the residence, whereas large basement/HVAC projects or sensitive respiratory occupants warrant temporary relocation.',
  ),
  6 => 
  array (
    'cat' => 'Mold',
    'q' => 'Why shouldn’t I spray household bleach on black mold?',
    'a' => 'Chlorine bleach evaporates before reaching fungal hyphae embedded inside porous drywall and timber, leaving water moisture behind while masking surface staining temporarily.',
  ),
  7 => 
  array (
    'cat' => 'Mold',
    'q' => 'Do you inspect attics and crawlspaces where we smell mustiness but see no spots?',
    'a' => 'Yes. Technicians utilize thermal moisture imaging and high-output flashlights inside attics, knee walls, and subfloor crawlspaces to pinpoint hidden condensation zones.',
  ),
  8 => 
  array (
    'cat' => 'Fire',
    'q' => 'What should we do first while waiting for the Fire Restoration truck?',
    'a' => 'Remain outside until Fire Command certifies structural safety. Avoid running home HVAC blowers, don’t wipe soot walls with soap, and change furnace filters only after speaking with the crew chief.',
  ),
  9 => 
  array (
    'cat' => 'Fire',
    'q' => 'How does RescuePro® remove stubborn smoke smell permanently?',
    'a' => 'We apply the 4-stage S700 method: tear-out of burned rubble, dry/wet soot neutralizing wash, UV-A Hydroxyl radical air oxidation, and shellac vapor-barrier sealing of hidden timber framing.',
  ),
  10 => 
  array (
    'cat' => 'Fire',
    'q' => 'Can smoke-damaged photos, dishes, and electronics be cleaned?',
    'a' => 'Yes. Our barcoded pack-out division washes dishes and hardware inside ultrasonic cavitation baths, freeze-dries wet paper records, and restores clean textiles via Esporta systems.',
  ),
  11 => 
  array (
    'cat' => 'Fire',
    'q' => 'Does RescuePro® handle board-up and roof tarping right after firefighters leave?',
    'a' => 'Yes—available 24/7. Crews arrive with pre-cut CDX plywood, compression braces, and heavy wind-rated tarps to weather-tight your structure immediately.',
  ),
  12 => 
  array (
    'cat' => 'Storm',
    'q' => 'Does RescuePro® handle downed trees and tornado or hail storm cleanup?',
    'a' => 'Our storm crews safely clear interior debris, tarp damaged roofs, pump basement groundwater, and mobilize commercial drying trailers across major disaster corridors.',
  ),
  13 => 
  array (
    'cat' => 'Storm',
    'q' => 'What happens if the city electrical grid is down after a hurricane?',
    'a' => 'Large-loss Storm CAT fleets carry mobile diesel trailer generators (45–350 kW) and trailer-mounted 5000 CFM desiccant units able to operate completely off-grid.',
  ),
  14 => 
  array (
    'cat' => 'Storm',
    'q' => 'Will flood insurance pay separately from standard homeowner insurance?',
    'a' => 'Yes. Rising outdoor floodwater/storm surge generally requires NFIP or private Flood Insurance, whereas wind-driven rain through hail-damaged shingles falls under standard property perils.',
  ),
  15 => 
  array (
    'cat' => 'Storm',
    'q' => 'How quickly should flooded carpets be addressed after a heavy storm?',
    'a' => 'Within 24 hours. Beyond 48 hours of flood exposure, backing adhesives delaminate and secondary fungal growth triggers mandatory carpet replacement.',
  ),
  16 => 
  array (
    'cat' => 'Commercial',
    'q' => 'What is a Commercial Emergency Ready Plan (ERP) and how much does it cost?',
    'a' => 'An ERP is a complimentary digital readiness profile mapping every water main valve, sprinkler riser, gas meter, electrical breaker, and emergency contact for zero cost.',
  ),
  17 => 
  array (
    'cat' => 'Commercial',
    'q' => 'Can you work nights or weekends so our hospital, hotel, or office remains open?',
    'a' => 'Yes. Commercial crews install rigid quiet barrier walls, operate under negative HEPA pressure, and schedule noisy extraction or reconstruction around off-peak operating hours.',
  ),
  18 => 
  array (
    'cat' => 'Commercial',
    'q' => 'Can one National Account agreement cover all 50+ retail locations we manage?',
    'a' => 'Absolutely. Regional multi-site portfolios receive unified Xactimate pricing schedules, centralized SLA monitoring inside the Customer Portal, and dedicated Large-Loss coordinators.',
  ),
  19 => 
  array (
    'cat' => 'Commercial',
    'q' => 'What certifications do healthcare restoration crews hold?',
    'a' => 'Technicians servicing clinical wings hold ASHE ICRA Class III/IV Infection Control certifications, OSHA 30 badges, and follow ASHRAE containment standards.',
  ),
  20 => 
  array (
    'cat' => 'Insurance',
    'q' => 'Does RescuePro® work with all major insurance carriers?',
    'a' => 'Yes. We partner as a Preferred Vendor for leading national property & casualty carriers while serving every policyholder regardless of insurer using Xactimate® pricing.',
  ),
  21 => 
  array (
    'cat' => 'Insurance',
    'q' => 'What is Xactimate® and why do insurance adjusters insist on it?',
    'a' => 'Xactimate® is the insurance industry’s standard zip-code-calibrated claims estimation platform ensuring material, equipment runtime, and labor rates remain auditable and transparent.',
  ),
  22 => 
  array (
    'cat' => 'Insurance',
    'q' => 'Will requesting a RescuePro® inspection automatically open an insurance claim?',
    'a' => 'No. Requesting an emergency assessment or mitigation estimate never notifies your insurance company automatically; you remain in complete control of filing decisions.',
  ),
  23 => 
  array (
    'cat' => 'Insurance',
    'q' => 'Where can insurance agents register for RescuePro® Continuing Education (CE) credits?',
    'a' => 'Agents, brokers, and claims adjusters can reserve free state-approved 1–3 credit CE seminars directly on our Insurance Professionals page (/insurance).',
  ),
  24 => 
  array (
    'cat' => 'Construction',
    'q' => 'Can the same RescuePro® office both dry my house and rebuild drywall & flooring?',
    'a' => 'Yes. Licensed reconstruction divisions manage rough framing, drywall, millwork, roofing, custom kitchen cabinetry, and flooring so there are zero vendor gaps.',
  ),
  25 => 
  array (
    'cat' => 'Construction',
    'q' => 'What warranty covers finished construction repairs?',
    'a' => 'Completed mitigation and construction build-back scopes carry a documented 12-month workmanship limited warranty tracked inside your Customer Portal.',
  ),
  26 => 
  array (
    'cat' => 'Construction',
    'q' => 'Do you handle city building permits and licensed electrical/plumbing subcontractors?',
    'a' => 'Yes. Project managers secure all municipal trade permits, schedule rough-in inspections, and coordinate licensed master electricians and plumbers.',
  ),
  27 => 
  array (
    'cat' => 'Construction',
    'q' => 'How soon after flood tear-out can reconstruction start?',
    'a' => 'Immediately after daily psychrometric gauges verify structural wood and concrete assemblies meet dry-standard baseline—typically Day 4 or Day 5.',
  ),
  28 => 
  array (
    'cat' => 'General & Franchise',
    'q' => 'Are RescuePro® offices locally owned or corporate call centers?',
    'a' => 'Every RescuePro® territory is independently owned and operated by local business leaders backed by National Training Headquarters in Gallatin, Tennessee.',
  ),
  29 => 
  array (
    'cat' => 'General & Franchise',
    'q' => 'How do I check past and active tickets or drying logs online?',
    'a' => 'Log in to the Customer Restoration Portal (/portal) using the email on your dispatch request to track live 6-stage progress, moisture logs, and claim paperwork.',
  ),
  30 => 
  array (
    'cat' => 'General & Franchise',
    'q' => 'Do you charge extra for dispatch after midnight or on holidays?',
    'a' => 'Dispatch consultation is clear upfront; standard Xactimate after-hours mobilization codes only apply for physical emergency crew deployment outside standard business windows and are fully reimbursable on covered claims.',
  ),
  31 => 
  array (
    'cat' => 'General & Franchise',
    'q' => 'What does it take to open a new RescuePro® franchise territory?',
    'a' => 'Prospective franchise owners complete corporate screening via our Franchise Ownership desk (/franchise) with access to territory availability analysis, fleet financing, and National Training Center bootcamps.',
  ),
);
    }

    public static function jobs(): array
    {
        return [
            ['id' => 1, 'track' => 'franchise', 'title' => 'Water & Fire Restoration Technician (IICRC)', 'location' => 'Gallatin & Nashville, TN', 'type' => 'Full-Time • 24/7 On-Call Bonus', 'pay' => '$24 – $34 / hr + Overtime', 'summary' => 'Operate industrial water extraction pumps, set LGR dehumidifiers, log daily moisture readings, and support homeowners during emergency mitigation. Paid training & IICRC certification included.', 'desc' => 'Operate industrial water extraction pumps, set LGR dehumidifiers, log daily moisture readings, and support homeowners during emergency mitigation. Paid training & IICRC certification included.'],
            ['id' => 2, 'track' => 'franchise', 'title' => 'Restoration Crew Chief / Production Manager', 'location' => 'Dallas Metro, TX', 'type' => 'Full-Time', 'pay' => '$62,000 – $82,000 / yr', 'summary' => 'Lead field mitigation teams on residential and commercial water, fire, and mold projects. Manage daily customer communication and Xactimate field scoping.', 'desc' => 'Lead field mitigation teams on residential and commercial water, fire, and mold projects. Manage daily customer communication and Xactimate field scoping.'],
            ['id' => 3, 'track' => 'franchise', 'title' => 'Commercial Marketing & ERP Representative', 'location' => 'Atlanta, GA', 'type' => 'Full-Time', 'pay' => '$65,000 Base + Commission', 'summary' => 'Build relationships with hospital facility directors, hotel groups, and property managers; perform free Emergency Ready Plan (ERP) building walkthroughs.', 'desc' => 'Build relationships with hospital facility directors, hotel groups, and property managers; perform free Emergency Ready Plan (ERP) building walkthroughs.'],
            ['id' => 4, 'track' => 'franchise', 'title' => 'Reconstruction Project Manager', 'location' => 'Miami, FL', 'type' => 'Full-Time', 'pay' => '$78,000 – $105,000 / yr', 'summary' => 'Oversee general contracting rebuild schedules, permitting, subcontractors, and adjuster supplements for large-loss storm and fire rebuilds.', 'desc' => 'Oversee general contracting rebuild schedules, permitting, subcontractors, and adjuster supplements for large-loss storm and fire rebuilds.'],
            ['id' => 5, 'track' => 'corporate', 'title' => 'Senior Enterprise Web & Dispatch Platform Engineer', 'location' => 'RescuePro Corporate HQ — Gallatin, TN', 'type' => 'Full-Time (Hybrid)', 'pay' => '$115,000 – $140,000 / yr', 'summary' => 'Develop national emergency call routing APIs, insurance FNOL integrations, and field moisture-logging tools supporting 2,410+ franchises.', 'desc' => 'Develop national emergency call routing APIs, insurance FNOL integrations, and field moisture-logging tools supporting 2,410+ franchises.'],
            ['id' => 6, 'track' => 'corporate', 'title' => 'National Call Center Emergency Specialist (24/7)', 'location' => 'RescuePro Corporate HQ — Gallatin, TN', 'type' => 'Full-Time', 'pay' => '$22 – $27 / hr', 'summary' => 'Deliver calm, empathetic emergency intake triage for distressed homeowners and commercial accounts, routing live dispatches to local franchises.', 'desc' => 'Deliver calm, empathetic emergency intake triage for distressed homeowners and commercial accounts, routing live dispatches to local franchises.'],
            ['id' => 7, 'track' => 'corporate', 'title' => 'National Training Instructor — RescuePro University', 'location' => 'RescuePro Corporate HQ — Gallatin, TN', 'type' => 'Full-Time', 'pay' => '$75,000 – $92,000 / yr', 'summary' => 'Teach incoming franchise owners and technicians hands-on psychrometrics, flood house drying, and fire cleanup inside our mock disaster facility.', 'desc' => 'Teach incoming franchise owners and technicians hands-on psychrometrics, flood house drying, and fire cleanup inside our mock disaster facility.'],
            ['id' => 8, 'track' => 'corporate', 'title' => 'National Accounts Carrier Relations Coordinator', 'location' => 'RescuePro Corporate HQ — Gallatin, TN', 'type' => 'Full-Time', 'pay' => '$68,000 – $84,000 / yr', 'summary' => 'Maintain Preferred Vendor compliance metrics and coordinate Continuing Education (CE) seminars for regional insurance carriers.', 'desc' => 'Maintain Preferred Vendor compliance metrics and coordinate Continuing Education (CE) seminars for regional insurance carriers.'],
        ];
    }

    public static function ceCourses(): array
    {
        return [
            ['code' => 'CE-101', 'credits' => '3.0 CE Hours', 'title' => 'Understanding the Mold Remediation Process', 'format' => 'Live Interactive Webinar / On-Site', 'desc' => 'Covers IICRC S520 containment protocols, moisture mapping, spore filtration, and post-remediation clearance guidelines.'],
            ['code' => 'CE-204', 'credits' => '2.0 CE Hours', 'title' => 'Fire & Smoke Restoration Mitigation Standards', 'format' => 'In-Person Seminar / Virtual', 'desc' => 'Differentiates protein, synthetic, and natural wood soot residues, HVAC duct decontamination, and thermal fogging vs ozone.'],
            ['code' => 'CE-305', 'credits' => '2.0 CE Hours', 'title' => 'Mitigating Water Damage: Psychrometrics & Documentation', 'format' => 'Live Workshop', 'desc' => 'Equips claims adjusters to evaluate equipment ratios, daily moisture logs, and justifiable tear-out vs drying in place.'],
            ['code' => 'CE-401', 'credits' => '3.0 Ethics Hours', 'title' => 'Ethics in Catastrophe Loss Adjusting & Restoration', 'format' => 'State-Approved Ethics Credit', 'desc' => 'Case studies on secondary damage prevention, fair vendor assignments, and transparent policyholder communication.'],
        ];
    }

    public static function industries(): array
    {
        return [
            ['icon' => 'ph-buildings', 'name' => 'Property Management', 'desc' => 'Multi-family apartments, HOAs, and commercial office towers requiring rapid tenant protection.'],
            ['icon' => 'ph-bed', 'name' => 'Hospitality & Hotels', 'desc' => 'Discreet overnight mitigation and odor removal so guest suites reopen rapidly without lost bookings.'],
            ['icon' => 'ph-first-aid-kit', 'name' => 'Healthcare Facilities', 'desc' => 'Hospital-grade containment, negative air ICRA protocols, and pathogen disinfection for clinics.'],
            ['icon' => 'ph-graduation-cap', 'name' => 'Education & Campuses', 'desc' => 'Break-period deep cleaning, pipe-freeze storm response, and gymnasium hardwood recovery.'],
            ['icon' => 'ph-storefront', 'name' => 'Retail & Foodservice', 'desc' => '24/7 grease-fire cleanup, biohazard sanitization, and storefront board-up repairs.'],
            ['icon' => 'ph-factory', 'name' => 'Industrial & Municipal', 'desc' => 'Large-loss warehouse desiccant drying, machinery soot cleaning, and government continuity.'],
        ];
    }

    public static function psychrometricLogs(): array
    {
        return [
            ['ticket_code' => 'RP-2026-1001', 'day' => 'Day 1 (Baseline)', 'date' => date('M j', strtotime('-1 day')), 'room' => 'Upstairs Hall & Guest Bath', 'temp_f' => 73, 'rh_pct' => 69, 'gpp' => 84, 'wood_mc' => 28.4, 'dry_goal' => 11.5, 'equipment' => '4 Air Movers + 2 LGR Dehumidifiers', 'tech' => 'M. Davis (WRT)', 'status' => 'Active Extraction'],
            ['ticket_code' => 'RP-2026-1001', 'day' => 'Day 2 (Monitoring)', 'date' => date('M j'), 'room' => 'Upstairs Hall & Guest Bath', 'temp_f' => 77, 'rh_pct' => 41, 'gpp' => 54, 'wood_mc' => 19.2, 'dry_goal' => 11.5, 'equipment' => '4 Air Movers + 2 LGR + Wall Cavity Inj.', 'tech' => 'M. Davis (WRT)', 'status' => 'On-Site Drying'],
            ['ticket_code' => 'RP-2026-1001', 'day' => 'Day 2 (Target Room)', 'date' => date('M j'), 'room' => 'Master Walk-In Closet', 'temp_f' => 76, 'rh_pct' => 38, 'gpp' => 49, 'wood_mc' => 14.1, 'dry_goal' => 11.5, 'equipment' => '1 Air Mover + Desiccant Feed', 'tech' => 'M. Davis (WRT)', 'status' => 'Trending Dry'],
            ['ticket_code' => 'RP-2026-1002', 'day' => 'Day 1 (Inspect)', 'date' => date('M j'), 'room' => 'Basement East Wall', 'temp_f' => 68, 'rh_pct' => 64, 'gpp' => 65, 'wood_mc' => 21.8, 'dry_goal' => 12.0, 'equipment' => 'HEPA 500 Scrubber (-5 Pa)', 'tech' => 'R. Ortiz (AMRT)', 'status' => 'Containment Sealed'],
            ['ticket_code' => 'RP-2026-1003', 'day' => 'Day 1 (Intake)', 'date' => date('M j'), 'room' => '4th Floor East Suites (401–408)', 'temp_f' => 71, 'rh_pct' => 76, 'gpp' => 87, 'wood_mc' => 31.0, 'dry_goal' => 11.0, 'equipment' => 'Trailer Desiccant + 16 Air Movers', 'tech' => 'Large Loss CAT #4', 'status' => 'Queued CAT'],
            ['ticket_code' => 'RP-2026-1004', 'day' => 'Day 4 (Final Sign-Off)', 'date' => date('M j', strtotime('-5 days')), 'room' => 'Kitchen Cabinetry & Return', 'temp_f' => 72, 'rh_pct' => 36, 'gpp' => 41, 'wood_mc' => 9.8, 'dry_goal' => 10.5, 'equipment' => 'Equipment Picked Up — Cleared', 'tech' => 'J. Vance (FSRT)', 'status' => 'Dry Standard Met'],
        ];
    }

    public static function fleetInventory(): array
    {
        return [
            ['unit_id' => 'RP-LGR-402', 'category' => 'LGR Dehumidifier', 'model' => 'Phoenix DryMAX XL (125 PPD)', 'territory' => 'Gallatin / Nashville North', 'assigned_ticket' => 'RP-2026-1001', 'utilization_pct' => 92, 'status' => 'Deployed On-Site', 'last_calibrated' => 'Jan 2026'],
            ['unit_id' => 'RP-HEPA-118', 'category' => 'HEPA Air Scrubber', 'model' => 'Dri-Eaz DefendAir HEPA 500', 'territory' => 'Downtown Nashville', 'assigned_ticket' => 'RP-2026-1002', 'utilization_pct' => 88, 'status' => 'Deployed On-Site', 'last_calibrated' => 'Feb 2026'],
            ['unit_id' => 'RP-CAT-5000D', 'category' => 'Mobile Desiccant Rig', 'model' => 'CDI 5000 CFM Diesel Trailer', 'territory' => 'Central Dallas CAT Hub', 'assigned_ticket' => 'RP-2026-1003', 'utilization_pct' => 76, 'status' => 'Staged for CAT', 'last_calibrated' => 'Feb 2026'],
            ['unit_id' => 'RP-FLIR-09', 'category' => 'Thermal Diagnostics', 'model' => 'FLIR E8-XT + Delmhorst Kit', 'territory' => 'Gallatin / Nashville North', 'assigned_ticket' => 'RP-2026-1001', 'utilization_pct' => 95, 'status' => 'Field Active', 'last_calibrated' => 'Feb 2026'],
            ['unit_id' => 'RP-VAN-77', 'category' => 'Truck-Mount Extractor', 'model' => 'Sapphire Scientific 570SS Van', 'territory' => 'Tampa Bay Hub', 'assigned_ticket' => 'Standby Dispatch', 'utilization_pct' => 64, 'status' => 'Ready 24/7', 'last_calibrated' => 'Jan 2026'],
            ['unit_id' => 'RP-HYDX-22', 'category' => 'Odor Neutralizer', 'model' => 'Odorox Boss XL3 Hydroxyl', 'territory' => 'Atlanta Midtown', 'assigned_ticket' => 'Standby Vault', 'utilization_pct' => 58, 'status' => 'Ready 24/7', 'last_calibrated' => 'Jan 2026'],
        ];
    }

    public static function insuranceClaims(): array
    {
        return [
            ['claim_number' => 'CLM-SF-882410', 'ticket_code' => 'RP-2026-1001', 'carrier' => 'State Farm Property', 'adjuster' => 'K. Reynolds', 'loss_type' => 'Water — Supply Line', 'xactimate_status' => 'ESX Scope Synced ($6,420)', 'audit_score' => '100%', 'status' => 'Pre-Approved'],
            ['claim_number' => 'CLM-ALL-390211', 'ticket_code' => 'RP-2026-1002', 'carrier' => 'Allstate Indemnity', 'adjuster' => 'D. Brooks', 'loss_type' => 'Mold — Containment', 'xactimate_status' => 'IEP Protocol Pending ($4,180)', 'audit_score' => '98%', 'status' => 'Under Desk Review'],
            ['claim_number' => 'CLM-CHB-904512', 'ticket_code' => 'RP-2026-1003', 'carrier' => 'Chubb Commercial', 'adjuster' => 'M. Alverez', 'loss_type' => 'Commercial Sprinkler', 'xactimate_status' => 'Large-Loss T&M Draft ($48,900)', 'audit_score' => '99%', 'status' => 'Priority Mobilized'],
            ['claim_number' => 'CLM-TRA-771004', 'ticket_code' => 'RP-2026-1004', 'carrier' => 'Travelers Personal', 'adjuster' => 'S. Bennett', 'loss_type' => 'Fire & Smoke Odor', 'xactimate_status' => 'Final Invoice Paid ($9,850)', 'audit_score' => '100%', 'status' => 'Closed — Paid'],
        ];
    }
}
