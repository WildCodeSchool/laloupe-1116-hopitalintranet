**INTRANET HOPITAL LA LOUPE**

Application Symfony2 (version 2.8) créée pour la mise en place du site intranet de l'hôpital de La Loupe.
Pré-requis

Composer ==> https://getcomposer.org/
Symfony 2.8 ==> https://symfony.com/download
Bundles

SonataBundle ==> http://symfony.com/doc/current/bundles/SonataBundle/index.html
InfoMailBundle
IuchBundle
AppBundle
HopitalBundle
Vl/AgendaBundle
Vl/AnnonceBundle

**Procédure d'installation**

    **Pour cloner le projet, saisir dans le terminal** :
    git clone https://github.com/laloupe-1116-hopitalintranet.git

    **Entrer dans le dossier** :
    cd laloupe-1116-hopitalintranet

    **Installer composer en saisissant dans le terminal**:
    composer install

    **A la fin du composer install, configurer la base de donnée**
    database_name (symfony):
    database_user (root):
    database_password (null):

    **Créer votre base de données via le terminal** :
    php app/console doctrine:database:create

    **Mettre à jour votre base de données via le terminal** :
    php app/console doctrine:schema:update --force

    **Enfin mettre les droits sur le projet en saisissant dans le terminal** :
    sudo chmod -R 777 web/images/ app/cache/ app/logs/

    **Puis taper la commande suivante**:
    php app/console assets:install --symlink

    **Vous pouvez désormais afficher le site via votre localhost de cette façon** :
    localhost/laloupe-1116-hopitalintranet/web/





