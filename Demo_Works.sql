CREATE TABLE `customers` (
  `CustomerID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `ContactTitle` varchar(30) DEFAULT NULL,
  `Address` varchar(60) NOT NULL,
  `City` varchar(15) NOT NULL,
  `PostalCode` int(5) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Notes` varchar(180) DEFAULT NULL,
  PRIMARY KEY(`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `ContactTitle`, `Address`, `City`, `PostalCode`, `Phone`,`Email`) VALUES
(1, 'Joey', 'PEPE', NULL, '29 Cedar St', 'Syosset', 11791, 222222222,'joey.j@gmail.com');


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
  `D_Req` varchar(60) NULL DEFAULT '0',
  `D_Rec` varchar(60) NULL DEFAULT '0',
  `Price` int(10) NULL DEFAULT '0'
);

INSERT INTO `jobs` (`FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `PGL Insurance WC/Liab/Dis Ins`, `Rodent Control Letter`, `Gas Cut Off boolean`, `Water/Sewer Cut Off`, `SRO Intake Form`, `10 Day Notice Letter`, `Community Board Notice`, `Asbestos Report ACP5/AP21`, `Photographs`, `Landmark Letter`, `PW-1 Application`, `PW-2 App. Demo/Fence`, `Blank Check DOB Filing/Perimit`, `TR1/DS1 from Engineer`, `Tax Map`, `Fence Filing`, `CustomerID`) VALUES
('Joey', 'PEPE', '29 Cedar St', 'Syosset', 11791, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

