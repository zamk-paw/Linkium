-- Create database (optional if Docker already creates it)
CREATE DATABASE IF NOT EXISTS linkium CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE linkium;

-- -------------------------------
-- USERS (Linkium accounts)
-- -------------------------------
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  email VARCHAR(255) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- -------------------------------
-- CONTACTS
-- -------------------------------
CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  nickname VARCHAR(100),
  description TEXT,
  tags TEXT, -- comma separated or JSON string of skills
  email_personal VARCHAR(255),
  email_professional VARCHAR(255),
  phone_personal VARCHAR(50),
  phone_professional VARCHAR(50),
  linkedin_url VARCHAR(255),
  github_url VARCHAR(255),
  company VARCHAR(255),
  position VARCHAR(255),
  address VARCHAR(255),
  birthday DATE,
  website_url VARCHAR(255),
  notes TEXT,
  source VARCHAR(100),
  relationship ENUM('pro','perso','other') DEFAULT 'pro',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- -------------------------------
-- ENTITIES (hierarchical path)
-- -------------------------------
CREATE TABLE IF NOT EXISTS entities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  parent_id INT DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (parent_id) REFERENCES entities(id) ON DELETE CASCADE
);

-- -------------------------------
-- CONTACT ↔ ENTITY (many-to-many)
-- -------------------------------
CREATE TABLE IF NOT EXISTS contact_entities (
  contact_id INT NOT NULL,
  entity_id INT NOT NULL,
  PRIMARY KEY (contact_id, entity_id),
  FOREIGN KEY (contact_id) REFERENCES contacts(id) ON DELETE CASCADE,
  FOREIGN KEY (entity_id) REFERENCES entities(id) ON DELETE CASCADE
);
