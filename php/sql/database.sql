CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subscribe TINYINT(1) DEFAULT 0,
    age INT,
    gender VARCHAR(50),
    country VARCHAR(255)
);
