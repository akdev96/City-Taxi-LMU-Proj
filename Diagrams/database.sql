-- Create the database
CREATE DATABASE IF NOT EXISTS RideSharingApp;
USE RideSharingApp;

-- Create User table (Superclass for Rider and Driver)
CREATE TABLE User (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phoneNumber VARCHAR(20),
    paymentInfo VARCHAR(255)
);

-- Create Rider table (inherits from User)
CREATE TABLE Rider (
    riderId INT PRIMARY KEY,
    rating FLOAT,
    FOREIGN KEY (riderId) REFERENCES User(userId) ON DELETE CASCADE
);

-- Create Driver table (inherits from User)
CREATE TABLE Driver (
    driverId INT PRIMARY KEY,
    licenseNumber VARCHAR(50),
    vehicleDetails VARCHAR(255),
    rating FLOAT,
    FOREIGN KEY (driverId) REFERENCES User(userId) ON DELETE CASCADE
);

-- Create Ride table
CREATE TABLE Ride (
    rideId INT AUTO_INCREMENT PRIMARY KEY,
    riderId INT,
    driverId INT,
    startLocationId INT,
    endLocationId INT,
    fare FLOAT,
    status VARCHAR(50),
    FOREIGN KEY (riderId) REFERENCES Rider(riderId) ON DELETE SET NULL,
    FOREIGN KEY (driverId) REFERENCES Driver(driverId) ON DELETE SET NULL,
    FOREIGN KEY (startLocationId) REFERENCES Location(locationId) ON DELETE CASCADE,
    FOREIGN KEY (endLocationId) REFERENCES Location(locationId) ON DELETE CASCADE
);

-- Create RideRequest table
CREATE TABLE RideRequest (
    requestId INT AUTO_INCREMENT PRIMARY KEY,
    riderId INT,
    pickupLocationId INT,
    dropOffLocationId INT,
    requestStatus VARCHAR(50),
    FOREIGN KEY (riderId) REFERENCES Rider(riderId) ON DELETE CASCADE,
    FOREIGN KEY (pickupLocationId) REFERENCES Location(locationId) ON DELETE CASCADE,
    FOREIGN KEY (dropOffLocationId) REFERENCES Location(locationId) ON DELETE CASCADE
);

-- Create Payment table
CREATE TABLE Payment (
    paymentId INT AUTO_INCREMENT PRIMARY KEY,
    rideId INT,
    riderId INT,
    paymentMethod VARCHAR(50),
    amount FLOAT,
    paymentStatus VARCHAR(50),
    FOREIGN KEY (rideId) REFERENCES Ride(rideId) ON DELETE CASCADE,
    FOREIGN KEY (riderId) REFERENCES Rider(riderId) ON DELETE CASCADE
);

-- Create Location table
CREATE TABLE Location (
    locationId INT AUTO_INCREMENT PRIMARY KEY,
    latitude DOUBLE NOT NULL,
    longitude DOUBLE NOT NULL,
    address VARCHAR(255) NOT NULL
);
