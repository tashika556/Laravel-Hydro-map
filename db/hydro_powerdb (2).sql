-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 07:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hydro_powerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `introduction` longtext NOT NULL,
  `photo` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `count_hydropower` varchar(255) NOT NULL,
  `count_runproject` varchar(255) NOT NULL,
  `count_company` varchar(255) NOT NULL,
  `count_intfinancier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `introduction`, `photo`, `video_url`, `count_hydropower`, `count_runproject`, `count_company`, `count_intfinancier`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At reiciendis, dolorum corporis natus quod perferendis laudantium, nesciunt explicabo quis id fugit ab quidem odit, eius culpa maiores recusandae aut doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. At reiciendis, dolorum corporis natus quod perferendis laudantium, nesciunt explicabo quis id fugit ab quidem odit, eius culpa maiores recusandae aut doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. At reiciendis, dolorum corporis natus quod perferendis laudantium, nesciunt explicabo quis id fugit ab quidem odit, eius culpa maiores recusandae aut doloribus.', '1709720126.jpg', 'https://www.youtube-nocookie.com/embed/q8HmRLCgDAI?autoplay=1&amp;mute=1', '100', '20', '10', '56', '2024-03-06 01:00:17', '2024-03-06 04:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'hydro_admin', '$2y$10$9fdsy/6Q1cl/0WRJv1pk9.PQYDsSoFs2iytR0/u5RNVRtIlqGpaie', '2024-02-26 06:57:04', '2024-02-26 02:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(2, 'Hydropower Horizons: Navigating the Currents of Sustainable Energy', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt impedit nihil officia obcaecati aut blanditiis excepturi quo? Iusto, a eligendi aliquam pariatur assumenda saepe libero, facilis quibusdam minima accusantium sint? Description: Explore the fascinating realm of hydropower with our insightful blog, where we unravel the complexities of this renewable energy source. From dam design to ecosystem impacts, policy implications to community engagement, discover the diverse aspects shaping the landscape of hydropower generation worldwide.', '1709722979.jpg', 'May', '22', '2024', '2024-03-06 04:42:20', '2024-03-06 05:17:59'),
(3, 'Hydropower Insights: Tapping into Nature\'s Energy Reservoir', NULL, '1709721499.jpg', 'Dec', '25', '2023', '2024-03-06 04:53:19', '2024-03-06 04:53:19'),
(4, 'Rivers of Energy: Unraveling the Potential of Hydropower', NULL, '1709721545.jpg', 'Jun', '10', '2024', '2024-03-06 04:54:05', '2024-03-06 04:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `icon`, `created_at`, `updated_at`) VALUES
(4, 'Nepal Electricity Authority', '#2275ab', '2024-02-27 23:54:24', '2024-02-27 23:54:24'),
(5, 'District Survey Office', '#102564', '2024-02-27 23:54:29', '2024-02-27 23:54:29'),
(6, 'Tanahu Hydropower Limited (THL)/ Nepal Electricity Authority', '#f768b2', '2024-02-27 23:58:56', '2024-02-27 23:58:56'),
(7, 'MV Dugar Group, Green Venture Ltd', '#8da82f', '2024-02-27 23:59:48', '2024-02-27 23:59:48'),
(8, 'Land Revenue Office', '#21281e', '2024-02-28 03:51:35', '2024-02-28 03:51:35'),
(9, 'Forest Office', '#e5cdb0', '2024-02-28 03:51:50', '2024-02-28 03:51:50'),
(10, 'Agriculture Knowledge Center', '#f3168f', '2024-02-28 03:51:59', '2024-02-28 03:51:59'),
(11, 'Intensive Urban Development and Building Construction Project', '#b74839', '2024-02-28 03:52:09', '2024-02-28 03:52:09'),
(12, 'Manthali Municipality and Khandadevi Village', '#23ac7e', '2024-02-28 03:52:18', '2024-02-28 03:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address1`, `address2`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `instagram`, `twitter`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Kathmandu ,Nepal', NULL, '+977 01 5553000', NULL, 'info@archiesoft.com.np', NULL, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', NULL, '2024-03-06 04:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `international_finances`
--

