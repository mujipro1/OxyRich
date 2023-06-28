INSERT INTO company (name, phone_no, account_no, NTN, address)
VALUES ('Oxyrich Pakistan', '0336-4448494', '17657901787903', '8238392-8', 'Insaf Plaza F-10 Markaz, Islamabad');

INSERT INTO users (username, password, roll, name, email, email_verified_at, remember_token)
VALUES
(1234567890123, 'admin123', 'admin', 'John Doe', 'admin@example.com', NULL, NULL),
(9876543210987, 'employee123', 'employee', 'Emma Smith', 'employee1@example.com', NULL, NULL),
(1111111111111, 'employee456', 'employee', 'Michael Johnson', 'employee2@example.com', NULL, NULL),
(2222222222222, 'customer1', 'customer', 'Alice Williams', 'alice@example.com', NULL, NULL),
(3333333333333, 'customer2', 'customer', 'Bob Davis', 'bob@example.com', NULL, NULL),
(4444444444444, 'customer3', 'customer', 'Eve Anderson', 'eve@example.com', NULL, NULL),
(5555555555555, 'customer4', 'customer', 'Oliver Wilson', 'oliver@example.com', NULL, NULL);


INSERT INTO admin (username, name, phone_no, email, address) VALUES
(1234567890123, 'John Doe', '0336-4448494', 'john@example.com', 'Insaf Plaza F-10 Markaz, Islamabad');

INSERT INTO employee (username, name, address, phone_no) VALUES
(9876543210987, 'Emma Smith', '123 Main Street, City', '9876543210'),
(1111111111111, 'Michael Johnson', '456 Elm Avenue, Town', '1234567890');

INSERT INTO locations (sector, subsector) VALUES
('D', '["D-1", "D-2", "D-3", "D-4"]'),
('E', '["E-1", "E-2", "E-3", "E-4", "E-5"]'),
('F', '["F-1", "F-2", "F-3", "F-4", "F-5", "F-6"]'),
('G', '["G-1", "G-2", "G-3", "G-4", "G-5", "G-6", "G-7", "G-8", "G-9", "G-10", "G-11", "G-12", "G-13"]'),
('H', '["H-1", "H-2", "H-3", "H-4", "H-5", "H-6", "H-7"]'),
('I', '["I-1", "I-2", "I-3", "I-4", "I-5"]');


INSERT INTO customer (username, name, address, email, sector, phone_no, bottle_price, no_of_bottles, per_bottle_security, no_of_dispenser, per_dispenser_security)
VALUES
(2222222222222, 'Alice Williams', '789 Oak Road, Village', 'alice@example.com', 'G', '9876543211', 10.00, 5, 2.50, 1, 10.00),
(3333333333333, 'Bob Davis', '321 Pine Lane, County', 'bob@example.com', 'F', '9876543212', 12.00, 3, 3.00, 2, 15.00),
(4444444444444, 'Eve Anderson', '654 Maple Street, City', 'eve@example.com', 'E', '9876543213', 15.00, 4, 4.00, 1, 10.00),
(5555555555555, 'Oliver Wilson', '987 Cherry Avenue, Town', 'oliver@example.com', 'G', '9876543214', 12.00, 6, 3.00, 2, 15.00);


-- Orders for customer with username 2222222222222
INSERT INTO orders (username, type, quantity, bottle_price, total_amount, bill_no)
VALUES
(2222222222222, '19 ltr', 2, 10.00, 20.00, 1),
(2222222222222, '6 ltr', 3, 5.00, 15.00, 2);

-- Orders for customer with username 3333333333333
INSERT INTO orders (username, type, quantity, bottle_price, total_amount, bill_no)
VALUES
(3333333333333, '19 ltr', 1, 10.00, 10.00, 3),
(3333333333333, '1.5 ltr', 4, 2.50, 10.00, 4);

-- Orders for customer with username 4444444444444
INSERT INTO orders (username, type, quantity, bottle_price, total_amount, bill_no)
VALUES
(4444444444444, '6 ltr', 2, 5.00, 10.00, 5),
(4444444444444, '0.5 ltr', 3, 1.00, 3.00, 6);

-- Orders for customer with username 5555555555555
INSERT INTO orders (username, type, quantity, bottle_price, total_amount, bill_no)
VALUES
(5555555555555, '19 ltr', 4, 10.00, 40.00, 7),
(5555555555555, '1.5 ltr', 2, 2.50, 5.00, 8);
