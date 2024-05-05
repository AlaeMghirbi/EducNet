-- Supprimer la base de données si elle existe
DROP DATABASE IF EXISTS educnet;
-- Créer une nouvelle base de données
CREATE DATABASE educnet CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Utiliser la base de données nouvellement créée
USE educnet;

-- Créer la table des utilisateurs
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE teacher (
    cin INT PRIMARY KEY NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    sexe CHAR(1) CHECK (sexe IN ('H', 'F'))

) ENGINE=InnoDB;
-- Créer la table des projet fin d'etude
CREATE TABLE projet (
    idprojet INT PRIMARY KEY AUTO_INCREMENT,
    codeprojet VARCHAR(10) UNIQUE NOT NULL,
    libprojet VARCHAR(255) NOT NULL,
    discription VARCHAR(500) NOT NULL,
    teacher_id INT,
    FOREIGN KEY (teacher_id) REFERENCES teacher(cin)
) ENGINE=InnoDB;
-- Créer la table des étudiants
CREATE TABLE student (
    numcin INT UNSIGNED ZEROFILL PRIMARY KEY NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    sexe CHAR(1) CHECK (sexe IN ('H', 'F')),
    projet INT,
    FOREIGN KEY (projet) REFERENCES projet(idprojet)
) ENGINE=InnoDB;


-- Insérer des données dans les tables
INSERT INTO users VALUES (null,'Mghirbi','Alae','alae',md5('alae'));
INSERT INTO users VALUES (null,'Ben Jemaa','Yassmine','yasmine',md5('yasmine'));
INSERT INTO users VALUES (null,'Elloumi','Yesmina','yesmina',md5('yesmina'));
INSERT INTO users VALUES (null,'Hajjem','Malek','malek',md5('malek'));

INSERT INTO teacher (cin, nom, prenom, email, sexe) VALUES (12345678, 'Dupont', 'Jean', 'jean.dupont@example.com', 'H');
INSERT INTO teacher (cin, nom, prenom, email, sexe) VALUES (23456789, 'Durand', 'Marie', 'marie.durand@example.com', 'F');
INSERT INTO teacher (cin, nom, prenom, email, sexe) VALUES (34567890, 'Martin', 'Pierre', 'pierre.martin@example.com', 'H');
INSERT INTO teacher (cin, nom, prenom, email, sexe) VALUES (45678901, 'Garcia', 'Sophie', 'sophie.garcia@example.com', 'F');
INSERT INTO teacher (cin, nom, prenom, email, sexe) VALUES (56789012, 'Lefebvre', 'Thomas', 'thomas.lefebvre@example.com', 'H');

INSERT INTO projet VALUES (null,'GestionRH','Système de gestion des ressources humaines', 'Développement dun système de gestion des ressources humaines pour une entreprise',12345678);
INSERT INTO projet VALUES (null,'MarketingDigital', 'Stratégies de marketing digital', 'Conception et mise en place de stratégies de marketing digital pour promouvoir des produits ou services en ligne',12345678);
INSERT INTO projet VALUES (null,'GestionStock', 'Optimisation de la gestion des stocks', 'Élaboration d’un système informatisé pour optimiser la gestion des stocks et des approvisionnements dans une entreprise',34567890);
INSERT INTO projet VALUES (null,'AnalyseDonnees', 'Analyse de données', 'Utilisation d’outils statistiques avancés pour analyser des données et en tirer des insights pertinents pour une organisation',56789012);
INSERT INTO projet VALUES (null,'DeveloppementApp', 'Développement d’applications mobiles', 'Création d’applications mobiles innovantes répondant aux besoins spécifiques des utilisateurs dans différents domaines',23456789);
INSERT INTO projet VALUES (null,'EnergieRenouvelable', 'Énergies renouvelables', 'Étude et mise en œuvre de solutions basées sur les énergies renouvelables pour favoriser la transition énergétique dans une région donnée',45678901);


INSERT INTO student (numcin, nom, prenom, email, sexe, projet) 
VALUES (07094210, 'Smith', 'Jane', 'jane@example.com', 'F', 2);
INSERT INTO student (numcin, nom, prenom, email, sexe, projet) 
VALUES (07094212, 'Johnson', 'Michael', 'michael@example.com', 'H', 3);
INSERT INTO student (numcin, nom, prenom, email, sexe, projet) 
VALUES (07094213, 'Williams', 'Emily', 'emily@example.com', 'F', 1);
INSERT INTO student (numcin, nom, prenom, email, sexe, projet) 
VALUES (07094214, 'Ben arfa', 'Mohammed', 'mohammed@example.com', 'H', 4);
INSERT INTO student (numcin, nom, prenom, email, sexe, projet) 
VALUES (07094215, 'Ben ali', 'Sirine', 'sirine@example.com', 'F', 5);
-- Afficher les données des tables
SELECT * FROM users;
SELECT * FROM teacher;
SELECT * FROM projet;
SELECT * FROM student;
