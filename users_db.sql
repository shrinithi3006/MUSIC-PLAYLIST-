-- Create the database
CREATE DATABASE music_app;

-- Use the music_app database
USE music_app;

-- Create the users table to store username and password
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Insert sample user data (hashed password for security)
INSERT INTO users (username, password) VALUES
('JohnDoe123', MD5('Password1')),  -- MD5 is used for this example, consider using bcrypt or Argon2 in production
('alice123', MD5('Hello1234'));