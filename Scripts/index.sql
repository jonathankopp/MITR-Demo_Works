SET NAMES 'utf8';


/*==============================================================*/
/* Table: Jobs                                                  */
/*==============================================================*/
DROP TABLE IF EXISTS jobs;
CREATE TABLE jobs (
  `FirstName`       VARCHAR(40)     NOT NULL,
  `LastName`   varchar(30)     NOT NULL,
  `Address`       varchar(60)     NOT NULL,
  `City`         varchar(15)     NOT NULL,
  `PostalCode`    int(10)         NOT NULL,
  `PGL Insurance WC/Liab/Dis Ins` boolean NOT NUll,
  `Rodent Control Letter` boolean NOT NUll,
  `Gas Cut Off boolean` boolean NOT NUll,
  `Water/Sewer Cut Off` boolean NOT NUll,
  `SRO Intake Form` boolean NOT NUll,
  `10 Day Notice Letter` boolean NOT NUll,
  `Community Board Notice` boolean NOT NUll,
  `Asbestos Report ACP5/AP21` boolean NOT NUll,
  `Photographs` boolean NOT NUll,
  `Landmark Letter` boolean NOT NUll,
  `PW-1 Application` boolean NOT NUll,
  `PW-2 App. Demo/Fence` boolean NOT NUll,
  `Blank Check DOB Filing/Perimit` boolean NOT NUll,
  `TR1/DS1 from Engineer` boolean NOT NUll,
  `Tax Map` boolean NOT NUll,
  `Fence Filing` boolean NOT NUll,
  `CustomerID`    INT(5)   NOT NULL
  );


/*==============================================================*/
/* Table: Customers                                             */
/*==============================================================*/
DROP TABLE IF EXISTS customers;
CREATE TABLE customers (
  `CustomerID`    INT(5)          unsigned NOT NULL AUTO_INCREMENT,
  `FirstName`   varchar(40)     NOT NULL,
  `LastName`   varchar(30)     NOT NULL,
  `ContactTitle`  varchar(30)     ,
  `Address`       varchar(60)     NOT NULL,
  `City`         varchar(15)     NOT NULL,
  `PostalCode`    int(5)         NOT NULL,
  `Phone`         int(11)     NOT NULL,
  PRIMARY KEY (`CustomerID`),
);
