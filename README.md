# CCTV Management System

This README provides details for setting up the database for the CCTV Management System. The system includes user roles, product management, service tracking, purchase records, sales records, module management, and permissions for various operations.

## Table of Contents

1. [Introduction](#introduction)
2. [Database Schema](#database-schema)
   - [Roles Table](#roles-table)
   - [Users Table](#users-table)
   - [Products Table](#products-table)
   - [Services Table](#services-table)
   - [Purchases Table](#purchases-table)
   - [Sales Table](#sales-table)
   - [Modules Table](#modules-table)
   - [Permissions Table](#permissions-table)
3. [Getting Started](#getting-started)
4. [Contributors](#contributors)
5. [License](#license)
6. [Support](#support)

## Introduction

The CCTV Management System database is designed to manage various entities such as user roles, products, services, purchases, sales, and permissions. This README provides the SQL script necessary to create and populate the database.

## Database Schema

### Roles Table

The `Roles` table stores information about different roles within the system.

```sql
CREATE TABLE `Roles` (
    `RoleId` INT PRIMARY KEY AUTO_INCREMENT,
    `RoleName` VARCHAR(50) NOT NULL
);
```

### Users Table

The `Users` table manages user accounts with details such as name, contact information, and assigned roles.

```sql
CREATE TABLE `Users` (
    `UserId` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(100) NOT NULL,
    `Email` VARCHAR(100) NOT NULL UNIQUE,
    `Password` VARCHAR(255) NOT NULL,
    `RoleId` INT,
    FOREIGN KEY (`RoleId`) REFERENCES `Roles` (`RoleId`)
);
```

### Products Table

The `Products` table stores details about individual products, including name and price.

```sql
CREATE TABLE `Products` (
    `ProductId` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(100) NOT NULL,
    `Price` INT NOT NULL
);
```

### Services Table

The `Services` table tracks services provided to customers.

```sql
CREATE TABLE `Services` (
    `ServiceId` INT PRIMARY KEY AUTO_INCREMENT,
    `ProductId` INT NOT NULL,
    `BuyerName` VARCHAR(100) NOT NULL
