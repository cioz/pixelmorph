-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Jan 2019 um 04:36
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `pixelmorph`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `blogcat` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `user` int(11) NOT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blogcats`
--

CREATE TABLE `blogcats` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `from` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_000000_create_vita_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2015_10_12_000000_create_kontakt_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2017_07_24_210244_create_sets_table', 1),
(7, '2017_08_29_170244_create_tags_table', 1),
(8, '2017_08_29_170246_create_tags_sets_table', 1),
(9, '2017_09_06_090552_create_skills_table', 1),
(10, '2017_09_07_090552_create_skillscats_table', 1),
(11, '2017_09_16_110033_create_blog_table', 1),
(12, '2017_09_16_110354_create_blogcats_table', 1),
(13, '2017_09_29_121021_create_wg_profiles_table', 1),
(14, '2017_09_29_122513_create_wg_users_table', 1),
(15, '2017_09_29_122514_create_persos_table', 1),
(16, '2017_09_29_122514_create_playlists_table', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `pages`
--

INSERT INTO `pages` (`id`, `author`, `status`, `title`, `headline`, `excerpt`, `body`, `image`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Home', 'Willkommen', NULL, '<p>Ein Angler braucht eine Angel, ein Schachspieler ein Schachbrett und ein Webentwickler eine Webseite. Dies ist der einzige Grund warum es diese Seite gibt ... mein Spielplatz.<br>Hast Du - warum auch immer - Bedarf an einen Internetspezialisten werfe einen Blick auf die <a href=\"/skills\">Skills</a> und entscheide ob ich Dir behilflich sein kann. Ich helfe nicht nur aus kommerziellen Interesse. Hast Du eine Idee welche die Welt besser oder einfach nur schöner machen würden kann man mich leicht beigeistern. Ist Dir das studieren der Skills zu technisch, <a href=\"/kontakt\">kontaktiere</a> mich einfach.</p><p>Als Freund der elektronischen Unterhaltungsmusik könnten <a href=\"/sound\">hier</a> einige akustische Überraschungen auf dich warten. Dort findest Du einige Sets mit eleketronischer Musik verschiedenster Art. Vornehmlich Sachen zum grooven, zum entspannten Tanzen und treiben lassen oder einfach nur zum Träumen und wohl fühlen. Da ich nicht glaube das man elektronische Musik in Schubladen wie Techno oder Trance aufräumen kann, kannst Du Deine Musik durch das Einstellen von sogenannten Moods aussuchen, probier es einfach mal aus :)</p>', NULL, 'home', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(2, 1, 1, 'Skills', 'Skills', NULL, '<p>In den 90er nannte man uns WebDesigner und wir mußten vom Layout bis zum Datenbankdesign irgendwie alles können.<br>\r\nIch bezeichne mich bewußt als FrontendWebentwickler da es heute mehr Sinn macht die einzelnen Facetten im Entwicklungsprozess mit Spezialisten zu besetzen. Auch ein Frontendentwickler benötigt in diesen Tagen immer noch ein tiefes Verständnis für Programmierung und dieses bringe ich sicher mit. Mein Herz schlägt aber für Farben und Formen und wie sie erfolgreich eingesetzt werden können.<br>\r\nIch liebe Teamarbeit wo jeder das was er am besten kann zum Ganzen beifügt, wenn jeder auch das Leid des anderen versteht und dieses sogar helfen kann zu lindern ist es perfekt. Deshalb und trotz guten Programmierkenntnissen lege ich wert auf die Bezeichnung \"Frontend\".<br>\r\nVon all den technischen Skills mal abgesehen bringe ich eine noch viel wichtigere Eigenschaft mit. Seitdem das Internet damlas auch für meinen Rechner mit einem 28k baut-Modem erreichbar war bin ich davon fasziniert. Die rasante Entwicklung der Technologien die einen Entwickler ununterbrochen fordert stets Neues zu erkunden und bereitwillig zu lernen ist für mich keine Belastung sondern Spass an der Sache. Stillstand ist nie eine Option. Morgen wird dein Internet ein anderes sein<br>\r\n</p>', NULL, 'skills', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(3, 1, 1, 'Login', 'Login', NULL, '<p>Bitte einloggen ...</p>', NULL, 'login', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(4, 1, 1, 'Sets', 'Sets', NULL, '<p>Das klassische Einsortieren in Genres erschien mir immer sinnlos, denn was ist schon Bassline, Trap oder wer alles weiß was Leftfield sein soll? Auch wenn ich eine genaue Vorstellung hatte was mich in dem Genre erwarten wird hat mir das nur selten weiter geholfen denn das was z.B. alles unter Techno einsortiert wird ist meist richtig plaziert, aber die Menge von dem was dort dann alles angeboten wird war unüberschaubar.<br>Deshalb habe ich mir ein eigenes Tagging ausgedacht das sich an Stimmungen (sog. Moods) orientiert. Stelle die Regler so ein wie Deine Stimmung ist und was Du gerne hören willst. Melodiös - auf jeden Fall und bitte etwas progressiv, aber nicht zu hart ... in etwa so :)</p><br>Natürlich bewegt sich das ganze in meinem Geschmacksumfeld. Wer viel Hardbeat wählt wird schon was auf die Ohren bekommen aber das was in den üblichen Genres unter Hardstyle oder so gehandelt wird kommt bei mir sicher nicht zum vorschein. Also das System könnte trotzdem böse floppen weil ich einfach nicht der richtige DJ für Dich bin ^^.</p>', NULL, 'sets', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(5, 1, 1, 'Festival', 'Festival', NULL, '<p>Imagine a festival that has everything needed to be a good one. A nice place where the music can play, toiletts and showers, garbage collecting, a place for camping, a place for cars, a place for fires, a place for food and asset stores - may be this or that nice feature like a playground or obstacles to look at.</p>\r\n                <p>Its an electro only festival but there is one thing missing: The Djs, there is no lineup at all.</p>\r\n                <p>There are, lets say, three stages - Mainfloor, Alternative and Chillout and its the job of the visitors to bring those stages to live. There is all they need, mixers, recievers, speakers, lights and athmospheric dancefloors. All the DJ has to bring is a pool. If he want, he can bring an own computer or a mixer.</p>\r\n                <p>How can a DJ apply?<br>There is an App where he applies for a chosen dancefloor and he comes into a queue. The first applicant can start his session and he can play as long as his audience wants to dance to. If someone wants to kick this DJ, he places his vote with the App against this DJ. The App decides when the DJ gets booted, the next DJ in the queue can take over.<br>\r\n                There are many more rules in mind to organise this happening but so far so good.</p>\r\n                <p>Realising such a festival is a real big project and it can be done only with good team. This is why this text exists, i want to get people excided to participate. Everything is needed. People who know places, who can organize things, who have experience, technicians, artisans, security ...<br>The only must haves you need is a great passion to electronic music and festivals and the wish to get such a festival really happen.<br>\r\n                At the moment iam collecting people and ideas, thats a really early state. I like festivals and iam spreading this seed onto them, interested people can make a poke on this site. Tell me if you have suggestions or if you want to participate. On the day i think its worth to take the next step i will come back to you.<br>Here are the short terms:\r\n                    <ul>\r\n                    <li>Electronic music festival only</li>\r\n                    <li>No Lineup, no booked DJs</li>\r\n                    <li>Everyone can apply to perform</li>\r\n                    <li>The audience decides if the DJ gets booted</li>\r\n                    <li>Its an art project not a commercial one</li>\r\n                    <li>Its alternative orientated with a spirit like the known festival \"Fusion\"</li>\r\n                    <li>Its about to make the world better not worse. Regnerative energy, no pointless garabage, no environmental destruction, rich people spend more poor people get more, no racism, no sexism, no political movements at all.</li>\r\n                    </ul>\r\n                    </p>', NULL, 'festival', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persos`
--

