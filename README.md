
## openSUSE Lounge

openSUSE Lounge is a tool for maintaining member records. The project aims to modernize and simplify the current membership management process.

## Tech Stack

- **[Laravel](https://laravel.com)** — Backend framework powering the core application logic, routing, and data management.
- **[MySQL](https://www.mysql.com)** — Relational database management system for storing and managing application data.
- **[Tailwind CSS](https://tailwindcss.com)** — Utility-first CSS framework used for building responsive and clean user interfaces.
- **[Alpine.js](https://alpinejs.dev)** — Lightweight JavaScript framework for adding interactivity and dynamic behavior to frontend components.

This stack ensures a modern, maintainable, and developer-friendly environment.

## Local Setup

Follow the steps below to get **openSUSE Lounge** running locally:

1. **Clone the repository**
   ```bash
   git clone https://github.com/opensuse/opensuse-lounge.git
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Set up the environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
Update the .env file with your database credentials and any other required configuration.

4. **Run database migrations and seed the database**
   ```bash
   php artisan migrate --seed
   ```

5. Build frontend assets
   ```bash
   npm run dev
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. Other commands available
    ```bash
        # will create a new user and assign roles and send password via email
        php artisan make:user --help
        # Edit an existing user
        php artisan make:edit-user --help
    ```

> [!NOTE]
> You _may_ use the provided `compose.yaml` for access to a mail dev server and mysql database.

  MySQL 8.4:
  - Port: 3306
  - Database: opensuse_lounge
  - User: opensuse / Password: password
  - Root password: root

  Mailpit:
  - Web UI: http://localhost:8025
  - SMTP: localhost:1025

  Run with: docker compose up -d

  Update .env:

  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=opensuse_lounge
  DB_USERNAME=opensuse
  DB_PASSWORD=password

  MAIL_MAILER=smtp
  MAIL_HOST=127.0.0.1
  MAIL_PORT=1025
  ```

Visit http://localhost:8000 in your browser.
