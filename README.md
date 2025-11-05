# Zoomio - Car Rental System

Zoomio is a full-stack web application for renting cars. It provides a simple, intuitive interface for users to browse and book vehicles, and a comprehensive dashboard for administrators to manage the fleet, users, and bookings.

## Core Features

- **User Authentication**: Secure login and registration for users.
- **Vehicle Fleet**: Browse a curated collection of cars with details and pricing.
- **Booking System**: Simple booking process with transparent pricing.
- **Admin Dashboard**: Manage vehicles, users, bookings, and view feedback.
- **Dynamic Pricing**: Calculates rental costs based on the duration of the booking.

## Setup Instructions

### 1. Clone the Repository

To get started, clone the repository to your local machine:

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```

### 2. Configure the Database

The application uses MySQL for its database. The connection script (`connection.php`) is designed to automatically create the database and tables if they don't exist.

1.  **Open `connection.php`**:
    -   Locate the `connection.php` file in the root directory.
    -   Update the following variables with your MySQL credentials:
        ```php
        $DB_HOST = 'localhost';
        $DB_USER = 'root';
        $DB_PASS = 'root';
        $DB_NAME = 'zoomio';
        ```

2.  **Database Creation**:
    -   The script will automatically use the `database/create.sql` file to set up the database schema and seed it with initial data.

### 3. Run the Development Server

This project uses PHP's built-in development server. To run the application, navigate to the project's root directory in your terminal and run the following command:

```bash
php -S localhost:8000
```

You can now access the application by opening your web browser and navigating to `http://localhost:8000`.

## Dependencies

- **PHP**: Version 7.0 or higher.
- **MySQL**: Version 5.7 or higher.
- **Web Browser**: A modern web browser such as Google Chrome, Mozilla Firefox, or Microsoft Edge.

## Contributing

We welcome contributions to Zoomio! To contribute, please follow these steps:

1.  **Fork the repository**.
2.  **Create a new branch**: `git checkout -b feature/your-feature-name`.
3.  **Make your changes**.
4.  **Commit your changes**: `git commit -m 'Add some feature'`.
5.  **Push to the branch**: `git push origin feature/your-feature-name`.
6.  **Open a pull request**.

## Testing

Currently, the project does not have an automated test suite. To test the application, you can perform the following manual checks:

-   **User Registration**: Create a new user account.
-   **User Login**: Log in with an existing user account.
-   **Admin Login**: Log in with the default admin credentials (`admin`/`admin`).
-   **Booking**: Book a car with a user account.
-   **Admin Management**: Add, update, and delete cars and users from the admin dashboard.

## Troubleshooting

-   **Database Connection Issues**: Ensure your MySQL server is running and that the credentials in `connection.php` are correct.
-   **File Not Found Errors**: Make sure you are running the `php -S` command from the root directory of the project.
-   **Permissions**: Ensure that the web server has the necessary permissions to read and write files if you are using a different server setup (like Apache).
