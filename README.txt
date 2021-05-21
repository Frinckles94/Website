The webside can be accessed on: http://juniortest-ilja-kozirevs.000webhostapp.com/

The SQl statement for DataBase table creation:

CREATE TABLE IF NOT EXISTS `products` (
  `SKU` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Size` int(11) DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL,
  `Height` int(11) DEFAULT NULL,
  `Width` int(11) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL,
  UNIQUE KEY `SKU` (`SKU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;