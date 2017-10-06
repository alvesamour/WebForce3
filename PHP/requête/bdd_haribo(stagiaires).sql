/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  mila
 * Created: 5 sept. 2017
 */
/**
* Objectif : Créer dans PHPMyAdmin une base de données haribo dont la modélisation est ci-dessous, les étapes sont détaillées ensuite.
*/

/**
+---------------+----------------+------+------+---------+----------------+
| Field         | Type           | Null | Key  | Default | Extra          |
+---------------+----------------+------+------+---------+----------------+
| id_stagiaire  | int(11)        | NO   | PRI  | NULL    | auto_increment |
| prenom        | varchar(100)   | NO   |      | NULL    |                |
| yeux          | varchar(30)    | NO   |      | NULL    |                |
| genre         | enum('h','f')  | NO   |      | NULL    |                |
+---------------+----------------+------+------+---------+----------------+

+---------------+----------------+------+------+---------+----------------+
| Field         | Type           | Null | Key  | Default | Extra          |
+---------------+----------------+------+------+---------+----------------+
| id_bonbon     | int(11)        | NO   | PRI  | NULL    | auto_increment |
| nom           | varchar(100)   | NO   |      | NULL    |                |
| saveur        | varchar(100)   | NO   |      | NULL    |                |
+---------------+----------------+------+------+---------+----------------+

+---------------+----------------+------+------+---------+----------------+
| Field         | Type           | Null | Key  | Default | Extra          |
+---------------+----------------+------+------+---------+----------------+
| id_manger     | int(11)        | NO   | PRI  | NULL    | auto_increment |
| id_bonbon     | int(11)        | YES  |      | NULL    |                |
| id_stagiaire  | int(11)        | YES  |      | NULL    |                |
| date_manger   | date           | NO   |      | NULL    |                |
| quantite      | int(11)        | NO   |      | NULL    |                |
+---------------+----------------+------+------+---------+----------------+
*/

/**
* REQUETES A EFFECTUER dans PHPMyAdmin
*/

--1-- lister toutes les BDD de PHPMyAdmin

--2-- Créer une base de données SQL nommée HARIBO

--3--
/**
* créer une table stagiaire
* qui comporte 3 champs :
* - id_stagiaire => nombre qui s'auto-incrémente, requis et clé primaire
* - prenom => 100 caractères, requis
* - couleur des yeux => 30 caractères, requis
* - genre => homme ou femme, requis
*/

--4--
/**
* insérer dans cette table les informations de votre groupe (faites un copier-coller des lignes ci-dessous) :
*/
INSERT INTO stagiaire (id_stagiaire, prenom, yeux, genre) VALUES
(1, 'Barbara', 'bleu', 'f'),
(2, 'Sandra', 'marron', 'f'),
(3, 'Alpha', 'marron', 'h'),
(4, 'Sébastien', 'marron clair', 'h'),
(5, 'Sarah', 'marron clair', 'f'),
(6, 'Julien', 'marron', 'h'),
(7, 'Johan', 'bleu', 'h'),
(8, 'Yannick', 'marron', 'h'),
(9, 'Pascal', 'bleu', 'h'),
(10, 'Myriem', 'marron', 'f'),
(11, 'Hadi', 'marron', 'h'),
(12, 'Corinne', 'marron', 'f'),
(13, 'Alain', 'marron', 'h');

--5--
/**
* créer une table bonbon
* qui comporte 3 champs :
* - id_bonbon => nombre qui s'auto-incrémente, requis et clé primaire
* - nom => 100 caractères, requis
* - saveur => 100 caractères, requis
*/

--6--
/**
* insérer dans cette table des bonbons haribo (faites un copier-coller des lignes ci-dessous) :
*/
INSERT INTO bonbon (id_bonbon, nom, saveur) VALUES
(10, 'Chamallows', 'fraise'),
(11, 'Dragibus', 'orange'),
(12, 'Tagada', 'pik'),
(13, 'Tagada', 'original'),
(14, 'Tagada', 'purple'),
(15, 'Car en Sac', 'réglisse'),
(16, 'Dragibus', 'pik'),
(17, 'Dragibus', 'soft'),
(18, 'Croco', 'cola'),
(19, 'Croco', 'fraise'),
(20, 'Croco', 'citron');