CREATE TABLE `international_finances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fin_name` varchar(255) NOT NULL,
  `fin_icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `international_finances`
--

INSERT INTO `international_finances` (`id`, `fin_name`, `fin_icon`, `created_at`, `updated_at`) VALUES
(4, 'European Investment Bank', 'fa fa-th-large', '2024-02-27 23:51:50', '2024-02-27 23:51:50'),
(5, 'Asian Development Bank', 'fa fa-square', '2024-02-27 23:51:56', '2024-02-27 23:51:56'),
(6, 'China Oversees Engineering Company', 'fa fa-star', '2024-02-27 23:52:01', '2024-02-27 23:52:01'),
(7, 'Japan International Cooperation Agency (JICA)', 'fa fa-eject', '2024-02-28 22:36:42', '2024-02-28 22:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2024_02_26_042123_create_companies_table', 2),
(4, '2024_02_26_062812_create_admins_table', 3),
(5, '2024_02_26_101547_create_international_finances_table', 4),
(6, '2024_02_27_041813_create_projects_table', 5),
(7, '2024_02_27_064904_create_projects_table', 6),
(8, '2024_02_27_065101_create_international_finances_table', 7),
(9, '2024_02_28_062541_create_projects_table', 8),
(10, '2024_02_28_064655_create_projects_table', 9),
(11, '2024_02_28_065230_create_projects_table', 10),
(12, '2024_02_28_093005_create_projects_table', 11),
(13, '2024_02_28_094247_create_projects_company_table', 12),
(14, '2024_02_28_101550_create_projects_table', 13),
(15, '2024_02_28_110023_create_projects_table', 14),
(16, '2024_02_28_112527_create_projects_table', 15),
(17, '2024_02_29_034552_create_projects_company_table', 16),
(18, '2024_02_29_034858_create_projects_table', 17),
(19, '2024_02_29_042239_create_projects_finances_table', 18),
(20, '2024_02_29_043742_create_projects_table', 19),
(21, '2024_03_06_055251_create_abouts_table', 20),
(22, '2024_03_06_091330_create_contacts_table', 21),
(23, '2024_03_06_094919_create_blogs_table', 22),
(24, '2024_03_06_100923_create_blogs_table', 23),
(25, '2024_03_07_033401_create_galleries_table', 24),
(26, '2024_03_07_040626_create_images_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `summary` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `impacts` longtext DEFAULT NULL,
  `advocacies_undertaken` longtext DEFAULT NULL,
  `rights` longtext DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `affected_communities` varchar(255) DEFAULT NULL,
  `conflict_start` varchar(255) DEFAULT NULL,
  `government_actors` longtext DEFAULT NULL,
  `advocacy_org` longtext DEFAULT NULL,
  `relevant_link` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `latitude`, `longitude`, `summary`, `description`, `impacts`, `advocacies_undertaken`, `rights`, `location`, `budget`, `affected_communities`, `conflict_start`, `government_actors`, `advocacy_org`, `relevant_link`, `created_at`, `updated_at`) VALUES
(1, '220 kV Marsayandi Corridor transmission line project', '28.6351973', '84.0869572', 'The project is located along the Marsayandi Corridor, mainly in <a href=\"https://spcommreports.ohchr.org/TMResultsBase/DownLoadPublicCommunicationFile?gId=27256\">Lamjung and Manang, Western Nepal</a>.', 'The project is located along the Marsayandi Corridor, mainly in <a href=\"https://spcommreports.ohchr.org/TMResultsBase/DownLoadPublicCommunicationFile?gId=27256\">Lamjung and Manang, Western Nepal</a>. The transmission line is planned to be built specifically in villages such as the Bajhakhet village. The 220 kV transmission lines is designed to supply electricity generated from Masryangdi into the national transmission system and has been described as a ‘national pride project. The budget for the project is estimated to be around $200000000, and has received financial backing from The European Investment Bank (around 100 million Euro), and Investment from the Nepalese Government, with construction being undertaken by the <a href=\"https://www.lahurnip.org/european-investment-bank-eib-funded-220-kv-power-transmission-line-project-lamjung\">Nepal Electricity Authority</a>. The project has raised concerns due to the impact it will have on indigenous communities upon whose land the transmission lines will be built. In particular, the intimidation tactics employed by police and other public officials, as well as the lack of prior consultation carried out with affected communities in advance of the construction beginning, and the proper obtaining of free prior and informed consent, have been raised as key issues.', 'The FPIC and Rights forum is a grassroots network consisting of representatives from indigenous communities who live along the proposed Transmission line route, such as the Ghale, Gurung, Tamang and Bhujel communities. <a href=\"https://www.accountabilitycounsel.org/client-case/nepal-220-kv-marsyangdi-corridor-transmission-line/#:~:text=Accountability%20Counsel%20has%20been%20supporting,in%20their%20pursuit%20of%20justice\">Their communities will be negatively affected should the proposal go ahead</a>. Their request was for the transmission line to be rerouted, so as not to affect the indigenous land, and the culture and environment attached to it. Despite these concerns being voiced by the FPIC and Rights for years, the project has gone ahead. Concerns have been raised regarding what this indicates in terms of free, prior and informed consent, and whether this has been obtained prior to the project beginning. This has led to the EIB withdrawing their funding of the project, following an internal investigation. Other concerns have been raised regarding the threats and intimidation tactics used by police and government officials. These tactics have often been used in retaliation to protests, or to pressure individuals into consenting to them building on their land, using financial coercion to achieve this goal. Community members have been warned by officials that they must accept the project as it is a symbol of national pride. However, the building of the transmission line has often come at a cost of adverse environmental impacts, and the irreversible loss of culture, resources and livelihoods, as has been highlighted by the Office of the High Commissioner for Human Rights. Furthermore, protests from communities are met with police force. Upon the acquisition of land in Archalbot, NEA officials visited the site with 28 police officers to begin construction to build rings for holding wire on Tower no.33 B and 33 C, but were unable to due to protests. They returned on the 27th April 2022 with around 30 armed police, in order to suppress the protests and build the rings. As of May 2022 it has been reported that tensions have escalated, and communities have experienced physical attacks from the police, and have been arrested for obstructing the construction of the line.', 'The FPIC and Rights Forum have submitted petitions to local districts, such as the Besishahar municipality, national authorities and international investors to halt and reroute proceedings. In 2018, they submitted a formal complaint to the EIB, inciting a compliance review that resulted in the EIB suspending funding whilst <a href=\"https://www.lahurnip.org/european-investment-bank-eib-funded-220-kv-power-transmission-line-project-lamjung\">compliance issues regarding consent and inadequate prior consultation were addressed</a>. The EIB offered to faciloitate dialogue and mediation between the NEA and FPIC and Rights forum, which the NEA refused. On the 8th August 2021, the communities submitted an application to the Ministry of Home Affairs through the District Administration Office in Lamung, demanding for the towers to be built on alternative land to avoid the multi-dimensional impact it would have should it be built on indigenous land. The Raut Thok Village communities submitted an application to the NEA Office in Besishahar, asking them not to construct the transmission line in their village. The response was a delegation of Government Officials and Police being sent to the village to pressure the community to accept the project, with the Chief District officer of Lamjung accompanying armed police and NEA officials for a meeting. <a href=\"https://www.accountabilitycounsel.org/2020/10/indigenous-communities-in-nepal-launch-free-prior-and-informed-consent-protocol-for-eib-funded-marsyangdi-corridor-transmission-line/\">Around 25 women and indigenous peoples have been threatened with police action if they do not accept the project</a>. On the 8th December 2021, 14 indigenous communities reiterated complaints to the NEA, this time also about the intimidation that communities have been met with. They requested an investigation into the incident. However, on the 26 April 2022, five transmission towers were built in Dordi Rural Municipality-2, Archalbot. The owners of the land succumbed to financial pressure to accept compensation.', '<u>ILO Convention No. 169 (Ratified by Nepal 2007)</u>\r\n \r\n* Art 7(1) affirms the rights of Indigenous Peoples “to decide their own priorities for the process of development” and to “participate in the formulation, implementation and evaluation of plans and programmes for national and regional development which may affect them directly”\r\n* Art 14 (1) mandates recognition of Indigenous Peoples “rights of ownership and possession” over the lands they “traditionally occupy.” This includes “lands not exclusively occupied by them, but to which they have traditionally had access for their subsistence and traditional activities.”\r\n\r\n<u>Declaration on the Rights of Indigenous Peoples</u>\r\n \r\n* A26- asserts the right of Indigenous Peoples to ‘the lands, territories and resources which they have traditionally owned, occupied or otherwise used or acquired’\r\n* A 23 affirms the right of indigenous peoples “to determine and develop priorities and strategies for exercising their right to development.”\r\n* A32 tates that ‘States shall consult and cooperate in good faith with the indigenous peoples concerned through their own representative institutions in order to obtain their free and informed consent prior to the approval of any project affecting their lands or territories and other resources, particularly in connection with the development, utilization or exploitation of mineral, water or other resources’\r\n* A 28(1) states that “indigenous peoples have the right to redress, by means that can include restitution or, when this is not possible, just, fair and equitable compensation, for the lands, territories and resources which they have traditionally owned or otherwise occupied or used, and which have been confiscated, taken, occupied, used or damaged without their free, prior and informed consent.”\r\n* A28(2) states that t “unless otherwise freely agreed upon by the peoples concerned, compensation shall take the form of lands, territories and resources equal in quality, size and legal status or of monetary compensation or other appropriate redress.”\r\n\r\n\r\n<u>UN Declaration on the Right to Development</u>\r\n \r\n* A1(1) defines the right to development an inalienable human right by virtue of which every human person and all peoples are entitled to participate in, contribute to, and enjoy economic, social, cultural and political development\r\n\r\n<u>The Constitution of Nepal</u>\r\n \r\n* A51(b)(1) requires the Nepalese Government to ‘implement international treaties, agreements to which Nepal is a party’\r\n* A51(j)(8)- states the necessity to ‘make the indigenous nationalities (Aadibasi Janajati) participate in decisions concerning that community by making special provisions for opportunities and benefits in order to ensure the right of these nationalities to live with dignity, along with their identity, and protect and promote traditional knowledge, skill, culture, social tradition and experience of the indigenous nationalities and local communities’', 'The Marsayandi Corridor, particularly in the Lamjang District.', '$200000000 (estimated)', 'Ghale, Gurung, Tamang, Bhujel', 'October 2018', 'Nepal Electricity Authority <br/>Besishahar Municipality <br/>Ministry of Home Affairs <br/>Chief District Officer of Lamjung District <br/>Lamjung District Police Office', 'LAHURNIP <br/>Accountability Counsel', 'Report of the Special Rapporteur on the situation of human rights defenders; the Working Group on the issue of human rights and transnational corporations and other business enterprises; <a href = \"https://spcommreports.ohchr.org/TMResultsBase/DownLoadPublicCommunicationFile?gId=27256\">the Special Rapporteur on the right to development and the Special Rapporteur on the rights of indigenous peoples</a>.\r\n\r\n<a href = \"https://www.accountabilitycounsel.org/client-case/nepal-220-kv-marsyangdi-corridor-transmission-line/#:~:text=Accountability%20Counsel%20has%20been%20supporting,in%20their%20pursuit%20of%20justice\">Accountability Counsel Case report</a>\r\n\r\n\r\n<a href = \"https://www.lahurnip.org/european-investment-bank-eib-funded-220-kv-power-transmission-line-project-lamjung\">EIB report</a>\r\n\r\n\r\n\r\n<a href = \"https://www.accountabilitycounsel.org/2020/10/indigenous-communities-in-nepal-launch-free-prior-and-informed-consent-protocol-for-eib-funded-marsyangdi-corridor-transmission-line/\">Accountability Counsel, FPIC and Rights Forum, LAHURNIP, AIPP and IWGIA joint report</a>', '2024-02-28 22:53:11', '2024-02-28 22:53:11'),
(2, 'Sunkoshi-II hydropower project', '27.2456191', '86.1540337', 'Sunkoshi-II  is a reservoir based project that constitutes one component of a wider Sunkoshi Marin Diversion Multi-Purpose <a href=\"https://www.researchgate.net/publication/359159134_Simulation_of_Trade-Off_among_Planned_Reservoir_Projects_and_Inter-Basin_Transfer_Project_A_Case_Study_of_Sunkoshi_River_in_Koshi_Basin_Nepal\">Project</a>.', 'Sunkoshi-II  is a reservoir based project that constitutes one component of a wider Sunkoshi Marin Diversion Multi-Purpose <a href=\"https://www.researchgate.net/publication/359159134_Simulation_of_Trade-Off_among_Planned_Reservoir_Projects_and_Inter-Basin_Transfer_Project_A_Case_Study_of_Sunkoshi_River_in_Koshi_Basin_Nepal\">Project</a>. It is currently in the planning stage, following a controversial history regarding its planning, funding, and impacts. The project continues to generate controversy now, due to the threat it poses to indigenous lands, and the unacceptable neglect performed by relevant government or independent actors regarding FPIC. This particular Dam is projected to be built in the Sidhulu and Ramechhap districts, and is expected to generate 4.76 billion units of energy. Upon its initial conception, partial funding agreements were made with the ADB, who also agreed to carry out <a href=\"http://www.nepalenergyforum.com/adb-to-step-back-from-sunkoshi-2-and-3/\">feasibility studies and environmental impact assessments</a>. However, opposition to the project arose immediately from members of the Majhi people who live in the affected regions, make a living and have <a href=\"https://www.culturalsurvival.org/news/multipurpose-development-projects-threaten-submerge-majhi-indigenous-peoples-nepal\">historic cultural and medicinal ties to the river and the land</a>.  Despite continuous protests from the Majhi community, the ADB only withdrew its funding for the project due to clashes with other infrastructure projects. The Japan International Cooperation Agency requested the project be stopped as the reservoirs would inundate the BP and Mid Hill Highways, which were being funded by the Agency. The ADB therefore requested only upon <a href=\"https://www.culturalsurvival.org/news/multipurpose-development-projects-threaten-submerge-majhi-indigenous-peoples-nepal\">protests from another corporate agency</a>, that alternatives be investigated.  Distressingly, this only halted the procession of the project, as in 2019, <a href=\"https://www.business-standard.com/article/news-ani/nepal-bangladesh-agree-for-joint-investment-in-hydropower-projects-119062200831_1.html\">agreements were made at the Energy Secretary level meeting between Nepal and Bangladesh</a> whereby white papers proposing projects including Sunkoshi-II were accepted.  It is anticipated that Bangladesh will invest $2 billion into various hydropower projects in Nepal, including the Sunkoshi II project, in return for energy generated by the projects once they are completed. This agreement was signed under the <a href=\"https://thenepalweekly.com/2022/03/08/9855/\">BBIN initiative</a>. Currently, further investment is still being secured, however the project is anticipated to cost <a href=\"https://www.nepalindata.com/media/resources/items/13/bSunkoshi-II-Storage-Hydroelectric-Project.pdf\">$1027 million<a/>. The owner of the Sunkoshi-II project is the Nepal Electricity Authority.', 'The project, should it go forward, will submerge the majority of settlements along the river. This predominantly means, but is not limited to, the Mahji indigenous community. Around 6000 households and 400’000 people are at risk of being <a href=\"https://cemsoj.wordpress.com/2021/10/06/nepals-indigenous-majhi-communities-demand-cancellation-of-sunkoshi-2-hydropower-project/\">displaced</a> across the two districts.  The large-scale displacement could wipe out the entire identity and language of the community itself, since <a href=\"https://www.culturalsurvival.org/news/multipurpose-development-projects-threaten-submerge-majhi-indigenous-peoples-nepal\">displacement often leads to dispersal</a>.  Furthermore, the occupations of fishing and boating, the medicinal herbs they harvest along the river, the ancestral lands and the cultural practices that come with it will all be submerged. The Mahji are one of 59 communities identified as <a href=\"https://www.adb.org/sites/default/files/linked-documents/47036-001-nep-ippfab.pdf\">highly marginalised</a>. Their separation from Nepalese society means that their integration as a result of forced displacement would be all the more challenging. Despite this, the government has scarcely acknowledged the risks posed to the community as a result of the project, meaning that practices associated with the river, such as the hugely significant cremation of their dead, are being overlooked and unrecognised. No free, prior or informed consent  has been attained, and <a href=\"https://www.culturalsurvival.org/news/multipurpose-development-projects-threaten-submerge-majhi-indigenous-peoples-nepal\">the Environmental Impact Assessment has not been made publicly available in Mahji</a>, therefore many members of the community still do not know what the contents of the assessment says.  Furthermore, as a result of their marginalisation, and lack of common language, few members of the community have registered land in their name. Despite this, the historical nature of the community and its ties to the land means they are entitled to compensation and consultation in international law. Therefore the lack of both of these issues is a direct violation of their rights under international law.', 'Numerous attempts to advocate on the behalf of the Majhi Tribe, both in the form of written and physical protest, have been made. The Sunkoshi Marine Diversion Project Affected Committee has been mobilised and has written a 13 point demand to the Ramechhap District administration office, and delivered it by hand on the 3rd October 2021 also to the Ministry of Energy, Water Resources and Irrigation and the Office of the Prime Minister. One of the demands was to make the EIA public in the Mahji language, another being that they are meaningfully consulted, and a field survey be carried out with participation of affected community members. The letter was also handed to the Director General of the Department of Electricity, who stated that the project was in the phase of its EIA, which community members would be consulted for. Another letter demanding the cessation of the project was sent by the committee on the 30th september 2021 to the Chief District Officer of Ramechhap, and the Mayor of the Manthali Municipality. On the 4th October, Mahiji representatives met with Nepal’s Prime Minister to hand over the demand letter, and submitted the same letter to the National Human Rights Commission and the Indigenous Nationalities Commission. There has been little response, and consultation has still not occurred. Furthermore, drones have been flown over the villages and around the affected area, to carry out surveys without dispatching individuals to the area, therefore avoiding physical interactions with affected communities, where they may be able to vocalise their concerns. \r\n\r\nProtests have been met with apathy from government officials. The Nepal Majhi Womans Association has raised awareness and rallied support within affected communities and at a national level. However, despite the support they have garnered, they have received no response from government officials. On the 30th September, village members from all over Ramechhap and Sidhuli held a protest whereby they wore traditional dress and played their music on traditional instruments, chatting for the annulment of any plans for Sunkoshi-II. However, the assurance that their demands were taken seriously, as assured by the Chief District Officer of Ramechhap, has yet to be proven, as no amendment to the project plan has been made.', 'ILO Convention No. 169 (Ratified by Nepal 2007)\r\n Art 7(1) affirms the rights of Indigenous Peoples “to decide their own priorities for the process of development” and to “participate in the formulation, implementation and evaluation of plans and programmes for national and regional development which may affect them directly”\r\nArt 14 (1) mandates recognition of Indigenous Peoples “rights of ownership and possession” over the lands they “traditionally occupy.” This includes “lands not exclusively occupied by them, but to which they have traditionally had access for their subsistence and traditional activities.”\r\nUN Declaration on the Rights of Indigenous People\r\nA 23 affirms the right of indigenous peoples “to determine and develop priorities and strategies for exercising their right to development.”\r\nA32 states that ‘States shall consult and cooperate in good faith with the indigenous peoples concerned through their own representative institutions in order to obtain their free and informed consent prior to the approval of any project affecting their lands or territories and other resources, particularly in connection with the development, utilization or exploitation of mineral, water or other resources’\r\nA 28(1) states that “indigenous peoples have the right to redress, by means that can include restitution or, when this is not possible, just, fair and equitable compensation, for the lands, territories and resources which they have traditionally owned or otherwise occupied or used, and which have been confiscated, taken, occupied, used or damaged without their free, prior and informed consent.”\r\nA28(2) states that  “unless otherwise freely agreed upon by the peoples concerned, compensation shall take the form of lands, territories and resources equal in quality, size and legal status or of monetary compensation or other appropriate redress.”\r\nUN Declaration on the Right to Development \r\nA1(1) defines the right to development an inalienable human right by virtue of which every human person and all peoples are entitled to participate in, contribute to, and enjoy economic, social, cultural and political development\r\nThe Constitution of Nepal\r\nA51(b)(1) requires the Nepalese Government to ‘implement international treaties, agreements to which Nepal is a party’\r\nA51(j)(8)- states the necessity to ‘make the indigenous nationalities (Aadibasi Janajati) participate in decisions concerning that community by making special provisions for opportunities and benefits in order to ensure the right of these nationalities to live with dignity, along with their identity, and protect and promote traditional knowledge, skill, culture, social tradition and experience of the indigenous nationalities and local communities’\r\nLand Acquisition Act 1977\r\nA7- (1) Compensation shall be paid for losses resulting from clearing of crops and trees, and of demolition of walls, etc., or for damage, if any, suffered as a result of the removal or digging of earth, stone, ditches, or boring. \r\n(3) In case the concerned person is not satisfied with the amount of compensation determined under Sub-Section (2), he/she may file a complaint with the chief District Officer on which he/she receives information thereof, and in such cases the decision of the Chief District Officer shall be final.', 'Dudhbhanjyan Vilade VDC and Rampur VDC', '$1027 million', 'The Mahji Community', '2013', 'NEA, Director General of the Department of Electricity,  Ministry of Energy, Water Resources and Irrigation, the Nepali Prime Minister, Chief District Officer of Ramechhap, Mayor of the Manthali Municipality', 'N/A', 'Simulation of Trade-Off among Planned Reservoir Projects and Inter-Basin Transfer Project: A Case Study of Sunkoshi River in Koshi Basin, Nepal- report by Manoj Bista, Ram Krishna Regmi, Divas Bahadur Basnyat, Utsav Bhattarai and Mukesh Raj Kafle\r\nhttps://www.researchgate.net/publication/359159134_Simulation_of_Trade-Off_among_Planned_Reservoir_Projects_and_Inter-Basin_Transfer_Project_A_Case_Study_of_Sunkoshi_River_in_Koshi_Basin_Nepal\r\nNepal Energy Forum- ADB to step back from Sunkoshi 2 and 3\r\nhttp://www.nepalenergyforum.com/adb-to-step-back-from-sunkoshi-2-and-3/\r\nCultural Survival Article\r\nhttps://www.culturalsurvival.org/news/multipurpose-development-projects-threaten-submerge-majhi-indigenous-peoples-nepal\r\nBusiness Standard- Nepal, Bangladesh agree for joint investment in hydropower projects\r\nhttps://www.business-standard.com/article/news-ani/nepal-bangladesh-agree-for-joint-investment-in-hydropower-projects-119062200831_1.html\r\nThe Nepal Weekly- Trilateral cooperation is a need for Nepal-Bangladesh energy trade\r\nhttps://thenepalweekly.com/2022/03/08/9855/\r\nNepal In Data Sunkoshi-II summary\r\nhttps://www.nepalindata.com/media/resources/items/13/bSunkoshi-II-Storage-Hydroelectric-Project.pdf\r\nCEMSOJ Report\r\nhttps://cemsoj.wordpress.com/2021/10/06/nepals-indigenous-majhi-communities-demand-cancellation-of-sunkoshi-2-hydropower-project/\r\nADB Preparatory Report\r\nhttps://www.adb.org/sites/default/files/linked-documents/47036-001-nep-ippfab.pdf', '2024-02-28 23:00:16', '2024-02-28 23:00:16'),
(3, 'Sunkoshi-3 Hydropower Project', '27.4538771', '85.8115658', 'The Sunkoshi III Storage Hydropower Project is a proposed storage dam that will be located at Temal Rural Municipality-9 of Kavre and Khandevi Rural Municipality.  The Kavre district is home to Tamang Indigenous communities.', 'The Sunkoshi III Storage Hydropower Project is a proposed storage dam that will be located at Temal Rural Municipality-9 of Kavre and Khandevi Rural Municipality.  The Kavre district is home to Tamang Indigenous communities.  According to the reports from the Department of Power Development, the technical study of the project, drawing design, geological survey, topography survey, cost estimation of the project, economic and financial analysis, biological and social studies have been performed and completed.  This particular storage project is part of a wider agreement between Bangladesh and Nepal and was confirmed in a meeting that involved the Secretary of the Ministry of Electricity, Energy and Mineral Resources of Bangladesh, and the Ministry of Energy, Water Resources and Irrigation of Nepal, the Department of Electricity Development and the Nepal Electricity Authority.  The Ministry of Forests and Environment has determined the scope of the EIA, and will has confirmed their approval of the EIA report regarding the plans for Sunkoshi III.  The feasibility study of the project is in its final stage, and construction is soon to begin, currently  consultations must be carried out with project affected local individuals and communities, before the final findings of the reports can be considered.  The project is expected to commence from 2029.  The predicted price of the project is $1’458’000’000, and it is clearly intended to be a cross border project, whereby Bangladesh will fund the construction of the dam that will funnel electricity back over the border upon completion, however, specific financing sources have yet to be identified.  Proposals for sponsorship from Bangladeshi conglomerates Summit Group and United Group have been made, however other financiers have yet to be confirmed.  Similarly, the findings of the EIA have only recently been published', 'The project is anticipated to have significant consequences on the land and residents around it. A total of 1’364’022 acres of land will be utilized in the construction of Sunkoshi III. This will encompass several rivers and lakes. Not only this, but 3’600 households are predicted to lose their land and homes at least partially.   However, it seems in this case that the rights of potentially displaced locals have been respected insofar as this project has been carried out. Feasibility reports and EIA’s have reportedly been carried out with consultation with local communities.  Furthermore, plans for relocation have also been put forward by a study carried out by JICA.  However, little discussion has been had around compensation for displaced communities. Promises have been made stating that the affected area will receive Rs 500 million annually from project royalties.   The specifics of this pledge have not been confirmed. Locals are reportedly enthused about the prospect of construction beginning.  This contrasts with many other community responses to hydropower projects and their process of construction, even from communities affected by projects nearby.  Perhaps this speaks to the ability of communities to compromise should they be meaningfully consulted and compensated, once their FPIC is obtained. It is however worth bearing in mind that a further consequence of the project’s completion is an increased risk of flooding of communities in the district as a result of the dam’s presence.', 'N/A', 'N/A', 'Temal Rural Municipality-9', '$1’458’000’000', 'Communities within Kavre, Ramechhap, Sindhupalchok, Dolakha, and Sindhuli districts, including the Tamang Indigenous community', '1985', 'The Ministry of Energy, Water Resources and Irrigation of Nepal, the Department of Electricity Development, The Nepal Electricity Authority, and the Ministry of Forests and Environment.', 'N/A', 'MyRepublica Report: Cost of Sunkoshi-III hydropower project estimated at Rs 160 billion\r\nhttps://myrepublica.nagariknetwork.com/news/cost-of-sunkoshi-iii-hydropower-project-estimated-at-rs-160-billion/\r\nThe Annual Kathmandu Conference on Nepal and the Himalayas Report\r\nhttps://annualconference.soscbaha.org/topic/dashain-celebration-among-the-tamang-community-and-producing-doxa-an-indigenous-perspective/\r\nSpotlight Nepal Report: Sunkoshi-III Reservoir Power Project is Viable\r\nhttps://www.spotlightnepal.com/2022/07/04/sunkoshi-iii-reservoir-power-project-viable-study/\r\n\r\nNepal Energy Forum: Bangladesh Serious to Invest in Sunkoshi-III Reservoir Hydropower Project\r\nhttp://www.nepalenergyforum.com/bangladesh-serious-to-invest-in-sunkoshi-iii-reservoir-hydropower-project/\r\n\r\nThe Kathmandu Post: Nepal-Bangladesh joint venture project gets environmental nod\r\nhttps://kathmandupost.com/national/2022/12/07/nepal-bangladesh-joint-venture-project-gets-environmental-nod\r\nPowerTechnology Sunkoshi-III profile. \r\nhttps://www.power-technology.com/marketdata/power-plant-profile-sunkoshi-3-nepal/?cf-view\r\n\r\nOnlineKhabar report: Joint investment of Nepal and Bangladesh in Sunkoshi-III, signed within 6 months \r\nhttps://www.onlinekhabar.com/2023/05/1307984\r\nBangladesh Working Gorup on Ecology and Development Sunkoshi-III profile\r\nhttps://bwged.blogspot.com/p/sunkoshi-iii-683-mw-hydropower-plant.html\r\nNepal Infrastructure report: The sunkoshi-III project enjoys political support\r\nhttps://nepalinfrastructure.com/7886/\r\nNational Indigenous Womans Forum Report\r\napwld.org/wp-content/uploads/2022/02/Nepal-Land-FPAR-NIWF.pdf', '2024-02-28 23:02:00', '2024-02-28 23:02:00'),
(4, 'Sunkoshi Marin Diversion Multipurpose Project', '27.3494183', '85.9831174', 'Sunkoshi Marine Diversion multi-purpose project is being built by the Government of Nepal as a project of national pride with the objective of irrigating 1,22,000 hectares of land in 5 districts including Bara, Rautahat, Dhanusha, Mahotari and Sarlahi of Province No. 2 through irrigation of Bagmati River.', 'Sunkoshi Marine Diversion multi-purpose project is being built by the Government of Nepal as a project of national pride with the objective of irrigating 1,22,000 hectares of land in 5 districts including Bara, Rautahat, Dhanusha, Mahotari and Sarlahi of Province No. 2 through irrigation of Bagmati River. According to the draft environmental impact assessment report published in July 2019, except for irrigation, 28.62 MW of electricity is also aimed to generate by constructing a 12-meter-high dam on Sunkoshi river of Sunkoshi rural municipality ward no. 6 and releasing the water to the river of Marin river of Kusumtar in ward no. 2 of Kamalamai through a 13.1 km long tunnel. A reservoir will be constructed on 312 hectares of land within Sunkoshi rural municipality ward no. 6, Khadadevi rural municipality ward no. 4 and Manthali municipality ward no. 6 under the project. In addition, its dam and sediment pond will lie in Sunkoshi rural municipality ward no. 7 and other structures in Kamalamai Municipality ward no. 2.\r\nA total cost of the project is Rs. 86.51 billion which is divided as Rs. 37.20 billion for irrigation and Rs. 46.19 billion for hydropower. According to the Draft Environmental Impact Assessment Report, there is a total population of 15,872 and 3,026 households in the villages and municipalities of the project area. In which, there are 22.265 per cent Tamang and 20.63 per cent Chhetri, followed by Magar and Brahmins, furthermore, the Indigenous Majhi community stands to be affceted by the project.', 'A total of 345.6 hectares of land is required for the project, of which 339.20 hectares are required permanently and 6.39 hectares for temporary use. Out of the land to be used permanently, 69.46 hectares of private land is with land ownership certificate, 18.37 hectares of land is without land ownership certificate and the remaining 251.34 hectares is government land, out of which forest area 4.48 hectares, community forest 2.1 hectare, 50.37 hectare covered by the river and 182.63 hectares is riverside.\r\nSimilarly, 4,234 people from 532 households will be directly affected by the project due to land acquisition. According to the Environmental Impact Assessment Report, the project will directly affect 43 houses, 30 cowsheds, 3 generator houses, 15 underground dug wells, 2 solar panels and 1 drinking water supply system operated from it. About 90 percent of the people living in the inundated area belongs to the Indigenous Majhi community. In the inundation area, 24 houses, 19 tents, 3 water pumping houses, 15 tubewells, two small solar panels, tubewells of Khadadevi village drinking water project, power house and solar panel, about 794 m of irrigation canals and two suspension bridges will have a direct adverse effect from the project as per the report. The affected communities in the Inundation area said they had no information about the household questionnaire or public hearing as mentioned in the environmental impact assessment report. In addition, the affected community has also claimed that the land and houses to be inundated by the project have not been inspected. According to Urbe Majhi of Masantar, who was directly affected by the project, the land to be acquired during the construction of the project has not been clearly mapped. However, false assurances have been given that only half of his land will be included in the project and the rest will not be inundated.\r\nIn addition, the report does not appear to have a slight study on the social, cultural, historical and other multidimensional aspects of the indigenous peoples. Rajagaon, located at Khadadevi Village Municipality ward no. 4 of Ramechhap district, is the historical and ancestral home of the Majhi community. Rajagaon means the village where the king lives and here the ruins of the palace of king of Majhi community, the Mandare, remains.', 'Since the representation of the Majhi community has been overlooked and underprioritized, the community ahs responded by forming a committee to try and force project officials to recognize their interests. As the Sunkosho Marine Diversion Project Affected Committee states, they are not agains development, but they demand that they not be displaced, and that the lack of information and involvement regarding the effects and potential benefits of the project be rectified.   The committee has subsequently released a 13 point demand list to the relevant authorities. These demands include that any relevant information or assessment report findings be made available and in a language understandable to affected communities, that meaningful consultation with the Majhi community be pursued, especially by the Compensation Determination Committee, land for land compensation be offered where necessary and that profits from the projects be used for the benefit of affected indigenous groups, amongst other demands.  The demands were accompanied by threats that failure to comply or acknowledge them would result in further protests. There has been little reported on the response of the authorities, however, we know that the project has been facing other issues, chiefly lack of funding, and lack of payment for the China Oversees Engineering Group, who won the contract for the construction of the Project’s tunnel in 2021.', 'Under Nepal’s Treaty Act, 2047 (1990), the provisions of a treaty that Nepal has signed are enforceable as national law, and prevail in case of inconsistency with the latter. The country is therefore bound by the provisions of the Convention no. 169 of the International Labor Organization (ILO) and the United Nations Declaration on the Rights of Indigenous People (UNDRIP), among other international law instruments. Taking this into account, many rights of the indigenous peoples and affected communities were violated as a result of the project:\r\n\r\n-        Free, Prior and Informed Consent (FPIC): it is a specific right granted by UNDRIP and that aligns to IPs universal rights to self determination. This principle allows them to withhold or withdraw consent regarding projects impacting their territories, and allows them to engage in negotiations, shape, design, implementation, monitoring and evaluation of the projects. It is mentioned in UNDRIP in regards to relocation, dispossession of lands, cultural, religious or spiritual property, cooperation, development and more; and has been violated in several occasions as a result of the project. \r\n-        Right to not be forcibly removed from one’s land or territory (UNDRIP, art 10): “No relocation shall take place without free, prior and informed consent of the indigenous peoples concerned and after agreement on just and fair compensation and, where possible, with the option of return”. \r\n-        Right to inclusive and meaningful consultation. The ILO Convention establishes the right to consultation to peoples concerned through appropriate procedures regarding measures that may affect them directly, as well as participation in the formulation, implementation and evaluation of plans and programmes for national and regional development which may affect them directly (Arts 6.1.a and 7.1). Furthermore, UNDRIP establishes the right to participate in decision-making in matters which would affect their rights (art. 18), as well as the right to determine and develop priorities and strategies for exercising their rights to development (art. 23). \r\n-        Right to livelihood and means of sustenance: UNDRIP, in art. 20 establishes the right for IPs to be secure in the enjoyment of their own means of subsistence and development, and to engage freely in all their traditional and other economic activities. Furthermore, when deprived of such means, they are entitled to a just and fair redress. \r\n-        Right to fair compensation and redress: protected by art. 8.2 UNDRIP, for deprivation of cultural values, dispossession from lands, territories or resources and forced population transfers. \r\n-        Right to decide regarding their development: art. 7.1. ILO protects the right to decide their priorities for development, allowing them to participate in the formulation, implementation and evaluation of plans and programmes for national and regional development which may affect them directly. \r\n-        Right not to be subjected to forced assimilation or destruction of their culture (art. 8.1 UNDRIP), and to maintain, protect and develop manifestations of their culture (art. 11 UNDRIP), and to maintain, protect and have access to their religious and cultural sites (art. 12 UNDRIP).', 'Sunkoshi rural municipality ward no. 6, Khadadevi rural municipality ward no. 4 and Manthali municipality ward no. 6', 'N/A', 'Tamang, Chhetri, Magar, Brahmins, Majhi COmmunitites', '2019', 'The Government of Nepal', 'N/A', 'N/A', '2024-02-28 23:03:47', '2024-02-28 23:03:47');
INSERT INTO `projects` (`id`, `project_name`, `latitude`, `longitude`, `summary`, `description`, `impacts`, `advocacies_undertaken`, `rights`, `location`, `budget`, `affected_communities`, `conflict_start`, `government_actors`, `advocacy_org`, `relevant_link`, `created_at`, `updated_at`) VALUES
(5, 'Tanahu Hydropower Project', '27.9632942', '84.276782', 'The Tanahu Hydropower Project is a storage type hydropower project with an installed capacity of 140 MW and an estimated average annual energy generation of 587.7 GWh (years 1-10) and 489.9 GWh (year 11 onwards). The project is designed to meet the electricity demand in Nepal, providing alternatives to fossil fuel based power generation.', 'The Tanahu Hydropower Project is a storage type hydropower project with an installed capacity of 140 MW and an estimated average annual energy generation of 587.7 GWh (years 1-10) and 489.9 GWh (year 11 onwards). The project is designed to meet the electricity demand in Nepal, providing alternatives to fossil fuel based power generation. It consists of a <a href=\"https://www.adb.org/projects/43281-013/main\">proposed</a> 140 metre high hydropower dam, with a 25 kilometre reservoir sited along the Seti River, near the town of Damauli in the Tanahu District, about 150 km west of Kathmandu. It also involves rural electrification and community development in the project area, as well as a reform and restructuring plan for the national utility, the NEA. The Project area covers two urban municipalities, Vyas and Bhimad, and two rural municipalities, Rishing and Myagde. The total cost of the project is estimated around 505 million dollars, and it is financed by the Asian Development Bank (ADB), the European Investment Bank (EIB) and the Japan International Cooperation Agency (JICA). \r\n\r\nAlthough the project aims to harness Nepal’s hydropower potential and contribute to its energy needs, it has brought numerous challenges and adverse effects for the indigenous communities residing in the project vicinity. \r\n\r\nOne of the major concerns is the displacement of indigenous communities from their ancestral lands and the subsequent disruption of their livelihoods. Indeed, the EIA Addendum of 2012 identified 838 households as Project Affected Families, whose land or property was acquired temporarily or permanently, among which 86 were from the inundation and risk zone of the reservoir area and considered relocates, completely displaced from their ancestral lands. Many of these communities rely on agriculture, fishing, and other activities related to natural resources. The construction of the hydropower project can lead to the loss of productive lands and natural resources, resulting in a decline in livelihood opportunities for these communities. The displacement and resettlement often disrupt existing economic systems and can force communities into unfamiliar economic activities or dependency on external sources for their livelihoods. This can perpetuate cycles of poverty and exacerbate existing socio-economic disparities within affected communities. \r\n\r\nThe process of resettlement and compensation has often been contentious, with communities demanding fair treatment and adequate compensation for their losses, which they often have struggled to obtain. Moreover, the participation and consultation of indigenous communities in the decision-making processes related to the project have been inadequate. Their right to free, prior and informed consent has often been disregarded, marginalising their voices and undermining their authority to decide and shape the project’s development, which works against their rights enshrined in the UNDRIP. Indeed, communities and supporting organisations have often protested about this. The FPIC process should involve the engagement of meaningful consultations, providing accurate and understandable information about the potential impacts and risks, and the creation of an environment where community members can express their opinions and concerns. Then, it should be an inclusive and transparent mechanism that allows indigenous communities to participate at all stages of the project, including planning, implementation and beyond, and ensure that they have an opportunity to voice their perspectives and concerns regarding potential impacts on their lives and territories, and ultimately give or withdraw their consent.\r\n\r\nOn top of that, the project also <a href=\"https://cemsoj.wordpress.com/2016/12/19/tanahu-hydropower-project-affected-communities-submit-26-point-memorandum-to-energy-minister/\">erodes</a> traditional knowledge, practices, and cultural heritage, as communities have rich cultural traditions closely tied to their natural surroundings. This includes rituals, ceremonies, and traditional ecological knowledge, which are disrupted by the project in the form of loss of access to sacred sites, forests and water sources, which can significantly impact the transmission of knowledge. Ultimately, the loss of cultural heritage can have long-lasting implications for indigenous communities as it affects their resilience and identity.', 'As per the <a href=\"https://thl.com.np/#/about\">Land Acquisition Act</a>, 2034, section 3, the Government of Nepal can acquire any land at any place for any public purpose, subject to compensation under the Act.\r\nHowever, the act also provides for preliminary action (art. 6) and compensation for losses on land acquisition, which shall be paid (art. 7). Furthermore, article 11 establishes the right of landowners to file complaints after the issued notice of their land being acquired. \r\nUnder this Act, compensation for the land shall be paid in cash and a committee consisting of an officer appointed by the Chief District Officer, Land Revenue Office, Project Head if the land is acquired for the project and a representative of the concerned village or municipality, as provided in article 13. Article 14 provides that land can be given instead of land in case of acquisition of land as per the Act, if the person who owns the entire land in the place where such land has been acquired wants to take land elsewhere as compensation. If any publicly owned land, or sold by the Government of Nepal as per prevailing law, the Government may give such land in compensation. \r\n\r\nInitially, it was estimated that around <a href=\"https://cemsoj.wordpress.com/human-rights-advocacy/tanahu-hydropower-project/\">838 households</a> were affected by the construction of the hydropower project, the majority of them being indigenous peoples. Being dispossessed from their lands, the project also has <a href=\"https://www.adb.org/sites/default/files/project-documents/43281/43281-013-emr-en_8.pdf\">major</a> impacts on the livelihoods of affected people, which are mainly agriculture, fishing, fuel wood and fodder collection. \r\n\r\nThe Majhi, Bote, Danuwar and Darai are indigenous and marginalised groups whose ancestral profession is fishing. However, this means of subsistence is affected by hydropower projects because they involve damming and alteration of river flows, which can significantly affect the aquatic ecosystem, fish populations and their habitats, as well as disrupt migration routes and breeding patterns of fish. This can lead to reduced fish populations and ultimately impact on fishermen’s source of income and food security. Furthermore, the displacement of indigenous communities from ancestral lands disrupts farming activities and causes the loss of their primary source of income. Hydropower projects involve the alteration of natural water flow patterns, which can cause changes in water availability, and thus adversely impacting agriculture. \r\nLocal communities have continuously protested, among other issues, about the lack of compensation due to land loss, and, if given, about their lack of participation in the determination of such compensation, which has been consistently disproportionate and discriminatory. They have also demanded land-for-land and house-per-house compensation, which has not been acquired. Among the issues that arise regarding land loss compensation is the fact that many families have inhabited lands for generations but are not legal owners of such lands, who demand to be recognised as such.', 'After the signing of loans and approval of the project, in 2016, the project affected communities came together under two committees, namely the Tanahu Hydropower Directly Affected Area Concerned Committee and Directly Concerned Inundation Area Conservation Committee, to submit a memorandum with 26 point demands to Tanahu Hydropower Limited (THL) and the NEA, the concerned local and national government authorities and the parliamentarians with copies of it sent to political parties, financiers and media. The memorandum, overall, called for sharing of project information, conduct of meaningful consultations with the affected communities, establishment of local consultation forums, representation of the affected communities in compensation determination, conduct of a re-survey for affected lands that were left out, arrangements for common properties and provision of one house one employment for the affected families, as well as free shares and electricity of the Project. A meeting with both committees was called by the District Administration Office regarding determination of compensation of the affected properties, although it did not result in any agreement. \r\n\r\nMany actions were undertaken by the committees in protest about the compensation. In 2017, they issued a press release restating their major concerns and explaining that compensation had been arbitrarily determined without their participation or concern, and that it was discriminatory. Furthermore, they registered a complaint against the determination of this compensation at Nepal’s Home Ministry, and submitted their memorandum to the National Human Rights Commission. A protest rally and assembly were also carried out, and participated by at least 350 people at the district administration against this decision, and in demand of land for land and house for house compensation, respect for ADB safeguards, and conduct of meaningful consultations. The Committees representatives met, a month later, with the Minister of Home Affairs, who said the provisions of the ADB and EIB safeguards would be implemented, and who asked the THL to revise compensation rates; and the Minister of Energy, who gave assurances to provide compensation to those who don’t have legal ownership of lands. They also met with Nepali congress leaders and THL Managing director and ADB representatives. All in all, THL engaged in negotiations with the two Committees, who ended up signing a 21-point agreement covering 26 point demands, by which the THL agreed to provide cultivation disruption allowances. A group of 31 families from Paltyang and Rishing Patan and six joint owners of a land plot, who were not satisfied with the agreement formed a new committee called Directly Inundation Affected Peoples Collective Rights Protection Committees, and submitted their 12-point demands in a memorandum to the authorities and the THL, and later filed a complaint with the ADB’s Accountability Mechanism, but it was later declared ineligible. Among other forms of advocacy, community-led research was conducted among the Project affected families and found that 75% of them had not been consulted and 84% had not received any compensation. \r\n\r\nIn 2020, a new complaint was filed with the ADB’s Accountability Mechanism and the EIB Complaint Mechanism (EIB-CM), calling for land for land and house for house compensation, re-survey of land left out during the previous land survey, and free, prior and informed consent, among others. This time complaints were acknowledged and admitted, and ended up with the agreement on the conduction of an IPs socio-cultural-economic study and land valuation study.  Also, other Magar and Dalit families sent letters to the THL and the authorities, raising concerns about the lack of information sharing and meaningful consultations, which were unfortunately not acknowledged or responded to. They were finally submitted to the EIB-CM and accepted, and a first joint meeting with the Complainants and THL representatives was organised for July 2022. \r\n\r\nOverall, the affected communities conducted advocacy in two main forms: complaints before the company, its financiers and the authorities, and protests and rallies.', 'Under Nepal’s Treaty Act, 2047 (1990), the provisions of a treaty that Nepal has signed are enforceable as national law, and prevail in case of inconsistency with the latter. The country is therefore bound by the provisions of the Convention no. 169 of the International Labor Organization (ILO) and the United Nations Declaration on the Rights of Indigenous People (UNDRIP), among other international law instruments. Taking this into account, many rights of the indigenous peoples and affected communities were violated as a result of the project:\r\n\r\n-        Free, Prior and Informed Consent (FPIC): it is a specific right granted by UNDRIP and that aligns to IPs universal rights to self determination. This principle allows them to withhold or withdraw consent regarding projects impacting their territories, and allows them to engage in negotiations, shape, design, implementation, monitoring and evaluation of the projects. It is mentioned in UNDRIP in regards to relocation, dispossession of lands, cultural, religious or spiritual property, cooperation, development and more; and has been violated in several occasions as a result of the project. \r\n-        Right to not be forcibly removed from one’s land or territory (UNDRIP, art 10): “No relocation shall take place without free, prior and informed consent of the indigenous peoples concerned and after agreement on just and fair compensation and, where possible, with the option of return”. \r\n-        Right to inclusive and meaningful consultation. The ILO Convention establishes the right to consultation to peoples concerned through appropriate procedures regarding measures that may affect them directly, as well as participation in the formulation, implementation and evaluation of plans and programmes for national and regional development which may affect them directly (Arts 6.1.a and 7.1). Furthermore, UNDRIP establishes the right to participate in decision-making in matters which would affect their rights (art. 18), as well as the right to determine and develop priorities and strategies for exercising their rights to development (art. 23). \r\n-        Right to livelihood and means of sustenance: UNDRIP, in art. 20 establishes the right for IPs to be secure in the enjoyment of their own means of subsistence and development, and to engage freely in all their traditional and other economic activities. Furthermore, when deprived of such means, they are entitled to a just and fair redress. \r\n-        Right to fair compensation and redress: protected by art. 8.2 UNDRIP, for deprivation of cultural values, dispossession from lands, territories or resources and forced population transfers. \r\n-        Right to decide regarding their development: art. 7.1. ILO protects the right to decide their priorities for development, allowing them to participate in the formulation, implementation and evaluation of plans and programmes for national and regional development which may affect them directly. \r\n-        Right not to be subjected to forced assimilation or destruction of their culture (art. 8.1 UNDRIP), and to maintain, protect and develop manifestations of their culture (art. 11 UNDRIP), and to maintain, protect and have access to their religious and cultural sites (art. 12 UNDRIP).', 'Damauli, Tanahu District', '505 million USD', 'The Majhi, Bote, Danuwar and Darai communities. estimated total of 838', 'August 2009', 'Ministry of Energy, Nepal Electricity Authority', 'N/A', 'CEMSOJ, Tanahu Hydropower Project Timeline: https://cemsoj.wordpress.com/human-rights-advocacy/tanahu-hydropower-project/\r\n\r\nCEMSOJ, Tanahu Hydropower Project affected communities submit 26-point memorandum to Energy Minister, 19 Dec 2016: https://cemsoj.wordpress.com/2016/12/19/tanahu-hydropower-project-affected-communities-submit-26-point-memorandum-to-energy-minister/ \r\n\r\nTanahu Hydropower Limited website: https://thl.com.np/#/about\r\n\r\nADB’s Project Site on Tanahu Hydropower Project: https://www.adb.org/projects/43281-013/main \r\n\r\nA case study of Tanahu Hydropower Project, by Rashmi K. Shrestha and Ratan Bhandari https://issuu.com/forumonadb/docs/a_case_study_of__tanahu_hydropower_ \r\n\r\nABD’s Environmental Monitoring Report (2021) of Tanahu Hydropower Project: https://www.adb.org/sites/default/files/project-documents/43281/43281-013-emr-en_8.pdf', '2024-02-28 23:05:55', '2024-02-28 23:05:55'),
(6, 'Thankot-Chapagaun-Bhaktapur 132 kV Transmission Line', '27.6487496', '85.2900386', 'The Thankot-Bhaktapur transmission line is designed to bring power into the Kathmandu valley, to prevent power outages, in anticipation of a drastic increase in energy demand by 2050. Substations were <a href=\"https://thehimalayantimes.com/business/construction-of-eight-high-capacity-substations-underway-in-the-valley\">originally proposed</a> to be built in Lapsiphedi, Matatirtha, Futung, Teku, Mulpani, Thimi, and Changunarayan.', 'The Thankot-Bhaktapur transmission line is designed to bring power into the Kathmandu valley, to prevent power outages, in anticipation of a drastic increase in energy demand by 2050. Substations were <a href=\"https://thehimalayantimes.com/business/construction-of-eight-high-capacity-substations-underway-in-the-valley\">originally proposed</a> to be built in Lapsiphedi, Matatirtha, Futung, Teku, Mulpani, Thimi, and Changunarayan.  After protests and demands for relocations of substations, and rerouting of the transmission line, a substation has been <a href=\"https://myrepublica.nagariknetwork.com/news/nea-to-expedite-construction-of-132-kv-substation-in-chobhar/?categoryId=opinion\">proposed</a> in Chobhar as well.  The project was first proposed in 2001, and building commenced in 2004. However, the project has been ongoing for decades, due to opposition from locals obstructing building and encouraging contractors to drop the project. Locals around Lalitpur, in particular, <a href=\"https://thehimalayantimes.com/kathmandu/obstruction-in-construction-of-132-kv-chobhar-substation-cleared\">Harisiddhi and Lamatar VDC locals</a> have adamantly refused to relocate or allow building to be carried out on their lands.  This includes <a href=\"\">Shrethsa and Tamang</a> community members.  The cost of the project when it was initially put forward, was $135000, it has since risen to <a href=\"https://www.nea.org.np/admin/assets/uploads/annual_publications/Grid_2076.pdf\">$26 million</a>.   The Nepalese Electricity Authority has been contracted to undertake the project, which will be <a href=\"https://thehimalayantimes.com/business/construction-of-eight-high-capacity-substations-underway-in-the-valley\">funded</a> by the NEA, the Nepalese government, the Asian Investment Bank and the Japan International Cooperation Agency', 'The project has taken far longer than originally anticipated to be completed. This is due to huge opposition against the construction of the transmission line, and the impacts it will have on the area and land surrounding it. An underlying theme of the demands of the protesters is that the line be rerouted, and substations be relocated away from affected communities. However, the <a href=\"https://kathmandupost.com/national/2023/01/14/nea-and-locals-of-lapsiphedi-reach-agreement-to-calm-situation-over-power-substation\">authorities have insisted</a> that this is not possible in order to effectively provide electricity to the valley.  The arguments made by the affected locals is that the transmission line put in jeopardy the cultural heritage and livelihood of those who live off the land. Another concern that has been repeatedly raised by locals is a lack of proper compensation. Whilst the NEA insists that proper compensation has been afforded to affected communities, the offer made was for 25% of the price of the land. Furthermore, the reasoning is that land has not actively been taken away from many locals, however, they are still <a href=\"http://www.nepalenergyforum.com/land-dispute-delays-thankot-\">affected negatively</a>, as they would be unable to use the land for farming nor building.   The locals are therefore demanding 100%compensation. Though relocation plans were made in 2004 by the AIB, this did not acknowledge all of the negatively affected communities, and only as a result of incessant obstruction have <a href=\"https://www.adb.org/sites/default/files/project-documents/thankot-chapagaon-bhaktapur.pdf\">locals been consulted</a> with regards to the carrying out of the project.  Furthermore, police forces were dispatched to <a href=\"https://kathmandupost.com/national/2023/01/14/nea-and-locals-of-lapsiphedi-reach-agreement-to-calm-situation-over-power-substation\">stifle protests</a> throughout the decades that opposition was present at the building sites', 'Over the past two decades, many attempts have been made to bring the injustice that locals were facing to light. Firstly, many <a href=\"http://english.aarthiknews.com/11390-2nea-to-build-high-capacity-power-transmission-line-in-kathmandu\">on site protests</a> have been attended to obstruct the building of pylons and demand that the transmission lines be rerouted.  These protests have eventually resulted in the NEA sitting down with locals to discuss agreements and reach a compromise. Eventually they reached a <a href=\"https://kathmandupost.com/national/2023/01/15/lapsephedi-protest-hints-at-challenges-in-expansion-of-transmission-lines\">three point agreement</a>, and locals agreed to ease obstruction.  A coordinate committee was formed to further discuss with locals and form a comprehensive report. One <a href=\"https://myrepublica.nagariknetwork.com/news/nea-to-expedite-construction-of-132-kv-substation-in-chobhar/?categoryId=opinion\">response</a> from the NEA has been to reroute one of the substations, and with concessional loans from the ADB, build in Chobhar, in order to compromise with the locals who opposed the initial route of the transmission line.  Though obstruction also occurred in response to the new proposed site, a meeting held by the NEA managing director, Kirtipur Municipality Mayor, Ward Chairperson and other local representatives, ended with a compromise whereby residents agreed to end the obstruction. There is still little confirmation that local meetings were held for consultation and consent obtaining purposes, nor that compensation has been promised in full', 'ILO Convention No. 169 (Ratified by Nepal 2007) Art 7(1) affirms the rights of Indigenous Peoples “to decide their own priorities for the process of development” and to “participate in the formulation, implementation and evaluation of plans and programmes for national and regional development which may affect them directly” Art 14 (1) mandates recognition of Indigenous Peoples “rights of ownership and possession” over the lands they “traditionally occupy.” This includes “lands not exclusively occupied by them, but to which they have traditionally had access for their subsistence and traditional activities.” UN Declaration on the Rights of Indigenous People A 23 affirms the right of indigenous peoples “to determine and develop priorities and strategies for exercising their right to development.” A32 states that ‘States shall consult and cooperate in good faith with the indigenous peoples concerned through their own representative institutions in order to obtain their free and informed consent prior to the approval of any project affecting their lands or territories and other resources, particularly in connection with the development, utilization or exploitation of mineral, water or other resources’ A 28(1) states that “indigenous peoples have the right to redress, by means that can include restitution or, when this is not possible, just, fair and equitable compensation, for the lands, territories and resources which they have traditionally owned or otherwise occupied or used, and which have been confiscated, taken, occupied, used or damaged without their free, prior and informed consent.” A28(2) states that “unless otherwise freely agreed upon by the peoples concerned, compensation shall take the form of lands, territories and resources equal in quality, size and legal status or of monetary compensation or other appropriate redress.” UN Declaration on the Right to Development A1(1) defines the right to development an inalienable human right by virtue of which every human person and all peoples are entitled to participate in, contribute to, and enjoy economic, social, cultural and political development The Constitution of Nepal A51(b)(1) requires the Nepalese Government to ‘implement international treaties, agreements to which Nepal is a party’ A51(j)(8)- states the necessity to ‘make the indigenous nationalities (Aadibasi Janajati) participate in decisions concerning that community by making special provisions for opportunities and benefits in order to ensure the right of these nationalities to live with dignity, along with their identity, and protect and promote traditional knowledge, skill, culture, social tradition and experience of the indigenous nationalities and local communities’ Land Acquisition Act 1977 A7- (1) Compensation shall be paid for losses resulting from clearing of crops and trees, and of demolition of walls, etc., or for damage, if any, suffered as a result of the removal or digging of earth, stone, ditches, or boring. (3) In case the concerned person is not satisfied with the amount of compensation determined under Sub-Section (2), he/she may file a complaint with the chief District Officer on which he/she receives information thereof, and in such cases the decision of the Chief District Officer shall be final.', 'Kathmandu Valley', '$26 million', 'Tamang and Shrestha', '2004', 'Nepal Electricity Authority', 'N/A', 'The Himalayan Times: Construction of eight high-capacity substations underway in the valley\r\nhttps://thehimalayantimes.com/business/construction-of-eight-high-capacity-substations-underway-in-the-valley\r\nMyRepublica: NEA to expedite construction of 132kV substation in Chobhar\r\nhttps://myrepublica.nagariknetwork.com/news/nea-to-expedite-construction-of-132-kv-substation-in-chobhar/?categoryId=opinion\r\nThe Himalayan: Obstruction in construction of 132kV Chobhar substation cleared\r\nhttps://thehimalayantimes.com/kathmandu/obstruction-in-construction-of-132-kv-chobhar-substation-cleared\r\nThe Kathmandu Post: NEA and agitating locals of Lapsiphedi reach agreement to normalize the situation\r\nhttps://kathmandupost.com/national/2023/01/14/nea-and-locals-of-lapsiphedi-reach-agreement-to-calm-situation-over-power-substation\r\nNepal Electricity Authority Report\r\nhttps://www.nea.org.np/admin/assets/uploads/annual_publications/Grid_2076.pdf\r\nNepal Energy Forum: Land dispute delays Thankot-Bhaktapur transmission line\r\nhttp://www.nepalenergyforum.com/land-dispute-delays-thankot-\r\nNepal Energy Forum Resettlement Plan\r\nhttps://www.adb.org/sites/default/files/project-documents/thankot-chapagaon-bhaktapur.pdf\r\nAarthik News: NEA to build high-capacity power transmission line in Kathmandu\r\nhttp://english.aarthiknews.com/11390-2nea-to-build-high-capacity-power-transmission-line-in-kathmandu\r\nThe Kathmandu Post: Lapsephedi protest hints at challenges in expansion of transmission lines \r\nhttps://kathmandupost.com/national/2023/01/15/lapsephedi-protest-hints-at-challenges-in-expansion-of-transmission-lines', '2024-02-28 23:08:05', '2024-02-28 23:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `projects_company`
--

CREATE TABLE `projects_company` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects_company`
--

