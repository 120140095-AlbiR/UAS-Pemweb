-- Create the database if it does not exist
CREATE DATABASE IF NOT EXISTS library_management;

-- Use the created database
USE library_management;

-- Create the users table if it does not exist
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255),
    email VARCHAR(255)
);

-- Create the books table if it does not exist
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(255),
    genre VARCHAR(255),
    published DATE,
    available BOOLEAN,
    browser VARCHAR(255),
    ip_address VARCHAR(45)
);