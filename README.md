# Welcome on this Symfony project


## Faire une application bancaire qui permet :
- Login/Logout/Registration.
- Créer un compte (un utilisateur peut avoir plusieurs comptes).
- De voir son compte.
- De rajouter de l'argent sur le compte avec un formulaire.
- Faire un virement à un autre utilisateur.
- Faire une demande de virement à un utilisateur qui s'affichera quand il sera connecté.
- Supprimer un compte

## Make a banking application that allows :
- Login/Logout/Registration.
- Create an account (a user can have several accounts).
- To see his account.
- Add money to the account with a form.
- Make a transfer to another user.
- Make a transfer request to a user that will be displayed when he/she is logged in.
- Delete an account

## Notation :
- Application fonctionnelle (je peux lancer l'application et j'ai pas d'erreurs): 7pts
- Code propre (suivre les psrs) : 3pts
- Chaque fonctionnalitées au dessus : 1pts
- Je n'arrive pas à casser l'application : 2pts
- Un readme pour l'installation : 1pts

## Rating :
- Functional application (I can launch the application and I have no errors): 7pts
- Clean code (follow the psrs): 3pts
- Each feature above: 1pts
- I can't break the application: 2pts
- A readme.md for the installation: 1pts


#### To connect Database we use postgres & docker :
- ``docker-compose up`` 
- the database will be on port 18080
- in ``./.env`` this line should be like this => ``DATABASE_URL="postgresql://bank:bank@127.0.0.1:5432/bankv2?serverVersion=13&charset=utf8``


### Install project : 
##### (you need to have Symfony on your computer to run it)
- Install the project with ``git clone``
- Run ``composer install`` in your terminal
- To run the project ``symfony start:server`` or ``symfony serve``


##### Symfony website made by @knl5, Kanelle & @keshiamukenge, Keshia for PHP class 2022