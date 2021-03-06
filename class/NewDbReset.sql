drop table if exists `Autori`;
drop table if exists `ProdottiSelezionati`;
drop table if exists `BandoVQR`;
drop table if exists `Messaggio`;
drop table if exists `Notifica`;
drop table if exists `UtenteTipo`;
drop table if exists `TipologiaUtente`;
drop table if exists `Prodotto`;
drop table if exists `TipologiaProdotto`;
drop table if exists `Utente`;
drop table if exists `Dipartimento`;
drop table if exists `AreaScientifica`;

create table `AreaScientifica` (
`IDAreaScientifica` int(11) primary key auto_increment,
`NomeAreaScientifica` varchar(30) not null unique
);

create table `Dipartimento` (
`IDDipartimento` int(11) primary key auto_increment,
`Nome` varchar(30) not null unique,
`AreaScientifica` int(11),
FOREIGN KEY (`AreaScientifica`) references `AreaScientifica`(`IDAreaScientifica`)
);


create table `Utente` (
`IDUtente` int(11) primary key auto_increment,
`Nome` varchar(30) not null,
`Cognome` varchar(30) not null,
`NomeUtente` varchar(30) not null unique,
`Password` char(32) not null,
`DataNascita` date not null,
`ComuneNascita` varchar(30) not null,
`ProvinciaNascita` varchar(30) not null,
`ComuneResidenza` varchar(30) not null,
`ProvinciaResidenza` varchar(30) not null,
`Email` varchar(30) not null,
`Dipartimento` int(11),
FOREIGN KEY (`Dipartimento`) references `Dipartimento`(`IDDipartimento`)
);


create table `TipologiaProdotto` (
`Nome` varchar(30) primary key
);


create table `Prodotto` (
`IDProdotto` int(11) primary key auto_increment,
`Titolo` varchar(150) not null unique,
`CodiceDOI` varchar(30),
`AnnoPubblicazione` year,
`Stato` varchar(30) not null,
`NomeTipologia` varchar(30),
`Proprietario` int(11),
`Link` varchar(150),
`NomeRivista` varchar(30),
`PaginaIniziale` int(11),
`PaginaFinale` int(11),
`Abstract` text,
FOREIGN KEY (`NomeTipologia`) references `TipologiaProdotto`(`Nome`),
FOREIGN KEY (`Proprietario`) references `Utente`(`IDUtente`)
);

create table `CampiTipologiaProdotto` (
`IDCampo` int(11) primary key auto_increment,
`TipologiaProdotto` varchar(30) not null
`NomeCampo` varchar(30) not null,
FOREIGN KEY (`TipologiaProdotto`) references `TipologiaProdotto`(`Nome`);
);

create table `ValoreCampiTipologiaProdotto` (
`IDValoreCampi` int(11) primary key auto_increment,
`IDCampo` int(11) not null,
`Valore` varchar(30) not null,
FOREIGN KEY (`IDCampo`) references `CampiTipologiaProdotto`(`IDCampo`);
);


create table `TipologiaUtente` (
`Nome` varchar(30) primary key
);




create table `UtenteTipo` (
`NomeTipologia` varchar(30),
`IDUtente` int(11),
PRIMARY KEY(`NomeTipologia`,`IDUtente`),
FOREIGN KEY (`NomeTipologia`)  references `TipologiaUtente`(`Nome`),
FOREIGN KEY (`IDUtente`) references `Utente`(`IDUtente`)
);


create table `Notifica` (
`IDNotifica` int(11) primary key auto_increment,
`Mittente` int(11),
`Destinatario` int (11),
`Testo` text,
`Data` date not null,
`Link` text,
FOREIGN KEY (`Mittente`) references `Utente`(`IDUtente`),
FOREIGN KEY (`Destinatario`) references `Utente`(`IDUtente`)
);


create table `Messaggio` (
`IDMessaggio` int(11) primary key auto_increment,
`Mittente` int(11),
`Destinatario` int (11),
`Testo` text,
`Data` date not null,
`Oggetto` varchar(30) not null,
FOREIGN KEY (`Mittente`) references `Utente`(`IDUtente`),
FOREIGN KEY (`Destinatario`) references `Utente`(`IDUtente`)
);


create table `BandoVQR` (
`IDBando` int(11) primary key auto_increment,
`Nome` varchar(30) not null unique,
`DataApertura` date not null,
`DataChiusura` date not null,
`NumeroProdottiConsigliati` int(11) not null
);


create table `ProdottiSelezionati` (
`IDProdotto` int(11),
`IDBando` int(11),
`NumeroPreferiti` int(11) not null,
PRIMARY KEY(`IDProdotto`,`IDBando`),
FOREIGN KEY (`IDBando`) references `BandoVQR`(`IDBando`),
FOREIGN KEY (`IDProdotto`) references `Prodotto`(`IDProdotto`)
);


create table `Autori` (
`IDUtente` int(11),
`IDProdotto` int(11),
PRIMARY KEY (`IDUtente`,`IDProdotto`),
FOREIGN KEY (`IDUtente`) references `Utente`(`IDUtente`),
FOREIGN KEY (`IDProdotto`) references `Prodotto`(`IDProdotto`)
);
