
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Tashi', 'tashi@gmail.com', 47000),
(2, 'Ronaldo', 'ronaldo@gmail.com', 30000),
(3, 'Rahul Raj', 'rahul@gmail.com', 40000),
(4, 'Harsha', 'harsha@gmail.com', 30000),
(5, 'Vinay', 'Vinay@gmail.com', 40000),
(6, 'Dolma', 'dolma@gmail.com', 33000),
(7, 'Jorden ', 'jorden@gmail.com', 50000),
(8, 'Vijai Surya', 'vijai@gmail.com', 40000),
(9, 'Tenzin', 'tenzin@gmail.com', 50000),
(10, 'Akash Jain', 'akash@gmail.com', 50000);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
