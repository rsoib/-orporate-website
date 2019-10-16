-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2019 г., 23:07
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `corporate`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `art_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `art_text` text COLLATE utf8_unicode_ci NOT NULL,
  `art_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `art_alias` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `art_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `art_title`, `art_text`, `art_desc`, `art_alias`, `art_img`, `user_id`, `category_id`, `created_at`, `updated_at`, `meta_desc`, `keywords`) VALUES
(1, 'This is the title of the first article. Enjoy it.', '<p>Fusce nec accumsan eros. Aenean ac orci a magna vestibulum posuere quis nec nisi. Maecenas rutrum vehicula condimentum. Donec volutpat nisl ac mauris consectetur gravida.</p>\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel vulputate nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nIn facilisis ornare arcu, sodales facilisis neque blandit ac. Ut blandit ipsum quis arcu adipiscing sit amet semper sem feugiat. Nam sed dapibus arcu. Nullam eleifend molestie lectus. Nullam nec risus purus.\r\n\r\n\r\nFusce rutrum lectus id nibh ullamcorper aliquet. Pellentesque pretium mauris et augue fringilla non bibendum turpis iaculis. Donec sit amet nunc lorem. Sed fringilla vehicula est at pellentesque. Aenean imperdiet elementum arcu id facilisis. Mauris sed leo eros.\r\n\r\nDuis nulla purus, malesuada in gravida sed, viverra at elit. Praesent nec purus sem, non imperdiet quam. Praesent tincidunt tortor eu libero scelerisque quis consequat justo elementum. Maecenas aliquet facilisis ipsum, commodo eleifend odio ultrices et. Maecenas arcu arcu, luctus a laoreet et, fermentum vel lectus. Cras consectetur ipsum venenatis ligula aliquam hendrerit. Suspendisse rhoncus hendrerit fermentum. Ut eget rhoncus purus.\r\n\r\nCras a tellus eu justo lobortis tristique et nec mauris. Etiam tincidunt tellus ut odio elementum adipiscing. Maecenas cursus dolor sit amet leo elementum ut semper velit lobortis. Pellentesque posue</p>', '<p>Fusce nec accumsan eros. Aenean ac orci a magna vestibulum posuere quis nec nisi. Maecenas rutrum vehicula condimentum. Donec volutpat nisl a', 'article-1', '{\"mini\":\"yAeWDukz_mini.jpg\",\"max\":\"yAeWDukz_max.jpg\",\"path\":\"yAeWDukz.jpg\"}', 1, 2, '2019-04-04 21:00:00', '2019-06-14 14:10:10', 'Описание', 'ключевое слово'),
(9, 'Новый материал', '<p>польный текст</p>', '<p>текст</p>', 'novyj-material', '{\"mini\":\"Fl5TWX17_mini.jpg\",\"max\":\"Fl5TWX17_max.jpg\",\"path\":\"Fl5TWX17.jpg\"}', 1, 2, '2019-06-12 17:08:13', '2019-06-14 14:10:51', 'текст', 'не важно'),
(16, 'Приветasd', '<p>sdfsdf</p>', '<p>dsfsdf</p>', 'privetasd', '{\"mini\":\"ue1RXasV_mini.jpg\",\"max\":\"ue1RXasV_max.jpg\",\"path\":\"ue1RXasV.jpg\"}', 1, 2, '2019-06-14 13:44:32', '2019-06-14 13:44:32', 'dsdfsdfsdfsf', 'asdasdasd'),
(3, 'This is the title of the first article. Enjoy it 3', '<p>Fusce nec accumsan eros. Aenean ac orci a magna vestibulum posuere quis nec nisi. Maecenas rutrum vehicula condimentum. Donec volutpat nisl ac mauris consectetur gravida.</p>\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel vulputate nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nIn facilisis ornare arcu, sodales facilisis neque blandit ac. Ut blandit ipsum quis arcu adipiscing sit amet semper sem feugiat. Nam sed dapibus arcu. Nullam eleifend molestie lectus. Nullam nec risus purus.\r\n\r\n\r\nFusce rutrum lectus id nibh ullamcorper aliquet. Pellentesque pretium mauris et augue fringilla non bibendum turpis iaculis. Donec sit amet nunc lorem. Sed fringilla vehicula est at pellentesque. Aenean imperdiet elementum arcu id facilisis. Mauris sed leo eros.\r\n\r\nDuis nulla purus, malesuada in gravida sed, viverra at elit. Praesent nec purus sem, non imperdiet quam. Praesent tincidunt tortor eu libero scelerisque quis consequat justo elementum. Maecenas aliquet facilisis ipsum, commodo eleifend odio ultrices et. Maecenas arcu arcu, luctus a laoreet et, fermentum vel lectus. Cras consectetur ipsum venenatis ligula aliquam hendrerit. Suspendisse rhoncus hendrerit fermentum. Ut eget rhoncus purus.\r\n\r\nCras a tellus eu justo lobortis tristique et nec mauris. Etiam tincidunt tellus ut odio elementum adipiscing. Maecenas cursus dolor sit amet leo elementum ut semper velit lobortis. Pellentesque posue</p>', '<p>Fusce nec accumsan eros. Aenean ac orci a magna vestibulum posuere quis nec nisi. Maecenas rutrum vehicula condimentum. Donec volutpat nisl ac mauris consectetur gravida.</p>\r\n<p>', 'privet', '{\"mini\":\"003-55x55.jpg\",\"max\":\"003-816x282.jpg\",\"path\":\"0081-700x354.jpg\"}', 1, 3, '2019-04-05 21:00:00', NULL, '', ''),
(17, 'Мой новый материал', '<p>Тест</p>', '<p>Тест</p>', 'moj-novyj-material', '{\"mini\":\"OAiENWlX_mini.jpg\",\"max\":\"OAiENWlX_max.jpg\",\"path\":\"OAiENWlX.jpg\"}', 1, 2, '2019-06-14 13:46:00', '2019-06-14 13:46:00', 'Тест', 'Тестовый');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cat_alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `cat_parent_id`, `cat_alias`, `created_at`, `updated_at`) VALUES
(1, 'Блог', '0', 'blog', NULL, NULL),
(2, 'Компьютеры', '1', 'computers', NULL, NULL),
(3, 'Интересное', '1', 'interesting', NULL, NULL),
(4, 'Советы', '1', 'soveti', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `com_id` bigint(20) UNSIGNED NOT NULL,
  `com_text` text COLLATE utf8_unicode_ci NOT NULL,
  `com_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`com_id`, `com_text`, `com_name`, `com_email`, `com_site`, `article_id`, `user_id`, `created_at`, `updated_at`, `parent_id`) VALUES
