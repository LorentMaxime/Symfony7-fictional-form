# Symfony7-fictional-form

## Description
Ceci est avant tout un projet pour m'entrainer à l'utilisation du framework Symfony7 et également à PHP!
Stack technique:
* PHP8
* Composer
* MySQL
* MailPit (https://github.com/axllent/mailpit/releases/tag/v1.18.7)
* Bootstrap 5


## Prérequis techniques
* PHP8
* Composer
* MySQL (ou autre base de données)

## Installations
* Cloner le projet
```
(https://github.com/LorentMaxime/Symfony7-fictional-form)
```

* Installer les dépendances PHP
```
$ composer install
```

* Créer une base de donnée MySQL. Adminer est placé dans le dossier 'public' du projet.
&nbsp;
[Télécharger la version pour MySQL de Adminer (version anglaise pour la légèreté)](https://www.adminer.org/)


* renseigner la configuration de connexion à cette base de données dans le fichier .env :
```
DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.37&charset=utf8mb4&charset=utf8mb4"
```

* MailPit est installé dans le dossier bin du projet pour que ce soit un executable comme les autres.
&nbsp;
[Télécharcher MailPit](https://github.com/axllent/mailpit/releases/tag/v1.18.7)


## Utilisation
Pour lancer l'app, il suffit de lancer le serveur PHP:
```
$ php -S localhost:8000 -t public
```

Pour lancer MailPit, lancer la commande dans le terminal. Dans le projet, à la racine du projet:
```
chmod +x bin/mailpit (ceci peut changer selon la configuration personnelle)
```
Puis
```
bin/mailpit
```
MailPit est accessible sur la navigateur à l'url :
```
localhost:8025
```

