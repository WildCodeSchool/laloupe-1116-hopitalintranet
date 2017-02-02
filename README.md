**INTRANET HOPITAL LA LOUPE**

Application Symfony2 (version 2.8)  
créée pour la mise en place du site intranet de l'hôpital de La Loupe.

##Installation

#####Requis:

* [Installer composer](https://getcomposer.org/download/)

* [Symfony 2.8] (https://symfony.com/download)


##Bundles présents dans le site

SonataBundle ==> http://symfony.com/doc/current/bundles/SonataBundle/index.html
InfoMailBundle
IuchBundle
AppBundle
HopitalBundle
Vl/AgendaBundle
Vl/AnnonceBundle


#####Installer le projet

   
    $ git clone https://github.com/laloupe-1116-hopitalintranet.git
    $ cd laloupe-1116-hopitalintranet
    $ composer install
    $ php app/console doctrine:database:create
    $ php app/console doctrine:schema:update --force
    $ php app/console assets:install --symlink

    Vous pouvez désormais afficher le site via votre localhost de cette façon :
    localhost/laloupe-1116-hopitalintranet/web/app_dev.php/accueil





