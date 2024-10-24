CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doc_no VARCHAR(255) NOT NULL,
    product_code VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_description TEXT,
    unit_price DECIMAL(10, 2) NOT NULL,
    unit_price_aft_gst DECIMAL(10, 2),
    quantity INT NOT NULL,
    remark TEXT,
    created_by VARCHAR(255) NOT NULL,
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    availability ENUM ('IN-STOCK','OUT-OF-STOCK','PRE-ORDER') NOT NULL DEFAULT 'IN-STOCK' 
    company_id INTEGER(2O)
    type VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doc_no VARCHAR(255) NOT NULL,
    remark TEXT,
    created_by VARCHAR(255) NOT NULL,
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    type VARCHAR(255)
)