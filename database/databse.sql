DROP DATABASE IF EXISTS `cctv`;

CREATE DATABASE `cctv`;

USE `cctv`;

-- Create the roles table
CREATE TABLE `Roles` (
    `RoleId` INT PRIMARY KEY AUTO_INCREMENT,
    `RoleName` VARCHAR(50) NOT NULL
);

-- Insert default roles
INSERT INTO `Roles` (RoleName)
VALUES
    ('Admin'),
    ('Worker');

-- Create the users table
CREATE TABLE `Users` (
    `UserId` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(100) NOT NULL,
    `Email` VARCHAR(100) NOT NULL UNIQUE,
    `Password` VARCHAR(255) NOT NULL,
    `RoleId` INT,
    FOREIGN KEY (`RoleId`) REFERENCES `Roles` (`RoleId`)
);

-- Insert an admin user
INSERT INTO `Users` (Name, Email, Password, RoleId)
VALUES
    ('admin', 'admin@example.com', 'admin', 1);

-- Create the product table
CREATE TABLE `Products` (
    `ProductId` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(100) NOT NULL,
    `Price` INT NOT NULL
);

-- Create the services table
CREATE TABLE `Services` (
    `ServiceId` INT PRIMARY KEY AUTO_INCREMENT,
    `ProductId` INT NOT NULL,
    `BuyerName` VARCHAR(100) NOT NULL,
    `BuyerNumber` INT NOT NULL,
    `BuyerAddress` VARCHAR(100) NOT NULL,
    `BuyerCity` VARCHAR(100) NOT NULL,
    `BuyerState` VARCHAR(100) NOT NULL,
    `ToDate` VARCHAR(200) NOT NULL,
    `FromDate` VARCHAR(200) NOT NULL,
    `Price` INT NOT NULL,
    FOREIGN KEY (`ProductId`) REFERENCES `Products` (`ProductId`)
);

-- Create the purchases table
CREATE TABLE `Purchases` (
    `PurchaseId` INT PRIMARY KEY AUTO_INCREMENT,
    `ProductId` INT NOT NULL,
    `ProductPrice` INT NOT NULL,
    `TotalQuantity` INT NOT NULL,
    `SellerName` VARCHAR(100) NOT NULL,
    `SellerNumber` INT NOT NULL,
    `SellerAddress` VARCHAR(255) NOT NULL,
    `SellerCity` VARCHAR(100) NOT NULL,
    `SellerState` VARCHAR(10) NOT NULL,
    `DateOfPurchase` VARCHAR(250) NOT NULL,
    `TotalPrice` INT NOT NULL,
    FOREIGN KEY (`ProductId`) REFERENCES `Products` (`ProductId`)
);

-- Create the sales table
CREATE TABLE `Sales` (
    `SalesId` INT PRIMARY KEY AUTO_INCREMENT,
    `ProductId` INT NOT NULL,
    `ProductPrice` INT NOT NULL,
    `TotalQuantity` INT NOT NULL,
    `BuyerName` VARCHAR(100) NOT NULL,
    `BuyerNumber` VARCHAR(15) NOT NULL,
    `BuyerAddress` VARCHAR(255) NOT NULL,
    `BuyerCity` VARCHAR(100) NOT NULL,
    `BuyerState` VARCHAR(10) NOT NULL,
    `DateOfSales` VARCHAR(200) NOT NULL,
    `TotalPrice` INT NOT NULL,
    FOREIGN KEY (`ProductId`) REFERENCES `Products` (`ProductId`)
);

-- Create the modules table
CREATE TABLE `Modules` (
    `Id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(255) NOT NULL
);

-- Create the permissions table
CREATE TABLE `Permissions` (
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `UserId` INT NOT NULL,
    `ModuleId` INT NOT NULL,
    `AddPermission` INT NOT NULL,
    `EditPermission` INT NOT NULL,
    `DeletePermission` INT NOT NULL,
    `ViewPermission` INT NOT NULL,
    FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`),
    FOREIGN KEY (`ModuleId`) REFERENCES `Modules` (`Id`)
);

-- Insert default modules
INSERT INTO `Modules` (`Name`)
VALUES
    ('Roles'),
    ('Users'),
    ('Products'),
    ('Purchases'),
    ('Sales'),
    ('Services');

-- Insert default permissions for Admin
INSERT INTO `Permissions` (
    `UserId`,
    `ModuleId`,
    `AddPermission`,
    `EditPermission`,
    `DeletePermission`,
    `ViewPermission`
)
VALUES
    (1, 1, 1, 1, 1, 1),
    (1, 2, 1, 1, 1, 1),
    (1, 3, 1, 1, 1, 1),
    (1, 4, 1, 1, 1, 1),
    (1, 5, 1, 1, 1, 1),
    (1, 6, 1, 1, 1, 1);
