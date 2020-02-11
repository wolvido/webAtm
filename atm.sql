
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `pass` text NOT NULL,
  `bankcode` text NOT NULL,
  `lt` text NOT NULL,
  `amt` text NOT NULL,
  `g_amt` int(11) NOT NULL,
  `reg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `user` (`id`, `name`, `pass`, `bankcode`, `lt`, `amt`, `g_amt`, `reg`) VALUES
(9, 'admin', 'admin', 'admin', '30/Feb/30 10:19 am', '20000', 20000, 'yes'),
(10, 'Winzyl', 'Winzyl', 'Winzyl', '30/Feb/20 06:56 am', '38000', 40000, 'yes'),
(34, 'Denie', '12345', 'Denie', '', '20000', 20000, 'yes');




ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);



ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
