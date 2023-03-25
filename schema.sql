CREATE TABLE PATIENT (
  id INTEGER(5) PRIMARY KEY,
  NOM VARCHAR(10),
  PRENOM VARCHAR(10),
  GENRE VARCHAR(10),
  DATE_NAISSANCE DATE
);

CREATE TABLE CONSULTATIONS (
  id INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  DATE_CONSULT DATE,
  TAILLE INTEGER(3),
  POIDS INTEGER(3)
);

CREATE TABLE MEDICAMENT (
  id INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  NOM VARCHAR(15),
  PRESENTATION BOOLEAN,
);

CREATE TABLE ORDONNANCE (
  id INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  ID_MEDIC INTEGER,
  DATE_ORDONNANCE DATE,
  ID_CONSULT INT
);

CREATE TABLE CERTIFICAT_MEDICAL (
  id INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  NB_JRS_REPOS INT,
  DATE_REPOS DATE,
  ID_CONSULT INT
);

CREATE TABLE RENDEZ_VOUS (
  ID INTEGER(5) AUTO INCREMENT PRIMARY KEY,
  DATE_RDV DATE,
  HEURE_RDV INT,
  ID_CONSULT INT
);

CREATE TABLE FACTURE (
  ID INT PRIMARY KEY,
  PRIX DOUBLE,
  ID_CONSULT INT
);

Create table service (
  id int primary key,
  NOM_SERVICE varchar,
  PRIX double
);


php artisan make:model Patient -mcr
php artisan make:model Consultation -mcr
php artisan make:model Medicament -mcr
php artisan make:model Ordonnance -mcr
php artisan make:model CertificatMedical -mcr
php artisan make:model RendezVous -mcr
php artisan make:model Facture -mcr
php artisan make:model Service -mcr
php artisan make:model Admin -mcr

php artisan make:factory Patient --model=Patient 
php artisan make:factory Medicament --model=Medicament
php artisan make:factory Consultation  --model=Consultation
php artisan make:factory Ordonnance --model=Ordonnance
php artisan make:factory CertificatMedical --model=CertificatMedical
php artisan make:factory RendezVous --model=RendezVous
php artisan make:factory Facture --model=Facture
php artisan make:factory Service --model=Service
php artisan make:factory Admin --model=Admin