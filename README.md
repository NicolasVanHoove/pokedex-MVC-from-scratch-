# I- Présentation du projet 

C'est un projet qui consistait à réalisé un **MVC PHP from scratch**. Le but étant de mettre en pratique les bases apprises sur la **POO (Programmation Orienté Objet)** durant la première moitié de ma formation de 6 mois chez O'clock.
L'application qui vient d'être créé référence les 151 pokemons de la première génération ainsi que les 17 types. Chaque pokemon possédant un ou deux types. Il y a une page d'accueil qui présente les 151 pokemons. Chaque pokemon de la page étant un lien redirigant vers une page détaillant l'ensemble de ses caractéristiques. Il y a une page listant les 17 types. Chaque type présent dans la page est un lien redirigeant vers une page dans laquelle sont listées tous les pokémons appartenant à ce type.

Les technologies utilisées pour ce projet ainsi que l'architecture de l'application mais aussi celle de la BDD sont détaillées dans les 3 parties ci-dessous. 

Vous trouverez également des informations complémentaires dans les commentaires de chaque page de code 


# II- Les technologies utilisées

1. **HTML5** et **CSS3** pour réaliser l'intégration web. J'ai hésité à utiliser bootstrap pour la mise en page du projet mais mon choix s'est porté sur un fichier CSS réalisé par mes soins. Le but étant de perfectionner mes compétences en CSS. Le CSS est réalisé selon le concept **Mobile First** et est entièrement responsive. Dans le dossier résultat vous trouverez des screen shots du résultat de l'affichage sur mobile, tablette et ordinateur. Pour la mise en page j'ai essentiellement utilisé la technique grid plutot que flexbox. 

2. **PHP** pour dynamiser mes vues mais aussi pour gérer les données recues depuis la BDD (Base De Données) via des Models et des Controllers qui seront des classes créées avec PHP.

3. **MariaDB** qui est le système de gestion de BDD  utilisé pour ce projet. 

4. Le **SQL** est le langage utilisé pour communiqué avec la BDD du projet car c'est une Base De Données "relationnelle" 

5. Le gestionnaire de dépendance **Composer** afin d'installer AltoRouter et le var-dumper de symfony. 

6. **AltoRouter** dont le but est de servir de router php, c'est-à-dire que son rôle est de rediriger toutes les requêtes vers un fichier index.php dans lequel les bon fichiers seront inclus en fonction de l'URL.

7. Le **var-dumper de symfony** dans le but de rendre le debuggage de l'application plus efficace. 

8. **Adminer** qui est l'application web servant d'interface graphique pour la gestion de la Base de données 

# III- Architecture de l'application

Cette application est concue selon le modèle MVC qui signifie Model Views Controller. 

Les Models, étant des classes créés avec PHP, permettent de récupérer les données depuis la base de données. Au sein des méthodes créées dans les models, le langage SQL est utilisé pour communiquer avec la BDD ce qui permet de récupérer les données souhaitées. Les Models sont créés selon le patron Active Record. Par conséquent il y a un Model par tables existantes dans la BDD auquel on ajoute un CoreModel qui est le principal Model de l'application. 

Les Controllers sont égalements des classes créées avec PHP. Les méthodes créées au sein de ces classes permettent de traiter les données nécessaires à la View vers laquelle il renvoie. 

Les Views ce sont les fichiers PHP qui nous permette l'affichage de la page demandée par l'utilisateur 

Le fichier **index.php** que l'on trouve dans le dossier public  est ce qu'on appelle le Front Controller de l'application. C'est le point d'entrée unique de l'application dans lequel toutes les requêtes de l'utilisateur sont traitées. 

# IV- Architecture de la Base De Données 

Elle est constituée de 3 tables. Une table `pokemon` qui contient la liste des 151 pokemons. Une table `type` qui contient la liste des 17 types. Une autre qui s'appelle `pokemon_type`. Je n'ai pas créé de Model pour la table `pokemon_type` car c'est une table pivot (aussi appelée table intermédiaire). Son but étant de faire le lien entre la table `pokemon` et la table `type`.
