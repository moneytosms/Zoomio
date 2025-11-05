# Application Workflow

This document outlines the functional flow of the Zoomio application, from user authentication to administrative management. It serves as a logical map of the project to help developers understand how different components interact.

## 1. User Authentication

### Login

1.  **Entry Point**: `index.php`
    -   The user is presented with a login form.
    -   Upon submission, the form data is sent to `index.php` itself.
    -   The script validates the user's email and password against the `users` table in the database.
    -   The password validation is done using `md5()`.

2.  **Successful Login**:
    -   If the credentials are correct, a new session is started, and the user's email is stored in the `$_SESSION['email']` variable.
    -   The user is then redirected to `cardetails.php`, where they can view the available cars.

### Registration

1.  **Entry Point**: `register.php`
    -   The user fills out a registration form with their personal details.
    -   The form is submitted to `register.php`.
    -   The script checks if the email already exists in the `users` table.
    -   If the email is unique and the passwords match, a new user is created in the `users` table.
    -   The user is then redirected to `index.php` to log in.

## 2. Admin Authentication

1.  **Entry Point**: `adminlogin.php`
    -   The administrator enters their ID and password.
    -   The form data is submitted to `adminlogin.php`.
    -   The script validates the credentials against the `admin` table.
    -   If the login is successful, the administrator is redirected to `admindash.php`.

## 3. Post-Login Flow

### User Flow

1.  **Car Details**: `cardetails.php`
    -   This page displays all the available cars from the `cars` table.
    -   Each car has a "Book Now" button that links to `booking.php`, passing the `CAR_ID` in the URL.

2.  **Booking**: `booking.php`
    -   This page displays the details of the selected car.
    -   The user fills out a booking form, including the pickup location, date, duration, and destination.
    -   The total price is calculated based on the car's daily rate and the duration of the rental.
    -   Upon submission, a new record is created in the `booking` table, and the user is redirected to `payment.php`.

3.  **Payment**: `payment.php`
    -   The user enters their payment details.
    -   A new record is created in the `payment` table, linked to the booking by `BOOK_ID`.
    -   Upon successful payment, the user is redirected to `psucess.php`.

### Admin Flow

1.  **Admin Dashboard**: `admindash.php`
    -   This is the main dashboard for the administrator.
    -   It provides navigation to different management pages:
        -   **Vehicle Management**: `adminvehicle.php`
        -   **Users**: `adminusers.php`
        -   **Feedbacks**: `admindash.php` (displays feedbacks by default)
        -   **Booking Requests**: `adminbook.php`

2.  **Vehicle Management**:
    -   `adminvehicle.php`: Displays all cars and allows the admin to add, update, or delete them.
    -   `addcar.php`: Form to add a new car.
    -   `deletecar.php`: Deletes a car from the `cars` table.

3.  **User Management**:
    -   `adminusers.php`: Displays all registered users.
    -   `deleteuser.php`: Deletes a user from the `users` table.

4.  **Booking Management**:
    -   `adminbook.php`: Displays all booking requests.
    -   `approve.php`: Approves a booking request, updating the `BOOK_STATUS` in the `booking` table.
    -   `adminreturn.php`: Marks a car as returned.

## 4. Database Interactions

-   **`connection.php`**: Included in almost every PHP file to establish a connection to the MySQL database.
-   **`users` table**: Interacted with by `index.php`, `register.php`, and `adminusers.php`.
-   **`admin` table**: Interacted with by `adminlogin.php`.
-   **`cars` table**: Interacted with by `cardetails.php`, `adminvehicle.php`, `addcar.php`, and `deletecar.php`.
-   **`booking` table**: Interacted with by `booking.php`, `adminbook.php`, and `approve.php`.
-   **`payment` table**: Interacted with by `payment.php`.
-   **`feedback` table**: Interacted with by `admindash.php` and `feedback/Feedbacks.php`.

## 5. Scripts, Styles, and Components

-   **CSS**:
    -   Global styles are located in `css/app.css`.
    -   Page-specific styles are in files like `css/adlog.css`, `css/cont.css`, etc.
-   **JavaScript**:
    -   `js/main.js`: Contains general-purpose JavaScript.
    -   `js/admin.js`: Contains scripts specific to the admin dashboard.
-   **Components**:
    -   The project does not use a formal component-based architecture. However, the navigation bar and other repeated elements are included in each relevant file.

## Unused/Legacy Files

-   The `feedback` directory contains a separate set of styles and a `Feedbacks.php` file that may not be fully integrated with the main application flow. This could be a candidate for refactoring or removal.
-   Some of the CSS files in the `css` directory may be redundant or contain overlapping styles.

## Refactoring Reference

When adding new features or refactoring the existing codebase, please adhere to the following guidelines:

### Global Styles

-   Add new global styles to `css/app.css`.
-   For page-specific styles, create a new CSS file and link it in the head of the corresponding PHP or HTML file.

### Scripts

-   Add new global JavaScript functions to `js/main.js`.
-   For scripts that are specific to a particular page or feature, consider creating a new JS file to keep the code organized.

### Components

-   If you are creating a new reusable component (e.g., a modal, a card), create a separate PHP file for it and include it in the pages where it is needed using `require_once()`.
-   Place the corresponding styles and scripts in the global `app.css` and `main.js` files, or in separate files if the component is complex.
