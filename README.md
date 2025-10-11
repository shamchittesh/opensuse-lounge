
## openSUSE Lounge

openSUSE Lounge is a tool for maintaining member records. The project aims to modernize and simplify the current membership management process.

## 🧩 Tech Stack

- **[Laravel](https://laravel.com)** — Backend framework powering the core application logic, routing, and data management.
- **[Tailwind CSS](https://tailwindcss.com)** — Utility-first CSS framework used for building responsive and clean user interfaces.
- **[Alpine.js](https://alpinejs.dev)** — Lightweight JavaScript framework for adding interactivity and dynamic behavior to frontend components.

This stack ensures a modern, maintainable, and developer-friendly environment.

## ⚙️ Local Setup

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

4. **Run database migrations**
   ```bash
   php artisan migrate
   ```

5. Build frontend assets
   ```bash
   npm run dev
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```
Visit http://localhost:8000 in your browser.
