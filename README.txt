The webside can be accessed on: http://juniortest-ilja-kozirevs.000webhostapp.com/

The SQl statement for DataBase table creation:

CREATE TABLE IF NOT EXISTS `disks` (
  `SKU` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Size` int(11) NOT NULL,
  UNIQUE KEY `SKU` (`SKU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

CREATE TABLE IF NOT EXISTS `books` (
  `SKU` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Weight` float NOT NULL,
  UNIQUE KEY `SKU` (`SKU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

CREATE TABLE IF NOT EXISTS `furniture` (
  `SKU` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Height` int(11) NOT NULL,
  `Width` int(11) NOT NULL,
  `Length` int(11) NOT NULL,
  UNIQUE KEY `SKU` (`SKU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `is_Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
COMMIT;