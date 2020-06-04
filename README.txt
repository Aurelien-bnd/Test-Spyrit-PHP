Le fichier composer.json sert a installer la bibliothèque symfony http-client.

La fichier API.php contient toutes les fonctions utiles afin de récuperer(RetrieveAllInfo), trier(RetrieveInfo) et formater(FormatDate) les informations du .json.
On obtient ansi 4 tableaux (type, name, avatar, date) qui contiennent les donées à afficher.

Le fichier index.php sert a afficher les informations précedement récuperer par le fichier API.php.