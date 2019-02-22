-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 21 fév. 2019 à 21:55
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_mvc_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `add_date` datetime DEFAULT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `id_post_fk` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_post_fk` (`id_post_fk`),
  KEY `id_user_fk` (`id_user_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `add_date`, `validated`, `id_post_fk`, `id_user_fk`) VALUES
(11, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 05:12:11', 1, 20, 23),
(12, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 06:17:11', 1, 20, 23),
(13, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 05:18:17', 1, 25, 23),
(14, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 06:15:14', 1, 25, 23),
(15, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 06:16:18', 1, 25, 23),
(16, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 06:13:13', 1, 25, 23),
(17, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 03:14:14', 1, 25, 23),
(18, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 05:12:09', 1, 25, 23),
(21, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-14 03:10:14', 0, 22, 37),
(22, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 14:29:18', 0, 21, 37),
(23, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 20:26:19', 0, 21, 37),
(24, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 13:09:36', 0, 21, 37),
(25, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.\r\n', '2019-02-16 13:43:49', 0, 25, 23),
(26, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-16 13:44:06', 0, 25, 23),
(27, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-19 20:01:23', 0, 26, 23),
(28, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-19 23:23:30', 0, 25, 23),
(29, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-19 23:34:51', 0, 25, 23),
(30, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 14:06:49', 0, 27, 37),
(31, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 14:07:01', 0, 27, 37),
(32, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 14:07:07', 0, 27, 37),
(34, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:14:45', 0, 26, 37),
(35, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:17:00', 0, 26, 37),
(36, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:20:06', 0, 26, 37),
(37, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:20:29', 0, 26, 37),
(38, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:22:08', 0, 26, 37),
(39, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:24:24', 0, 26, 37),
(40, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:29:30', 0, 26, 37),
(41, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:31:00', 0, 26, 37),
(42, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:34:24', 0, 26, 37),
(43, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra mauris vehicula mauris dignissim consequat. Etiam sit amet facilisis diam, a ultrices ligula. Praesent vel laoreet velit.', '2019-02-20 16:36:06', 0, 26, 37),
(48, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet elementum ligula, eget porta mi. Integer sit amet massa hendrerit, molestie neque eget, suscipit risus. Nunc diam libero, consectetur ut nibh nec, rhoncus egestas tellus. Quisque quis lacus eu purus vestibulum efficitur eu ut velit. Nunc suscipit, mauris at egestas tristique, dui urna eleifend massa, porttitor sodales augue elit nec neque. Curabitur eget augue vitae libero tincidunt elementum vitae at eros. Nunc eget pharetra justo. Pellentesque tristique \'', '2019-02-20 17:01:43', 0, 26, 37);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lead` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `add_date` datetime DEFAULT NULL,
  `id_user_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user_fk` (`id_user_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `image`, `lead`, `content`, `add_date`, `id_user_fk`) VALUES
(19, 'Titre 1', 'img1.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.\r\n\r\nAenean ac nisl lobortis, ullamcorper felis ut, aliquam lacus. Vivamus luctus felis vel auctor ultricies. Praesent facilisis nec massa quis pretium. Mauris hendrerit non sem vestibulum feugiat. Phasellus turpis odio, finibus nec tempor in, rhoncus sit amet metus. Sed sagittis nunc eu justo maximus porttitor. Nullam ac facilisis risus. Nunc vel pharetra ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam mollis dignissim nibh eu fermentum.', '2019-02-16 00:00:00', 23),
(20, 'Titre 2', 'img1.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.\r\n\r\nAenean ac nisl lobortis, ullamcorper felis ut, aliquam lacus. Vivamus luctus felis vel auctor ultricies. Praesent facilisis nec massa quis pretium. Mauris hendrerit non sem vestibulum feugiat. Phasellus turpis odio, finibus nec tempor in, rhoncus sit amet metus. Sed sagittis nunc eu justo maximus porttitor. Nullam ac facilisis risus. Nunc vel pharetra ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam mollis dignissim nibh eu fermentum.', '2019-02-16 00:00:00', 23),
(21, 'Titre 3', 'img1.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.\r\n\r\nAenean ac nisl lobortis, ullamcorper felis ut, aliquam lacus. Vivamus luctus felis vel auctor ultricies. Praesent facilisis nec massa quis pretium. Mauris hendrerit non sem vestibulum feugiat. Phasellus turpis odio, finibus nec tempor in, rhoncus sit amet metus. Sed sagittis nunc eu justo maximus porttitor. Nullam ac facilisis risus. Nunc vel pharetra ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam mollis dignissim nibh eu fermentum.', '2019-02-16 00:00:00', 23),
(22, 'Titre 4', 'img1.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.\r\n\r\nAenean ac nisl lobortis, ullamcorper felis ut, aliquam lacus. Vivamus luctus felis vel auctor ultricies. Praesent facilisis nec massa quis pretium. Mauris hendrerit non sem vestibulum feugiat. Phasellus turpis odio, finibus nec tempor in, rhoncus sit amet metus. Sed sagittis nunc eu justo maximus porttitor. Nullam ac facilisis risus. Nunc vel pharetra ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam mollis dignissim nibh eu fermentum.', '2019-02-16 00:00:00', 23),
(25, 'Titre 5', 'img6.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.\r\n\r\nAenean ac nisl lobortis, ullamcorper felis ut, aliquam lacus. Vivamus luctus felis vel auctor ultricies. Praesent facilisis nec massa quis pretium. Mauris hendrerit non sem vestibulum feugiat. Phasellus turpis odio, finibus nec tempor in, rhoncus sit amet metus. Sed sagittis nunc eu justo maximus porttitor. Nullam ac facilisis risus. Nunc vel pharetra ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam mollis dignissim nibh eu fermentum.', '2019-02-16 00:00:00', 23),
(26, 'Titre 6', 'img6.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.\r\n\r\nAenean ac nisl lobortis, ullamcorper felis ut, aliquam lacus. Vivamus luctus felis vel auctor ultricies. Praesent facilisis nec massa quis pretium. Mauris hendrerit non sem vestibulum feugiat. Phasellus turpis odio, finibus nec tempor in, rhoncus sit amet metus. Sed sagittis nunc eu justo maximus porttitor. Nullam ac facilisis risus. Nunc vel pharetra ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam mollis dignissim nibh eu fermentum.', '2019-02-16 00:00:00', 23),
(27, 'Titre 7', 'default.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.\r\n\r\nAenean ac nisl lobortis, ullamcorper felis ut, aliquam lacus. Vivamus luctus felis vel auctor ultricies. Praesent facilisis nec massa quis pretium. Mauris hendrerit non sem vestibulum feugiat. Phasellus turpis odio, finibus nec tempor in, rhoncus sit amet metus. Sed sagittis nunc eu justo maximus porttitor. Nullam ac facilisis risus. Nunc vel pharetra ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam mollis dignissim nibh eu fermentum.', '2019-02-16 13:46:02', 23),
(28, 'Titre 8', 'default.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.\r\n\r\nAenean ac nisl lobortis, ullamcorper felis ut, aliquam lacus. Vivamus luctus felis vel auctor ultricies. Praesent facilisis nec massa quis pretium. Mauris hendrerit non sem vestibulum feugiat. Phasellus turpis odio, finibus nec tempor in, rhoncus sit amet metus. Sed sagittis nunc eu justo maximus porttitor. Nullam ac facilisis risus. Nunc vel pharetra ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam mollis dignissim nibh eu fermentum.', '2019-02-21 15:13:12', 23),
(29, 'TITRE 9', 'default.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.', '2019-02-21 22:26:52', 23),
(30, 'TITRE 10', 'default.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in tristique dolor. Mauris eget consequat eros. Mauris et lectus nibh. Cras feugiat velit eget nibh malesuada, ac mollis arcu condimentum. Integer orci enim, sollicitudin ut commodo et, varius id odio. Donec pulvinar dolor ligula, varius aliquet purus tincidunt vel. In scelerisque lorem nunc, et consequat urna tempus quis. Donec ullamcorper augue nisl, eget ornare ex laoreet a.\r\n\r\nInteger blandit ligula id tortor lacinia, eget maximus neque aliquet. Vestibulum pulvinar velit ac accumsan suscipit. Aliquam erat volutpat. Praesent placerat erat congue neque ullamcorper scelerisque. Donec scelerisque diam non justo congue ornare. Phasellus ornare sapien nisl, venenatis pretium massa congue sit amet. Sed sed ligula vel justo placerat rutrum eu eget nulla. Vivamus ante ligula, cursus a leo sed, molestie porttitor dolor. Duis lacinia nulla dui, in ultrices odio pellentesque id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae venenatis arcu, ac luctus lorem.', '2019-02-21 22:27:20', 23);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '0.jpg',
  `website` varchar(255) NOT NULL DEFAULT 'Votre website',
  `description` varchar(800) NOT NULL DEFAULT 'Votre parcours en quelques ligne.',
  `inscription_date` datetime DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_token` varchar(128) DEFAULT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `avatar`, `website`, `description`, `inscription_date`, `activated`, `confirmation_token`, `role`) VALUES
(23, 'Admin', 'artos.armagnac@gmail.com', '$2y$10$xlkQDvZB.VfJ4aFkTtEw8eOzwtwpi7bL62hrtlPlrvK.EZr.9nBjS', '0.jpg', 'jeandescorps.fr', 'Votre parcours en quelques lignes.', '2019-02-01 00:00:00', 1, NULL, 'admin'),
(37, 'User', 'jean.descorps@laposte.net', '$2y$10$hWdGIlm4K3m7ifjEORHIa.SAlrz9h9fXBWh8vgkLAJFTYzcQCYspq', 'uvtq3yt8.jpg', 'test', 'Votre parcours en quelques ligne.', '2019-02-07 00:00:00', 1, NULL, 'user'),
(39, 'blabla', 'fzpefez@fezfz.fr', '$2y$10$Plv5LtN1VVrwNqNA3rM3se.qIcYdus6bO3GMl543V15otle4boT5m', '0.jpg', 'Votre website', 'Votre parcours en quelques ligne.', '2019-02-18 18:45:45', 0, 'db3167d098841903245abbdbeb57087aa08073314988e783909d9535365143a1e7f3252889eb6b25d4fc05d52fc2ba2cf0dcc0e5acca58830a34fbfcd0e4ecf6', 'user'),
(42, 'fredd', 'blabla@gmail.com', '$2y$10$AfgKsSeXQjW1WRlnhJpN1.EmzOTsIQHWYnuKbASYkj1Q8.2SxBI1K', '0.jpg', 'Votre website', 'Votre parcours en quelques ligne.', '2019-02-19 20:46:10', 0, '85d5e08f1309141f90bc773eedfee2fd94870c237588538d9da70c663df1942a4d0565bddd9ed8790617c28d8cd4a982374a7da5faf0fef7a22c48f697c4d20e', 'user'),
(43, 'gtyh', 'jazno08@hotmail.com', '$2y$10$PWrbQTPA4IJv/S/4rJ2stuBZPDxvCx5eGTCyodEl3JcId7PiVo.kC', '0.jpg', 'Votre website', 'Votre parcours en quelques ligne.', '2019-02-19 21:10:12', 0, 'd63d5fadd8fbda6b4c26111a5ccbfd534701c2c3cd94f09b970a116eb3e4492293bcf173bb933f64f15d474b52ae333b7a3ee6279d7151a6eb376e4bef86032b', 'user'),
(46, 'dearf', 'kiol@loki.fr', '$2y$10$8nHl7A9HAu9W3Ou4aCT87.Oy/pDm2C7fQLr2y3UU8i/Gwxk23//Wq', '0.jpg', 'Votre website', 'Votre parcours en quelques ligne.', '2019-02-19 21:25:23', 0, '0200784d13c88401c322730a4433efce47c7b15dc03730bce5e11c6a1a6067b960441b650490e0d1cc961cd83e88f699ffcb9292985e7c800d6400b73b39614b', 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_post_fk`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
