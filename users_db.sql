-- Insert sample user data (hashed password for security)
INSERT INTO users (username, password) VALUES
('JohnDoe123', MD5('Password1')),  -- MD5 is used for this example, consider using bcrypt or Argon2 in production
('alice123', MD5('Hello1234'));