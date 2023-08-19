# BookHaven Laravel Project

BookHaven is a Laravel-based web application that provides a platform for users to purchase, download, and read e-books. The project features a comprehensive set of functionalities including a shopping cart, search functionality, book categorization, a "My Books" section for viewing purchased books, and user authentication with login and registration capabilities.


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
   git clone https://github.com/your-username/BookHaven.git

2. **Install Dependencies**: Navigate to the project directory and install the required PHP dependencies using Composer:
   ```sh
   cd BookHaven
   composer install

3.  **Create Database**: Create the bookhaven_db database using your preferred MySQL client.

4. **Database Configuration**: Create a new MySQL database for the project. In the .env file, update the following lines with your database credentials:
   ```sh
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=bookhaven_db
      DB_USERNAME=root
      DB_PASSWORD=

5. **Import SQL Data**: In phpMyAdmin, follow these steps to import the SQL data:
   * Select the bookhaven_db database on the left panel.
   * Navigate to the "Import" tab.
   * Click the "Choose File" button and browse to the SQL data file located in the project root folder: Sql Data/data.sql.
   * Click the "Go" button to import the data.


















