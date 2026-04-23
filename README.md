# Mini Blog

Application de blog développée avec Laravel 13 + Breeze (Pour l'Auth) + SQLite (Le choix de SQLite a été fait dans le but de s'implifier le lancement en local).

## Fonctionnalités

- Inscription et connexion (Laravel Breeze)
- Liste publique de tous les articles
- Création, modification et suppression de ses propres articles
- Page "Mes articles" personnelle pour gérer ses publications
- Routes protégées pour les utilisateurs non connectés
- Politique d'ownership : un utilisateur ne peut modifier/supprimer que ses propres articles

## Prérequis

- PHP >= 8.2
- Composer
- Node.js >= 18

## Etapes d'installation et exécution du projet

### 1. Cloner le projet

```bash
git clone https://github.com/cheyicarmel/test-blog.git
cd test-blog
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Créer la base de données et lancer les migrations

```bash
touch database/database.sqlite
php artisan migrate
```

### 5. Installer les dépendances JS et compiler les assets

```bash
npm install
npm run build
```

### 6. Lancer le serveur

```bash
php artisan serve
```