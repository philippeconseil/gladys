# gladys
Developement for Gladys

---

Technique :

J'ai d�velopp� le site en respectant le mod�le MVC.
J'ai utilis� Boostrap pour le cot� front (tr�s simple). Site responsive.

Fonctionnement :

Menu :
 - Liste des cat�gories
 - Nouvelle cat�gorie : cr�ation d'une cat�gorie (j'affecte une image par d�faut lors de l'enregistrement afin de donner un peu de vie au site)
 - Nouvelle fiche : cr�ation d'une fiche. Elles peuvent �tre affect�e � une ou plusieurs cat�gories.

Page d'accueil : liste des cat�gories
Sur clic sur une cat�gorie, acc�s aux fiches des cat�gories, possibilit� de cr�er une nouvelle fiche (cat�gorie s�lectionn�e par d�faut), de modifier et de supprimer la cat�gorie
En cas de suppression, cela supprime �galement toutes le fiches associ�es

Sur clic sur une fiche, acc�s au d�tail de la fiche, possibilit� de modifier et de supprimer la fiche
Si fiche affect� � plusieurs cat�gorie, cela ne supprime pas les m�mes fiches dans les autres cat�gories
Si cette fiche est affect�e seulement � cette cat�gorie, suppression d�finitive de la fiche

Sur la page d'accueil, acc�s � la modification de l'ordre d'affichage des cat�gories.

Gestion des erreurs si route inconnue ou si erreur sql.
