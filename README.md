# Juwelier Lauwers - Laravel Project

Een dynamische website voor een juwelierwinkel gebouwd met Laravel 11, inclusief admin panel voor het beheren van producten, nieuws, FAQ, gebruikers en contactberichten.

**Student:** Quinten Lauwers  
**Vak:** Backend Web Development  
**Academiejaar:** 2024-2025  
**Instelling:** Erasmushogeschool Brussel

---

## 📋 Inhoudsopgave

- [Features](#features)
- [Vereisten](#vereisten)
- [Installatie](#installatie)
- [Eerste Gebruik](#eerste-gebruik)
- [Technologieën](#technologieën)
- [Project Structuur](#project-structuur)
- [Belangrijke URLs](#belangrijke-urls)
- [Bronvermeldingen](#bronvermeldingen)
- [Troubleshooting](#troubleshooting)

---

## ✨ Features

### Verplichte Features (Voldaan)
- ✅ **Login systeem** met admin/gebruiker rollen
- ✅ **Profielpagina's** (publiek zichtbaar, bewerkbaar)
- ✅ **Nieuws systeem** (CRUD voor admins)
- ✅ **FAQ** gegroepeerd per categorie
- ✅ **Contact formulier** met email notificatie

### Extra Features
- 💍 **Juwelen catalogus** met 5 categorieën en filter functionaliteit
- 💬 **Comments** op nieuwsberichten
- 🎛️ **Uitgebreid admin panel** met statistieken

---

## 📦 Vereisten

Zorg dat je het volgende geïnstalleerd hebt:

- **PHP 8.2+** → `php --version`
- **Composer** → `composer --version`
- **Node.js 20.19+** → `node --version`
- **NPM** → `npm --version`

**Optioneel:** [Laravel Herd](https://herd.laravel.com/) voor automatische PHP/MySQL setup

---

## 🚀 Installatie

### 1. Clone Repository
```bash
git clone https://github.com/jouw-username/opdracht-laravel-juwelier.git
cd opdracht-laravel-juwelier
```

### 2. Installeer Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
# Kopieer .env.example
cp .env.example .env

# Genereer app key
php artisan key:generate
```

### 4. Database Aanmaken

**Windows (PowerShell):**
```powershell
New-Item database\database.sqlite -ItemType File
```

**Linux/Mac:**
```bash
touch database/database.sqlite
```

### 5. Database Migreren & Seeden
```bash
php artisan migrate:fresh --seed
```

Dit maakt aan:
- 1 admin (admin@ehb.be / Password!321)
- 3 test gebruikers
- 5 product categorieën
- 7 producten
- 3 nieuwsberichten
- 6 FAQ vragen

### 6. Storage Link
```bash
php artisan storage:link
```

### 7. Start Applicatie

Open **twee terminals**:

**Terminal 1 - Frontend:**
```bash
npm run dev
```

**Terminal 2 - Backend:**

**Met Herd:**
- Ga naar: `http://opdracht-backend-web-laravel-juwelier.test`

**Zonder Herd:**
```bash
php artisan serve
```
- Ga naar: `http://localhost:8000`

---

## 🎯 Eerste Gebruik

### Admin Login
- **Email:** `admin@ehb.be`
- **Password:** `Password!321`

### Test Gebruikers
- `jan@example.com` / `password`
- `marie@example.com` / `password`
- `pieter@example.com` / `password`

### Snelstart
1. Login als admin → Ga naar `/admin/dashboard`
2. Beheer nieuws, producten, FAQ of gebruikers
3. Logout en test als bezoeker

---

## 🛠️ Technologieën

### Backend
- **Laravel 11** - PHP framework (MVC, Eloquent ORM, Blade)
- **PHP 8.2+** - Server-side language
- **SQLite** - Database (geen aparte server nodig)

### Frontend
- **Blade** - Laravel templating engine
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript
- **Vite** - Frontend build tool

### Auth & Tools
- **Laravel Breeze** - Authenticatie starter kit
- **Composer** - PHP dependency manager
- **NPM** - JavaScript dependency manager

---

## 📁 Project Structuur
```
opdracht-laravel-juwelier/
├── app/
│   ├── Http/Controllers/      # Controllers (Admin/ en publiek)
│   ├── Models/                # Eloquent models
│   └── Middleware/IsAdmin.php # Custom middleware
├── database/
│   ├── migrations/            # Database schema
│   ├── seeders/               # Test data
│   └── database.sqlite        # SQLite database
├── resources/
│   ├── views/
│   │   ├── layouts/           # app.blade.php & admin.blade.php
│   │   ├── admin/             # Admin panel views
│   │   └── ...                # Publieke views
│   ├── css/app.css            # Tailwind
│   └── js/app.js              # Alpine.js
├── routes/web.php             # Application routes
└── .env                       # Environment config
```

---

## 🔗 Belangrijke URLs

### Publiek
- Home: `/`
- Juwelen: `/juwelen`
- Nieuws: `/nieuws`
- FAQ: `/faq`
- Contact: `/contact`

### Auth
- Login: `/login`
- Registreren: `/register`

### Admin (alleen voor admins)
- Dashboard: `/admin/dashboard`
- Nieuws: `/admin/news`
- Producten: `/admin/jewelry`
- FAQ: `/admin/faq`
- Gebruikers: `/admin/users`
- Contactberichten: `/admin/contact`

---

## 📚 Bronvermeldingen

### Officiële Documentatie
1. **Laravel Documentation** - https://laravel.com/docs/11.x
    - *Gebruikt voor:* Eloquent relationships, migrations, routing, middleware, authentication

2. **Laravel Breeze** - https://laravel.com/docs/11.x/starter-kits#breeze
    - *Gebruikt voor:* Complete authenticatie setup (login, register, password reset)

3. **Tailwind CSS** - https://tailwindcss.com/docs
    - *Gebruikt voor:* Styling, responsive design, utility classes

4. **Eloquent Relationships** - https://laravel.com/docs/11.x/eloquent-relationships
    - *Gebruikt voor:* One-to-Many en Many-to-Many database relaties

5. **Laravel File Storage** - https://laravel.com/docs/11.x/filesystem
    - *Gebruikt voor:* Upload en opslag van afbeeldingen (profielfoto's, productfoto's)

### Community Resources
6. **Stack Overflow** - https://stackoverflow.com/questions/tagged/laravel
    - *Gebruikt voor:* Troubleshooting, debugging specifieke errors

7. **Laracasts Forums** - https://laracasts.com/discuss
    - *Gebruikt voor:* Laravel best practices en code voorbeelden

### AI Assistentie
8. **Claude AI (Anthropic)**
    - *Gebruikt voor:* Code structuur advies, debugging hulp, uitleg van Laravel concepten

### Design
9. **Tailwind UI** - https://tailwindui.com/components
    - *Gebruikt voor:* Layout inspiratie (geen letterlijke code overgenomen)

### Tools
10. **GitHub** - https://github.com
    - *Gebruikt voor:* Version control en code hosting

---

## 🐛 Troubleshooting

### Styling laadt niet
```bash
npm run dev  # Laat dit draaien tijdens development
```

### Views niet gevonden
```bash
php artisan view:clear
php artisan config:clear
```

### Database errors
```bash
# Hermaak database
rm database/database.sqlite
New-Item database/database.sqlite -ItemType File  # Windows
# of: touch database/database.sqlite              # Linux/Mac
php artisan migrate:fresh --seed
```

### Routes niet gevonden
```bash
php artisan route:clear
php artisan route:list  # Check of routes bestaan
```

### File uploads werken niet
```bash
php artisan storage:link
```

### Admin login werkt niet
```bash
php artisan migrate:fresh --seed
# Gebruik: admin@ehb.be / Password!321
```

---

## 🔐 Beveiliging

- ✅ CSRF protection op alle forms
- ✅ XSS protection via Blade escaping
- ✅ SQL injection bescherming via Eloquent
- ✅ Password hashing (Bcrypt)
- ✅ Custom middleware voor admin routes

---

## 🎓 Technische Vereisten (Voldaan)

- ✅ Twee layouts (app & admin)
- ✅ CSRF & XSS protection
- ✅ Client-side validation
- ✅ Alle routes via controllers met middleware
- ✅ Resource controllers voor CRUD
- ✅ Eloquent models met relaties
- ✅ Database seeders met testdata
- ✅ `php artisan migrate:fresh --seed` werkt met eigen .env

---

## 📞 Contact

**Quinten Lauwers**  
Backend Web Development - Erasmushogeschool Brussel

---

© 2025 Juwelier Lauwers - Laravel Project