CREATE TABLE `persos` (
  `id` int(11) NOT NULL,
  `name` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tele` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geb` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rel` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pgp` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `persos`
--

INSERT INTO `persos` (`id`, `name`, `adress`, `tele`, `geb`, `family`, `state`, `driver`, `lang`, `rel`, `email`, `pgp`) VALUES
(1, 'Dirk Hedtke', 'Kroosweg 17<br>21073 Hamburg', '+49 0151 75032189', '13.4. 1972', 'ledig', 'deutsch', 'AM/A1/A/B/C1/BE/C1E/CE/L', 'Deutsch (Muttersprache)<br>Englisch (konversationssicher)<br>Französisch (mittlere Kenntnisse)', 'Buddhist', 'info@pixelmorph.de', '-----BEGIN PGP PUBLIC KEY BLOCK-----\n\n                mQGiBEN7hnIRBADg4d3SfJh+ZijgfY5Umt7BB9wtRifhfjWq07gPL3eqTXFkfIMX\n                hhsAzhf+nP4dVzvHGdSDgUiLSSLx6RtNjBEYLw9D1MX4/VlMtlR+2cGUfI5QPjQu\n                1kZcE9gg7kr4VsKnshETczIIYGnxXfA1dBYImGhLJLMKADP0NBBW91qrwwCg/2fJ\n                fcZCB/TG+LpQJX6F/aiWbQcD/is3OIQsghaG9lt9tVk8Y3DLZM3Rrq2Wl42vETWh\n                etJFD44EpzPVTNiJoDJHxWX+92gmzkZpZQv+Q73/jqHZOExUQAE2jKnS1jQ872L+\n                NnClfOv+yNdn92ERr/q3Swexk/FriluS+PvxVL0f/Hjty/w5GpUDbHZa6L+5bHo9\n                oYZsBACnF8dNfaH2EGTvgC7T4N9dkJ3Xekt+wHbHQHIcEYzhtI67qruCLDYLslTz\n                7PsHW2iwZczHZS31XSBWN0qS35uhZwlEhYtL8XBjDhbOYsiA25eh96w1O89dNuW+\n                3T64F+5P1CS7qLpB7dKvdE1Vd2aBGP04FVkHc5WTIgqkySwCQLQgRGlyayBIZWR0\n                a2UgPGluZm9AcGl4ZWxtb3JwaC5kZT6ITgQQEQIADgUCQ3uGcgQLAwIBAhkBAAoJ\n                EGg7IR8JxJiVCngAoN1dPoXnb2BDTScLh5IFwE/AskjXAKDDeNHWOx/EL7b7VIBW\n                liLUUjhdhokCMwQQAQgAHRYhBPSiOPtcTFSGGRK+p8pW9UtkKN4UBQJaQA4QAAoJ\n                EMpW9UtkKN4Ucl0P/2kuApgqNWps1l0UDXVJrUZdLEgcYkFWwAIgFIqfh3dA1fMO\n                ofTOcym09YBYQMECbxIQZ+RhTxIWN3/FRD4SL/K629bWLayj1Ff+VjsN8ppGS97+\n                8APaMN7me4hPfW37WG/coOxp5eypNF9gbS6bg+ooLEHJeXlntxgFTuuWR6sHz0JK\n                pFVKNT0pDbkC+IUfV4WFvoX3vhQMNtdJ1Y+usQz+VeI87BVxPlPInMNbe9rJvNAR\n                sPRN4/1n4R/0ZwW8pKNZkfZF7ih79IyiyAtVoMqnYnxf2TZG4/u+vzKXSxQ/J30Y\n                1y4ojFM7k8V+22UUw5W9Ap/raf6CdfnZoDcIOjXCW9GXXhiLO4TRpu9g09/4wkSG\n                sL4zzPblbEPnL/08KYV5Gn/2dzNnd1uEIvMH+HGvf3kUiWj+HhJ4tZfBAv5yAQlh\n                IzY0XanLSbYT8K/2gazXLbBFqh5DJHF5YoLIs9+JNDgFOb/de4Yi+Q073wiTTp9i\n                R8w7V/Gq+kA6KgC/bFvU1ztMAuHRsdKla9YmFDMNcOph6XmpvX6mcK/Q4joyP8jx\n                kPD8htvrDc/ilBWEtLrEEeckxz4GV2LC9pc8GEeSZ7Y5aZEfMWujK7R0S5eGyKvQ\n                hJs3xbWCQdRlPpFWkuL2DChM36bmVBt6Fk7fWPcLzy+X+r/jaa2H8xdiuOQsuQIN\n                BEN7hnIQCAD2Qle3CH8IF3KiutapQvMF6PlTETlPtvFuuUs4INoBp1ajFOmPQFXz\n                0AfGy0OplK33TGSGSfgMg71l6RfUodNQ+PVZX9x2Uk89PY3bzpnhV5JZzf24rnRP\n                xfx2vIPFRzBhznzJZv8V+bv9kV7HAarTW56NoKVyOtQa8L9GAFgr5fSI/VhOSdvN\n                ILSd5JEHNmszbDgNRR0PfIizHHxbLY7288kjwEPwpVsYjY67VYy4XTjTNP18F1dD\n                ox0YbN4zISy1Kv884bEpQBgRjXyEpwpy1obEAxnIByl6ypUM2Zafq9AKUJsCRtMI\n                PWakXUGfnHy9iUsiGSa6q6Jew1XpMgs7AAICCACteS2WxiAd4tqb7YXj+WhsPD+4\n                vHGh17qC8BLRjxrGJ5osSKqnH6pLyc7+QQHTpTK72Wb/i8z1L83HlfKVNSPt8DQi\n                oTubMIBZB90evJbc/81G9ZIKulK8vSkHvD/CNy61SXhdsfHXCSzPd7/eoeYlb1Bj\n                84XMDlahJ2m4SiyX+u38x5LPeGw8fgl2wt3Aj0M38d9HP4gz68Ivsx9p1Y3S4N3V\n                nFcgc17SX0KMek65k/fSPfLbJXm880h+NTdqgm2ViMeKN7LtuR/s6Z8+ZcD6aoVW\n                dEN+wLDsIezXboBqaNOL7GgiHMWNBNuprN9LFEqi1bKaLTNIgCNzCCGAalJEiEYE\n                GBECAAYFAkN7hnIACgkQaDshHwnEmJVR5ACg3Hle3FKDTMG9uE/qsXDoeuzIZEQA\n                oMcvm++tFZ516AaUm5KXIDwAeX2N\n                =ztiO\n                -----END PGP PUBLIC KEY BLOCK-----');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `playlists`
--

CREATE TABLE `playlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `set_id` bigint(20) NOT NULL,
  `position` int(11) NOT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` char(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `playlists`
--

INSERT INTO `playlists` (`id`, `set_id`, `position`, `title`, `artist`) VALUES
(1108, 1, 1, 'K304v2 Walk With Me (Original Mix)', 'dubspeeka'),
(1109, 1, 2, 'Fantasmeta (Original Mix)', 'Affkt, Upercent'),
(1110, 1, 3, 'Inevitable Ending (Original)', 'Hraach, Armen Miran'),
(1111, 1, 4, 'Romance 700 (Original Mix)', 'Terentius'),
(1112, 1, 5, 'Mongol (Original Mix)', 'Ten Walls'),
(1113, 1, 6, 'Endless Sands of Time (Original Mix)', 'Darin Epsilon, Philip Chedid'),
(1114, 1, 7, 'Faith (Original Mix)', 'BAAL *, Rey Lenon'),
(1115, 1, 8, 'Vents Del Desert (Original Mix)', 'Upercent'),
(1116, 1, 9, 'Tankwa Town (Original Mix)', 'Oliver Koletzki'),
(1117, 1, 10, 'Arabic (Bongotrack Remix)', 'Techplayers'),
(1118, 1, 11, 'Black Market (Original Mix)', 'YÃ¸r Kultura'),
(1119, 1, 12, 'Aldebaran (Original)', 'Hraach, Armen Miran'),
(1120, 1, 13, 'Mirage (Original)', 'Goldcap'),
(1121, 1, 14, 'Manquemapu (Original)', 'Niju, Rodrigo Gallardo, Spaniol'),
(1122, 1, 15, 'Tankwa Town (Niko Schwind Remix)', 'Oliver Koletzki'),
(1123, 10, 1, 'Planet (Original Mix)', 'Four Tet'),
(1124, 10, 2, 'Yul Brynner (Original Mix)', 'Luna Semara'),
(1125, 10, 3, 'Mustafa (Original Mix)', 'Luna Semara'),
(1126, 10, 4, 'Trust the Wild (Original Mix)', 'Joep Mencke'),
(1127, 10, 5, 'Dogma 1 (Original Mix)', 'Michael Mayer, Kolsch'),
(1128, 10, 6, 'Intergalactic Plastic (Bebetta Remix)', 'Luttrell'),
(1129, 10, 7, 'Lift (Jobe Remix)', 'Miguel Payda'),
(1130, 10, 8, 'CWM2 (Original Mix)', 'Lawrel'),
(1131, 10, 9, 'Party Over (Original Mix)', 'Tapan'),
(1132, 10, 10, 'Elias (Original Mix)', 'Aparde'),
(1133, 10, 11, 'Elaenia (Original Mix)', 'Floating Points'),
(1134, 10, 12, 'For Marmish Part II (Original Mix)', 'Floating Points'),
(1135, 10, 13, 'La Nuit (Original Mix)', 'Bochum Welt'),
(1136, 16, 1, 'Roll the Drums (Original Mix)', 'Peter Groskreutz'),
(1137, 16, 2, 'ZLO (Original Mix)', 'S Doradus'),
(1138, 16, 3, 'Oil Spill (Original Mix)', 'Dustin Holtsberry'),
(1139, 16, 4, 'Parasite Satellite (Original Mix)', 'Peter Groskreutz'),
(1140, 16, 5, 'Gravity (Original Mix)', 'Peter Groskreutz'),
(1141, 16, 6, 'To The Core (Original Mix)', 'Peter Groskreutz'),
(1142, 16, 7, 'Marshall (Original Mix)', 'Alberto Tolo'),
(1143, 16, 8, 'Enchanted Valley (Original Mix)', 'Luis M'),
(1144, 16, 9, 'C.E.M (Original Mix)', 'Fort Romeau'),
(1145, 16, 10, 'Raw (Original Club Mix)', 'David Amo, Julio Navas, Gustavo Bravetti'),
(1146, 16, 11, 'Ross Island (Original Mix)', 'Mateo!'),
(1147, 16, 12, 'Tracer (Nick Muir Reprise)', 'Darren Emerson, Nick Muir, John Digweed'),
(1148, 16, 13, 'The Animal (Original Mix)', 'Peter Groskreutz'),
(1149, 18, 1, 'Djupt Under (Original Mix)', 'Charlie Don\'t Surf'),
(1150, 18, 2, 'Playa Sunset (Original Mix)', 'Rey & Kjavik'),
(1151, 18, 3, 'Dr. Um (Original Mix)', 'Cut Snake'),
(1152, 18, 4, 'Gattara (Original Mix)', 'Bebetta'),
(1153, 18, 5, 'Tirant Lo Blanc (Original Mix)', 'Upercent'),
(1154, 18, 6, 'Tiefsicht feat. RenÃ© Van Munster (Original Mix)', 'Schattenspiel'),
(1155, 18, 7, 'Good News (Original Mix)', 'CIOZ'),
(1156, 18, 8, 'Pallene (Original Mix)', 'Uner'),
(1157, 18, 9, 'Tuna In (Original Mix)', 'Hanne & Lore'),
(1158, 18, 10, 'Missophie (Original Mix)', 'August & Bachert'),
(1159, 18, 11, 'Marimbo (Original Mix)', 'Daniel Rateuke'),
(1160, 18, 12, 'Cocoua (Original Mix)', 'Uner'),
(1161, 18, 13, 'Dark Age (Original Mix)', 'Upercent'),
(1162, 18, 14, 'Acamar (Original)', 'Frankey & Sandrino'),
(1163, 18, 15, 'Delirium (Original Mix)', 'Third Son'),
(1164, 18, 16, 'Mistari (MoBlack Remix)', 'Anerah Yasole'),
(1165, 18, 17, 'Twanged (RPO Part 2)', 'Rick Pier O\'Neil'),
(1166, 18, 18, 'Glen McKenna (Original Mix)', 'Aiden'),
(1167, 18, 19, 'Unravel (Original Mix)', 'Martinet'),
(1168, 18, 20, 'Marimbo (Original Mix)', 'Daniel Rateuke'),
(1169, 18, 21, 'Cronopio (Third Son Remix)', 'Upercent'),
(1170, 18, 22, 'Delirium (Original Mix)', 'Third Son'),
(1171, 18, 23, 'Isokuso (Third Son Remix)', 'Alican'),
(1172, 19, 1, 'Melifluo (Paul Deep Remix)', 'Mauro Rodriguez'),
(1173, 19, 2, 'Verandering (Original Mix)', 'Arno Motz'),
(1174, 19, 3, 'Walhall (Original Mix)', 'Luc Angenehm'),
(1175, 19, 4, 'Mouth To Mouth (Dubfire Remix)', 'Audion'),
(1176, 19, 5, 'Mephistopheles (Robert R. Hardy Remix)', 'Nicolas Rada'),
(1177, 19, 6, 'Edge (Original Mix)', 'Michael A'),
(1178, 19, 7, 'Bottom Of The Stairs (Christian Prommer Vocal Remix)', 'My Favorite Robot'),
(1179, 19, 8, 'Elision (Original Mix)', 'Jonas Saalbach, Teenage Mutants'),
(1180, 19, 9, 'Ice & Honey (Original Mix)', 'Bambu Mind'),
(1181, 19, 10, 'Birds (JOBE Remix)', 'Marc DePulse, Several Definitions'),
(1182, 19, 11, 'Sleepless (Original Mix)', 'Stereo Underground'),
(1183, 19, 12, 'The Flashback (Original Mix)', 'Newborn Jr.'),
(1184, 26, 1, 'Come Die With Me (Original Mix)', 'IsoQuant'),
(1185, 26, 2, 'Reciprocity (Original Mix)', 'Reggy Van Oers'),
(1186, 26, 3, 'Gilgamesh (Original Mix)', 'Norbak'),
(1187, 26, 4, 'Vardar (Original Mix)', 'Ness'),
(1188, 26, 5, 'Unknown Dimensions (Original Mix)', 'Marcel Dope'),
(1189, 26, 6, 'Luciferin (Original Mix)', 'Joachim Spieth'),
(1190, 26, 7, 'Cutting Tool (Original Mix)', 'Marcel Locust'),
(1191, 26, 8, 'My Methods (Original Mix)', 'Marcel Locust'),
(1192, 26, 9, 'Creepers & Crawlers (Tom Gotti Remix)', 'Audiocoma'),
(1193, 26, 10, 'Ephemeral Visions (Echologist Remix)', 'Aleja Sanchez'),
(1194, 26, 11, 'H2SO4 (VSK Remix)', 'MTD'),
(1195, 26, 12, 'Feed Your Need (A. Mochi & Kaoru Inoue Remix)', 'Knobs'),
(1196, 26, 13, 'Wave Oscillation (Original Mix)', 'David Meiser'),
(1197, 27, 1, 'Epic (Original Mix)', 'Anna V.'),
(1198, 27, 2, 'Vision (Obscure Shape & SHDW Remix)', 'Radio Slave'),
(1199, 27, 3, 'Flow (Soundbalance Remix)', 'Marc Holstege'),
(1200, 27, 4, 'Perfect Dominance (Original Mix)', 'Drunken Kong'),
(1201, 27, 5, 'Rotlicht (Original Mix)', 'Oliver Huntemann'),
(1202, 27, 6, 'Planet Eros (Original Mix)', 'Stas Drive, Hypnopod'),
(1203, 27, 7, 'Monsch (Stephan Zovsky Remix)', 'Karl Kirschmayer'),
(1204, 27, 8, 'Inside Out (Original Mix)', 'Victor Ruiz, Drunken Kong'),
(1205, 27, 9, 'The Underground (Anna V. remix) (Anna V. Remix)', 'Nicolas Taboada'),
(1206, 27, 10, 'Extreem (Original Mix)', 'Secret Cinema, Reinier Zonneveld'),
(1207, 27, 11, 'Colours Of Black (Original Mix)', 'Hidden Empire'),
(1208, 27, 12, 'Tarantula (7 Year Itch Rework)', 'Pleasurekraft'),
(1209, 27, 13, 'Fatty Acid (Original Mix)', 'Jobe'),
(1210, 27, 14, 'Unconfused (Original Mix)', 'Thomas Schumacher'),
(1211, 27, 15, 'Resist (Original Mix)', 'Drunken Kong');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sets`
--

CREATE TABLE `sets` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `promo` tinyint(4) NOT NULL DEFAULT '0',
  `setorder` smallint(6) NOT NULL DEFAULT '1',
  `released` datetime DEFAULT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setlength` mediumint(9) NOT NULL DEFAULT '0',
  `bpm` smallint(6) NOT NULL DEFAULT '0',
  `filename` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filetype` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `plays` int(11) NOT NULL DEFAULT '0',
  `dls` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `sets`
--

INSERT INTO `sets` (`id`, `active`, `promo`, `setorder`, `released`, `title`, `setlength`, `bpm`, `filename`, `filetype`, `cover`, `description`, `clicks`, `plays`, `dls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, '2017-03-09 03:51:05', 'Zauberwesen Pokes Around The World', 75, 121, 'zauberwesen_pokes_around_the_world.mp3', 'mp3', 'zauberwesen.jpg', 'Begleite das Zauberwesen auf seiner Reise um die Welt. Es kennt viele geheimnisvolle Orte. Manche kann man nicht so einfach anschauen - aber hören und wer richtig zuhören kann, dem wird sie das Zauberwesen sichtbar machen.', 2, 1, 1, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(2, 1, 0, 1, '2016-10-07 03:51:05', 'Pegasi und Reiterhorden', 68, 125, 'pegasi_und_reiterhorden.mp3', 'mp3', 'rackzoohm.jpg', 'Cinematisches Set mit Fantasy Themen mit Tracks die eigentlich für den Club gedacht sind.', 11, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(3, 1, 0, 1, '2018-11-24 03:51:05', 'NaturalSelection', 73, 125, 'naturalselection.mp3', 'mp3', 'naturalselection.jpg', 'Ich atme tief ein. Scheint Freiheit zu sein.', 9, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(4, 1, 0, 1, '2016-02-05 03:51:05', 'Liquid Session In Hamburg I', 75, 123, 'liquid_session_in_hamburg_01.mp3', 'mp3', 'liquid1.jpg', 'Der erste Streich in Hamburg.', 3, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(5, 1, 0, 1, '2016-02-09 03:51:05', 'Liquid Session In Hamburg II', 62, 120, 'liquid_session_in_hamburg_02.mp3', 'mp3', 'liquid2.jpg', 'Und der zweite folgt zu gleich.', 0, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(6, 1, 0, 1, '2017-01-04 03:51:05', 'Keine Bademeister Bitte!', 82, 122, 'keine_bademeister_bitte.mp3', 'mp3', 'bademeister.jpg', 'Titel ist ernst zu nehmen, ihr werdet es hassen :)', 8, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(7, 1, 0, 1, '2017-07-11 03:51:05', 'Dubno', 73, 122, 'dubno.mp3', 'mp3', 'dubno.jpg', 'Einer nannte seinen Sound mal Schneckno, da kam mir Dubno in den Sinn.', 2, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(8, 1, 0, 1, '2017-07-11 03:51:05', 'Autophan', 53, 122, 'autophan.mp3', 'mp3', 'autophan.jpg', 'Verliere jedes Gefühl für Zeit. Ein Lächeln rast vorbei. Von Bergen eingerahmt.', 2, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(9, 1, 0, 1, '2018-01-02 03:51:05', 'Zauberwesen Marvels At Landmarks', 78, 115, 'waves_becoming_landmarks.mp3', 'mp3', 'landmark.jpg', 'Musik schwingt immer gleich, im Kopf erhält sie erst ihre ganz persönliche Gestalt.', 5, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(10, 1, 0, 1, '2018-01-11 03:51:05', 'Etwas Herzblut Gereicht', 114, 123, 'etwas_herzblut_gereicht.mp3', 'mp3', 'herzblut.jpg', 'Derjenige der mein Herzblut auf der Tanzfläche fließen sehen will, der spielet bitte doch solche Musik.', 8, 0, 0, '2017-09-08 23:51:05', '2017-09-08 23:51:05'),
(11, 1, 0, 1, '2018-12-09 03:51:05', 'Endzeiten Verschoben', 89, 124, 'endzeit.mp3', 'mp3', 'endzeiten.jpg', 'Die Endzeit bahnt sich nur an, aber jemand drückte den Knopf und alles wurde wieder gut.', 9, 0, 0, NULL, NULL),
(12, 1, 0, 1, '2018-03-09 03:51:05', 'Analog And Electro', 64, 169, 'analog_and_electro.mp3', 'mp3', 'analog.jpg', 'Wenn Bands elektronische Intrumente entdecken aber ihre Wurzeln nicht vergessen.', 9, 0, 0, NULL, NULL),
(13, 1, 0, 1, '2018-03-09 03:51:05', 'Ariane Bounce Back', 75, 0, 'ariane_bounce_back.mp3', 'mp3', 'ariane.jpg', 'Mainfloor Gehversuche', 10, 0, 0, NULL, NULL),
(14, 1, 0, 1, '2018-03-09 03:51:05', 'In Honor To Aron Swartz', 85, 123, 'in_honor_to_aron_swartz.mp3', 'mp3', 'swartz.jpg', 'First: Stay curious. Second: Don’t accept things as they are, or assume they’re that way for a good reason. Third: Become good at something. And then use it to make a difference. Fourth: Ask yourself what you could do to make the biggest difference in the world. And then challenge your answers. And lastly: Stay alive.', 4, 0, 0, NULL, NULL),
(15, 1, 0, 1, '2018-03-09 03:51:05', 'The Black Orb', 69, 0, 'the_black_orb.mp3', 'mp3', 'orb.jpg', 'Hm, etwas härtere Gangart aber nichts brutales.', 5, 0, 0, NULL, NULL),
(16, 1, 0, 1, '2018-03-09 03:51:05', 'Peter Der Grosse', 87, 125, 'peter_der_grosse.mp3', 'mp3', 'ghost.jpg', 'Zeugs von Phobos und so.', 6, 0, 0, NULL, NULL),
(17, 1, 0, 1, '2018-03-09 03:51:05', 'Phouse Pitcher Dub', 68, 140, 'phouse_pitcher_dub.mp3', 'mp3', 'ppitch.jpg', 'Freestylesession zwichen Dub wirren Beatmassaker und sonstwas...', 4, 0, 0, NULL, NULL),
(18, 1, 0, 1, '2019-01-11 03:51:05', 'Sunday Morning', 86, 121, 'sunday_morning.mp3', 'mp3', 'sunday.jpg', 'Hmmm ... Groove ... warme Moods ... einfach scheee', 16, 0, 0, NULL, NULL),
(19, 1, 0, 1, '2018-03-09 03:51:05', 'Stellaris', 73, 126, 'stellaris.mp3', 'mp3', 'stellaris.jpg', NULL, 8, 0, 0, NULL, NULL),
(20, 1, 0, 1, '2019-01-09 03:51:05', 'Damokles Schwert', 69, 127, 'damokles_schwert.mp3', 'mp3', 'damokles.jpg', NULL, 11, 0, 0, NULL, NULL),
(21, 1, 0, 1, '2019-01-02 03:51:05', 'Dark Star', 66, 126, 'dark_star.mp3', 'mp3', 'darkstar.jpg', 'Schöne Grüße von Steyoyoke.', 6, 0, 0, NULL, NULL),
(22, 1, 0, 1, '2018-06-09 03:51:05', 'Wüstennächte', 60, 112, 'wüstennächte.mp3', 'mp3', 'desertnight.jpg', NULL, 10, 0, 0, NULL, NULL),
(23, 1, 1, 1, '2018-12-09 03:51:05', '8bit sometimes', 91, 126, '8bitsometimes.mp3', 'mp3', '8bit.jpg', 'Ein Bogen von @lez beatpattern über virtuosen 8bit likes von Olaf Stuut zu groovigem mit Kotelett & Zadak. Weit weg vom Mainstream und trotzdem richtig eindringend.', 13, 0, 0, NULL, NULL),
(24, 1, 0, 1, '2018-08-09 03:51:05', 'Kaffee Und Kekse', 85, 124, 'kaffee_und_kekse.mp3', 'mp3', 'kekse.jpg', 'Was ich so gebrauchen kann wenn man sich zu Kaffee und sontwas zum chillen begibt.', 12, 0, 0, NULL, NULL),
(25, 1, 0, 1, '2018-07-09 03:51:05', 'Mondgesicht', 80, 123, 'mondgesicht.mp3', 'mp3', 'moonface.jpg', 'Melodischer Techno ... eigentlich ging es nur darum dem legendären Klassiker Forge von Bedrock endlich einen Platz einzuräumen.', 12, 0, 0, NULL, NULL),
(26, 1, 0, 1, '2019-01-20 03:51:05', 'Organic Harvester', 58, 131, 'organic_harvester.mp3', 'mp3', 'harvester.jpg', 'Düster, progressive, depressiv, minimal. Wohl bekomms!', 17, 1, 5, NULL, NULL),
(27, 1, 0, 1, '2016-08-09 03:51:05', '1k Heads Shaking', 84, 128, '1k_heads_shaking.mp3', 'mp3', 'shaking.jpg', 'Meine Respektansage an den Mainfloor, denn dort werde ich mich stets als Gast fühlen. Aber nett mal vorbei zu schauen.', 3, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skillscats_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `perc` int(11) NOT NULL,
  `icon` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `skills`
--

INSERT INTO `skills` (`id`, `skillscats_id`, `active`, `title`, `description`, `perc`, `icon`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'HTML5', 'Schlafwandlerisch und browserübergreifend schreibe ich HTML freihand und W3C konform. Gewöhnlich mache ich die Qualitätssicherung mit Chrome, Firefox und Safari. Hier sind auch ähnlich umschreibende Sprachtypen zu erwähnen wie z.B. XML oder XSL.', 100, 'fab fa-html5', '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(2, 2, 1, 'CSS3', 'Der großen Komplexität geschuldet, gerade was browserübergreifende Themen betrifft, will ich mich nicht als perfekt bezeichnen. Es gab aber bisher nur sehr wenige Probleme die ich nicht irgendwie zufriedenstellend lösen konnte. CSS ist das wichtigste Werkzeug eines Frontendentwicklers und somit mein absolutes Kernthema.', 95, 'fab fa-css3', '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(3, 2, 1, 'SVG', 'Ich erachte SVG für wichtiger als es zur Zeit weltweit Verwendung findet. Ich habe mich auch etwas in die Programmierung eingearbeitet um komplexere SVGs und etwas Animation in den Griff zu bekommen. Mein routinierter Umgang mit SVG Programmen wie Illustrator oder Inkscape helfen hier sehr.', 70, NULL, 'svg.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(4, 2, 1, 'Sass', 'Für mich ist der CSS Preprozessor nicht mehr weg zu denken. Beim Hickhack um Sass oder Less habe ich mich ich auf die Sass Seite geschlagen, kenne mich aber auch mit Less aus und kann sogar Stylus.', 100, 'fab fa-sass', '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(5, 2, 1, 'Javascript', 'Über die Jahre bin ich auch mit Vanilla Javascript vertraut geworden, bevorzuge aber Frameworks. Es gab schwierige Nüsse die ich nur mit Hilfe von Stackoverflow lösen konnte und wäre nicht ehrlich wenn ich dem Skill 100% geben würden denn nur wer die Lösungen zu solchen Nüssen postet sollte das tun.', 85, 'fab fa-js-square', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(6, 2, 1, 'SEO', 'Für Ranking etc. gibt es SEO-Experten - der bin ich nicht. Doch gutes SEO beginnt schon im Quellcode. Gut programmierte Webseiten mit Aspekt auf SEO machen den SEO-Experten glücklich, sodass ich tiefgreifend informiert bin was meinen Bereich betrifft.', 70, NULL, 'seo.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(7, 3, 1, 'Materialize', 'Nach sehr umfangreicher Recherche für das optimale CSS Framework kam ich zu der Erkenntnis das es sowas nicht gibt. Für meine bisherigen Bedürfnisse war Materialize das geeignetste. Ich habe auch schon viele Andere verwendet (Polymer, Bootstrap, Vuetify ...) und bin schnell eingearbeitet wenn ein neues verwendet werden soll.', 100, '', 'materialize.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(8, 3, 1, 'Foundation, Bootstrap', 'Diese bedeutend mächtigeren Frameworks verwende ich wenn das Design eine untergeordnete Rolle spielt aber kein Werkzeug fehlen sollte. Leider ist das Design in die Jahre gekommen und nicht immer nach meinem Geschmack.', 90, NULL, NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(9, 3, 1, 'Quasar', 'Bei Vue sind Webkomponenten nicht Teil sondern Basis des Konzepts, Quasar führt die logische Konequenz ein CSS Framework für Webkomponenten zu liefern am überzeugensten weiter.', 80, '', '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(10, 4, 1, 'jQuery', 'jQuery wird zwar immer unwichtiger, für Eventhandling und komplexe Aufgaben ist es immernoch mein Favorit. Es hilft Teams Code aufgeräumter/verständlicher zu präsentieren und Lösungen zu vereinheitlichen. Ich sehe es als Vorstufe zur Wahl eines richtigen JS Framework. Seit vielen Jahre setze ich es ein und bin dementsprechend grün damit.', 95, '', 'jquery.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(11, 4, 1, 'Vue', 'Nach sehr langer und intensiver Suche ist Vue das JS Framework meiner Wahl und ich besitze entsprechend damit am meisten Erfahrung. Es ist das einzige JS Framework mit dem ich eingesetzte Apps entwickelt habe.', 60, 'fab fa-vuejs', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(12, 4, 1, 'Angular', 'Über das Heroes Tutorial bin ich nicht hinausgekommen. Sollte ich es einsetzen müssen werden sicher einige Monate Grundlagenforschung notwendig sein.', 30, 'fab fa-angular', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(13, 4, 1, 'Ember', 'Für mich ist es einer der besten und entsprechend enthusiastisch habe ich mich damit beschäftigt. Eingesetzt habe ich es leider noch nicht.', 35, 'fab fa-ember', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(14, 4, 1, 'React', 'Auch React habe ich noch nicht eingesetzt, meine Übungen haben mir aber mehr Spaß bereitet als mit Angular und ich bin auch gerne bereit hauptsächlich damit zu arbeiten.', 25, 'fab fa-react', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(15, 4, 1, 'Node', 'Für effektive Frontendentwicklung bietet Node.js gute Dienste. Ich habe mich deshalb damit arrangiert was das Erstellen von Entwicklungsumgebungen betrifft. Dazu verwende ich NPM.', 30, 'fab fa-node-js', '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(16, 4, 1, 'Gulp', 'Für meine Entwicklungsumgebung verwende ich am liebsten Gulp und kenne mich mit Gulptasks und Pipes gut aus. Grunt kenne ich nur von der Theorie.', 40, 'fab fa-gulp', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(17, 4, 1, 'Webpack', 'Da Vue nur mit Webpack Sinn ergibt, kenne ich mich ausreichend aus, um Buildprozesse zu erstellen. Vieles im Detail bleibt für mich aber immer noch ein Rätsel.', 35, NULL, 'webpack.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(18, 4, 1, 'Docker', 'Für größere Teams, die vor allem ortsungebunden arbeiten und unterschiedliche IT-Infrastruckturen verwenden müssen, könnte Docker die Lösung, der durch solche Umstände entstehenden Probleme, sein. In der Praxis habe ich keine Erfahrung mit Docker gemacht, ich glaube aber an diese Technologie und arbeite mich in meiner Freizeit immer ein Stückchen weiter ein.', 15, 'fab fa-docker', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(19, 5, 1, 'Wordpress, Joomla!, Drupal und Voyager', 'Ich habe schon lange kein CMS mehr verwendet, da meist firmeneigene Lösungen zum Einsatz kamen. Ich habe mit den oben genannten CMS am meisten Erfahrung gesammelt. Auch diese Webseite besitzt kein CMS sondern ein innovatives System (Voyager), das auf CRUD bzw. BREAD Operationen basiert. Berührungsängste mit CMS jeglicher Couleur habe ich sicher nicht. Eine Ausnahme wäre Magento :)', 85, 'fab fa-wordpress', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(20, 6, 1, 'PHP7', 'Ich beschäftige mich mit PHP seit Version 3 und bin dementsprechend vertraut mit objektorientierter Programmierung. Auch wenn ich schon unzählige Projekte mit PHP realisiert habe, zähle ich mich nicht als klassischen Programmierer. Da ich mich so gut mit PHP auskenne, bin ich der perfekte Frontendentwickler für Teams, die mit PHP Backends entwickeln. Ich werde schnell verstehen wie sie funktionieren und was ich zu tun habe um Content sichtbar zu machen. Auch modulare Apps in solchen Systemen zu entwickeln, sollte für mich kein Problem darstellen, wenn der Informatiker bei Bedarf die notwendige Hilfestellung leistet.', 85, 'fab fa-php', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(21, 6, 1, 'ASP', '2017/18 habe ich ausschließlich für ASP.net basierte Webseiten entwickelt. Das MVC Prinzip liegt mir seit jeher im Blut und als Frontendentwickler hatte ich natürlich meinen Fokus auf das V (Razor) gelegt. Für das MC fühle ich mich nicht zuständig. Ich verstehe meistens was dort passiert, schreibe es aber nicht selber.', 70, NULL, 'visual-studio.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(22, 6, 1, 'Ruby', '2013 durfte ich an einem umfangreichen Ruby on Rails Projekt mitarbeiten und war hellauf begeistert. Dementsprechend lernte ich auch Ruby. Da dies nun einige Zeit her ist, zähle ich dies nicht mehr zu meinen aktuellsten Skills, doch für eine Rückkehr bin ich stets offen.', 25, NULL, 'ruby.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(23, 6, 1, 'MySQL', 'MySQL ist die einzige Datenbank, die ich tiefgreifend kennen gelernt habe. Wichtig zu erwähnen, ist vor allem die notwendige Achtsamkeit für resourcenschonende Querries und sicherheistrelevante Aspekte. Andere Datenbanken kenne ich nur über Abstraktionsebenen und will sie auch nicht weiter kennen lernen.', 70, NULL, 'mysql.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(24, 6, 1, 'Git, TFS, SVN', 'Am liebsten arbeite ich mit Git - auch über Konsole. In TFS bin ich routiniert, allerdings nur über Visiual Studio. Bei SVN bin ich etwas eingerostet und kenne es über Konsole. Der Umgang mit Tortoise ist mir geläufig.', 70, 'fab fa-github-square', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(25, 7, 1, 'Laravel', 'Um an PHP nicht den Anschluß zu verlieren, habe ich mich intensiv mit Laravel befasst und arbeite zur Zeit sehr viel damit. Mit Routing, Controller und Views bin ich gut vertraut. Ich bin außerdem in der Lage, mir für spezielle Probleme, selbstständig Lösungswege zu erarbeiten.', 80, 'fab fa-laravel', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(26, 7, 1, 'Yii2', 'Seit zwei Jahren beschäftige ich mich nur noch mit Laravel. Die beiden sind sich doch recht ähnlich und es dürfte nicht lange dauern, bis ich mit Yii2 warm werde. Sowohl den Vorgänger meiner Webseite als auch einen Mockup Prototypen für einen Kunden habe ich damit umgesetzt.', 50, NULL, 'yii.svg', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(27, 8, 1, 'GUI', 'Die Schnittstelle zwischen Mensch und Maschine ist das was mich am meisten interessiert. Ich befasse mich mit der psychologischen Wirkung von Farben und Formen auf den Benutzer. Das erarbeiten von GUIs ist genau mein Ding - hier bin ich zuhause. Kleinste Details in der Gestalung sind mir wichtig. Durch mein designorientiertes Studium und viel Praxis in der Zusammenarbeit mit Designern, bin ich das pixelgenaue arbeiten gewohnt. Somit besitze ich die notwendige Awareness für Designperfektion, die man bei so manchen Programmierern vermissen wird :)', 100, 'fas fa-tv', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(28, 8, 1, 'Fotografie', 'Während meines Studiums durfte ich auch ein Fotoseminar genießen und lernte alles über Blenden und Belichtungszeiten. Photoshop und Illustrator sind für mich bis heute wichtige Programme geblieben und ihre professionelle Verwendung schon lange Normalität. Dies wird in Zeiten von Flat-Material-Design kaum noch gebraucht aber meine Fähigkeit anspruchsvolle Grafiken zu erstellen, ist nach wie vor vorhanden und wird weiterhin gepflegt.', 80, 'fas fa-camera-retro', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(29, 8, 1, 'Malen & Zeichnen, Layout, Farbenlehre', 'Der analoge Umgang mit Pinsel, Feder und Stift war Teil meines Studiums. Von Aktmalerei bis zum Farbkreis. Auch privat male ich gerne, für einen Illustrator reicht mein Talent aber leider nicht.', 90, 'fas fa-palette', NULL, '2017-09-09 01:51:05', '2017-09-09 01:51:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `skillscats`
--

CREATE TABLE `skillscats` (
  `id` int(10) UNSIGNED NOT NULL,
  `skillscats_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `skillscats`
--

INSERT INTO `skillscats` (`id`, `skillscats_id`, `active`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Allgemein', '', '2017-09-09 02:43:00', '2017-09-09 02:44:19'),
(2, 2, 1, 'Frontend', '', '2017-09-09 02:44:04', '2017-09-09 02:44:04'),
(3, 3, 1, 'Frontend CSS Frameworks', '', '2017-09-09 02:44:04', '2017-09-09 02:44:04'),
(4, 4, 1, 'Frontend Javascript Frameworks', '', '2017-09-09 02:44:04', '2017-09-09 02:44:04'),
(5, 5, 1, 'Frontend CMS', '', '2017-09-09 02:44:04', '2017-09-09 02:44:04'),
(6, 6, 1, 'Backend', '', '2017-09-09 02:44:04', '2017-09-09 02:44:04'),
(7, 7, 1, 'Backend Frameworks', '', '2017-09-09 02:44:04', '2017-09-09 02:44:04'),
(8, 8, 1, 'Design', '', '2017-09-09 02:44:04', '2017-09-09 02:44:04');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `tags`
--

INSERT INTO `tags` (`id`, `title`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fast', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(2, 'Minimal', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(3, 'Slow', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(5, 'Melodic', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(6, 'Progessive', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(7, 'Deep', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(8, 'Mellow', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(9, 'Chillout', NULL, 'Sphärische, sanfte, langgezogene und warme Klänge dominieren. Rhythmus und Perkussion stehen im Hintergrund oder fehlen.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(10, 'Ambient', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(11, 'Ethno', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(12, 'Groove', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(13, 'Experimental', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(14, 'Mystic', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(15, 'Dark', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(16, 'Technic', NULL, '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(17, 'Mainfloor', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags_sets`
--

CREATE TABLE `tags_sets` (
  `id` int(10) UNSIGNED NOT NULL,
  `setid` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `tags_sets`
--

INSERT INTO `tags_sets` (`id`, `setid`, `tag`, `rate`) VALUES
(49, 3, 5, 9),
(50, 3, 14, 6),
(51, 3, 8, 6),
(69, 5, 3, 7),
(70, 5, 8, 8),
(71, 5, 13, 4),
(72, 5, 12, 5),
(92, 7, 12, 7),
(93, 7, 6, 5),
(94, 7, 14, 3),
(99, 8, 1, 8),
(100, 8, 5, 6),
(101, 8, 6, 5),
(204, 17, 1, 7),
(205, 17, 12, 7),
(206, 17, 13, 9),
(207, 17, 16, 7),
(220, 16, 15, 5),
(221, 16, 12, 7),
(222, 16, 14, 4),
(223, 16, 8, 5),
(232, 6, 3, 7),
(234, 6, 5, 10),
(235, 6, 9, 3),
(246, 19, 6, 9),
(247, 19, 7, 7),
(248, 19, 12, 4),
(249, 19, 5, 4),
(283, 22, 9, 8),
(284, 22, 11, 10),
(285, 22, 3, 6),
(287, 22, 5, 7),
(310, 12, 6, 8),
(311, 12, 11, 7),
(312, 12, 12, 7),
(313, 12, 13, 3),
(314, 10, 8, 10),
(315, 10, 5, 8),
(332, 24, 5, 9),
(333, 24, 12, 7),
(334, 24, 8, 8),
(350, 25, 5, 10),
(351, 25, 9, 6),
(352, 25, 8, 9),
(353, 25, 3, 8),
(354, 9, 11, 10),
(355, 9, 3, 7),
(356, 9, 9, 4),
(358, 9, 8, 6),
(359, 9, 14, 5),
(360, 4, 5, 7),
(361, 4, 14, 8),
(362, 4, 13, 2),
(363, 4, 1, 3),
(375, 1, 11, 10),
(376, 1, 16, 4),
(377, 20, 6, 8),
(378, 20, 12, 6),
(379, 20, 7, 7),
(380, 20, 1, 4),
(413, 11, 15, 3),
(414, 11, 6, 7),
(428, 14, 12, 8),
(429, 14, 1, 3),
(430, 14, 6, 5),
(431, 14, 5, 5),
(439, 23, 6, 9),
(440, 23, 12, 8),
(441, 23, 13, 1),
(442, 23, 5, 4),
(443, 18, 12, 10),
(444, 18, 8, 8),
(445, 18, 3, 4),
(455, 15, 1, 9),
(456, 15, 5, 3),
(457, 15, 6, 6),
(458, 2, 14, 8),
(459, 2, 5, 9),
(460, 2, 1, 6),
(461, 21, 1, 9),
(462, 21, 14, 8),
(463, 21, 5, 5),
(464, 13, 1, 10),
(465, 13, 16, 6),
(466, 13, 6, 4),
(467, 13, 17, 10),
(472, 26, 15, 10),
(473, 26, 6, 8),
(474, 26, 2, 8),
(475, 26, 14, 6),
(479, 27, 1, 10),
(480, 27, 17, 10),
(481, 27, 6, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `superuser` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `superuser`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'info@pixelmorph.de', '$2y$10$81nFK.jzBf2hkRk3BMJm1O.VsgGrCIIa9tlgksvwahL0rIxr5.x1a', 1, 'Qjz8McnEgh9Sx1S7DVG30WcqDPicszDl69xcBu4QUZKG8d6lmTzO3aPq3ckb', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(2, 'Besucher', 'besucher@pixelmorph.de', '$2y$10$7iFI6csVlXM1NeuIDwvIeew64XyTWqpOkMCSB96sC47zd5cmKRICC', 0, 'dmLTNkAiBw3ENWaIkRS3SRB3qImsl3f86a4wrs34vBptNaN43Dn0IR6nifwn', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(3, 'Gast', 'gast@pixelmorph.de', '$2y$10$lac5hZh1NpGB01vv86AhLuCb.DaVpmMMQ/uwqxXk.WNQfj9VEDoR6', 0, 'drTWHVb0kpSS3ZOFsXFgYYOqOltBi13Nh56wcQDqPZQMp3HhZS3ghyaY2ckO', '2017-09-09 01:51:05', '2017-09-09 01:51:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vitas`
--

CREATE TABLE `vitas` (
  `id` int(10) UNSIGNED NOT NULL,
  `datumstart` datetime NOT NULL,
  `datumend` datetime NOT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `vitas`
--

INSERT INTO `vitas` (`id`, `datumstart`, `datumend`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(1, '1991-01-01 12:00:00', '1993-12-31 12:00:00', 'Soziales Fachabitur / Wasserburg a. Inn', '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(2, '1994-01-01 12:00:00', '1995-12-31 12:00:00', 'Zivildienst', 'Als Krankenpfleger im Rotkreuz Krankenhaus München.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(3, '1996-01-01 12:00:00', '1998-12-31 12:00:00', 'Krankenpflege Helfer', 'Zumeist auf der internen Station im Kreiskrankenhaus Ebersberg und Neuperlach. ', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(4, '1999-01-01 12:00:00', '2001-12-31 12:00:00', 'Studium Mediadesigner / Mediadesign Akademie München', '4 Semster insgesamt. Malen & Zeichen, Fotografie im Anschluß Photoshop, Videoproduktion im Anschluß Premiere, Soundproduktion, Layout, Illustration im Anschluß Illustrator, 3D Design (3D Studion MAX), Quark Xpress bis Druckendstufe, HTML, Director (incl. Lingo).<br>Das Abschlussprojekt (Director/Lingo basierte Kinderlernsoftware über Strom) gewann den Jungendpreis der Multimediamesse Milia in Cannes.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(5, '2002-03-09 03:51:05', '2003-12-31 03:51:05', 'Selbstständiger Mediadesigner', 'Zu der Zeit waren CD-ROMs wichtiger als das Internet. Ich entwickelt Produktpräsenationen für die Firmen <a href=\"https://binz-ilmenau.de/\" target=\"_blank\">Binz</a>, <a href=\"https://www.kinowelt.de\" target=\"_blank\">Kinowelt</a> und ExLibris. Das Feature war jeweils ein kleines integriertes Computerspiel (Director/Lingo).', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(6, '2003-03-09 03:51:05', '2011-12-31 03:51:05', 'Senior Online Producer / MTV Networks.', 'Rechtzeitig zum .com-Boom startete der gerade neu aufgestellte deutschsprachige Feed des Musiksenders MTV seine erste <a href=\"http://www.mtv.de\" target=\"_blank\">Webseite</a>. Ich begleitete den Online Auftritt über fünf Relaunchs. Die ersten - wie es in den 90er Jahren üblich war - noch tapfer mit FTP. Der dritte Relaunch bekam sein erstes PHP3 CMS. Der vierte ging mit dem damals \"on the edge\" MVC Framework <a href=\"https://github.com/agavi/agavi\" target=\"_blank\">Agavi</a> live und gewann den <a href=\"https://www.grimme-online-award.de\" target=\"_blank\">Grimme Online Award</a>. Ich realisierte für namenhafte Firmen wie Mercedes, Puma, Loréa oder Karstadt Projekte in Kooperation mit der MTV Brand. In den letzten Jahren betreute ich die fünfköpfige Producer Redaktion. Abwechslungsreiche Projekte, wie ein firmeninternes Ticketsystem oder spezielle Webauftritte der TV-Shows (großes Highlight waren natürlich immer die EMAs), versüßten den den Alltag an unserer \"Wir und unser Baby\" - Front. ', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(7, '2012-02-01 03:51:05', '2013-12-31 03:51:05', 'Durch Krankheit bedingte Auszeit', '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(8, '2016-03-09 03:51:05', '2018-12-31 03:51:05', 'Frontend Webentwickler / Deltatre.', 'Aufbau einer neuen Abteilung der italienischen Mutterfirma Deltatre in Hamburg. Viel Zeit verbrachte ich mit der Realisierung von Schnittstellen, um das Frontend von ASP.net (welches in der Firma benutzt wurde) abzukoppeln. Dadurch wurde es möglich, die Backend-Entwickler zu entlasten, indem sie sich nicht mehr mit den Feinheiten von HTML und CSS beschäftigen mussten. Hiermit wurde die Trennung von Frontend und Backend ermöglicht, wie es in modernen Webentwicklungsprozessen üblich ist.<br> \r\nDas größte realisierte Projekt war das Frontend für die firmeninterne Software, mit welcher Fußballdaten gepflegt und geprüft wurden. Kleinere Projekte waren z.B. die Entwicklung eines Frontend, welches an das Live-Blogging Backend für das Handelsblatt und die Bundesliga angebunden wurde.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(10, '2014-01-01 03:51:05', '2015-01-01 03:51:05', 'Neuorientierung / Selbstständigkeit', 'Als Selbstständiger arbeitete ich als Zuarbeiter für Argenturen. Z.B. erstellte ich CSS Hacks für Wordpress Installationen um Darstellungswünsche zu realisieren die über das CMS nicht mehr machbar waren. Für einen anderen Kunden konvertierte ich seine statische HTML Seite zu einem CMS.', '2017-09-09 01:51:05', '2017-09-09 01:51:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wg_profiles`
--

CREATE TABLE `wg_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wg_users`
--

CREATE TABLE `wg_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `wg_gesucht_id` bigint(20) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `profiles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `wg_users`
--

INSERT INTO `wg_users` (`id`, `wg_gesucht_id`, `desc`, `profiles`, `created_at`, `updated_at`) VALUES
(1, 77, 'profile 1 bla', '1,2,3', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(2, 77, 'profile 2 bla', '1,2,3', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(3, 77, 'profile 3 bla', '1,2,3', '2017-09-09 01:51:05', '2017-09-09 01:51:05');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `blogcats`
--
ALTER TABLE `blogcats`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `skillscats`
--
ALTER TABLE `skillscats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skillscats_skillscats_id_unique` (`skillscats_id`);

--
-- Indizes für die Tabelle `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tags_sets`
--
ALTER TABLE `tags_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indizes für die Tabelle `vitas`
--
ALTER TABLE `vitas`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `wg_profiles`
--
ALTER TABLE `wg_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `wg_users`
--
ALTER TABLE `wg_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `blogcats`
--
ALTER TABLE `blogcats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212;

--
-- AUTO_INCREMENT für Tabelle `sets`
--
ALTER TABLE `sets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `skillscats`
--
ALTER TABLE `skillscats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `tags_sets`
--
ALTER TABLE `tags_sets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `vitas`
--
ALTER TABLE `vitas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `wg_profiles`
--
ALTER TABLE `wg_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `wg_users`
--
ALTER TABLE `wg_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
