CREATE TABLE `player` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nomecognome` varchar(100) NOT NULL,
  `datanascita` int(10) DEFAULT NULL,
  `altezza` int(5) DEFAULT NULL,
  `nazionalita` char(2) DEFAULT NULL,
  `nick` varchar(255) DEFAULT NULL,
  `squadra` varchar(100) DEFAULT NULL,
  `ruolo` varchar(100) DEFAULT NULL,
  `numeromaglia` int(4) unsigned DEFAULT NULL,
  `urlinstagram` varchar(255) DEFAULT NULL,
  `urlfacebook` varchar(255) DEFAULT NULL,
  `urltwitter` varchar(255) DEFAULT NULL,
  `societa` varchar(255) DEFAULT NULL,
  `annoingresso` int(4) DEFAULT NULL,
  `note` text,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `incarico` varchar(20) DEFAULT NULL,
  `visibile` varchar(255) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `scadenzacertificato` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `player_role` (
  `role_id` int(10) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  `role_type` varchar(20) DEFAULT NULL,
  `role_desc` text,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `player_team` (
  `team_id` int(10) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) DEFAULT NULL,
  `team_desc` text,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `player_season` (
  `season_id` int(10) NOT NULL AUTO_INCREMENT,
  `season_name` varchar(100) DEFAULT NULL,
  `season_actual` int(1) unsigned NOT NULL DEFAULT '1',  
  `season_order` int(2) NOT NULL,
  `season_desc` text,
  PRIMARY KEY (`season_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `player_teaminseason` (
  `seasonteam_id` int(10) NOT NULL AUTO_INCREMENT,
  `id_season` varchar(100) DEFAULT NULL,
  `id_team` int(10) NOT NULL,     
  `seasonteam_order` int(2) NOT NULL,
  PRIMARY KEY (`seasonteam_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `player_inseasonteam` (
  `playerteam_id` int(10) NOT NULL AUTO_INCREMENT,
  `id_seasonteam` varchar(100) DEFAULT NULL,
  `id_player` int(10) NOT NULL,     
  `playerteam_order` int(2) NOT NULL,
  PRIMARY KEY (`playerteam_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;