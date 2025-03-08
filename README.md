Gestion des Présences des Professeurs avec Laravel

Ce projet est une application web de gestion des présences des professeurs utilisant Laravel. Elle permet de gérer les utilisateurs, les cours, les présences, et de générer des rapports statistiques. Elle facilite l'administration et le suivi des cours en temps réel, tout en offrant des outils d'analyse avancée pour optimiser la gestion.

Fonctionnalités principales
1. Gestion des utilisateurs : Administrateurs, professeurs, et gestionnaires.
2. Administration des cours : Ajout, modification, et suppression des cours. Attribution des cours aux professeurs.
3. Enregistrement des présences (émargement manuel) : Les professeurs peuvent enregistrer leurs présences et consulter l'historique des émargements.
4. Génération de rapports détaillés : Présences par professeur, par cours, etc.
5. Envoi de notifications par e-mail : Envoi automatique d'e-mails aux professeurs après l'ajout de nouveaux cours.
6. Exportation des données : Exportation des émargements aux formats PDF et Excel à une période donnée.
7. Analyse statistique des présences : Nombre d'émargements par professeur, évolution des présences, et taux de présence par cours.
8. Gestion des conflits d'horaires : Gestion des conflits lors de l'attribution des cours aux professeurs.
9. Association des salles aux cours : Chaque cours peut être associé à une salle spécifique.

Diagramme de Classe :
Le diagramme de classe représente les entités et leurs relations :

. Users (id, nom, prénom, email, password, rôle)
. Salle (id, libelle)
. Cours (id, nom, description, heure_debut, heure_fin, salle_id)
. Émargements (id, date, statut, professeur_id, cours_id)
. Notifications (id, message, destinataire_id, date_envoi)

Fonctionnalités détaillées :

1. Gestion des utilisateurs
   Création, modification et suppression des comptes utilisateurs.
2. Gestion des cours
   Ajout, modification et suppression des cours.
   Attribution des cours aux professeurs et aux créneaux horaires.
3. Gestion des émargements
   Enregistrement des présences avec validation manuelle.
   Consultation de l'historique des émargements.
   Gestion des conflits d'horaire lors de l'attribution des cours à un professeur.
4. Génération de rapports et statistiques
   Exportation des émargements aux formats PDF et Excel.
   Statistiques détaillées sur les présences :
   Nombre d'émargements par professeur (Graphique en barres).
   Évolution des émargements (Graphique en ligne).
   Taux de présence par cours (Graphique en doughnut).
5. Notifications
   Envoi automatique d'un e-mail aux professeurs après l'ajout d'un cours.
   Installation

   
    Technologies utilisées :

Laravel : Framework PHP pour le développement de l'application web.
PostgresSQL : Base de données relationnelle.
Bootstrap : Framework CSS pour le design.
Chart.js : Librairie JavaScript pour les graphiques.


