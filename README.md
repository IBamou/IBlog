# IBlog

A stylish personal blog application for writers to share their thoughts with the world.

## Overview

IBlog is a minimal yet powerful blog platform built with Laravel and Tailwind CSS. It provides a clean writing experience with drafting capabilities, category organization, and a beautiful reading interface.

## Tech Stack

- **Backend**: Laravel 11
- **Frontend**: HTML, Blade Templates
- **Styling**: Tailwind CSS + DaisyUI
- **Database**: SQLite (default) / MySQL / PostgreSQL
- **PHP**: 8.2+

## Features

| Feature | Description |
|---------|-------------|
| Articles | Create, edit, and publish articles with rich content |
| Drafts | Save work in progress without publishing |
| Categories | Organize articles by topic |
| Profile | Manage your profile information |
| Themes | Dark/Light mode toggle |
| Reading Time | Automatic reading time calculation |

## Installation

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & NPM (for CSS building)

### Steps

```bash
# Clone the repository
git clone <repository-url> IBlog
cd IBlog

# Install PHP dependencies
composer install

# Install NPM dependencies
npm install

# Build assets
npm run build

# Run migrations
php artisan migrate

# Start the development server
php artisan serve
```

## Default Credentials

On first run, a default admin user is created automatically:

| Field | Value |
|-------|-------|
| Email | admin@gmail.com |
| Password | admin123 |

> **Security Note**: Change the default password after first login.

## Usage

### Creating Articles

1. Click "Write Article" in the navigation
2. Fill in title, content, and optional category
3. Save as Draft or Publish immediately

### Managing Content

- **Published**: Visible to all visitors
- **Draft**: Only visible to you

### Navigation

- **Home**: Latest published articles
- **Articles**: Browse all articles
- **My Articles**: View your published and draft articles
- **Profile**: Update your profile info

## Project Structure

```
IBlog/
├── app/
│   ├── Http/Controllers/
│   │   ├── ArticleController.php    # Article CRUD operations
│   │   ├── AuthController.php       # Authentication
│   │   └── ProfileController.php    # User profile
│   ├── Models/
│   │   ├── Article.php             # Article model
│   │   ├── Category.php           # Category model
│   │   └── User.php               # User model
│   └── Providers/
│       └── AppServiceProvider.php # App bootstrapping
├── resources/
│   └── views/
│       ├── components/           # Reusable UI components
│       │   ├── article/          # Article components
│       │   ├── layout.blade.php  # Main layout
│       │   └── nav.blade.php     # Navigation
│       ├── articles/             # Article pages
│       ├── auth/                 # Auth pages
│       └── profile/              # Profile page
├── routes/
│   └── web.php                  # Web routes
└── docs/
    └── README.md                # Documentation
```

## Routes

| Method | Route | Description |
|--------|-------|-------------|
| GET | / | Home page |
| GET | /articles | All articles |
| GET | /profile | User profile |
| POST | /login | User login |
| POST | /logout | User logout |

## Customization

### Adding New Fields to Profile

1. Update the `User` modelfillable
2. Add fields to `resources/views/profile/show.blade.php`
3. Update `ProfileController@update`

### Changing the Theme

Edit `data-theme` attribute in `resources/views/components/layout.blade.php`:

```html
<html data-theme="light">  <!-- or "dark" -->
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Submit a pull request

## License

MIT License - see LICENSE file for details.

## Acknowledgments

- [Laravel](https://laravel.com) - The PHP framework
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS
- [DaisyUI](https://daisyui.com) - Tailwind CSS component library