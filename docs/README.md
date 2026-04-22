# IBlog - Personal Blogging Platform

IBlog is a personal blogging platform built with Laravel 13 and DaisyUI 5.

## Features

- **Articles** - Create, edit, delete, and publish articles
- **Drafts** - Save articles as drafts, publish later
- **Categories** - Organize articles by category
- **Authentication** - Login system
- **Theme Toggle** - Dark/Light mode (visible to all users)
- **Responsive** - Mobile-friendly UI

## Requirements

- PHP 8.3+
- MySQL 5.7+
- Composer

## Installation

```bash
# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate key
php artisan key:generate

# Configure database in .env, then run:
php artisan migrate

# Start server
php artisan serve
```

## Routes

| Method | URI | Auth | Description |
|--------|-----|------|-------------|
| GET | / | No | Home page |
| GET | /articles | No | All published articles |
| GET | /articles/create | Yes | Create article |
| POST | /articles/store | Yes | Store article |
| GET | /articles/{id} | No | View article |
| GET | /articles/{id}/edit | Yes | Edit article |
| PUT | /articles/{id} | Yes | Update article |
| DELETE | /articles/{id} | Yes | Delete article |
| PATCH | /articles/{id}/publish | Yes | Publish draft |
| GET | /articles/my/{status} | Yes | My articles |
| GET | /login | No | Login page |
| POST | /login | No | Login |
| POST | /logout | Yes | Logout |

## Article Status

- **draft** - Only visible to author
- **published** - Visible to all visitors

## Database Tables

**articles:**
- `id`, `title`, `content`
- `status` (draft/published)
- `category_id`, `user_id`
- `published_date` (set when published)
- `timestamps`

## Security

- Drafts only visible to author
- Only author can edit/delete/publish their articles
- CSRF protection on all forms

## Tech Stack

- **Backend**: Laravel 13, PHP 8.3
- **Frontend**: Tailwind CSS 4, DaisyUI 5
- **Database**: MySQL

## Project Structure

```
app/
├── Http/Controllers/
│   ├── ArticleController.php
│   └── AuthController.php
├── Models/
│   ├── Article.php
│   └── Category.php
resources/views/
├── articles/
│   ├── create.blade.php
│   ├── edit.blade.php
│   ├── index.blade.php
│   ├── my.blade.php
│   └── show.blade.php
├── auth/login.blade.php
└── components/
    ├── nav.blade.php
    ├── layout.blade.php
    └── toasts/
routes/web.php
```