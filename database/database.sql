REATE DATABASE quan_ly_sach;

USE quan_ly_sach;

--Tao bang + ref:
CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author_name NVARCHAR(255) NOT NULL,
    book_numbers INT DEFAULT 0
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name NVARCHAR(255) NOT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title NVARCHAR(255) NOT NULL,
    author_id INT,
    category_id INT,
    publisher NVARCHAR(255),
    publish_year YEAR,
    quantity INT DEFAULT 1,
    FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE SET NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);
