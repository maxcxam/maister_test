# Project Setup and Instructions

## Project Setup

Follow these steps to set up the project:

1. **Clone the Repository:**
   ```sh
   git clone https://github.com/maxcxam/maister_test.git
   cd maister_test
   
2. Install Dependencies: Ensure you have Composer and Node installed on your machine. Then run:
   ```sh
   composer install
   npm install

3. Environment Configuration: Copy .env.example to .env and configure your environment variables as needed:
   ```sh
   cp .env.example .env

   
   
4. Generate Application Key:
   ```sh
   php artisan key:generate
   
# Running Migrations

## Before running the migrations, ensure your database configuration is correctly set up in the .env file. Then run:
    php artisan migrate --seed
### This command will apply all necessary database migrations