(1, 'Hello all', '', '', '', 1, 1, '2019-04-30 21:00:00', NULL, 0),
(2, 'This is very good!!!', '', '', 'it-madad.tj', 1, 1, '2019-04-22 21:00:00', '2019-04-14 21:00:00', 0),
(3, 'Hello Comment 1', '', '', '', 1, 1, NULL, NULL, 1),
(4, 'Hello comment 2', '', '', '', 1, 1, NULL, NULL, 2),
(9, '', '', '', '', 1, NULL, '2019-05-10 18:35:20', '2019-05-10 18:35:20', 0),
(6, 'Dsdfsdfsd', '', '', '', 3, 2, NULL, NULL, 0),
(7, 'asdfasdf', 'sdfsdf', 'sdfdsfsd', '', 3, NULL, NULL, NULL, 0),
(8, 'sfasdfasdfads', 'user', 'user@masdas.ada', 'asdasda', 1, NULL, NULL, NULL, 3),
(10, '', '', '', '', 1, NULL, '2019-05-10 18:36:01', '2019-05-10 18:36:01', 0),
(65, 'sdfdfsdfsdfsdf', 'wefwf', 'wef', 'asdasd', 3, NULL, '2019-05-14 17:37:47', '2019-05-14 17:37:47', 0),
(64, 'werwerewr', 'wefwf', 'wef', 'asdasd', 3, NULL, '2019-05-14 17:36:51', '2019-05-14 17:36:51', 0),
(63, 'QWEqweqwe', 'wefwf', 'wef', 'asdasd', 3, NULL, '2019-05-14 17:25:15', '2019-05-14 17:25:15', 0),
(62, 'asdasd', 'wefwf', 'wef', 'asdasd', 3, NULL, '2019-05-14 17:19:00', '2019-05-14 17:19:00', 0),
(70, 'asdasdasdasdasd', '', '', '', 1, 1, '2019-06-27 15:00:19', '2019-06-27 15:00:19', 0),
(71, 'asdasdasdasdasd', '', '', '', 1, 1, '2019-06-27 15:00:44', '2019-06-27 15:00:44', 0),
(72, 'asdasdasdasdasd', '', '', '', 1, 1, '2019-06-27 15:00:46', '2019-06-27 15:00:46', 0),
(73, 'asdasdasd', '', '', '', 1, 1, '2019-06-27 15:00:58', '2019-06-27 15:00:58', 0),
(74, 'asdasdasd', '', '', '', 1, 1, '2019-06-27 15:09:18', '2019-06-27 15:09:18', 0),
(75, 'asdasdasdasd', '', '', '', 1, 1, '2019-06-27 15:21:48', '2019-06-27 15:21:48', 0),
(76, 'sdfsdfsdfsdfsdf', '', '', '', 1, 1, '2019-06-27 15:26:51', '2019-06-27 15:26:51', 0),
(77, 'test test', '', '', '', 1, 1, '2019-06-27 15:27:31', '2019-06-27 15:27:31', 0),
(78, 'test test', '', '', '', 1, 1, '2019-06-27 15:27:31', '2019-06-27 15:27:31', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `filters`
--

CREATE TABLE `filters` (
  `fil_id` bigint(20) UNSIGNED NOT NULL,
  `fil_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fil_alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `filters`
--

INSERT INTO `filters` (`fil_id`, `fil_title`, `fil_alias`, `created_at`, `updated_at`) VALUES
(1, 'Brand Identity', 'brand-identity', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `created_at`, `updated_at`, `title`, `path`, `parent`) VALUES
(1, NULL, NULL, 'Главная', 'http://corporate/', 0),
(2, NULL, NULL, 'Блог', 'http://corporate/articles', 0),
(3, NULL, NULL, 'Компьютеры', 'http://corporate/articles/cat/computers', 2),
(4, NULL, NULL, 'Интересное', 'http://corporate/articles/cat/interesting', 2),
(5, NULL, NULL, 'Советы', 'http://corporate/articles/cat/soveti', 2),
(6, NULL, NULL, 'Портфолио', 'http://corporate/portfolios', 0),
(7, NULL, NULL, 'Контакты', 'http://corporate/contacts', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(47, '2014_10_12_000000_create_users_table', 1),
(48, '2014_10_12_100000_create_password_resets_table', 1),
(49, '2019_03_21_185813_create_articles_table', 1),
(50, '2019_03_21_190020_create_portfolios_table', 1),
(51, '2019_03_21_190141_create_filters_table', 1),
(52, '2019_03_21_190540_create_comments_table', 1),
(53, '2019_03_21_190913_create_sliders_table', 1),
(54, '2019_03_21_191027_create_menus_table', 1),
(55, '2019_03_21_191216_create_categories_table', 1),
(56, '2019_03_23_164544_change_portfolios_table', 2),
(57, '2019_03_23_170108_change_menus_table', 3),
(58, '2019_03_23_171129_change_portfolios_table', 4),
(60, '2019_05_03_175416_change_comments_table', 5),
(61, '2019_05_14_211057_update_articles_table', 6),
(62, '2019_05_23_203110_change_users_table', 7),
(67, '2019_05_27_183226_create_roles_table', 8),
(68, '2019_05_27_183352_create_permissions_table', 8),
(69, '2019_05_27_183541_create_permission_role_table', 8),
(70, '2019_05_27_183945_create_role_user_table', 8),
(71, '2019_05_27_184152_change_role_user_table', 9),
(72, '2019_05_27_184230_change_permission_role_table', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'VIEW_ADMIN', NULL, NULL),
(2, 'ADD_ARTICLES', NULL, NULL),
(3, 'UPDATE_ARTICLES', NULL, NULL),
(4, 'DELETE_ARTICLES', NULL, NULL),
(5, 'ADMIN_USERS', NULL, NULL),
(6, 'VIEW_ADMIN_ARTICLES', NULL, NULL),
(7, 'EDIT_USERS', NULL, NULL),
(8, 'EDIT_PERMISSIONS', NULL, NULL),
(9, 'VIEW_ADMIN_MENU', NULL, NULL),
(10, 'EDIT_MENU', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `permission_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`id`, `created_at`, `updated_at`, `role_id`, `permission_id`) VALUES
(1, NULL, NULL, 1, 1),
(8, NULL, NULL, 2, 2),
(10, NULL, NULL, 1, 2),
(11, NULL, NULL, 1, 3),
(12, NULL, NULL, 1, 4),
(13, NULL, NULL, 1, 5),
(14, NULL, NULL, 1, 6),
(15, NULL, NULL, 1, 7),
(16, NULL, NULL, 1, 8),
(17, NULL, NULL, 1, 9),
(18, NULL, NULL, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolios`
--

CREATE TABLE `portfolios` (
  `port_id` bigint(20) UNSIGNED NOT NULL,
  `port_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port_text` text COLLATE utf8_unicode_ci NOT NULL,
  `port_customer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `port_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filter_alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `portfolios`
--

INSERT INTO `portfolios` (`port_id`, `port_title`, `port_text`, `port_customer`, `port_img`, `created_at`, `updated_at`, `alias`, `filter_alias`) VALUES
(1, 'Steep This!', 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed [...]', 'Customer 1', '{\"mini\":\"0061-175x175.jpg\",\"max\":\"0061-770x368.jpg\",\"path\":\"0061.jpg\"}', '2019-05-05 21:00:00', NULL, 'project-1', 'brand-identity'),
(2, 'Steep This!', 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed [...]', 'Customer 1', '{\"mini\":\"0061-175x175.jpg\",\"max\":\"0061-770x368.jpg\",\"path\":\"0061.jpg\"}', '2019-05-04 21:00:00', NULL, 'project-2', 'brand-identity'),
(3, 'Guanacos', 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate', 'Guanacos', '{\"mini\":\"0061-175x175.jpg\",\"max\":\"0061-770x368.jpg\",\"path\":\"0061.jpg\"}', '2019-04-22 21:00:00', NULL, 'project-2', 'brand-identity'),
(4, 'Guanacos', 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate', 'Guanacos', '{\"mini\":\"0061-175x175.jpg\",\"max\":\"0061-770x368.jpg\",\"path\":\"0061.jpg\"}', '2019-04-14 21:00:00', '2019-04-14 21:00:00', 'project-3', 'brand-identity'),
(5, 'My portfolio', 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate', 'myPort', '{\"mini\":\"0061-175x175.jpg\",\"max\":\"0061-770x368.jpg\",\"path\":\"0061.jpg\"}', '2019-04-05 21:00:00', NULL, 'myPort', 'Brand-Identity');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Moderator', NULL, NULL),
(3, 'Guest', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`id`, `created_at`, `updated_at`, `user_id`, `role_id`) VALUES
(1, NULL, NULL, 1, 1),
(11, NULL, NULL, 4, 1),
(12, NULL, NULL, 13, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `sl_id` bigint(20) UNSIGNED NOT NULL,
  `sl_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sl_text` text COLLATE utf8_unicode_ci NOT NULL,
  `sl_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`sl_id`, `sl_img`, `sl_text`, `sl_title`, `created_at`, `updated_at`) VALUES
(1, 'xx.jpg', 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque', '<h2 style=\"color:#fff\">CORPORATE, MULTIPURPOSE.. <br><span>PINK RIO</span></h2>', NULL, NULL),
(2, '00314.jpg', 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque', '<h2 style=\"color:#fff\">PINKRIO. <span>STRONG AND POWERFUL.</span></h2>', NULL, NULL),
(3, 'dd.jpg', 'Nam id quam a odio euismod pellentesque. Etiam congue rutrum risus non vestibulum. Quisque a diam at ligula blandit consequat. Mauris ac mi velit, a tempor neque', '<h2 style=\"color:#fff\">PINKRIO. <span>STRONG AND POWERFUL.</span></h2>', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `login`) VALUES
(1, 'Soib', 'Soib_jon96@inbox.ru', NULL, '$2y$10$DW2N9qj9ArKmjIgs1strAOxsPxP.E9a8WcO0Ft8XqBLYcM5Ld30CS', NULL, '2019-03-22 15:14:40', '2019-07-06 16:56:23', 'user'),
(4, 'dsfsdfsdf', 'mail@mail.com', NULL, '', NULL, '2019-05-24 13:52:12', '2019-07-06 17:06:10', 'test123'),
(13, 'asdasdasd', 'r.soib1996@gmail.com', NULL, '$2y$10$xd4LQtBeLX6fXGPBWSMsZef6Rn4fvcHCVHQ/QfMqWNxbagQGY153e', NULL, '2019-07-06 17:07:06', '2019-07-06 17:08:05', '1212121');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_art_alias_unique` (`art_alias`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_cat_alias_unique` (`cat_alias`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `comments_article_id_foreign` (`article_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`fil_id`),
  ADD UNIQUE KEY `filters_fil_alias_unique` (`fil_alias`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Индексы таблицы `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`port_id`),
  ADD KEY `portfolios_filter_alias_foreign` (`filter_alias`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`sl_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `filters`
--
ALTER TABLE `filters`
  MODIFY `fil_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `port_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `sl_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