INSERT INTO `projects_company` (`project_id`, `company_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 5),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(5, 6),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `projects_finances`
--

CREATE TABLE `projects_finances` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `finance_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects_finances`
--

INSERT INTO `projects_finances` (`project_id`, `finance_id`) VALUES
(1, 4),
(2, 5),
(3, 4),
(4, 6),
(5, 4),
(5, 5),
(5, 7),
(6, 5),
(6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `international_finances`
--
ALTER TABLE `international_finances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_company`
--
ALTER TABLE `projects_company`
  ADD PRIMARY KEY (`project_id`,`company_id`),
  ADD KEY `projects_company_company_id_foreign` (`company_id`);

--
-- Indexes for table `projects_finances`
--
ALTER TABLE `projects_finances`
  ADD PRIMARY KEY (`project_id`,`finance_id`),
  ADD KEY `projects_finances_finance_id_foreign` (`finance_id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `international_finances`
--
ALTER TABLE `international_finances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects_company`
--
ALTER TABLE `projects_company`
  ADD CONSTRAINT `projects_company_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_company_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_finances`
--
ALTER TABLE `projects_finances`
  ADD CONSTRAINT `projects_finances_finance_id_foreign` FOREIGN KEY (`finance_id`) REFERENCES `international_finances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_finances_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