--7--
/**
* créer une table manger
* qui comporte 5 champs :
* - id_manger => nombre qui s'auto-incrémente, requis et clé primaire
* - id_stagiaire => champs de la table stagiaire
* - id_bonbon => champs de la table bonbon
* - date_manger => type date, requis
* - quantite => nombre, requis
*/

--8--
/**
* insérer dans la table manger des informations sur qui a consommé quel bonbon, quand et dans quelles quantités (faites un copier-coller des lignes ci-dessous) :
*/
INSERT INTO manger (id_manger, id_bonbon, id_stagiaire, date_manger, quantite) VALUES
(1, 10, 1, '2017-01-19', 4),
(2, 11, 2, '2017-02-20', 1),
(3, 12, 3, '2017-01-29', 3),
(4, 13, 4, '2017-03-22', 9),
(5, 14, 5, '2017-02-19', 8),
(6, 15, 6, '2017-03-20', 11),
(7, 15, 7, '2017-06-13', 4),
(8, 20, 8, '2017-06-15', 1),
(9, 15, 9, '2017-04-17', 5),
(10, 17, 12, '2017-05-03', 7),
(11, 16, 12, '2017-01-31', 3),
(12, 18, 11, '2017-02-12', 6),
(13, 10, 5, '2017-03-20', 1),
(14, 19, 2, '2017-04-04', 2),
(15, 15, 5, '2017-05-19', 14);

--9-- Lister les tables de la BDD *haribo*
SHOW TABLES;

--10-- voir les paramètres de la table *bonbon*
DESC bonbon;

--11-- Sélectionner tous les champs de tous les enregistrements de la table *stagiaire*
SELECT * FROM stagiaire;

--12-- Rajouter un nouveau stagiaire *Patriiiick* en forçant la numérotation de l'id
INSERT INTO stagiaire (id_stagiaire, prenom, yeux, genre) VALUES (14, 'Patriiiick', 'marron', 'm');

--13-- Rajouter un nouveau stagiaire *Mila* SANS forcer la numérotation de l'id
INSERT INTO stagiaire (prenom, yeux, genre) VALUES ('Mila', 'marron', 'f');

--14-- Changer le prénom du stagiaire qui a l'id 100 de *Patriiiick* à *Patrick*
UPDATE stagiaire set prenom = 'Patrick' WHERE id_stagiaire = 14;

--15-- Rajouter dans la table manger que Patrick a mangé 5 Tagada purpule le 15 septembre
INSERT INTO manger (id_bonbon, id_stagiaire, date_manger, quantite) VALUES (14, 14, '2017-09-15', 5);

--16-- Sélectionner tous les noms des bonbons
SELECT nom FROM bonbon;

--17-- Sélectionner tous les noms des bonbons en enlevant les doublons
SELECT DISTINCT nom FROM bonbon;

--18-- Récupérer les couleurs des yeux des stagiaires (Sélectionner plusieurs champs dans une table)
SELECT yeux, genre FROM stagiaire;

--19-- Dédoublonner un résultat sur plusieurs champs
SELECT DISTINCT yeux, genre FROM stagiaire;

--20-- Sélectionner le stagiaire qui a l'id 5
SELECT id_stagiaire FROM stagiaire WHERE id_stagiaire = 5;

--21-- Sélectionner tous les stagiaires qui ont les yeux marrons
SELECT * FROM stagiaire WHERE yeux = 'marron';

--22-- Sélectionner tous les stagiaires dont l'id est plus grand que 9
SELECT * FROM stagiaire WHERE id_stagiaire > 9;

--23-- Sélectionner tous les stagiaires SAUF celui dont l'id est 13 (soyons supersticieux !) :!\ iil y a 2 façons de faire
SELECT * FROM stagiaire WHERE id_stagiaire != 13;
SELECT * FROM stagiaire WHERE id_stagiaire NOT IN (13);

--24-- Sélectionner tous les stagiaires qui ont un id inférieur ou égal à 10
SELECT * FROM stagiaire WHERE id_stagiaire <= 10;

--25-- Sélectionner tous les stagiaires dont l'id est compris entre 7 et 11
SELECT * FROM stagiaire WHERE id_stagiaire BETWEEN 7 AND 11;

