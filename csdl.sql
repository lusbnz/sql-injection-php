SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

DROP TABLE IF EXISTS `username`;
CREATE TABLE IF NOT EXISTS `username` (
  `user` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `fname` VARCHAR(255) NOT NULL,
  `lname` VARCHAR(255) NOT NULL,
  `gender` VARCHAR(255) NOT NULL,
  `dob` DATE NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  `score` INT NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (user)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

INSERT INTO username (`user`, `password`, `fname`, `lname`, `gender`, `dob`, `country`, `score`, `email`) VALUES 
('admin', 'admin', 'Nguyen Van ', 'A', 'Nam', '1990-01-01', 'Viet Nam', 10, 'nguyenvana@gmail.com'),
('long', '123456', 'Nguyen Van ', 'B', 'Nam', '2003-01-01', 'Viet Nam', 9, 'nguyenvanb@gmail.com'),
('thai', 'abcdef', 'Hoang Van ', 'C', 'Nam', '2003-01-01', 'Viet Nam', 9, 'hoangvanc@gmail.com'),
('chinh', '112233', 'Tran Van ', 'D', 'Nam', '2003-01-01', 'Viet Nam', 1, 'tranvand@gmail.com');
