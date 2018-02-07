# Blog
Pour télécharger le projet :

Aller dans le dossier souhaiter <br>
git clone https://github.com/SamuelPelletier/Blog.git (copié l'url HTTPS au dessus) <br>
cd blog <br>
composer install (à la fin faire entrer pour tout sauf si votre bdd n'a pas comme accés root et vide)<br>
Créer la table "symfony" dans phpmyadmin<br>
php bin/console doctrine:schema:update --force<br>
Dans WAMP ajouter un alias (Copié coller un existant et remplacer les URL par ROUTE/blog/web)<br>

Pour faire une nouvelle fonctionalité :

git pull<br>
git checkout -b [name_of_your_new_branch]<br>
git push origin [name_of_your_new_branch]<br>

Pour ramener une branche :

git checkout -b master (on reviens sur la branche initial)<br>
git pull (on récupére les changements)<br>
git checkout -b [name_of_your_new_branch] (on reviens sur notre brnache)<br>
git merge master (on prend les changements de master pour les ramner dans notre branche)<br>
git checkout -b master (on retourne sur la branche initiale)<br>
git merge [name_of_your_new_branch] (on merge notre code avec celui dans la branche principale)<br>

/!\ Important /!\ Passer en mode développement : localhost/blog/app_dev.php/
