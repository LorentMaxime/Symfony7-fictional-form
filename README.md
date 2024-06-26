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

* Créer une base de donnée MySQL. Peut etre telecharger Adminer pour avoir une interface pour communiquer avec la BDD, pour tester les identifiants et remplir la BDD initialement.
&nbsp;
[Télécharger la version pour MySQL de Adminer (version anglaise pour la légèreté)](https://www.adminer.org/)


* renseigner la configuration de connexion à cette base de données dans le fichier .env :
```
DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.37&charset=utf8mb4&charset=utf8mb4"
```

* Installer MailPit pour un faux serveur de dev (il est simplement executable)
&nbsp;
Télécharcher MailPit](https://github.com/axllent/mailpit/releases/tag/v1.18.7)

Apres extraction, le placer dans le fichier bin du projet pour que ce soit un executable comme les autres.
Possible de verifier qu'il soit executable, lancer la commande dans le terminal. Dans le projet, à la racine :
```
chmod +x bin/mailpit
```
Puis
```
bin/mailpit
```

