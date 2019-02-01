-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 fév. 2019 à 15:18
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sql8614_listephp`
--

--
-- Déchargement des données de la table `linkphp`
--

INSERT INTO `linkphp` (`idlinkphp`, `thetitle`, `thedesc`, `theurl`) VALUES
(4, 'Balises PHP', 'Les balises PHP | Manuel de  www.php.net', 'http://php.net/manual/fr/language.basic-syntax.phptags.php'),
(5, 'Les commentaires', 'Les commentaires PHP | Manuel de www.php.net', 'http://php.net/manual/fr/language.basic-syntax.comments.php'),
(6, 'echo', 'Echo PHP | Manuel de www.php.net', 'http://php.net/manual/fr/function.echo.php'),
(7, 'echo()', 'PHP echo() Function | w3schools (en)', 'https://www.w3schools.com/php/func_string_echo.asp'),
(8, 'Commenter en PHP', 'Comment commenter en PHP | fr.wikihow.com', 'https://fr.wikihow.com/commenter-en-PHP'),
(9, 'print', 'print | Manuel de www.php.net', 'http://php.net/manual/fr/function.print.php'),
(10, 'print()', 'PHP print()  | w3schools (en)', 'https://www.w3schools.com/php/func_string_print.asp'),
(11, 'Summary of PHP echo shortcut tag <?=', 'echo shortcut tag <?= | Leehblue (en)', 'https://leehblue.com/summary-php-echo-shortcut-tag/');

--
-- Déchargement des données de la table `userlist`
--

INSERT INTO `userlist` (`iduserlist`, `thelogin`, `thepwd`, `thename`, `themail`) VALUES
(1, 'michael', 'bb5a52f42f9c9261ed4361f59422a1e30036e7c32b270c8807a419feca605023', 'Michaël J. Pitz', 'michael.pitz@cf2m.be');


--
-- Déchargement des données de la table `listephp`
--

INSERT INTO `listephp` (`idlistephp`, `thetitle`, `thedesc`, `thetext`, `thedate`, `userlist_iduserlist`) VALUES
(6, '<?php ?>', 'ouverture et fermeture du script php', 'Lorsque PHP traite un fichier, il cherche les balises d\'ouverture et de fermeture (<?php et ?>) qui délimitent le code qu\'il doit interpréter. De cette manière, cela permet à PHP d\'être intégré dans toutes sortes de documents, car tout ce qui se trouve en dehors des balises ouvrantes / fermantes de PHP est ignoré.', '2019-01-31 08:47:00', 1),
(7, '// ou /* */ ou #', 'Les commentaires sur une ou plusieurs lignes', 'Commentaire sur une ligne:\r\n\r\n// commentaire sur une ligne\r\n\r\nou\r\n\r\n# autre commentaire sur une ligne\r\n\r\nCommentaire sur plusieurs lignes:\r\n\r\n/*\r\ncommentaire sur\r\nplusieurs\r\nlignes, doit absolument \r\nêtre fermé !\r\n*/', '2019-01-31 09:38:00', 1),
(8, 'echo', 'echo — Affiche une chaîne de caractères', 'Affiche une chaîne de caractères\r\n\r\nAffiche tous les paramètres. Aucune nouvelle ligne n\'est ajoutée.\r\n\r\necho n\'est pas vraiment une fonction (c\'est techniquement une structure du langage), cela fait que vous n\'êtes pas obligé d\'utiliser des parenthèses. echo (contrairement à d\'autres structures de langage) ne se comporte pas comme une fonction, il ne peut donc pas être utilisé dans le contexte d\'une fonction. De même, si vous voulez passer plusieurs paramètres à echo, les paramètres ne doivent pas être entourés de parenthèses.\r\n\r\n<?php\r\necho \"bonjour à tous\";\r\n?>\r\n\r\nPour les chaînes de caractères, il faut échapper les doubles et simples guillemets  avec l\' antislash.\r\nEntre les \' \' les variables ne sont pas interprétées, mais elles le sont entre \" \"\r\n\r\n<?php\r\n$str = \"coucou\";\r\necho \'$str vous !\' // affiche => $str vous !\r\necho \"$str vous !\" // affiche => coucou vous !\r\n?>', '2019-01-31 09:45:00', 1),
(9, 'print', 'print — Affiche une chaîne de caractères', 'print n\'est pas vraiment une fonction (c\'est techniquement une structure de langage). Cela fait que vous n\'êtes pas obligé d\'utiliser des parenthèses.\r\n\r\nLa plus grosse différence avec echo est que print n\'accepte qu\'un seul argument et retourne toujours 1.\r\n\r\n<?php\r\nprint(\"Bonjour le monde\");\r\n\r\nprint \"print() fonctionne aussi sans les parenthèses.\";\r\n?>\r\n\r\nAttention à la concaténation, on peut utiliser le \".\" comme avec echo, mais pas la \",\"!', '2019-01-31 10:48:00', 1),
(10, '<?= ?>', 'balise ouvrante dite \"courte\" pour le echo en PHP', 'Très utilisé dans les systèmes de templates PHP, il est devenu courant depuis la version 5.4.0 de celui-ci car il est activé par défaut.\r\nLa balise <?= est toujours disponible indépendamment de la configuration de l\'option INI short_open_tag.\r\n\r\n<p><?=$var?></p>\r\n\r\nElle permet de séparer complètement le code PHP du code HTML', '2019-02-01 15:01:00', 1);

--
-- Déchargement des données de la table `listephp_has_linkphp`
--

INSERT INTO `listephp_has_linkphp` (`listephp_idlistephp`, `linkphp_idlinkphp`) VALUES
(6, 4),
(10, 4),
(7, 5),
(8, 6),
(8, 7),
(7, 8),
(9, 9),
(9, 10),
(10, 11);

SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
