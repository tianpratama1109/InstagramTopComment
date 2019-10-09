-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2019 at 08:08 PM
-- Server version: 10.0.38-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otonimec_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kode` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kode`) VALUES
('vadra');

-- --------------------------------------------------------

--
-- Table structure for table `instagram`
--

CREATE TABLE `instagram` (
  `username` varchar(255) NOT NULL,
  `idig` varchar(32) NOT NULL,
  `jumlah_like` varchar(10) NOT NULL,
  `cookies` text NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `expired` varchar(10) NOT NULL DEFAULT '0',
  `device_id` varchar(255) NOT NULL,
  `verifikasi` int(1) NOT NULL,
  `poin` int(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'yes',
  `likes` varchar(4) NOT NULL DEFAULT 'yes',
  `likekomen` varchar(3) NOT NULL DEFAULT 'yes',
  `follow` varchar(5) NOT NULL DEFAULT 'yes',
  `story` varchar(5) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instagram`
--

INSERT INTO `instagram` (`username`, `idig`, `jumlah_like`, `cookies`, `useragent`, `expired`, `device_id`, `verifikasi`, `poin`, `password`, `status`, `likes`, `likekomen`, `follow`, `story`) VALUES
('trip3l_s', '9948997272', '0', 'ds_user=trip3l_s; Domain=.instagram.com; expires=Sun, 31-Mar-2019 14:50:36 GMT; HttpOnly; Max-Age=7776000; Path=/;rur=PRN; Domain=.instagram.com; HttpOnly; Path=/;mid=XCosuwABAAHguowU4RH90G-PDRDu; Domain=.instagram.com; expires=Thu, 28-Dec-2028 14:50:36 GMT; Max-Age=315360000; Path=/;ds_user_id=9948997272; Domain=.instagram.com; expires=Sun, 31-Mar-2019 14:50:36 GMT; Max-Age=7776000; Path=/;urlgen=\"{\\\"203.114.74.62\\\": 134451}:1gdyto:9uNNK2_i8yMlmMIpxOJ1whpUQEc\"; Domain=.instagram.com; HttpOnly; Path=/;sessionid=IGSC04a61a95c68789172752247bd065472e96723a5eb21b4d77d8271e6732b23ce0%3Av0HOR7b810Zer74wqWzTrFLQ0XDMkTEr%3A%7B%22_auth_user_id%22%3A9948997272%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A1%2C%22_token_ver%22%3A2%2C%22_token%22%3A%229948997272%3A0aDbGl3LwSqj82tqvYIUiuXRSLAGNBAb%3A60981cfec8b0a638a69afd1027b90776bc550a5096a2b008eaab1c9d69a2bcee%22%2C%22last_refreshed%22%3A1546267836.4215459824%7D; Domain=.instagram.com; expires=Tue, 31-Dec-2019 14:50:36 GMT; HttpOnly; Max-Age=31536000; Path=/;mcd=3; Domain=.instagram.com; expires=Thu, 28-Dec-2028 14:50:36 GMT; Max-Age=315360000; Path=/;csrftoken=qr72BJiF1MVYC8Aa6rndnB7xP39BIker; Domain=.instagram.com; expires=Mon, 30-Dec-2019 14:50:36 GMT; Max-Age=31449600; Path=/;', 'Instagram 6.22.0 Android (11/2.5.1; 240; 1280x720; samsung; GT-N7000; GT-N7000; smdkc210; en_US)', '0', 'android-470114f6db3b2886', 0, 8, 'mbzila123', 'yes', 'yes', 'yes', 'yes', 'yes'),
('_mlldaaa_', '9952070271', '0', 'ds_user=_mlldaaa_;shbid=11599;shbts=1548957799.1868632;rur=PRN;mid=XFM4ZgABAAFPlkDolG51aPvV1Oth;ds_user_id=9952070271;sessionid=9952070271%3AMuxcPEwqnNg4JJ%3A4;csrftoken=KDVLTXJRYuQoECuofSgdXxBEAv94znTf;', 'Instagram 27.0.0.7.97 Android (18/4.3; 320dpi; 720x1280; Xiaomi; HM 1SW; armani; qcom; en_US)', '0', 'android-724d1e563064aa09', 1, 4, 'maulidaa', 'yes', 'yes', 'yes', 'yes', 'yes'),
('percobbaan_akun', '9957371301', '0', 'ds_user=percobbaan_akun;shbid=3106;shbts=1547760610.7758477;rur=FRC;mid=XEDz4gABAAFh7sYfMvFf8yQA0o2f;ds_user_id=9957371301;urlgen=\"{\"36.84.70.204\": 17974}:1gkFEo:P1CFo1rWXwtrJaw_1jj5Q8D4SKI\";sessionid=IGSC297c81d1022f3abe6d5b23dfa45b11c2d3ae06175caa5468d21588efa6a1d671%3ACTMThUapS430l4VGDwYCJ092zvgymKe0%3A%7B%22_auth_user_id%22%3A9957371301%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A1%2C%22_token_ver%22%3A2%2C%22_token%22%3A%229957371301%3AVZiXiIwrq9nvD7CjQ3tsgO1X6Qw62lEB%3Ac2db69ac3a071cc1b256e7fbdde2ab3be7d378df29d3cc9efd3dec7aa3a4a800%22%2C%22last_refreshed%22%3A1547760610.7768986225%7D;mcd=3;csrftoken=qnxgifmgSjU1TAkKLTkDKxOOMqNJdECl;', 'Instagram 27.0.0.7.97 Android (18/4.3; 320dpi; 720x1280; Xiaomi; HM 1SW; armani; qcom; en_US)', '0', 'android-dcfa19b1ed1c3a29', 1, 4, 'akunpercobaan', 'yes', 'yes', 'yes', 'yes', 'yes'),
('njuel_29', '9962060896', '0', 'ds_user=njuel_29; Domain=.instagram.com; expires=Mon, 01-Apr-2019 02:11:59 GMT; HttpOnly; Max-Age=7776000; Path=/;rur=PRN; Domain=.instagram.com; HttpOnly; Path=/;mid=XCrMbgABAAHAZX-vQBVsceCK94v4; Domain=.instagram.com; expires=Fri, 29-Dec-2028 02:11:59 GMT; Max-Age=315360000; Path=/;ds_user_id=9962060896; Domain=.instagram.com; expires=Mon, 01-Apr-2019 02:11:59 GMT; Max-Age=7776000; Path=/;urlgen=\"{\\\"203.114.74.62\\\": 134451}:1ge9XD:Rh5LnxEebG6p6ZUi4kQHh-aIhDY\"; Domain=.instagram.com; HttpOnly; Path=/;sessionid=IGSC3193ba5744fb1726774bb4f15d916e481ef55bb3dd1e756a6171cfd8216317dd%3AhWW3dmaUUbjc09kwpAc1tG4G3gWxSk6E%3A%7B%22_auth_user_id%22%3A9962060896%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A1%2C%22_token_ver%22%3A2%2C%22_token%22%3A%229962060896%3ADXJKd5R2VoL6ljwGnTM27P6FCmdc6TUe%3A577e4589460f6518e8061d94226684af4b51dfcb06024d01784d1cda14c0cd3c%22%2C%22last_refreshed%22%3A1546308719.2347824574%7D; Domain=.instagram.com; expires=Wed, 01-Jan-2020 02:11:59 GMT; HttpOnly; Max-Age=31536000; Path=/;mcd=3; Domain=.instagram.com; expires=Fri, 29-Dec-2028 02:11:59 GMT; Max-Age=315360000; Path=/;csrftoken=j4dBoiRYUzfKABsB1cRoffCceOSusX3a; Domain=.instagram.com; expires=Tue, 31-Dec-2019 02:11:59 GMT; Max-Age=31449600; Path=/;', 'Instagram 6.22.0 Android (11/2.4.2; 120; 1080x1920; samsung; GT-N7000; GT-N7000; smdkc210; en_US)', '0', 'android-5cdafc89007d13e7', 0, 8, 'satrio', 'yes', 'yes', 'yes', 'yes', 'yes'),
('islami_._', '9964224293', '0', 'ds_user=islami_._;shbid=13006;shbts=1547760625.5084486;rur=FRC;mid=XEDz8AABAAGFSystLs8sqPDoBW-K;ds_user_id=9964224293;urlgen=\"{\"36.84.70.204\": 17974}:1gkFF3:9_BhS1fPZZqDDyvISVXCUuyfUnw\";sessionid=IGSC5b3dca20144c8773bde067da2cb84fa5f2d963ecde98ebda0a1db125f705ff76%3AI26joPK49gu9wWIpuHdcwV6H09uu0ClJ%3A%7B%22_auth_user_id%22%3A9964224293%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A1%2C%22_token_ver%22%3A2%2C%22_token%22%3A%229964224293%3A3948Dm8ZYRIbVTiv8stVkwzjRLdunvwq%3A0faa564f7fbfa900c93bf8dc15e9222b9f5955e27e1bd1fe3861be2a333210d9%22%2C%22last_refreshed%22%3A1547760625.5092079639%7D;mcd=3;csrftoken=rxvT1qL63HEhxRimiww4oTI4uYkGHFhY;', 'Instagram 27.0.0.7.97 Android (18/4.3; 320dpi; 720x1280; Xiaomi; HM 1SW; armani; qcom; en_US)', '0', 'android-354f21dd22ece62e', 1, 4, 'islami098', 'yes', 'yes', 'yes', 'yes', 'yes'),
('tatapramuditha', '9964758004', '0', 'ds_user=tatapramuditha;shbid=19821;shbts=1547760632.1908615;rur=FRC;mid=XEDz9wABAAGE5IY4NOxpu3Wo3fpi;ds_user_id=9964758004;urlgen=\"{\"36.84.70.204\": 17974}:1gkFFA:dWUt2k7hEJeePN_QAfljkmwxW-g\";sessionid=IGSC9b13c6471adec7f3db0388fbc9e37b64e67b4d48fe83f846cca227672029859f%3AI0K7ifgtMYzeCTVQNiqjpcIoLcVQ4KhH%3A%7B%22_auth_user_id%22%3A9964758004%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A1%2C%22_token_ver%22%3A2%2C%22_token%22%3A%229964758004%3Af3Wl41xf3dq8HI4aoDYaXNVRMRpGuFGJ%3Ae796f143ce949828acc2e51c8581cd35be15af72e5e386c43dda584780a8e509%22%2C%22last_refreshed%22%3A1547760632.1916661263%7D;mcd=3;csrftoken=fBvpCCTGHftSK36RkxamSGcmclRoGY0m;', 'Instagram 27.0.0.7.97 Android (18/4.3; 320dpi; 720x1280; Xiaomi; HM 1SW; armani; qcom; en_US)', '0', 'android-de283a916504aa1b', 1, 4, 'vario110', 'yes', 'yes', 'yes', 'yes', 'yes'),
('ibnunabilqistaufan', '9966159859', '0', 'ds_user=ibnunabilqistaufan;shbid=3402;shbts=1548957857.606846;rur=PRN;mid=XFM4oAABAAFOVztGo7k87wrX6Ywf;ds_user_id=9966159859;urlgen=\"{\"36.90.71.166\": 17974}:1gpGhF:VHeExb5nC3dfPgD5FBxPYaKApX8\";sessionid=9966159859%3AMuxTr3WcvV4YKP%3A8;csrftoken=KqVNknIUOJkpL7OqdXmZtkjTB0g6gvSd;', 'Instagram 27.0.0.7.97 Android (18/4.3; 320dpi; 720x1280; Xiaomi; HM 1SW; armani; qcom; en_US)', '0', 'android-ae76980b42a16a73', 1, 4, 'oradisandi', 'yes', 'yes', 'yes', 'yes', 'yes'),
('venom250994', '9972652299', '0', 'ds_user=venom250994; Domain=.instagram.com; expires=Mon, 01-Apr-2019 08:13:02 GMT; HttpOnly; Max-Age=7776000; Path=/;rur=PRN; Domain=.instagram.com; HttpOnly; Path=/;mid=XCshDQABAAEgVadhwAHk4kuTd2ay; Domain=.instagram.com; expires=Fri, 29-Dec-2028 08:13:02 GMT; Max-Age=315360000; Path=/;ds_user_id=9972652299; Domain=.instagram.com; expires=Mon, 01-Apr-2019 08:13:02 GMT; Max-Age=7776000; Path=/;sessionid=IGSCec2f77dfaadc3720127a36b352da9352b949acecbe2bb94139e77332da2253db%3AFW2xD2OVKBY8q3hIGp4hSXP6m0jxdMcI%3A%7B%22_auth_user_id%22%3A9972652299%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A1%2C%22_token_ver%22%3A2%2C%22_token%22%3A%229972652299%3ARCLQmUQc3KaglhgU7o4XEjHbocMn4j9c%3A1996334a4198ee775fefd8df0b5b6edceda9aef84e608ae0efb788df21e4b294%22%2C%22last_refreshed%22%3A1546330382.8422966003%7D; Domain=.instagram.com; expires=Wed, 01-Jan-2020 08:13:02 GMT; HttpOnly; Max-Age=31536000; Path=/;mcd=3; Domain=.instagram.com; expires=Fri, 29-Dec-2028 08:13:02 GMT; Max-Age=315360000; Path=/;csrftoken=5sUkpb5e10hk5H5GOKQIHNFaAsCwK0g1; Domain=.instagram.com; expires=Tue, 31-Dec-2019 08:13:02 GMT; Max-Age=31449600; Path=/;', 'Instagram 6.22.0 Android (11/2.4.0; 320; 768x1024; samsung; GT-I9100; GT-I9100; smdkc210; en_US)', '0', 'android-0c16a55bd3290c91', 0, 8, 'dipaknc25', 'yes', 'yes', 'yes', 'yes', 'yes'),
('indrarmpnu_', '9973679415', '0', 'ds_user=indrarmpnu_;shbid=1967;shbts=1548957876.7230747;rur=PRN;mid=XFM4swABAAFlmcoW0y9Br491yoxn;ds_user_id=9973679415;urlgen=\"{\"36.90.71.166\": 17974}:1gpGhY:q3mhdsMgV8bFUejSwiFpGxoXtfs\";sessionid=9973679415%3A63TRcWG0UdsKvd%3A19;mcd=3;csrftoken=PJ3FTXsUrOLT9TBx2X70B0Kdb7QuMamV;', 'Instagram 27.0.0.7.97 Android (18/4.3; 320dpi; 720x1280; Xiaomi; HM 1SW; armani; qcom; en_US)', '0', 'android-1a30c0c99eb4457d', 1, 4, 'kaweruan01', 'yes', 'yes', 'yes', 'yes', 'yes'),
('setianiblink22', '9987723514', '0', 'ds_user=setianiblink22;shbid=1593;shbts=1548957927.5751555;rur=PRN;mid=XFM45gABAAHXlNuuoDUfsKlNtdMj;ds_user_id=9987723514;urlgen=\"{\"36.90.71.166\": 17974}:1gpGiN:dLdkT6ChnbdbFYoqpIZFyUJhCmU\";sessionid=9987723514%3AphhUWX4yC4zLHu%3A1;csrftoken=CPfVzpprraDBtn18tUab5vPFRyTw9kdo;', 'Instagram 27.0.0.7.97 Android (18/4.3; 320dpi; 720x1280; Xiaomi; HM 1SW; armani; qcom; en_US)', '0', 'android-afeec2fc6fe63e6d', 1, 4, 'jeketi48', 'yes', 'yes', 'yes', 'yes', 'yes'),
('kemal_oktaviana', '9997873673', '0', 'ds_user=kemal_oktaviana; Domain=.instagram.com; expires=Sun, 31-Mar-2019 12:32:47 GMT; HttpOnly; Max-Age=7776000; Path=/;rur=PRN; Domain=.instagram.com; HttpOnly; Path=/;mid=XCoMbgABAAFPSCrnbgNY9o8fjGRi; Domain=.instagram.com; expires=Thu, 28-Dec-2028 12:32:47 GMT; Max-Age=315360000; Path=/;ds_user_id=9997873673; Domain=.instagram.com; expires=Sun, 31-Mar-2019 12:32:47 GMT; Max-Age=7776000; Path=/;sessionid=IGSC6ff47fc103097a487795c4acd360c289d0ea3b6d9a2afe4d0f7d0af56535a830%3AtwtLM3D54Exj1zln0p3B642edPRiQy7n%3A%7B%22_auth_user_id%22%3A9997873673%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A1%2C%22_token_ver%22%3A2%2C%22_token%22%3A%229997873673%3AHZqZVmZ6A1F8XKZEq5Y9L0ENQ0v4IiIp%3A8901dc4f34ed4af8cd3d36b0ee6f092594dec2c54fbfd2d6bd5ec5b06b5ea8f6%22%2C%22last_refreshed%22%3A1546259567.1876928806%7D; Domain=.instagram.com; expires=Tue, 31-Dec-2019 12:32:47 GMT; HttpOnly; Max-Age=31536000; Path=/;mcd=3; Domain=.instagram.com; expires=Thu, 28-Dec-2028 12:32:47 GMT; Max-Age=315360000; Path=/;csrftoken=Eyx1T9xln1fNqP6SrH2ldQnjVK4syFSs; Domain=.instagram.com; expires=Mon, 30-Dec-2019 12:32:47 GMT; Max-Age=31449600; Path=/;', 'Instagram 6.22.0 Android (11/2.3.2; 240; 1024x768; samsung; GT-N7000; GT-N7000; smdkc210; en_US)', '0', 'android-6461478542c84446', 0, 8, '081310750161', 'yes', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_follow`
--

CREATE TABLE `riwayat_follow` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_follow`
--

INSERT INTO `riwayat_follow` (`id`, `username`, `target`, `total`, `tanggal`) VALUES
(1, 'forbionxz', '123', 1, '2019-05-08 06:08:50'),
(2, 'forbionxz', '302203783', 10, '2019-05-08 06:10:15'),
(3, 'forbionxz', '13100327479', 112, '2019-05-08 07:37:37'),
(4, 'forbionxz', '13109791193', 200, '2019-05-08 16:37:34'),
(5, 'admin', '1', 1, '2019-05-13 06:19:06'),
(6, 'admin1', '3927146997', 11, '2019-05-14 08:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_komen`
--

CREATE TABLE `riwayat_komen` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_komen`
--

INSERT INTO `riwayat_komen` (`id`, `username`, `url`, `total`, `tanggal`) VALUES
(1, 'forbionxz', 'https://www.instagram.com/p/BCS1cj1OyLO/', 1, '2019-05-08 06:13:18'),
(2, 'forbionxz', 'https://www.instagram.com/p/BxMDl-jgdFH/', 9, '2019-05-08 07:41:27'),
(3, 'forbionxz', 'https://www.instagram.com/p/BxMD8StncPp/', 13, '2019-05-08 15:06:26'),
(4, 'forbionxz', 'https://www.instagram.com/p/BxNigyinhTC/', 300, '2019-05-08 18:31:03'),
(5, 'forbionxz', 'https://www.instagram.com/p/BxNnLpbHl-r/', 900, '2019-05-08 19:14:30'),
(6, 'forbionxz', 'https://www.instagram.com/p/BxTrctVHmBM/', 60, '2019-05-11 03:46:51'),
(7, 'admin', 'https://www.instagram.com/p/BCS1cj1OyLO/', 1, '2019-05-13 06:17:51'),
(8, 'admin1', 'https://www.instagram.com/p/BpWqWIxgat8', 1, '2019-05-14 18:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_like`
--

CREATE TABLE `riwayat_like` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_like`
--

INSERT INTO `riwayat_like` (`id`, `username`, `url`, `total`, `tanggal`) VALUES
(1, 'forbionxz', 'https://www.instagram.com/p/BCS1cj1OyLO/', 10, '2019-05-08 06:15:31'),
(2, 'forbionxz', 'https://www.instagram.com/p/BxMDl-jgdFH/?utm_source=ig_share_sheet&amp;igshid=ky2unft8lrde', 200, '2019-05-08 07:44:12'),
(3, 'forbionxz', 'https://www.instagram.com/p/BxL7SbfA-Kw/?utm_source=ig_share_sheet&amp;igshid=10ut4xjaonui1', 112, '2019-05-08 08:14:41'),
(4, 'forbionxz', 'https://www.instagram.com/p/BxN4OMSllKF/?utm_source=ig_share_sheet&amp;igshid=1r0stm6nc8m1g', 160, '2019-05-09 11:54:39'),
(5, 'admin', 'https://www.instagram.com/p/BCS1cj1OyLO/', 1, '2019-05-13 06:17:17'),
(6, 'admin1', 'https://www.instagram.com/p/BwgXD79A_xv/', 100, '2019-05-14 08:06:32'),
(7, 'admin1', 'https://www.instagram.com/p/BpWqWIxgat8', 100, '2019-05-14 18:24:46'),
(8, 'Tester', 'https://www.instagram.com/p/BjtQqXIlOnP/?igshid=k0iyqv6no7vg', 10, '2019-05-29 05:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_likekomen`
--

CREATE TABLE `riwayat_likekomen` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_story`
--

CREATE TABLE `riwayat_story` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_story`
--

INSERT INTO `riwayat_story` (`id`, `username`, `target`, `total`, `tanggal`) VALUES
(1, 'admin', 'rafivadra', 1, '2019-05-13 06:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `exp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jeda` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jeda_foll` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jeda_komen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jeda_like` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jeda_story` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session` varchar(10) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `limit_like` varchar(5) COLLATE utf8_swedish_ci NOT NULL,
  `likekomen` enum('yes','no','','') COLLATE utf8_swedish_ci NOT NULL,
  `likefoto` varchar(50) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'no',
  `komenfoto` varchar(5) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'no',
  `follow` varchar(5) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'no',
  `story` varchar(5) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `exp`, `jeda`, `jeda_foll`, `jeda_komen`, `jeda_like`, `jeda_story`, `session`, `lastlogin`, `ip`, `status`, `limit_like`, `likekomen`, `likefoto`, `komenfoto`, `follow`, `story`) VALUES
(2, 'admin', 'admin', '2019-12-05 17:00:00', '2019-05-13 06:21:32', '2019-05-13 06:49:06', '2019-05-13 06:27:51', '2019-05-13 06:27:17', '2019-05-13 06:31:51', '469321359', '2019-06-02 12:56:56', '36.68.236.39', 1, 'no', 'no', 'no', 'no', 'no', 'no'),
(94, 'maklo', 'maklo', '2019-06-05 12:56:58', '2019-06-02 12:56:58', '2019-06-02 12:56:58', '2019-06-02 12:56:58', '2019-06-02 12:56:58', '2019-06-02 12:56:58', '0', '2019-06-02 12:56:58', '', 1, 'no', 'yes', 'yes', 'yes', 'yes', 'yes'),
(93, 'Tester', 'rahasia', '2019-06-28 05:22:47', '2019-05-29 05:22:47', '2019-05-29 05:22:47', '2019-05-29 05:22:47', '2019-05-29 05:34:07', '2019-05-29 05:22:47', '303696607', '2019-05-29 05:23:03', '114.122.4.58', 1, 'no', 'no', 'yes', 'no', 'yes', 'no'),
(92, 'mama', 'mama', '2019-08-31 05:48:08', '2019-05-24 05:48:08', '2019-05-24 05:48:08', '2019-05-24 05:48:08', '2019-05-24 05:48:08', '2019-05-24 05:48:08', '0', '2019-05-24 05:48:08', '', 1, 'no', 'no', 'no', 'no', 'no', 'no'),
(91, 'test', 'test', '2019-09-01 05:44:01', '2019-05-24 05:44:01', '2019-05-24 05:44:01', '2019-05-24 05:44:01', '2019-05-24 05:44:01', '2019-05-24 05:44:01', '0', '2019-05-24 05:44:01', '', 1, 'no', 'yes', 'yes', 'yes', 'yes', 'yes'),
(90, 'admin1', 'admin1', '2019-06-13 08:05:36', '2019-05-14 08:05:36', '2019-05-14 08:38:08', '2019-05-14 18:35:59', '2019-05-14 18:34:46', '2019-05-14 08:05:36', '932528865', '2019-05-14 18:24:35', '103.78.115.82', 1, 'no', 'yes', 'yes', 'yes', 'yes', 'yes'),
(89, 'vadra', 'vadra', '2019-06-12 06:44:57', '2019-05-13 06:44:57', '2019-05-13 06:44:57', '2019-05-13 06:44:57', '2019-05-13 06:44:57', '2019-05-13 06:44:57', '0', '2019-05-13 06:44:57', '', 1, 'no', 'yes', 'yes', 'yes', 'yes', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instagram`
--
ALTER TABLE `instagram`
  ADD PRIMARY KEY (`idig`);

--
-- Indexes for table `riwayat_follow`
--
ALTER TABLE `riwayat_follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_komen`
--
ALTER TABLE `riwayat_komen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_like`
--
ALTER TABLE `riwayat_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_likekomen`
--
ALTER TABLE `riwayat_likekomen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_story`
--
ALTER TABLE `riwayat_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_follow`
--
ALTER TABLE `riwayat_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `riwayat_komen`
--
ALTER TABLE `riwayat_komen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riwayat_like`
--
ALTER TABLE `riwayat_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riwayat_likekomen`
--
ALTER TABLE `riwayat_likekomen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1886;

--
-- AUTO_INCREMENT for table `riwayat_story`
--
ALTER TABLE `riwayat_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
