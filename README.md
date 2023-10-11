[![license: MIT](https://img.shields.io/badge/license-MIT-lime)](https://opensource.org/licenses/MIT)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=AlisonDS_devops&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=AlisonDS_devops)
[![Build](https://github.com/AlisonDS/devops/actions/workflows/build.yml/badge.svg)](https://github.com/AlisonDS/devops/actions/workflows/build.yml)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=AlisonDS_devops&metric=coverage)](https://sonarcloud.io/summary/new_code?id=AlisonDS_devops)

# SocSport


SocSport - Application de Réservation de Terrains Sportifs :
Bienvenue dans SocSport, une application web qui permet aux utilisateurs de réserver des terrains sportifs à proximité de leur domicile. Cette application est construite avec Symfony, un framework PHP populaire, et utilise Composer pour la gestion des dépendances.

## Installation
Avant de pouvoir utiliser SocSport sur votre système, vous devez effectuer quelques étapes d'installation. 

### 0. Prérequis
Assurez-vous d'avoir PHP installé sur votre machine avec une version compatible (PHP 7.2 ou supérieur). Vous pouvez vérifier si PHP est installé en exécutant php -v dans votre terminal. Dans le cas où php n'est pas installé, vous pouvez le faire en suivant les instructions sur le site officiel de PHP : [Installation de PHP](https://www.php.net/).

### 1. Installation de Symfony
Si vous n'avez pas Symfony installé sur votre système, vous pouvez le faire en suivant les instructions sur le site officiel de Symfony : [Installation de Symfony](https://symfony.com/doc/current/setup.html).

### 2. Installation de Composer
Composer est un gestionnaire de dépendances essentiel pour Symfony. Si vous ne l'avez pas encore installé, suivez les instructions sur le site officiel de Composer : [Installation de Composer](https://getcomposer.org/download/).

### 3. Clonage du dépôt GitHub
Maintenant que Symfony et Composer sont installés, vous pouvez cloner le dépôt GitHub de SocSport sur votre machine locale en utilisant la commande suivante :

```
git clone https://github.com/AlisonDS/devops.git
```

### 4. Configuration de l'Application
Une fois le dépôt cloné, accédez au répertoire du projet et installez les dépendances Symfony en exécutant la commande Composer :

```
cd devops
composer install
```

### 5. Configuration de la Base de Données
SocSport utilise une base de données pour stocker les informations sur les terrains sportifs et les réservations. Assurez-vous de configurer la connexion à la base de données dans le fichier .env en renseignant vos paramètres de base de données.

Après avoir configuré la base de données, vous pouvez créer la structure de la base de données en utilisant les commandes Symfony suivantes :

```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 6. Lancement de l'Application
Vous êtes maintenant prêt à lancer l'application !
Utilisez la commande Symfony suivante pour démarrer le serveur de développement :

```
symfony serve
```

L'application sera accessible à l'adresse http://localhost:8000 dans votre navigateur.

## Utilisation de l'Application (v0.1)
Une fois l'application en cours d'exécution, vous pouvez commencer à l'utiliser afin de rechercher les terrains de la ville souhaitée.
Pour cela, il vous suffit d'entrer le nom de la ville dans le champs de texte, d'appuyer sur le bouton "rechercher". La liste des terrains de cette ville est affichée (nom,adresse,ville).

Nous apprécions toutes les contributions et le feedback de la communauté !

---

Merci d'avoir choisi SocSport pour vos réservations de terrains sportifs. 

**L'équipe SocSport**
