-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2021 at 03:12 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabinet_veterinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajati`
--

CREATE TABLE `angajati` (
  `AngajatID` int(11) NOT NULL,
  `CodAngajat` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Oras / Sector` varchar(50) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `Sex` char(1) NOT NULL,
  `Data_nasterii` date NOT NULL,
  `Data_angajarii` date NOT NULL,
  `Salariu` decimal(7,2) NOT NULL,
  `Functie_Ocupata` varchar(50) NOT NULL,
  `Numar_Telefon` char(10) NOT NULL,
  `E_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angajati`
--

INSERT INTO `angajati` (`AngajatID`, `CodAngajat`, `Nume`, `Prenume`, `CNP`, `Strada`, `Oras / Sector`, `Judet`, `Sex`, `Data_nasterii`, `Data_angajarii`, `Salariu`, `Functie_Ocupata`, `Numar_Telefon`, `E_mail`) VALUES
(1, 1, 'Pavlov', 'Ivan', '1910101019913', 'Scolilor', 'Sector 6', 'Bucuresti', 'M', '1991-10-10', '2020-04-08', '10000.00', 'Medic Veterinar', '0753059487', 'dr.pavlov@yahoo.com'),
(2, 2, 'Oprescu', 'Laura', '2910101019913', 'Valea Cascadelor', 'Sector 6', 'Bucuresti', 'F', '1991-10-10', '2020-05-18', '10000.00', 'Medic Veterinar', '0753555888', 'dr.oprescu@yahoo.com'),
(3, 43, 'Andreescu', 'Marcel', '1910117468803', 'Tudor Vladimirescu', 'Sector 5', 'Bucuresti', 'M', '1991-01-17', '2018-09-12', '6500.00', 'Asistent Veterinar', '0753654936', 'asistent.adreescu@yahoo.com'),
(4, 56, 'Oncescu', 'Silvia', '2910117468803', 'Grigore Alexandrescu', 'Brasov', 'Brasov', 'F', '1991-01-17', '2015-10-04', '6500.00', 'Asistent Veterinar', '0753421936', 'asistent.oncescu@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `angajatipacienti`
--

CREATE TABLE `angajatipacienti` (
  `PacientID` int(11) NOT NULL,
  `AngajatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angajatipacienti`
--

INSERT INTO `angajatipacienti` (`PacientID`, `AngajatID`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 2),
(3, 4),
(4, 2),
(4, 4),
(5, 2),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `interventii`
--

CREATE TABLE `interventii` (
  `InterventieID` int(11) NOT NULL,
  `CodInterventie` int(11) NOT NULL,
  `NumeInterventie` varchar(50) NOT NULL,
  `Tip` char(6) NOT NULL,
  `Pret` decimal(6,2) NOT NULL,
  `Durata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interventii`
--

INSERT INTO `interventii` (`InterventieID`, `CodInterventie`, `NumeInterventie`, `Tip`, `Pret`, `Durata`) VALUES
(1, 12, 'Deparazitare Interna', 'Intern', '500.00', 50),
(2, 13, 'Deparazitare Externa', 'Extern', '300.00', 30),
(3, 51, 'Tundere', 'Extern', '100.00', 30),
(4, 712, 'Sterilizare Caine', 'Intern', '250.00', 120),
(5, 81, 'Sterilizare Pisica', 'Intern', '300.00', 90);

-- --------------------------------------------------------

--
-- Table structure for table `pacienti`
--

CREATE TABLE `pacienti` (
  `PacientID` int(11) NOT NULL,
  `ProprietarID` int(11) NOT NULL,
  `CodPacient` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Specie` varchar(50) NOT NULL,
  `Rasa` varchar(50) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `DataNasterii` date DEFAULT NULL,
  `Culoare` varchar(50) NOT NULL,
  `NumarMicrocip` int(11) DEFAULT NULL,
  `DataImplantareMicrocip` date DEFAULT NULL,
  `LocalizareMicrocip` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacienti`
--

INSERT INTO `pacienti` (`PacientID`, `ProprietarID`, `CodPacient`, `Nume`, `Specie`, `Rasa`, `Sex`, `DataNasterii`, `Culoare`, `NumarMicrocip`, `DataImplantareMicrocip`, `LocalizareMicrocip`) VALUES
(1, 1, 23, 'Pufi', 'Pisica', 'Norvegiana', 'F', '2018-10-18', 'Maro cu negru', 2147483647, '2019-05-22', 'In spatele membrului drept anterior'),
(2, 3, 5, 'Pablo', 'Caine', 'Ogar', 'M', '2019-06-19', 'Maro', 1122334455, '2020-05-13', 'Pe partea exterioara a urechii drepte'),
(3, 4, 679, 'Tomtom', 'Pisica', 'Necunoscuta', 'M', '2019-09-01', 'Gri cu pete albe', 22113344, '2020-12-22', 'Membrul posterior stang in partea superioara'),
(4, 86, 62, 'Greg', 'Caine', 'Golden Retriever', 'M', '2020-07-13', 'Auriu', 2155, '2021-01-02', 'Pe partea dorsala a mebrului posterior stang'),
(5, 86, 63, 'Fidell', 'Caine', 'Golden Retriever', 'M', '2020-11-09', 'Auriu', 22162, '2021-01-02', 'Partea superioara a membrului anterior drept'),
(104, 84, 860238, 'Papi', 'Caine', 'Bichon', 'M', '2020-10-02', 'Alb', 13245845, '2020-11-05', 'Urechea dreapta'),
(107, 87, 949279, 'Ralph', 'Caine', 'Husky', 'M', '2020-09-08', 'Negru cu alb', 55443323, '2021-01-22', 'In spatele labutei stangi');

-- --------------------------------------------------------

--
-- Table structure for table `pacientiinterventii`
--

CREATE TABLE `pacientiinterventii` (
  `PacientID` int(11) NOT NULL,
  `InterventieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacientiinterventii`
--

INSERT INTO `pacientiinterventii` (`PacientID`, `InterventieID`) VALUES
(1, 1),
(1, 2),
(2, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pacientitratamente`
--

CREATE TABLE `pacientitratamente` (
  `PacientID` int(11) NOT NULL,
  `TratamentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacientitratamente`
--

INSERT INTO `pacientitratamente` (`PacientID`, `TratamentID`) VALUES
(1, 3),
(3, 2),
(4, 1),
(4, 4),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `proprietari`
--

CREATE TABLE `proprietari` (
  `ProprietarID` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `Strada` varchar(50) NOT NULL,
  `Oras / Sector` varchar(50) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `NumarTelefon` char(10) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proprietari`
--

INSERT INTO `proprietari` (`ProprietarID`, `Nume`, `Prenume`, `CNP`, `Strada`, `Oras / Sector`, `Judet`, `NumarTelefon`, `Email`) VALUES
(1, 'Palaghiu', 'Amalia', '2990218125892', 'Negru Voda', 'Cluj-Napoca', 'Cluj', '0753654123', 'proprietar.amalia@yahoo.com'),
(3, 'Ionescu', 'Andrei', '1990210386041', 'Rapsodiei', 'Ramnicu Valcea', 'Valcea', '0353564897', 'propietar.andrei@yahoo.com'),
(4, 'Corneliu', 'Andreea', '2990210386041', 'Emil Racovita', 'Sector 3', 'Bucuresti', '0723999765', 'proprietar.andreea@yahoo.com'),
(84, 'Fodor', 'Bianca', '2980610356057', 'Grigore Alexandrescu', 'Pitesti', 'Arges', '0757969769', 'proprietar.bianca@yahoo.com'),
(86, 'Tudor', 'Ionel', '1990212399754', 'Valea Lunga', 'Braila', 'Braila', '0723999345', 'proprietar.ionel@yahoo.com'),
(87, 'Ivanescu', 'Razvan', '1990212399758', 'Racovita', 'Sector 3', 'Bucuresti', '0723999888', 'proprietar.razvan@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tratamente`
--

CREATE TABLE `tratamente` (
  `TratamentID` int(11) NOT NULL,
  `CodTratament` int(11) NOT NULL,
  `NumeTratament` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tratamente`
--

INSERT INTO `tratamente` (`TratamentID`, `CodTratament`, `NumeTratament`) VALUES
(1, 4, 'Cai Respiratorii'),
(2, 123, 'Parazitii Intestinali'),
(3, 45, 'Post Natal'),
(4, 68, 'Impotriva Puricilor'),
(5, 456, 'Imunizare Caini'),
(6, 41, 'Imunizare Pisici');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(9, 'Stefan-Radu', 'stefan_radu2012@yahoo.com', 'radu111', '$2y$10$uA44HM7CHPRMqf7x3eELPOWIDAKkr4dGQQVSnZ8q3tuICvC.N5w2m'),
(10, 'radu', 'radu@gmail.com', 'radu', '$2y$10$Y5b6dxrWRTCOqblMr.40d.iuqdA.tVFxlmWYx1M5AJorEjVSBhXle'),
(11, 'andrei', 'qwqwfqwa@yahoo.com', 'andrei1', '$2y$10$qxHwRYSR8xE8I/zCRMp2ce8WgB2JV467elwcK3RwbZmh.LfAxUkFC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`AngajatID`),
  ADD UNIQUE KEY `CodAngajat_Unic` (`CodAngajat`),
  ADD UNIQUE KEY `CNP_unic` (`CNP`);

--
-- Indexes for table `angajatipacienti`
--
ALTER TABLE `angajatipacienti`
  ADD PRIMARY KEY (`PacientID`,`AngajatID`),
  ADD KEY `AngajatID` (`AngajatID`);

--
-- Indexes for table `interventii`
--
ALTER TABLE `interventii`
  ADD PRIMARY KEY (`InterventieID`);

--
-- Indexes for table `pacienti`
--
ALTER TABLE `pacienti`
  ADD PRIMARY KEY (`PacientID`),
  ADD UNIQUE KEY `CodPacient_Unic` (`CodPacient`),
  ADD UNIQUE KEY `NumarMicrocip_Unic` (`NumarMicrocip`),
  ADD KEY `ProprietarID` (`ProprietarID`);

--
-- Indexes for table `pacientiinterventii`
--
ALTER TABLE `pacientiinterventii`
  ADD PRIMARY KEY (`PacientID`,`InterventieID`),
  ADD KEY `InterventieID` (`InterventieID`);

--
-- Indexes for table `pacientitratamente`
--
ALTER TABLE `pacientitratamente`
  ADD PRIMARY KEY (`PacientID`,`TratamentID`),
  ADD KEY `TratamentID` (`TratamentID`);

--
-- Indexes for table `proprietari`
--
ALTER TABLE `proprietari`
  ADD PRIMARY KEY (`ProprietarID`),
  ADD UNIQUE KEY `CNP_unic` (`CNP`);

--
-- Indexes for table `tratamente`
--
ALTER TABLE `tratamente`
  ADD PRIMARY KEY (`TratamentID`),
  ADD UNIQUE KEY `CodTratament_Unic` (`CodTratament`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angajati`
--
ALTER TABLE `angajati`
  MODIFY `AngajatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interventii`
--
ALTER TABLE `interventii`
  MODIFY `InterventieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pacienti`
--
ALTER TABLE `pacienti`
  MODIFY `PacientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `proprietari`
--
ALTER TABLE `proprietari`
  MODIFY `ProprietarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tratamente`
--
ALTER TABLE `tratamente`
  MODIFY `TratamentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angajatipacienti`
--
ALTER TABLE `angajatipacienti`
  ADD CONSTRAINT `angajatipacienti_ibfk_1` FOREIGN KEY (`AngajatID`) REFERENCES `angajati` (`AngajatID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `angajatipacienti_ibfk_2` FOREIGN KEY (`PacientID`) REFERENCES `pacienti` (`PacientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pacienti`
--
ALTER TABLE `pacienti`
  ADD CONSTRAINT `pacienti_ibfk_1` FOREIGN KEY (`ProprietarID`) REFERENCES `proprietari` (`ProprietarID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pacientiinterventii`
--
ALTER TABLE `pacientiinterventii`
  ADD CONSTRAINT `pacientiinterventii_ibfk_1` FOREIGN KEY (`InterventieID`) REFERENCES `interventii` (`InterventieID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pacientiinterventii_ibfk_2` FOREIGN KEY (`PacientID`) REFERENCES `pacienti` (`PacientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pacientitratamente`
--
ALTER TABLE `pacientitratamente`
  ADD CONSTRAINT `pacientitratamente_ibfk_1` FOREIGN KEY (`PacientID`) REFERENCES `pacienti` (`PacientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pacientitratamente_ibfk_2` FOREIGN KEY (`TratamentID`) REFERENCES `tratamente` (`TratamentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
