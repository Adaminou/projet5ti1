CREATE table Utilisateur
(
	utilisateurID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    utilisateurLastname VARCHAR(100),
    utilisateurSurname VARCHAR(100),
    utilisateurEmail VARCHAR(255),
    utilisateurDate DATETIME,
	utilisateurMdp VARCHAR(255)                                                                                                                                                                           
)