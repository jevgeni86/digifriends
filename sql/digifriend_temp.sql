CREATE TEMPORARY TABLE `digifriend_temp` (
  `num` int(11) NOT NULL,
  `digi` int(11) NOT NULL,
  KEY `num_ind` (`num`)
) ENGINE=Memory;
