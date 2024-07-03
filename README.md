# Simple Blog Application

## Overview

This project is a simple blog application built with PHP, MySQL, and Bootstrap 5. It allows users to register, log in, create, edit, and delete blog posts, as well as comment on blog posts. The application follows Object-Oriented Programming (OOP) principles.

## Features

- User Registration and Login
- Create, Edit, and Delete Blog Posts
- Comment on Blog Posts
- Edit and Delete Comments
- User Dashboard for managing blog posts and account information
- Responsive design using Bootstrap 5

## Try localy

Run this script to generate the database tables
```
CREATE DATABASE blog;

USE blog;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    blog_id INT NOT NULL,
    user_id INT,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);
```