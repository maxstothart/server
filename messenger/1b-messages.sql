CREATE TABLE `messages` (
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `date_send` datetime NOT NULL DEFAULT current_timestamp(),
  `date_read` datetime DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `messages`
  ADD PRIMARY KEY (`user_from`,`user_to`,`date_send`),
  ADD KEY `date_read` (`date_read`);
