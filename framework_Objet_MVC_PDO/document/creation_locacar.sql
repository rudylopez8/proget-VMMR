--
-- Base de données: 'locacar'
--
create database if not exists locacar default character set utf8 collate utf8_general_ci;
use locacar;
-- --------------------------------------------------------
-- Création des tables

set foreign_key_checks =0;

-- Table utilisateur
drop table if exists utilisateur;
create table utilisateur (
    uti_id int not null auto_increment primary key,
    uti_nom  varchar(100) not null,
    uti_prenom varchar(100) not null,
    uti_login varchar(100) not null unique,
    uti_mdp varchar(500) not null,
    uti_adresse varchar(100),
    uti_email varchar(100),
    uti_telephone varchar(100),
    uti_profil varchar(100) not null,
    uti_agence int

)engine=innodb;

-- Table département 
drop table if exists departement;
create table departement (
    dep_id int not null auto_increment primary key ,
    dep_label varchar(100) not null
    
)engine=innodb; 

-- Table categorie
drop table if exists categorie;
create table categorie (
	cat_id int not null auto_increment primary key,
	cat_label varchar(100) not null

)engine=innodb;

-- Table voiture : 
drop table if exists voiture;
create table voiture (
    voi_id int not null auto_increment primary key ,
    voi_marque varchar(100) not null,
    voi_plaque varchar(100) not null,
    voi_color varchar(100) not null, 
    voi_agence int,
    voi_categorie int not null
)engine=innodb;

-- Table tranche : 
drop table if exists tranche;
create table tranche (
    tra_id int not null auto_increment primary key,
    tra_min int not null,
    tra_max int not null 
)engine=innodb; 

-- Table accessoire : 
drop table if exists accessoire;
create table accessoire (
    acc_id int not null auto_increment primary key,
    acc_label varchar(100) not null,
    acc_prix float  
)engine=innodb; 

-- Table agence : 
drop table if exists agence;
create table agence (
    age_id int not null auto_increment primary key,
    age_nom  varchar(200) not null,
    age_departement int not null   
)engine=innodb; 

-- Table location : 
drop table if exists location ;
create table location (
    loc_id int not null auto_increment primary key,
    loc_utilisateur int not null,
    loc_voiture int,
    loc_date_demande date not null,     
    loc_debut datetime not null,
    loc_fin datetime not null,
    loc_type varchar(100) not null,  
    loc_statut varchar(100) not null, 
    loc_agence_depart int not null,
    loc_agence_arrivee int not null   
)engine=innodb; 

-- Table contenir : 
drop table if exists contenir;
create table contenir (
    con_id int not null auto_increment primary key,
    con_location int not null,
    con_accessoire int not null   
)engine=innodb; 

-- Table allouer : 
drop table if exists allouer;
create table allouer (
    all_id int not null auto_increment primary key,
    all_categorie int not null,
    all_tranche int not null, 
    all_prix float not null  
)engine=innodb; 

set foreign_key_checks =1;

-- contraintes
alter table agence add constraint cs1 foreign key (age_departement) references departement(dep_id);
alter table voiture add constraint cs2 foreign key (voi_agence) references agence(age_id);
alter table utilisateur add constraint cs3 foreign key (uti_agence) references agence(age_id);
alter table voiture add constraint cs4 foreign key (voi_categorie) references categorie(cat_id);
alter table location add constraint cs5 foreign key (loc_utilisateur) references utilisateur(uti_id);
alter table location add constraint cs6 foreign key (loc_voiture) references voiture(voi_id);
alter table location add constraint cs7 foreign key (loc_agence_depart) references agence(age_id);
alter table location add constraint cs8 foreign key (loc_agence_arrivee) references agence(age_id);
alter table contenir add constraint cs9 foreign key (con_location) references location(loc_id);
alter table contenir add constraint cs10 foreign key (con_accessoire) references accessoire(acc_id);
alter table allouer add constraint cs11 foreign key (all_categorie) references categorie(cat_id);
alter table allouer add constraint cs12 foreign key (all_tranche) references tranche(tra_id);
