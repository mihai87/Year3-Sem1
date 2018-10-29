-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 08:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiectsincretic`
--

-- --------------------------------------------------------

--
-- Table structure for table `adrese_medici`
--

CREATE TABLE `adrese_medici` (
  `cnp_medic` char(13) DEFAULT NULL,
  `serieci_medic` char(2) NOT NULL,
  `nrci_medic` char(6) NOT NULL,
  `strada_medic` varchar(35) DEFAULT NULL,
  `nrstr_medic` varchar(5) DEFAULT NULL,
  `bloc_medic` varchar(5) DEFAULT NULL,
  `scara_medic` varchar(3) DEFAULT NULL,
  `ap_medic` varchar(3) DEFAULT NULL,
  `oras_medic` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_interventii`
--

CREATE TABLE `catalog_interventii` (
  `tip_interventie` varchar(35) NOT NULL,
  `cost_materiale` float(5,2) DEFAULT NULL,
  `tarif_interventie` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contracte_medici`
--

CREATE TABLE `contracte_medici` (
  `id_contract` int(11) UNSIGNED NOT NULL,
  `cnp_medic` char(13) DEFAULT NULL,
  `telefon_medic` int(10) UNSIGNED DEFAULT NULL,
  `email_medic` varchar(35) DEFAULT NULL,
  `ziua_angajarii` char(2) DEFAULT NULL,
  `luna_angajarii` char(2) DEFAULT NULL,
  `anul_angajarii` char(4) DEFAULT NULL,
  `salariu_angajare` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fise_pacienti`
--

CREATE TABLE `fise_pacienti` (
  `numar_fisa` int(11) UNSIGNED NOT NULL,
  `nume_pacient` varchar(20) DEFAULT NULL,
  `prenume_pacient` varchar(25) DEFAULT NULL,
  `ziua_nasterii` char(2) DEFAULT NULL,
  `luna_nasterii` char(2) DEFAULT NULL,
  `anul_nasterii` char(4) DEFAULT NULL,
  `strada_pacient` varchar(35) DEFAULT NULL,
  `nrstr_pacient` varchar(5) DEFAULT NULL,
  `bloc_pacient` varchar(5) DEFAULT NULL,
  `scara_pacient` varchar(3) DEFAULT NULL,
  `ap_pacient` varchar(3) DEFAULT NULL,
  `oras_pacient` varchar(30) DEFAULT NULL,
  `telefon` int(10) UNSIGNED DEFAULT NULL,
  `data_fisa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foi_consultatie`
--

CREATE TABLE `foi_consultatie` (
  `id_consultatie` int(11) UNSIGNED NOT NULL,
  `numar_fisa` int(11) UNSIGNED DEFAULT NULL,
  `cnp_medic` char(13) DEFAULT NULL,
  `tip_interventie` varchar(35) NOT NULL,
  `observatii` text,
  `data_intocmire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incasari`
--

CREATE TABLE `incasari` (
  `id_incasare` int(11) UNSIGNED NOT NULL,
  `id_consultatie` int(11) UNSIGNED NOT NULL,
  `valoare_incasare` float(5,2) DEFAULT NULL,
  `data_incasare` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medici`
--

CREATE TABLE `medici` (
  `cnp_medic` char(13) NOT NULL,
  `nume_medic` varchar(20) DEFAULT NULL,
  `prenume_medic` varchar(25) DEFAULT NULL,
  `zin_medic` char(2) DEFAULT NULL,
  `lunan_medic` char(2) DEFAULT NULL,
  `ann_medic` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plati_medici`
--

CREATE TABLE `plati_medici` (
  `id_plata` int(11) UNSIGNED NOT NULL,
  `cnp_medic` char(13) DEFAULT NULL,
  `bonus` float(5,2) DEFAULT NULL,
  `valoare_plata` float(5,2) DEFAULT NULL,
  `data_plata` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programari_consultatii`
--

CREATE TABLE `programari_consultatii` (
  `id_programare` int(11) UNSIGNED NOT NULL,
  `zi_programare` char(2) DEFAULT NULL,
  `luna_programare` char(2) DEFAULT NULL,
  `an_programare` char(4) DEFAULT NULL,
  `ora_programare` char(2) DEFAULT NULL,
  `minut_programare` char(2) DEFAULT NULL,
  `cnp_medic` char(13) DEFAULT NULL,
  `numar_fisa` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adrese_medici`
--
ALTER TABLE `adrese_medici`
  ADD PRIMARY KEY (`serieci_medic`,`nrci_medic`),
  ADD KEY `cnp_medic` (`cnp_medic`);

--
-- Indexes for table `catalog_interventii`
--
ALTER TABLE `catalog_interventii`
  ADD PRIMARY KEY (`tip_interventie`);

--
-- Indexes for table `contracte_medici`
--
ALTER TABLE `contracte_medici`
  ADD PRIMARY KEY (`id_contract`),
  ADD KEY `cnp_medic` (`cnp_medic`);

--
-- Indexes for table `fise_pacienti`
--
ALTER TABLE `fise_pacienti`
  ADD PRIMARY KEY (`numar_fisa`);

--
-- Indexes for table `foi_consultatie`
--
ALTER TABLE `foi_consultatie`
  ADD PRIMARY KEY (`id_consultatie`),
  ADD KEY `cnp_medic` (`cnp_medic`),
  ADD KEY `tip_interventie` (`tip_interventie`);

--
-- Indexes for table `incasari`
--
ALTER TABLE `incasari`
  ADD PRIMARY KEY (`id_incasare`),
  ADD KEY `id_consultatie` (`id_consultatie`);

--
-- Indexes for table `medici`
--
ALTER TABLE `medici`
  ADD PRIMARY KEY (`cnp_medic`);

--
-- Indexes for table `plati_medici`
--
ALTER TABLE `plati_medici`
  ADD PRIMARY KEY (`id_plata`),
  ADD KEY `cnp_medic` (`cnp_medic`);

--
-- Indexes for table `programari_consultatii`
--
ALTER TABLE `programari_consultatii`
  ADD PRIMARY KEY (`id_programare`),
  ADD KEY `cnp_medic` (`cnp_medic`),
  ADD KEY `numar_fisa` (`numar_fisa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracte_medici`
--
ALTER TABLE `contracte_medici`
  MODIFY `id_contract` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fise_pacienti`
--
ALTER TABLE `fise_pacienti`
  MODIFY `numar_fisa` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foi_consultatie`
--
ALTER TABLE `foi_consultatie`
  MODIFY `id_consultatie` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `incasari`
--
ALTER TABLE `incasari`
  MODIFY `id_incasare` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plati_medici`
--
ALTER TABLE `plati_medici`
  MODIFY `id_plata` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programari_consultatii`
--
ALTER TABLE `programari_consultatii`
  MODIFY `id_programare` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adrese_medici`
--
ALTER TABLE `adrese_medici`
  ADD CONSTRAINT `adrese_medici_ibfk_1` FOREIGN KEY (`cnp_medic`) REFERENCES `medici` (`cnp_medic`) ON DELETE CASCADE;

--
-- Constraints for table `contracte_medici`
--
ALTER TABLE `contracte_medici`
  ADD CONSTRAINT `contracte_medici_ibfk_1` FOREIGN KEY (`cnp_medic`) REFERENCES `medici` (`cnp_medic`) ON DELETE CASCADE;

--
-- Constraints for table `foi_consultatie`
--
ALTER TABLE `foi_consultatie`
  ADD CONSTRAINT `foi_consultatie_ibfk_1` FOREIGN KEY (`cnp_medic`) REFERENCES `medici` (`cnp_medic`) ON DELETE CASCADE,
  ADD CONSTRAINT `foi_consultatie_ibfk_2` FOREIGN KEY (`tip_interventie`) REFERENCES `catalog_interventii` (`tip_interventie`) ON DELETE CASCADE;

--
-- Constraints for table `incasari`
--
ALTER TABLE `incasari`
  ADD CONSTRAINT `incasari_ibfk_1` FOREIGN KEY (`id_consultatie`) REFERENCES `foi_consultatie` (`id_consultatie`) ON DELETE CASCADE;

--
-- Constraints for table `plati_medici`
--
ALTER TABLE `plati_medici`
  ADD CONSTRAINT `plati_medici_ibfk_1` FOREIGN KEY (`cnp_medic`) REFERENCES `medici` (`cnp_medic`) ON DELETE CASCADE;

--
-- Constraints for table `programari_consultatii`
--
ALTER TABLE `programari_consultatii`
  ADD CONSTRAINT `programari_consultatii_ibfk_1` FOREIGN KEY (`cnp_medic`) REFERENCES `medici` (`cnp_medic`) ON DELETE CASCADE,
  ADD CONSTRAINT `programari_consultatii_ibfk_2` FOREIGN KEY (`numar_fisa`) REFERENCES `fise_pacienti` (`numar_fisa`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
