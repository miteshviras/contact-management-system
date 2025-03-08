# Contact Management System

## Introduction

The Contact Management System is a web application designed to help users manage their contacts efficiently. It provides features to add, edit, delete, and search contacts, making it easy to keep track of personal and professional connections.

## Features

- Add new contacts with details such as name, phone number, email, and address.
- Edit existing contact information.
- Delete contacts that are no longer needed.
- Search for contacts by name or other details.
- User authentication to secure access to contact information.

## System Requirements

Before installing Filament, ensure your server meets the following requirements:

-   PHP >= 8.3
-   Composer
-   Laravel >= 12.0
-   Node.js & NPM (for frontend assets)
-   A database (MySQL, PostgreSQL, SQLite, etc.)


## Installation

To get started with the Contact Management System, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/miteshviras/contact-management-system.git
    ```
2. Navigate to the project directory:
    ```bash
    cd contact-management-system
    ```
3. Install the dependencies:
    ```bash
    composer install
    npm install
    ```
4. Set up the environment variables:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
5. Configure the database in the `.env` file and run the migrations:
    ```bash
    php artisan migrate
    ```
6. Start the development server:
    ```bash
    php artisan serve
    npm run dev
    ```
7. **Create Admin User**: execute below given command to create admin user.

    ```bash
    php artisan user:make-admin-user
    ```

8. **Create Storage Link**: Execute the command below to create a symbolic link from `public/storage` to `storage/app/public`.

    ```bash
    php artisan storage:link
    ```

## Usage

Once the application is installed and running, you can access it in your web browser at `http://localhost:8000`. Register or log in to start managing your contacts.

You can now access the Filament admin panel by navigating to `/admin` in your browser.

## Building for Production

To compile the frontend assets for production, use the following command:

```bash
npm run build
```

## Learning Filament

Filament has comprehensive [documentation](https://filamentphp.com/docs) and a growing community of developers. You can also find tutorials and guides on various topics related to Filament and the TALL stack.

## Contributing

We welcome contributions to the Contact Management System! If you would like to contribute, please fork the repository and submit a pull request. For major changes, please open an issue first to discuss what you would like to change.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

If you have any questions or feedback, please feel free to reach out to the project maintainer at [virashmitesh@gmail.com](mailto:virashmitesh@gmail.com).
