CREATE TABLE IF NOT EXISTS `ETUDIANT` (
    `id_etudiant` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom_etudiant` VARCHAR(100) NOT NULL,
     `post_nom_etudiant` VARCHAR(100) NOT NULL,
    `prenom_etudiant` VARCHAR(100) NOT NULL,
    `biographie_etudiant` TEXT NOT NULL,
     `date_naissance_etudiant` DATE NOT NULL,
     `date_enregistrement` DATE NOT NULL,
     `promotion_etudiant` VARCHAR(2) NOT NULL,
     `logine` VARCHAR(100) NOT NULL,
     `mot_de_passe` VARCHAR(100) NOT NULL, 
     `filiere_promotion` VARCHAR(2)
    );

CREATE TABLE IF NOT EXISTS `PROMOTION` (
`id_promotion` VARCHAR(2) NOT NULL PRIMARY KEY,
`class_promotion` VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS `FILIERE` (
`id_filiere` VARCHAR(2) PRIMARY KEY,
`nom_filiere` VARCHAR(50) NOT NULL,
`Descriptions` VARCHAR(100) NOT NULL,
`date_creation` DATE NOT NULL
);

ALTER TABLE `ETUDIANT`
ADD FOREIGN KEY (`promotion_etudiant`)
REFERENCES `PROMOTION`(`id_promotion`);  

ALTER TABLE `ETUDIANT`
ADD FOREIGN KEY (`filiere_promotion`)
REFERENCES `FILIERE`(`id_filiere`); 


INSERT INTO `PROMOTION` VALUES('1', "Preparatoire");
INSERT INTO `PROMOTION` VALUES('2', "L1");
INSERT INTO `PROMOTION` VALUES('3', "L2");
INSERT INTO `PROMOTION` VALUES('4', "L3");


INSERT INTO `FILIERE` VALUES('', "", "NULL", 0000/01/01);
INSERT INTO `FILIERE` VALUES ('1', "GL", "Genie Logiciel", 2002/01/01);
INSERT INTO `FILIERE` VALUES('2', "MSI", "Managment Et Systeme D'Information", 2002/01/01);
INSERT INTO `FILIERE` VALUES('3', "AS", "Administration Systeme et Reseaux", 2002/01/01);
INSERT INTO `FILIERE` VALUES('4', "Telecom", "Telecommunications et Reseau", 2002/01/01);
INSERT INTO `FILIERE` VALUES('5', "Design", "Design et Multimedia", 2002/01/01);