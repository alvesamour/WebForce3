-- Connection client :
mysql - u root;

-- Voir toutes les BDD :
SHOW DATABASES;

-- Supprimer une BDD :
DROP DATABASE nom_de_la_bdd;

-- Se connecter à une BDD :
USE jeudi;

-- Voir les tables de la bdd :
SHOW TABLES;

-- Créer une nouvelle bdd :
CREATE DATABASE nom_de_la_bdd;

-- Afficher toutes les infos de tous les employés :
SELECT * FROM employes;

-- Afficher les employés + salaires:
SELECT prenom, nom, salaire FROM employes;

-- Afficher tous les services de mon entreprise  :
SELECT DISTINCT service FROM employes;
-- DISTINCT permet d'éviter les doublons.

-- Afficher tous les employés du service informatique :
SELECT prenom, nom, service FROM employes WHERE service = 'informatique';

-- Afficher les employes qui ne sont pas du service informatique :
SELECT prenom, nom, service FROM employes WHERE  service != 'informatique';

-- Afficher les employés qui gagnent un salaire supérieur à 2000€ :
SELECT prenom, nom, salaire FROM employes WHERE salaire > 2000;

-- Combien de personnes gagnent moins de 2000€ :
SELECT COUNT(*) FROM employes WHERE salaire <= 2000;

-- AS permet de créer un alias :
SELECT COUNT(*) AS somme FROM employes WHERE salaire <= 2000;

-- Afficher la masse salariale annuelle de mon entreprise :
SELECT SUM(salaire * 12) AS masse_salariale FROM employes;

-- LIKE :
SELECT prenom FROM employes WHERE prenom LIKE 'a%';

SELECT prenom FROM employes WHERE prenom LIKE '%a%';
-- Avec LIKE, le % signifie peu importe ce qui suit ou peu importe ce qui le précède.

-- Afficher tous les employés dans l'ordre de celui qui gagne le plus à celui qui gagne le moins :
SELECT prenom, nom, salaire FROM employes ORDER BY salaire DESC;

-- Afficher les 3 employés qui gagnent le plus :
SELECT prenom, nom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,3;

-- Afficher la personne qui gagne le plus petit salaire :
SELECT prenom, nom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

-- Afficher le plus petit salaire :
SELECT salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

SELECT MIN(salaire) FROM employes;

-- Afficher le prenom de la personne qui gagne le plus petit salaire en utilisant MIN() :
SELECT prenom, salaire FROM employes WHERE salaire = (SELECT MIN(salaire) FROM employes);

-- Afficher tous les employes des sercice informatique et commercial :
SELECT prenom, nom, service FROM employes WHERE service = 'informatique' OR service = 'commercial';

SELECT prenom, nom, service FROM employes WHERE service IN ('informatique', 'commercial');

-- Afficher tous les employes hors des services informatique et commercial :
SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; AND service != 'commercial';

SELECT prenom, nom, service FROM employes WHERE service NOT IN ('informatique', 'commercial');

-- Afficher le nombre de femmes dans l'entreprise :
SELECT count(*) FROM employes WHERE sexe = 'f';

-- Afficher le nombre d'employes par sexe :
SELECT sexe, COUNT(*) FROM employes GROUP BY sexe;

SELECT prenom, sexe FROM  employes ORDER BY sexe DESC;

-- Le nombre de salarié du service informatique ou commercial :
SELECT COUNT(*) FROM employes WHERE service IN ('commercial', 'informatique') GROUP BY service;

SELECT count(*) FROM employes GROUP BY service HAVING service IN ('informatique', 'commercial');

----------------------
-- INSERTION EN BDD --
----------------------

INSERT INTO employes (prenom, nom, service, sexe, salaire, date_embauche) VALUES ('Sara', 'Fkaier', 'informatique', 'f', 5001, CURDATE());

----------------------
---- MODIFICATION ----
----------------------

-- On modifie tous les salaires de tous les employes :
UPDATE employes set salaire = 3000;

-- On modifie le salaire 'Julien' :
UPDATE employes set salaire = 3500 WHERE  prenom = 'julien';

UPDATE employes set salaire = 5000 WHERE id_employes = 991;

REPLACE INTO employes (id_employes, prenom, nom, service, salaire, date_embauche, sexe) values (991, 'Sara', 'FKAIER', 'direction', 6000, CURDATE(), 'f');

UPDATE employes set service = 'marketing', salaire = 3200 WHERE id_employes = 547;

UPDATE employes set salaire = salaire + 100;

-----------------------
----- SUPPRESSION -----
-----------------------

-- On supprime l'employes 991 :
DELETE FROM employes WHERE id_employes = 991;
