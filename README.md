Notifications bundle
===

Ajout de notifications pour les users (backend seulement)

## Restrictions

Votre classe User doit absoluement être dans le namespace \App\Entity et s'appeler User, soit etre
\App\Entity\User.

## Routes:

Pour installer les routes, ajouter ceci:

```yaml
notifications:
    prefix: '/notifications'
    resource: '@NotificationsBundle/Resources/config/routes.yaml'
```

à votre config/routes.yaml

Pour créer des notifs, il faut utiliser le service. Effectivement on ne veut pas permettre
aux clients de spammer les routes de notifications ou lire les notifs de toute le monde.
Vous pouvez ajouter des routes dans votre application pour plus de flexibilité.


* **GET** /notifications/my-user

Récupère toutes les notifications de l'utilisateur courant.

## Service

La classe est `NotificationsService`. Toutes les méthodes sont commentées, veuillez vous
référer aux comentaires sur les méthodes plutot que ce README qui ne fait office que de 
listing de features.

Méthdodes:

* notifyUsers:
    * Ajoute des notifications aux users 
    
* getForUser
    * Récupère toutes les notifications pour un user, sous format d'entité ou array
    TODO: ajouter des flags pour filtrer
    
* toArray
    * Convertit un objet Notification en Array
    
* duplicateNotification
    * Clone une notif (pour notifier un batch d'user)
    Normalement il n'y a aucun besoin d'utiliser cette méthode en dehors du bundle.

## Entités

* Notification: représente une notification pour un seul utilisateur