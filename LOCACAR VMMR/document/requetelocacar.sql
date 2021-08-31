--Si vous le jugez utile, vous pourrez créer des vues.
--Vous ferez en sorte que vos jeux d'essais permettent d'afficher des résultats pertinents.
--Vous ferez en sorte d'afficher les résultats de chaque requête triés dans un ordre pertinent pour l'utilisateur.
--Pour chacune des demandes suivantes, créez un une requête SQL.

--1	Liste des agences avec le nombre de véhicules présents.
select age_id,age_nom, count(voi_agence) as nbvoiture 
from agence, voiture 
where voi_agence=age_id
group by age_id;

--2.Liste des véhicules par agence.
select * 
from agence, voiture 
where age_id=voi_agence
order by age_id ; 

--3.Liste des locations par statut pour une agence donnée.
select loc_id,loc_statut, loc_agence_depart
from location
where loc_agence_depart=5
order by loc_statut,loc_agence_depart ;

--4.Liste des locations entre 2 dates données pour une agence donnée.
select loc_id, loc_debut, loc_fin
from location
where loc_agence_depart=2 and 
loc_fin>'2016-02-22' and loc_debut<'2016-06-12' 
order by loc_statut,loc_agence_depart ;

--5.Nombre de locations par agence et par statut.
select loc_agence_depart, loc_statut,count(loc_id) as nblocation
from location 
group by loc_agence_depart,loc_statut
order by loc_agence_depart,loc_statut ; 

--6.Liste des agences par département.
select * 
from departement, agence 
where age_departement=dep_id
order by dep_id 

--7.Chiffre d’affaire d’une agence donnée. 

-- création de vue pour faciliter les requetes 
create view affaire as 
select loc_id,loc_agence_depart,loc_agence_arrivee,loc_debut,loc_fin,loc_voiture,timestampdiff(hour,
loc_debut,loc_fin) as NBH ,timestampdiff(hour,
loc_debut,loc_fin)*all_prix as PrixTotalHeures ,sum(acc_prix) as PrixAccessoires,
((timestampdiff(hour,loc_debut,loc_fin)*all_prix) + sum(acc_prix)) as Total
from  allouer, accessoire, categorie, voiture, tranche, agence, location , contenir  
where cat_id=voi_categorie and cat_id=all_categorie and tra_id=all_tranche 
and acc_id=con_accessoire and loc_voiture=voi_id and con_location=loc_id and loc_agence_depart = age_id 
and timestampdiff(hour,loc_debut,loc_fin)>tra_min
and timestampdiff(hour,loc_debut,loc_fin)<=tra_max 
group by loc_id ;
-- pour une agence donnée 
select loc_agence_depart as Agence, sum(Total) 
from affaire
where loc_agence_depart=3 
group by loc_agence_depart ;   

--8.Requête donnant la durée (en nombre d’heures) d’une location.

select loc_id, NBH 
from affaire 
where loc_id = 5 ; 

--9.Liste les véhicules libres dans une agence donnée et entre deux dates données.
select voitur.* 
from voiture, location 
where voi_agence_depart=voi_id and 

--10.Requête donnant le prix d’une location (hors options sur le véhicule).
--11.Requête donnant le montant total des options attachées à chaque véhicule.

--Exportez un extrait du résultat de vos requêtes dans des tableaux qui devront apparaître dans votre rapport final.--
