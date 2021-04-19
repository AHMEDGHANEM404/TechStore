CREATE TABLE cats (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    create_at DATETIME NOT NULL DEFAULT NOW(),

    PRIMARY KEY(id)
);
CREATE TABLE products (
    id INT UNSIGNED AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    `desc` TEXT NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    pieces_no SMALLINT NOT NULL,
    img VARCHAR(255) NOT NULL,
    cat_id INT UNSIGNED,
    create_at DATETIME NOT NULL DEFAULT NOW(),

    PRIMARY KEY(id),
    FOREIGN KEY(cat_id) REFERENCES cats(id) ON DELETE SET NULL
);
CREATE TABLE orders (
     id INT UNSIGNED AUTO_INCREMENT,
     name VARCHAR(255) NOT NULL,
     phone VARCHAR(16) NOT NULL,
     email VARCHAR(255) NOT NULL,
     address VARCHAR (255) NOT NULL,
     status ENUM('pending' ,'approved','cannceled') NOT NULL DEFAULT 'pending',
     create_at DATETIME NOT NULL DEFAULT NOW(),

     PRIMARY KEY(id)
 );
CREATE  TABLE order_detalis (
     id INT UNSIGNED AUTO_INCREMENT,
     order_id INT UNSIGNED,
     products_id INT UNSIGNED,
     qty INT NOT NULL,

     PRIMARY KEY(id),
     FOREIGN KEY(order_id) REFERENCES orders(id) ON DELETE SET NULL,
     FOREIGN KEY(products_id) REFERENCES cats(id) ON DELETE SET NULL 
 );
CREATE TABLE admins (
    id INT UNSIGNED AUTO_INCREMENT ,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(16) NOT NULL,
    is_super ENUM('YES','NO') NOT NULL DEFAULT 'NO',
    create_at DATETIME NOT NULL DEFAULT NOW(),

    PRIMARY KEY(id)
 );