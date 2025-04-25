# Système de gestion de réservations immobilières Laravel

Un système simple et évolutif de gestion des réservations de biens immobiliers développé avec **Laravel**, **Livewire**, **Filament** et **TailwindCSS**.

## Table des matières

-   [Introduction](#introduction)
-   [Technologies](#technologies)
-   [Installation](#installation)
-   [Configuration](#configuration)
-   [Utilisation](#utilisation)
-   [Contribuer](#contribuer)
-   [Licence](#licence)

## Introduction

Ce projet est une application de gestion des réservations immobilières développée avec Laravel comme framework backend, Livewire pour les composants dynamiques, Filament pour le panneau d'administration et TailwindCSS pour le design. L'application permet aux utilisateurs de consulter des propriétés, de faire des réservations et de gérer leurs réservations.

## Technologies

Ce projet utilise les technologies suivantes :

-   **Laravel** (Framework backend)
-   **Livewire** (Pour les composants dynamiques et l'interactivité)
-   **Filament** (Pour le panneau d'administration)
-   **TailwindCSS** (Pour un design réactif et moderne)
-   **MySQL** (Pour la base de données)
-   **PHP** (Pour la logique côté serveur)
-   **Node.js & NPM** (Pour la compilation des assets)

## Installation

Pour installer le projet en local, suivez ces étapes :

### 1. Cloner le dépôt

```bash
git clone https://github.com/tonnomdutilisateur/laravel-property-booking.git

2. Installer les dépendances
Allez dans le dossier du projet et exécutez :composer install
npm install

3. Configurer l'environnement
Copiez le fichier .env.example vers .env et mettez à jour les paramètres de la base de données et autres configurations si nécessaire : cp .env.example .env

4. Générer la clé de l'application
Exécutez la commande suivante pour générer la clé de l'application : php artisan key:generate

5. Exécuter les migrations
Exécutez les migrations pour créer les tables nécessaires : php artisan migrate

6. Compiler les assets
Compilez les assets du frontend en exécutant la commande suivante :npm run dev

Configuration
Avant d'exécuter l'application, assurez-vous que les configurations suivantes sont définies dans le fichier .env :

APP_NAME : Définissez le nom de votre application.

APP_URL : L'URL de l'application.

DB_CONNECTION : Définissez les détails de votre connexion à la base de données (ex. MySQL).

MAIL_ Configuration* : Si vous avez besoin de fonctionnalités d'email, configurez les paramètres de mail.

Utilisation
1. Lancer le serveur de développement
Pour exécuter l'application localement, vous pouvez utiliser : php artisan serve

Cela démarrera le serveur de développement Laravel. Ouvrez votre navigateur et accédez à http://localhost:8000 pour accéder à l'application.

2. Accéder au panneau d'administration
Filament est utilisé pour gérer les propriétés et les réservations. Pour accéder au panneau d'administration, connectez-vous en tant qu'administrateur.

Nom d'utilisateur : admin@example.com

Mot de passe : password

Remarque : Ce projet est à des fins éducatives et pour démontrer la maîtrise de Laravel, Livewire, Filament et TailwindCSS.

Authentification avec Laravel Breeze
Installez Laravel Breeze :

composer require laravel/breeze --dev
Installez les fichiers Blade avec l'authentification :

php artisan breeze:install blade
Compilez les assets :

npm install && npm run dev
Exécutez les migrations :

php artisan migrate
Structure du Projet
Modèles et Base de Données
Créez les tables suivantes :

Properties : représente les biens immobiliers

Bookings : représente les réservations d'un bien

Exemple de migration pour properties :

php
Copier le code
Schema::create('properties', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description');
    $table->decimal('price_per_night', 8, 2);
    $table->timestamps();
});
Exemple de migration pour bookings :


Schema::create('bookings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('property_id')->constrained()->onDelete('cascade');
    $table->date('start_date');
    $table->date('end_date');
    $table->timestamps();
});
Interface Utilisateur avec Blade et TailwindCSS
Créez un layout principal dans resources/views/layouts/app.blade.php.

Utilisez des composants Blade pour les boutons et les cartes de propriété.

Ajoutez TailwindCSS et définissez des couleurs personnalisées dans tailwind.config.js :

module.exports = {
  theme: {
    extend: {
      colors: {
    //
      },
    },
  },
}
Livewire : Composants Dynamiques
Installez Livewire :

composer require livewire/livewire
Créez un composant pour la gestion des réservations :

php artisan make:livewire BookingManager
Ajoutez des événements et actions Livewire (wire:model, wire:click, dispatch).

Filament : Interface d’Administration
Installez Filament :

composer require filament/filament
Créez un panneau d'administration :


php artisan make:filament-user
Ajoutez des tables et formulaires pour les propriétés et réservations dans Filament.

Livrable attendu
Un projet Laravel fonctionnel avec l'authentification Breeze.

Une gestion des propriétés et réservations.

Une interface Blade avec TailwindCSS.

Un composant Livewire pour la réservation.

Un panneau Filament pour la gestion des données.

Livraison sur GitHub
Créez un dépôt Git sur GitHub.

Initialisez un dépôt Git dans votre projet Laravel :

git init
Ajoutez votre dépôt distant :

git remote add origin https://github.com/votre-utilisateur/nom-du-repository.git
Ajoutez les fichiers au dépôt Git :

git add .
Effectuez un commit avec un message approprié :

git commit -m "Initial commit du projet Laravel"
Poussez le code vers GitHub :

git push -u origin main

### Explication :

- **Introduction** : Présentation brève du projet et des technologies utilisées.
- **Technologies** : Liste des technologies utilisées dans le projet.
- **Installation** : Instructions détaillées pour l'installation et la configuration de l'application en local.
- **Configuration** : Détails sur ce qu'il faut configurer dans le fichier `.env` pour faire fonctionner l'application correctement.
- **Utilisation** : Instructions pour démarrer l'application et accéder à l'interface d'administration.
- **Contribuer** : Guide pour les personnes souhaitant contribuer au projet.
- **Licence** : Informations sur la licence sous laquelle le projet est distribué.

```
