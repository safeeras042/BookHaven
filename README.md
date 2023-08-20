# BookHaven Laravel Project

BookHaven is a Laravel-based web application that provides a platform for users to purchase, download, and read e-books. The project features a comprehensive set of functionalities including a shopping cart, search functionality, book categorization, a "My Books" section for viewing purchased books, and user authentication with login and registration capabilities.


# Table of Contents

1. [Video Showcase](#video-showcase)
2. [Features](#features)
3. [Getting Started](#getting-started)
4. [Troubleshooting Common Issues](#troubleshooting-common-issues)
5. [Screenshots](#screenshots)




## Video Showcase

### Explore BookHaven in Action
Check out this video to get a visual tour of the BookHaven application. The video showcases the various features including browsing through e-books, using the search functionality, filtering by categories, and more. 

Feel free to follow along with the video to see how the application works and the experience it provides to users.




https://github.com/safeeras042/BookHaven/assets/134996928/92fafc2c-a280-438a-be7b-418a6f7de7eb 

### Making Purchases and Reading E-Books
This video demonstrates the process of adding and removing books to/from the cart, filling out purchase details, making a purchase, and accessing the purchased e-books through the "My Books" section. Follow along to see how users can seamlessly interact with BookHaven's features.




https://github.com/safeeras042/BookHaven/assets/134996928/88fe8164-8c71-47e2-bf92-0c0a07e9e819



## Features

- **User Authentication**: The application offers user registration and login features, ensuring secure access to user-specific content.

- **E-Book Catalog**: Users can browse through an extensive collection of e-books available for purchase.

- **Shopping Cart**: A user-friendly shopping cart system allows users to add e-books for purchase, review the cart, and proceed to checkout.

- **Search Functionality**: The application includes a search feature enabling users to quickly find desired e-books by title, author, or keyword.

- **Book Categorization**: E-books are categorized into different genres or categories, making it easier for users to explore specific genres.

- **My Books**: Users can access a dedicated section where they can view and download e-books they've purchased.

## Getting Started

Follow these steps to set up and run the BookHaven project locally:

1. **Clone the Repository**: Clone this repository to your local development environment using the following command:  
   ```sh
   git clone https://github.com/safeeras042/BookHaven.git

2. **Install Dependencies**: Navigate to the project directory and install the required PHP dependencies using Composer:
   ```sh
   cd BookHaven
   composer install

3. **Create .env File**: Copy it to create your own .env file:
   ```sh
   cp .env.example .env
* Then, generate an application key using the following command:
   ```sh
   php artisan key:generate

4.  **Create Database**: Create the bookhaven_db database using your preferred MySQL client.

5. **Database Configuration**: In the .env file, update the following lines with your database credentials:
   ```sh
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=bookhaven_db
      DB_USERNAME=root
      DB_PASSWORD=

6. **Import SQL Data**: In phpMyAdmin, follow these steps to import the SQL data:
   * Select the bookhaven_db database on the left panel.
   * Navigate to the "Import" tab.
   * Click the "Choose File" button and browse to the SQL data file located in the project root folder: Sql Data/data.sql.
   * Click the "Go" button to import the data.

7. **Install JavaScript Dependencies**: Install the JavaScript dependencies using npm:
   ```sh
   npm install

8. **Build Frontend Assets**: Build the frontend assets by running the following command:
   ```sh
   npm run dev

9. **Start the Development Server**: Launch the Laravel development server:
   ```sh
   php artisan serve

10. **Access the Application**: Open a web browser and visit http://localhost:8000 to access the BookHaven application.


## Troubleshooting Common Issues

### Issue: Failed to Listen on 127.0.0.1:8000

**Solution**:
1. Navigate to your PHP installation folder.
2. Find the `php.ini-development` file and rename it to `php.ini`.

---

### Issue: Call to Undefined Function Illuminate\Encryption\openssl_cipher_iv_length()

**Solution**:
1. Open your `php.ini` file.
2. Search for the `;extension=openssl` line.
3. Remove the semicolon `;` at the beginning of the line to uncomment it.
4. Save the `php.ini` file.
5. Restart your server.

---

### Issue: Illuminate\Database\QueryException Could Not Find Driver

**Solution**:
1. Open your `php.ini` file.
2. Search for the `;extension=pdo_mysql` line.
3. Remove the semicolon `;` at the beginning of the line to uncomment it.
4. Save the `php.ini` file.
5. Restart your server.



## Screenshots

![Home](https://github.com/safeeras042/BookHaven/assets/134996928/f3cc8524-d7fc-42f1-9150-00e5ac8cce19)


![Book](https://github.com/safeeras042/BookHaven/assets/134996928/7caa3de3-d902-4eee-87f2-3c735310085f)

![Cart](https://github.com/safeeras042/BookHaven/assets/134996928/1b8fd648-8b01-4bf2-b2f9-a89df661bcd7)

![Purchase](https://github.com/safeeras042/BookHaven/assets/134996928/4b67a017-da50-4dee-8db4-700f640abb00)

![My-Books](https://github.com/safeeras042/BookHaven/assets/134996928/8fbd8c0a-f810-4272-9c79-6502a9f95b5d)

![book-content](https://github.com/safeeras042/BookHaven/assets/134996928/3c7419a1-1582-4eda-9c77-833c64d45801)
