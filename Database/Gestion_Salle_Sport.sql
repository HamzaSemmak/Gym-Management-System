/*
	Gestion_Salle_Sport :
    Creation Base de données :
*/
Create database Gestion_Salle_Sport default char set utf8 collate utf8_general_ci;

Use Gestion_Salle_Sport;

/* Table Utilisateur: */
Create table if not exists Utulisateur (
	ID int unique auto_increment,
	Nom varchar(50),
    Prenom varchar(50),
    DateNaissance Date,
    Telephone int,
    Adresse varchar(255) unique,
    Email varchar(255),
    MotDePasse varchar(20)
);
Select * from Utulisateur;

/* Table Menber: */
Create table if not exists Membre(
	Num_Membre int primary key auto_increment,
    FullName varchar(255),
    Date_Naissance date,
    Adresse_Membre varchar(255),
    Genre varchar(20),
    Cin_Membre varchar(20) unique,
    Telephone int,
    Ville_Membre varchar(100),
    Date_Join datetime
);
Alter table Membre 
Add constraint Ck_Gender check (Genre in('Male','Female'));
Select * from Membre;

/* Table Menber: */
Create table if not exists Trainers(
	Num_Trainer int primary key auto_increment,
    Fullname varchar(255),
    Date_Naissance date,
    Adresse varchar(255),
    Email varchar(255), -- 4
    Telephone int,
    Genre varchar(20),
    Cin_Trainers varchar(20) unique,
    Ville_Trainers varchar(100),
    Date_Join datetime
);
Alter table Trainers 
Add constraint Ck_Gender1 check (Genre in('Male','Female'));
Select * from Trainers;

/* Table Package : Package of Programme given from Trainers to Memberss ( Terainers Receive Mony)   */
Create table Package (
	Num_Package int primary key auto_increment,
	Num_Trainer int, foreign key (Num_Trainer) references Trainers(Num_Trainer),
    Image varchar(255),
    Title varchar(255),
    Description varchar(255),
    Traif float,
    Durée_Trainaing int
);
Select * from Package;
