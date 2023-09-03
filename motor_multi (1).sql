-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2023 at 06:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motor_multi`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int UNSIGNED NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image1`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(2, '64dbad1184bd0.jpg', '64dbad1184fb2.jpg', '64dbad1185368.jpg', '2023-08-15 13:41:59', '2023-08-15 13:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_translations`
--

CREATE TABLE `about_us_translations` (
  `id` int UNSIGNED NOT NULL,
  `about_us_id` int UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_translations`
--

INSERT INTO `about_us_translations` (`id`, `about_us_id`, `locale`, `main_title`, `description`, `address`) VALUES
(3, 2, 'ar', 'مــن نـــحـــن', 'نحن نقدم خدمات تشغيل وصيانة عالية المستوى يمكن الوثوق بها تماماً وسنقدم مجموعة واسعة من الخدمات للعملاء من القطاع الحكومي والقطاع الخاص ، خلال السنوات السبع الماضية ، أصبحت شركة موتورز ستار للتشغيل والصيانة هي المقاول المختار للعقد للتنظيف والصيانة في السوق السعودي...', 'الرياض ، السعودية ، شارع ،،،'),
(4, 2, 'en', 'Who are we?', 'We provide high level operation and maintenance services that can be completely trusted and we will provide a wide range of services to customers from the government and private sectors, during the past seven years, Motors Star Operation and Maintenance has become the contractor of choice for the contract for cleaning and maintenance in the Saudi market...', 'Riyadh, Saudi Arabia, Street,,,');

-- --------------------------------------------------------

--
-- Table structure for table `commitments`
--

CREATE TABLE `commitments` (
  `id` bigint UNSIGNED NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commitments`
--

INSERT INTO `commitments` (`id`, `image1`, `created_at`, `updated_at`) VALUES
(1, '64db4b878cf97.svg', '2023-08-15 06:55:19', '2023-08-15 06:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `commitment_translations`
--

CREATE TABLE `commitment_translations` (
  `id` int UNSIGNED NOT NULL,
  `commitment_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commitment_translations`
--

INSERT INTO `commitment_translations` (`id`, `commitment_id`, `locale`, `main_title`, `description`) VALUES
(1, 1, 'ar', 'التزاماتنا', 'التعرف على متطلبات العملاء ورغباتهم وتوقعاتهم والوفاء بها بجوده عالية مع الالتزام بعملية التطور المستمر .  التحسين بالأداء من خلال بيئة العمل الملائمة للعاملين ومواكبة المستجدات في الأساليب الإدارية والحكومية والمعدات والتقنيات المتطورة في شتى مجالات الصيانة والتشغيل مع المحافظة على النخبة من الكوادر الفنية المؤهلة للتعامل بأفضل أسلوب للمساعدة في تقديم أفضل المقترحات والحلول .'),
(2, 1, 'en', 'Our commitments', 'Identifying customers\' requirements, desires, and expectations, and fulfilling them with high quality, while adhering to the process of continuous development.  Improving performance through a suitable work environment for workers and keeping abreast of developments in administrative and governmental methods, equipment and advanced technologies in various fields of maintenance and operation while preserving the elite of qualified technical cadres to deal in the best manner to help provide the best proposals and solutions.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `phone1`, `phone2`, `email1`, `email2`, `created_at`, `updated_at`) VALUES
(1, '00972592029316', '00972592029316', 'Yasmeen.K@gmail.com', 'Yasmeen.K@gmail.com', '2023-08-15 07:19:13', '2023-08-15 07:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_translations`
--

CREATE TABLE `contact_us_translations` (
  `id` int UNSIGNED NOT NULL,
  `contact_us_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_translations`
--

INSERT INTO `contact_us_translations` (`id`, `contact_us_id`, `locale`, `main_title`, `description`, `address1`, `address2`) VALUES
(1, 1, 'ar', 'هل مازلت بحاجة إلى مساعدة ؟', 'نحن نسعد بخدمتكم دائما، ما عليك سوى اختيار أحد الخيارات التالية للحصول على مساعدة.', 'السعودية ، الرياض ،،،،،', 'السعودية ، الرياض ،،،،،'),
(2, 1, 'en', 'Do you still need help?', 'We are always happy to serve you, just choose one of the following options to get help.', 'Riyadh, Saudi Arabia ,,,,,', 'Riyadh, Saudi Arabia ,,,,,');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link8` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link9` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `logo`, `image1`, `link1`, `link2`, `link3`, `link4`, `link5`, `link6`, `link7`, `link8`, `link9`, `created_at`, `updated_at`) VALUES
(1, '64db4a101eb87.svg', '64db4a101e711.svg', 'https://www.snapchat.com', 'https://www.instagram.com', 'https://www.tiktok.com', 'https://www.youtube.com', 'https://twitter.com', 'https://facebook.com', 'https://index.com', 'https://index.com', 'https://index.com', '2023-08-15 06:49:04', '2023-08-15 06:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `footer_translations`
--

CREATE TABLE `footer_translations` (
  `id` int UNSIGNED NOT NULL,
  `footer_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_down` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allsave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_translations`
--

INSERT INTO `footer_translations` (`id`, `footer_id`, `locale`, `description`, `link_down`, `link_contact`, `address`, `allsave`) VALUES
(1, 1, 'ar', 'تقدم شركة موتر ستار قوة عمالة عالية الأداء ومتنوعة ، وتعزز بيئة عمل صحية وأمنة ، من أجل تعظيم الإمكانات الفردية والتنظيمية والمكانية باعتبارها صاحبة العمل المفضل', 'تحميل بروفايل الشركة', 'اتصل بنا', 'الرياض ، السعودية ، شارع ،،،', '©جميع الحقوق محفوظة لدى شركة موتر ستار'),
(2, 1, 'en', 'Motor Star offers a high-performance and diverse workforce, and promotes a healthy and safe work environment, in order to maximize individual, organizational and spatial potential as the employer of choice.', 'Download the company profile', 'call us', 'Riyadh, Saudi Arabia, Street,,,', '© All rights reserved to Motor Star');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint UNSIGNED NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `image1`, `created_at`, `updated_at`) VALUES
(1, '64db4c8be67fc.svg', '2023-08-15 06:59:39', '2023-08-15 06:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `goal_translations`
--

CREATE TABLE `goal_translations` (
  `id` int UNSIGNED NOT NULL,
  `goal_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goal_translations`
--

INSERT INTO `goal_translations` (`id`, `goal_id`, `locale`, `main_title`, `description`) VALUES
(1, 1, 'ar', 'اهدافنا', 'التعرف على متطلبات العملاء ورغباتهم وتوقعاتهم والوفاء بها بجوده عالية مع الالتزام بعملية التطور المستمر .  التحسين بالأداء من خلال بيئة العمل الملائمة للعاملين ومواكبة المستجدات في الأساليب الإدارية والحكومية والمعدات والتقنيات المتطورة في شتى مجالات الصيانة والتشغيل مع المحافظة على النخبة من الكوادر الفنية المؤهلة للتعامل بأفضل أسلوب للمساعدة في تقديم أفضل المقترحات والحلول .'),
(2, 1, 'en', 'Our goals', 'Identifying customers\' requirements, desires, and expectations, and fulfilling them with high quality, while adhering to the process of continuous development.  Improving performance through a suitable work environment for workers and keeping abreast of developments in administrative and governmental methods, equipment and advanced technologies in various fields of maintenance and operation while preserving the elite of qualified technical cadres to deal in the best manner to help provide the best proposals and solutions.');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` bigint UNSIGNED NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `image1`, `created_at`, `updated_at`) VALUES
(1, '64db3f889f728.svg', '2023-08-15 06:04:08', '2023-08-15 06:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `management_subs`
--

CREATE TABLE `management_subs` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management_subs`
--

INSERT INTO `management_subs` (`id`, `logo`, `image1`, `email`, `phone`, `link1`, `link2`, `created_at`, `updated_at`) VALUES
(1, '64db41e246aae.svg', '64db41e246544.svg', 'Yamseen.K.Emad@gmail.com', '00972592029316', 'الإدارة 1', 'الإدارة 2', '2023-08-15 06:08:50', '2023-08-15 06:14:10'),
(2, '64db9b8bbcf03.svg', '64db9b8bbc8e1.svg', 'yousef@gmail.com', '00972592029316', 'الإدارة 1', 'الإدارة 2', '2023-08-15 06:12:15', '2023-08-15 12:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `management_sub_translations`
--

CREATE TABLE `management_sub_translations` (
  `id` int UNSIGNED NOT NULL,
  `management_sub_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_title_logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management_sub_translations`
--

INSERT INTO `management_sub_translations` (`id`, `management_sub_id`, `locale`, `logo_title`, `short_title_logo`, `long_title_logo`) VALUES
(1, 1, 'ar', 'فرع صيانة السيارات', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي', 'هذا النص افتراضي'),
(2, 1, 'en', 'Car maintenance branch', 'This text is default, this text is default, this text is default, this text is default, this text is default', 'This text is default'),
(3, 2, 'ar', 'فرع المولدات والكسارات واللوحات الكهربائية', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي'),
(4, 2, 'en', 'Car maintenance branch', 'This text is default, this text is default, this text is default, this text is default, this text is default', 'This text is default, this text is default, this text is default, this text is default, this text is default');

-- --------------------------------------------------------

--
-- Table structure for table `management_translations`
--

CREATE TABLE `management_translations` (
  `id` int UNSIGNED NOT NULL,
  `management_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management_translations`
--

INSERT INTO `management_translations` (`id`, `management_id`, `locale`, `main_title`, `description`) VALUES
(1, 1, 'ar', 'الــإدارة', 'نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة .'),
(2, 1, 'en', 'The administration', 'We provide high-quality services We provide high-quality services We provide high-quality services We provide high-quality services We provide high-quality services We provide high-quality services We provide high-quality services .');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_09_181749_create_sliders_table', 1),
(6, '2023_08_09_184057_create_slider_translations_table', 1),
(7, '2023_08_11_171444_create_about_us_table', 1),
(8, '2023_08_11_171751_create_about_us_translations_table', 1),
(9, '2023_08_11_174010_create_services_mains_table', 1),
(10, '2023_08_11_174016_create_services_main_translations_table', 1),
(11, '2023_08_11_175932_create_management_table', 1),
(12, '2023_08_11_175950_create_management_translations_table', 1),
(13, '2023_08_11_180055_create_management_subs_table', 1),
(14, '2023_08_11_180104_create_management_sub_translations_table', 1),
(15, '2023_08_11_180651_create_footers_table', 1),
(16, '2023_08_11_180706_create_footer_translations_table', 1),
(17, '2023_08_11_181036_create_commitments_table', 1),
(18, '2023_08_11_181340_create_contact_us_table', 1),
(19, '2023_08_11_181356_create_contact_us_translations_table', 1),
(20, '2023_08_11_182321_create_q_a_intros_table', 1),
(21, '2023_08_11_182344_create_q_a_intro_translations_table', 1),
(22, '2023_08_11_182354_create_q_a_s_table', 1),
(23, '2023_08_11_182403_create_q_a_translations_table', 1),
(24, '2023_08_11_194441_create_services_subs_table', 1),
(25, '2023_08_11_194452_create_services_sub_translations_table', 1),
(26, '2023_08_12_094032_create_commitment_translations_table', 1),
(27, '2023_08_12_095038_create_goals_table', 1),
(28, '2023_08_12_095049_create_goal_translations_table', 1),
(29, '2023_08_13_180921_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create', 'web', '2023-03-08 22:04:10', '2023-03-08 22:04:10'),
(2, 'edit', 'web', '2023-03-08 22:04:18', '2023-03-08 22:04:18'),
(3, 'show', 'web', '2023-03-08 22:04:24', '2023-03-08 22:04:24'),
(4, 'delete', 'web', '2023-03-08 22:04:31', '2023-03-08 22:04:31'),
(5, 'permissions', 'web', '2023-03-08 22:04:39', '2023-03-08 22:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `q_a_intros`
--

CREATE TABLE `q_a_intros` (
  `id` bigint UNSIGNED NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `q_a_intros`
--

INSERT INTO `q_a_intros` (`id`, `image1`, `created_at`, `updated_at`) VALUES
(2, '64db54f97b8cc.svg', '2023-08-15 07:35:37', '2023-08-15 07:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `q_a_intro_translations`
--

CREATE TABLE `q_a_intro_translations` (
  `id` int UNSIGNED NOT NULL,
  `q_a_intro_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `q_a_intro_translations`
--

INSERT INTO `q_a_intro_translations` (`id`, `q_a_intro_id`, `locale`, `main_title`, `description`) VALUES
(3, 2, 'ar', 'الــأســئــلــة الــشـــائــعــة', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي .'),
(4, 2, 'en', 'Frequently asked questions', 'This text is default, this text is default, this text is default, this text is default, this text is default, this text is default, this text is default, this text is default.');

-- --------------------------------------------------------

--
-- Table structure for table `q_a_s`
--

CREATE TABLE `q_a_s` (
  `id` bigint UNSIGNED NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `q_a_s`
--

INSERT INTO `q_a_s` (`id`, `image1`, `created_at`, `updated_at`) VALUES
(1, '64db553165e87.svg', '2023-08-15 07:36:33', '2023-08-15 07:36:33'),
(2, '64db55537aafb.svg', '2023-08-15 07:37:07', '2023-08-15 07:37:07'),
(3, '64db5567806e1.svg', '2023-08-15 07:37:27', '2023-08-15 07:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `q_a_translations`
--

CREATE TABLE `q_a_translations` (
  `id` int UNSIGNED NOT NULL,
  `q_a_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `q_a_translations`
--

INSERT INTO `q_a_translations` (`id`, `q_a_id`, `locale`, `question`, `answer`) VALUES
(1, 1, 'ar', 'هل أحتاج حقًا إلى إطارات شتوية؟', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا  النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي .'),
(2, 1, 'en', 'Do I really need winter tyres?', 'This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default default This text is default.'),
(3, 2, 'ar', 'هل أحتاج حقًا إلى إطارات شتوية؟', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا  النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي .'),
(4, 2, 'en', 'Do I really need winter tyres?', 'This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default default This text is default.'),
(5, 3, 'ar', 'هل أحتاج حقًا إلى إطارات شتوية؟', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا  النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي .'),
(6, 3, 'en', 'Do I really need winter tyres?', 'This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default This text is default default This text is default.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-03-09 15:48:35', '2023-03-09 15:48:35'),
(2, 'user', 'web', '2023-03-09 15:48:36', '2023-03-09 15:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services_mains`
--

CREATE TABLE `services_mains` (
  `id` int UNSIGNED NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_mains`
--

INSERT INTO `services_mains` (`id`, `image1`, `created_at`, `updated_at`) VALUES
(1, '64db42ff1da73.svg', '2023-08-15 06:18:55', '2023-08-15 06:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `services_main_translations`
--

CREATE TABLE `services_main_translations` (
  `id` int UNSIGNED NOT NULL,
  `services_main_id` int UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_main_translations`
--

INSERT INTO `services_main_translations` (`id`, `services_main_id`, `locale`, `main_title`, `description`) VALUES
(1, 1, 'ar', 'مــاذا نــقــدم ؟', 'نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة ، نحن نقدم خدمات عالية الجودة .'),
(2, 1, 'en', 'What do we apply?', 'We provide high-quality services We provide high-quality services We provide high-quality services We provide high-quality services We provide high-quality services We provide high-quality services We provide high-quality services .');

-- --------------------------------------------------------

--
-- Table structure for table `services_subs`
--

CREATE TABLE `services_subs` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `management_sub_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_subs`
--

INSERT INTO `services_subs` (`id`, `logo`, `image1`, `management_sub_id`, `created_at`, `updated_at`) VALUES
(1, '64db434c5eeb0.svg', '64db434c5eaab.svg', 1, '2023-08-15 06:20:12', '2023-08-15 06:20:12'),
(2, '64db448404216.svg', '64db448403c21.svg', 1, '2023-08-15 06:25:24', '2023-08-15 06:25:24'),
(3, '64db44fb03b7e.svg', '64db44fb03718.svg', 2, '2023-08-15 06:27:23', '2023-08-15 06:27:23'),
(4, '64db4527d2cec.svg', '64db4527d274d.svg', 2, '2023-08-15 06:28:07', '2023-08-15 06:28:07'),
(5, '64db457bf0c38.svg', '64db457bf06f4.svg', 1, '2023-08-15 06:29:31', '2023-08-15 06:29:31'),
(6, '64db45e740ea2.svg', '64db45e740a13.svg', 1, '2023-08-15 06:31:19', '2023-08-15 06:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `services_sub_translations`
--

CREATE TABLE `services_sub_translations` (
  `id` int UNSIGNED NOT NULL,
  `services_sub_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_title_logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_sub_translations`
--

INSERT INTO `services_sub_translations` (`id`, `services_sub_id`, `locale`, `logo_title`, `short_title_logo`, `long_title_logo`) VALUES
(1, 1, 'ar', 'التنظيف الداخلي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي'),
(2, 1, 'en', 'Interior cleaning', 'This text is default, this text is default, this text is default', 'This text is default, this text is default, this text is default'),
(3, 2, 'ar', 'التنظيف الداخلي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي'),
(4, 2, 'en', 'Interior cleaning', 'This text is default, this text is default, this text is default', 'This text is default, this text is default, this text is default'),
(5, 3, 'ar', 'خدمة محرك السيارات', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي'),
(6, 3, 'en', 'Auto engine service', 'This text is default, this text is default, this text is default', 'This text is default, this text is default, this text is default'),
(7, 4, 'ar', 'تنظيف الفراغ', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي'),
(8, 4, 'en', 'Vacuum cleaning', 'This text is default, this text is default, this text is default, this text is default, this text is default', 'This text is default, this text is default, this text is default, this text is default, this text is default'),
(9, 5, 'ar', 'الاختبارات التشخيصية', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي'),
(10, 5, 'en', 'Diagnostic tests', 'This text is default, this text is default, this text is default, this text is default, this text is default', 'This text is default, this text is default, this text is default, this text is default, this text is default'),
(11, 6, 'ar', 'خدمة محرك السيارات', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي', 'هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي ، هذا النص افتراضي'),
(12, 6, 'en', 'Auto engine service', 'This text is default, this text is default, this text is default, this text is default, this text is default', 'This text is default, this text is default, this text is default, this text is default, this text is default');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int UNSIGNED NOT NULL,
  `whatsapp_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiktok_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `snapcaht_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materials_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `whatsapp_link`, `tiktok_link`, `snapcaht_link`, `instagram_link`, `youtube_link`, `background`, `logo`, `maintenance_link`, `materials_link`, `created_at`, `updated_at`) VALUES
(2, 'https://web.whatsapp.com', 'https://web.whatsapp.com', 'https://web.whatsapp.com', 'https://web.whatsapp.com', 'https://web.whatsapp.com', '64db967a265b0.png', '64db967a269cd.png', 'https://web.whatsapp.com', 'https://web.whatsapp.com', '2023-08-15 12:15:06', '2023-08-15 12:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` int UNSIGNED NOT NULL,
  `slider_id` int UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materials_button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `locale`, `main_title`, `description`, `maintenance_button`, `materials_button`, `question`) VALUES
(3, 2, 'ar', 'شـــركـــة مـــوتـــر ســـتــــار لــلـــصــــيـــانـــة', 'تقدم شركة موتر ستار قوة عمالة عالية الأداء ومتنوعة ، وتعزز بيئة عمل صحية وآمنة، من أجل تعظيم الإمكانيات الفردية والتنظيمية والمكانية باعتبارها صاحبة العمل المفضل', 'صيانة السيارات', 'المولدات والكسارات واللوحات الكهربائية', 'هل لديك مشاكل في السيارة ؟'),
(4, 2, 'en', 'Motor Star maintenance company', 'Motor Star offers a high-performance and diverse workforce, and promotes a healthy and safe work environment, in order to maximize individual, organizational and spatial potential as an employer of choice.', 'Car maintenance', 'Generators, crushers and electrical panels', 'Do you have car problems?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@app.com', NULL, '$2y$10$3oeGq0nrr6w4x2ye803/aeYqDyF2h4SfxyTG4MKebjGUtRiFGIaZK', NULL, NULL, NULL),
(2, 'user', 'user@app.com', NULL, '$2y$10$TbqLnAllMf1HpfC18macreGem6rkZIMY4pDIaVplbaDHMrSBvX5lO', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `about_us_translations_about_us_id_locale_unique` (`about_us_id`,`locale`),
  ADD KEY `about_us_translations_locale_index` (`locale`);

--
-- Indexes for table `commitments`
--
ALTER TABLE `commitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commitment_translations`
--
ALTER TABLE `commitment_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `commitment_translations_commitment_id_locale_unique` (`commitment_id`,`locale`),
  ADD KEY `commitment_translations_locale_index` (`locale`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_translations`
--
ALTER TABLE `contact_us_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_us_translations_contact_us_id_locale_unique` (`contact_us_id`,`locale`),
  ADD KEY `contact_us_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_translations`
--
ALTER TABLE `footer_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `footer_translations_footer_id_locale_unique` (`footer_id`,`locale`),
  ADD KEY `footer_translations_locale_index` (`locale`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal_translations`
--
ALTER TABLE `goal_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `goal_translations_goal_id_locale_unique` (`goal_id`,`locale`),
  ADD KEY `goal_translations_locale_index` (`locale`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_subs`
--
ALTER TABLE `management_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_sub_translations`
--
ALTER TABLE `management_sub_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `management_sub_translations_management_sub_id_locale_unique` (`management_sub_id`,`locale`),
  ADD KEY `management_sub_translations_locale_index` (`locale`);

--
-- Indexes for table `management_translations`
--
ALTER TABLE `management_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `management_translations_management_id_locale_unique` (`management_id`,`locale`),
  ADD KEY `management_translations_locale_index` (`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `q_a_intros`
--
ALTER TABLE `q_a_intros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_a_intro_translations`
--
ALTER TABLE `q_a_intro_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `q_a_intro_translations_q_a_intro_id_locale_unique` (`q_a_intro_id`,`locale`),
  ADD KEY `q_a_intro_translations_locale_index` (`locale`);

--
-- Indexes for table `q_a_s`
--
ALTER TABLE `q_a_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_a_translations`
--
ALTER TABLE `q_a_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `q_a_translations_q_a_id_locale_unique` (`q_a_id`,`locale`),
  ADD KEY `q_a_translations_locale_index` (`locale`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services_mains`
--
ALTER TABLE `services_mains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_main_translations`
--
ALTER TABLE `services_main_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_main_translations_services_main_id_locale_unique` (`services_main_id`,`locale`),
  ADD KEY `services_main_translations_locale_index` (`locale`);

--
-- Indexes for table `services_subs`
--
ALTER TABLE `services_subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_subs_management_sub_id_foreign` (`management_sub_id`);

--
-- Indexes for table `services_sub_translations`
--
ALTER TABLE `services_sub_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_sub_translations_services_sub_id_locale_unique` (`services_sub_id`,`locale`),
  ADD KEY `services_sub_translations_locale_index` (`locale`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slider_translations_slider_id_locale_unique` (`slider_id`,`locale`),
  ADD KEY `slider_translations_locale_index` (`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commitments`
--
ALTER TABLE `commitments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commitment_translations`
--
ALTER TABLE `commitment_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_translations`
--
ALTER TABLE `contact_us_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_translations`
--
ALTER TABLE `footer_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `goal_translations`
--
ALTER TABLE `goal_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `management_subs`
--
ALTER TABLE `management_subs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `management_sub_translations`
--
ALTER TABLE `management_sub_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `management_translations`
--
ALTER TABLE `management_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `q_a_intros`
--
ALTER TABLE `q_a_intros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `q_a_intro_translations`
--
ALTER TABLE `q_a_intro_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `q_a_s`
--
ALTER TABLE `q_a_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `q_a_translations`
--
ALTER TABLE `q_a_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services_mains`
--
ALTER TABLE `services_mains`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_main_translations`
--
ALTER TABLE `services_main_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services_subs`
--
ALTER TABLE `services_subs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services_sub_translations`
--
ALTER TABLE `services_sub_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  ADD CONSTRAINT `about_us_translations_about_us_id_foreign` FOREIGN KEY (`about_us_id`) REFERENCES `about_us` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commitment_translations`
--
ALTER TABLE `commitment_translations`
  ADD CONSTRAINT `commitment_translations_commitment_id_foreign` FOREIGN KEY (`commitment_id`) REFERENCES `commitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_us_translations`
--
ALTER TABLE `contact_us_translations`
  ADD CONSTRAINT `contact_us_translations_contact_us_id_foreign` FOREIGN KEY (`contact_us_id`) REFERENCES `contact_us` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `footer_translations`
--
ALTER TABLE `footer_translations`
  ADD CONSTRAINT `footer_translations_footer_id_foreign` FOREIGN KEY (`footer_id`) REFERENCES `footers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `goal_translations`
--
ALTER TABLE `goal_translations`
  ADD CONSTRAINT `goal_translations_goal_id_foreign` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `management_sub_translations`
--
ALTER TABLE `management_sub_translations`
  ADD CONSTRAINT `management_sub_translations_management_sub_id_foreign` FOREIGN KEY (`management_sub_id`) REFERENCES `management_subs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `management_translations`
--
ALTER TABLE `management_translations`
  ADD CONSTRAINT `management_translations_management_id_foreign` FOREIGN KEY (`management_id`) REFERENCES `management` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `q_a_intro_translations`
--
ALTER TABLE `q_a_intro_translations`
  ADD CONSTRAINT `q_a_intro_translations_q_a_intro_id_foreign` FOREIGN KEY (`q_a_intro_id`) REFERENCES `q_a_intros` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `q_a_translations`
--
ALTER TABLE `q_a_translations`
  ADD CONSTRAINT `q_a_translations_q_a_id_foreign` FOREIGN KEY (`q_a_id`) REFERENCES `q_a_s` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services_main_translations`
--
ALTER TABLE `services_main_translations`
  ADD CONSTRAINT `services_main_translations_services_main_id_foreign` FOREIGN KEY (`services_main_id`) REFERENCES `services_mains` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services_subs`
--
ALTER TABLE `services_subs`
  ADD CONSTRAINT `services_subs_management_sub_id_foreign` FOREIGN KEY (`management_sub_id`) REFERENCES `management_subs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services_sub_translations`
--
ALTER TABLE `services_sub_translations`
  ADD CONSTRAINT `services_sub_translations_services_sub_id_foreign` FOREIGN KEY (`services_sub_id`) REFERENCES `services_subs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD CONSTRAINT `slider_translations_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
