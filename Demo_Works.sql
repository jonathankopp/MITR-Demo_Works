CREATE TABLE `customers` (
  `CustomerID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `ContactTitle` varchar(30) DEFAULT NULL,
  `Address` varchar(60) NOT NULL,
  `City` varchar(15) NOT NULL,
  `PostalCode` int(5) NOT NULL,
  `Phone` int(60) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Notes` varchar(100) DEFAULT '',
  PRIMARY KEY(`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customers` (`FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `Phone`,`Email`) VALUES
('Joey', 'PEPE', '29 Cedar St', 'Syosset', 11791, 5164575670,'joey.j@gmail.com');

INSERT INTO `customers` (`FirstName`, `LastName`, `ContactTitle`,`Address`, `City`, `PostalCode`, `Phone`,`Email`) VALUES
('Brian', 'Connolly','Get Rekt Inc' ,'28 Coolmans Street', 'Syosset', 11791, 5164575670,'brianiscool@gmail.com');

INSERT INTO `customers` (`FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `Phone`,`Email`) VALUES
('Reilin', 'Jin', '206 Polytech', 'Troy', 12180, 5182581554,'arandomemail@gmail.com');

INSERT INTO `customers` (`FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `Phone`,`Email`) VALUES
('Grace', 'Conway', '1501 Sage Ave', 'Troy', 12180, 5164575670,'acoolemail@gmail.com');

INSERT INTO `customers` (`FirstName`, `LastName`,`ContactTitle`, `Address`, `City`, `PostalCode`, `Phone`,`Email`) VALUES
('John', 'Gay','Genius Coders Company','26 Cool Guy Street', 'Troy', 12180, 5168883456,'heyhoware@gmail.com');



INSERT INTO `customers` (`FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `Phone`,`Email`) VALUES
('Teddy', 'Holden', '1501 Sage Ave', 'Troy', 12180, 5164575670,'tholden@gmail.com');

INSERT INTO `customers` (`FirstName`, `LastName`,`ContactTitle`, `Address`, `City`, `PostalCode`, `Phone`,`Email`) VALUES
('Smitty', 'Werbenjagermanjensen','He Was Number One Inc','26 Krabby Patty Dr', 'Bikini Bottom', 12180, 5168883456,'Heare@gmail.com');




CREATE TABLE `jobs` (
  `jID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CustomerID` int(5) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `City` varchar(60) NOT NULL,
  `Block Lot` varchar(15) NOT NULL,
  `Community Board` varchar(60) NOT NULL,
  `PostalCode` int(10) NOT NULL,
  PRIMARY KEY(`jID`)
);


CREATE TABLE `Check_Off` (
  `ID` int(5) NOT NULL,
  `FormType` varchar(60) NOT NULL,
  `D_Req` varchar(60) NULL DEFAULT 'N/A',
  `D_Rec` varchar(60) NULL DEFAULT 'N/A',
  `Price` float(10) NULL DEFAULT '0'
);

