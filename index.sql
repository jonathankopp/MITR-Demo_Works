SET NAMES 'utf8';


/*==============================================================*/
/* Table: Jobs                                                  */
/*==============================================================*/
DROP TABLE IF EXISTS jobs;
CREATE TABLE jobs (
  JobName       VARCHAR(40)     NOT NULL,
  DateReq       INT(5)          DEFAULT NULL,
  DateRec       INT(5)          DEFAULT NULL,
  PRIMARY KEY (JobName)
);


/*==============================================================*/
/* Table: Customers                                             */
/*==============================================================*/
DROP TABLE IF EXISTS customers;
CREATE TABLE customers (
  CustomerID    INT(5)          NOT NULL,
  CompanyName   varchar(40)     NOT NULL,
  ContactName   varchar(30)     DEFAULT NULL,
  ContactTitle  varchar(30)     DEFAULT NULL,
  Address       varchar(60)     DEFAULT NULL,
  City          varchar(15)     DEFAULT NULL,
  Region        varchar(15)     DEFAULT NULL,
  PostalCode    varchar(10)     DEFAULT NULL,
  Country       varchar(15)     DEFAULT NULL,
  Phone         varchar(24)     DEFAULT NULL,
  Fax           varchar(24)     DEFAULT NULL,
  PRIMARY KEY (CustomerID),
  KEY City (City),
  KEY CompanyName (CompanyName),
  KEY PostalCode (PostalCode),
  KEY Region (Region)
);


INSERT INTO jobs (JobName)
VALUES('PGL Insurance WC/Liab/Dis Ins'),
('Rodent Control Letter'),
('Gas Cut Off'),
('Water/Sewer Cut Off'),
('SRO Intake Form'),
('10 Day Notice Letter'),
('Community Board Notice'),
('Asbestos Report ACP5/AP21'),
('Photographs'),
('Landmark Letter'),
('PW-1 Application'),
('PW-2 App. Demo/Fence'),
('Blank Check DOB Filing/Perimit'),
('TR1/DS1 from Engineer'),
('Tax Map'),
('Fence Filing');
