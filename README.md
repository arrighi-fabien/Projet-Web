# Projet-Web
Projet web CPI A2 info

Réalisation du site : **Stage du zero**
Groupe : Arrighi Fabien et Ferrer Nathan

Ce projet est un site web qui permet aux étudiants de simuler la recherche de stage en leur offrant une expérience interactive et conviviale. Le site utilise différentes technologies pour offrir une expérience utilisateur optimale.

HTML / CSS (SASS)
PHP (Maildev, AltoRouteur, Composer)
Javascript (JQuery)
Smarty

## Configuration
### BDD
1. Lancez XAMPP et démarrez Apache et MySQL.
2. Ouvrez votre navigateur et accédez à localhost/phpmyadmin.
3. Connectez-vous à votre serveur MySQL en utilisant vos identifiants (Pour le projet l'utilisateur root ne dois pas avoir de Mots de passe).
4. Créez une nouvelle base de données en cliquant sur le bouton "Nouvelle base de données" dans le menu. Nommez la base de données "projet".
5. Une fois que la base de données est créée, sélectionnez-la dans le menu.
6. Cliquez sur l'onglet "Importer" dans le menu horizontal en haut de la page.
7. Sélectionnez le fichier SQL que vous souhaitez importer en cliquant sur le bouton "Choisir un fichier". Assurez-vous que le format du fichier est pris en charge par MySQL (.sql). __Fichier disponible dans la brachen "SQL"__
8. Cliquez sur le bouton "Exécuter" pour importer le fichier SQL dans la base de données "projet".

### Virtual Host
Dans le fichier `httpd-vhosts.conf` (xampp/apache/conf/extra/httpd-vhosts.conf)
```
## HTTP
<VirtualHost *:80>
    ServerAdmin [EMAIL]
    DocumentRoot "C:/[PATH]/Projet-Web/public"
    ServerName stageduzero.local
    ErrorLog "logs/stageduzero.local-error.log"
    CustomLog "logs/stageduzero.local-access.log" common
    <Directory "C:/[PATH]/Projet-Web/public">
        Require all granted
    </Directory>
</VirtualHost>

## HTTPS
<VirtualHost *:443>
    DocumentRoot "C:/[PATH]/Projet-Web/public"
    ServerName stageduzero.local:443
    SSLEngine on
    SSLCertificateFile C:/[PATH]/Projet-Web/core/SSL/certificate.crt
    SSLCertificateKeyFile C:/[PATH]/Projet-Web/core/SSL/private.key
</VirtualHost>
```

## Démarrage
1. Lancez XAMPP et démarrez Apache et MySQL.
2. Ouvrez une invite de commande (terminal) sur votre ordinateur.
3. Tapez la commande "devmail" pour lancer le serveur de messagerie local.
