CAR RENTAL MANAGEMENT SYSTEM
HOW TO RUN THE PROJECT USING XAMPP

-------------------------------------------------
REQUIREMENTS
-------------------------------------------------
1. XAMPP installed on your computer
2. MySQL Workbench
3. Web browser (Chrome, Edge, Firefox, etc.)

-------------------------------------------------
STEP 1: START XAMPP
-------------------------------------------------
1. Open XAMPP Control Panel
2. Click START on:
   - Apache
   - MySQL
3. Make sure both turn green (Running)

-------------------------------------------------
STEP 2: CREATE DATABASE
-------------------------------------------------
1. Open MySQL Workbench
2. Connect to your local MySQL server
3. Open the file: db.sql
4. Run all queries by clicking the ⚡ Execute button
5. This will create:
   - Database: car_rental_db
   - All required tables
   - Default users

-------------------------------------------------
DEFAULT LOGIN ACCOUNTS
-------------------------------------------------
Admin:
Username: admin
Password: admin123

User:
Username: user
Password: user123

-------------------------------------------------
STEP 3: PLACE PROJECT FILES
-------------------------------------------------
1. Go to your XAMPP installation folder
2. Open:
   xampp/htdocs/
3. Create a new folder:
   car_rental
4. Copy ALL PHP files into:
   xampp/htdocs/car_rental/

Files should include:
- index.php
- config.php
- login.php
- logout.php
- admin_dashboard.php
- user_dashboard.php
- add_car.php
- manage_cars.php
- register_customer.php
- rent_car.php
- return_car.php
- cancel_booking.php
- calculate_rent.php
- reports.php

-------------------------------------------------
STEP 4: RUN THE SYSTEM
-------------------------------------------------
Open your browser and go to:

http://localhost/car_rental/ , if this is not working then enter your host name ( root ) and your port (eg 3036)

You will see the Login Page.

-------------------------------------------------
SYSTEM FLOW
-------------------------------------------------
ADMIN:
- Login
- Add vehicles
- Manage vehicles
- Register customers
- Rent cars
- Return cars
- Cancel bookings
- View reports:
  - Cars on rent
  - Free cars
  - Total revenue

USER:
- Login
- Calculate rent
- Request car rental

-------------------------------------------------
TROUBLESHOOTING
-------------------------------------------------
If page shows blank:
- Check Apache is running
- Check file names are correct
- Check database imported correctly

If database error:
- Check config.php:
  Host: localhost
  User: root
  Password: (empty)
  Database: car_rental_db

If MySQL has a password:
Change this line in config.php:

$conn = new mysqli("localhost","root","","car_rental_db");

Replace "" with your MySQL password.

