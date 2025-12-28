# Juwelier Lauwers - Laravel Project

Een dynamische website voor een juwelierwinkel gebouwd met Laravel 11, inclusief volledig admin panel voor het beheren van producten, nieuws, FAQ, gebruikers en contactberichten.

**Student:** Quinten Lauwers  
**Vak:** Backend Web Development  
**Academiejaar:** 2024-2025  
**Instelling:** Erasmushogeschool Brussel

---

## 📋 Inhoudsopgave

- [Features](#features)
- [Gebruikte Technologieën](#gebruikte-technologieën)
- [Vereisten](#vereisten)
- [Installatie Instructies](#installatie-instructies)
- [Eerste Gebruik](#eerste-gebruik)
- [Project Structuur](#project-structuur)
- [Database Schema](#database-schema)
- [Belangrijke URLs](#belangrijke-urls)
- [Bronvermeldingen](#bronvermeldingen)
- [Troubleshooting](#troubleshooting)
- [Licentie](#licentie)

---

## ✨ Features

### Minimum Vereisten (Voldaan)

#### 🔐 Login Systeem
- Volledige authenticatie met Laravel Breeze
- Gebruikers kunnen registreren en inloggen
- Wachtwoord reset functionaliteit
- "Remember me" functionaliteit
- Twee gebruikersrollen: Admin en Gebruiker
- Admins kunnen andere gebruikers tot admin promoveren
- Admins kunnen handmatig nieuwe gebruikers aanmaken

#### 👤 Profielpagina's
- Publieke profielpagina's voor alle gebruikers
- Zichtbaar voor iedereen (ook niet-ingelogde bezoekers)
- Bewerkbaar door de gebruiker zelf
- Bevat: Username, verjaardag, profielfoto, "over mij" tekst

#### 📰 Nieuws Systeem
- Admins kunnen nieuwsberichten toevoegen, wijzigen en verwijderen
- Elk nieuwsbericht bevat: titel, afbeelding, content, publicatiedatum
- Alle bezoekers kunnen nieuws bekijken
- Nieuws detail pagina met comments

#### ❓ FAQ Pagina
- FAQ vragen gegroepeerd per categorie
- Admins kunnen categorieën en Q&A beheren
- Publiek zichtbaar voor alle bezoekers

#### 📧 Contact Formulier
- Bezoekers kunnen contactformulier invullen
- Admin ontvangt email bij nieuw bericht
- Admin panel toont overzicht van alle berichten

### Extra Features (Voor hogere score)

#### 💍 Juwelen Catalogus
- Volledig product management systeem
- 5 categorieën: Ringen, Kettingen, Oorbellen, Armbanden, Horloges
- Product eigenschappen: naam, beschrijving, prijs, voorraad, foto, categorie
- Filter functionaliteit op categorie
- Product detail pagina's met gerelateerde producten

#### 💬 Comments Systeem
- Ingelogde gebruikers kunnen reageren op nieuwsberichten
- Comments worden getoond bij elk nieuwsbericht
- Toont gebruikersnaam en timestamp

#### 🎛️ Admin Panel
- Uitgebreid dashboard met statistieken
- Beheer van nieuws, producten, FAQ, gebruikers en contactberichten
- Aparte layout voor admin interface
- Beschermd door custom middleware

---

## 🛠️ Gebruikte Technologieën

### Backend

#### Laravel 11.x
- **Wat is het?** Modern PHP framework voor webapplicaties
- **Waarom gekozen?**
    - Verplicht voor de opdracht
    - Elegante syntax en uitgebreide documentatie
    - Ingebouwde authenticatie, routing, ORM (Eloquent)
    - MVC architectuur voor gestructureerde code

#### PHP 8.2+
- **Wat is het?** Server-side programmeertaal
- **Waarom gekozen?**
    - Vereist voor Laravel 11
    - Moderne features zoals typed properties en match expressions
    - Goede performance

#### SQLite
- **Wat is het?** Lichtgewicht SQL database in een enkel bestand
- **Waarom gekozen?**
    - Geen aparte database server nodig
    - Perfect voor development en kleinere projecten
    - Makkelijk mee te delen via Git
    - Voldoende voor de opdracht requirements

#### Eloquent ORM
- **Wat is het?** Object-Relational Mapping systeem van Laravel
- **Waarom gekozen?**
    - Maakt database queries intuïtief met PHP code
    - Automatische relatiebeheer (One-to-Many, Many-to-Many)
    - Bescherming tegen SQL injection

### Frontend

#### Blade Templates
- **Wat is het?** Laravel's templating engine
- **Waarom gekozen?**
    - Native Laravel integratie
    - Duidelijke syntax met @directives
    - Component-based development
    - XSS bescherming out-of-the-box

#### Tailwind CSS 3.x
- **Wat is het?** Utility-first CSS framework
- **Waarom gekozen?**
    - Snel prototypen zonder custom CSS te schrijven
    - Consistent design systeem
    - Komt standaard met Laravel Breeze
    - Responsive design gemakkelijk te implementeren

#### Alpine.js
- **Wat is het?** Lightweight JavaScript framework
- **Waarom gekozen?**
    - Komt mee met Laravel Breeze
    - Perfect voor kleine interacties (dropdowns, modals)
    - Minimale JavaScript nodig

#### Vite
- **Wat is het?** Modern frontend build tool
- **Waarom gekozen?**
    - Snelle hot module replacement tijdens development
    - Standaard in Laravel 11
    - Efficiënte production builds

### Development Tools

#### Laravel Breeze
- **Wat is het?** Starter kit voor Laravel authenticatie
- **Waarom gekozen?**
    - Implementeert complete authenticatie (login, register, password reset)
    - Blade + Tailwind combo
    - Lichtgewicht en aanpasbaar

#### Composer
- **Wat is het?** Dependency manager voor PHP
- **Gebruikt voor:** Laravel packages beheren

#### NPM
- **Wat is het?** Package manager voor JavaScript
- **Gebruikt voor:** Frontend dependencies (Tailwind, Vite) beheren

---

## 📦 Vereisten

Voordat je begint, zorg dat je het volgende hebt geïnstalleerd:

- **PHP 8.2 of hoger**
    - Check: `php --version`
    - Download: https://www.php.net/downloads.php

- **Composer**
    - Check: `composer --version`
    - Download: https://getcomposer.org/download/

- **Node.js 20.19+ of 22.12+**
    - Check: `node --version`
    - Download: https://nodejs.org/

- **NPM** (komt met Node.js)
    - Check: `npm --version`

### Optioneel
- **Laravel Herd** (aanbevolen voor Windows/Mac)
    - Download: https://herd.laravel.com/
    - Automatische PHP/MySQL setup

---

## 🚀 Installatie Instructies

### Stap 1: Repository Clonen
```bash
git clone https://github.com/jouw-username/opdracht-laravel-juwelier.git
cd opdracht-laravel-juwelier
```

### Stap 2: Dependencies Installeren
```bash
# PHP dependencies
composer install

# JavaScript dependencies
npm install
```

⏱️ Dit kan 2-5 minuten duren.

### Stap 3: Environment Configureren
```bash
# Kopieer .env.example naar .env
cp .env.example .env

# Genereer application key
php artisan key:generate
```

### Stap 4: Database Aanmaken

Het project gebruikt **SQLite**. Maak het database bestand aan:

#### Windows (PowerShell)
```powershell
New-Item database\database.sqlite -ItemType File
```

#### Linux/Mac
```bash
touch database/database.sqlite
```

### Stap 5: Database Configuratie

De `.env` is al geconfigureerd voor SQLite. Check of dit erin staat:
```env
DB_CONNECTION=sqlite
```

**Geen verdere database configuratie nodig!**

### Stap 6: Database Migreren en Seeden
```bash
php artisan migrate:fresh --seed
```

Dit creëert alle tabellen en vult ze met testdata:
- ✅ 1 admin gebruiker (admin@ehb.be)
- ✅ 3 test gebruikers
- ✅ 5 juwelen categorieën
- ✅ 7 voorbeeld producten
- ✅ 3 nieuwsberichten
- ✅ 2 FAQ categorieën met 6 vragen

### Stap 7: Storage Link Aanmaken
```bash
php artisan storage:link
```

Dit linkt de storage folder voor file uploads (profielfoto's, productfoto's, etc.)

### Stap 8: Applicatie Starten

Open **twee terminals**:

**Terminal 1 - Frontend (Vite):**
```bash
npm run dev
```

**Terminal 2 - Backend (Laravel):**

**Met Laravel Herd:**
- Herd draait automatisch, geen extra commando nodig
- Ga naar: `http://opdracht-backend-web-laravel-juwelier.test`

**Zonder Herd:**
```bash
php artisan serve
```
- Ga naar: `http://localhost:8000`

---

## 🎯 Eerste Gebruik

### Admin Login

Gebruik deze credentials om in te loggen als admin:

- **Email:** `admin@ehb.be`
- **Password:** `Password!321`

### Test Gebruikers

Voor testing zijn er 3 extra gebruikers:

1. **Email:** `jan@example.com` | **Password:** `password`
2. **Email:** `marie@example.com` | **Password:** `password`
3. **Email:** `pieter@example.com` | **Password:** `password`

### Eerste Stappen

1. **Login als admin** → Ga naar Admin Panel
2. **Bekijk Dashboard** → Zie statistieken
3. **Beheer Nieuws** → Voeg nieuwsbericht toe
4. **Beheer Producten** → Bekijk/wijzig producten
5. **Test als bezoeker** → Logout en bekijk publieke site

---

## 📁 Project Structuur
```
opdracht-laravel-juwelier/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Admin controllers
│   │   │   │   ├── AdminNewsController.php
│   │   │   │   ├── AdminFaqController.php
│   │   │   │   ├── AdminUserController.php
│   │   │   │   ├── AdminJewelryController.php
│   │   │   │   └── AdminContactController.php
│   │   │   ├── Auth/               # Breeze authenticatie controllers
│   │   │   ├── HomeController.php
│   │   │   ├── NewsController.php
│   │   │   ├── FaqController.php
│   │   │   ├── ContactController.php
│   │   │   ├── ProfileController.php
│   │   │   ├── JewelryController.php
│   │   │   └── CommentController.php
│   │   └── Middleware/
│   │       └── IsAdmin.php         # Custom admin middleware
│   └── Models/
│       ├── User.php
│       ├── NewsItem.php
│       ├── FaqCategory.php
│       ├── Faq.php
│       ├── JewelryCategory.php
│       ├── JewelryProduct.php
│       ├── Comment.php
│       └── ContactMessage.php
├── database/
│   ├── migrations/                  # Database schema
│   ├── seeders/                     # Test data
│   └── database.sqlite             # SQLite database file
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php       # Publieke layout
│   │   │   └── admin.blade.php     # Admin layout
│   │   ├── admin/                  # Admin views
│   │   ├── home.blade.php
│   │   ├── news/
│   │   ├── faq/
│   │   ├── jewelry/
│   │   ├── contact/
│   │   └── profile/
│   ├── css/
│   │   └── app.css                 # Tailwind CSS
│   └── js/
│       └── app.js                  # Alpine.js
├── routes/
│   └── web.php                     # Applicatie routes
├── storage/
│   └── app/
│       └── public/                 # File uploads
├── .env                            # Environment configuratie
├── composer.json                   # PHP dependencies
├── package.json                    # JavaScript dependencies
└── README.md                       # Dit bestand
```

---

## 🗄️ Database Schema

### Relaties

**One-to-Many:**
- User → NewsItems (één gebruiker schrijft meerdere nieuwsberichten)
- User → Comments (één gebruiker plaatst meerdere comments)
- NewsItem → Comments (één nieuwsbericht heeft meerdere comments)
- FaqCategory → Faqs (één categorie heeft meerdere vragen)
- JewelryCategory → JewelryProducts (één categorie heeft meerdere producten)

**Tabellen:**
- `users` - Gebruikers (met is_admin, profile fields)
- `news_items` - Nieuwsberichten
- `comments` - Reacties op nieuws
- `faq_categories` - FAQ categorieën
- `faqs` - FAQ vragen en antwoorden
- `jewelry_categories` - Product categorieën
- `jewelry_products` - Producten
- `contact_messages` - Contactformulier berichten

---

## 🔗 Belangrijke URLs

### Publieke Pagina's

- **Home:** `/`
- **Juwelen Catalogus:** `/juwelen`
- **Product Detail:** `/juwelen/{id}`
- **Nieuws Overzicht:** `/nieuws`
- **Nieuws Detail:** `/nieuws/{id}`
- **FAQ:** `/faq`
- **Contact:** `/contact`
- **Gebruikersprofiel:** `/profiel/{id}`

### Authenticatie

- **Login:** `/login`
- **Registreren:** `/register`
- **Wachtwoord Vergeten:** `/forgot-password`

### Admin Panel (Admin only)

- **Dashboard:** `/admin/dashboard`
- **Nieuws Beheren:** `/admin/news`
- **Producten Beheren:** `/admin/jewelry`
- **FAQ Beheren:** `/admin/faq`
- **Gebruikers Beheren:** `/admin/users`
- **Contact Berichten:** `/admin/contact`

---

## 📚 Bronvermeldingen

### Documentatie & Tutorials

1. **Laravel Official Documentation**
    - https://laravel.com/docs/11.x
    - Gebruikt voor: Eloquent relationships, migrations, routing, middleware

2. **Laravel Breeze Documentation**
    - https://laravel.com/docs/11.x/starter-kits#breeze
    - Gebruikt voor: Authenticatie setup

3. **Tailwind CSS Documentation**
    - https://tailwindcss.com/docs
    - Gebruikt voor: Styling, responsive design, utility classes

4. **Eloquent Relationships Guide**
    - https://laravel.com/docs/11.x/eloquent-relationships
    - Gebruikt voor: One-to-Many en Many-to-Many relaties

5. **Laravel File Storage**
    - https://laravel.com/docs/11.x/filesystem
    - Gebruikt voor: Upload van profielfoto's en productafbeeldingen

### Stack Overflow & Community

6. **Stack Overflow**
    - https://stackoverflow.com/questions/tagged/laravel
    - Gebruikt voor: Troubleshooting specifieke errors, best practices

7. **Laravel Forums**
    - https://laracasts.com/discuss
    - Gebruikt voor: Community hulp en code voorbeelden

### Tools & Resources

8. **GitHub**
    - https://github.com
    - Gebruikt voor: Version control, project hosting

9. **ChatGPT / Claude AI**
    - Gebruikt voor: Code debugging, uitleg van concepten, structuur advies

### Design Inspiratie

10. **Tailwind UI Components**
    - https://tailwindui.com/components
    - Gebruikt voor: Layout inspiratie (geen letterlijke code gekopieerd)

---

## 🐛 Troubleshooting

### Probleem: "View not found" errors

**Oplossing:**
```bash
php artisan view:clear
php artisan config:clear
```

### Probleem: CSS/styling wordt niet geladen

**Oplossing:**
```bash
npm run dev
# Zorg dat dit blijft draaien tijdens development
```

### Probleem: "SQLSTATE[HY000]: General error"

**Oplossing:**
```bash
# Hermaak database
rm database/database.sqlite
New-Item database/database.sqlite -ItemType File  # Windows
# of: touch database/database.sqlite              # Linux/Mac

php artisan migrate:fresh --seed
```

### Probleem: File uploads werken niet

**Oplossing:**
```bash
php artisan storage:link

# Check of storage/app/public folder bestaat
# Check file permissions (storage folder moet writable zijn)
```

### Probleem: "Route not defined" errors

**Oplossing:**
```bash
php artisan route:clear
php artisan route:list  # Controleer of routes bestaan
```

### Probleem: Node.js versie error

**Oplossing:**
- Update Node.js naar 20.19+ of 22.12+
- Download van: https://nodejs.org/

### Probleem: Admin kan niet inloggen

**Oplossing:**
```bash
# Reset de database en seeder
php artisan migrate:fresh --seed

# Login met: admin@ehb.be / Password!321
```

---

## 🔐 Beveiliging

- ✅ **CSRF Protection:** Actief op alle forms via `@csrf` directive
- ✅ **XSS Protection:** Blade escaping via `{{ }}` syntax
- ✅ **SQL Injection:** Eloquent ORM gebruikt prepared statements
- ✅ **Password Hashing:** Bcrypt hashing via Laravel
- ✅ **Authentication:** Laravel Breeze met session-based auth
- ✅ **Authorization:** Custom IsAdmin middleware
- ✅ **Validation:** Server-side en client-side form validatie

---

## 📝 Technische Details

### Requirements (Opdracht)

✅ **Twee layouts:** `app.blade.php` en `admin.blade.php`  
✅ **Components:** Gebruikt waar logisch  
✅ **CSRF & XSS protection:** Actief  
✅ **Client-side validation:** HTML5 validation  
✅ **Controller methods:** Alle routes gebruiken controllers  
✅ **Middleware:** Auth en custom IsAdmin middleware  
✅ **Resource controllers:** Voor CRUD operaties  
✅ **Eloquent relaties:** One-to-Many en basis voor Many-to-Many  
✅ **Seeders:** DatabaseSeeder met testdata

### Code Kwaliteit

- PSR-12 coding standards
- MVC architectuur
- DRY principes (Don't Repeat Yourself)
- Meaningful variable en function names
- Comments waar nodig

---

## 🎓 Leerdoelen Bereikt

Dit project demonstreert:

1. **Laravel Framework:** Complete applicatie van scratch
2. **Database Design:** Normalized schema met relaties
3. **MVC Pattern:** Scheiding van concerns
4. **Authentication & Authorization:** User roles en permissions
5. **CRUD Operations:** Create, Read, Update, Delete voor alle entiteiten
6. **File Uploads:** Image storage en retrieval
7. **Form Handling:** Validation en error handling
8. **Blade Templating:** Layouts, components, directives
9. **Routing:** Named routes, route groups, middleware
10. **Git Workflow:** Version control met meaningful commits

---

## 📄 Licentie

Dit project is gemaakt voor educatieve doeleinden als onderdeel van de Backend Web Development cursus aan Erasmushogeschool Brussel.

---

## 🎉 Bedankt!

Bedankt voor het bekijken van mijn Laravel project. Voor vragen of feedback, neem gerust contact op!