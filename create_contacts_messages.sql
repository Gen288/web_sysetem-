CREATE TABLE IF NOT EXISTS contacts_messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(255) NOT NULL,
  Email VARCHAR(255) NOT NULL,
  Subject VARCHAR(255) NOT NULL,
  Message TEXT NOT NULL
);
