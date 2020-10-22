--
-- Creating Database
--
CREATE DATABASE 'bookstore';
--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(50) NOT NULL,
  `book_author` varchar(10000) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(50) NOT NULL,
    PRIMARY KEY(id)
)

--
-- Dumping data for table `inventory`
--
-- books values insertion in table
INSERT INTO `inventory` ( `book_name`, `book_author`, `price`, `quantity`, `image`) VALUES
('To Kill a Mockingbird', 'Harper Lee', 20, 9, 'images/image1.jpg'),
('One Hundred Years of Solitude', ' Gabriel García Márquez', 120, 5, 'images/image2.jpg'),
('The Great Gatsby', 'F. Scott Fitzgerald', 60, 10, 'images/image3.jpg'),
('A Passage to India', 'E.M. Forster', 75, 10, 'images/image4.jpg'),
('Invisible Man', 'Ralph Ellison', 80, 5, 'images/image5.jpg'),
('Don Quixote', 'Don Quixote', 110, 10, 'images/image6.jpg')

--
-- table `users`
--
-- user details in this table

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `payment` varchar(50) NOT NULL,
    PRIMARY KEY(id)
)
