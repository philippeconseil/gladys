# gladys
Developement for Gladys

---

Technique :

J'ai développé le site en respectant le modèle MVC.
J'ai utilisé Boostrap pour le coté front (très simple). Site responsive.

Fonctionnement :

Menu :
 - Liste des catégories
 - Nouvelle catégorie : création d'une catégorie (j'affecte une image par défaut lors de l'enregistrement afin de donner un peu de vie au site)
 - Nouvelle fiche : création d'une fiche. Elles peuvent être affectée à une ou plusieurs catégories.

Page d'accueil : liste des catégories
Sur clic sur une catégorie, accès aux fiches des catégories, possibilité de créer une nouvelle fiche (catégorie sélectionnée par défaut), de modifier et de supprimer la catégorie
En cas de suppression, cela supprime également toutes le fiches associées

Sur clic sur une fiche, accès au détail de la fiche, possibilité de modifier et de supprimer la fiche
Si fiche affecté à plusieurs catégorie, cela ne supprime pas les mêmes fiches dans les autres catégories
Si cette fiche est affectée seulement à cette catégorie, suppression définitive de la fiche

Sur la page d'accueil, accès à la modification de l'ordre d'affichage des catégories.

Gestion des erreurs si route inconnue ou si erreur sql.
