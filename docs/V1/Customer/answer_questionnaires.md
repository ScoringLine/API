Répondre à un questionnaire
=====================================================

>**:warning: toutes les urls fournies dans cette documentation commencent par /api-saas/test/v1/. Elles ne sont utilisées que pour les tests de fonctionnement (aucun enregistrement), une fois le code implémenté, veuillez utiliser une url de la forme /api-saas/v1/**

Prérequis
----------

Avoir les clés suivantes pour votre compte :

* Clé API Entreprise
* Clé API Utilisateur

# Table des matières
1. [Répondre à un questionnaire sans CV](#répondre-à-un-questionnaire-sans-cv)
2. [Répondre à un questionnaire avec CV](#répondre-à-un-questionnaire-avec-cv)

# Répondre à un questionnaire sans CV

## Requête

**POST** `api-saas/v1/customer/questionnaires/{questionnaire}/answer`

**POST** `api-saas/v1/customer/questionnaires/ref/{reference}/answer`

* *questionnaire (`String`)* : Le slug du questionnaire (nom simplifié). Exemple : `nom-du-questionnaire`
* *reference (`String`)* : La référence de l'offre.

Vous devez envoyer les données suivantes dans une requête http multipart (envoi de fichier) :

Nom de la donnée | Exemple de valeur
-----------------|------------------------------------
firstname        | Paul
lastname         | Charpentier
phone_number     | 0600000000
email            | paul.charpentier@scoringline.com
strict           | (boolean) default true

Si vous passez le paramètre strict à false seule l'adresse email devra être un champ obligatoire et valide.

## Réponse

Le serveur répondra un message JSON ainsi qu'un code HTTP 200:

```json
{"message": "success"}
```

# Répondre à un questionnaire avec CV

## Requête

**POST** `api-saas/v1/customer/questionnaires/{questionnaire}/answer-starter`

**POST** `api-saas/v1/customer/questionnaires/ref/{reference}/answer-starter`

* *questionnaire (`String`)* : Le slug du questionnaire (nom simplifié). Exemple : `nom-du-questionnaire`
* *reference (`String`)* : La référence de l'offre.

Vous devez envoyer les données suivantes dans une requête http multipart (envoi de fichier) :

Nom de la donnée | Exemple de valeur
-----------------|------------------------------------
firstname        | Paul
lastname         | Charpentier
phone_number     | 0600000000
email            | paul.charpentier@scoringline.com
resume           | Fichier binaire (pdf de préférence)
strict           | (boolean) default true

Si vous passez le paramètre strict à false seule l'adresse email devra être un champ obligatoire et valide.

## Réponse

Le serveur répondra un message JSON ainsi qu'un code HTTP 200:

```json
{"message": "success"}
```
