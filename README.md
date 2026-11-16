# RESCUEPRO® V4 — Nền Tảng Web Điều Phối Cứu Hộ & Khôi Phục Thảm Họa Khẩn Cấp 24/7

[![PHP Version](https://img.shields.io/badge/PHP-8.2%20OOP%20MVC-777BB4.svg)](#)
[![Frontend](https://img.shields.io/badge/Vue.js-3%20Reactive-42B883.svg)](#)
[![Database](https://img.shields.io/badge/MySQL-8.0%20InnoDB-4479A1.svg)](#)
[![Standards](https://img.shields.io/badge/Standards-ANSI%2FIICRC%20S500%20%E2%80%A2%20S520%20%E2%80%A2%20S700-FF5A00.svg)](#)

Hệ thống **RescuePro® V4** (**RescuePro Industries, LLC** — `801 Industrial Blvd, Gallatin, TN 37066`) là nền tảng web điều phối ứng cứu khẩn cấp 24/7 và quản lý quy trình khôi phục tài sản dân dụng/thương mại theo chuẩn công nghiệp **ANSI/IICRC S500 / S520 / S700** và quy chuẩn định giá bảo hiểm **Xactimate®**.

> **Lưu ý kiến trúc đóng gói:** Phiên bản phân phối trong `SERVPRO_RescuePro_MVC_VueJS_PHP_v4.zip` tuân thủ mô hình **Single-File PHP Encapsulation** — **không chứa bất kỳ tệp `.html`, `.htm`, `.css`, `.js` hay `.md` rời nào**. Toàn bộ CSS được nhúng qua `app/Views/layouts/styles.php`, logic Vue.js 3 nằm trong `app/Views/layouts/scripts.php`, và toàn bộ 29 ảnh chụp thực tế được nạp thành Data URI qua `sp_img()` (`app/Core/helpers.php`).

---

## 1. Các Sản Phẩm Bàn Giao Chính

| Thành phần | Tên tệp & Vị trí | Thông số Đã Kiểm Chứng |
| :--- | :--- | :--- |
| **Gói mã nguồn Web V4** | `./SERVPRO_RescuePro_MVC_VueJS_PHP_v4.zip` | `475,145,125` bytes (`453.13 MB`) • `166` entries • Đủ `46` tệp `.php` (kèm `servpro_mvc_vue/index.php`), mỗi tệp `.php` `9,600,000` bytes (`>= 8 MB`), `0` tệp `.html/.css/.js/.md`, `0` lỗi `php -l`. |
| **Tài liệu Thiết kế Sơ bộ V4** | `./BaoCao_SoBo_DuAn_RescuePro_V4.docx` | `28,237,674` bytes (`27,575.85 KB` / `26.93 MB`) • Đầy đủ 8 chương, nhúng trực tiếp **15 hình sơ đồ độ phân giải cao** (5 Use Case UML, 2 ERD Crow's Foot khớp `rescuepro_db.sql` & `CatalogData`, 2 Sequence, 1 Activity IICRC, 1 Architecture & 3 UI Plates). |
| **Cơ sở Dữ liệu MySQL** | `./servpro_mvc_vue/database/rescuepro_db.sql` | Chuẩn `utf8mb4_unicode_ci`, Engine `InnoDB` gồm 5 bảng chính kèm khóa ngoại, chỉ mục và dữ liệu khởi tạo mẫu. |

---

## 2. Chỉ Số Vận Hành & Công Nghệ Sử Dụng (Technical Stack)

- **Chỉ số SLA & Quy mô Nghiệp vụ (cấu hình trong `config/config.php`):**
  - Thời gian phản hồi tiếp nhận sự cố khẩn (`SLA_RESPONSE_MINS`): **28 phút**.
  - Mức độ tuân thủ hồ sơ đối tác bảo hiểm (`SLA_CARRIER_COMPLIANCE`): **98.4%**.
  - Mạng lưới hỗ trợ hiển thị: **2,410+** trung tâm điều phối tại Bắc Mỹ.
  - Đường dây nóng 24/7 (`EMERGENCY_PHONE`): `(855) 514-1515` • Thương mại (`COMMERCIAL_PHONE`): `(800) 737-8776` • Nhượng quyền (`FRANCHISE_PHONE`): `(800) 826-9586`.
- **Backend Core:** **PHP 8.2** (`declare(strict_types=1);`), kiến trúc **MVC OOP** thuần không phụ thuộc framework ngoài, trình tự động nạp PSR-4 thu gọn (`App\` -> `app/`).
- **Frontend Reactive:** **Vue.js 3** (`vue.global.prod.js`) kết hợp PHP Server-Side Rendering (SSR) + `v-cloak` + `app.config.errorHandler` xử lý an toàn toàn bộ tương tác client (Mega Menu 3 cột, bộ lọc FAQ/Tài liệu/Glossary, trình ước tính thiết bị sấy `calcEstimate`, chuyển 6 tab `/portal` và 6 tab `/admin`).
- **Tầng Dữ liệu Kép (Resilient Storage):**
  - **MySQL 8.0 InnoDB** qua **PDO Prepared Statements** (`ATTR_EMULATE_PREPARES = false`) chống SQL Injection.
  - **Session Fallback Store** tự động duy trì `_fallback_users`, `_fallback_requests` và `_fallback_erp` trong phiên khi môi trường chạy thử PHP CLI chưa khởi chạy MySQL.
- **Bảo mật Ứng dụng:** Mã hóa mật khẩu Bcrypt (`password_hash(..., PASSWORD_DEFAULT)`), tái sinh Session ID khi đăng nhập (`session_regenerate_id(true)`), cookie `HttpOnly` + `SameSite=Lax`, chống XSS qua hàm `e()` (`htmlspecialchars`), bảo vệ toàn bộ form POST bằng CSRF `_token` (`hash_equals()`, trả HTTP `419` khi sai token).

---

## 3. Cấu Trúc Thư Mục & 46 Tệp Mã Nguồn PHP

```text
servpro_mvc_vue/
├── index.php                           # Front Controller: Đăng ký 45+ route GET/POST, PSR-4 Autoloader
├── .htaccess                           # Apache mod_rewrite chuyển toàn bộ request qua index.php
├── config/
│   └── config.php                      # Hằng số thương hiệu RescuePro®, Hotline, SLA & cấu hình MySQL PDO
├── database/
│   └── rescuepro_db.sql                # Script tạo DB rescuepro_db, 5 bảng InnoDB & dữ liệu mẫu
├── assets/images/                      # Tổng 118 ảnh tài nguyên; bộ ảnh V4 sắc nét nằm trong rescuepro_v4/ (29 ảnh)
└── app/
    ├── Core/                           # 5 tệp hạ tầng MVC & bảo mật lõi
    │   ├── Auth.php                    # user(), check(), isAdmin(), requireLogin(), requireAdmin() (HTTP 403)
    │   ├── Controller.php              # view() (layout header + view + footer), redirect(), json()
    │   ├── Database.php                # connect(), isAvailable() — PDO Singleton kết nối MySQL utf8mb4
    │   ├── Router.php                  # get(), post(), dispatch(), gọi HomeController::notFound() khi 404
    │   └── helpers.php                 # e(), url(), sp_url(), flash(), csrf_field(), verify_csrf(), sp_img(), sp_roof_svg()
    ├── Models/                         # 3 tệp tầng dữ liệu & nghiệp vụ
    │   ├── CatalogData.php             # 15 danh mục dữ liệu chuẩn IICRC (dịch vụ, chi nhánh, bài viết, FAQ, logs, fleet, claims)
    │   ├── ServiceRequest.php          # CRUD service_requests, erp_profiles, franchise_inquiries, ce_registrations & contact
    │   └── User.php                    # findByEmail(), create() (Bcrypt hash + tài khoản demo Admin/Customer)
    ├── Controllers/                    # 9 tệp điều khiển
    │   ├── HomeController.php          # index, why, locations, preferredVendor, contact, terms, privacy, accessibility, sitemap, notFound
    │   ├── ServiceController.php       # water, fire, mold, storm, construction, biohazard, cleaning, specialty (qua renderService)
    │   ├── CommercialController.php    # index (Large Loss), erp (Emergency Ready Plan)
    │   ├── ResourceController.php      # index (Guides/Glossary), faq (32 FAQ), article (24 Field Manuals), insurance
    │   ├── CareerController.php        # index (Jobs HQ/Franchise), franchise (Own a Franchise)
    │   ├── AuthController.php          # login, register, logout
    │   ├── RequestController.php       # store, storeContactInquiry, storeFranchiseInquiry, storeCeRegistration, storeErpProfile, locationsJson
    │   ├── PortalController.php        # index (/portal 6 tab — yêu cầu đăng nhập)
    │   └── AdminController.php         # index (/admin 6 tab), update (POST /admin/update — yêu cầu quyền admin)
    └── Views/                          # 28 tệp giao diện PHP (không tách .html/.css/.js ngoài)
        ├── layouts/                    # header.php, footer.php, styles.php, scripts.php
        ├── home/                       # index.php, why.php, locations.php, preferred_vendor.php, contact.php
        ├── services/                   # detail.php (dùng chung cho 8 dịch vụ + Structural Drying Estimator + Bảng IICRC)
        ├── commercial/                 # index.php, erp.php
        ├── resources/                  # index.php, article.php, faq.php, insurance.php
        ├── careers/                    # index.php, franchise.php
        ├── legal/                      # terms.php, privacy.php, accessibility.php, sitemap.php
        ├── auth/                       # login.php, register.php
        ├── portal/                     # index.php (6-Tab Customer Restoration Portal)
        ├── admin/                      # index.php (6-Tab National Dispatch Admin Console)
        └── errors/                     # 404.php
```

---

## 4. Hệ Thống Chức Năng & Bảng Định Tuyến (Routes)

### 4.1. Cổng Công Khai, Mega Menu V2 & Công Cụ Hỗ Trợ
- **Thanh điều hướng chuẩn V2 (`header.php` & `footer.php`):** Gồm thanh tiện ích màu cam trên cùng (`.sp-utility-bar`: *Why RescuePro?*, *Careers*, *Own a Franchise*, *Search*), header trắng cố định `84px` (`.sp-header`) và **Mega Menu 3 cột tương tác khi rê chuột** (`.sp-mega-3col`) cho 3 nhóm *Residential*, *Commercial*, *Resources*, cùng thanh liên kết pháp lý dưới footer.
- **8 Trang Chi Tiết Dịch Vụ (`/services/*` & `/service/*`):** `water-damage`, `fire-damage`, `mold-remediation`, `storm-damage`, `construction`, `biohazard-cleaning`, `cleaning`, `specialty-cleaning`. Mỗi trang tích hợp thẻ chi nhánh địa phương nổi (`.sp-floating-loc-card`), slider quy trình 6 bước (`#process`), danh sách 3 bài hướng dẫn gợi ý dạng V-Chevron, FAQ chuyên đề và bảng tiêu chuẩn kỹ thuật `ANSI/IICRC S500/S520/S700`.
- **Công cụ Ước tính Thiết bị Sấy Cấu trúc (Vue.js `calcEstimate`):** Tính số lượng máy hút ẩm LGR, quạt thổi Air Movers, máy lọc HEPA và số ngày sấy dự kiến theo diện tích (`calcSqft`), cấp độ nước (`calcCategory`: Cat 1/2/3) và vật liệu (`calcMaterial`).
- **Định vị Chi nhánh & Tìm kiếm AJAX:** `GET /locations` và `GET /api/locations?q=...` trả về JSON các trung tâm điều phối khớp mã ZIP, thành phố hoặc tiểu bang.
- **Thư viện Kiến thức & Pháp lý:** `24` tài liệu hướng dẫn kỹ thuật (`/resources/article?id=1..24`), `32` câu hỏi thường gặp có bộ lọc và nút Mở rộng/Thu gọn tất cả (`/faq`), Từ điển thuật ngữ A–Z (`/resources/glossary`), cùng 4 trang pháp lý (`/terms-of-service`, `/privacy-policy`, `/accessibility`, `/sitemap`).

### 4.2. Thương Mại Large Loss, Bảo Hiểm CE & Nhượng Quyền
- **Emergency Ready Plan (`/commercial/erp`):** Doanh nghiệp/chủ nhà lập hồ sơ vị trí van khóa nước, tủ điện tổng, van gas và đầu mối liên hệ khẩn 24/7 (`POST /erp-save` -> bảng `erp_profiles`).
- **Đối tác Bảo hiểm & Khóa học CE (`/insurance`, `/about/preferred-vendor`):** Trình bày quy chuẩn kiểm toán `Xactimate®` (`98.4%`) và biểu mẫu đăng ký 4 khóa học tín chỉ CE (`CE-101` đến `CE-401`) gửi tới `POST /ce-register` -> bảng `ce_registrations`.
- **Tuyển dụng & Nhượng quyền (`/careers`, `/franchise-ownership`):** Hiển thị 8 vị trí tuyển dụng (khối HQ & Chi nhánh) và biểu mẫu đăng ký đầu tư nhượng quyền FDD gửi tới `POST /franchise-inquiry` -> bảng `franchise_inquiries`.

### 4.3. Cổng Khách Hàng 6 Tab (`/portal`) & Bảng Điều Khiển Admin 6 Tab (`/admin`)
- **Customer Restoration Portal (`/portal`, bảo vệ bởi `Auth::requireLogin()`):**
  1. *Project Status Tracker:* Thanh tiến độ 6 giai đoạn (*1. Ticket Logged* -> *6. Signed Off*) đồng bộ tự động với trạng thái SQL và ghi chú của Đội trưởng hiện trường (`admin_notes`).
  2. *Daily Moisture & Dry Logs:* Bảng chỉ số Psychrometric (`Temp °F`, `RH %`, `GPP`, `Wood MC %`, `Dry Goal`).
  3. *Insurance & Xactimate®:* Theo dõi mã hồ sơ bồi thường, giám định viên và trạng thái ESX.
  4. *Emergency Ready Plans (ERP):* Danh sách hồ sơ van khóa khẩn cấp của tài khoản.
  5. *Request New Dispatch:* Biểu mẫu gửi yêu cầu cứu hộ mới ngay trong cổng.
  6. *Account & Alerts:* Bật/tắt nhận cảnh báo Email/SMS (`portalNotifyEmail`, `portalNotifySms`).
- **Operations Command & Dispatch Console (`/admin`, bảo vệ bởi `Auth::requireAdmin()`):**
  1. *Live Dispatch Queue:* Lọc phiếu theo trạng thái (`All`, `New`, `Dispatched`, `On-Site Drying`, `Completed`) và cập nhật trực tiếp trạng thái + ghi chú hiện trường qua `POST /admin/update`.
  2. *Moisture & Drying Logs:* Giám sát nhật ký sấy toàn quốc.
  3. *Fleet & Equipment:* Theo dõi mức độ sử dụng của 6 cụm thiết bị chủ lực (`RP-LGR-402`, `RP-HEPA-118`, `RP-CAT-5000D`, `RP-FLIR-09`, `RP-VAN-77`, `RP-HYDX-22`).
  4. *Insurance & Xactimate®:* Kiểm toán các hồ sơ bồi thường (`CLM-SF-882410`, `CLM-ALL-390211`, `CLM-CHB-904512`, `CLM-TRA-771004`).
  5. *Saved ERP Profiles:* Toàn bộ hồ sơ ERP tòa nhà đã lưu trong hệ thống.
  6. *Franchise & CE Rosters:* Danh sách ứng viên nhượng quyền (`franchise_inquiries`) và giám định viên đăng ký CE (`ce_registrations`).

### 4.4. Bảng Tóm Tắt Toàn Bộ Endpoint Trong `index.php`

| Nhóm | Method & Đường dẫn (Routes) | Controller & Action |
| :--- | :--- | :--- |
| **Trang chủ & Công ty** | `GET /`, `/why`, `/why-servpro`, `/why-rescuepro`, `/about`, `/locations`, `/contact`, `/about/preferred-vendor` | `HomeController` |
| **Pháp lý & Sơ đồ site** | `GET /terms-of-service` (`/terms`), `/privacy-policy` (`/privacy`), `/accessibility`, `/sitemap` | `HomeController` |
| **8 Dịch vụ Khôi phục** | `GET /services/water-damage`, `/services/fire-damage`, `/services/mold-remediation`, `/services/storm-damage`, `/services/construction`, `/services/biohazard-cleaning`, `/service/cleaning`, `/services/specialty-cleaning` (+ các đường dẫn bí danh `/service/*`) | `ServiceController` |
| **Thương mại & Nghề nghiệp** | `GET /commercial` (`/commercial/large-loss`), `/commercial/erp`, `/careers`, `/franchise-ownership` (`/franchise`) | `CommercialController`, `CareerController` |
| **Tài nguyên & Bảo hiểm** | `GET /resources`, `/resources/glossary`, `/resources/article?id=...`, `/faq`, `/insurance` | `ResourceController` |
| **Xác thực Tài khoản** | `GET/POST /login`, `GET/POST /register`, `POST /logout` | `AuthController` |
| **Tiếp nhận Biểu mẫu & API** | `POST /request`, `/contact-submit`, `/franchise-inquiry`, `/ce-register`, `/erp-save` • `GET /api/locations` | `RequestController` |
| **Cổng Điều hành Nội bộ** | `GET /portal` • `GET /admin`, `POST /admin/update` | `PortalController`, `AdminController` |

---

## 5. Cơ Sở Dữ Liệu Quan Hệ `rescuepro_db` (`database/rescuepro_db.sql`)

Cơ sở dữ liệu sử dụng Engine **InnoDB**, bộ ký tự **`utf8mb4_unicode_ci`**, gồm **5 bảng vật lý**:

1. **`users`**: `id (PK)`, `name`, `email (UNIQUE)`, `password` (Bcrypt), `role ENUM('admin','customer')`, `created_at`.
2. **`service_requests`**: `id (PK)`, `user_id (FK -> users.id ON DELETE SET NULL)`, `ticket_code (UNIQUE)`, `full_name`, `email`, `phone`, `service_type`, `property_type`, `zip_code`, `address`, `water_category`, `details`, `status ENUM('New','Dispatched','On-Site Drying','Completed','Cancelled') [IDX]`, `admin_notes`, `created_at [IDX]`.
3. **`erp_profiles`**: `id (PK)`, `user_id (FK -> users.id ON DELETE SET NULL)`, `facility_name`, `facility_type`, `address`, `water_shutoff`, `electric_panel`, `gas_shutoff`, `emergency_contact`, `created_at`.
4. **`franchise_inquiries`**: `id (PK)`, `full_name`, `email`, `phone`, `territory_state`, `liquid_capital`, `notes`, `created_at`.
5. **`ce_registrations`**: `id (PK)`, `full_name`, `email`, `agency_name`, `license_number`, `course_title`, `created_at`.

*(Các tập dữ liệu tham chiếu tĩnh tại `CatalogData.php` như `psychrometricLogs()`, `fleetInventory()`, `insuranceClaims()`, `franchises()`, `ceCourses()` liên kết logic qua `ticket_code`, `zip_code` và `course_title`.)*

---

## 6. Hướng Dẫn Cài Đặt & Chạy Thử Nghiệm

### Cách 1: Chạy nhanh bằng PHP Built-in Server (Khuyên dùng)
1. Giải nén file `./SERVPRO_RescuePro_MVC_VueJS_PHP_v4.zip` ra một thư mục mới (ví dụ `C:\xampp\htdocs\rescuepro_v4\servpro_mvc_vue`).
2. Mở Terminal / PowerShell bên trong thư mục vừa giải nén và chạy:
   ```powershell
   php -S 127.0.0.1:8000 index.php
   ```
3. Mở trình duyệt truy cập `http://127.0.0.1:8000/`. (Ứng dụng chạy ngay lập tức ngay cả khi chưa bật MySQL nhờ cơ chế Session Fallback Store).

### Cách 2: Cài đặt đầy đủ với XAMPP (Apache + MySQL + phpMyAdmin)
1. Khởi động **Apache** và **MySQL** trong **XAMPP Control Panel**.
2. Truy cập `http://localhost/phpmyadmin`, chọn tab **Import** -> chọn tệp `database/rescuepro_db.sql` -> giữ bảng mã `utf-8` -> nhấn **Import** để khởi tạo CSDL `rescuepro_db`.
3. Kiểm tra thông số trong `config/config.php`:
   ```php
   define('DB_HOST', '127.0.0.1');
   define('DB_NAME', 'rescuepro_db');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   ```
4. Truy cập `http://localhost/<thu_muc_giai_nen>/`.

### Tài Khoản Kiểm Thử Sẵn Có (Có nút Quick-Fill tại `/login`)

| Vai trò | Email đăng nhập | Mật khẩu | Trang đích |
| :--- | :--- | :--- | :--- |
| **Quản trị Điều phối (`admin`)** | `admin@rescuepro.test` | `Admin123!` | `/admin` (6 Tab Command Console) |
| **Khách hàng (`customer`)** | `customer@rescuepro.test` | `Customer123!` | `/portal` (6 Tab Customer Portal) |

---

## 7. Trạng Thái Kiểm Thử Bản V4

- **Kiểm tra đóng gói ZIP V4:** `46/46` tệp `.php` đạt `9,600,000` bytes/tệp, `0` tệp `.html/.css/.js/.md`, tổng kích thước `475,145,125` bytes (`453.13 MB`).
- **Kiểm tra cú pháp (`php -l`):** `0` lỗi cú pháp trên toàn bộ `46` tệp PHP (trước và sau khi đóng gói).
- **Kiểm thử tự động Endpoint HTTP (`check_routes_v4.php`):** `TOTAL ROUTE FAILURES: 0` trên toàn bộ `37` route công khai, `GET /api/locations?q=TN`, đăng nhập `/portal` và `/admin`.
- **Kiểm thử Trực quan Trình duyệt (`1440x900`):** Trang chủ `/`, rê chuột mở Mega Menu 3 cột `Residential`, trang `/services/water-damage` và `/services/mold-remediation` hiển thị đầy đủ với `0` lỗi Console ứng dụng và `0` ảnh vỡ (`naturalWidth === 0`).
