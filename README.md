Notifications bundle
===

Ajout de notifications pour les users (backend seulement)

## Routes:

Pour installer les routes, ajouter ceci:

```yaml
notifications:
    prefix: '/notifications'
    resource: '@NotificationsBundle/Resources/config/routes.yaml'
```

à votre config/routes.yaml

* **GET** /notifications/by-user/{id}

A faire

## Restrictions

Votre classe User doit absoluement être dans le namespace \App\Entity et s'appeler User, soit etre
\App\Entity\User.