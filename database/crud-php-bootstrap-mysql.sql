/*
  Author : Lucas Ferreira
  Email : lucasf1991@hotmail.com
  Repo : https://github.com/knov1991/crud-php-bootstrap-mysql
*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `sobrenome` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `telefone`) VALUES
(1, 'Aaaa', 'Aaaa', 'aaa@gmail.com', 1111111111),
(2, 'Bbbb', 'Bbbb', 'bbb@gmail.com', 2222222222),
(3, 'Cccc', 'Cccc', 'ccc@gmail.com', 3333333333),
(4, 'Dddd', 'Dddd', 'ddd@gmail.com', 4444444444),
(5, 'Eeee', 'Eeee', 'eee@gmail.com', 5555555555),
(6, 'Ffff', 'Ffff', 'fff@gmail.com', 6666666666);


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;