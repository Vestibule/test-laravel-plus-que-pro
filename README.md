# Installation

### 1 - Cloner le dépôt :
`git clone https://github.com/Vestibule/test-laravel-plus-que-pro.git`

### 2 - Se déplacer dans le répertoire du projet :
`cd clone test-laravel-plus-que-pro`

### 3 - Installer les dépendances Composer :
`./vendor/bin/sail composer install`

### 4 - Installer les dépendances NPM :
`./vendor/bin/sail npm install`

### 5 - Générer la clé de l'application :
`./vendor/bin/sail artisan key:generate`

### 6 Exécuter les migrations :
`./vendor/bin/sail artisan migrate`

### 7 Exécuter les seeds :
`./vendor/bin/sail artisan db:seed`

### 8 Importer les films :
`./vendor/bin/sail artisan migrate movies:fetch-trending`

### 9 Démarrer l'application :
`./vendor/bin/sail up`


Vous pouvez désormais accéder à l'application.
Utilisez les identifiants suivant pour vous connecter :

Email : dummy@example.com
Mot de passe : password123
