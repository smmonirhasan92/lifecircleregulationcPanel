# Life Circle Regulation - Humanized Implementation

This is a professional Laravel 9 implementation of the Life Circle Regulation project, designed for Sharmin Mujahid Ma'am'am. It adheres to the "Humanized Code" philosophy: readable logic, architecture-driven structure, and an empathetic user experience.

## Key Features
- **Humanized Architecture**: Separation of concerns (Controllers, Models, Blade Components).
- **Bengali Validation**: All form errors are presented in meaningful, polite Bengali.
- **WhatsApp Integration**: Automatic redirection to Sharmin Mujahid Ma'am's WhatsApp with a pre-formatted Bengali message.
- **Trust-Focused Payments**: Integrated Transaction ID tracking for bKash and Nagad.
- **Admin Dashboard**: A secure Overview Dashboard to monitor lead enrollments.

## Local Setup (XAMPP/Windows)

1.  **Environment Check**: Ensure you are using **PHP 8.0.30+**.
2.  **Database Configuration**:
    - Open XAMPP and start Apache and MySQL.
    - Go to `http://localhost/phpmyadmin`.
    - Create a database named `life_circle_regulation`.
3.  **Project Credentials**:
    - Update your `.env` if your DB username or password differs from the default (`root` / empty).
4.  **Install & Migrate**:
    ```bash
    composer install
    php artisan migrate
    ```
5.  **Run Application**:
    ```bash
    php artisan serve
    ```
    Visit `http://localhost:8000` to see the live site.

## Directory Structure
- `app/Http/Controllers/EnrollmentController.php`: The heart of the logic (validation + redirection).
- `resources/views/`: Contains the master layout, partials, and humanized Blade templates.
- `lang/bn/validation.php`: Bengali translation for empathetic feedback.
- `source_html/`: Original source files archived for reference.

## Developer Philosophy
> "Code is a conversation. This project was built to be readable by humans and supportive of parents in need."

---
*Built with ❤️ by Antigravity for Life Circle Regulation.*
