# PHP MVC User Management System

This is a simple PHP MVC (Model-View-Controller) application that demonstrates user management functionalities such as registration, login, and logout.

## Project Structure

The project is organized following the MVC pattern:


## Components

### Model

- **User.php**: Interacts with the database to manage user data (registration, login, etc.).

### View

- **login.php**: Displays the login form.
- **register.php**: Displays the registration form.
- **dashboard.php**: Displays the user dashboard after successful login.

### Controller

- **UserController.php**: Handles user-related actions (registration, login, logout, and dashboard view).

### Core

- **App.php**: Manages routing and directs requests to the appropriate controller and method.
- **Controller.php**: Base controller that other controllers extend. Provides methods to load models and views.
- **Model.php**: Base model that other models extend. Connects to the database.

## Installation

1. **Clone the Repository**:

    ```sh
    git clone https://github.com/yourusername/your-repo-name.git
    cd your-repo-name
    ```

2. **Set Up Database**:
   - Open `phpMyAdmin` or your preferred MySQL interface.
   - Create a new database named `project`.
   - Import the SQL file to set up the `users` table:

     ```sql
     CREATE TABLE IF NOT EXISTS users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(50) NOT NULL,
         password VARCHAR(255) NOT NULL
     );
     ```

3. **Configure Database**:
   - Edit `config.php` to match your database credentials:

     ```php
     <?php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');  // Your MySQL root password, if any
     define('DB_NAME', 'project');
     ```

4. **Set Up Apache**:
   - Ensure that mod_rewrite is enabled in your Apache configuration.
   - Place the project in your web server's root directory (`htdocs` for XAMPP).
   - Restart Apache.

5. **Access the Application**:
   - Open your web browser and navigate to:

     ```
     http://localhost/php/project/public/user/register
     ```

## Usage

- **Registration**: Access the registration page at `/user/register` and create a new account.
- **Login**: Access the login page at `/user/login` to log in with your credentials.
- **Dashboard**: Upon successful login, you'll be redirected to the user dashboard at `/user/dashboard`.
- **Logout**: Log out from the dashboard to end your session.

## Troubleshooting

- **Database Connection Issues**: Ensure your database credentials in `config.php` are correct.
- **404 Errors**: Ensure your `.htaccess` file is correctly configured and that mod_rewrite is enabled.
- **Internal Server Errors**: Check the Apache error log for more details on what might be going wrong.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.