--26-- Sélectionner les stagiaires dont le prénom commence par un *S*
SELECT * FROM stagiaire WHERE prenom LIKE 's%';

--27-- Trier les stagiaires femmes par id décroissant
SELECT * FROM stagiaire ORDER BY id_stagiaire DESC;

--28-- Trier les stagiaires hommes par prénom dans l'ordre alphabétique
SELECT * FROM stagiaire WHERE genre = '' ORDER BY prenom ASC;

--29-- Trier les stagiaires en affichant les femmes en premier et en classant les couleurs des yeux dans l'ordre alphabétique
SELECT * FROM stagiaire ORDER BY genre DESC, yeux;

--30-- Limiter l'affichage d'une requête de sélection de tous les stagiaires aux 3 premires résultats
SELECT * FROM stagiaire LIMIT 3 ;

--31-- Limiter l'affichage d'une requête de sélection de tous les stagiaires à partir du 3ème résultat et des 5 suivants
SELECT * FROM stagiaire LIMIT 3, 5 ;

--32-- Afficher les 4 premiers stagiaires qui ont les yeux marron
SELECT * FROM stagiaire WHERE yeux = 'marron' LIMIT 4;

--33-- Pareil mais en triant les prénoms dans l'ordre alphabétique
SELECT * FROM stagiaire WHERE yeux = 'marron' ORDER BY prenom LIMIT 4;

--34-- Compter le nombre de stagiaires
SELECT COUNT(*) FROM stagiaire;

--35-- Compter le nombre de stagiaires hommes mais en changeant le nom de la colonne de résultat par *nb_stagiaires_H*
SELECT COUNT(*) as nb_stagiaires_H FROM stagiaire WHERE genre = 'm' ;

--36-- Compter le nombre de couleurs d'yeux différentes
SELECT COUNT(DISTINCT yeux) FROM stagiaire;

--37-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus petit
SELECT prenom, yeux FROM stagiaire WHERE id_stagiaire = (SELECT min(id_stagiaire) FROM stagiaire);

--38-- Afficher le prénom et les yeux du stagiaire qui a l'id le plus grand /!\ c'est une requête imbriquée qu'il faut faire (requête sur le résultat d'une autre requête)
SELECT prenom, yeux FROM stagiaire WHERE id_stagiaire = (SELECT MAX(id_stagiaire) FROM stagiaire);

--39-- Afficher les stagiaires qui ont les yeux bleu et vert
SELECT * FROM stagiaire WHERE yeux='bleu' OR yeux='vert';

--40-- A l'inverse maintenant, afficher les stagiaires qui n'ont pas les yeux bleu ni vert
SELECT * FROM stagiaire WHERE yeux !='bleu' AND yeux !='vert';

--41-- récupérer tous les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations
SELECT m.*, s.*
FROM stagiaire s
LEFT JOIN manger m
ON s.id_stagiaire = m.id_stagiaire;

--42-- récupérer que les stagiaires qui ont mangé des bonbons, avec le détail de leurs consommations
SELECT m.*, s.*
FROM stagiaire s
INNER JOIN manger m
ON s.id_stagiaire = m.id_stagiaire;

--43-- prénom du stagiaire, le nom du bonbon, la date de consommation pour tous les stagiaires qui ont mangé au moins une fois
SELECT s.prenom, b.nom, m.date_manger FROM stagiaire s
INNER JOIN manger m ON s.id_stagiaire = m.id_stagiaire
LEFT JOIN bonbon b ON m.id_bonbon = b.id_bonbon;

--44-- Afficher les quantités consommées par les stagiaires (uniquement ceux qui ont mangé !)


--45-- Calculer combien de bonbons ont été mangés au total par chaque stagiaire et afficher le nombre de fois où ils ont mangé

--46-- Afficher combien de bonbons ont été consommés au total

--47-- Afficher le total de *Tagada* consommées

--48-- Afficher les prénoms des stagiaires qui n'ont rien mangé

--49-- Afficher les saveurs des bonbons (sans doublons)

--50-- Afficher le prénom du stagiaire qui a mangé le plus de bonbons
SELECT s.prenom FROM stagiaire s
LEFT JOIN manger m
ON s.id_stagiaire = m.id_stagiaire
WHERE m.quantite = (SELECT MAX(quantite) FROM manger);
