# Étapes de Déploiement en Local

1. **Clonage du dépôt**

   Cloner le dépôt public de l'application depuis GitHub :

   ```bash
   git clone https://github.com/InnShh/arcadia
   cd arcadia-zoo
   ```

2. **Installation des dépendances**

   Installer les dépendances PHP avec Composer :

   ```bash
   composer install
   ```

   Installer les dépendances JavaScript avec npm :

   ```bash
   npm install
   ```

3. **Configuration de l'environnement**

   Dupliquer le fichier `.env.example` en `.env` et configurer les variables nécessaires :

4. **Génération de la clé d'application**

   Générer une clé unique pour l'application :

   ```bash
   php artisan key:generate
   ```

5. **Migrations et seeding de la base de données**

   Exécuter les migrations pour créer les tables nécessaires :

   ```bash
   php artisan migrate --seed
   ```

6. **Compilation des ressources front-end**

   Compiler les fichiers front-end avec Vite :

   ```bash
   npm run build
   ```

7. **Configuration du serveur web**

   Démarrer le serveur web :

   ```bash
   php artisan serve
   ```
