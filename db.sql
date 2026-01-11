CREATE DATABASE car_rental_db;
USE car_rental_db;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    role ENUM('admin','user')
);

INSERT INTO users VALUES
(1,'admin','admin123','admin'),
(2,'user','user123','user');

-- Customers
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(20),
    cnic VARCHAR(20)
);

-- Vehicles
CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    number_plate VARCHAR(50),
    rent_per_day INT,
    status ENUM('available','rented') DEFAULT 'available'
);

-- Rentals
CREATE TABLE rentals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    vehicle_id INT,
    start_date DATE,
    end_date DATE,
    total_days INT,
    total_amount INT,
    status ENUM('booked','returned','cancelled'),
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id)
);

-- Payments
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rental_id INT,
    amount INT,
    payment_date DATE,
    FOREIGN KEY (rental_id) REFERENCES rentals(id)
);
