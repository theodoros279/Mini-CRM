# Mini CRM Project

## Features

- User authentication using Laravel Breeze
- CRUD operations for Clients and Transactions
- Pagination for listing entries
- File upload for client avatars
- Seeding for test data
- Bootstrap for responsive UI

---

## Installation Instructions

1. Clone the repository:
    ```bash
    git clone https://github.com/theodoros279/mini-crm.git
    cd mini-crm
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    ```

3. Set up the environment:
    - Duplicate the `.env.example` file as `.env`:
      ```bash
      cp .env.example .env
      ```
    - Configure the `.env` file (default uses SQLite).

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Run migrations and seed the database:
    ```bash
    php artisan migrate --seed
    ```

6. Link storage for public access:
    ```bash
    php artisan storage:link
    ```

7. Compile assets:
    ```bash
    npm run dev
    ```

8. Start the development server:
    ```bash
    php artisan serve
    ```

---

## Production Instructions

1. Compile assets for production:
    ```bash
    npm run build
    ```

2. Ensure proper configuration for the server environment in `.env` (e.g., database, mail).

3. Deploy the application using a suitable web server (e.g., Nginx, Apache).

---

## Additional Notes

- Default admin credentials:  
  Email: `admin@admin.com`  
  Password: `password`
- To reset the database, run:
    ```bash
    php artisan migrate:fresh --seed
    ```

---
