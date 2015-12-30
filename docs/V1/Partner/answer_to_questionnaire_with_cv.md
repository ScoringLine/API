Répondre aux deux premières questions du questionnaire
=====================================================

> **Attention**: toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémenté, veuillez utiliser une url de la forme /api-saas/v1/


Pré requis
----------

Avoir les clés suivantes pour votre compte :

* Clé API Partenaire
* Clé API Entreprise
* Clé API Utilisateur

Définition
----------

Vous devez appeler l'URL suivante en **POST** :

```
/api-saas/test/v1/partner/questionnaires/{slug_du_questionnaire}/answer-starter
```

*Vous devez remplacer `{slug_du_questionnaire}` par le slug (nom simplifié) du questionnaire.*

Vous devez envoyer les données suivantes dans une requête http multipart (envoi de fichier) :

Nom de la donnée | Exemple de valeur
-----------------|------------------------------------
firstname        | Paul
lastname         | Charpentier
phone_number     | 0600000000
email            | m.veber+foo@scoringline.com
cv               | Fichier binaire (pdf de préférence)

Le serveur répondra un message json ainsi qu'une code http 200:

```json
{"message": "success"}
```
