CREATE TABLE IF NOT EXISTS `sessions` (
    `id` varchar(32) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT NULL,
    `data` mediumtext,
    PRIMARY KEY (`id`),
    KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;